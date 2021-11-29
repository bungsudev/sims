<!-- Hero Start -->
<section class="bg-half-170 d-table w-100" style="background: url('<?= base_url(); ?>assets/img/artikel/<?= $detail['images'] ?>') no-repeat center; background-size: cover;">
    <div class="bg-overlay bg-gradient-overlay"></div>
    <div class="container">
        <div class="row g-0 align-items-center mt-5">
            <div class="col-12">
                <div class="title-heading">
                    <div class="col-md-8">
                    <h5 class="heading fw-semibold page-heading text-white"><?= $detail['judul'] ?></h5>
                    </div>

                    <ul class="list-inline text-start mb-0 mt-4">
                        <li class="list-inline-item me-md-5 me-4 me-sm-0 mt-4">
                            <span class="text-white-50 d-block">Author</span>
                            <a href="blog-author.html" class="text-white"><?= $detail['nama'] ?></a>
                        </li>

                        <li class="list-inline-item me-md-5 me-4 me-sm-0 mt-4">
                            <span class="text-white-50 d-block">Date</span>
                            <span class="text-white"><?= date('d M Y / H:i', strtotime($detail['created_date'])) ?></span>
                        </li>

                        <li class="list-inline-item me-md-5 me-4 me-sm-0 mt-4">
                            <span class="text-white-50 d-block">Kategori</span>
                            <span class="text-white"><?= $detail['nama_kategori'] ?></span>
                        </li>
                    </ul>
                </div>

                <div class="position-absolute top-50 end-0 d-none d-md-block">
                    <nav aria-label="breadcrumb" class="d-flex" style="transform: rotate(-90deg);">
                        <ul class="breadcrumb breadcrumb-muted mb-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="#">Artikel</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail</li>
                        </ul>
                    </nav>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- Hero End -->

<section class="section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6">
                <div class="card">
                    <div class="card-body shadow rounded">
                        <h4><?= $detail['judul'] ?></h4>
                        <p class="text-muted"><?= $detail['konten'] ?></p>
                    
                        <p class="mt-5 mb-2">Tags : </p>
                        <?php 
                            $tags = explode(',',$detail['id_tag']);
                            $nama_tags = '';
                            foreach($tags as $row){
                                $list_tags = $this->db->get_where('tag', array('id_tag'=> $row))->row_array();
                                echo '<a href="javascript:void(0)" class="badge bg-primary me-1">'.$list_tags['nama_tag'].'</a>';
                            } 
                        ?>
                    </div>
                </div>

                <div class="card shadow rounded border-0 mt-5">
                    <div class="card-body">
                        <h5 class="card-title mb-0">Related News :</h5>

                        <div class="row mt-2">
                            <?php 
                                $related = $this->db->get_where('artikel', array('id_kategori'=> $detail['id_kategori']), 2)->result_array();

                                foreach($related as $row) {
                                $kategori = $this->db->get_where('kategori', array('id_kategori'=> $row['id_kategori']))->row_array();
                            ?>
                            <div class="col-lg-6 mt-4 pt-2">
                                <div class="card blog blog-primary shadow rounded overflow-hidden">
                                    <div class="image position-relative overflow-hidden">
                                        <img src="<?= base_url(); ?>assets/img/artikel/<?= $row['images'] ?>" class="img-fluid" alt="" style="width: 100%;object-fit: cover;height: 200px;">
        
                                        <div class="blog-tag">
                                            <a href="javascript:void(0)" class="badge bg-light"><?= $kategori['nama_kategori'] ?></a>
                                        </div>
                                    </div>
        
                                    <div class="card-body content">
                                        <a href="<?= base_url() ?>artikel/<?= $row['slug'] ?>" class="h5 title text-dark d-block mb-3"><?= word_limiter($row['judul'], 5) ?></a>
                                        <a href="<?= base_url() ?>artikel/<?= $row['slug'] ?>" class="link text-dark">Selengkapnya <i class="uil uil-arrow-right align-middle"></i></a>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <?php } ?>
                        </div><!--end row-->
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-4 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="sidebar sticky-bar ms-lg-4">

                    <!-- RECENT POST -->
                    <div class="widget mt-4 pt-2">
                        <div class="rounded p-4 shadow bg-white">
                            <h6 class="widget-title font-weight-bold pt-2 pb-2 px-2 shadow bg-light rounded"><?php if($detail['id_kategori'] == '10') { echo "Wisata Desa"; }else{ echo "Artikel Terkini"; } ?></h6>
                            <?php if($detail['id_kategori'] == '10') { ?>
                                <?php foreach($recentwisata as $row) { ?>
                                <div class="mt-4">
                                    <div class="d-flex align-items-center">
                                        <img src="<?= base_url(); ?>assets/img/artikel/<?= $row['images'] ?>" class="avatar avatar-small rounded" style="width: 100px;object-fit: cover;">
                                        <div class="flex-1 ms-3">
                                            <a href="<?= base_url() ?>artikel/<?= $row['slug'] ?>" class="d-block title text-dark"><?= word_limiter($row['judul'],5) ?></a>
                                            <span class="text-muted"><?= date('d M Y', strtotime($row['created_date'])) ?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            <?php }else{ ?>
                                <?php foreach($recent as $row) { ?>
                                <div class="mt-4">
                                    <div class="d-flex align-items-center">
                                        <img src="<?= base_url(); ?>assets/img/artikel/<?= $row['images'] ?>" class="avatar avatar-small rounded" style="width: 100px;object-fit: cover;">
                                        <div class="flex-1 ms-3">
                                            <a href="<?= base_url() ?>artikel/<?= $row['slug'] ?>" class="d-block title text-dark"><?= word_limiter($row['judul'],5) ?></a>
                                            <span class="text-muted"><?= date('d M Y', strtotime($row['created_date'])) ?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
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