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
            <div class="col-md-3">
                <img src="<?= base_url(); ?>assets/img/pejabat/<?= $detail['foto'] ?>" alt=""  style="width: 100%;object-fit: cover;height: 350px;">
            </div>
            <div class="col-md-9">
                <h4 class="mb-3">Informasi Data Diri</h4>
                <table class="table">
                    <tbody>
                        <tr>
                            <td width="200"><strong>Nama Lengkap</strong></td>
                            <td width="10">:</td>
                            <td><?= $detail['nama_lengkap'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>NIK</strong></td>
                            <td>:</td>
                            <td><?= $detail['nip'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Jabatan</strong></td>
                            <td>:</td>
                            <td><?= $detail['jabatan'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Tempat, Tgl Lahir</strong></td>
                            <td>:</td>
                            <td><?= $detail['tempat_lahir'] ?>, <?= $detail['tgl_lahir'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Agama</strong></td>
                            <td>:</td>
                            <td><?= $detail['agama'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Pendidikan</strong></td>
                            <td>:</td>
                            <td><?= $detail['pendidikan'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Nomor SK</strong></td>
                            <td>:</td>
                            <td><?= $detail['no_sk_pengangkatan'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Tanggal SK</strong></td>
                            <td>:</td>
                            <td><?= $detail['tgl_sk_pengangkatan'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Status</strong></td>
                            <td>:</td>
                            <td><?= $detail['status'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End -->