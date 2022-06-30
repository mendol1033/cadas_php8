<div class="accordion" id="js_demo_accordion-4">
	<div class="card">
		<div class="card-header">
			<a href="javascript:void(0);" class="card-title" data-toggle="collapse" data-target="#js_demo_accordion-4a" aria-expanded="true">
				<h2>
					<i class="fal fa-container-storage"></i>
					PENERIMAAN IMPOR BC 2.0
				</h2>
				<span class="ml-auto">
					<span class="collapsed-reveal">
						<i class="fal fa-minus-circle text-danger fs-xl"></i>
					</span>
					<span class="collapsed-hidden">
						<i class="fal fa-plus-circle text-success fs-xl"></i>
					</span>
				</span>
			</a>
		</div>
		<div id="js_demo_accordion-4a" class="collapse show" data-parent="#js_demo_accordion-4" style="">
			<div class="card-body">
				<div class="row">
					<div class="alert alert-warning" role="alert">
						<h3><strong id="alertData"></strong></h3>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 col-xl-2">
						<div class="p-3 bg-primary-500 rounded overflow-hidden position-relative text-white mb-g">
							<div class="">
								<h3 class="display-4 d-block l-h-n m-0 fw-500">
									<span id="importirAktif"></span>
									<small class="m-0 l-h-n">JUMLAH IMPORTIR AKTIF</small>
								</h3>
							</div>
							<i class="fal fa-user position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
						</div>
					</div>
					<div class="col-sm-6 col-xl-2">
						<div class="p-3 bg-primary-900 rounded overflow-hidden position-relative text-white mb-g">
							<div class="">
								<h3 class="display-4 d-block l-h-n m-0 fw-500">
									<span id="jumlahDokumen"></span>
									<small class="m-0 l-h-n">JUMLAH DOKUMEN BC 2.0</small>
								</h3>
							</div>
							<i class="fal fa-file-alt position-absolute pos-right pos-bottom opacity-15  mb-n1 mr-n4" style="font-size: 6rem;"></i>
						</div>
					</div>
					<div class="col-sm-6 col-xl-4">
						<div class="p-3 bg-success-700 rounded overflow-hidden position-relative text-white mb-g">
							<div class="">
								<h3 class="display-4 d-block l-h-n m-0 fw-500">
									<span id="penerimaan"></span>
									<small class="m-0 l-h-n">TOTAL PENERIMAAN BEA MASUK TAHUN <?php echo date('Y');?></small>
								</h3>
							</div>
							<i class="fal fa-dollar-sign position-absolute pos-right pos-bottom opacity-15 mb-n5 mr-n6" style="font-size: 8rem;"></i>
						</div>
					</div>
					<div class="col-sm-6 col-xl-4">
						<div class="p-3 bg-danger-400 rounded overflow-hidden position-relative text-white mb-g">
							<div class="">
								<h3 class="display-4 d-block l-h-n m-0 fw-500">
									<span id="sptnp"></span>
									<small class="m-0 l-h-n">TOTAL SPTNP TAHUN <?php echo date('Y')?></small>
								</h3>
							</div>
							<i class="fal fa-globe position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n4" style="font-size: 6rem;"></i>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div id="panel-1" class="panel">
							<div class="panel-hdr">
								<h2>Year On Year Penerimaan BC 2.0</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show">
								<div class="panel-content bg-subtlelight-fade">
									<div id="chartPenerimaan" class="w-100 mt-4" style="height: 500px">

									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div id="panel-2" class="panel">
							<div class="panel-hdr">
								<h2>
									Year On Year <span class="fw-300"><i>Teus dan Tonase</i></span>
								</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show" style="height: 500px">
								<div class="panel-content poisition-relative">
									<div id="chartTeusTonase" style="height:100%;"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div id="panel-3" class="panel">
							<div class="panel-hdr">
								<h2>
									Total Penerimaan <span class="fw-300"><i>Bea Masuk, Teus, dan Tonase BC 2.0</i></span>
								</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show" style="height: 600px;">
								<div class="panel-content poisition-relative">
									<div>
										<table id="tableTotal" class="table table-bordered table-striped table-hover" style="text-align: center; font-size: 15px;">
											<thead>
												<th>TAHUN</th>
												<th>PENERIMAAN BEA MASUK</th>
												<th>TEUS</th>
												<th>TONASE</th>
											</thead>
											<tbody></tbody>
										</table>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div id="piePenerimaan2020" style="height:100%;"></div>
										</div>
										<div class="col-lg-6">
											<div id="piePenerimaan2021" style="height:100%;"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div id="panel-4a" class="panel">
							<div class="panel-hdr">
								<h2>
									Data 10 Importir Bea Masuk Tertinggi <?php echo date('Y') - 1;?>
								</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show">
								<table id="bm10_y-1" class="table table-bordered table-striped table-hover" style="width:100%">
									<thead>
										<th>No</th>
										<th>Nama Importir</th>
										<th>Total Bea Masuk</th>
									</thead>
									<tbody></tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div id="panel-4b" class="panel">
							<div class="panel-hdr">
								<h2>
									Data 10 Importir Bea Masuk Tertinggi <?php echo date('Y');?>
								</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show">
								<table id="bm10_y" class="table table-bordered table-striped table-hover" style="width:100%">
									<thead>
										<th>No</th>
										<th>Nama Importir</th>
										<th>Total Bea Masuk</th>
									</thead>
									<tbody></tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div id="panel-5a" class="panel">
							<div class="panel-hdr">
								<h2>
									Data 10 Komoditi Bea Masuk Tertinggi
								</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show">
								<table id="bmKomoditi" class="table table-bordered table-striped table-hover" style="width:100%">
									<thead>
										<th>No</th>
										<th>Komoditi</th>
										<th><?php echo date('Y') - 1;?></th>
										<th><?php echo date('Y');?></th>
										<th>Persentase</th>
									</thead>
									<tbody></tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div id="panel-5b" class="panel">
							<div class="panel-hdr">
								<h2>
									Data 10 Komoditi Tonase Tertinggi
								</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show">
								<table id="tonaseKomoditi" class="table table-bordered table-striped table-hover" style="width: 100%;">
									<thead>
										<th>No</th>
										<th>Komoditi</th>
										<th><?php echo date('Y') - 1;?></th>
										<th><?php echo date('Y');?></th>
										<th>Persentase</th>
									</thead>
									<tbody></tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div id="panel-6a" class="panel">
							<div class="panel-hdr">
								<h2>Year On Year Jumlah STPNP Diterbitkan</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show" style="height: 500px">
								<div class="panel-content bg-subtlelight-fade">
									<div id="chartJumlahSptnp" class="w-100 mt-4">

									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div id="panel-b" class="panel">
							<div class="panel-hdr">
								<h2>
									Year On Year Nilai SPTNP Diterbitkan
								</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show" style="height: 500px">
								<div class="panel-content poisition-relative">
									<div id="chartNilaiSptnp" style="height:100%;"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<a href="javascript:void(0);" class="card-title collapsed" data-toggle="collapse" data-target="#js_demo_accordion-4b" aria-expanded="false">
				<h2>
					<i class="fal fa-industry-alt"></i>
					PENERIMAAN IMPOR BC 2.5
				</h2>
				<span class="ml-auto">
					<span class="collapsed-reveal">
						<i class="fal fa-minus-circle text-danger fs-xl"></i>
					</span>
					<span class="collapsed-hidden">
						<i class="fal fa-plus-circle text-success fs-xl"></i>
					</span>
				</span>
			</a>
		</div>
		<div id="js_demo_accordion-4b" class="collapse" data-parent="#js_demo_accordion-4">
			<div class="card-body">
				<div class="row">
					<div class="alert alert-warning" role="alert">
						<h3><strong id="alertData25"></strong></h3>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 col-xl-2">
						<div class="p-3 bg-primary-500 rounded overflow-hidden position-relative text-white mb-g">
							<div class="">
								<h3 class="display-4 d-block l-h-n m-0 fw-500">
									<span id="tpbAktif"></span>
									<small class="m-0 l-h-n">JUMLAH TPB AKTIF</small>
								</h3>
							</div>
							<i class="fal fa-user position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
						</div>
					</div>
					<div class="col-sm-6 col-xl-2">
						<div class="p-3 bg-primary-900 rounded overflow-hidden position-relative text-white mb-g">
							<div class="">
								<h3 class="display-4 d-block l-h-n m-0 fw-500">
									<span id="jumlahDokumen25"></span>
									<small class="m-0 l-h-n">JUMLAH DOKUMEN BC 2.5</small>
								</h3>
							</div>
							<i class="fal fa-file-alt position-absolute pos-right pos-bottom opacity-15  mb-n1 mr-n4" style="font-size: 6rem;"></i>
						</div>
					</div>
					<div class="col-sm-6 col-xl-4">
						<div class="p-3 bg-success-700 rounded overflow-hidden position-relative text-white mb-g">
							<div class="">
								<h3 class="display-4 d-block l-h-n m-0 fw-500">
									<span id="penerimaan25"></span>
									<small class="m-0 l-h-n">TOTAL PENERIMAAN BEA MASUK BC 2.5 TAHUN <?php echo date('Y');?></small>
								</h3>
							</div>
							<i class="fal fa-dollar-sign position-absolute pos-right pos-bottom opacity-15 mb-n5 mr-n6" style="font-size: 8rem;"></i>
						</div>
					</div>
					<div class="col-sm-6 col-xl-4">
						<div class="p-3 bg-danger-400 rounded overflow-hidden position-relative text-white mb-g">
							<div class="">
								<h3 class="display-4 d-block l-h-n m-0 fw-500">
									<span id="sptnp25"></span>
									<small class="m-0 l-h-n">TOTAL SPTNP TAHUN <?php echo date('Y')?></small>
								</h3>
							</div>
							<i class="fal fa-globe position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n4" style="font-size: 6rem;"></i>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div id="panel-1" class="panel">
							<div class="panel-hdr">
								<h2>Year On Year Penerimaan BC 2.5</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show">
								<div class="panel-content bg-subtlelight-fade">
									<div id="chartPenerimaan25" class="w-100 mt-4" style="height: 500px">

									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div id="panel-2" class="panel">
							<div class="panel-hdr">
								<h2>
									Year On Year <span class="fw-300"><i>Jumlah Dokumen dan Tonase</i></span>
								</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show" style="height: 500px">
								<div class="panel-content poisition-relative">
									<div id="chartTeusTonase25" style="height:100%;"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div id="panel-3" class="panel">
							<div class="panel-hdr">
								<h2>
									Total Penerimaan <span class="fw-300"><i>Bea Masuk, Dokumen, dan Tonase BC 2.0</i></span>
								</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show" style="height: 600px;">
								<div class="panel-content poisition-relative">
									<div>
										<table id="tableTotal25" class="table table-bordered table-striped table-hover" style="text-align: center; font-size: 15px;">
											<thead>
												<th>TAHUN</th>
												<th>PENERIMAAN BEA MASUK</th>
												<th>DOKUMEN</th>
												<th>TONASE</th>
											</thead>
											<tbody></tbody>
										</table>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div id="piePenerimaan25_2020" style="height:100%;"></div>
										</div>
										<div class="col-lg-6">
											<div id="piePenerimaan25_2021" style="height:100%;"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div id="panel-4a" class="panel">
							<div class="panel-hdr">
								<h2>
									Data 10 Importir Bea Masuk Tertinggi <?php echo date('Y') - 1;?>
								</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show">
								<table id="bm10_25_y1" class="table table-bordered table-striped table-hover" style="width:100%">
									<thead>
										<th>No</th>
										<th>Nama Importir</th>
										<th>Total Bea Masuk</th>
									</thead>
									<tbody></tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div id="panel-4b" class="panel">
							<div class="panel-hdr">
								<h2>
									Data 10 Importir Bea Masuk Tertinggi <?php echo date('Y');?>
								</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show">
								<table id="bm10_25_y" class="table table-bordered table-striped table-hover" style="width:100%">
									<thead>
										<th>No</th>
										<th>Nama Importir</th>
										<th>Total Bea Masuk</th>
									</thead>
									<tbody></tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div id="panel-5a" class="panel">
							<div class="panel-hdr">
								<h2>
									Data 10 Komoditi Bea Masuk Tertinggi
								</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show">
								<table id="bmKomoditi25" class="table table-bordered table-striped table-hover" style="width:100%">
									<thead>
										<th style="width: 5%;">No</th>
										<th>Komoditi</th>
										<th><?php echo date('Y') - 1;?></th>
										<th><?php echo date('Y');?></th>
										<th style="width: 10%;">Persentase</th>
									</thead>
									<tbody></tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div id="panel-5b" class="panel">
							<div class="panel-hdr">
								<h2>
									Data 10 Komoditi Tonase Tertinggi
								</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show">
								<table id="tonaseKomoditi25" class="table table-bordered table-striped table-hover" style="width: 100%;">
									<thead>
										<th style="width: 5%;">No</th>
										<th>Komoditi</th>
										<th><?php echo date('Y') - 1;?></th>
										<th><?php echo date('Y');?></th>
										<th style="width: 10%;">Persentase</th>
									</thead>
									<tbody></tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<a href="javascript:void(0);" class="card-title collapsed" data-toggle="collapse" data-target="#js_demo_accordion-4c" aria-expanded="false">
				<h2>
					<i class="fal fa-warehouse"></i>
					PENERIMAAN IMPOR BC 2.8
				</h2>
				<span class="ml-auto">
					<span class="collapsed-reveal">
						<i class="fal fa-minus-circle text-danger fs-xl"></i>
					</span>
					<span class="collapsed-hidden">
						<i class="fal fa-plus-circle text-success fs-xl"></i>
					</span>
				</span>
			</a>
		</div>
		<div id="js_demo_accordion-4c" class="collapse" data-parent="#js_demo_accordion-4">
			<div class="card-body">
				<div class="row">
					<div class="alert alert-warning" role="alert">
						<h3><strong id="alertData28"></strong></h3>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 col-xl-2">
						<div class="p-3 bg-primary-500 rounded overflow-hidden position-relative text-white mb-g">
							<div class="">
								<h3 class="display-4 d-block l-h-n m-0 fw-500">
									<span id="tpbAktif28"></span>
									<small class="m-0 l-h-n">JUMLAH TPB AKTIF</small>
								</h3>
							</div>
							<i class="fal fa-user position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
						</div>
					</div>
					<div class="col-sm-6 col-xl-2">
						<div class="p-3 bg-primary-900 rounded overflow-hidden position-relative text-white mb-g">
							<div class="">
								<h3 class="display-4 d-block l-h-n m-0 fw-500">
									<span id="jumlahDokumen28"></span>
									<small class="m-0 l-h-n">JUMLAH DOKUMEN BC 2.8</small>
								</h3>
							</div>
							<i class="fal fa-file-alt position-absolute pos-right pos-bottom opacity-15  mb-n1 mr-n4" style="font-size: 6rem;"></i>
						</div>
					</div>
					<div class="col-sm-6 col-xl-4">
						<div class="p-3 bg-success-700 rounded overflow-hidden position-relative text-white mb-g">
							<div class="">
								<h3 class="display-4 d-block l-h-n m-0 fw-500">
									<span id="penerimaan28"></span>
									<small class="m-0 l-h-n">TOTAL PENERIMAAN BEA MASUK BC 2.8 TAHUN <?php echo date('Y');?></small>
								</h3>
							</div>
							<i class="fal fa-dollar-sign position-absolute pos-right pos-bottom opacity-15 mb-n5 mr-n6" style="font-size: 8rem;"></i>
						</div>
					</div>
					<div class="col-sm-6 col-xl-4">
						<div class="p-3 bg-danger-400 rounded overflow-hidden position-relative text-white mb-g">
							<div class="">
								<h3 class="display-4 d-block l-h-n m-0 fw-500">
									<span id="sptnp28"></span>
									<small class="m-0 l-h-n">TOTAL SPTNP TAHUN <?php echo date('Y')?></small>
								</h3>
							</div>
							<i class="fal fa-globe position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n4" style="font-size: 6rem;"></i>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div id="panel-1" class="panel">
							<div class="panel-hdr">
								<h2>Year On Year Penerimaan BC 2.8</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show">
								<div class="panel-content bg-subtlelight-fade">
									<div id="chartPenerimaan28" class="w-100 mt-4" style="height: 500px">

									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div id="panel-2" class="panel">
							<div class="panel-hdr">
								<h2>
									Year On Year <span class="fw-300"><i>Jumlah Dokumen dan Tonase</i></span>
								</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show" style="height: 500px">
								<div class="panel-content poisition-relative">
									<div id="chartTeusTonase28" style="height:100%;"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div id="panel-3" class="panel">
							<div class="panel-hdr">
								<h2>
									Total Penerimaan <span class="fw-300"><i>Bea Masuk, Dokumen, dan Tonase BC 2.8</i></span>
								</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show" style="height: 600px;">
								<div class="panel-content poisition-relative">
									<div>
										<table id="tableTotal28" class="table table-bordered table-striped table-hover" style="text-align: center; font-size: 15px;">
											<thead>
												<th>TAHUN</th>
												<th>PENERIMAAN BEA MASUK</th>
												<th>DOKUMEN</th>
												<th>TONASE</th>
											</thead>
											<tbody></tbody>
										</table>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div id="piePenerimaan28_2020" style="height:100%;"></div>
										</div>
										<div class="col-lg-6">
											<div id="piePenerimaan28_2021" style="height:100%;"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div id="panel-4a" class="panel">
							<div class="panel-hdr">
								<h2>
									Data 10 Importir Bea Masuk Tertinggi <?php echo date('Y') - 1;?>
								</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show">
								<table id="bm10_28_y1" class="table table-bordered table-striped table-hover" style="width:100%">
									<thead>
										<th>No</th>
										<th>Nama Importir</th>
										<th>Total Bea Masuk</th>
									</thead>
									<tbody></tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div id="panel-4b" class="panel">
							<div class="panel-hdr">
								<h2>
									Data 10 Importir Bea Masuk Tertinggi <?php echo date('Y');?>
								</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show">
								<table id="bm10_28_y" class="table table-bordered table-striped table-hover" style="width:100%">
									<thead>
										<th>No</th>
										<th>Nama Importir</th>
										<th>Total Bea Masuk</th>
									</thead>
									<tbody></tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div id="panel-5a" class="panel">
							<div class="panel-hdr">
								<h2>
									Data 10 Komoditi Bea Masuk Tertinggi
								</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show">
								<table id="bmKomoditi28" class="table table-bordered table-striped table-hover" style="width:100%">
									<thead>
										<th>No</th>
										<th>Komoditi</th>
										<th><?php echo date('Y') - 1;?></th>
										<th><?php echo date('Y');?></th>
										<th>Persentase</th>
									</thead>
									<tbody></tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div id="panel-5b" class="panel">
							<div class="panel-hdr">
								<h2>
									Data 10 Komoditi Tonase Tertinggi
								</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show">
								<table id="tonaseKomoditi28" class="table table-bordered table-striped table-hover" style="width: 100%;">
									<thead>
										<th>No</th>
										<th>Komoditi</th>
										<th><?php echo date('Y') - 1;?></th>
										<th><?php echo date('Y');?></th>
										<th>Persentase</th>
									</thead>
									<tbody></tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	var date = new Date();
	$(document).ready(function() {
		$('.subheader').remove();
		getAllData();
		getPib1();
		getPib2();
		getPib3();
		getPib4();
		getBmKomoditi();
		getTonaseKomditi();
		getSptnp();

		getAllData25();

		getAllData28();
	});

	function renderChartPenerimaan(container,data){
		$(container).highcharts({
			chart:{
				type: 'line'
			},
			title: {
				text: ''
			},
			credits: {
				enabled: true,
				text: 'Data Supported By Tableu Server DIKC',
				href: 'https://analytics2.customs.go.id'
			},
			colors: ['#64E572', '#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#FF9655', '#FFF263', '#6AF9C4'],
			xAxis:{
				categories: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
				AxisTypeValue: 'logarithmic'
			},
			yAxis:{
				title:{
					text: 'TOTAL BEA MASUK'
				}
			},
			plotOptions: {
				series: {
					dataLabels: {
						enabled: true,
						formatter: function(){
							return 'Rp.' + parseFloat(this.y.toFixed(2)).toLocaleString("id-ID");
						}
					}
				}
			},
			series: data,
			exporting: {
				showTable: false,
				filename: "Year On Year Penerimaan BC 2.0"
			},
			tooltip: {
				enabled: false,
				formatter: function() {
					return 'Penerimaan Bulan '+ this.x + ' Tahun '+ this.point.series.name +'<br> <b>Rp. ' + this.y.toLocaleString("id-ID")+'</b>';
				}
			},
			responsive: {
				rules: [{
					condition: {
						maxWidth: 1880,
						maxHeight: 850
					},
					chartOptions: {
						legend: {
							align: 'center',
							verticalAlign: 'bottom',
							layout: 'horizontal'
						},
						yAxis: {
							labels: {
								align: 'left',
								x: 0,
								y: -5
							},
							title: {
								text: null
							}
						},
						subtitle: {
							text: null
						},
						credits: {
							enabled: false
						}
					}
				}]
			}
		});
	}

	function renderChart(container,data){
		$(container).highcharts({
			chart:{
				type: 'line'
			},
			title: {
				text: ''
			},
			credits: {
				enabled: true,
				text: 'Data Supported By Tableu Server DIKC',
				href: 'https://analytics2.customs.go.id'
			},
			colors: ['#64E572', '#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#FF9655', '#FFF263', '#6AF9C4'],
			xAxis:{
				categories: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
				AxisTypeValue: 'logarithmic'
			},
			yAxis:{
				title:{
					text: ''
				}
			},
			plotOptions: {
				series: {
					dataLabels: {
						enabled: true,
						formatter: function(){
							return parseFloat(this.y.toFixed(2)).toLocaleString("id-ID");
						}
					}
				}
			},
			series: data,
			exporting: {
				showTable: false,
				filename: "Year On Year Penerimaan BC 2.0"
			},
			tooltip: {
				enabled: false,
				formatter: function() {
					var fixed = this.y.toFixed(2);
					var float = parseFloat(fixed);
					return float.toLocaleString("id-ID");
				}
			}
		});
	}

	function renderPie(container, data, title){
		$(container).highcharts({
			chart: {
				type: 'pie'
			},
			credits: {
				enabled: true,
				text: 'Data Supported By Tableu Server DIKC',
				href: 'https://analytics2.customs.go.id'
			},
			title: {
				text: title,
				verticalAlign: 'bottom'
			},
			tooltip: {
				pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			},
			accessibility: {
				point: {
					valueSuffix: '%'
				}
			},
			plotOptions: {
				pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					dataLabels: {
						enabled: true,
						formatter: function(){
							return '<b>'+this.point.name+'</b>: '+ this.point.percentage.toLocaleString() + ' % <br> Rp. ' + this.point.y.toLocaleString();
						}
					}
				}
			},
			series: [{
				name: 'Penerimaan',
				data: data
			}]
		});
	}

	function getAllData(){
		$.ajax({
			url: 'Dokumen/DataImportasi',
			type: 'GET',
			dataType: 'JSON',
			data: {risk: 'all', tahun: 2},
			success: function(data){
				// Header
				$('#importirAktif').html(data['importirAktif'].toLocaleString());
				$('#jumlahDokumen').html(data['dokumenBerjalan'][0].toLocaleString());
				$('#penerimaan').html('Rp. '+data['penerimaanBerjalan'].toLocaleString());
				$('#sptnp').html('Rp. '+data['sptnpBerjalan'].toLocaleString());
				$('#alertData').html('DATA DOKUMEN BC 2.0 PADA APLIKASI INI BERSUMBER DARI SITE TABLEAU SERVER PER TANGGAL '+ data['dokumenBerjalan'][1]);
			}
		})  
	}

	function getPib1(){
		$.ajax({
			url: 'Dokumen/getPib1',
			type: 'GET',
			dataType: 'JSON',
			data: {risk: 'all', tahun: 2},
			success: function(data){
				// Chart Penerimaan
				renderChartPenerimaan('#chartPenerimaan',data['chartPenerimaanFixFix']);
			}
		})		
	}

	function getPib2(){
		$.ajax({
			url: 'Dokumen/getPib2',
			type: 'GET',
			dataType: 'JSON',
			data: {risk: 'all', tahun: 2},
			success: function(data){
				// Chart Teus
				renderChart('#chartTeusTonase',data['tonase']);
			}
		})
	}


	function getPib3(){
		$.ajax({
			url: 'Dokumen/getPib3',
			type: 'GET',
			dataType: 'JSON',
			data: {risk: 'all', tahun: 2},
			success: function(data){
				// Table BM Total
				$.each(data['total'], function(index, val) {
					$('#tableTotal > tbody').append('<tr><td><b>'+val.TAHUN+'</b></td><td><b>Rp. '+parseFloat(val.TOTAL_BM).toLocaleString('id-ID')+'</b></td><td><b>'+parseFloat(val.TEUS).toLocaleString('id-ID')+' TEUS</b></td><td><b>'+parseFloat(val.TONASE).toLocaleString('id-ID')+' TON</b></td></tr>');
				});
				// Chart Pie
				renderPie('#piePenerimaan2020',data['sebaranY1'], 'Sebaran Bea Masuk Tahun '+ (date.getFullYear()-1));
				renderPie('#piePenerimaan2021',data['sebaranY'], 'Sebaran Bea Masuk Tahun '+ date.getFullYear());
			}
		})		
	}

	function getPib4(){
		$.ajax({
			url: 'Dokumen/getPib4',
			type: 'GET',
			dataType: 'JSON',
			success: function(data){
				// Table Peringkat BM
				$.each(data['totalBMY'], function(index, val) {
					$("#bm10_y > tbody").append('<tr><td>'+val[0]+'</td><td>'+val[1]+'</td><td>'+val[2]+'</td></tr>');
				});
				$.each(data['totalBMY1'], function(index, val) {
					$("#bm10_y-1 > tbody").append('<tr><td>'+val[0]+'</td><td>'+val[1]+'</td><td>'+val[2]+'</td></tr>');
				});


				$("#bm10_y-1").DataTable({
					"bFilter"    : true,
					"columnDefs" : [
					{
						"targets"   : -1,
						"title"     : 'Total Bea Masuk',
						"render"    : function(data, type, full, meta){
							return "Rp. " + parseFloat(data).toLocaleString();
						}
					}]

				});

				$("#bm10_y").DataTable({
					"bFilter"    : true,
					"columnDefs" : [
					{
						"targets"   : -1,
						"title"     : 'Total Bea Masuk',
						"render"    : function(data, type, full, meta){
							return "Rp. " + parseFloat(data).toLocaleString();
						}
					}]
				});
			}
		})
	}

	function getBmKomoditi(){
		$.ajax({
			url: 'Dokumen/bmKomoditi',
			type: 'POST',
			dataType: 'JSON',
			data: {param1: 'value1'},
			success: function(d){
				$.each(d, function(index, val) {
					if (val[4] > 0 ) {
						var className = "bg-success-700";
					} else if (val[4] < 0) {
						var className = 'bg-danger-700';
					} else {
						var className = 'bg-warning-700';
					}
					$("#bmKomoditi > tbody").append('<tr><td>'+val[0]+'</td><td>'+val[1]+'</td><td>'+val[2]+'</td><td>'+val[3]+'</td><td class="'+className+'">'+val[4]+'</td></tr>');
				});
				$("#bmKomoditi").DataTable({
					"autoWidth"  : true,
					"bFilter"    : true,
					"columnDefs" : [
					{
						"targets"   : 0,
					},
					{
						"targets"   : 1,
					},
					{
						"targets"   : 2,
						"render"    : function(data, type, full, meta){
							return "Rp. " + parseFloat(data).toLocaleString();
						}
					},
					{
						"targets"   : 3,
						"render"    : function(data, type, full, meta){
							return "Rp. " + parseFloat(data).toLocaleString();
						}
					},
					{
						"targets"   : -1,
						"title"     : '%',
						"orderable" : false,
						"render"    : function(data, type, full, meta){
							var percentage = parseFloat(data)*100;

							if (percentage > 0 ) {
								var icon = "fas fa-arrow-up";
							} else if (percentage < 0) {
								var icon = "fas fa-arrow-down";
							} else {
								var icon = "fas fa-minus";
							}

							return '<i class="'+icon+'">&nbsp;</i>'+ percentage.toFixed(2).toLocaleString() + " %";
						}
					}]

				});
			}
		})        
	}

	function getTonaseKomditi(){
		$.ajax({
			url: 'Dokumen/tonaseKomoditi',
			type: 'POST',
			dataType: 'JSON',
			data: {param1: 'value1'},
			success: function(d){
				$.each(d, function(index, val) {
					if (val[4] > 0 ) {
						var className = "bg-success-700";
					} else if (val[4] < 0) {
						var className = 'bg-danger-700';
					} else {
						var className = 'bg-warning-700';
					}
					$("#tonaseKomoditi > tbody").append('<tr><td>'+val[0]+'</td><td>'+val[1]+'</td><td>'+val[2]+'</td><td>'+val[3]+'</td><td class="'+className+'">'+val[4]+'</td></tr>');
				});
				$("#tonaseKomoditi").DataTable({
					"autoWidth"  : true,
					"bFilter"    : true,
					"columnDefs" : [
					{
						"targets"   : 0,
					},
					{
						"targets"   : 1,
					},
					{
						"targets"   : 2,
						"render"    : function(data, type, full, meta){
							return parseFloat(data).toLocaleString();
						}
					},
					{
						"targets"   : 3,
						"render"    : function(data, type, full, meta){
							return parseFloat(data).toLocaleString();
						}
					},
					{
						"targets"   : -1,
						"title"     : '%',
						"orderable" : false,
						"render"    : function(data, type, full, meta){
							var percentage = parseFloat(data)*100;

							if (percentage > 0 ) {
								var icon = "fas fa-arrow-up";
							} else if (percentage < 0) {
								var icon = "fas fa-arrow-down";
							} else {
								var icon = "fas fa-minus";
							}

							return '<i class="'+icon+'">&nbsp;</i>'+ percentage.toFixed(2).toLocaleString() + " %";
						}
					}]

				});
			}
		})        
	}

	function getSptnp(){
		$.ajax({
			url: 'Dokumen/getSptnp',
			type: 'GET',
			dataType: 'JSON',
			data: {kode: 25},
			success: function(data){
				// renderChart('#chartNilaiSptnp',data['nilai']);
				renderChart('#chartJumlahSptnp',data['jumlah']);
				$('#chartNilaiSptnp').highcharts({
					chart:{
						type: 'line'
					},
					title: {
						text: ''
					},
					credits: {
						enabled: true,
						text: 'Data Supported By Tableu Server DIKC',
						href: 'https://analytics2.customs.go.id'
					},
					colors: ['#64E572', '#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#FF9655', '#FFF263', '#6AF9C4'],
					xAxis:{
						categories: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
						AxisTypeValue: 'logarithmic'
					},
					yAxis:{
						title:{
							text: ''
						}
					},
					plotOptions: {
						series: {
							dataLabels: {
								enabled: true,
								formatter: function(){
									return 'Rp.' + parseFloat(this.y.toFixed(2)).toLocaleString("id-ID");
								}
							}
						}
					},
					series: data['nilai'],
					exporting: {
						showTable: false,
						filename: "Year On Year Penerimaan BC 2.0"
					},
					tooltip: {
						enabled: false,
						formatter: function() {
							var fixed = this.y.toFixed(2);
							var float = parseFloat(fixed);
							return 'SPTNP Bulan '+ this.x + ' Tahun '+ this.point.series.name +'<br> <b>Rp. ' + this.y.toLocaleString("id-ID")+'</b>';
						}
					}
				});
			}
		})
	}

	function getAllData25(){
		$.ajax({
			url: 'Dokumen/DataTpb',
			type: 'GET',
			dataType: 'JSON',
			data: {kode: 25},
			success: function(data){
				$('#tpbAktif').html(data['importirAktif'].toLocaleString());
				$('#jumlahDokumen25').html(data['dokumenBerjalan']['JUMLAH_DOKUMEN'].toLocaleString());
				$('#penerimaan25').html('Rp. '+data['penerimaanBerjalan'].toLocaleString());
				$('#sptnp25').html('Rp. '+data['sptnpBerjalan'].toLocaleString());
				$('#alertData25').html('DATA DOKUMEN BC 2.5 PADA APLIKASI INI BERSUMBER DARI SITE TABLEAU SERVER PER TANGGAL '+ data['dokumenBerjalan']['LAST_DOK']);
				$.each(data['total'], function(index, val) {
					$('#tableTotal25 > tbody').append('<tr><td><b>'+val.TAHUN+'</b></td><td><b>Rp. '+parseFloat(val.BM).toLocaleString('id-ID')+'</b></td><td><b>'+parseFloat(val.DOKUMEN).toLocaleString('id-ID')+' DOKUMEN</b></td><td><b>'+parseFloat(val.TONASE).toLocaleString('id-ID')+' TON</b></td></tr>');
				});
				renderChartPenerimaan('#chartPenerimaan25',data['chartPenerimaanFixFix']);
				renderChart('#chartTeusTonase25',data['tonase']);
				renderPie('#piePenerimaan25_2020',data['sebaranY1'], 'Sebaran Bea Masuk Tahun '+ (date.getFullYear()-1));
				renderPie('#piePenerimaan25_2021',data['sebaranY'], 'Sebaran Bea Masuk Tahun '+ date.getFullYear());

				// Table Peringkat BM
				$.each(data['bmkb21'], function(index, val) {
					$("#bm10_25_y > tbody").append('<tr><td>'+(parseInt(index)+1)+'</td><td>'+val['NAMA_PENGUSAHA']+'</td><td>'+val['BM']+'</td></tr>');
				});
				$.each(data['bmkb20'], function(index, val) {
					$("#bm10_25_y1 > tbody").append('<tr><td>'+(parseInt(index)+1)+'</td><td>'+val['NAMA_PENGUSAHA']+'</td><td>'+val['BM']+'</td></tr>');
				});

				// Table Peringkat BM Komoditi
				$.each(data['bmKomoditi'], function(index, val) {
					if (val[4] > 0 ) {
						var className = "bg-success-700";
					} else if (val[4] < 0) {
						var className = 'bg-danger-700';
					} else {
						var className = 'bg-warning-700';
					}
					$("#bmKomoditi25 > tbody").append('<tr><td>'+val[0]+'</td><td>'+val[1]+'</td><td>'+val[2]+'</td><td>'+val[3]+'</td><td class="'+className+'">'+val[4]+'</td></tr>');
				});

				// Table Peringkat Tonase Komoditi
				$.each(data['tonaseKomoditi'], function(index, val) {
					if (val[4] > 0 ) {
						var className = "bg-success-700";
					} else if (val[4] < 0) {
						var className = 'bg-danger-700';
					} else {
						var className = 'bg-warning-700';
					}
					$("#tonaseKomoditi25 > tbody").append('<tr><td>'+val[0]+'</td><td>'+val[1]+'</td><td>'+val[2]+'</td><td>'+val[3]+'</td><td class="'+className+'">'+val[4]+'</td></tr>');
				});


				$("#bm10_25_y1").DataTable({
					"bFilter"    : true,
					"columnDefs" : [
					{
						"targets"   : -1,
						"title"     : 'Total Bea Masuk',
						"render"    : function(data, type, full, meta){
							return "Rp. " + parseFloat(data).toLocaleString();
						}
					}]

				});

				$("#bm10_25_y").DataTable({
					"bFilter"    : true,
					"columnDefs" : [
					{
						"targets"   : -1,
						"title"     : 'Total Bea Masuk',
						"render"    : function(data, type, full, meta){
							return "Rp. " + parseFloat(data).toLocaleString();
						}
					}]
				});

				$("#bmKomoditi25").DataTable({
					"autoWidth"  : true,
					"bFilter"    : true,
					"columnDefs" : [
					{
						"targets"   : 0,
						"width"		: "5%"
					},
					{
						"targets"   : 1,
					},
					{
						"targets"   : 2,
						"render"    : function(data, type, full, meta){
							return parseFloat(data).toLocaleString();
						}
					},
					{
						"targets"   : 3,
						"render"    : function(data, type, full, meta){
							return parseFloat(data).toLocaleString();
						}
					},
					{
						"targets"   : -1,
						"width"		: "15%",
						"title"     : '%',
						"orderable" : false,
						"render"    : function(data, type, full, meta){
							var percentage = parseFloat(data)*100;

							if (percentage > 0 ) {
								var icon = "fas fa-arrow-up";
							} else if (percentage < 0) {
								var icon = "fas fa-arrow-down";
							} else {
								var icon = "fas fa-minus";
							}

							return '<i class="'+icon+'">&nbsp;</i>'+ percentage.toFixed(2).toLocaleString() + " %";
						}
					}]

				});

				$("#tonaseKomoditi25").DataTable({
					"autoWidth"  : true,
					"bFilter"    : true,
					"columnDefs" : [
					{
						"targets"   : 0,
						"width"		: "5%"
					},
					{
						"targets"   : 1,
					},
					{
						"targets"   : 2,
						"render"    : function(data, type, full, meta){
							return parseFloat(data).toLocaleString();
						}
					},
					{
						"targets"   : 3,
						"render"    : function(data, type, full, meta){
							return parseFloat(data).toLocaleString();
						}
					},
					{
						"targets"   : -1,
						"title"     : '%',
						"orderable" : false,
						"width"		: "15%",
						"render"    : function(data, type, full, meta){
							var percentage = parseFloat(data)*100;

							if (percentage > 0 ) {
								var icon = "fas fa-arrow-up";
							} else if (percentage < 0) {
								var icon = "fas fa-arrow-down";
							} else {
								var icon = "fas fa-minus";
							}

							return '<i class="'+icon+'">&nbsp;</i>'+ percentage.toFixed(2).toLocaleString() + " %";
						}
					}]

				});
			}
		})  
	}

	function getAllData28(){
		$.ajax({
			url: 'Dokumen/DataTpb',
			type: 'GET',
			dataType: 'JSON',
			data: {kode: 28},
			success: function(data){
				$('#tpbAktif28').html(data['importirAktif'].toLocaleString());
				$('#jumlahDokumen28').html(data['dokumenBerjalan']['JUMLAH_DOKUMEN'].toLocaleString());
				$('#penerimaan28').html('Rp. '+data['penerimaanBerjalan'].toLocaleString());
				$('#sptnp28').html('Rp. '+data['sptnpBerjalan'].toLocaleString());
				$('#alertData28').html('DATA DOKUMEN BC 2.8 PADA APLIKASI INI BERSUMBER DARI SITE TABLEAU SERVER PER TANGGAL '+ data['dokumenBerjalan']['LAST_DOK']);
				$.each(data['total'], function(index, val) {
					$('#tableTotal28 > tbody').append('<tr><td><b>'+val.TAHUN+'</b></td><td><b>Rp. '+parseFloat(val.BM).toLocaleString('id-ID')+'</b></td><td><b>'+parseFloat(val.DOKUMEN).toLocaleString('id-ID')+' DOKUMEN</b></td><td><b>'+parseFloat(val.TONASE).toLocaleString('id-ID')+' TON</b></td></tr>');
				});
				renderChartPenerimaan('#chartPenerimaan28',data['chartPenerimaanFixFix']);
				renderChart('#chartTeusTonase28',data['tonase']);
				renderPie('#piePenerimaan28_2020',data['sebaranY1'], 'Sebaran Bea Masuk Tahun '+ (date.getFullYear()-1));
				renderPie('#piePenerimaan28_2021',data['sebaranY'], 'Sebaran Bea Masuk Tahun '+ date.getFullYear());

				// Table Peringkat BM
				$.each(data['bmkb21'], function(index, val) {
					$("#bm10_28_y > tbody").append('<tr><td>'+(parseInt(index)+1)+'</td><td>'+val['NAMA_PENGUSAHA']+'</td><td>'+val['BM']+'</td></tr>');
				});
				$.each(data['bmkb20'], function(index, val) {
					$("#bm10_28_y1 > tbody").append('<tr><td>'+(parseInt(index)+1)+'</td><td>'+val['NAMA_PENGUSAHA']+'</td><td>'+val['BM']+'</td></tr>');
				});

				// Table Peringkat BM Komoditi
				$.each(data['bmKomoditi'], function(index, val) {
					if (val[4] > 0 ) {
						var className = "bg-success-700";
					} else if (val[4] < 0) {
						var className = 'bg-danger-700';
					} else {
						var className = 'bg-warning-700';
					}
					$("#bmKomoditi28 > tbody").append('<tr><td>'+val[0]+'</td><td>'+val[1]+'</td><td>'+val[2]+'</td><td>'+val[3]+'</td><td class="'+className+'">'+val[4]+'</td></tr>');
				});

				// Table Peringkat Tonase Komoditi
				$.each(data['tonaseKomoditi'], function(index, val) {
					if (val[4] > 0 ) {
						var className = "bg-success-700";
					} else if (val[4] < 0) {
						var className = 'bg-danger-700';
					} else {
						var className = 'bg-warning-700';
					}
					$("#tonaseKomoditi28 > tbody").append('<tr><td>'+val[0]+'</td><td>'+val[1]+'</td><td>'+val[2]+'</td><td>'+val[3]+'</td><td class="'+className+'">'+val[4]+'</td></tr>');
				});


				$("#bm10_28_y1").DataTable({
					"bFilter"    : true,
					"columnDefs" : [
					{
						"targets"   : -1,
						"title"     : 'Total Bea Masuk',
						"render"    : function(data, type, full, meta){
							return "Rp. " + parseFloat(data).toLocaleString();
						}
					}]

				});

				$("#bm10_28_y").DataTable({
					"bFilter"    : true,
					"columnDefs" : [
					{
						"targets"   : -1,
						"title"     : 'Total Bea Masuk',
						"render"    : function(data, type, full, meta){
							return "Rp. " + parseFloat(data).toLocaleString();
						}
					}]
				});

				$("#bmKomoditi28").DataTable({
					"autoWidth"  : true,
					"bFilter"    : true,
					"columnDefs" : [
					{
						"targets"   : 0,
						"width"		: "5%"
					},
					{
						"targets"   : 1,
					},
					{
						"targets"   : 2,
						"render"    : function(data, type, full, meta){
							return parseFloat(data).toLocaleString();
						}
					},
					{
						"targets"   : 3,
						"render"    : function(data, type, full, meta){
							return parseFloat(data).toLocaleString();
						}
					},
					{
						"targets"   : -1,
						"width"		: "15%",
						"title"     : '%',
						"orderable" : false,
						"render"    : function(data, type, full, meta){
							var percentage = parseFloat(data)*100;

							if (percentage > 0 ) {
								var icon = "fas fa-arrow-up";
							} else if (percentage < 0) {
								var icon = "fas fa-arrow-down";
							} else {
								var icon = "fas fa-minus";
							}

							return '<i class="'+icon+'">&nbsp;</i>'+ percentage.toFixed(2).toLocaleString() + " %";
						}
					}]

				});

				$("#tonaseKomoditi28").DataTable({
					"autoWidth"  : true,
					"bFilter"    : true,
					"columnDefs" : [
					{
						"targets"   : 0,
						"width"		: "5%"
					},
					{
						"targets"   : 1,
					},
					{
						"targets"   : 2,
						"render"    : function(data, type, full, meta){
							return parseFloat(data).toLocaleString();
						}
					},
					{
						"targets"   : 3,
						"render"    : function(data, type, full, meta){
							return parseFloat(data).toLocaleString();
						}
					},
					{
						"targets"   : -1,
						"title"     : '%',
						"orderable" : false,
						"width"		: "15%",
						"render"    : function(data, type, full, meta){
							var percentage = parseFloat(data)*100;

							if (percentage > 0 ) {
								var icon = "fas fa-arrow-up";
							} else if (percentage < 0) {
								var icon = "fas fa-arrow-down";
							} else {
								var icon = "fas fa-minus";
							}

							return '<i class="'+icon+'">&nbsp;</i>'+ percentage.toFixed(2).toLocaleString() + " %";
						}
					}]

				});
			}
		})  
	}


</script>