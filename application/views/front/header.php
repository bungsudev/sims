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