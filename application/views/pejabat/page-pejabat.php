<form ecntype="multipart/form-data">
	<input type="hidden" id="act" value="<?= $this->input->get('act') ?>">
	<input type="hidden" id="id_pejabat" name="id_pejabat" value="<?= $this->input->get('id') ?>">
	<div class="row">
		<div class="col-md-12">
			<a href="<?= base_url(); ?>pejabat" class="btn btn-danger btn-sm mb-3"><i class="fa fa-angle-left"></i>
				Kembali</a>
		</div>
		<div class="col-md-3">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="box-body text-center">
							<img class="profile-user-img img-responsive img-circle" width="200" id="foto_img" src="<?= base_url() ?>assets/img/pejabat/default.png" alt="Logo">
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
						<?php if($this->input->get('act') == 'Tambah'): ?>
						<div class="col-md-12 col-xl-12 mb-3">
							<label for="cariNik">NIK / Nama Penduduk</label>
							<div class="input-group mb-3">
								<input type="text" id="cariNik" name="cariNik" class="form-control"
									placeholder="-- Masukkan NIK / Nama Penduduk --">
								<button class="input-group-text btn-success" id="btnCariNik">Cari</button>
							</div>
						</div>
						<?php endif ?>
						<div class="col-md-6 col-xl-6 mb-3">
							<div class="form-group">
								<label for="nama_lengkap">Nama Pegawai Desa</label>
								<input type="text" class="form-control required" name="nama_lengkap" id="nama_lengkap"
									disabled>
							</div>
						</div>
						<div class="col-md-6 col-xl-6 mb-3">
							<div class="form-group">
								<label for="nik">Nomor Induk Kependudukan</label>
								<input type="text" class="form-control required" name="nik" id="nik" disabled>
							</div>
						</div>
						<div class="col-md-6 col-xl-6 mb-3">
							<div class="form-group">
								<label for="nip">NIP</label>
								<input type="text" class="form-control required" name="nip" id="nip">
							</div>
						</div>
						<div class="col-md-6 col-xl-6 mb-3">
							<div class="form-group">
								<label for="no_hp">No. HP/WhatsApp</label>
								<input type="text" class="form-control required" name="no_hp" id="no_hp">
							</div>
						</div>
						<div class="col-md-6 col-xl-6 mb-3">
							<div class="form-group">
								<label for="tempat_lahir">Tempat Lahir</label>
								<input type="text" class="form-control required" name="tempat_lahir" id="tempat_lahir"
									disabled>
							</div>
						</div>
						<div class="col-md-6 col-xl-6 mb-3">
							<div class="form-group">
								<label for="tgl_lahir">Tanggal Lahir</label>
								<input type="date" class="form-control required" name="tgl_lahir" id="tgl_lahir"
									disabled>
							</div>
						</div>
						<div class="col-md-6 col-xl-6 mb-3">
							<div class="form-group">
								<label for="jekel">Jenis Kelamin</label>
								<select class="form-select required" name="jekel" id="jekel" disabled>
									<option value="">-- Jenis Kelamin --</option>
									<option value="LAKI-LAKI">Laki-Laki</option>
									<option value="PEREMPUAN">Perempuan</option>
								</select>
							</div>
						</div>
						<div class="col-md-6 col-xl-6 mb-3">
							<div class="form-group">
								<label for="pendidikan">Pendidikan</label>
								<select class="form-select required" name="pendidikan" id="pendidikan" disabled>
									<option value="">-- Pendidikan (Dalam KK) --</option>
									<option value="TIDAK / BELUM SEKOLAH">TIDAK / BELUM SEKOLAH</option>
									<option value="BELUM TAMAT SD/SEDERAJAT">BELUM TAMAT SD/SEDERAJAT</option>
									<option value="TAMAT SD / SEDERAJAT">TAMAT SD / SEDERAJAT</option>
									<option value="SLTP/SEDERAJAT">SLTP/SEDERAJAT</option>
									<option value="SLTA / SEDERAJAT">SLTA / SEDERAJAT</option>
									<option value="DIPLOMA I / II">DIPLOMA I / II</option>
									<option value="AKADEMI/ DIPLOMA III/S. MUDA">AKADEMI/ DIPLOMA III/S. MUDA</option>
									<option value="DIPLOMA IV/ STRATA I">DIPLOMA IV/ STRATA I</option>
									<option value="STRATA II">STRATA II</option>
									<option value="STRATA III">STRATA III</option>
								</select>
							</div>
						</div>
						<div class="col-md-6 col-xl-6 mb-3">
							<div class="form-group">
								<label for="agama">Agama</label>
								<select class="form-select required" name="agama" id="agama" disabled>
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
								<label for="golongan">Pangkat / Golongan</label>
								<input type="text" class="form-control required" name="golongan" id="golongan">
							</div>
						</div>
						<div class="col-md-6 col-xl-6 mb-3">
							<div class="form-group">
								<label for="no_sk_pengangkatan">Nomor SK Pengangkatan </label>
								<input type="text" class="form-control required" name="no_sk_pengangkatan"
									id="no_sk_pengangkatan">
							</div>
						</div>
						<div class="col-md-6 col-xl-6 mb-3">
							<div class="form-group">
								<label for="tgl_sk_pengangkatan">Tanggal SK Pengangkatan</label>
								<input type="date" class="form-control required" name="tgl_sk_pengangkatan"
									id="tgl_sk_pengangkatan">
							</div>
						</div>
						<div class="col-md-6 col-xl-6 mb-3">
							<div class="form-group">
								<label for="no_sk_berhenti">Nomor SK Pemberhentian </label>
								<input type="text" class="form-control required" name="no_sk_berhenti"
									id="no_sk_berhenti">
							</div>
						</div>
						<div class="col-md-6 col-xl-6 mb-3">
							<div class="form-group">
								<label for="tgl_sk_berhenti">Tanggal SK Pemberhentian</label>
								<input type="date" class="form-control required" name="tgl_sk_berhenti"
									id="tgl_sk_berhenti">
							</div>
						</div>
						<div class="col-md-6 col-xl-6 mb-3">
							<div class="form-group">
								<label for="masa_jabatan">Masa Jabatan (Usia/Periode) </label>
								<input type="text" class="form-control required" name="masa_jabatan" id="masa_jabatan"
									placeholder="Contoh: 6 Tahun Periode Pertama (2015 s/d 2021)">
							</div>
						</div>
						<div class="col-md-6 col-xl-6 mb-3">
							<div class="form-group">
								<label for="jabatan">Jabatan </label>
								<input type="text" class="form-control required" name="jabatan" id="jabatan">
							</div>
						</div>
						<div class="col-md-12 col-xl-12 mb-3">
							<div class="form-group">
								<label for="tupoksi">Tupoksi</label>
								<textarea class="form-control required" name="tupoksi" id="tupoksi" rows="5"></textarea>
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
	let id_pejabat = $("#id_pejabat").val();
	$(document).ready(function () {
		if (act == 'Edit') {
			dataPejabatDetail(id_pejabat)
		}else if (act == 'Lihat') {
			dataPejabatDetail(id_pejabat)
			$(":input").prop('disabled', true);
		}
		//button action
		$("#foto").change(function (e) {
			$('#foto_img').attr('src', URL.createObjectURL(e.target.files[0]));
		})
		$("#btnCariNik").click(function (e) {
			e.preventDefault();
			let cariNik = $("#cariNik").val();
			get_DataPenduduk(cariNik)
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
					save(act, '');
				} else if (act == 'Edit') {
					save(act, id_pejabat);
				} else {
					a_error('Terjadi Kesalahan!', 'Reload Page dahulu');
				}
			}
		})
	});

	//function

	function dataPejabatDetail(id_pejabat) {
		$.ajax({
			url: base_url + 'pejabat/dataPejabatDetail',
			method: "POST",
			data: {
				id_pejabat: id_pejabat
			},
			dataType: "json",
			success: function (data) {
				console.log(data)
				if (data) {
					$("#nik").val(data.nik);
					get_DataPenduduk(data.nik)
					$("#nip").val(data.nip);
					$("#golongan").val(data.golongan);
					$("#no_hp").val(data.no_hp);
					$("#no_sk_pengangkatan").val(data.no_sk_pengangkatan);
					$("#tgl_sk_pengangkatan").val(data.tgl_sk_pengangkatan);
					$("#no_sk_berhenti").val(data.no_sk_berhenti);
					$("#tgl_sk_berhenti").val(data.tgl_sk_berhenti);
					$("#masa_jabatan").val(data.masa_jabatan);
					$("#jabatan").val(data.jabatan);
					$("#tupoksi").val(data.tupoksi);
					$("#status").val(data.status);
					if (data.foto) {
						$("#foto_img").attr("src", base_url + "assets/img/pejabat/" + data.foto);
					}
				} else {
					a_error('Terjadi Kesalahan!', 'Silahkan refresh page');
				}
			}
		});
	}

	function get_DataPenduduk(cariNik) {
		$.ajax({
			url: base_url + 'pejabat/get_DataPenduduk',
			method: "POST",
			data: {
				nik: cariNik
			},
			dataType: "json",
			async: false,
			success: function (data) {
				console.log(data)
				if (data) {
					$("#nama_lengkap").val(data.nama_lengkap);
					$("#nik").val(data.nik);
					$("#tempat_lahir").val(data.tempat_lahir);
					$("#tgl_lahir").val(data.tgl_lahir);
					$("#jekel").val(data.jekel);
					$("#pendidikan").val(data.pendidikan);
					$("#agama").val(data.agama);
				} else {
					a_error('Terjadi Kesalahan!', 'Silahkan refresh page');
				}
			}
		});
	}

	function save(act) {
		$.ajax({
			url: base_url + 'pejabat/simpan/' + act + '/' + id_pejabat,
			type: "POST",
			data: new FormData($("form").get(0)),
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'json',
			success: function (res) {
				if (res.res) {
					a_ok('Berhasil!', res.msg);
					window.location.href = base_url + 'pejabat';
				} else {
					a_error('Gagal!', res.msg);
				}
			}
		});
	}

</script>
