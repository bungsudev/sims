<style>
	.has-error {
		border: 1px solid red !important;
	}

</style>
<div class="row">
	<div class="col-md-12 col-xl-12">
		<a href="<?= base_url(); ?>siswa/tambah" class="btn btn-success btn-sm mb-3"><i class="uil uil-plus"></i> Tambah Data </a>

		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-12 col-xl-12 mb-3">
						<div class="table-responsive">
							<table id="tblSiswa" class="table">
								<thead>
								<tr>
									<th class="text-center">No</th>
									<th width="50">Aksi</th>
									<th class="text-center">Foto</th>
									<th>Siswa</th>
									<th>Kontak</th>
									<th>Alamat</th>
									<th>Ayah</th>
									<th>Ibu</th>
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

<script>
	let act, id_siswa = '';
	const base_url = "<?= base_url(); ?>";
	$(document).ready(function () {
		$('#tblSiswa').dataTable();
		get_dataSiswa();

		//button action
		$("#btnTambah").click(function () {
			act = 'Tambah';
			$("form")[0].reset();
			$("#nik").val('').trigger('change');
			$("#mdlSiswa").modal('show');
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
			if (check) {
				if (act == 'Tambah') {
					simpan(act, '');
				} else if (act == 'Edit') {
					simpan(act, id_siswa);
				} else {
					a_error('Terjadi Kesalahan!', 'Reload Page dahulu');
				}
			}
		})

		//tbody button action
		$("#tblSiswa tbody").on("click", "#btnEdit", function () {
			act = "Edit";
			$("#act").text(act);
			$("form")[0].reset();
			$("#mdlSiswa").modal('show');
			id_siswa = $(this).data("id");
			get_detailSiswa(id_siswa)
		})
		$("#tblSiswa tbody").on("click", "#btnHapus", function () {
			id_siswa = $(this).data("id");
			hapusSiswa(id_siswa)
		})
	});

	function get_detailSiswa(id_siswa) {
		$.ajax({
			url: base_url + 'Siswa/detailSiswa',
			data: {
				id: id_siswa
			},
			method: "POST",
			dataType: "json",
			success: function (data) {
				if (data) {
					$("#nama_siswa").val(data.nama_siswa)
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
			url: base_url + 'Siswa/simpan/' + act + '/' + id,
			type: "POST",
			data: new FormData($("form").get(0)),
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'json',
			success: function (res) {
				if (res.res) {
					a_ok('Berhasil! ' + res.msg);
					$("#mdlSiswa").modal('hide');
					get_dataSiswa();
				} else {
					a_error('Gagal! ' + res.msg);
				}
			}
		});
	}

	function get_dataSiswa() {
		$('#tblSiswa').DataTable().clear();
        $('#tblSiswa').DataTable().destroy();
        $('#tblSiswa').DataTable({  
            "processing": true, 
            "serverSide": true, 
            "order": [], 
            "ajax": {
                "url": base_url + "Siswa/get",
                "type": "POST"
            },
            "columnDefs": [
				{ "width": "1%", "targets": 0 },
				{ "width": "25%", "targets": 3 },
				{ "width": "25%", "targets": 6 },
				{ "width": "25%", "targets": 7 },
			]
        });
	}

	function hapusSiswa(id_siswa) {
		if (confirm('Apakah kamu yakin?')) {
			$.ajax({
				url: base_url + 'Siswa/hapusSiswa',
				data: {
					id: id_siswa
				},
				method: "POST",
				dataType: "json",
				success: function (data) {
					if (data) {
						get_dataSiswa();
						$.notify({
							title: 'Berhasil!',
							message: 'Data dihapus.'
						}, {
							type: 'success',
							allow_dismiss: true,
							newest_on_top: false,
							mouse_over: false,
							showProgressbar: false,
							spacing: 10,
							timer: 2000,
							placement: {
								from: 'top',
								align: 'right'
							},
							offset: {
								x: 30,
								y: 30
							},
							delay: 1000,
							z_index: 10000,
							animate: {
								enter: 'animated bounceIn',
								exit: 'animated flash'
							}
						});
					} else {
						alert('Gagal! Menghapus data');
					}
				}
			});
		}
	}

</script>
