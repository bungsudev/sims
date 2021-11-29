<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wali extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Kelas_model');
		$this->load->model('Wali_model');
	}

    public function index()
	{
		if($this->session->userdata('email')){
			$data['title'] = 'Wali';
			$data['header'] = 'temp/header';
			$data['kelas'] = $this->Kelas_model->listKelas();
			$data['content'] = 'wali/page-wali';
			$this->load->view('layout', $data);
		}else{
			$this->session->set_flashdata('message', 'Anda harus Login terlebih dahulu!');
			redirect('auth/login');
		}
	}

	function get(){
		$list = $this->Wali_model->get_datatables();
        $data = array();
		$no = $_POST['start'];
        foreach ($list as $field) {

            $no++;
            $row = array();
            $row[] = $no.".";
			$row[] = "
				<div class='btn-group'>
					<button type='button' class='btn btn-info btn-sm dropdown-toggle' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Aksi <i class='mdi mdi-chevron-down'></i></button>
					<div class='dropdown-menu'>
						<a class='dropdown-item edit' href='#' data-bs-toggle='modal' data-bs-target='#modalEdit' id_wali='".$field->id_wali."'  nama_wali='".$field->nama_wali."'><i class='uil-edit-alt mr-1'></i> Edit</a>
					</div>
				</div>
			";
            $row[] = $field->nama_wali;
            $row[] = $field->nama_kelas;
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Wali_model->count_all(),
            "recordsFiltered" => $this->Wali_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}

	public function insert(){
		$this->Wali_model->tambah();
		$this->session->set_flashdata('message','Data berhasil di tambahkan!');
		redirect('wali');
		// }
	}

	public function edited(){
		$this->Wali_model->edit_not_with_file();
		$this->session->set_flashdata('message','Data berhasil diperbarui!');
		redirect('wali');
	}

	public function delete($id_wali){
		$this->Wali_model->delete($id_wali);
        $this->session->set_flashdata('message','Data berhasil di Hapus!');
        redirect('wali');
	}
}