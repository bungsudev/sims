<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('email')){
			$this->session->set_flashdata('message', 'Anda harus Login terlebih dahulu!');
			redirect('auth');
		}
		$this->load->model('Siswa_m');
	}

	//List Siswa
	public function index()
	{
		$data['title'] = 'List Siswa';
		$data['header'] = 'temp/header';
		$data['content'] = 'siswa/page-list-siswa';
		$this->load->view('layout', $data);
	}

	public function tambah()
	{
		$data['title'] = 'List Siswa';
		$data['header'] = 'temp/header';
		$data['content'] = 'siswa/page-siswa';
		$this->load->view('layout', $data);
	}
	public function lihat()
	{
		$data['title'] = 'Detail Siswa';
		$data['header'] = 'temp/header';
		$data['content'] = 'siswa/page-siswa';
		$this->load->view('layout', $data);
	}
	public function edit()
	{
		$data['title'] = 'Detail Siswa';
		$data['header'] = 'temp/header';
		$data['content'] = 'siswa/page-siswa';
		$this->load->view('layout', $data);
	}

	function get(){
		$list = $this->Siswa_m->get_datatables();
        $data = array();
		$no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
			$row[] = $no.".";
			$row[] = "
				<div class='btn-group'>
					<button class='btn btn-info btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
						Aksi <i class='mdi mdi-chevron-down'></i>
					</button>
					<div class='dropdown-menu'>
							<a class='dropdown-item' href='".base_url()."siswa/lihat/".$field->id_siswa."'><i class='uil-eye mr-1'></i> Lihat</a>
							<a class='dropdown-item' href='".base_url()."siswa/edit/".$field->id_siswa."'><i class='uil-edit-alt mr-1'></i> Edit</a>
							<a class='dropdown-item' data-id='".$field->id_siswa."' href='javascript:void(0)' id='btnHapus'><i class='uil-trash-alt mr-1'></i> Hapus</a>
						</div>
				</div>";
            $row[] = "<img width='80' src='".base_url().'assets/img/foto_anggota/'.$field->foto."' alt='' style='border-radius:5px;'>";
            $row[] = $field->nama_lengkap."<br> <b>NIS</b> : ".$field->nis."<br> <b>NISN</b> : ".$field->nisn."<br>".$field->tempat_lahir.", ".date("d/m/Y", strtotime($field->tgl_lahir))."<br> <b>Jekel</b> : ".$field->jk."<br> <b>Agama</b> : ".$field->agama;
            $row[] = $field->no_hp;
            $row[] = $field->alamat;
            $row[] = $field->nama_ayah."<br> <b>Pekerjaan</b> : ".$field->pekerjaan_ayah."<br>".$field->tempat_lahir_ayah.", ".date("d/m/Y", strtotime($field->tgl_lahir_ayah))."<br>".$field->hp_ayah;
            $row[] = $field->nama_ibu."<br> <b>Pekerjaan</b> : ".$field->pekerjaan_ibu."<br>".$field->tempat_lahir_ibu.", ".date("d/m/Y", strtotime($field->tgl_lahir_ibu))."<br>".$field->hp_ibu;
            $row[] = $field->status;
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Siswa_m->count_all(),
            "recordsFiltered" => $this->Siswa_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}

	public function dataSiswaDetail()
	{
		$id_siswa = $this->input->post('id_siswa');
		echo json_encode($this->Siswa_m->dataSiswaDetail($id_siswa));
	}
	public function dataSiswa()
	{
		echo json_encode($this->Siswa_m->dataSiswa());
	}
	public function hapusSiswa()
	{
		$id_siswa = $this->input->post('id');
		echo json_encode($this->Siswa_m->hapusSiswa($id_siswa));
	}

	function simpan($act, $id = ''){
		$error = '';
        $config['upload_path']="./assets/img/foto_anggota";
        $config['allowed_types']='jpg|png|jpeg|JPEG';
		$config['max_size']=500;
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);
		if ($act == 'tambah' && !empty($_FILES['foto']['name'])) {
			if ( ! $this->upload->do_upload('foto')){
				$error = $this->upload->display_errors();
				echo json_encode([
					'res' => false,
					'msg' => $error
				]);
			}else{
				$data = $this->upload->data();
				echo json_encode([
					'res' => $this->Siswa_m->simpan($data['file_name']), 
					'msg' =>  'Data di tambahkan'
				]);
			}
		} else if ($act == 'tambah' && empty($_FILES['foto']['name'])) {
			echo json_encode([
				'res' => $this->Siswa_m->simpan('default.jpg'), 
				'msg' =>  'Data di tambahkan'
			]);
		}else if ($act == 'edit' && !empty($_FILES['foto']['name'])){
			if ( ! $this->upload->do_upload('foto')){
				$error = $this->upload->display_errors();
				echo json_encode([
					'res' => false,
					'msg' => $error
				]);
			}else{
				$data = $this->upload->data();
				echo json_encode([
					'res' => $this->Siswa_m->edit($data['file_name'], $id), 
					'msg' =>  'Data telah di edit'
				]);
			}
		}else if ($act == 'edit' && empty($_FILES['foto']['name'])){
			echo json_encode([
				'res' => $this->Siswa_m->edit(NULL, $id), 
				'msg' =>  'Data telah di edit'
			]);
		}else{
			echo json_encode([
				'res' => false, 
				'msg' =>  'Error'
			]);
		}
	}
	//end List Siswa
}
