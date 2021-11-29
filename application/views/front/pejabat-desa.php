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

<section class="section">
    <div class="container">
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