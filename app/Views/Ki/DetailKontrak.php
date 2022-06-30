<div class="row" style="margin-top: 15px;">
	<div class="col-xl-12">
		<div id="kontenKontrak">
			
		</div>
		<div id="dataTable">
			<table id="tableIku" class="table table-bordered table-hover table-striped w-100 dataTable">
				<thead class="bg-highlight">
					<th>No</th>
					<th>Kode IKU</th>
					<th>Nama IKU</th>
					<th>Target Q1</th>
					<th>Target Q2</th>
					<th>Target Q3</th>
					<th>Target Q4</th>
					<th>Index Capaian Aktual</th>
					<th>Index Capaian Tahunan</th>
					<th>Action</th>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		var bulan = ['01','02','03','04','05','06','07','08','09','10','11','12'];
		var tanggal = ['00','01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'];
		var begin = new Date(dataDetail[0].TANGGAL_MULAI);
		var end = new Date(dataDetail[0].TANGGAL_SELESAI);
		$('#content-title').text(' Indikator Kinerja Utama (IKU) Saya');
		$('#kontenKontrak').html('<div class="alert alert-primary">'
			+'<div class="row fs-xl" style="margin-bottom:15px;">'
			+'<div class="col-xl-2"><label class="form-label">Nomor Kontrak</label></div>'
			+'<div class="col-xl-4">'+dataDetail[0].NOMOR_KONTRAK+'</div>'
			+'<div class="col-xl-2"><label class="form-label">Jenis SKP</label></div>'
			+'<div class="col-xl-4">'+dataDetail[0].JENIS_SKP+'</div>'
			+'</div>'
			+'<div class="row fs-xl" style="margin-bottom:15px;">'
			+'<div class="col-xl-2"><label class="form-label">Tanggal Mulai</label></div>'
			+'<div class="col-xl-4">'+tanggal[begin.getDate()]+'/'+bulan[begin.getMonth()]+'/'+begin.getFullYear()+'</div>'
			+'<div class="col-xl-2"><label class="form-label">Tanggal Selesai</label></div>'
			+'<div class="col-xl-4">'+tanggal[end.getDate()]+'/'+bulan[end.getMonth()]+'/'+end.getFullYear()+'</div>'
			+'</div>'
			+'<div class="row fs-xl" style="margin-bottom:15px;">'
			+'<div class="col-xl-2"><label class="form-label">Tahun</label></div>'
			+'<div class="col-xl-4">'+dataDetail[0].TAHUN+'</div>'
			+'</div>'
			+'<div class="row">'
			+'<button class="btn btn-success waves-effect waves-themed" onclick="loadPage('+"'Ki/KontrakKinerja'"+')"><span class="fas fa-backward"></span> Kembali</button>'
			+'</div>'
			+'</div>');

		$('.panel-toolbar').append('<div id="btnDownload" class="btn-group" role="group" style="margin-right:10px; margin-left:10px; width:100px;">'
			+'<button class="btn btn-warning btn-pills btn-xs btn-block waves-effect waves-themed">Download</button>'
			+'<div class="btn-group" data-toggle="dropdown">'
			+'<button class="btn btn-warning btn-pills btn-xs btn-block waves-effect waves-themed"><span class="fas fa-caret-down"></span></button>'
			+'<div class="dropdown-menu">'
			+'<a class="dropdown-item">Manual Iku</a>'
			+'<a class="dropdown-item">Kontrak Kinerja</a>'
			+'</div>'
			+'</div>'
			+'</div>');

		$('.panel-toolbar').append('<button id="btnBuatIku" class="btn btn-info btn-pills btn-xs btn-block waves-effect waves-themed" style="width:100px;" onclick="loadForm('+"'Ki/BuatIku'"+')">'
			+'<i class="fas fa-plus"></i> Buat Iku ' 
			+'</button>');

		$('#newKontrak').remove();
		$('#btnCariIku').remove();
		
		var table = $('#tableIku').DataTable(
		{
			responsive: true,
			orderCellsTop: true,
			fixedHeader: true,
		});
	});

	function loadForm(form){
		$.ajax({
			url: '<?php echo $base_url;?>/'+form,
			type: 'GET',
			dataType: 'html',
			success: function(d){
				$('#mainContent').html(d);
			}
		})
	}
</script>