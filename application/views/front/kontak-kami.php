<section class="bg-half-170 d-table w-100" style="background: url('<?= base_url(); ?>front/images/bg/about.jpg') center;">
    <div class="bg-overlay bg-gradient-overlay"></div>
        <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-12">
                <div class="title-heading text-center">
                    <h5 class="heading fw-semibold mb-0 page-heading text-white"><?= $title ?></h5>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="position-middle-bottom">
            <nav aria-label="breadcrumb" class="d-block">
                <ul class="breadcrumb breadcrumb-muted mb-0 p-0">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                </ul>
            </nav>
        </div>
    </div><!--end container-->
</section>

<!-- Start -->
<section class="section pb-0">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card border-0 text-center features feature-clean bg-transparent">
                    <div class="icons text-primary text-center mx-auto">
                        <i class="uil uil-phone d-block rounded h3 mb-0"></i>
                    </div>
                    <div class="content mt-3">
                        <h5 class="footer-head">Phone</h5>
                        <p class="text-muted"></p>
                        <a href="#" class="text-foot"><?= $desa['telepon'] ?></a>
                    </div>
                </div>
            </div><!--end col-->
            
            <div class="col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="card border-0 text-center features feature-clean bg-transparent">
                    <div class="icons text-primary text-center mx-auto">
                        <i class="uil uil-envelope d-block rounded h3 mb-0"></i>
                    </div>
                    <div class="content mt-3">
                        <h5 class="footer-head">Email</h5>
                        <a href="mailto:<?= $desa['email'] ?>" class="text-foot"><?= $desa['email'] ?></a>
                    </div>
                </div>
            </div><!--end col-->
            
            <div class="col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="card border-0 text-center features feature-clean bg-transparent">
                    <div class="icons text-primary text-center mx-auto">
                        <i class="uil uil-map-marker d-block rounded h3 mb-0"></i>
                    </div>
                    <div class="content mt-3">
                        <h5 class="footer-head">Location</h5>
                        <p class="text-muted"><?= $desa['alamat'] ?></p>
                        <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin"
                            data-type="iframe" class="video-play-icon text-foot lightbox">View on Google map</a>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    <div class="container-fluid mt-100 mt-60">
        <div class="row">
            <div class="col-12 p-0">
                <div class="card map border-0">
                    <div class="card-body p-0">
                        <iframe src="<?= $desa['maps'] ?>" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End -->