<section class="bg-half-170 d-table w-100" style="background: url('<?= base_url(); ?>front/images/bg/about.jpg') center;">
    <div class="bg-overlay bg-gradient-overlay"></div>
        <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-12">
                <div class="title-heading text-center">
                    <h5 class="heading fw-semibold mb-0 page-heading text-white"><?= $result_title ?></h5>
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
<section class="section">
    <div class="container">
        <div class="row">
            <?php foreach($result as $row) { ?>
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