<style type="text/css">
	.kk{
		border: none;
		border-bottom: 2px solid;
	}
</style>
<div class="row">
	<div class="col-xl-12">
		<div id="panel-1" class="panel">
			<div class="panel-hdr">
				<div class="col-lg-9">
					<h2>
						<span class="fas fa-list"></span>
						&nbsp; <span id="content-title"></span>
					</h2>
				</div>
				<div class="col-lg-3">
					<div class="panel-toolbar flex-row-reverse">
						<button id="btnFullscreen" class="btn btn-danger btn-pills btn-xs waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen" style="width: 90;">Fullscreen</button>
						<button type="button" class="btn btn-xs btn-primary waves-effect waves-themed" id="newKontrak" style="margin-right: 10px;" onclick="newKontrak()"><span class="fas fa-plus-circle"></span>Buat Kontrak</button>
					</div>
				</div>
			</div>
			<div class="panel-container collapse show" style="">
				<div class="panel-content">
					<div id="mainContent">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		getKontrakKinerja();
	});

	function getKontrakKinerja(){
		$('#content-title').text('Kontrak Kinerja');
		$('#mainContent').html('<div class="row"><div class="col-xl-12 d-flex flex-row-reverse "></div></div><div class="row" style="margin-top: 15px;"><div class="col-xl-12"><div class="row"><div class="col-xl-12 d-flex justify-content-center"><div class="col-xl-6"><div class="input-group input-group-sm bg-white shadow-inset-2"><div class="input-group-prepend"><span class="input-group-text bg-transparent border-right-0 py-1 px-3 text-success"><i class="fal fa-search"></i></span></div><input type="text" class="form-control border-left-0 bg-transparent pl-0" placeholder="Type here..."><div class="input-group-append"><button class="btn btn-default waves-effect waves-themed" type="button">Search</button></div></div></div></div></div></div></div><div class="row" style="margin-top: 15px;"><div class="col-xl-12"><div class="card-deck" id="kontrakCard"></div></div></div>')
		var bulan = ['01','02','03','04','05','06','07','08','09','10','11','12'];
		var tanggal = ['00','01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'];
		$.ajax({
			url: '<?php echo $base_url; ?>/Ki/getAllKontrak',
			type: 'GET',
			dataType: 'JSON',
			success: function(d){
				$.each(d, function(index, val) {
					var begin = new Date(val.TANGGAL_MULAI);
					var end = new Date(val.TANGGAL_SELESAI);
					$('#kontrakCard').append('<div class="col-xl-3 d-flex justify-content-center" style="margin-bottom: 50px;">'
						+'<div class="col-xl-8">'
						+'<div class="card">'
						+'<div class="demo">'
						+'<button class="btn btn-success btn-xs btn-icon waves-effect waves-themed" onclick="detailKontrak('+val.ID_KONTRAK_KINERJA+')" data-toggle="tooltip" data-placement="auto" title="view" data-original-title="View"><span class="fas fa-eye fa-xs"></span></button>'
						+'<button class="btn btn-warning btn-xs btn-icon waves-effect waves-themed" onclick="editKontrak('+val.ID_KONTRAK_KINERJA+')" " data-toggle="tooltip" data-placement="auto" title="edit" data-original-title="Edit"><span class="fas fa-edit fa-xs"></span></button>'
						+'<button class="btn btn-danger btn-xs btn-icon waves-effect waves-themed" onclick="deleteKontrak('+val.ID_KONTRAK_KINERJA+')" " data-toggle="tooltip" data-placement="auto" title="delete" data-original-title="delete"><span class="fas fa-trash fa-xs"></span></button>'
						+'</div>'
						+'<div class="card-body">'
						+'<h5 class="card-title text-center">'+val.NOMOR_KONTRAK+'</h5>'
						+'<hr class="kk">'
						+'<p class="card-text text-center">'+tanggal[begin.getDate()]+'/'+bulan[begin.getMonth()]+'/'+begin.getFullYear()+'<br> s.d. <br>'+tanggal[end.getDate()]+'/'+bulan[end.getMonth()]+'/'+end.getFullYear()+'<br> TAHUN '+val.TAHUN+'</p>'
						+'</div>'
						+'<div class="card-footer">'
						+'<small class="text-muted">Last updated 3 mins ago</small>'
						+'</div>'
						+'</div>'
						+'</div>'
						+'</div>');
				});
			}
		})		
	}

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

	function newKontrak() {
		loadForm('Ki/NewKontrak');
	}

	function detailKontrak(id){
		$.ajax({
			url: '<?php echo $base_url;?>/Ki/KontrakDetail',
			type: 'GET',
			dataType: 'JSON',
			data: {ID_KONTRAK_KINERJA: id},
			success: function(d){
				dataDetail = d;
				loadForm('Ki/DetailKontrak');
			}
		})		
	}

	function editKontrak(id){
		$.ajax({
			url: '<?php echo $base_url;?>/Ki/getKontrak',
			type: 'GET',
			dataType: 'JSON',
			data: {ID_KONTRAK_KINERJA: id},
			success: function(d){
				dataEdit = d;
				newKontrak();
			}
		})
	}

	// function deleteKontrak(id){
	// }

	function deleteKontrak(id)
	{
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
			title: "Kontrak Kinerja Akan Dihapus?",
			text: "Anda Tidak Akan Dapat Mengembalikan Data Kontrak Kinerja",
			type: "warning",
			showCancelButton: true,
			confirmButtonText: "Ya, Hapus Kontrak!",
			cancelButtonText: "Tidak, Batalkan!",
			reverseButtons: true
		})
		.then(function(result)
		{
			if (result.value)
			{	
				$.ajax({
					url: '<?php echo $base_url?>/Ki/deleteKontrak',
					type: 'POST',
					dataType: 'JSON',
					data: {ID_KONTRAK_KINERJA: id},
					success: function(d){
						$("#mainContent").empty();
						getKontrakKinerja();
						if (d[0] == 1) {
							swalWithBootstrapButtons.fire(
								"Terhapus!",
								"Data Kontrak Kinerja Anda Berhasil Dihapus",
								"success"
								);
						} else {
							swalWithBootstrapButtons.fire(
								"Telah Terjadi Kesalahan!",
								"Data Kontrak Kinerja Anda Gagal Dihapus <br> Harap Menghubungi Administrator",
								"error"
								);
						}
						// console.log(d);
					}
				})
			}
			else if (
                                // Read more about handling dismissals
                                result.dismiss === Swal.DismissReason.cancel
                                )
			{
				swalWithBootstrapButtons.fire(
					"Cancelled",
					"Your imaginary file is safe :)",
					"error"
					);
			}
		});
	}
</script>