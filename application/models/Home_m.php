<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_m extends CI_Model {

    public function getArtikel(){
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->join('kategori','kategori.id_kategori = artikel.id_kategori','left');
        $this->db->order_by('artikel.created_date','desc');
        $this->db->where('artikel.id_kategori !=', '10');
        $this->db->limit(6);
        return $this->db->get()->result_array();
    }

    public function getArtikelByWisata(){
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->join('kategori','kategori.id_kategori = artikel.id_kategori','left');
        $this->db->order_by('artikel.created_date','desc');
        $this->db->where('artikel.id_kategori', '10');
        $this->db->limit(3);
        return $this->db->get()->result_array();
    }

    public function pagesArtikel($page){
        $offset = 6 * $page;
        $limit = 6;
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->join('kategori','kategori.id_kategori = artikel.id_kategori','left');
        $this->db->order_by('artikel.created_date','desc');
        $this->db->where('artikel.id_kategori !=', '10');
        $this->db->limit($limit,$offset);
        return $this->db->get()->result();
    }

    public function pagesWisata($page){
        $offset = 6 * $page;
        $limit = 6;
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->join('kategori','kategori.id_kategori = artikel.id_kategori','left');
        $this->db->order_by('artikel.created_date','desc');
        $this->db->where('artikel.id_kategori', '10');
        $this->db->limit($limit,$offset);
        return $this->db->get()->result();
    }

    public function searchArtikel($keyword){
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->join('kategori','kategori.id_kategori = artikel.id_kategori','left');
        $this->db->order_by('artikel.created_date','desc');
        $this->db->like('artikel.judul', $keyword, 'both');
        $this->db->or_like('kategori.nama_kategori', $keyword, 'both');
    	return $this->db->get()->result_array();
    }

    public function getRecentArtikel(){
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->join('kategori','kategori.id_kategori = artikel.id_kategori','left');
        $this->db->order_by('artikel.created_date','desc');
        $this->db->where('artikel.id_kategori !=', '10');
        $this->db->limit(5);
        return $this->db->get()->result_array();
    }

    public function getRecentWisata(){
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->join('kategori','kategori.id_kategori = artikel.id_kategori','left');
        $this->db->order_by('artikel.created_date','desc');
        $this->db->where('artikel.id_kategori', '10');
        $this->db->limit(5);
        return $this->db->get()->result_array();
    }
    
    public function getprofil(){
        $this->db->order_by('created_date','asc');
        return $this->db->get('profil')->result_array();
    }

    public function getPejabat(){
        $this->db->order_by('id_pejabat','asc');
        $this->db->join('penduduk','penduduk.nik = pejabat.nik','left');
        $this->db->group_by('pejabat.nik');
        return $this->db->get('pejabat')->result_array();
    }

    public function getGalleri(){
        $this->db->order_by('id_galleri','asc');
        return $this->db->get('galleri')->result_array();
    }

    public function detailArtikel($slug){
        $this->db->where('slug',$slug);
        $this->db->join('user','user.id_user = artikel.created_by','left');
        $this->db->join('kategori','kategori.id_kategori = artikel.id_kategori','left');
        return $this->db->get('artikel')->row_array();
    }

    public function detailProfil($slug){
        $this->db->where('slug',$slug);
        return $this->db->get('profil')->row_array();
    }

    public function detailIdentitasDesa(){
        $this->db->where('id_sekolah','1');
        return $this->db->get('identitas_sekolah')->row_array();
    }

    public function detailPejabat($id_pejabat) {
        $this->db->join('penduduk','penduduk.nik = pejabat.nik','left');
        $this->db->where('id_pejabat',$id_pejabat);
        return $this->db->get('pejabat')->row_array();
    }

}