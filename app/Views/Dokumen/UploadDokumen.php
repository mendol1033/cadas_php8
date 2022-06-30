<div class="row">
	<div class="col-lg-6">
		<div id="panel-11" class="panel">
			<div class="panel-hdr">
				<h2>
					File <span class="fw-300"><i>upload</i></span>
				</h2>
				<div class="panel-toolbar">
					<button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
					<button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
					<button class="btn btn-panel waves-effect waves-themed" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
				</div>
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<div class="panel-tag">
						Form Upload Data Dokumen TPB yang berasal dari CEISA TPB
					</div>
					<div id="feedbackArea">
						
					</div>
					<div class="form-group">
						<form class="needs-validation" id="formDokumen" enctype="multipart/form-data" novalidate>
							<div class="form-group">
								<label class="form-check-label" for="jenisData">JENIS DATA DOKUMEN</label>
								<select class="form-control select2" id="jenisData" name="jenisData">
									<option value="tpb_header">DATA HEADER TPB</option>
									<option value="tpb_detail">DATA DETAIL TPB</option>
									<option value="impor_header">DATA HEADER IMPOR</option>
									<option value="impor_detail">DATA DETAIL IMPOR</option>
									<option value="impor_sptnp">DATA SPTNP IMPOR</option>
									<option value="impor_fasilitas">DATA FASILITAS IMPOR</option>
									<option value="ekspor_header">DATA HEADER EKSPOR</option>
									<option value="ekspor_detail">DATA DETAIL EKSPOR</option>
								</select>
							</div>
							<div class="form-group">
								<label class="form-label" for="dataExcel">FILE CSV</label>
								<div class="input-group">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="dataExcel" name="dataExcel[]" multiple required>
										<label class="custom-file-label" id="labelDataExcel" for="dataExcel">PILIH FILE</label>
									</div>
									<div class="input-group-append">
										<button class="btn btn-outline-default waves-effect waves-themed" type="submit" id="buttonUpload01">Upload</button>
									</div>
									<div class="invalid-feedback">Pilih File Excel yang akan diupload terlebih dahulu.</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="missingSign" class="row sr-only">
	<div class="col-lg-12">
		<div id="panel-12" class="panel">
			<div class="panel-hdr">
				<h2>
					Form Input Data Referensi Importir
				</h2>
				<div class="panel-toolbar">
					<button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
					<button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
					<button class="btn btn-panel waves-effect waves-themed" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
				</div>
			</div>
			<div class="panel-container show">
				<div id="missingSign-content" class="panel-content">
					
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var formValid = [];
	$(document).ready(function() {
		$('.select2').select2({
			width: '100%'
		});
		// getDataMonitoring();
	});

	$('[name="dataExcel[]"').on('change', function(event) {
		/* Act on the event */
		formValid = [];
		var label= "";
		for (var i = 0 ; i < this.files.length ; i++) {
			switch (i) {
				case (this.files.length -1):
				label = label + this.files[i].name;
				break;

				default:
				label = label + this.files[i].name +", ";
				break;
			}
		}
		$("#labelDataExcel").text(label);
		// console.log(this.files);
		// console.log(formValid);
	});

	$("#formDokumen").on('submit', function(event) {
		event.preventDefault();
		/* Act on the event */
		if (this.checkValidity() === false) {
			$('#formDokumen').addClass('was-validated');
		} else {
			if ($.inArray(false, formValid) == -1) {
				$.ajax({
					url: 'Dokumen/uploadData',
					type: 'POST',
					contentType : false,
					cache : false,
					processData : false,
					dataType: 'JSON',
					data: new FormData(this),
					beforeSend: function(jqXHR, exception){
						// console.log(jqXHR);
						$("#buttonUpload01").attr('disabled', 'disabled');
						$("#buttonUpload01").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Uploading');
					},
					success: function(d){
						
						var pesan = "";
						for (var i = 0; i < d.pesan.length; i++) {
							switch (i) {
								case d.pesan.length -1:
								pesan += d.pesan[i];
								break;
								default:
								pesan += d.pesan[i] + "<br>";
								break;
							}
							d.pesan[i]
						}
						play = document.getElementById('notification');
						if (d.status == 'success') {
							toastr.success('Data Berhasil di Upload <br>' + pesan,'Berhasil');
						} else {
							toastr.error('Data Gagal di Upload','Gagal');
							$("#missingSign-content").append('<div><form id="formMissng"><div class="row"><div class="col-lg-3">NPWP</div><div class="col-lg-3">Nama Importir</div><div class="col-lg-3">Profil Risiko</div><div class="col-lg-3">Penangung Jawab</div></div></form></div>');
							$.each(d.data, function(index, val) {
								$("#formMissng").append('<div class="row"><div class="col-lg-3"><input class="form-control" name="npwp[]" value="'+val.NPWP+'"></div><div class="col-lg-3"><input class="form-control" name="namaPerusahaan[]" value="'+val.NamaImportir+'"></div><div class="col-lg-3"><select class="form-control" name="risk[]"><option value="H">High Risk</option><option value="L">Low Risk</option></select></div><div class="col-lg-3"><input class="form-control" name="sign[]" value=""></div></div>');
							});
							$("#missingSign-content").append('<div class="row flex-row-reverse"><button class="btn btn-info pull-right" onclick="submitRefImportir()">Submit</button></div>')
							$("#missingSign").removeClass('sr-only');
						}

						play.play();
						delete play;

						// console.log(d);
						$("#buttonUpload01").removeAttr('disabled');
						$("#buttonUpload01").html('Upload');
						// getDataMonitoring();
						setTimeout(dismiss, 10000);
					},
					error : function(jqXHR, exception){
						console.log('error');
						console.log(jqXHR);
						console.log(exception);
						$("#buttonUpload01").removeAttr('disabled');
						$("#buttonUpload01").html('Upload');
						$("#feedbackArea").html("<p>"+jqXHR.responseJSON.message+"</p>");
						setTimeout(dismiss, 10000);
					// console.log(jqXHR);
				}
			})	
			} else {
				$('#feedbackArea').html('<div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert"><button id="alertButton" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="fal fa-trash-alt"></i></span></button>Gagal Upload, Ada File dengan Ukuran Lebih dari 2 MB</div>');
				setTimeout(dismiss, 10000);
			}		
		}
	});

	function dismiss(){
		$('#feedbackArea').empty();
	}

	function getDataMonitoring(){
		$.ajax({
			url: '/Dokumen/getMonitoringUpload',
			type: 'GET',
			dataType: 'JSON',
			data: {hak: <?php echo $_SESSION['GrupMenu']?>},
			success: function(d){
				$("#tableHeader > tbody").empty();
				$("#tableDetail > tbody").empty();
				for (var i = 0; i < d.HEADER.length; i++) {
					$("#tableHeader > tbody").append('<tr><td>'+d.HEADER[i].TAHUN+'</td>'+'<td>'+d.HEADER[i].BULAN+'</td>'+'<td>'+d.HEADER[i].JUMLAH_BC_16+'</td>'+'<td>'+d.HEADER[i].JUMLAH_BC_23+'</td>'+'<td>'+d.HEADER[i].JUMLAH_BC_25+'</td>'+'<td>'+d.HEADER[i].JUMLAH_BC_261+'</td>'+'<td>'+d.HEADER[i].JUMLAH_BC_262+'</td>'+'<td>'+d.HEADER[i].JUMLAH_BC_27+'</td>'+'<td>'+d.HEADER[i].JUMLAH_BC_28+'</td>'+'<td>'+d.HEADER[i].JUMLAH_BC_40+'</td>'+'<td>'+d.HEADER[i].JUMLAH_BC_41+'</td></tr>');
				}
				for (var i = 0; i < d.DETAIL.length; i++) {
					$("#tableDetail > tbody").append('<tr><td>'+d.DETAIL[i].TAHUN+'</td>'+'<td>'+d.DETAIL[i].BULAN+'</td>'+'<td>'+d.DETAIL[i].JUMLAH_BC_16+'</td>'+'<td>'+d.DETAIL[i].JUMLAH_BC_23+'</td>'+'<td>'+d.DETAIL[i].JUMLAH_BC_25+'</td>'+'<td>'+d.DETAIL[i].JUMLAH_BC_261+'</td>'+'<td>'+d.DETAIL[i].JUMLAH_BC_262+'</td>'+'<td>'+d.DETAIL[i].JUMLAH_BC_27+'</td>'+'<td>'+d.DETAIL[i].JUMLAH_BC_28+'</td>'+'<td>'+d.DETAIL[i].JUMLAH_BC_40+'</td>'+'<td>'+d.DETAIL[i].JUMLAH_BC_41+'</td></tr>');
				}
			}
		})		
	}

	function submitRefImportir(){
		var data = $("#formMissng").serializeArray();
		$.ajax({
			url: 'Dokumen/UpdateRefImportir',
			type: 'POST',
			dataType: 'JSON',
			data: data,
			success: function(data){
				$('#missingSign-content').empty();
				$('#missingSign').addClass('sr-only');	
				play = document.getElementById('notification');
				if (data === 'success') {
					toastr.success('Data Referensi Importir Berhasil di Update','Berhasil');
				} else {
					toastr.error('Data Referensi Importir Gagal di Update','Gagal');
				}
				play.play();
				delete play;
			}
		})		
	}

</script>
