<div class="row">
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
								<th>BC 1.6</th>
								<th>BC 2.3</th>
								<th>BC 2.5</th>
								<th>BC 2.6.1</th>
								<th>BC 2.6.2</th>
								<th>BC 2.7</th>
								<th>BC 2.8</th>
								<th>BC 4.0</th>
								<th>BC 4.1</th>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div id="panel-13" class="panel">
			<div class="panel-hdr">
				<h2>
					Data Detail Dokumen Yang Telah Terupload
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
						<table id="tableDetail" class="table table-bordered table-striped table-hover" style="width: 100%;">
							<thead>
								<th>TAHUN</th>
								<th>BULAN</th>
								<th>BC 1.6</th>
								<th>BC 2.3</th>
								<th>BC 2.5</th>
								<th>BC 2.6.1</th>
								<th>BC 2.6.2</th>
								<th>BC 2.7</th>
								<th>BC 2.8</th>
								<th>BC 4.0</th>
								<th>BC 4.1</th>
							</thead>
							<tbody></tbody>
						</table>
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
		getDataMonitoring();
	});

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

</script>
