<style>
	.has-error {
		border: 1px solid red !important;
	}

</style>
<div class="row">
	<div class="col-md-12 col-xl-12">
		<a href="<?= base_url(); ?>pejabat/aksi?act=Tambah" class="btn btn-success btn-sm mb-3"><i class="uil uil-plus"></i> Tambah Data </a>

		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-12 col-xl-12 mb-3">
						<div class="table-responsive">
							<table id="tblPejabat" class="table">
								<thead>
								<tr>
									<th class="text-center">No</th>
									<th width="50"></th>
									<th width="50">Aksi</th>
									<th class="text-center">Foto</th>
									<th>Nama Lengkap</th>
									<th>Tempat/Tanggal Lahir</th>
									<th>Golongan</th>
									<th>Jabatan</th>
									<th>Pendidikan Terakhir</th>
									<th>Nomor SK Pengangkatan</th>
									<th>Tanggal SK Pengangkatan</th>
									<th>Nomor SK Pemberhentian</th>
									<th>Tanggal SK Pemberhentian</th>
									<th>Masa/Periode Jabatan</th>
									<th>Status</th>
								</tr>
								</thead>
								<tbody></tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="mdlPejabat">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><span id="act"></span> Pejabat</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form>
					<div class="row">
						<div class="col-md-12 mb-3">
							<div class="form-group">
								<label for="nama_pejabat">Nama Pejabat</label>
								<input type="text" class="form-control required" name="nama_pejabat" id="nama_pejabat"
									placeholder='Nama Pejabat'>
							</div>
						</div>
						<div class="col-md-12 col-lg-12 mb-3">
							<label for="nik">NIK/Nama Penduduk</label>
							<select class="form-control select2 required" required id="nik"
								name="nik" style="width:100%;">
								<option value="" selected>Cari NIK/Nama Kepala Pejabat</option>
								<?php foreach ($penduduk as $key => $val): ?>
								<option value='<?= $val['nik'] ?>'><?= $val['nik'] ?> - <?= $val['nama_lengkap'] ?>
								</option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
				<button type="button" id="btnSimpan" class="btn btn-primary"><i class="bx bx-save"></i> Simpan </button>
			</div>
		</div>
	</div>
</div>

<script>
	let act, id_wilayah = '';
	$(document).ready(function () {
		$('#tblPejabat').dataTable();
		$("#nik").select2();
		get_dataPejabat();

		//button action
		$("#btnTambah").click(function () {
			act = 'Tambah';
			$("form")[0].reset();
			$("#nik").val('').trigger('change');
			$("#mdlPejabat").modal('show');
		})
		$("#btnSimpan").click(function () {
			let check = true;
			$('.required').each(function () {
				if (this.value.trim() !== '') {
					$(this).removeClass('is-invalid');
				} else {
					$(this).addClass('is-invalid');
					check = false;
				}
			})
			if ($("#nik").val() == "") {
				$(".select2-container .select2-selection--single").addClass('has-error');
			} else {
				$(".select2-container .select2-selection--single").removeClass('has-error');
			}
			if (check) {
				if (act == 'Tambah') {
					simpan(act, '');
				} else if (act == 'Edit') {
					simpan(act, id_wilayah);
				} else {
					a_error('Terjadi Kesalahan!', 'Reload Page dahulu');
				}
			}
		})

		//tbody button action
		$("#tblPejabat tbody").on("click", "#btnEdit", function () {
			act = "Edit";
			$("#act").text(act);
			$("form")[0].reset();
			$("#mdlPejabat").modal('show');
			id_wilayah = $(this).data("id");
			get_detailPejabat(id_wilayah)
		})
		$("#tblPejabat tbody").on("click", "#btnHapus", function () {
			id_wilayah = $(this).data("id");
			hapusPejabat(id_wilayah)
		})
	});

	function get_detailPejabat(id_wilayah) {
		$.ajax({
			url: base_url + 'Pejabat/detailPejabat',
			data: {
				id: id_wilayah
			},
			method: "POST",
			dataType: "json",
			success: function (data) {
				if (data) {
					$("#nama_pejabat").val(data.nama_pejabat)
					$("#nik").val(data.nik).trigger('change');
				} else {
					a_error('Terjadi Kesalahan!', 'Silahkan refresh page');
				}
			}
		});
	}

	//function
	function simpan(act, id) {
		$.ajax({
			url: base_url + 'Pejabat/simpan/' + act + '/' + id,
			type: "POST",
			data: new FormData($("form").get(0)),
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'json',
			success: function (res) {
				if (res.res) {
					a_ok('Berhasil! ' + res.msg);
					$("#mdlPejabat").modal('hide');
					get_dataPejabat();
				} else {
					a_error('Gagal! ' + res.msg);
				}
			}
		});
	}

	function get_dataPejabat() {
		$('#tblPejabat').DataTable().clear();
        $('#tblPejabat').DataTable().destroy();
        $('#tblPejabat').DataTable({  
            "processing": true, 
            "serverSide": true, 
            "order": [], 
            "ajax": {
                "url": base_url + "Pejabat/get",
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

	function hapusPejabat(id_wilayah) {
		if (confirm('Apakah kamu yakin?')) {
			$.ajax({
				url: base_url + 'Pejabat/hapusPejabat',
				data: {
					id: id_wilayah
				},
				method: "POST",
				dataType: "json",
				success: function (data) {
					if (data) {
						get_dataPejabat();
						a_ok('Berhasil!', 'Data dihapus');
					} else {
						a_error('Gagal!', 'Menghapus data');
					}
				}
			});
		}
	}

</script>
