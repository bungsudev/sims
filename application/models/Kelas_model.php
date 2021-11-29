<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelas_model extends CI_Model {

    //server side
    var $table = 'kelas'; //nama tabel dari database
    var $column_order = array(null, 'kelas.nama_kelas'); //field yang ada di table user
    var $column_search = array('kelas.nama_kelas'); //field yang diizin untuk pencarian 
    var $order = array('kelas.id_kelas' => 'desc'); // default order
    
    private function get_query()
    {
        $id_sekolah = $this->session->userdata('id_sekolah');
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->where('kelas.id_sekolah', $id_sekolah);
 
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

    public function tambah(){
        $data = array(
            'id_sekolah' => $this->session->userdata('id_sekolah'),
            'nama_kelas' => $this->input->post('nama_kelas'),
            'created_by' => $this->session->userdata('id_user'),
            'created' => date("Y-m-d H:i:s"),
            'edited_by' => $this->session->userdata('id_user'),
        );
        $this->db->insert('kelas',$data);
        return;
    }

    public function edit_not_with_file(){
        $data = array(
            'nama_kelas' => $this->input->post('nama_kelas'),
            'created_by' => $this->session->userdata('id_user'),
            'created' => date("Y-m-d H:i:s"),
            'edited_by' => $this->session->userdata('id_user'),
        );
        $this->db->where('id_kelas', $this->input->post('id_kelas'));
        $this->db->update('kelas',$data);
        return;
    }

    public function detail($id_kelas){
        $this->db->where('id_kelas',$id_kelas);
        return $this->db->get('kelas')->row_array();
    }

    public function listKelas(){
        $this->db->where('id_sekolah', $this->session->userdata('id_sekolah'));
        $this->db->where('deleted', NULL);
        return $this->db->get('kelas')->result_array(); 
    }
    public function delete($id_kelas){
        $this->db->where('id_kelas',$id_kelas);
        $this->db->delete('kelas');

    }
}