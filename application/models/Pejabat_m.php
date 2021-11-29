<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pejabat_m extends CI_Model {
    //server side
    var $table = 'pejabat'; //nama tabel dari database
    var $column_order = array(null, null, 'penduduk.nama_lengkap','penduduk.tempat_lahir','jabatan.golongan','jabtan.jabatan','penduduk.pendidikan'); //field yang ada di table user
    var $column_search = array('pejabat.id_pejabat','pejabat.nik','pejabat.golongan','pejabat.jabatan','pejabat.no_sk_pengangkatan','pejabat.tgl_sk_pengangkatan','pejabat.no_sk_berhenti','pejabat.tgl_sk_berhenti','pejabat.masa_jabatan','pejabat.status','penduduk.nama_lengkap', 'penduduk.pendidikan'); //field yang diizin untuk pencarian 
    var $order = array('pejabat.id_pejabat' => 'desc'); // default order
    
    private function get_query()
    {
        $id_sekolah = $this->session->userdata('id_sekolah');
        $this->db->select('pejabat.*, penduduk.*, pejabat.id_pejabat AS id');
        $this->db->from('pejabat');
        $this->db->join('penduduk','pejabat.nik = penduduk.nik','left');
        $this->db->where('pejabat.id_sekolah', $id_sekolah);
        $this->db->where('pejabat.deleted', NULL);

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
        $query = $this->db->query("SELECT * FROM pejabat where id_sekolah = '$id_sekolah'");
        return $query->row();
    }

    public function dataPejabatDetail($id_pejabat) {
        $id_sekolah = $this->session->userdata('id_sekolah');
        $query = $this->db->query("SELECT * FROM pejabat where id_pejabat = '$id_pejabat' AND id_sekolah = '$id_sekolah'");
        return $query->row();
    }
    public function select2DataPejabat() {
        $id_sekolah = $this->session->userdata('id_sekolah');
        $query = $this->db->query("SELECT a.*, b.* FROM pejabat a left join penduduk b on a.nik = b.nik where a.id_sekolah = '$id_sekolah'");
        return $query->result_array();
    }

    public function simpan($nama_gambar)
    {
        $data = [
            "id_sekolah" => $this->session->userdata('id_sekolah'),
            "nik" => $this->input->post('cariNik'),
            "nip" => $this->input->post('nip'),
            "golongan" => $this->input->post('golongan'),
            "no_hp" => $this->input->post('no_hp'),
            "no_sk_pengangkatan" => $this->input->post('no_sk_pengangkatan'),
            "tgl_sk_pengangkatan" => $this->input->post('tgl_sk_pengangkatan'),
            "no_sk_berhenti" => $this->input->post('no_sk_berhenti'),
            "tgl_sk_berhenti" => $this->input->post('tgl_sk_berhenti'),
            "masa_jabatan" => $this->input->post('masa_jabatan'),
            "jabatan" => $this->input->post('jabatan'),
            "tupoksi" => $this->input->post('tupoksi'),
            "status" => 'aktif',
            "foto" => $nama_gambar,
            "created" => date("Y-m-d H:i:s"),
            "created_by" => $this->session->userdata('id_user')
        ];
        $this->db->insert('pejabat', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function edit($nama_gambar, $id)
    {
        $data = [
            "nip" => $this->input->post('nip'),
            "golongan" => $this->input->post('golongan'),
            "no_hp" => $this->input->post('no_hp'),
            "no_sk_pengangkatan" => $this->input->post('no_sk_pengangkatan'),
            "tgl_sk_pengangkatan" => $this->input->post('tgl_sk_pengangkatan'),
            "no_sk_berhenti" => $this->input->post('no_sk_berhenti'),
            "tgl_sk_berhenti" => $this->input->post('tgl_sk_berhenti'),
            "masa_jabatan" => $this->input->post('masa_jabatan'),
            "jabatan" => $this->input->post('jabatan'),
            "tupoksi" => $this->input->post('tupoksi'),
            "status" => $this->input->post('status'),
            "edited" => date("Y-m-d H:i:s"),
            "edited_by" => $this->session->userdata('id_user')
        ];

        //cek update tanpa gambar
        (!empty($nama_gambar))? $data = array_merge($data, ["foto" => $nama_gambar]): '';

        $this->db->where('id_pejabat', $id);
        $this->db->update('pejabat', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}