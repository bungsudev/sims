<?php $this->load->view($header); ?>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3><?= $title ?></h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item"><?= $title ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <?php $this->load->view($content); ?>
    </div>
    <!-- Container-fluid Ends-->
</div>
<!-- footer start-->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 footer-copyright">
                <p class="mb-0">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © SIMS.
                </p>
            </div>
            <div class="col-md-6">
                <p class="pull-right mb-0">Created <i class="fa fa-heart font-danger"></i> <a href="#" target="_blank" class="text-reset">Agara.id</a></p>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<!-- latest jquery-->
<script src="<?= base_url(); ?>assets/js/jquery-3.5.1.min.js"></script>
<!-- feather icon js-->
<script src="<?= base_url(); ?>assets/js/icons/feather-icon/feather.min.js"></script>
<script src="<?= base_url(); ?>assets/js/icons/feather-icon/feather-icon.js"></script>
<!-- Sidebar jquery-->
<script src="<?= base_url(); ?>assets/js/sidebar-menu.js"></script>
<script src="<?= base_url(); ?>assets/js/config.js"></script>
<!-- Bootstrap js-->
<script src="<?= base_url(); ?>assets/js/bootstrap/popper.min.js"></script>
<script src="<?= base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>

<!-- Plugins JS start-->
<script src="<?= base_url(); ?>assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/js/datatable/datatables/datatable.custom.js"></script>
<script src="<?= base_url(); ?>assets/js/tooltip-init.js"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="<?= base_url(); ?>assets/js/script.js"></script>
<!-- login js-->
<!-- Plugin used-->
</body>

</html>