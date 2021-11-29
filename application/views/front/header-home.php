<style>
    .title-heading p{
        color: #fff !important;
        font-size: 16px !important;
    }
</style>
<!-- Navbar STart -->
<header id="topnav" class="defaultscroll sticky">
    <div class="container">
        <!-- Logo container-->
        <a class="logo" href="<?= base_url(); ?>">
            <img src="<?= base_url(); ?>assets/img/<?= $desa['lambang_desa'] ?>" class="l-dark" height="60" alt="">
            <img src="<?= base_url(); ?>assets/img/<?= $desa['lambang_desa'] ?>" class="l-light" height="60" alt="">
        </a>
        <!-- End Logo container-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <ul class="buy-button list-inline mb-0">
            <li class="list-inline-item search-icon mb-0">
                <div class="dropdown">
                    <button type="button" class="btn btn-link text-decoration-none dropdown-toggle mb-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="uil uil-search h5 text-dark nav-light-icon-dark mb-0"></i>
                        <i class="uil uil-search h5 text-white nav-light-icon-white mb-0"></i>
                    </button>
                    <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow rounded border-0 mt-4 py-0" style="width: 300px;">
                        <form method="GET" action="<?php echo base_url();?>search" class="p-4">
                            <input type="text" id="text" name="keyword" class="form-control border bg-white" placeholder="Search...">
                        </form>
                    </div>
                </div>
            </li>
        </ul>

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu nav-right nav-light">
                <li><a href="<?= base_url(); ?>" class="sub-menu-item">Beranda</a></li>
                <li class="has-submenu parent-parent-menu-item">
                    <a href="javascript:void(0)">Profil Desa</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <?php foreach($profil as $row) { ?>
                            <li><a href="<?= base_url() ?>profil/<?= $row['slug'] ?>" class="sub-menu-item"><?= $row['page_name'] ?></a></li>
                        <?php } ?>
                        <li><a href="#" class="sub-menu-item">Inventaris</a></li>
                    </ul>
                </li>
                <li><a href="<?= base_url(); ?>pejabat-desa" class="sub-menu-item">Pemerintahan Desa</a></li>
                <li class="has-submenu parent-parent-menu-item">
                    <a href="javascript:void(0)">Data Desa</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li><a href="#" class="sub-menu-item">Wilayah Administrasi</a></li>
                        <li><a href="#" class="sub-menu-item">Data Pekerjaan</a></li>
                        <li><a href="#" class="sub-menu-item">Data Agama</a></li>
                        <li><a href="#" class="sub-menu-item">Data Jenis Kelamin</a></li>
                        <li><a href="#" class="sub-menu-item">Data Kewarganegaraan</a></li>
                        <li><a href="#" class="sub-menu-item">Data Status Penduduk</a></li>
                        <li><a href="#" class="sub-menu-item">Data Golongan Darah</a></li>
                        <li><a href="#" class="sub-menu-item">Data Riwayat Penyakit</a></li>
                        <li><a href="#" class="sub-menu-item">Data Umur</a></li>
                        <li><a href="#" class="sub-menu-item">Data Pendidikan</a></li>
                        <li><a href="#" class="sub-menu-item">Data Pengguna KB</a></li>
                    </ul>
                </li>
                <li><a href="<?= base_url(); ?>wisata-desa" class="sub-menu-item">Wisata Desa</a></li>
                <li><a href="<?= base_url(); ?>artikels" class="sub-menu-item">Artikel</a></li>
                <li><a href="<?= base_url(); ?>kontak-kami" class="sub-menu-item">Kontak Kami</a></li>
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
</header><!--end header-->
<!-- Navbar End -->

<!-- Hero Start -->
<section class="swiper-slider-hero position-relative d-block custom-height">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php foreach($artikel as $row) { ?>
            <div class="swiper-slide d-flex align-items-center overflow-hidden">
                <div class="slide-inner slide-bg-image d-flex align-items-center" data-jarallax='{"speed": 0.5}' style="background: center center; background-size: cover; background-repeat: no-repeat;" data-background="<?= base_url(); ?>assets/img/artikel/<?= $row['images'] ?>">
                    <div class="bg-overlay bg-linear-gradient"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-12">
                                <div class="title-heading">
                                    <h1 class="fw-semibold display-3 text-white title-dark mb-4"><?= word_limiter($row['judul'], 5) ?></h1>
                                    <p class="para-desc mx-auto text-white"><?= word_limiter($row['konten'], 15) ?></p>
                                    
                                    <div class="mt-4 pt-2">
                                        <a href="<?= base_url() ?>artikel/<?= $row['slug'] ?>" class="btn btn-primary">Selengkapnya</a>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end container-->
                </div><!-- end slide-inner --> 
            </div> <!-- end swiper-slide -->
            <?php } ?>
        </div>
        <!-- end swiper-wrapper -->

        <!-- swipper controls -->
        <!-- <div class="swiper-pagination"></div> -->
        <div class="swiper-button-next border rounded-circle text-center"></div>
        <div class="swiper-button-prev border rounded-circle text-center"></div>
    </div><!--end container-->
</section><!--end section-->
<!-- Hero End -->