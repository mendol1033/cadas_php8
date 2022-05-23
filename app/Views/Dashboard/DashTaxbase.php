<div class="accordion" id="js_demo_accordion-4">
	<div class="card">
		<div class="card-header">
			<a href="javascript:void(0);" class="card-title" data-toggle="collapse" data-target="#js_demo_accordion-4a" aria-expanded="true">
				<h2>
					<i class="fal fa-container-storage"></i>
					DASHBOARD EVALUASI IMPORTIR BERISKO TINGGI KPPBC TMP CIKARANG
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
									<small class="m-0 l-h-n">JUMLAH IBT AKTIF</small>
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
									<small class="m-0 l-h-n">JUMLAH DOKUMEN BC 2.0 IBT</small>
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
									<small class="m-0 l-h-n">TOTAL PENERIMAAN BEA MASUK IBT TAHUN <?php echo date('Y');?></small>
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
									<small class="m-0 l-h-n">TOTAL SPTNP IBT TAHUN <?php echo date('Y')?></small>
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
								<h2>Year On Year Total TEUs Seluruh Importasi</h2>
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
									Year On Year <span class="fw-300"><i>Teus Importasi oleh IBT</i></span>
								</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show">
								<div class="panel-content poisition-relative">
									<div id="chartTeusTonase" style="height:100%;"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div id="panel-2" class="panel">
							<div class="panel-hdr">
								<h2>
									Perbandingan Jumlah TEUs<span class="fw-300"><i>Importasi oleh Non-IBT dan IBT</i></span>
								</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show">
								<div class="panel-content poisition-relative">
									<div id="chartPerbandinganTeus" style="height:100%;"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div id="panel-2" class="panel">
							<div class="panel-hdr">
								<h2>
									Rata-Rata Taxbase dan Bayar Per TEUS<span class="fw-300"><i>Importasi oleh Non-IBT dan IBT</i></span>
								</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show">
								<div class="panel-content poisition-relative">
									<div id="chartTaxbase" style="height:100%;"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div id="panel-3" class="panel">
							<div class="panel-hdr">
								<h2>
									Year On Year <span class="fw-300"><i>Taxbase Seluruh Importasi</i></span>
								</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show">
								<div class="panel-content poisition-relative">
									<div class="row">
										<div class="col-lg-6">
											<div id="chartTotalTaxbase" style="height:100%;"></div>
										</div>
										<div class="col-lg-6">
											<div id="chartAvgTaxbase" style="height:100%;"></div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-3"></div>
										<div class="col-lg-6">
											<table id="tableTotal" class="table table-bordered table-striped table-hover" style="text-align: center; font-size: 15px;">
												<thead>
													<th></th>
													<th><?php echo date('Y') -1 ;?></th>
													<th><?php echo date('Y');?></th>
													<th>Persentase</th>
												</thead>
												<tbody></tbody>
											</table>
										</div>
										<div class="col-lg-3"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3">

					</div>
					<div class="col-lg-6">
						<div id="panel-4b" class="panel">
							<div class="panel-hdr">
								<h2>
									Year On Year <span class="fw-300"><i>TEUs, BM, PERSENTASE FTA, NILAI PABEAN @KPPBC TMP Cikarang</i></span>
								</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show">
								<table id="tableKompilasi" class="table table-bordered table-striped table-hover" style="text-align: center; font-size: 15px;">
									<thead>
										<th id="tableKompilasiTh1"></th>
										<th id="tableKompilasiTh2"></th>
										<th id="tableKompilasiTh3"></th>
										<th id="tableKompilasiTh4">Persentase</th>
									</thead>
									<tbody></tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-lg-3">

					</div>
					<div class="col-lg-12">
						<div id="panel-5a" class="panel">
							<div class="panel-hdr">
								<h2>
									Progress 2018 - <?php echo date('Y');?><span class="fw-300"><i>Penggunaan FTA Seluruh Importasi (Per Dokumen)</i></span>
								</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show">
								<div class="panel-content poisition-relative">
									<div id="chartFta" style="height:100%;"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div id="panel-5a" class="panel">
							<div class="panel-hdr">
								<h2>
									Progress 2018 - <?php echo date('Y');?><span class="fw-300"><i>Penggunaan FTA Oleh IBT (Per Dokumen)</i></span>
								</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show">
								<div class="panel-content poisition-relative">
									<div id="chartFtaIbt" style="height:100%;"></div>
								</div>
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
					<div class="col-lg-12">
						<div id="panel-b" class="panel">
							<div class="panel-hdr">
								<h2 id="titlePenjaluran">
									
								</h2>
								<div class="panel-toolbar">
									<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
									<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
									<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
								</div>
							</div>
							<div class="panel-container show">
								<div class="panel-content poisition-relative">
									<div class="row">
										<div id="piePenjaluranAll" style="width:33.33%;"></div>
										<div id="piePenjaluranLow" style="width:33.33%;"></div>
										<div id="piePenjaluranIbt" style="width:33.33%;"></div>
									</div>
								</div>
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
		getPerbandingaTeus();
		getTaxbase();
		getTotalTaxbase();
		getPerbandingan();
		getChartFta('all', '#chartFta', 0);
		getChartFta('ibt', '#chartFtaIbt', 0);
		getPenjaluran();
	});

	function renderChartTeus(container,data){
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
					text: 'TEUS',
				},
				labels: {
					formatter: function(){
						return this.value.toLocaleString('id-ID');
					}
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

	function renderPerbandinganTeus(container,data, categories, chartType){
		$(container).highcharts({
			chart:{
				type: chartType
			},
			title: {
				text: ''
			},
			credits: {
				enabled: true,
				text: 'Data Supported By Tableu Server DIKC',
				href: 'https://analytics2.customs.go.id'
			},
			xAxis:{
				categories: categories,
				AxisTypeValue: 'logarithmic'
			},
			yAxis:{
				title:{
					text: 'TEUS'
				},
				labels: {
					formatter: function(){
						return this.value.toLocaleString('id-ID');
					}
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

	function renderChartFta(container,data, categories, chartType){
		$(container).highcharts({
			chart:{
				type: chartType
			},
			title: {
				text: ''
			},
			credits: {
				enabled: true,
				text: 'Data Supported By Tableu Server DIKC',
				href: 'https://analytics2.customs.go.id'
			},
			xAxis:{
				categories: categories,
				AxisTypeValue: 'logarithmic'
			},
			yAxis:{
				title:{
					text: 'TEUS'
				},
				labels: {
					formatter: function(){
						return this.value.toLocaleString('id-ID');
					}
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

	function renderTaxbase(container,data, categories, chartType){
		$(container).highcharts({
			chart:{
				type: chartType,
				events: {
					load: function(){
						this.series.forEach( function(series) {
							series.points[series.points.length-1].update({
								dataLabels: {
									enabled: true
								}
							});
						});
					}
				}
			},
			title: {
				text: ''
			},
			credits: {
				enabled: true,
				text: 'Data Supported By Tableu Server DIKC',
				href: 'https://analytics2.customs.go.id'
			},
			xAxis:{
				categories: categories,
				AxisTypeValue: 'logarithmic'
			},
			yAxis:{
				title:{
					text: 'TOTAL BEA MASUK'
				},
				labels: {
					formatter: function(){
						var l = this.value / 1000000
						return l.toLocaleString('id-ID') + ' Juta';
					}
				}
			},
			plotOptions: {
				series: {
					dataLabels: {
						enabled: false,
						formatter: function(){
							var xx = parseFloat(this.y)/1000000
							return parseFloat(xx.toFixed(2)).toLocaleString("id-ID") + " Juta";
						}
					}
				}
			},
			tooltip: {
				formatter: function(){
					return this.series.name +": <b> Rp. "+parseFloat(this.y.toFixed(2)).toLocaleString("id-ID")+'</b>';
				}
			},
			series: data,
			exporting: {
				showTable: false,
				filename: "Year On Year Penerimaan BC 2.0"
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

	function renderTotalTaxbase(container,data, categories, chartType, chartTitle, yAxis, pembagi, satuan){
		$(container).highcharts({
			chart:{
				type: chartType
			},
			title: {
				text: chartTitle
			},
			credits: {
				enabled: true,
				text: 'Data Supported By Tableu Server DIKC',
				href: 'https://analytics2.customs.go.id'
			},
			xAxis:{
				categories: categories,
				AxisTypeValue: 'logarithmic'
			},
			yAxis:{
				title:{
					text: yAxis
				},
				labels: {
					formatter: function(){
						var l = this.value / pembagi
						return l.toLocaleString('id-ID') + ' ' + satuan;
					}
				}
			},
			plotOptions: {
				series: {
					dataLabels: {
						enabled: true,
						formatter: function(){
							var xx = parseFloat(this.y)/pembagi
							return parseFloat(xx.toFixed(2)).toLocaleString("id-ID") + " "+satuan;
						}
					}
				}
			},
			tooltip: {
				formatter: function(){
					return this.series.name +": <b> Rp. "+parseFloat(this.y.toFixed(2)).toLocaleString("id-ID")+'</b>';
				}
			},
			series: data,
			exporting: {
				showTable: false,
				filename: "Year On Year Penerimaan BC 2.0"
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
			colors: ['#1eb510', '#e3eb42', '#eb4242'],
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
							return '<b>'+this.point.name+'</b>: '+ this.point.percentage.toFixed(2) + ' % <br>' + this.point.y.toLocaleString()+' Dokumen';
						}
					}
				}
			},
			series: [{
				name: 'Jumlah Dokumen',
				data: data
			}]
		});
	}

	function getAllData(){
		$.ajax({
			url: 'Dokumen/DataImportasi',
			type: 'GET',
			dataType: 'JSON',
			data: {risk : "ibt"},
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
			data: {risk : "all", tahun: 4},
			success: function(data){
				// Chart Penerimaan
				renderChartTeus('#chartPenerimaan',data['chartPenerimaanFixFix']);
			}
		})		
	}

	function getPib2(){
		$.ajax({
			url: 'Dokumen/getPib1',
			type: 'GET',
			dataType: 'JSON',
			data: {risk: "ibt", tahun : 4},
			success: function(data){
				// Chart Teus
				renderChartTeus('#chartTeusTonase',data['chartPenerimaanFixFix']);
			}
		})
	}

	function getPerbandingaTeus(){
		$.ajax({
			url: 'Dokumen/getPerbandingaTeus',
			type: 'GET',
			dataType: 'JSON',
			data: {risk: 'all', tahun: 4},
			success: function(data){
				// Chart Perbandingan Teus
				renderPerbandinganTeus('#chartPerbandinganTeus', data.series, data.label, 'column');

			}
		})
		
	}

	function getTaxbase(){
		$.ajax({
			url: 'Dokumen/getRataTaxbaseTeus',
			type: 'GET',
			dataType: 'JSON',
			data: {tahun: '4'},
			success: function(data){
				renderTaxbase('#chartTaxbase', data.series, data.label, 'line');
			}
		})
		
	}

	function getTotalTaxbase(){
		$.ajax({
			url: 'Dokumen/getTotalTaxbase',
			type: 'GET',
			dataType: 'JSON',
			data: {tahun: 2, risk: 'all'},
			success:function(data){
				var year = new Date().getFullYear();
				var categories = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
				renderTotalTaxbase('#chartTotalTaxbase', data['total'], categories, 'line', 'TOTAL TAXBASE', 'TAXBASE', 1000000000, 'M');
				renderTotalTaxbase('#chartAvgTaxbase', data['avg'], categories, 'line', 'RATA-RATA TAXBASE', 'TAXBASE', 1000000, 'Juta');

				$.each(data['val'], function(index, val) {
					if (Object.keys(val).length === 2) {
						var persen = (parseFloat(val[year])/parseFloat(val[year-1])-1)*100;
						var valY1 = parseFloat(val[year-1]).toFixed(2);
						var valY = parseFloat(val[year]).toFixed(2)
						$('#tableTotal > tbody').append('<tr><td><b>Avg of '+index+'</b></td><td><b>Rp. '+parseFloat(valY1).toLocaleString('id-ID')+'</b></td><td><b>Rp. '+parseFloat(valY).toLocaleString('id-ID')+'</b></td><td><b>'+persen.toFixed(2)+' %</b></td></tr>');
					} else {
						var key = Object.keys(val);
						var valY1 = parseFloat(val[year-1]).toFixed(2);
						var valY = parseFloat(val[year]).toFixed(2)
						if (parseInt(key[0]) === year ) {
							$('#tableTotal > tbody').append('<tr><td><b>Avg of '+index+'</b></td><td><b>Rp. '+'-'+'</b></td><td><b>Rp. '+parseFloat(valY).toLocaleString('id-ID')+'</b></td><td><b>'+'-'+' %</b></td></tr>');
						} else {
							$('#tableTotal > tbody').append('<tr><td><b>Avg of '+index+'</b></td><td><b>Rp. '+parseFloat(valY1).toLocaleString('id-ID')+'</b></td><td><b>Rp. '+'-'+'</b></td><td><b>'+'-'+' %</b></td></tr>');
						}
					}
				});
			}
		})
	}

	function getPerbandingan(){
		$.ajax({
			url: 'Dokumen/getPerbandingan',
			type: 'GET',
			dataType: 'JSON',
			data: {tahun: 2, risk: 'all'},
			success: function(data){
				var year = new Date().getFullYear();
				$('#tableKompilasiTh1, #tableKompilasiTh2, #tableKompilasiTh3').empty();
				$('#tableKompilasiTh1').append('');
				$('#tableKompilasiTh2').append('<b>'+(year-1)+'</b><br> January - ' + data.bulan.NAMA_BULAN);
				$('#tableKompilasiTh3').append('<b>'+(year)+'</b><br> January - '+data.bulan.NAMA_BULAN);

				$('#tableKompilasi > tbody').append('<tr><td>TEUS</td><td>'+data.data.teus[year-1].toLocaleString('id-ID')+'</td><td>'+data.data.teus[year].toLocaleString('id-ID')+'</td><td>'+data.data.teus['PERSENTASE'].toFixed(2)+' %</td></tr>');
				$('#tableKompilasi > tbody').append('<tr><td>BM</td><td>Rp. '+data.data.bm[year-1].toLocaleString('id-ID')+'</td><td>Rp. '+data.data.bm[year].toLocaleString('id-ID')+'</td><td>'+data.data.bm['PERSENTASE'].toFixed(2)+' %</td></tr>');
				$('#tableKompilasi > tbody').append('<tr><td>PERSENTASE FTA</td><td>'+data.data.fta[year-1].toLocaleString('id-ID')+' %</td><td>'+data.data.fta[year].toLocaleString('id-ID')+' %</td><td>'+data.data.fta['PERSENTASE'].toFixed(2)+' %</td></tr>');
				$('#tableKompilasi > tbody').append('<tr><td>TAXBASE</td><td>Rp. '+data.data.taxbase[year-1].toLocaleString('id-ID')+'</td><td>Rp. '+data.data.taxbase[year].toLocaleString('id-ID')+'</td><td>'+data.data.taxbase['PERSENTASE'].toFixed(2)+' %</td></tr>');
				$('#tableKompilasi > tbody').append('<tr><td>AVG TAXBASE</td><td>Rp. '+data.data.avgTaxbase[year-1].toLocaleString('id-ID')+'</td><td>Rp. '+data.data.avgTaxbase[year].toLocaleString('id-ID')+'</td><td>'+data.data.avgTaxbase['PERSENTASE'].toFixed(2)+' %</td></tr>');
				$('#tableKompilasi > tbody').append('<tr><td>AVG TARIF BM</td><td>'+data.data.avgTarif[year-1].toLocaleString('id-ID')+' %</td><td>'+data.data.avgTarif[year].toLocaleString('id-ID')+' %</td><td>'+data.data.avgTarif['PERSENTASE'].toFixed(2)+' %</td></tr>');
			}
		})
	}

	function getChartFta(risk, container, tahun){
		$.ajax({
			url: 'Dokumen/getChartFta',
			type: 'GET',
			dataType: 'JSON',
			data: {tahun: tahun, risk: risk},
			success: function(d){
				renderChartFta(container,d.data, d.labels, d.type);
			}
		})
	}

	function getPenjaluran(){
		$.ajax({
			url: 'Dokumen/getPenjaluran',
			type: 'GET',
			dataType: 'JSON',
			data: {param1: 'value1'},
			success: function(d){
				var date = new Date();
				const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
				$("#titlePenjaluran").append('Distribusi Penjaluran (Per PIB) <span>Periode Bulan '+monthNames[0]+'-'+monthNames[date.getMonth()]+' '+date.getFullYear()+'</span>')
				renderPie('#piePenjaluranAll', d.data.all, d.title.all);
				renderPie('#piePenjaluranLow', d.data.low, d.title.low);
				renderPie('#piePenjaluranIbt', d.data.ibt, d.title.ibt);
			}
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	}
</script>