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
								<label class="form-check-label" for="perusahaan">PILIH PERUSAHAAN</label>
								<select class="form-control select2" id="perusahaan" name="perusahaan">
									
								</select>
							</div>
							<div class="form-group">
								<label class="form-check-label" for="JenisLaporan">JENIS DATA DOKUMEN</label>
								<select class="form-control select2" id="JenisLaporan" name="jenisData">
									<option value="1">PEMASUKAN PER DOKUMEN PABEAN</option>
									<option value="2">PENGELUARAN PER DOKUMEN PABEAN</option>
									<option value="3">MUTASI BAHAN BAKU</option>
									<option value="4">MUTASI BARANG JADI</option>
									<option value="5">MUTASI MESIN</option>
									<option value="6">MUTASI SCRAP</option>
									<option value="7">POSISI WIP</option>
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

<script type="text/javascript">
	var formValid = [];
	$(document).ready(function() {
		$('.select2').select2({
			width: '100%'
		});
		// getDataMonitoring();

		$("#perusahaan").select2({
			width : '100%',
			placeholder: 'Pilih Nama Perusahaan',
			minimumInputLength: 5,
			allowClear: true,
			ajax : {
				url : "Stakeholders/getStakeholders",
				dataType : "JSON",
				delay : 250,
				data : function(params){
					return{
						nama : params.term
					};
				},
				processResults: function(data){
					var results = [];

					$.each(data, function(index, item){
						results.push({
							id : item.ID,
							text : item.NAMA_PERUSAHAAN + " | " + item.NAMA_FASILITAS.toUpperCase() + " | " + item.NO_SKEP
						})
					});
					return{
						results : results
					};
				},
				cache : true
			}
		});
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
					url: 'ItInventory/uploadData',
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
</script>