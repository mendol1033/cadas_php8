<!DOCTYPE html>
<!-- 
Template Name:  SmartAdmin Responsive WebApp - Template build with Twitter Bootstrap 4
Version: 4.4.1
Author: Sunnyat Ahmmed
Website: http://gootbootstrap.com
Purchase: https://wrapbootstrap.com/theme/smartadmin-responsive-webapp-WB0573SK0
License: You must have a valid license purchased only from wrapbootstrap.com (link above) in order to legally use this theme for your project.
-->
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>
		<?php echo $title?>
	</title>
	<meta name="description" content="Login">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
	<!-- Call App Mode on ios devices -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<!-- Remove Tap Highlight on Windows Phone IE -->
	<meta name="msapplication-tap-highlight" content="no">
	<!-- base css -->
	<link rel="stylesheet" media="screen, print" href="assets/css/vendors.bundle.css">
	<link rel="stylesheet" media="screen, print" href="assets/css/app.bundle.css">
	<!-- Place favicon.ico in the root directory -->
	<link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
	<link rel="mask-icon" href="assets/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<!-- Optional: page related CSS-->
	<link rel="stylesheet" media="screen, print" href="assets/css/page-login-alt.css">
	<link rel="stylesheet" media="screen, print" href="assets/css/notifications/toastr/toastr.css">
	<link rel="stylesheet" media="screen, print" href="assets/css/notifications/sweetalert2/sweetalert2.bundle.css">
</head>
<body>
	<div class="row d-flex justify-content-center" style="height: 100%;">
		<div class="col-xl-10">
			<div id="panel-1" class="panel">
				<div class="panel-hdr d-flex justify-content-center">
					<h1>
						SELAMAT DATANG DI SISTEM PEMBERITAHUAN PROFILE PENGGUNA JASA
					</h1>
				</div>
				<div class="panel-container show">
					<div class="panel-content">
						<div class="panel-tag">
							Isi Formulir Di bawah ini untuk mengetahui Profil Perusaahan Anda
						</div>
						<div class="row d-flex justify-content-center">
							<form class="needs-validation" id="form">
								<table class="table table-striped" style="width: 800px;">
									<tbody>
										<tr>
											<td style="width: 25%;">
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text">NPWP PERUSAHAAN</span>
													</div>
												</div>
											</td>
											<td><input type="text" class="form-control" id="nwpw" name="npwp-mask" placeholder="NPWP 15 Digit" required></td>
										</tr>
										<tr>
											<td style="width: 25%;">
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text">NAMA PERUSAHAAN</span>
													</div>
												</div>
											</td>
											<td><input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Perusahaan Penerima Fasilitas TPB" required></td>
										</tr>
										<tr>
											<td style="width: 25%;">
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text">PENERBIT SKEP TPB</span>
													</div>
												</div>
											</td>
											<td>
												<div class="d-flex align-items-center">
													<div class="custom-control custom-radio-rounded custom-control-inline">
														<input type="radio" class="custom-control-input" id="WBC" name="PENERBIT_SKEP" value="WBC">
														<label class="custom-control-label" for="WBC">KANWIL BC</label>
													</div>
													<div class="custom-control custom-radio-rounded custom-control-inline">
														<input type="radio" class="custom-control-input" id="KBC" name="PENERBIT_SKEP" value="KBC">
														<label class="custom-control-label" for="KBC">KPPBC</label>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td style="width: 25%;">
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text">SKEP TERAKHIR PERUSAHAAN</span>
													</div>
												</div>
											</td>
											<td><input type="text" class="form-control" id="skep" name="skep-mask" placeholder="Skep Terakhir TPB Yang Terdaftar Di Modul" required></td>
										</tr>
										<tr>
											<td style="width: 25%;">
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text">EMAIL PERUSAHAAN</span>
													</div>
												</div>
											</td>
											<td><input type="email" class="form-control" id="email" name="email" placeholder="Email Resmi Perusahaan" required></td>
										</tr>
										<tr>
											<td style="width: 25%;">
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text">NAMA EXIM</span>
													</div>
												</div>
											</td>
											<td><input type="text" class="form-control" id="exim" name="exim" placeholder="Nama Lengkap Exim" required></td>
										</tr>
										<tr>
											<td style="width: 25%;">
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text">NO HANDPHONE</span>
													</div>
												</div>
											</td>
											<td><input type="text" class="form-control" id="hp" name="hp" placeholder="No Handphone Yang Terhubung Dengan Whatsapp" required></td>
										</tr>
										<tr>
											<td colspan="2">
												<div class="d-flex justify-content-end">
													<button class="btn btn-success" type="button" id="submit">SUBMIT FORM</button>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-modal="true" data-backdrop="false">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true"><i class="fal fa-times"></i></span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row d-flex justify-content-center">
						<form class="needs-validation">
							<table class="table table-striped" style="width: 800px;">
								<tbody>
									<tr>
										<td style="width: 25%;">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">NPWP PERUSAHAAN</span>
												</div>
											</div>
										</td>
										<td><input type="text" class="form-control" id="MODAL_NPWP" name="SKOR-NPWP-MASK" disabled></td>
									</tr>
									<tr>
										<td style="width: 25%;">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">NAMA PERUSAHAAN</span>
												</div>
											</div>
										</td>
										<td><input type="text" class="form-control" id="MODAL_NAMA_PT" name="SKOR_NAMA_PT" disabled></td>
									</tr>
									<tr>
										<td style="width: 25%;">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">NOMOR SKEP TPB</span>
												</div>
											</div>
										</td>
										<td><input type="text" class="form-control" id="MODAL_NOMOR_SKEP" name="SKOR_NOMOR_SKEP" disabled></td>
									</tr>
									<tr>
										<td style="width: 25%;">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">TANGGAL SKEP TPB</span>
												</div>
											</div>
										</td>
										<td><input type="text" class="form-control" id="MODAL_TANGGAL_SKEP" name="SKOR_TANGGAL_SKEP" disabled></td>
									</tr>
									<tr>
										<td style="width: 25%;">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">JENIS SKEP TPB</span>
												</div>
											</div>
										</td>
										<td><input type="text" class="form-control" id="MODAL_JENIS_SKEP" name="SKOR_JENIS_SKEP" disabled></td>
									</tr>
								</tbody>
							</table>
						</form>
					</div>
					<div class="row">
						<div class="col-sm-6 col-xl-3">
							<div class="p-3 bg-primary-500 rounded overflow-hidden position-relative text-white mb-g">
								<div>
									<h2 class="display-4 d-block l-h-n m-0 fw-500" id="SKOR_INHEREN">
										<small class="m-0 l-h-n">SKOR INHEREN</small>
									</h2>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-xl-3">
							<div class="p-3 bg-primary-500 rounded overflow-hidden position-relative text-white mb-g">
								<div>
									<h2 class="display-4 d-block l-h-n m-0 fw-500" id="SKOR_OPERASIONAL">
										<small class="m-0 l-h-n">SKOR OPERASIONAL</small>
									</h2>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-xl-3">
							<div class="p-3 bg-primary-500 rounded overflow-hidden position-relative text-white mb-g">
								<div>
									<h2 class="display-4 d-block l-h-n m-0 fw-500" id="SKOR_REKAM_JEJAK">
										<small class="m-0 l-h-n">SKOR REKAM JEJAK</small>
									</h2>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-xl-3">
							<div id="SKOR" class="p-3 rounded overflow-hidden position-relative text-white mb-g">
								<div>
									<h2 class="display-4 d-block l-h-n m-0 fw-500" id="SKOR_AKHIR">
										<small class="m-0 l-h-n">SKOR AKHIR</small>
									</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row d-flex justify-content-center">
					<div class="col-xl-12">
						<h2 class="text-center" id="greet"></h2>
						<p class="text-center" style="font-size: 22px;" id="greet_content"></p>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary waves-effect waves-themed" id="back" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<video poster="assets/img/backgrounds/clouds.png" id="bgvid" playsinline autoplay muted loop><source src="assets/media/video/cc.webm" type="video/webm"><source src="assets/media/video/cc.mp4" type="video/mp4">
	</video>
	<!-- BEGIN Color profile -->
	<!-- this area is hidden and will not be seen on screens or screen readers -->
	<!-- we use this only for CSS color refernce for JS stuff -->
	<p id="js-color-profile" class="d-none">
		<span class="color-primary-50"></span>
		<span class="color-primary-100"></span>
		<span class="color-primary-200"></span>
		<span class="color-primary-300"></span>
		<span class="color-primary-400"></span>
		<span class="color-primary-500"></span>
		<span class="color-primary-600"></span>
		<span class="color-primary-700"></span>
		<span class="color-primary-800"></span>
		<span class="color-primary-900"></span>
		<span class="color-info-50"></span>
		<span class="color-info-100"></span>
		<span class="color-info-200"></span>
		<span class="color-info-300"></span>
		<span class="color-info-400"></span>
		<span class="color-info-500"></span>
		<span class="color-info-600"></span>
		<span class="color-info-700"></span>
		<span class="color-info-800"></span>
		<span class="color-info-900"></span>
		<span class="color-danger-50"></span>
		<span class="color-danger-100"></span>
		<span class="color-danger-200"></span>
		<span class="color-danger-300"></span>
		<span class="color-danger-400"></span>
		<span class="color-danger-500"></span>
		<span class="color-danger-600"></span>
		<span class="color-danger-700"></span>
		<span class="color-danger-800"></span>
		<span class="color-danger-900"></span>
		<span class="color-warning-50"></span>
		<span class="color-warning-100"></span>
		<span class="color-warning-200"></span>
		<span class="color-warning-300"></span>
		<span class="color-warning-400"></span>
		<span class="color-warning-500"></span>
		<span class="color-warning-600"></span>
		<span class="color-warning-700"></span>
		<span class="color-warning-800"></span>
		<span class="color-warning-900"></span>
		<span class="color-success-50"></span>
		<span class="color-success-100"></span>
		<span class="color-success-200"></span>
		<span class="color-success-300"></span>
		<span class="color-success-400"></span>
		<span class="color-success-500"></span>
		<span class="color-success-600"></span>
		<span class="color-success-700"></span>
		<span class="color-success-800"></span>
		<span class="color-success-900"></span>
		<span class="color-fusion-50"></span>
		<span class="color-fusion-100"></span>
		<span class="color-fusion-200"></span>
		<span class="color-fusion-300"></span>
		<span class="color-fusion-400"></span>
		<span class="color-fusion-500"></span>
		<span class="color-fusion-600"></span>
		<span class="color-fusion-700"></span>
		<span class="color-fusion-800"></span>
		<span class="color-fusion-900"></span>
	</p>
	<!-- END Color profile -->
	<audio id="notification" class="sr-only"><source src="assets/media/sound/smallbox.mp3" type="audio/mp3"><source src="assets/media/sound/smallbox.ogg" type="audio/ogg">
	</audio>
	<script src="assets/js/vendors.bundle.js"></script>
	<script src="assets/js/app.bundle.js"></script>
	<script src="assets/js/formplugins/inputmask/inputmask.bundle.js"></script>
	<script src="assets/js/notifications/toastr/toastr.js"></script>  
	<script src="assets/js/notifications/sweetalert2/sweetalert2.bundle.js"></script>
	<!-- Page related scripts -->
	<script type="text/javascript">
		$(document).ready(function() {
			$('[name="npwp-mask"]').inputmask({mask: "99.999.999.9-999.999", gready: false});
		});

		$("#submit").on('click', function(event) {
			event.preventDefault();
			/* Act on the event */
			var usedForm = "#form";

			if ($(usedForm)[0].checkValidity() === false ) {
				$(usedForm).addClass('was-validated');
			} else {
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
					title: "Formulir Validasi Perusahaan Akan Dikirim?",
					text: "Anda Tidak Akan Dapat Merubah atau Menghapus Laporan Monitoring Umum Yang Sudah Divalidasi",
					showCancelButton: true,
					confirmButtonText: "Ya, Validasi Laporan!",
					cancelButtonText: "Tidak, Batalkan!",
					reverseButtons: true
				})
				.then(function(result)
				{
					if (result.value)
					{   
						var data = $(usedForm).serializeArray();
						data[data.length] = {name: 'npwp', value: $('[name="npwp-mask"]').inputmask('unmaskedvalue')};
						data[data.length] = {name: 'skep', value: $('[name="skep-mask"]').inputmask('unmaskedvalue')};
						// console.log(data);
						$.ajax({
							url: 'Profile/Post',
							type: 'POST',
							dataType: 'JSON',
							data: data,
							success: function(d){
								play = document.getElementById('notification');
								if (d.status == 'success') {
									$('[name="SKOR-NPWP-MASK"]').val(d.data.NPWP);
									$('[name="SKOR_NAMA_PT"]').val(d.data.NAMA_PERUSAHAAN);
									$('[name="SKOR_NOMOR_SKEP"]').val(d.data.NOMOR_SKEP);
									$('[name="SKOR_TANGGAL_SKEP"]').val(d.data.TANGGAL_SKEP);
									$('[name="SKOR_JENIS_SKEP"]').val(d.data.KODE_SKEP);
									$("#SKOR_INHEREN").prepend(d.data.SKOR_INHEREN);
									$("#SKOR_OPERASIONAL").prepend(d.data.SKOR_KEGIATAN);
									$("#SKOR_REKAM_JEJAK").prepend(d.data.SKOR_REKAM_JEJAK);
									$("#SKOR_AKHIR").prepend(d.data.SKOR_AKHIR);
									switch (d.data.LAYANAN_AKHIR) {
										case 'H':
										$('#SKOR').addClass('bg-success-500');
										$("#greet").html('SELAMAT PERUSAHAAN ANDA MENDAPATKAN PENILAIAN KATEGORI LAYANAN <b class="text-success">HIJAU</b>');
										$("#greet_content").html('PERTAHANKAN TINGKAT KEPATUHAN DALAM SETIAP KEGIATAN YANG BERKAITAN DENGAN KEPABEANAN UNTUK PENILIAN KATEGORI LAYANAN PERIODE BERIKUTNYA');
										break;

										case 'K':
										$('#SKOR').addClass('bg-warning-500');
										$("#greet").html('PERUSAHAAN ANDA MENDAPATKAN PENILAIAN KATEGORI LAYANAN <b class="text-warning">KUNING</b>');
										$("#greet_content").html('TERDAPAT 4 KOMPONEN PENILIAN KATEGORI LAYANAN YANG DAPAT AND TINGKATKAN <br> <br> <ol><li>KUALITAS LAPORAN DAN KETEPATAN PENYAMPAIAN LAPORAN DAMPAK EKONOMI</li><li>INTEGRITAS DAN RESPONSIBILITY PENANGGUNG JAWAB TEMPAT PENIMBUNAN BERIKAT</li><li>KEIKUTSERTAAN DALAM ASOSIASI TEMPAT PENIMBUNAN BERIKAT</li><li>PENDAYAGUNAAN CCTV, IT INVENTORY DAN KUALITAS SISTEM PENGENDALIAN INTERNAL SERTA KELAYAKAN FISIK GEDUNG TEMPAT PENIMBUNAN BERIKAT</li></ol> <br> HARAP MENGHUBUNGI KEPALA HANGGAR / KEPALA SEKSI YANG MEMBAWAHI PERUSAHAAN ANDA UNTUK MENDAPATAKN BIMBINGAN PERBAIKAN NILAI KATEGORI LAYANAN');
										break;

										default:
										$('#SKOR').addClass('bg-danger-500');
										$("#greet").html('PERUSAHAAN ANDA MENDAPATKAN PENILAIAN KATEGORI LAYANAN <b class="text-danger">MERAH</b>');
										$("#greet_content").html('TERDAPAT 4 KOMPONEN PENILIAN KATEGORI LAYANAN YANG DAPAT AND TINGKATKAN <br> <br><ol><li>KUALITAS LAPORAN DAN KETEPATAN PENYAMPAIAN LAPORAN DAMPAK EKONOMI</li><li>INTEGRITAS DAN RESPONSIBILITY PENANGGUNG JAWAB TEMPAT PENIMBUNAN BERIKAT</li><li>KEIKUTSERTAAN DALAM ASOSIASI TEMPAT PENIMBUNAN BERIKAT</li><li>PENDAYAGUNAAN CCTV, IT INVENTORY DAN KUALITAS SISTEM PENGENDALIAN INTERNAL SERTA KELAYAKAN FISIK GEDUNG TEMPAT PENIMBUNAN BERIKAT</li></ol> <br> HARAP MENGHUBUNGI KEPALA HANGGAR / KEPALA SEKSI YANG MEMBAWAHI PERUSAHAAN ANDA UNTUK MENDAPATAKN BIMBINGAN PERBAIKAN NILAI KATEGORI LAYANAN');
										break;
									}
									$(".modal-title").text('SKORING PROFIL PERIODE TAHUN '+d.data.TAHUN+" SEMESTER "+d.data.SEMESTER);
									$("#modal").modal('show');
								} else {
									swalWithBootstrapButtons.fire(
										"Telah Terjadi Kesalahan!",
										d.data,
										"error"
										);
								}
								play.play();
								delete play;
							}
						})
}
else if (
						 // Read more about handling dismissals
						 result.dismiss === Swal.DismissReason.cancel
						 )
{
	swalWithBootstrapButtons.fire(
		"Proses Validasi Formulir Dibatalkan",
		"Data Lembar Pengumpulan dan Penilaian",
		"error"
		);
}
}); 
}
});

$("#modal").on('hide.bs.modal', function(event) {
	event.preventDefault();
	/* Act on the event */
	location.reload();
});

$('[name="PENERBIT_SKEP"]').on('change', function(event) {
	if (event.target.value == "WBC") {
		$('[name="skep-mask"]').inputmask({mask: "KEP-9{1,5}/A{1,3}.9{1,2}/9999"});
	} else {
		$('[name="skep-mask"]').inputmask({mask: "KEP-9{1,5}/A{1,3}.9{1,2}/KPP.MP.99/9999"});
	}
});
</script>
</body>
</html>
