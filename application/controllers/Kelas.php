<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Kelas_model');
	}

    public function index()
	{
		if($this->session->userdata('email')){
			$data['title'] = 'Kelas';
			$data['header'] = 'temp/header';
			$data['content'] = 'kelas/page-kelas';
			$this->load->view('layout', $data);
		}else{
			$this->session->set_flashdata('message', 'Anda harus Login terlebih dahulu!');
			redirect('auth/login');
		}
	}

	function get(){
		$list = $this->Kelas_model->get_datatables();
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
						<a class='dropdown-item edit' href='#' data-bs-toggle='modal' data-bs-target='#modalEdit' id_kelas='".$field->id_kelas."'  nama_kelas='".$field->nama_kelas."'><i class='uil-edit-alt mr-1'></i> Edit</a>
					</div>
				</div>
			";
            $row[] = $field->nama_kelas;
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Kelas_model->count_all(),
            "recordsFiltered" => $this->Kelas_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}

	public function insert(){
		$this->Kelas_model->tambah();
		$this->session->set_flashdata('message','Data berhasil di tambahkan!');
		redirect('kelas');
		// }
	}

	public function edited(){
		$this->Kelas_model->edit_not_with_file();
		$this->session->set_flashdata('message','Data berhasil diperbarui!');
		redirect('kelas');
	}

	public function delete($id_kelas){
		$this->Kelas_model->delete($id_kelas);
        $this->session->set_flashdata('message','Data berhasil di Hapus!');
        redirect('kelas');
	}
}