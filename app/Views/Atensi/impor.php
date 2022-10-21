<div class="row justify-content-between">
	<div class="col-xl-6 border-faded bg-faded p-3 mb-g">
		<form class="needs-validation" id="form-search">
<!-- 			<div class="form-group d-flex">
				<div class="col-xl-2">
					<label class="form-label">Nama Perusahaan</label>
				</div>
				<div class="col-xl-8">
					<input type="text" id="nama" class="form-control shadow-inset-2 form-control" placeholder="Nama Perusahaan" name="nama">
				</div>
			</div> -->
			<div class="form-group d-flex">
				<div class="col-xl-2">
					<label class="form-label">Tanggal</label>
				</div>
				<div class="col-xl-3">
					<input type="text" id="tanggalMulai" name="tanggalMulai" class="form-control shadow-inset-2 tanggal" placeholder="yyyy-mm-dd">
				</div>
				<div class="col-xl-1"><span class="form-label">s.d.</span></div>
				<div class="col-xl-3">
					<input type="text" id="tanggalAkhir" name="tanggalAkhir" class="form-control shadow-inset-2 tanggal" placeholder="yyyy-mm-dd">
				</div>
				<div class="col-xl-4">
					<button type="button" class="btn btn btn-outline-primary waves-effect waves-themed" id="cari">
						<span class="fal fa-search mr-1"></span>
						Cari Data
					</button>
				</div>
			</div>
		</form> 
	</div>
	<div class="col-xl-3 border-faded bg-faded p-3 mb-g d-flex flex-row-reverse align-items-end">
		<div class="col-xl-4">
			<button class="btn btn btn-outline-primary waves-effect waves-themed" id="rekam">
				<span class="fal fa-plus mr-1"></span>
				Rekam Atensi
			</button>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xl-12">
		<div id="panel-1" class="panel">
			<div class="panel-hdr">
				<h2>
					<?php echo $tableTitle;?> <span class="fw-300"><i>Table</i></span>
				</h2>
				<div class="panel-toolbar">
					<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
					<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
					<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
				</div>
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<!-- datatable start -->
					<table id="dataTable" class="table table-bordered table-hover table-striped w-100 dataTable no-footer" role="grid">
						<thead>
							<th style="vertical-align: middle;">No</th>
							<th style="vertical-align: middle;">No Container</th>
							<th style="width: 20%;">
								Nama Perusahaan
							</th>
							<th style="vertical-align: middle;">Gate In CDP</th>
							<th style="vertical-align: middle;">Gate Out CDP</th>
							<th style="vertical-align: middle;">No PIB</th>
							<th style="vertical-align: middle;">Tanggal PIB</th>
							<th style="vertical-align: middle;">Status CEISA</th>
							<th style="vertical-align: middle;">Action</th>
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
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-modal="true" data-backdrop="false">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="fal fa-times"></i></span>
				</button>
			</div>
			<div class="modal-body">   
				<form id="formMonev" class="needs-validation" novalidate="novalidate">
					<table class="table table-striped" style="width: 100%;">
						<tr>
							<td style="width: 20%;">
								<label class="control-label">NPWP</label>
							</td>
							<td>
								<input class="form-control" name="npwp" id="npwp" required>
								<div class="invalid-feedback">
									Kalom NPWP Tidak Boleh Kosong.
								</div>
							</td>
						</tr>
						<tr class="hidden">
							<td colspan="2">

							</td>
						</tr>
						<tr>
							<td style="width: 20%;">
								<label class="control-label">Nama Perusahaan</label>
							</td>
							<td>
								<input class="form-control" name="namaPerusahaan" id="namaPerusahaan" required>
								<div class="invalid-feedback">
									Kalom Nama Perusahan Tidak Boleh Kosong.
								</div>
							</td>
						</tr>
						<tr class="hidden">
							<td colspan="2">

							</td>
						</tr>
						<tr>
							<td>
								<label class="control-label">No Container</label>
							</td>
							<td>
								<input class="form-control" type="text" name="container" id="container" required>
								<div class="invalid-feedback">
									Kalom No Container Tidak Boleh Kosong.
								</div>
							</td>
							
						</tr>
						<tr class="hidden">
							<td colspan="2">

							</td>
						</tr>
						<tr>
							<td>
								<label class="control-label">Tanggal Atensi</label>
							</td>
							<td>
								<input class="form-control tanggal" type="text" name="tanggal" id="tanggal" required>
								<div class="invalid-feedback">
									Kalom Tanggal Atensi Tidak Boleh Kosong.
								</div>
							</td>

						</tr>
						<tr class="hidden">
							<td colspan="2">

							</td>
						</tr>
					</table>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect waves-themed" id="back" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary waves-effect waves-themed" id="simpan" onclick="save()">Simpan</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$(':input').inputmask();
		$('.tanggal').datepicker({
			format: 'yyyy-mm-dd',
			todayHighLight: true,
			orientation: "bottom right"
		});

		table = $('#dataTable').DataTable({
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
					var del = "\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-danger btn-icon btn-inline-block mr-1' title='Delete Record' onclick=\"deleteItem("+data.id+")\"><i class=\"fal fa-times\"></i></a>";
					var val = "\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-success btn-icon btn-inline-block mr-1' title='Validate Record' onclick=\"validateItem("+data.id+")\"><i class=\"fal fa-paper-plane\"></i></a>";
					var ed =  "\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-warning btn-icon btn-inline-block mr-1' title='Edit Record' onclick=\"edit("+data.id+")\"><i class=\"fal fa-edit\"></i></a>";
					var pri = "\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1' title='Print Record' onclick=\"printItem("+data.id+")\"><i class=\"fal fa-print\"></i></a>";
					if (data.flag == 0) {
						option = "\n\t\t\t\t\t\t<div class='d-flex demo'>"+del+ed+"\n\t\t\t\t\t\t\t</div><div class='d-flex demo'>"+val+pri+"</div>";} else { option = "\n\t\t\t\t\t\t<div class='d-flex demo'>"+pri+"\n\t\t\t\t\t\t\t</div>";}
						return option;
					}
				}],
				"ajax" : {
					"url" : "Atensi/datatableList",
					"type" : "POST",
					"data" : function(d){
						d.tanggalAwal = $('[name="tanggalMulai"]').val();
						d.tanggalAkhir = $('[name="tanggalAkhir"]').val();
					}
				},
			});
	});
	
	$("#rekam").on('click',function(event) {
		event.preventDefault();
		/* Act on the event */
		save_method = "add";
		var curdate = "<?php echo date('Y-m-d'); ?>";
		$("#formMonev")[0].reset();
		$(".modal-title").text('Form Rekam Atensi Kontainer');
		$("#modalForm").modal("show");
		$("#tanggal").val(curdate);
	});

	function save() {
		var url = "Atensi/postAtensi";
		var data;
		var form = $("#formMonev");
		data = form.serializeArray();
		$.ajax({
			url: url,
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
				$("#modalForm").modal('hide');
				table.ajax.reload(null, false);
			}
		})
	}
</script>