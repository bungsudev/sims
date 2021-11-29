<!-- Start -->
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title pb-2">
                    <h6 class="text-primary">Artikel</h6>
                    <h4 class="title fw-semibold mt-2 mb-3">Informasi Terkini</h4>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row justify-content-center">
            <?php foreach($artikel as $row) { ?>
            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                <div class="card blog blog-primary shadow rounded overflow-hidden">
                    <div class="image position-relative overflow-hidden">
                        <img src="<?= base_url(); ?>assets/img/artikel/<?= $row['images'] ?>" class="img-fluid" alt="" style="width: 100%;object-fit: cover;height: 200px;">

                        <div class="blog-tag">
                            <a href="<?= base_url() ?>artikel/<?= $row['slug'] ?>" class="badge bg-light"><?= $row['nama_kategori'] ?></a>
                        </div>
                    </div>

                    <div class="card-body content">
                        <a href="<?= base_url() ?>artikel/<?= $row['slug'] ?>" class="h5 title text-dark d-block mb-0 text-capitalize"><?= word_limiter($row['judul'], 7) ?></a>
                        <p class="text-muted mt-2 mb-2"><?= word_limiter($row['konten'], 5) ?></p>
                        <a href="<?= base_url() ?>artikel/<?= $row['slug'] ?>" class="link text-dark">Selengkapnya <i class="uil uil-arrow-right align-middle"></i></a>
                    </div>
                </div>
            </div><!--end col-->
            <?php } ?>
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End -->

<!-- Start -->
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title pb-2">
                    <h6 class="text-primary">Wisata Desa</h6>
                    <h4 class="title fw-semibold mt-2 mb-3">Temukan hal menarik</h4>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row justify-content-center">
            <?php foreach($wisata as $row) { ?>
            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                <div class="card blog blog-primary shadow rounded overflow-hidden">
                    <div class="image position-relative overflow-hidden">
                        <img src="<?= base_url(); ?>assets/img/artikel/<?= $row['images'] ?>" class="img-fluid" alt="" style="width: 100%;object-fit: cover;height: 200px;">

                        <div class="blog-tag">
                            <a href="<?= base_url() ?>artikel/<?= $row['slug'] ?>" class="badge bg-light"><?= $row['nama_kategori'] ?></a>
                        </div>
                    </div>

                    <div class="card-body content">
                        <a href="<?= base_url() ?>artikel/<?= $row['slug'] ?>" class="h5 title text-dark d-block mb-0 text-capitalize"><?= word_limiter($row['judul'], 7) ?></a>
                        <p class="text-muted mt-2 mb-2"><?= word_limiter($row['konten'], 5) ?></p>
                        <a href="<?= base_url() ?>artikel/<?= $row['slug'] ?>" class="link text-dark">Selengkapnya <i class="uil uil-arrow-right align-middle"></i></a>
                    </div>
                </div>
            </div><!--end col-->
            <?php } ?>
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End -->

<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title pb-2">
                    <h6 class="text-primary">Pejabat</h6>
                    <h4 class="title fw-semibold mt-2 mb-3">Perangkat Desa</h4>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        <div class="row">
            <?php foreach($pejabat as $row){ ?>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card team team-primary rounded-0 team-two overflow-hidden shadow">
                    <div class="team-image">
                        <img src="<?= base_url(); ?>assets/img/pejabat/<?= $row['foto'] ?>" class="img-fluid" alt="" style="width: 100%;object-fit: cover;height: 350px;">
                        <div class="overlay"></div>
                    </div>
                    <div class="team-content">
                        <a href="<?= base_url() ?>home/detail_pejabat/<?= $row['id_pejabat'] ?>" class="h6 text-uppercase d-block mb-0 text-white"><?= $row['nama_lengkap'] ?></a>
                        <small class="text-white"><?= $row['jabatan'] ?></small>
                    </div>
                </div>
            </div><!--end col-->
            <?php } ?>

        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End -->

<!-- Start -->
<section class="section">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title pb-2">
                    <h6 class="text-primary">Galleri</h6>
                    <h4 class="title fw-semibold mt-2 mb-3">Kegiatan Desa</h4>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        <div class="row">
            <div class="col-12">
                <div class="tiny-five-item">
                    <?php foreach($galleri as $row) { ?>
                    <div class="tiny-slide">
                        <div class="card portfolio portfolio-classic portfolio-primary m-2 rounded overflow-hidden">
                            <div class="card-img position-relative">
                                <img src="<?= base_url(); ?>assets/img/galleri/<?= $row['images'] ?>" class="img-fluid" alt="" style="width: 100%;object-fit: cover;height: 200px;">
                                <div class="card-overlay"></div>

                                <div class="pop-icon">
                                    <a href="<?= base_url(); ?>assets/img/galleri/<?= $row['images'] ?>" class="btn btn-pills btn-icon lightbox"><i class="uil uil-camera"></i></a>
                                </div>
                            </div>
                            <div class="content pt-3">
                                <a href="portfolio-detail-one.html" class="text-dark h6 mb-0 d-block title"><?= $row['caption'] ?></a>
                            </div>
                        </div>
                    </div><!--end col-->
                    <?php } ?>

                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End -->