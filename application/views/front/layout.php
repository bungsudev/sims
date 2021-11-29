<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title><?= $title ?> | Desa Digital</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
        <meta name="keywords" content="Startup, Business, Multi-uses, HTML, Clean, Modern, Creative" />
        <meta name="author" content="Shreethemes" />
        <meta name="email" content="shreethemes@gmail.com" />
        <meta name="website" content="https://shreethemes.in/" />
        <meta name="Version" content="v1.0.0" />
        <!-- favicon -->
        <link href="<?= base_url(); ?>front/images/favicon.ico" rel="shortcut icon">
        <!-- Bootstrap and other css -->
        <link href="<?= base_url(); ?>front/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>front/css/swiper.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>front/css/tobii.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>front/css/tiny-slider.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>front/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>front/css/line.css" rel="stylesheet" />
        <!-- Main Css -->
        <link href="<?= base_url(); ?>front/css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <body>   

        <?php $this->load->view($header); ?>

        <?php $this->load->view($content); ?>

        <!-- Footer Start -->
        <footer class="footer bg-footer">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-py-60">
                            <div class="row">
                                <div class="col-lg-4 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                                    <a href="#" class="logo-footer">
                                        <img src="<?= base_url(); ?>assets/img/<?= $desa['lambang_desa'] ?>" height="80" alt="">
                                    </a>
                                    <p class="mt-4"><?= $desa['tentang'] ?></p>
                                    <ul class="list-unstyled social-icon foot-social-icon mb-0 mt-4">
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="youtube" class="fea icon-sm fea-social"></i></a></li>
                                    </ul><!--end icon-->
                                </div><!--end col-->
                                
                                <div class="col-lg-2 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                    <h6 class="footer-head">Main Menu</h6>
                                    <ul class="list-unstyled footer-list mt-4">
                                        <li><a href="<?= base_url(); ?>" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Beranda</a></li>
                                        <li><a href="<?= base_url(); ?>profil/profil-wilayah-desa" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Profil Desa</a></li>
                                        <li><a href="<?= base_url(); ?>pejabat-desa" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Investasi</a></li>
                                        <li><a href="<?= base_url(); ?>pejabat-desa" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Pejabat Desa</a></li>
                                        <li><a href="<?= base_url(); ?>kontak-kami" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Kontak Kami</a></li>
                                    </ul>
                                </div><!--end col-->
                                
                                <div class="col-lg-4 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                    <h6 class="footer-head">Artikel Terkini</h6>
                                    <ul class="list-unstyled footer-list mt-4">
                                        <?php foreach($artikel as $row) { ?>
                                            <li>
                                                <a href="index.html" class="text-foot text-primary"><?= word_limiter($row['judul'],5) ?></a> <br>
                                                <span><?= $row['nama_kategori'] ?></span> -
                                                <span><?= date('d M Y', strtotime($row['created_date'])) ?></span>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div><!--end col-->

                                <div class="col-lg-2 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                    <h6 class="footer-head">Usefull Links</h6>
                                    <ul class="list-unstyled footer-list mt-4">
                                        <li><a href="index.html" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Terms of Services</a></li>
                                        <li><a href="index.html" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Privacy Policy</a></li>
                                        <li><a href="#" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Contact Us</a></li>
                                    </ul>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="footer-py-30 footer-bar bg-footer">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-center">
                                <p class="mb-0 text-muted"><script>document.write(new Date().getFullYear())</script> ©  - <?= $desa['nama_desa'] ?> Design with <i class="mdi mdi-heart text-danger"></i> by <a href="https://shreethemes.in/" target="_blank" class="text-reset">GoAgara</a>.</p>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
            </div>
        </footer><!--end footer-->
        <!-- End -->

        <!-- Back to top -->
        <a href="javascript:void(0)" onclick="topFunction()" id="back-to-top" class="back-to-top rounded-pill"><i class="mdi mdi-arrow-up"></i></a>
        <!-- Back to top -->

        <!-- javascript -->
        <script src="<?= base_url(); ?>front/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url(); ?>front/js/swiper.min.js"></script>
        <script src="<?= base_url(); ?>front/js/parallax.js"></script>
        <script src="<?= base_url(); ?>front/js/tobii.min.js"></script>
        <script src="<?= base_url(); ?>front/js/tiny-slider.js"></script>
        <script src="<?= base_url(); ?>front/js/feather.min.js"></script>
        <!-- Main Js -->
        <script src="<?= base_url(); ?>front/js/plugins.init.js"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
        <script src="<?= base_url(); ?>front/js/app.js"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
    </body>
</html>