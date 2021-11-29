<section class="bg-half-170 d-table w-100" style="background: url('<?= base_url(); ?>front/images/bg/about.jpg') center;">
    <div class="bg-overlay bg-gradient-overlay"></div>
        <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-12">
                <div class="title-heading text-center">
                    <h5 class="heading fw-semibold mb-0 page-heading text-white"><?= $detail['page_name'] ?></h5>
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

<section class="section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6">
                <div class="card">
                    <div class="card-body shadow rounded">
                        <p class="text-muted"><?= $detail['konten'] ?></p>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-4 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="sidebar sticky-bar ms-lg-4">

                    <!-- RECENT POST -->
                    <div class="widget mt-4 pt-2">
                        <div class="rounded p-4 shadow bg-white">
                            <h6 class="widget-title font-weight-bold pt-2 pb-2 px-2 shadow bg-light rounded">Artikel Terkini</h6>
                            <?php foreach($recent as $row) { ?>
                            <div class="mt-4">
                                <div class="d-flex align-items-center">
                                    <img src="<?= base_url(); ?>assets/img/artikel/<?= $row['images'] ?>" class="avatar avatar-small rounded" style="width: 100px;object-fit: cover;">
                                    <div class="flex-1 ms-3">
                                        <a href="<?= base_url() ?>artikel/<?= $row['slug'] ?>" class="d-block title text-dark"><?= word_limiter($row['judul'],5) ?></a>
                                        <span class="text-muted">15th April 2021</span>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- RECENT POST -->
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End -->