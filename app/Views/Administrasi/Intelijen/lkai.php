<div class="row">
	<div class="col-xl-12">
		<div id="panel-1" class="panel">
			<div class="panel-hdr">
				<h2>
					<?php echo $tableTitle;?> <span class="fw-300"><i>Table</i></span>
				</h2>
				<div class="panel-toolbar">
					<div class="panel-toolbar flex-row-reverse">
						<button id="btnFullscreen" class="btn btn-warning btn-pills btn-xs waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen" style="width: 90;">Fullscreen</button>
					</div>
				</div>
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<!-- datatable start -->
					<table id="dataTable" class="table table-bordered table-hover table-striped w-100 dataTable no-footer" role="grid">
						<thead>
							<th>No</th>
							<th>NOMOR LKAI</th>
							<th>TANGGAL LKAI</th>
							<th>TINDAK LANJUT</th>
							<th>TUJUAN DISPOSISI</th>
							<th>FLAG PROSES</th>
							<th>Action</th>
						</thead>
						<tbody>

						</tbody>
					</table>
					<!-- datatable end -->
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modalLKAI" tabindex="-1" role="dialog" aria-modal="true" data-backdrop="false">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="fal fa-times"></i></span>
				</button>
			</div>
			<div class="modal-body">
				<form class="needs-validation" id="formLKAI" novalidate enctype="multipart/form-data">
					<div class="row">
						<div class="col-xl-6">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">Nomor LKAI: </span>
									</div>
									<input type="text" class="form-control" id="NOMOR_LKAI" name="NOMOR_LKAI_MASK" required>
								</div>
								<div class="invalid-feedback">
									Kolom Nomor Induk Berusaha Harus Diisi.
								</div>
							</div>
						</div>
						<div class="col-xl-6">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">Tanggal LKAI: </span>
									</div>
									<input type="text" class="form-control tanggal" id="TANGGAL_LKAI" name="TANGGAL_LKAI" required>
								</div>
								<div class="invalid-feedback">
									Kolom Nomor Induk Berusaha Harus Diisi.
								</div>
							</div>
						</div>
					</div>
					<div class="row" style="margin-top: 15px;">
						<div class="col-xl-3">
							<h3><strong>DOKUMEN SUMBER</strong></h3>
						</div>
						<div class="col-xl-9">
							<div class="row">
								<div class="col-xl-2">
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" class="custom-control-input" id="SUMBER_LKAI_LPPI" name="SUMBER_LKAI[]" value="LPPI">
										<label class="custom-control-label" for="SUMBER_LKAI_LPPI">&nbsp; LPPI</label>
									</div>
								</div>
								<div class="col-xl-5">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Nomor: </span>
										</div>
										<input type="text" class="form-control" id="NOMOR_LPPI" name="NOMOR_SUMBER[]" aria-label="Nomor LPPI">
									</div>
								</div>
								<div class="col-xl-5">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Tanggal: </span>
										</div>
										<input type="text" class="form-control tanggal" id="TANGGAL_LPPI" name="TANGGAL_SUMBER[]" aria-label="Tanggal LPPI">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-2">
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" class="custom-control-input" id="SUMBER_LKAI_LPTI" name="SUMBER_LKAI[]" value="LPT-I">
										<label class="custom-control-label" for="SUMBER_LKAI_LPTI">&nbsp; LPT-I</label>
									</div>
								</div>
								<div class="col-xl-5">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Nomor: </span>
										</div>
										<input type="text" class="form-control" id="NOMOR_LPT-I" name="NOMOR_SUMBER[]" aria-label="Nomor LPT-I">
									</div>
								</div>
								<div class="col-xl-5">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Tanggal: </span>
										</div>
										<input type="text" class="form-control tanggal" id="TANGGAL_LPT-I" name="TANGGAL_SUMBER[]" aria-label="Tanggal LPT-I">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-2">
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" class="custom-control-input" id="SUMBER_LKAI_NPI" name="SUMBER_LKAI[]" value="NPI">
										<label class="custom-control-label" for="SUMBER_LKAI_NPI">&nbsp; NPI</label>
									</div>
								</div>
								<div class="col-xl-5">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Nomor: </span>
										</div>
										<input type="text" class="form-control" id="NOMOR_NPI" name="NOMOR_SUMBER[]" aria-label="Nomor NPI">
									</div>
								</div>
								<div class="col-xl-5">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Tanggal: </span>
										</div>
										<input type="text" class="form-control tanggal" id="TANGGAL_NPI" name="TANGGAL_SUMBER[]" aria-label="Tanggal NPI">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row" style="margin-top: 15px;">
						<table class="table table-bordered">
							<thead class="text-center">
								<th>IKHSTISAR INFORMASI</th>
							</thead>
							<tbody>
								<tr>
									<td>
										<textarea class="form-control" name="IKHSTISAR" rows="4" onkeyup="textAreaAdjust(this)" required></textarea>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="row" style="margin-top: 15px;">
						<table class="table table-bordered">
							<thead class="text-center">
								<th>PROSEDUR ANALISIS</th>
							</thead>
							<tbody>
								<tr>
									<td>
										<textarea class="form-control" name="PROSEDUR" rows="4" onkeyup="textAreaAdjust(this)" required></textarea>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="row" style="margin-top: 15px;">
						<table class="table table-bordered">
							<thead class="text-center">
								<th>HASIL ANALISIS</th>
							</thead>
							<tbody>
								<tr>
									<td>
										<textarea class="form-control" name="HASIL" rows="4" onkeyup="textAreaAdjust(this)" required></textarea>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="row" style="margin-top: 15px;">
						<table class="table table-bordered">
							<thead class="text-center">
								<th>KESIMPULAN</th>
							</thead>
							<tbody>
								<tr>
									<td>
										<textarea class="form-control" name="KESIMPULAN" rows="4" onkeyup="textAreaAdjust(this)" required></textarea>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="row" style="margin-top: 15px;">
						<table class="table">
							<tbody>
								<tr>
									<td rowspan="4" style="width: 25%">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">TINDAK LANJUT</span>
											</div>
										</div>
									</td>
									<td style="width: 25%;">
										<div class="custom-control custom-checkbox">
											<input type="radio" class="custom-control-input" id="TINDAK_LANJUT_NHI" name="TINDAK_LANJUT" value="NHI">
											<label class="custom-control-label" for="TINDAK_LANJUT_NHI">NHI</label>
										</div>
									</td>
									<td></td>
								</tr>
								<tr>
									<td>
										<div class="custom-control custom-checkbox">
											<input type="radio" class="custom-control-input" id="TINDAK_LANJUT_NI" name="TINDAK_LANJUT" value="NI">
											<label class="custom-control-label" for="TINDAK_LANJUT_NI">NI</label>
										</div>
									</td>
									<td></td>
								</tr>
								<tr>
									<td>
										<div class="custom-control custom-checkbox">
											<input type="radio" class="custom-control-input" id="TINDAK_LANJUT_RL" name="TINDAK_LANJUT" value="RL">
											<label class="custom-control-label" for="TINDAK_LANJUT_RL">Rekomendasi Lainnya: </label>
										</div>
									</td>
									<td>
										<textarea class="form-control" rows="3" onkeyup="textAreaAdjust(this)" name="Rekomendasi"></textarea>
									</td>
								</tr>
								<tr>
									<td>
										<div class="custom-control custom-checkbox">
											<input type="radio" class="custom-control-input" id="TINDAK_LANJUT_IL" name="TINDAK_LANJUT" value="IL">
											<label class="custom-control-label" for="TINDAK_LANJUT_IL">Informasi Lainnya: </label>
										</div>
									</td>
									<td>
										<textarea class="form-control" rows="3" onkeyup="textAreaAdjust(this)" name="InformasiLain"></textarea>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="row" style="margin-top: 15px;">
						<div class="col-xl-6">
							<table class="table">
								<tr>
									<td style="width: 50%;">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">TUJUAN</span>
											</div>
										</div>
									</td>
									<td style="width: 50%;">
										<input class="form-control" id="TUJUAN" name="TUJUAN" required>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-6">
							<table class="table">
								<tbody>
									<tr>
										<td style="width: 50%;">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">ANALIS</span>
												</div>
											</div>
										</td>
										<td style="width: 50%;">
											<select class="custom-select nip" name="ANALIS" id="ANALIS" required>

											</select>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="row" style="margin-top: 15px;">
						<table class="table table-bordered">
							<thead>
								<th colspan="2"></th>
							</thead>
							<tbody>
								<tr>
									<td style="width: 25%;">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">KEPUTUSAN</span>
											</div>
										</div>
									</td>
									<td>
										<div class="custom-control custom-checkbox custom-control-inline">
											<input type="checkbox" class="custom-control-input" id="KEPUTUSAN_SATU_S" name="KEPUTUSAN_SATU" value="S">
											<label class="custom-control-label" for="KEPUTUSAN_SATU_S">SETUJU</label>
										</div>
										<div class="custom-control custom-checkbox custom-control-inline">
											<input type="checkbox" class="custom-control-input" id="KEPUTUSAN_SATU_T" name="KEPUTUSAN_SATU" value="T">
											<label class="custom-control-label" for="KEPUTUSAN_SATU_T">TIDAK SETUJU</label>
										</div>
									</td>
								</tr>
								<tr>
									<td style="width: 25%;">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">CATATAN</span>
											</div>
										</div>
									</td>
									<td>
										<textarea class="form-control" name="CATATAN_SATU" rows="3" onkeyup="textAreaAdjust(this)" required></textarea>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">Hasil Analisis Diterima Tanggal: </span>
											</div>
											<input type="text" class="form-control tanggal" id="TERIMA_ANAL" name="TERIMA_ANAL" required>
										</div>
									</td>
								</tr>
								<tr>
									<td style="width: 25%;">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">TANDA TANGAN</span>
											</div>
										</div>
									</td>
									<td>
										<select class="custom-select nip" name="PEJABAT_SATU" id="PEJABAT_SATU" required>

										</select>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="row" style="margin-top: 15px;">
						<table class="table table-bordered">
							<thead>
								<th colspan="2"></th>
							</thead>
							<tbody>
								<tr>
									<td style="width: 25%;">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">KEPUTUSAN</span>
											</div>
										</div>
									</td>
									<td>
										<div class="custom-control custom-checkbox custom-control-inline">
											<input type="checkbox" class="custom-control-input" id="KEPUTUSAN_DUA_S" name="KEPUTUSAN_DUA" value="S">
											<label class="custom-control-label" for="KEPUTUSAN_DUA_S">SETUJU</label>
										</div>
										<div class="custom-control custom-checkbox custom-control-inline">
											<input type="checkbox" class="custom-control-input" id="KEPUTUSAN_DUA_T" name="KEPUTUSAN_DUA" value="T">
											<label class="custom-control-label" for="KEPUTUSAN_DUA_T">TIDAK SETUJU</label>
										</div>
									</td>
								</tr>
								<tr>
									<td style="width: 25%;">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">CATATAN</span>
											</div>
										</div>
									</td>
									<td>
										<textarea class="form-control" name="CATATAN_DUA" rows="3" onkeyup="textAreaAdjust(this)" required></textarea>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">Hasil Analisis Diterima Tanggal: </span>
											</div>
											<input type="text" class="form-control tanggal" id="TERIMA_SEKSI" name="TERIMA_SEKSI" required>
										</div>
									</td>
								</tr>
								<tr>
									<td style="width: 25%;">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">TANDA TANGAN</span>
											</div>
										</div>
									</td>
									<td>
										<select class="custom-select nip" name="PEJABAT_DUA" id="PEJABAT_DUA" required>

										</select>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</form> 
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect waves-themed" id="back" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary waves-effect waves-themed" id="simpan" onclick="post('formLKAI')">Simpan</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var today = new Date();
	var dd = String(today.getDate()).padStart(2, '0');
	var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
	var yyyy = today.getFullYear();
	var pegawai = [];
	var rowId;
	var postMethod;
	var idEdit;

	today = yyyy + '-' + mm + '-' + dd;
	$(document).ready(function(){
		var newLKAI;
		var year = new Date().getFullYear();
		getDataPegawai();

		CKEDITOR.replace('IKHSTISAR');
		CKEDITOR.replace('PROSEDUR');
		CKEDITOR.replace('HASIL');
		CKEDITOR.replace('KESIMPULAN');

		$(':input').inputmask();
		$('[name="NOMOR_LKAI_MASK"]').inputmask({mask: "LK\\AI-9{1,3}/KBC.0\\90702/"+year, gready: false});
		var controls = {
			leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
			rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
		}
		var pegawaiUrl = "Pegawai/getPegawaiByName"
		$('.tanggal').datepicker({
			language: "id",
			format: "yyyy-mm-dd",
			orientation: "bottom right",
			todayHighlight: true,
			templates: controls
		});

		$('.nip').select2({
			placeholder: 'Ketik Nama Petugas/Pejabat',
			dropdownParent: $('[name="ANALIS"]').parent(),
			minimumInputLength: 3,
			allowClear: true,
			ajax : {
				url : pegawaiUrl,
				dataType : "JSON",
				delay : 250,
				data : function(params){
					return{
						name : params.term
					};
				},
				processResults: function(data){
					// console.log(data);
					var results = [];

					$.each(data, function(index, item){
						results.push({
							id : item.NIPPegawai,
							text : item.NamaPegawai
						})
					});
					return{
						results : results
					};
				},
				cache : true
			}
		});

		tabel = $("#dataTable").DataTable({
			initComplete : function(){
				var api = this.api();
				$("#dataTable_filter input")
				.off('.DT')
				.on('keyup.DT', function(e){
					if(e.keyCode == 13){
						api.search(this.value).draw();
					}
				});
			},
			"processing" : true,
			"serverSide" : true,
			"autoWidth"  : false,
			"bFilter"    : true,
			"order" : [],
			"columnDefs" : [
			{
				"targets"   : -1,
				"title"     : 'Action',
				"orderable" : false,
				"render"    : function(data, type, full, meta){
					var option;
					var del = "\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-danger btn-icon btn-inline-block mr-1' title='Delete Record' onclick=\"hapus("+data.id+")\"><i class=\"fal fa-times\"></i></a>";
					var val = "\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-success btn-icon btn-inline-block mr-1' title='Send Record' onclick=\"kirim("+data.id+")\"><i class=\"fal fa-paper-plane\"></i></a>";
					var ed =  "\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1' title='Edit' onclick=\"ubah("+data.id+")\"><i class=\"fal fa-edit\"></i></a>";
					var pri = "\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1' title='Print Record' onclick=\"cetak("+data.id+")\"><i class=\"fal fa-print\"></i></a>";
					if (data.flag == 0) {
						option = "\n\t\t\t\t\t\t<div class='d-flex demo'>"+del+ed+"\n\t\t\t\t\t\t\t</div><div class='d-flex demo'>"+val+pri+"</div>";
					} else 
					{ 
						option = "\n\t\t\t\t\t\t<div class='d-flex demo'>"+pri+"\n\t\t\t\t\t\t\t</div>";
					}
					return option;
				}
			}],
			"ajax" : {
				"url" : "Administrasi/datatableListLKAI",
				"type" : "POST",
				"data" : {
					"FLAG" : 0
				}
			},
		});
	});

	function getDataPegawai(){
		$.ajax({
			url: 'Pegawai/getAllPegawaiNip',
			type: 'GET',
			dataType: 'JSON',
			success: function(d){
				$.each(d, function(index, val) {
					/* iterate through array or object */
					pegawai[val['NIPPegawai']] = val['NamaPegawai'];
				});
			}
		})        
	}

	$("#SUMBER_LKAI_I").change(function(event) {
		if (this.checked) {
			$("#MEDIA_I, #TANGGAL_TERIMA_I, #NO_DOKUMEN_I, #TANGGAL_DOKUMEN_I").attr('required', 'required').removeAttr('disabled'); 
		} else {
			$("#MEDIA_I, #TANGGAL_TERIMA_I, #NO_DOKUMEN_I, #TANGGAL_DOKUMEN_I").removeAttr('required').attr('disabled', 'disabled');
		}    
	});

	$("#SUMBER_LKAI_E").change(function(event) {
		if (this.checked) {
			$("#MEDIA_E, #TANGGAL_TERIMA_E, #NO_DOKUMEN_E, #TANGGAL_DOKUMEN_E").attr('required', 'required').removeAttr('disabled'); 
		} else {
			$("#MEDIA_E, #TANGGAL_TERIMA_E, #NO_DOKUMEN_E, #TANGGAL_DOKUMEN_E").removeAttr('required').attr('disabled', 'disabled');
		}    
	});

	// LEMBAR INFORMASI FUNCTION
	function getLastLKAINumber(doc){
		$.ajax({
			url: 'Administrasi/getNomorLKAI',
			type: 'GET',
			dataType: 'JSON',
			data: {tahun: new Date().getFullYear(), type: doc},
			success: function(d){
				var no = ("000"+d.no).substr(-3);
				$('[name="NOMOR_LKAI_MASK"]').val(no);
			}
		})
	}

	function selectedValue(element,a,b){
		var data = [{id:a,text:b}];
		var selectedVal = $("#"+element);
		var option = new Option(b,a,true,true);
		selectedVal.append(option).trigger('change');

		selectedVal.trigger({
			type: "select2:select",
			params: {
				data: data
			}
		})
	}

	function textAreaAdjust(el){
		el.style.height = "1px";
		el.style.height = (25+el.scrollHeight)+"px";
	}

	function ubah(id){
		$("#formLKAI")[0].reset();
		$('.custom-control-input').trigger('change');
		$('#tabelInformasi > tbody').empty();
		$.ajax({
			url: 'Administrasi/getLKAIById',
			type: 'GET',
			dataType: 'JSON',
			data: {ID: id},
			success: function(d){
				postMethod = 'edit';
				idEdit = d.lkai.ID_LKAI;
				if (d.lkai.NO_LKAI === null) {
					getLastLKAINumber('LKAI');
					$('[name="TANGGAL_LKAI"]').val(today);
				} else {
					var noLKAI = ('000'+d.lkai.NO_LKAI).substr(-3);
					$('[name="NOMOR_LKAI_MASK"]').val(noLKAI);
					$('[name="TANGGAL_LKAI"]').val(d.lkai.TANGGAL_LKAI);
				}
				CKEDITOR.instances['IKHSTISAR'].setData(d.lkai.INFORMASI);
				CKEDITOR.instances['PROSEDUR'].setData(d.lkai.PROSEDUR_ANALISIS);
				CKEDITOR.instances['HASIL'].setData(d.lkai.HASIL_ANALISIS);
				CKEDITOR.instances['KESIMPULAN'].setData(d.lkai.KESIMPULAN);

				selectedValue('ANALIS', d.lkai.ANALIS, pegawai[d.lkai.ANALIS]);
				selectedValue('PEJABAT_SATU', d.lkai.PEJABAT_SATU, pegawai[d.lkai.PEJABAT_SATU]);
				selectedValue('PEJABAT_DUA', d.lkai.PEJABAT_DUA, pegawai[d.lkai.PEJABAT_DUA]);
				
				$('#TUJUAN').val(d.lkai.TUJUAN);
				$('[name="CATATAN_SATU"]').val(d.lkai.CATATAN_SATU);
				$('[name="CATATAN_DUA"]').val(d.lkai.CATATAN_DUA);
				$('#TERIMA_ANAL').val(d.lkai.TERIMA_SATU);
				$('#TERIMA_SEKSI').val(d.lkai.TERIMA_DUA);
				$('#TINDAK_LANJUT_'+d.lkai.TINDAK_LANJUT).attr('checked',true);
				$('#KEPUTUSAN_SATU_'+d.lkai.KEPUTUSAN_SATU).attr('checked',true);
				$('#KEPUTUSAN_DUA_'+d.lkai.KEPUTUSAN_DUA).attr('checked',true);

				if (typeof d.lppi !== 'undefined') {
					$('#SUMBER_LKAI_LPPI').attr('checked', 'checked');
					$('#NOMOR_LPPI').val(d.lppi.master.NO_LPPI_FULL);
					$('#TANGGAL_LPPI').val(d.lppi.master.TANGGAL_LPPI);
				}

				$(".modal-title").text('LEMBAR KERJA ANALISA INTELIJEN');
				$('#modalLKAI').modal('show');
			}
		})
		.done(function(){
			$('textarea').keyup();
		})   
	}

	function hapus(id){
		var swalWithBootstrapButtons = Swal.mixin(
		{
			customClass:
			{
				confirmButton: "btn btn-primary",
				cancelButton: "btn btn-danger mr-2"
			},
			buttonsStyling: false
		});
		swalWithBootstrapButtons
		.fire(
		{
			title: "Laporan Monitoring Umum Akan di Validasi?",
			text: "Anda Tidak Akan Dapat Merubah atau Menghapus Laporan Monitoring Umum Yang Sudah Divalidasi",
			type: "warning",
			showCancelButton: true,
			confirmButtonText: "Ya, Validasi Laporan!",
			cancelButtonText: "Tidak, Batalkan!",
			reverseButtons: true
		})
		.then(function(result)
		{
			if (result.value)
			{   
				$.ajax({
					url: 'Administrasi/hapusDataIntelijen',
					type: 'POST',
					dataType: 'JSON',
					data: {ID_LKAI: id, TYPE: 'LKAI'},
					success: function (d) {
						play = document.getElementById('notification');
						if (d.status == 'success') {
							swalWithBootstrapButtons.fire(
								"Laporan Berhasil Divalidasi!",
								"Data Laporan Monitoring Umum Sudah Tervalidasi",
								"success"
								);
						} else {
							swalWithBootstrapButtons.fire(
								"Telah Terjadi Kesalahan!",
								"Data Laporan Monitoring Umum Gagal Divalidasi <br> Harap Menghubungi Administrator",
								"error"
								);
						}
						tabel.ajax.reload(null, false);
					}
				})
			}
			else if (
				 // Read more about handling dismissals
				 result.dismiss === Swal.DismissReason.cancel
				 )
			{
				swalWithBootstrapButtons.fire(
					"Proses Hapus Laporan Dibatalkan",
					"Data Lembar Pengumpulan dan Penilaian",
					"error"
					);
			}
		});        
	}

	function post(form){
		var usedForm = "#"+form;

		if ($(usedForm)[0].checkValidity() === false ) {
			play = document.getElementById('notification');
			$(usedForm).addClass('was-validated');
			toastr.error('Isi Form Dengan Lengkap dan Benar','Gagal');
			play.play();
			delete play;
		} else {
			var data = $(usedForm).serializeArray();
			var nomor_li = $('input[name="NOMOR_LKAI_MASK"]').inputmask('unmaskedvalue');
			data[data.length] = {name: 'NOMOR_LKAI', value: nomor_li};
			data[data.length] = {name: 'FORM', value: form};
			data[data.length] = {name: 'postMethod', value: postMethod};
			if (postMethod == 'edit') {
				data[data.length] = {name: 'ID_LKAI', value: idEdit};
			}
			var ckedit = $('.cke');
			$.each(ckedit, function(index, val) {
				/* iterate through array or object */
				var idCk = val.id
				var el = idCk.slice(4);
				data[data.length] = {name: idCk, value: CKEDITOR.instances[el].getData()};
			});
			$.ajax({
				url: 'Administrasi/postDataIntelijen',
				type: 'POST',
				dataType: 'JSON',
				data: data,
				success: function(d){
					play = document.getElementById('notification');
					if (d.status == 'success') {
						toastr.success(d.pesan,'Berhasil');
					} else {
						toastr.error(d.pesan,'Gagal');
					}
					play.play();
					delete play;
					$("#modalLKAI").modal('hide');
					tabel.ajax.reload();
				}
			})
		}      
	}

</script>