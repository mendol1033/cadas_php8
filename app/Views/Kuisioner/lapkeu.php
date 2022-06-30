<div class="row" id="konten">
	<div class="col-xl-1"></div>
	<div class="col-xl-10">
		<div id="panel-4" class="panel">
			<div class="panel-hdr">
				<h2>
					Kuisioner <span class="fw-300"><i><b>Laporan Keuangan/Tahunan Perusahaan</b></i></span>
				</h2>
				<div class="panel-toolbar">
					<button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
					<button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
					<button class="btn btn-panel waves-effect waves-themed" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
				</div>
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<form class="needs-validation dropzone" id="formLapkeu" enctype="multipart/form-data" novalidate>
						<table class="table table-bordered" style="border-width: 5px; border-color: black;">
							<tr>
								<td>
									<div class="form-group">
										<label class="form-label" for="NPWP">NPWP</label>
										<input type="text" id="NPWP" name="NPWP-mask" class="form-control" placeholder="Nomor Wajib Pajak Perusahaan" required autocomplete="off">
									</div>
									<div class="form-group">
										<label class="form-label" for="NAMA_WP">NAMA WAJIB PAJAK</label>
										<input type="text" id="NAMA_WP" name="NAMA_WP" class="form-control" placeholder="Nama Wajib Pajak" required autocomplete="off">
									</div>
									<div class="form-group">
										<label class="form-label" for="TAHUN">TAHUN PELAPORAN PAJAK</label>
										<select class="form-control select2" name="TAHUN" id="TAHUN" required>
											<?php
											$curYear = date("Y");
											$startYear = 2017;

											for ($i=$curYear; $i >=$startYear; $i--) { 
												?>
												<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
												<?php 
											}
											?>
										</select>
									</div>
									<div class="form-group">
										<label class="form-label" for="FASILITAS">JENIS FASILITAS</label>
										<select class="form-control select2" name="FASILITAS" id="FASILITAS" required>
											<option value="KB">KAWASAN BERIKAT</option>
											<option value="GB">GUDANG BERIKAT</option>
											<option value="PLB">PUSAT LOGISTIK BERIKAT</option>
										</select>
									</div>
								</td>
							</tr>
						</table>
						<div>
							<h3>I. ELEMEN DARI NERACA</h3>
							<div class="row">
								<div class="col-xl-6" id="AKTIVA">
									<table class="table table-bordered table-striped table-hover" id="AKTIVA_TABLE">
										<thead>
											<th style="width: 10%">NO</th>
											<th style="width: 50%">URAIAN</th>
											<th style="width: 40%">NILAI (RUPIAH)</th>
										</thead>
										<tbody>
											
										</tbody>
										<tfoot>
											<th style="width: 10%"></th>
											<th style="width: 50%">TOTAL AKTIVA</th>
											<th style="width: 40%"><input type="text" class="form-control rupiah" id="TOTAL_AKTIVA" name="TOTAL_AKTIVA-mask" value="0" disabled></th>
										</tfoot>
									</table>
								</div>
								<div class="col-xl-6" id="PASSIVA">
									<table class="table table-bordered table-striped table-hover" id="PASSIVA_TABLE">
										<thead>
											<th style="width: 10%">NO</th>
											<th style="width: 50%">URAIAN</th>
											<th style="width: 40%">NILAI (RUPIAH)</th>
										</thead>
										<tbody>
											
										</tbody>
										<tfoot>
											<th style="width: 10%"></th>
											<th style="width: 50%">TOTAL PASSIVA</th>
											<th style="width: 40%"><input type="text" class="form-control rupiah" id="TOTAL_PASSIVA" name="TOTAL_PASSIVA-mask" value="0" disabled></th>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
						<div class="row">
							<h3>II. ELEMEN DARI LAPORAN RUGI/LABA</h3>
							<table class="table table-bordered table-striped table-hover" id="LABA_TABLE">
								<thead>
									<th style="width: 10%;">NO</th>
									<th style="width: 60%;">URAIAN</th>
									<th style="width: 30%;">NILAI (RUPIAH)</th>
								</thead>
								<tbody></tbody>
							</table>
						</div>
						<div class="row">
							<h3>III. ELEMEN TRANSAKSI DENGAN PIHAK-PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA SESUAI DENGAN PSAK NOMOR 7</h3>
							<table class="table table-bordered table-striped table-hover" id="ISTIMEWA_TABLE">
								<thead>
									<th style="width: 10%;">NO</th>
									<th style="width: 30%;">PIHAK-PIHAK</th>
									<th style="width: 30%;">JENIS TRANSAKSI</th>
									<th style="width: 30%;">NILAI (RUPIAH) <button type="button" class="btn btn-primary float-right" onclick="addLine()">Tambah Baris</button></th>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
						<div class="row">
							<table class="table table-bordered" id="PERNYATAAN_TABLE">
								<thead>
									<th colspan="3" class="bg-faded text-center"><strong style="font-size: 20px;">PERNYATAAN</strong></th>
								</thead>
								<tbody>
									<tr>
										<td colspan="3">
											<p>
												Dengan menyadari sepenuhnya akan segala akibatnya termasuk sanksi-sanksi sesuai dengan ketentuan perundang-undangan yang berlaku, saya menyatakan bahwa apa yang telah saya beritahukan di atas adalah benar, lengkap dan jelas.
											</p>
										</td>
									</tr>
									<tr>
										<td style="width: 40%;"><label class="form-label float-right">a.</label></td>
										<td style="width: 30%;">
											<div class="form-group">
												<label class="form-label" for="TEMPAT">TEMPAT TANDA TANGAN</label>
												<input type="text" id="TEMPAT" name="TEMPAT" class="form-control" placeholder="Tempat Tanda Tangan" required autocomplete="off">
											</div>
										</td>
										<td style="width: 30%;">
											<div class="form-group">
												<label class="form-label" for="TANGGAL">TANGGAL TANDA TANGAN</label>
												<input type="text" name="TANGGAL" class="form-control datepicker" required>
											</div>
										</td>
									</tr>
									<tr>
										<td colspan="2" style="width: 70%;">
											<label class="form-label">b.</label>
											<div class="custom-control custom-checkbox custom-control-inline">
												<input type="radio" name="JENIS_PENGURUS" class="custom-control-input" id="pegawai-radio" value="WP" required>
												<label class="custom-control-label" for="pegawai-radio">WAJIB PAJAK</label>
											</div>
											<div class="custom-control custom-checkbox custom-control-inline">
												<input type="radio" name="JENIS_PENGURUS" class="custom-control-input" id="stakeholder-radio" value="KUASA" required>
												<label class="custom-control-label" for="stakeholder-radio">KUASA</label>
											</div>
										</td>
										<td rowspan="2" style="width: 30%">
											<label class="form-label">Upload File PDF</label>
											<label for="file_pdf">
												<img src="assets/img/upload.jpg">
											</label>
											<input type="file" id="file_pdf" name="file_pdf" accept="application/pdf" class="form-control" style="display: none;" required>
										</td>
									</tr>
									<tr>
										<td colspan="2" style="width: 70%">
											<div class="form-group">
												<label class="form-label" for="PENGURUS">c. NAMA LENGKAP PENGURUS/KUASA</label>
												<input type="text" id="PENGURUS" name="PENGURUS" class="form-control" placeholder="NAMA LENGKAP PENGURUS" required autocomplete="off">
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="row d-flex justify-content-center">
							<button class="btn btn-success" type="button" onclick="kirimLapkeu()"><strong>KIRIM LAPORAN KEUANGAN</strong></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-1"></div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('.datepicker').datepicker({});
		$(':input').inputmask();
		$('.rupiah').inputmask({
			"alias": "currency",
			"prefix": 'Rp '
		});
		$('.select2').select2();
		$('#NPWP').inputmask({
			"mask" : "99-999-999-9.999-999"
		});
		$('.persen').inputmask({
			'alias': 'percentage'
		});

		$('[name="NPWP-mask"]').val('<?php echo $_SESSION['NPWP']?>');
		$('[name="NAMA_WP"]').val('<?php echo $_SESSION['NamaUser']?>');
		$('[name="FASILITAS"]').val('<?php echo $_SESSION['Fasilitas']?>');
		$('[name="FASILITAS"]').trigger('change');
	});

	$('#FASILITAS').on('change', function(e) {
		loadForm();
	});

	function loadForm(){
		var fasilitas = $('[name="FASILITAS"]').val();
		$.ajax({
			url: 'Kuisioner/getFormLapkeu',
			type: 'GET',
			dataType: 'JSON',
			data: {data: "<?php echo $_SESSION['tipe']?>"},
			success: function(d){
				$("#AKTIVA_TABLE > tbody").empty();
				$("#PASSIVA_TABLE > tbody").empty();
				$("#LABA_TABLE > tbody").empty();

				for (var i = 0; i < d.aktiva.length ; i++) {
					$("#AKTIVA_TABLE > tbody").append('<tr><td>'+(i+1)+'</td><td>'+d.aktiva[i].URAIAN+'</td><td><input type="text" class="form-control masked idr" name="'+d.aktiva[i].KODE+'-mask'+'" id="'+d.aktiva[i].KODE+'" onfocusout="jumlahAktiva();" required value="0"></td></tr>');
					$("#PASSIVA_TABLE").append('<tr><td>'+(i+1)+'</td><td>'+d.passiva[i].URAIAN+'</td><td><input type="text" class="form-control masked idr" name="'+d.passiva[i].KODE+'-mask'+'" id="'+d.passiva[i].KODE+'" onfocusout="jumlahPassiva();" required value="0"></td></tr>');
				}

				if (fasilitas === "KB") {
					for (var x = 0; x < d.laba.length; x++) {
						$("#LABA_TABLE >tbody").append('<tr><td>'+(x+1)+'</td><td>'+d.laba[x].URAIAN+'</td><td><input type="text" class="form-control masked idr" name="'+d.laba[x].KODE+'-mask'+'" id="'+d.laba[x].KODE+'" onfocusout="jumlahLaba();" required value="0"></td></tr>');
					}
				} else {
					for (var x = 0; x < d.rugi.length; x++) {
						switch (x) {
							case (4):
							$("#LABA_TABLE >tbody").append('<tr><td>'+(x+1)+'</td><td>'+d.rugi[x].URAIAN+'</td><td><input type="text" class="form-control masked idr" name="'+d.rugi[x].KODE+'-mask'+'" id="'+d.rugi[x].KODE+'" onfocusout="jumlahLaba();" required disabled value="0"></td></tr>');
							break;
							case (5):
							$("#LABA_TABLE >tbody").append('<tr><td>'+(x+1)+'</td><td>'+d.rugi[x].URAIAN+'</td><td><input type="text" class="form-control masked idr" name="'+d.rugi[x].KODE+'-mask'+'" id="'+d.rugi[x].KODE+'" onfocusout="jumlahLaba();" required disabled value="0"></td></tr>');
							break;
							case (8):
							$("#LABA_TABLE >tbody").append('<tr><td>'+(x+1)+'</td><td>'+d.rugi[x].URAIAN+'</td><td><input type="text" class="form-control masked idr" name="'+d.rugi[x].KODE+'-mask'+'" id="'+d.rugi[x].KODE+'" onfocusout="jumlahLaba();" required disabled value="0"></td></tr>');
							break;
							case (11):
							$("#LABA_TABLE >tbody").append('<tr><td>'+(x+1)+'</td><td>'+d.rugi[x].URAIAN+'</td><td><input type="text" class="form-control masked idr" name="'+d.rugi[x].KODE+'-mask'+'" id="'+d.rugi[x].KODE+'" onfocusout="jumlahLaba();" required disabled value="0"></td></tr>');
							break;
							case (13):
							$("#LABA_TABLE >tbody").append('<tr><td>'+(x+1)+'</td><td>'+d.rugi[x].URAIAN+'</td><td><input type="text" class="form-control masked idr" name="'+d.rugi[x].KODE+'-mask'+'" id="'+d.rugi[x].KODE+'" onfocusout="jumlahLaba();" required disabled value="0"></td></tr>');
							break;
							case (15):
							$("#LABA_TABLE >tbody").append('<tr><td>'+(x+1)+'</td><td>'+d.rugi[x].URAIAN+'</td><td><input type="text" class="form-control masked idr" name="'+d.rugi[x].KODE+'-mask'+'" id="'+d.rugi[x].KODE+'" onfocusout="jumlahLaba();" required disabled value="0"></td></tr>');
							break;
							case (17):
							$("#LABA_TABLE >tbody").append('<tr><td>'+(x+1)+'</td><td>'+d.rugi[x].URAIAN+'</td><td><input type="text" class="form-control masked idr" name="'+d.rugi[x].KODE+'-mask'+'" id="'+d.rugi[x].KODE+'" onfocusout="jumlahLaba();" required disabled value="0"></td></tr>');
							break;
							default:
							$("#LABA_TABLE >tbody").append('<tr><td>'+(x+1)+'</td><td>'+d.rugi[x].URAIAN+'</td><td><input type="text" class="form-control masked idr" name="'+d.rugi[x].KODE+'-mask'+'" id="'+d.rugi[x].KODE+'" onfocusout="jumlahLaba();" required value="0"></td></tr>');
							break;
						}
						
					}
				}

			}
		})
		.done(function() {
			$('.idr').inputmask({
				"alias": "currency",
				"prefix": 'Rp '
			});
			$('.input').empty();
		})		
	}

	function addLine(){
		var rowCount = $("#ISTIMEWA_TABLE > tbody >tr").length;

		$("#ISTIMEWA_TABLE > tbody").append('<tr><td>'+(rowCount+1)+'</td><td><input class="form-control masked" name="PIHAK[]"></td><td><input class="form-control" name="TRANSAKSI[]"></td><td><input class="form-control" name="NILAI_TRANSAKSI[]"></td></tr>');

		$('[name="NILAI_TRANSAKSI[]"]').inputmask({
			"alias": "currency",
			"prefix": 'Rp '
		});
	}

	function jumlahAktiva() {
		var masked = $('.masked');
		var totalAktiva = 0;

		for (var i = 0 ; i < 20; i++) {
			var name = masked[i].id;
			var d = $('input[name="'+name+'-mask"]').inputmask('unmaskedvalue');
			totalAktiva += parseFloat(d);
		} 
		
		$('[name="TOTAL_AKTIVA-mask"]').val(totalAktiva);
	};

	function jumlahPassiva() {
		var masked = $('.masked');
		var totalPassiva = 0;

		for (var i = 20 ; i < 40; i++) {
			var name = masked[i].id;
			var d = $('input[name="'+name+'-mask"]').inputmask('unmaskedvalue');
			totalPassiva += parseFloat(d);
		}
		
		$('[name="TOTAL_PASSIVA-mask"]').val(totalPassiva);
	};

	function jumlahLaba() {
		var masked = $('.masked');
		var fasilitas = $("#FASILITAS").val();
		if (fasilitas === "KB") {
			var L1 = $('input[name="L1-mask"]').inputmask('unmaskedvalue');
			var L2 = $('input[name="L2-mask"]').inputmask('unmaskedvalue');
			var L3 = $('input[name="L3-mask"]').inputmask('unmaskedvalue');
			var L4 = $('input[name="L4-mask"]').inputmask('unmaskedvalue');
			var L5 = parseFloat(L2) + parseFloat(L3) + parseFloat(L4);
			var L6 = $('input[name="L6-mask"]').inputmask('unmaskedvalue');
			var L7 = $('input[name="L7-mask"]').inputmask('unmaskedvalue');
			var L8 = L5 + parseFloat(L6) - parseFloat(L7);
			var L9 = $('input[name="L9-mask"]').inputmask('unmaskedvalue');
			var L10 = $('input[name="L10-mask"]').inputmask('unmaskedvalue');
			var L11 = L8 + parseFloat(L9) - parseFloat(L10);
			var L12 = parseFloat(L1) - L11;
			var L13 = $('input[name="L13-mask"]').inputmask('unmaskedvalue');
			var L14 = $('input[name="L14-mask"]').inputmask('unmaskedvalue');
			var L15 = L12 - parseFloat(L13) - parseFloat(L14);
			var L16 = $('input[name="L16-mask"]').inputmask('unmaskedvalue');
			var L17 = $('input[name="L17-mask"]').inputmask('unmaskedvalue');
			var L18 = L15 + parseFloat(L16) + parseFloat(L17);
			var L19 = $('input[name="L19-mask"]').inputmask('unmaskedvalue');
			var L20 = L18 - parseFloat(L19);
			var L21 = $('input[name="L21-mask"]').inputmask('unmaskedvalue');
			var L22 = L20 + parseFloat(L21);
			var L23 = $('input[name="L23-mask"]').inputmask('unmaskedvalue');
			var L24 = L22 - parseFloat(L23);

			$('[name="L5-mask"]').val(L5);
			$('[name="L8-mask"]').val(L8);
			$('[name="L11-mask"]').val(L11);
			$('[name="L12-mask"]').val(L12);
			$('[name="L15-mask"]').val(L15);
			$('[name="L18-mask"]').val(L18);
			$('[name="L20-mask"]').val(L20);
			$('[name="L22-mask"]').val(L22);
			$('[name="L24-mask"]').val(L24);
		} else {
			var L1 = $('input[name="R1-mask"]').inputmask('unmaskedvalue');
			var L2 = $('input[name="R2-mask"]').inputmask('unmaskedvalue');
			var L3 = $('input[name="R3-mask"]').inputmask('unmaskedvalue');
			var L4 = $('input[name="R4-mask"]').inputmask('unmaskedvalue');
			var L5 = parseFloat(L2) + parseFloat(L3) - parseFloat(L4);
			var L6 = parseFloat(L1) - L5;
			var L7 = $('input[name="R7-mask"]').inputmask('unmaskedvalue');
			var L8 = $('input[name="R8-mask"]').inputmask('unmaskedvalue');
			var L9 = L6 - parseFloat(L7) - parseFloat(L8);
			var L10 = $('input[name="R10-mask"]').inputmask('unmaskedvalue');
			var L11 = $('input[name="R11-mask"]').inputmask('unmaskedvalue');
			var L12 = L9 + parseFloat(L10) + parseFloat(L11);
			var L13 = $('input[name="R13-mask"]').inputmask('unmaskedvalue');
			var L14 = L12 - parseFloat(L13);
			var L15 = $('input[name="R15-mask"]').inputmask('unmaskedvalue');
			var L16 = L14 + parseFloat(L15);
			var L17 = $('input[name="R17-mask"]').inputmask('unmaskedvalue');
			var L18 = L16 + parseFloat(L17);

			$('[name="R5-mask"]').val(L5);
			$('[name="R6-mask"]').val(L6);
			$('[name="R9-mask"]').val(L9);
			$('[name="R12-mask"]').val(L12);
			$('[name="R14-mask"]').val(L14);
			$('[name="R16-mask"]').val(L16);
			$('[name="R18-mask"]').val(L18);
		}
	};


	function kirimLapkeu(){
		var url;
		var data;
		var form = $("#formLapkeu")[0];
		data = new FormData(form);

		if ($("#formLapkeu")[0].checkValidity() === false) {
			$("#formLapkeu").addClass('was-validated');
			play = document.getElementById('notification');
			toastr.error('Isi Form Dengan Lengkap dan Benar <br> Isi Kolom Kosong dengan Angka 0','Gagal');
			play.play();
			delete play;
		} else {
			var NPWP = $('input[name="NPWP-mask"]').inputmask('unmaskedvalue');
			data.append('NPWP', NPWP);
			var masked = $('.masked');
			$.each(masked, function(index, val) {
				/* iterate through array or object */
				var name = val.id;
				var d = $('input[name="'+name+'-mask"]').inputmask('unmaskedvalue');
				data.append(name, d);
			});

			var aktiva = $('input[name="TOTAL_AKTIVA-mask"]').inputmask('unmaskedvalue');
			var passiva = $('input[name="TOTAL_PASSIVA-mask"]').inputmask('unmaskedvalue');
			data.append('TOTAL_AKTIVA', aktiva);
			data.append('TOTAL_PASSIVA', passiva);

			$.ajax({
				url: 'Kuisioner/addLapkeu',
				type: 'POST',
				contentType: false,
				cache: false,
				processData: false,
				dataType: 'JSON',
				data: data,
				success: function(d){
					play = document.getElementById('notification');
					if (d.status == 'success') {
						toastr.success(d.pesan,'Berhasil');
						console.log(d.pesan);
					} else {
						toastr.error(d.pesan,'Gagal');
					}
					play.play();
					delete play;
				}
			}) 
		}
	}
</script>