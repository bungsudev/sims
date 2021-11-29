<div class="row">
    <div class="col-md-12 mb-3">
        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalAdd"><i class="uil-plus mr-1"></i> Tambah Data</button>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatables" class="table">
                        <thead>
                            <tr>
                                <th width="10">No.</th>
                                <th width="10"></th>
                                <th>Nama Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="insert" enctype="multipart/form-data" novalidate>
                <div class="row">
                    <div class="form-group mb-3 col-md-12">
                        <label class="form-control-label">
                            Nama Kelas <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" name="nama_kelas" id="nama_kelas">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="save"><i class="fa fa-save mr-1"></i> Simpan</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-times mr-1"></i> Batal</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="modalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="update" enctype="multipart/form-data">
                <input type="hidden" name="id_kelas" id="id_kelas">
                <div class="row">
                    <div class="form-group mb-3 col-md-12">
                        <label class="form-control-label">
                            Nama Kelas <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" name="nama_kelas" id="nama_kelas2">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="edit"><i class="fa fa-save mr-1"></i> Update</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-times mr-1"></i> Batal</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- NOTIFICATION -->
<?php if($this->session->flashdata('message')) { ?>
    <script type="text/javascript">
        $(document).ready(function() {
            toastr.options.timeOut = 3000;
            toastr.options.progressBar = true;
            toastr.options.positionClass = "toast-top-right";
            toastr.success('<?= $this->session->flashdata('message') ?>');
        });
    </script>
<?php } ?>
<!-- END NOTIFICATION -->

<script>
    //datatables
    function tampil() {
        $('#datatables').DataTable().clear();
        $('#datatables').DataTable().destroy();
        $('#datatables').DataTable({  
            "processing": true, 
            "serverSide": true, 
            "order": [], 
            
            "ajax": {
                "url": "<?php echo site_url('kelas/get')?>",
                "type": "POST"
            },

            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],
        });
    }
</script>

<script>
    $(document).ready(function(){
        tampil();
        // SAVE
        $('#save').click(function(){
            if($('#nama_kelas').val() == ""){
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: "Form (*) tidak boleh kosong!",
                });
            }else{
                $.ajax({
                    url: '<?= base_url() ?>kelas/insert',
                    type: "POST",
                    data : $("#insert").serialize(),
                    success:function(data) {
                        // $.notify({
                        //     title: 'Berhasil!',
                        //     message: 'Data di simpan.'
                        // }, {
                        //     type: 'success',
                        //     allow_dismiss: true,
                        //     newest_on_top: false,
                        //     mouse_over: false,
                        //     showProgressbar: false,
                        //     spacing: 10,
                        //     timer: 2000,
                        //     placement: {
                        //         from: 'top',
                        //         align: 'right'
                        //     },
                        //     offset: {
                        //         x: 30,
                        //         y: 30
                        //     },
                        //     delay: 1000,
                        //     z_index: 10000,
                        //     animate: {
                        //         enter: 'animated bounceIn',
                        //         exit: 'animated flash'
                        //     }
                        // });
                        $('#modalAdd').modal('toggle');
                        $("#insert")[0].reset();
                        tampil();
                    }    
                });
            }
        });

        $("tbody").on("click", '.edit', function () {
            $("#id_kamar").val($(this).attr('id_kamar'));
            $("#id_kelas").val($(this).attr('id_kelas'));
            $("#nama_kelas2").val($(this).attr('nama_kelas'));
        });

        $('#edit').click(function(){
            if($('#id_kelas2').val() == "" || $('#nama_kelas2').val() == ""){
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: "Form (*) tidak boleh kosong!",
                });
            }else{
                $.ajax({
                    url: '<?= base_url() ?>kelas/edited/',
                    type: "POST",
                    data : $("#update").serialize(),
                    success:function(data) {
                        // $.notify({
                        //     title: 'Berhasil!',
                        //     message: 'Data di edit.'
                        // }, {
                        //     type: 'success',
                        //     allow_dismiss: true,
                        //     newest_on_top: false,
                        //     mouse_over: false,
                        //     showProgressbar: false,
                        //     spacing: 10,
                        //     timer: 2000,
                        //     placement: {
                        //         from: 'top',
                        //         align: 'right'
                        //     },
                        //     offset: {
                        //         x: 30,
                        //         y: 30
                        //     },
                        //     delay: 1000,
                        //     z_index: 10000,
                        //     animate: {
                        //         enter: 'animated bounceIn',
                        //         exit: 'animated flash'
                        //     }
                        // });
                        $('#modalEdit').modal('toggle');
                        $("#update")[0].reset();
                        tampil();
                    }    
                });
            }
        });

        $("tbody").on("click", '.hapus', function () {
            if(confirm("Apakah anda yakin ingin menghapus data tersebut?")){
                var id_kamar = $(this).data('id');
                $.ajax({
                    url: '<?= base_url() ?>kelas/delete/' +id_kamar,
                    type: "POST",
                    data : { id_kamar:id_kamar },
                    success:function(response) {
                        toastr.options.progressBar = true;
                        toastr.options.positionClass = "toast-top-right";
                        toastr.success('Data berhasil dihapus!');
                        tampil();
                    }    
                });
            }else{
                return false;
            }
        });
    });
</script>