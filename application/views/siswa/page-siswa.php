<form ecntype="multipart/form-data">
	<input type="hidden" id="act" value="<?= $this->uri->segment(2); ?>">
	<input type="hidden" id="id_siswa" name="id_siswa" value="<?= $this->uri->segment(3) ?>">
	<div class="row">
		<div class="col-md-12">
			<a href="<?= base_url(); ?>siswa" class="btn btn-danger btn-sm mb-3"><i class="fa fa-angle-left"></i>
				Kembali</a>
		</div>
		<div class="col-md-3">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="box-body text-center">
							<img class="profile-user-img img-responsive img-circle" width="100%" id="foto_img" src="<?= base_url() ?>assets/img/foto_anggota/default.jpg" alt="Logo">
							<br>
							<p class="text-center text-bold">Foto</p>
							<p class="text-muted text-center text-red">(Kosongkan, jika tidak merubah foto)</p>
							<br>
							<div class="form-group">
								<input class="form-control" type="file" id="foto" name="foto">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-6 col-xl-6 mb-3">
							<div class="form-group">
								<label for="nis">NIS <span class="text-danger">*</span></label>
								<input type="text" class="form-control required" name="nis" id="nis">
							</div>
						</div>
						<div class="col-md-6 col-xl-6 mb-3">
							<div class="form-group">
								<label for="nisn">NISN <span class="text-danger">*</span></label>
								<input type="text" class="form-control required" name="nisn" id="nisn">
							</div>
						</div>
						<div class="col-md-6 col-xl-6 mb-3">
							<div class="form-group">
								<label for="nama_lengkap">Nama Siswa <span class="text-danger">*</span></label>
								<input type="text" class="form-control required" name="nama_lengkap" id="nama_lengkap">
							</div>
						</div>
						<div class="col-md-6 col-xl-6 mb-3">
							<div class="form-group">
								<label for="tempat_lahir">Tempat Lahir <span class="text-danger">*</span></label>
								<input type="text" class="form-control required" name="tempat_lahir" id="tempat_lahir">
							</div>
						</div>
						<div class="col-md-6 col-xl-6 mb-3">
							<div class="form-group">
								<label for="id_kelas">Kelas <span class="text-danger">*</span></label>
								<select class="form-select required" name="id_kelas" id="id_kelas">
								<option value="">-- Kelas --</option>
								<?php 
									$qry = $this->db->query("SELECT * FROM kelas where deleted IS NULL AND status = 'aktif' AND id_sekolah = '".$this->session->userdata('id_sekolah')."'")->result_array();
									foreach ($qry as $row):
								?>
									<option value="<?= $row['id_kelas'] ?>"><?= $row['nama_kelas'] ?></option>
								<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-md-6 col-xl-6 mb-3">
							<div class="form-group">
								<label for="tgl_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
								<input type="date" class="form-control required" name="tgl_lahir" id="tgl_lahir">
							</div>
						</div>
						<div class="col-md-6 col-xl-6 mb-3">
							<div class="form-group">
								<label for="jk">Jenis Kelamin <span class="text-danger">*</span></label>
								<select class="form-select" name="jk" id="jk">
									<option value="">-- Jenis Kelamin --</option>
									<option value="LAKI-LAKI">Laki-Laki</option>
									<option value="PEREMPUAN">Perempuan</option>
								</select>
							</div>
						</div>
						<div class="col-md-6 col-xl-6 mb-3">
							<div class="form-group">
								<label for="agama">Agama</label>
								<select class="form-select " name="agama" id="agama">
								<option value="">-- Agama --</option>
									<option value="ISLAM">ISLAM</option>
									<option value="KRISTEN">KRISTEN</option>
									<option value="KATHOLIK">KATHOLIK</option>
									<option value="HINDU">HINDU</option>
									<option value="BUDHA">BUDHA</option>
									<option value="KHONGHUCU">KHONGHUCU</option>
									<option value="KEPERCAYAAN TERHADAP TUHAN YME / LAINNYA">KEPERCAYAAN TERHADAP TUHAN YME / LAINNYA</option>
								</select>
							</div>
						</div>
						<div class="col-md-6 col-xl-6 mb-3">
							<div class="form-group">
								<label for="no_hp">No. HP/WhatsApp</label>
								<input type="text" class="form-control " name="no_hp" id="no_hp">
							</div>
						</div>
						<div class="col-md-12 col-xl-12 mb-3">
							<div class="form-group">
								<label for="alamat">Alamat</label>
								<textarea class="form-control " name="alamat" id="alamat" rows="3"></textarea>
							</div>
						</div>
						<hr>
						<div class="col-md-6 col-xl-6 mb-3">
							<div class="form-group">
								<label for="nama_ayah">Nama Ayah</label>
								<input type="text" class="form-control " name="nama_ayah" id="nama_ayah">
							</div>
						</div>
						<div class="col-md-6 col-xl-6 mb-3">
							<div class="form-group">
								<label for="pekerjaan_ayah">Pekerjaan Ayah</label>
								<input type="text" class="form-control " name="pekerjaan_ayah" id="pekerjaan_ayah">
							</div>
						</div>
						<div class="col-md-4 col-xl-4 mb-3">
							<div class="form-group">
								<label for="tempat_lahir_ayah">Tempat Lahir Ayah</label>
								<input type="text" class="form-control " name="tempat_lahir_ayah" id="tempat_lahir_ayah">
							</div>
						</div>
						<div class="col-md-4 col-xl-4 mb-3">
							<div class="form-group">
								<label for="tgl_lahir_ayah">Tanggal Lahir Ayah</label>
								<input type="date" class="form-control " name="tgl_lahir_ayah" id="tgl_lahir_ayah">
							</div>
						</div>
						<div class="col-md-4 col-xl-4 mb-3">
							<div class="form-group">
								<label for="hp_ayah">No WA/Telepon Ayah</label>
								<input type="text" class="form-control " name="hp_ayah" id="hp_ayah">
							</div>
						</div>
						<hr>
						<div class="col-md-6 col-xl-6 mb-3">
							<div class="form-group">
								<label for="nama_ibu">Nama Ibu</label>
								<input type="text" class="form-control " name="nama_ibu" id="nama_ibu">
							</div>
						</div>
						<div class="col-md-6 col-xl-6 mb-3">
							<div class="form-group">
								<label for="pekerjaan_ibu">Pekerjaan Ibu</label>
								<input type="text" class="form-control " name="pekerjaan_ibu" id="pekerjaan_ibu">
							</div>
						</div>
						<div class="col-md-4 col-xl-4 mb-3">
							<div class="form-group">
								<label for="tempat_lahir_ibu">Tempat Lahir Ibu</label>
								<input type="text" class="form-control " name="tempat_lahir_ibu" id="tempat_lahir_ibu">
							</div>
						</div>
						<div class="col-md-4 col-xl-4 mb-3">
							<div class="form-group">
								<label for="tgl_lahir_ibu">Tanggal Lahir Ibu</label>
								<input type="date" class="form-control " name="tgl_lahir_ibu" id="tgl_lahir_ibu">
							</div>
						</div>
						<div class="col-md-4 col-xl-4 mb-3">
							<div class="form-group">
								<label for="hp_ibu">No WA/Telepon Ibu</label>
								<input type="text" class="form-control " name="hp_ibu" id="hp_ibu">
							</div>
						</div>
						
						<div class="col-md-6 col-xl-6 mb-3">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" class="form-control " name="email" id="email">
							</div>
						</div>
						<div class="col-md-6 col-xl-6 mb-3">
							<div class="form-group">
								<label for="status">Status</label>
								<select class="form-select " name="status" id="status">
									<option value="Aktif" selected>Aktif</option>
									<option value="Tidak Aktif">Tidak Aktif</option>
									<option value="Lulus">Sudah Lulus</option>
								</select>
							</div>
						</div>
						<div class="col-md-12 col-xl-12">
							<button type="button" id="btnBatal" class="btn btn-danger"><i class="fa fa-times"></i>
								Batal</button>
							<button type="button" id="btnSimpan" class="btn btn-primary"><i class="bx bx-save"></i>
								Simpan </button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<script>
	let act = $("#act").val();
	let id_siswa = $("#id_siswa").val();
	const base_url = "<?= base_url(); ?>";
	$(document).ready(function () {
		if (act == 'edit') {
			dataSiswaDetail(id_siswa)
		}else if (act == 'lihat') {
			dataSiswaDetail(id_siswa)
			$(":input").prop('disabled', true);
		}
		//button action
		$("#foto").change(function (e) {
			$('#foto_img').attr('src', URL.createObjectURL(e.target.files[0]));
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
				if (act == 'tambah') {
					save(act, '');
				} else if (act == 'edit') {
					save(act, id_siswa);
				} else {
					alert('Terjadi Kesalahan! Reload Page dahulu');
				}
			}
		})
	});

	//function

	function dataSiswaDetail(id_siswa) {
		$.ajax({
			url: base_url + 'siswa/dataSiswaDetail',
			method: "POST",
			data: {
				id_siswa: id_siswa
			},
			dataType: "json",
			success: function (data) {
				console.log(data)
				if (data) {
					$("#nis").val(data.nis);
					$("#nisn").val(data.nisn);
					$("#email").val(data.email);
					$("#nama_lengkap").val(data.nama_lengkap);
					$("#tempat_lahir").val(data.tempat_lahir);
					$("#tgl_lahir").val(data.tgl_lahir);
					$("#id_kelas").val(data.id_kelas);
					$("#jk").val(data.jk);
					$("#no_hp").val(data.no_hp);
					$("#agama").val(data.agama);
					$("#alamat").val(data.alamat);
					$("#nama_ayah").val(data.nama_ayah);
					$("#tempat_lahir_ayah").val(data.tempat_lahir_ayah);
					$("#tgl_lahir_ayah").val(data.tgl_lahir_ayah);
					$("#pekerjaan_ayah").val(data.pekerjaan_ayah);
					$("#hp_ayah").val(data.hp_ayah);
					$("#nama_ibu").val(data.nama_ibu);
					$("#tempat_lahir_ibu").val(data.tempat_lahir_ibu);
					$("#tgl_lahir_ibu").val(data.tgl_lahir_ibu);
					$("#pekerjaan_ibu").val(data.pekerjaan_ibu);
					$("#hp_ibu").val(data.hp_ibu);
					$("#status").val(data.status);
					if (data.foto) {
						$("#foto_img").attr("src", base_url + "assets/img/foto_anggota/" + data.foto);
					}
				} else {
					a_error('Terjadi Kesalahan!', 'Silahkan refresh page');
				}
			}
		});
	}

	function save(act) {
		$.ajax({
			url: base_url + 'siswa/simpan/' + act + '/' + id_siswa,
			type: "POST",
			data: new FormData($("form").get(0)),
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'json',
			success: function (res) {
				if (res.res) {
					window.location.href = base_url + 'siswa';
				} else {
					alert('Gagal! '+ res.msg);
				}
			}
		});
	}

</script>
