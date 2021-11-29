<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pejabat extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('email')){
			$this->session->set_flashdata('message', 'Anda harus Login terlebih dahulu!');
			redirect('auth');
		}
		$this->load->model('Pejabat_m');
		$this->load->model('Penduduk_m');
	}

	//Pemerintahan Desa
	public function index()
	{
		$data['title'] = 'Pemerintahan Desa';
		$data['header'] = 'temp/header';
		$data['content'] = 'pejabat/page-list-pejabat';
		$this->load->view('layout', $data);
	}

	public function Aksi()
	{
		$data['title'] = 'Pemerintahan Desa';
		$data['header'] = 'temp/header';
		$data['content'] = 'pejabat/page-pejabat';
		$this->load->view('layout', $data);
	}

	function get(){
		$list = $this->Pejabat_m->get_datatables();
        $data = array();
		$no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
			$row[] = $no.".";
			$row[] = "";
			$row[] = "
				<div class='btn-group'>
					<button class='btn btn-info btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
						Aksi <i class='mdi mdi-chevron-down'></i>
					</button>
					<div class='dropdown-menu'>
							<a class='dropdown-item' href='".base_url()."pejabat/aksi?act=Lihat&id=".$field->id."'><i class='uil-eye mr-1'></i> Lihat</a>
							<a class='dropdown-item' href='".base_url()."pejabat/aksi?act=Edit&id=".$field->id."'><i class='uil-edit-alt mr-1'></i> Edit</a>
							<a class='dropdown-item' data-id='".$field->id."' href='javascript:void(0)' id='btnHapus'><i class='uil-trash-alt mr-1'></i> Hapus</a>
						</div>
				</div>";
            $row[] = "<img width='80' src='".base_url().'assets/img/pejabat/'.$field->foto."' alt='' style='border-radius:5px;'>";
            $row[] = $field->nama_lengkap."<br>".$field->nik;
            $row[] = $field->tempat_lahir.", ".$field->tgl_lahir;
            $row[] = $field->golongan;
            $row[] = $field->jabatan;
            $row[] = $field->pendidikan;
            $row[] = $field->no_sk_pengangkatan;
            $row[] = $field->tgl_sk_pengangkatan;
            $row[] = $field->no_sk_berhenti;
            $row[] = $field->tgl_sk_berhenti;
            $row[] = $field->masa_jabatan;
            $row[] = $field->status;
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Pejabat_m->count_all(),
            "recordsFiltered" => $this->Pejabat_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}

	public function dataPejabatDetail()
	{
		$id_pejabat = $this->input->post('id_pejabat');
		echo json_encode($this->Pejabat_m->dataPejabatDetail($id_pejabat));
	}
	public function dataPejabat()
	{
		echo json_encode($this->Pejabat_m->dataPejabat());
	}
	public function get_DataPenduduk()
	{
		echo json_encode($this->Penduduk_m->get_DataPenduduk());
	}

	function simpan($act, $id = ''){
		$error = '';
        $config['upload_path']="./assets/img/pejabat";
        $config['allowed_types']='jpg|png|jpeg|JPEG';
		$config['max_size']=500;
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);
		if ($act == 'Tambah' && !empty($_FILES['foto']['name'])) {
			if ( ! $this->upload->do_upload('foto')){
				$error = $this->upload->display_errors();
				echo json_encode([
					'res' => false,
					'msg' => $error
				]);
			}else{
				$data = $this->upload->data();
				echo json_encode([
					'res' => $this->Pejabat_m->simpan($data['file_name']), 
					'msg' =>  'Data di tambahkan'
				]);
			}
		} else if ($act == 'Tambah' && empty($_FILES['foto']['name'])) {
			echo json_encode([
				'res' => $this->Pejabat_m->simpan('default.png'), 
				'msg' =>  'Data di tambahkan'
			]);
		}else if ($act == 'Edit' && !empty($_FILES['foto']['name'])){
			if ( ! $this->upload->do_upload('foto')){
				$error = $this->upload->display_errors();
				echo json_encode([
					'res' => false,
					'msg' => $error
				]);
			}else{
				$data = $this->upload->data();
				echo json_encode([
					'res' => $this->Pejabat_m->edit($data['file_name'], $id), 
					'msg' =>  'Data telah di edit'
				]);
			}
		}else if ($act == 'Edit' && empty($_FILES['foto']['name'])){
			echo json_encode([
				'res' => $this->Pejabat_m->edit(NULL, $id), 
				'msg' =>  'Data telah di edit'
			]);
		}else{
			echo json_encode([
				'res' => false, 
				'msg' =>  'Error'
			]);
		}
	}
	//end Pemerintahan Desa
}
