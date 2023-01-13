<div class="row">
	<div class="col-lg-3"></div>
	<div class="col-lg-6">
		<div class="panel" id="panel-13">
			<div class="panel-hdr">
				<h2>
					FILTER DOKUMEN
				</h2>
				<div class="panel-toolbar">
					<button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
					<button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
					<button class="btn btn-panel waves-effect waves-themed" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
				</div>
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<form id="form_filter" class="needs-validation" novalidate="novalidate">
						<div class="form-group">
						    <label for="kode_dokumen" class="form-label">Kode Dokumen</label>                        
						    <select name="kode_dokumen" id="kode_dokumen" class="form-control select2" style="width:100%;">
						    	<option value="16">BC 1.6</option>
						    	<option value="20">BC 2.0</option>
						    	<option value="23">BC 2.3</option>
						    	<option value="25">BC 2.5</option>
						    	<option value="261">BC 2.6.1</option>
						    	<option value="262">BC 2.6.2</option>
						    	<option value="27">BC 2.7</option>
						    	<option value="28">BC 2.8</option>
						    	<option value="30">BC 3.0</option>
						    	<option value="33">BC 3.3</option>
						    	<option value="40">BC 4.0</option>
						    	<option value="41">BC 4.1</option>
						    </select>
						</div>
						<div class="form-group">
							<label for="tahun" class="form-label">Tahun</label>
							<select name="tahun" id="tahun" class="form-control select2">
								<?php
									$tahun = date('Y');
									for ($i = 2016; $i <= (int)$tahun; ++$i) {
										echo '<option value="'.$i.'">'.$i.'</option>';
									}
								?>
							</select>
						</div>
						<div class="form-group">
						    <button type="button" class="btn btn-primary waves-effect waves-themed" id="find">Cari</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3"></div>
</div>
<div class="row">
	<div class="col-lg-3"></div>
	<div class="col-lg-6">
		<div id="panel-12" class="panel">
			<div class="panel-hdr">
				<h2>
					Data Header Dokumen Yang Telah Terupload
				</h2>
				<div class="panel-toolbar">
					<button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
					<button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
					<button class="btn btn-panel waves-effect waves-themed" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
				</div>
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<div>
						<table id="tableHeader" class="table table-bordered table-striped table-hover" style="width: 100%;">
							<thead>
								<th>TAHUN</th>
								<th>BULAN</th>
								<th>HEADER</th>
								<th>DETAIL</th>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3"></div>
</div>
<script type="text/javascript">
	var formValid = [];
	$(document).ready(function() {
		$('.select2').select2({
			width: '100%'
		});
	});

	$('#find').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		var kode = $('#kode_dokumen').val();
		var tahun = $('#tahun').val();
		getDataMonitoring(kode, tahun);
	});

	function getDataMonitoring(kode, tahun){
		$.ajax({
			url: '/Dokumen/getMonitoringUpload',
			type: 'GET',
			dataType: 'JSON',
			data: {hak: <?php echo $_SESSION['GrupMenu']?>, kode:kode, tahun: tahun},
			success: function(d){
				$("#tableHeader > tbody").empty();
				if (d.HEADER.length > 0) {
					for (var i = 0; i < d.HEADER.length; i++) {
						if (d.DETAIL[i] != undefined) {
							$("#tableHeader > tbody").append('<tr><td>'+d.HEADER[i].TAHUN+'</td>'+'<td>'+d.HEADER[i].BULAN+'</td>'+'<td>'+d.HEADER[i].JUMLAH_DOKUMEN+'</td>'+'<td>'+d.DETAIL[i].JUMLAH_DOKUMEN+'</td></tr>');
						} else {
							$("#tableHeader > tbody").append('<tr><td>'+d.HEADER[i].TAHUN+'</td>'+'<td>'+d.HEADER[i].BULAN+'</td>'+'<td>'+d.HEADER[i].JUMLAH_DOKUMEN+'</td>'+'<td>0</td></tr>');
						}
						
					}
				} else {
					if (d.DETAIL.length > 0) {
						for (var i = 0; i < d.DETAIL.length; i++) {
							$("#tableHeader > tbody").append('<tr><td>'+d.DETAIL[i].TAHUN+'</td>'+'<td>'+d.DETAIL[i].BULAN+'</td>'+'<td>0</td>'+'<td>'+d.DETAIL[i].JUMLAH_DOKUMEN+'</td></tr>');
						}
					} else {
						alert('DATA TIDAK DITEMUKAN');
					}
				}
				
			}
		})		
	}

</script>
