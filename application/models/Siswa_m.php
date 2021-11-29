<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_m extends CI_Model {
    //server side
    var $table = 'siswa'; //nama tabel dari database
    var $column_order = array(null, null, 'siswa.nis','siswa.nama_lengkap', 'siswa.no_hp', 'siswa.alamat', 'siswa.nama_ayah', 'siswa.nama_ibu', 'siswa.status'); //field yang ada di table user
    var $column_search = array('siswa.nis', 'siswa.nisn', 'siswa.nis', 'siswa.nama_lengkap', 'siswa.tempat_lahir', 'siswa.tgl_lahir', 'siswa.jk', 'siswa.no_hp', 'siswa.alamat', 'siswa.nama_ayah'); //field yang diizin untuk pencarian 
    var $order = array('siswa.id_siswa' => 'desc'); // default order
    
    private function get_query()
    {
        $id_sekolah = $this->session->userdata('id_sekolah');
        $this->db->select('siswa.*');
        $this->db->from('siswa');
        $this->db->where('siswa.id_sekolah', $id_sekolah);
        $this->db->where('siswa.deleted', NULL);

        $i = 0;
     
        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->get_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->get_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    // end server side

    
    public function dataIdentitasDesa() {
        $id_sekolah = $this->session->userdata('id_sekolah');
        $query = $this->db->query("SELECT * FROM siswa where id_sekolah = '$id_sekolah'");
        return $query->row();
    }

    public function dataSiswaDetail($id_siswa) {
        $id_sekolah = $this->session->userdata('id_sekolah');
        $query = $this->db->query("SELECT * FROM siswa where id_siswa = '$id_siswa' AND id_sekolah = '$id_sekolah'");
        return $query->row();
    }
    public function select2DataSiswa() {
        $id_sekolah = $this->session->userdata('id_sekolah');
        $query = $this->db->query("SELECT * FROM siswa where id_sekolah = '$id_sekolah'");
        return $query->result_array();
    }

    public function simpan($nama_gambar)
    {
        $data = [
            "id_sekolah" => $this->session->userdata('id_sekolah'),
            "nis" => $this->input->post('nis'),
            "nisn" => $this->input->post('nisn'),
            "nama_lengkap" => $this->input->post('nama_lengkap'),
            "tempat_lahir" => $this->input->post('tempat_lahir'),
            "tgl_lahir" => $this->input->post('tgl_lahir'),
            "id_kelas" => $this->input->post('id_kelas'),
            "jk" => $this->input->post('jk'),
            "no_hp" => $this->input->post('no_hp'),
            "agama" => $this->input->post('agama'),
            "alamat" => $this->input->post('alamat'),
            "nama_ayah" => $this->input->post('nama_ayah'),
            "tempat_lahir_ayah" => $this->input->post('tempat_lahir_ayah'),
            "tgl_lahir_ayah" => $this->input->post('tgl_lahir_ayah'),
            "pekerjaan_ayah" => $this->input->post('pekerjaan_ayah'),
            "hp_ayah" => $this->input->post('hp_ayah'),
            "nama_ibu" => $this->input->post('nama_ibu'),
            "tempat_lahir_ibu" => $this->input->post('tempat_lahir_ibu'),
            "tgl_lahir_ibu" => $this->input->post('tgl_lahir_ibu'),
            "pekerjaan_ibu" => $this->input->post('pekerjaan_ibu'),
            "hp_ibu" => $this->input->post('hp_ibu'),
            "email" => $this->input->post('email'),
            'status' => $this->input->post('status'),
            "foto" => $nama_gambar,
            "created" => date("Y-m-d H:i:s"),
            "created_by" => $this->session->userdata('id_user')
        ];
        $this->db->insert('siswa', $data);
        $this->tambahUser($nama_gambar);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function tambahUser($nama_gambar)
    {
        $data = array(
            "id_sekolah" => $this->session->userdata("id_sekolah"),
            'nisn' => $this->input->post('nisn'),
            'nama' => $this->input->post('nama_lengkap'),
            "jk" => $this->input->post('jk'),
            'email' => $this->input->post('email'),
            'password' => md5('123456'),
            'nohp' => $this->input->post('no_hp'),
            'status' => $this->input->post('status'),
            'image' => $nama_gambar,
            'created_date' => date("Y-m-d H:i:s")
        );
        $this->db->insert('akun_siswa', $data);
        return;
    }
    

    public function edit($nama_gambar, $id)
    {
        $data = [
            "nis" => $this->input->post('nis'),
            "nisn" => $this->input->post('nisn'),
            "nama_lengkap" => $this->input->post('nama_lengkap'),
            "tempat_lahir" => $this->input->post('tempat_lahir'),
            "tgl_lahir" => $this->input->post('tgl_lahir'),
            "id_kelas" => $this->input->post('id_kelas'),
            "jk" => $this->input->post('jk'),
            "no_hp" => $this->input->post('no_hp'),
            "agama" => $this->input->post('agama'),
            "alamat" => $this->input->post('alamat'),
            "nama_ayah" => $this->input->post('nama_ayah'),
            "tempat_lahir_ayah" => $this->input->post('tempat_lahir_ayah'),
            "tgl_lahir_ayah" => $this->input->post('tgl_lahir_ayah'),
            "pekerjaan_ayah" => $this->input->post('pekerjaan_ayah'),
            "hp_ayah" => $this->input->post('hp_ayah'),
            "nama_ibu" => $this->input->post('nama_ibu'),
            "tempat_lahir_ibu" => $this->input->post('tempat_lahir_ibu'),
            "tgl_lahir_ibu" => $this->input->post('tgl_lahir_ibu'),
            "pekerjaan_ibu" => $this->input->post('pekerjaan_ibu'),
            "hp_ibu" => $this->input->post('hp_ibu'),
            "email" => $this->input->post('email'),
            "status" => $this->input->post('status'),
            "edited" => date("Y-m-d H:i:s"),
            "edited_by" => $this->session->userdata('id_user')
        ];

        //cek update tanpa gambar
        (!empty($nama_gambar))? $data = array_merge($data, ["foto" => $nama_gambar]): '';

        $this->db->where('id_siswa', $id);
        $this->db->update('siswa', $data);
        $this->editUser($nama_gambar);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function editUser($nama_gambar)
    {
        $data = array(
            "id_sekolah" => $this->session->userdata("id_sekolah"),
            'nis' => $this->input->post('nis'),
            'nama' => $this->input->post('nama_lengkap'),
            "jk" => $this->input->post('jk'),
            'email' => $this->input->post('email'),
            'nohp' => $this->input->post('no_hp'),
            'status' => $this->input->post('status'),
            'created_date' => date("Y-m-d H:i:s")
        );
        (!empty($nama_gambar))? $data = array_merge($data, ["image" => $nama_gambar]): '';
        $this->db->insert('akun_siswa', $data);
        return;
    }

    public function hapusSiswa($id)
    {
        $data = [
            "deleted" => date("Y-m-d H:i:s")." - ".$this->session->userdata('id_user')
        ];

        $this->db->where('id_siswa', $id);
        $this->db->update('siswa', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}