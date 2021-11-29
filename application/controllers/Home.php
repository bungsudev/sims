<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Home_m');
	}

    public function index()
	{
        $data['title'] = 'Beranda';
        $data['header'] = 'front/header-home';
        $data['content'] = 'front/home';
        $data['desa'] = $this->Home_m->detailIdentitasDesa();
        $data['artikel'] = $this->Home_m->getArtikel();
        $data['wisata'] = $this->Home_m->getArtikelByWisata();
        $data['profil'] = $this->Home_m->getprofil();
        $data['pejabat'] = $this->Home_m->getPejabat();
        $data['galleri'] = $this->Home_m->getGalleri();
        $this->load->view('front/layout', $data);
	}

    public function artikel(){
        $data['title'] = 'Artikel';
        $data['header'] = 'front/header';
        $data['content'] = 'front/list-artikel';
        $data['desa'] = $this->Home_m->detailIdentitasDesa();
        $data['artikel'] = $this->Home_m->getArtikel();
        $data['profil'] = $this->Home_m->getprofil();
        $data['recent'] = $this->Home_m->getRecentArtikel();
        $this->load->view('front/layout', $data);
    }
    

    public function getArtikel(){
        $page =  $_GET['page'];
        $blogs = $this->Home_m->pagesArtikel($page);
        if($blogs !=null){
        	foreach($blogs as $blog){
        	echo "
            <div class='col-lg-6 mb-4 pb-2'>
                <div class='card blog blog-primary shadow rounded overflow-hidden'>
                    <div class='image position-relative overflow-hidden'>
                        <img src='assets/img/artikel/".$blog->images."' class='img-fluid' alt='' style='width: 100%;object-fit: cover;height: 200px;'>

                        <div class='blog-tag'>
                            <a href='#' class='badge bg-light'>".$blog->nama_kategori."</a>
                        </div>
                    </div>

                    <div class='card-body content'>
                        <a href='artikel/".$blog->slug."' class='h5 title text-dark d-block mb-0'>".word_limiter($blog->judul, 7)."</a>
                        <p class='text-muted mt-2 mb-2'>".word_limiter($blog->konten, 5)."</p>
                        <a href='artikel/".$blog->slug."' class='link text-dark'>Selengkapnya <i class='uil uil-arrow-right align-middle'></i></a>
                    </div>
                </div>
            </div>
        	";
        	}
        	exit;
        }else{
        	echo "
        		<script>
        			$('#load_more').hide();
        		</script>
        		<div class='col-md-12'><h5 class='text-center'> Artikel tidak ditemukan!</h5> </div>
        	";

        }
        
    }

    public function wisata(){
        $data['title'] = 'Wisata Desa';
        $data['header'] = 'front/header';
        $data['content'] = 'front/list-wisata';
        $data['desa'] = $this->Home_m->detailIdentitasDesa();
        $data['artikel'] = $this->Home_m->getArtikel();
        $data['profil'] = $this->Home_m->getprofil();
        $data['recentwisata'] = $this->Home_m->getRecentWisata();
        $this->load->view('front/layout', $data);
    }

    public function getWisata(){
        $page =  $_GET['page'];
        $blogs = $this->Home_m->pagesWisata($page);
        if($blogs !=null){
        	foreach($blogs as $blog){
        	echo "
            <div class='col-lg-6 mb-4 pb-2'>
                <div class='card blog blog-primary shadow rounded overflow-hidden'>
                    <div class='image position-relative overflow-hidden'>
                        <img src='assets/img/artikel/".$blog->images."' class='img-fluid' alt='' style='width: 100%;object-fit: cover;height: 200px;'>

                        <div class='blog-tag'>
                            <a href='#' class='badge bg-light'>".$blog->nama_kategori."</a>
                        </div>
                    </div>

                    <div class='card-body content'>
                        <a href='artikel/".$blog->slug."' class='h5 title text-dark d-block mb-0'>".word_limiter($blog->judul, 7)."</a>
                        <p class='text-muted mt-2 mb-2'>".word_limiter($blog->konten, 5)."</p>
                        <a href='artikel/".$blog->slug."' class='link text-dark'>Selengkapnya <i class='uil uil-arrow-right align-middle'></i></a>
                    </div>
                </div>
            </div>
        	";
        	}
        	exit;
        }else{
        	echo "
        		<script>
        			$('#load_more').hide();
        		</script>
        		<div class='col-md-12'><h5 class='text-center'> Data tidak ditemukan!</h5> </div>
        	";

        }
        
    }

    public function search(){
        $keyword = strip_tags(htmlspecialchars($this->input->get('keyword',TRUE),ENT_QUOTES));
		$result = $this->Home_m->searchArtikel($keyword);
        if(count($result) > 0){
            $data['result'] = $result;
            $data['result_title'] = 'Hasil Pencarian :'.' "'.$keyword.'"';
        }else{
            $data['result'] = $result;
            $data['result_title'] = 'Hasil Pencarian : "Tidak ditemukan"';
        }
        $data['title'] = 'Hasil Pencarian';
        $data['header'] = 'front/header';
        $data['content'] = 'front/search-artikel';
        $data['desa'] = $this->Home_m->detailIdentitasDesa();
        $data['artikel'] = $this->Home_m->getArtikel();
        $data['profil'] = $this->Home_m->getprofil();
        $data['recent'] = $this->Home_m->getRecentArtikel();
        $this->load->view('front/layout', $data);
    }

    public function profil($slug){
        $data['title'] = 'Profil Desa';
        $data['header'] = 'front/header';
        $data['content'] = 'front/detail-profil';
        $data['desa'] = $this->Home_m->detailIdentitasDesa();
        $data['artikel'] = $this->Home_m->getArtikel();
        $data['profil'] = $this->Home_m->getprofil();
        $data['detail'] = $this->Home_m->detailProfil($slug);
        $data['recent'] = $this->Home_m->getRecentArtikel();
        $this->load->view('front/layout', $data);
    }

    public function detail_artikel($slug){
        $data['title'] = 'Artikel';
        $data['header'] = 'front/header';
        $data['content'] = 'front/detail-artikel';
        $data['desa'] = $this->Home_m->detailIdentitasDesa();
        $data['artikel'] = $this->Home_m->getArtikel();
        $data['profil'] = $this->Home_m->getprofil();
        $data['detail'] = $this->Home_m->detailArtikel($slug);
        $data['recent'] = $this->Home_m->getRecentArtikel();
        $data['recentwisata'] = $this->Home_m->getRecentWisata();
        $this->load->view('front/layout', $data);
    }

    public function pejabatdesa(){
        $data['title'] = 'Pejabat Desa';
        $data['header'] = 'front/header';
        $data['content'] = 'front/pejabat-desa';
        $data['desa'] = $this->Home_m->detailIdentitasDesa();
        $data['artikel'] = $this->Home_m->getArtikel();
        $data['profil'] = $this->Home_m->getprofil();
        $data['pejabat'] = $this->Home_m->getPejabat();
        $this->load->view('front/layout', $data);
    }

    public function detail_pejabat($id_pejabat){
        $data['title'] = 'Detail Pejabat Desa';
        $data['header'] = 'front/header';
        $data['content'] = 'front/detail-pejabat';
        $data['desa'] = $this->Home_m->detailIdentitasDesa();
        $data['artikel'] = $this->Home_m->getArtikel();
        $data['profil'] = $this->Home_m->getprofil();
        $data['pejabat'] = $this->Home_m->getPejabat();
        $data['detail'] = $this->Home_m->detailPejabat($id_pejabat);
        $this->load->view('front/layout', $data);
    }

    public function kontak(){
        $data['title'] = 'Kontak Kami';
        $data['header'] = 'front/header';
        $data['content'] = 'front/kontak-kami';
        $data['desa'] = $this->Home_m->detailIdentitasDesa();
        $data['artikel'] = $this->Home_m->getArtikel();
        $data['profil'] = $this->Home_m->getprofil();
        $this->load->view('front/layout', $data);
    }

}