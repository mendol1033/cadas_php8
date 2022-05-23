<div class="row" style="margin-top: 15px;">
	<div class="col-xl-6">
		<form class="needs-validation" id="formNewKontrak" enctype="multipart/form-data" novalidate>
			<div class="row" style="margin-top: 10px;">
				<div class="col-xl-3">
					<label class="form-label" for="nomor_kontrak">Nomor Kontrak<span class="text-danger">*</span></label>
				</div>
				<div class="col-xl-9">
					<input type="text" class="form-control" name="nomor_kontrak" id="nomor_kontrak" required>
				</div>
				<div class="invalid-feedback">
					Nomor Kontrak Wajib Diisi
				</div>
			</div>
			<div class="row" style="margin-top: 10px;">
				<div class="col-xl-3">
					<label class="form-label" for="jenis_kontrak">Jenis Kontrak<span class="text-danger">*</span></label>
				</div>
				<div class="col-xl-9">
					<select class="form-control select2" name="jenis_kontrak" id="jenis_kontrak" required>
						<option label="KK Non Peta" value="1" selected="selected">KK Non Peta</option>
						<option label="KK Peta" value="2">KK Peta</option>
						<option label="SKP Tanpa KK" value="3">SKP Tanpa KK</option>
						<option label="Tugas Belajar" value="4">Tugas Belajar</option>
					</select>
				</div>
				<div class="invalid-feedback">
					Pilih Jenis Kontrak
				</div>
			</div>
			<div class="row" style="margin-top: 10px;">
				<div class="col-xl-3">
					<label class="form-label" for="tipe_kontrak">Tipe Kontrak<span class="text-danger">*</span></label>
				</div>
				<div class="col-xl-9">
					<select class="form-control select2" name="tipe_kontrak" id="tipe_kontrak" required>
						<option value="" class="" selected="selected">-- Pilih Tipe Kontrak --</option>
						<option label="Pejabat Eselon I, II, III Pemilik Peta dan Fungsional Tertentu/Nonstruktural Setara Eselon II" value="1">Pejabat Eselon I, II, III Pemilik Peta dan Fungsional Tertentu/Nonstruktural Setara Eselon II</option>
						<option label="Pejabat Eselon III Bukan Pemilik Peta, Nonstruktural Setara Eselon III" value="2">Pejabat Eselon III Bukan Pemilik Peta, Nonstruktural Setara Eselon III</option>
						<option label="Pejabat Fungsional Tertentu Setara Eselon III" value="3">Pejabat Fungsional Tertentu Setara Eselon III</option>
						<option label="Pejabat Eselon IV/Nonstruktural Setara Eselon IV (1 Level di bawah PS)" value="4">Pejabat Eselon IV/Nonstruktural Setara Eselon IV (1 Level di bawah PS)</option>
						<option label="Pejabat Fungsional Tertentu Setara Eselon IV" value="5">Pejabat Fungsional Tertentu Setara Eselon IV</option>
						<option label="Pejabat Eselon IV/Nonstruktural Setara Eselon IV (2 Level di bawah PS)" value="6">Pejabat Eselon IV/Nonstruktural Setara Eselon IV (2 Level di bawah PS)</option>
						<option label="Pejabat Fungsional Tertentu Nonmanajerial" value="7">Pejabat Fungsional Tertentu Nonmanajerial</option>
						<option label="Fungsional Tertentu Setara Fungsional Umum / Pelaksana (Manajerial)" value="8">Fungsional Tertentu Setara Fungsional Umum / Pelaksana (Manajerial)</option>
						<option label="Pejabat Eselon V dan Fungsional Umum / Pelaksana" value="9">Pejabat Eselon V dan Fungsional Umum / Pelaksana</option>
					</select>
				</div>
				<div class="invalid-feedback">
					Pilih Tipe Kontrak
				</div>
			</div>
			<div class="row" style="margin-top: 10px;">
				<div class="col-xl-3">
					<label class="form-label" for="tanggal_mulai">Tanggal Mulai<span class="text-danger">*</span></label>
				</div>
				<div class="col-xl-9">
					<input type="text" class="form-control datepicker" name="tanggal_mulai" id="tanggal_mulai" required>
				</div>
				<div class="invalid-feedback">
					Tanggal Mulai Wajib Diisi
				</div>
			</div>
			<div class="row" style="margin-top: 10px;">
				<div class="col-xl-3">
					<label class="form-label" for="tanggal_selesai">Tanggal Selesai<span class="text-danger">*</span></label>
				</div>
				<div class="col-xl-9">
					<input type="text" class="form-control datepicker" name="tanggal_selesai" id="tanggal_selesai" required>
				</div>
				<div class="invalid-feedback">
					Tanggal Selesai Wajib Diisi
				</div>
			</div>
			<div class="row" style="margin-top: 10px;">
				<div class="col-xl-3">
					<label class="form-label" for="tahun">Tahun<span class="text-danger">*</span></label>
				</div>
				<div class="col-xl-9">
					<input type="text" class="form-control" name="tahun" id="tahun" required>
				</div>
				<div class="invalid-feedback">
					Tahun Wajib Diisi
				</div>
			</div>
			<div class="row" style="margin-top: 10px;">
				<div class="col-xl-3"></div>
				<div class="col-xl-9">
					<button type="button" class="btn btn-secondary" id="batal"><span class="fas fa-undo fa-sm"></span> BATAL</button>
					<button class="btn btn-success" id="simpan" style="margin-left: 15px;" value="new"><span class="fas fa-save fa-lg"></span> SIMPAN</button>
				</div>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		var controls = {
			leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
			rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
		}
		$('.select2').select2();

		$('.datepicker').datepicker({
			language: "id",
			format: "yyyy-mm-dd",
			orientation: "bottom right",
			todayHighlight: true,
			templates: controls
		});

		var date = new Date();
		var tahun = date.getFullYear();
		$('[name="tahun"]').val(tahun);
		$('[name="tanggal_mulai"]').val(tahun+"-01-01");
		$('[name="tanggal_selesai"]').val(tahun+"-12-31");

		if (typeof dataEdit !== "undefined") {
			$('#nomor_kontrak').val(dataEdit['NOMOR_KONTRAK']);
			$('#tipe_kontrak').val(dataEdit['TIPE_KONTRAK']);
			$('#tipe_kontrak').trigger('change');
			$('#jenis_kontrak').val(dataEdit['JENIS_KONTRAK']);
			$('#jenis_kontrak').trigger('change');
			$('#tanggal_mulai').val(dataEdit['TANGGAL_MULAI']);
			$('#tanggal_selesai').val(dataEdit['TANGGAL_SELESAI']);
			$('#tahun').val(dataEdit['TAHUN']);
			$('#simpan').val(dataEdit['ID_KONTRAK_KINERJA']);
		}
	});

	$('#formNewKontrak').on('submit', function(event) {
		event.preventDefault();
		/* Act on the event */
		if (this.checkValidity() === false) {
			$(this).addClass('was-validated');
		} else {
			data = $(this).serializeArray();
			if ($('#simpan').val() !== 'new') {
				data[data.length] = {name: 'ID_KONTRAK_KINERJA', value: $('#simpan').val()};
				url = '<?php echo $base_url;?>/Ki/editKontrak'
				pesan = 'Data Kontrak Kinerja Telah Diupdate';
			} else {
				url = '<?php echo $base_url?>/Ki/addKontrak';
				pesan = 'Data Kontrak Kinerja Telah Terekam';
			}
			$.ajax({
				url: url,
				type: 'POST',
				dataType: 'JSON',
				data: data,
				success: function(data){
					toastr.success(pesan,'Berhasil');
					delete dataEdit;
					loadPage('Ki/KontrakKinerja');
				}
			})
		}
	});

	$('#batal').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		delete dataEdit;
		loadPage('Ki/KontrakKinerja');
	});
</script>