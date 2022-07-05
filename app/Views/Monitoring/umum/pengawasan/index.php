<div class="row justify-content-between">
	<div class="col-xl-6 border-faded bg-faded p-3 mb-g">
		<form class="needs-validation" id="form-search">
			<div class="form-group d-flex">
				<div class="col-xl-2">
					<label class="form-label">Nama Perusahaan</label>
				</div>
				<div class="col-xl-8">
					<input type="text" id="nama" class="form-control shadow-inset-2 form-control" placeholder="Nama Perusahaan" name="nama">
				</div>
			</div>
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
				Rekam Monev
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
							<th style="vertical-align: middle;">NPWP</th>
							<th style="width: 20%;">
								Nama Perusahaan <br>
								Fasilitas <br>
								Nomor Skep TPB
							</th>
							<th style="vertical-align: middle; width: 40%;">Alamat</th>
							<th style="vertical-align: middle;">Periode</th>
							<th style="vertical-align: middle;">Tanggal Laporan</th>
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
<!-- Modal Section -->
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
				<form id="formMonev" class="needs-validation" enctype="multipart/form-data" novalidate="novalidate">
					<table class="table table-striped" style="width: 100%;">
						<tr>
							<td style="width: 20%;">
								<label class="control-label">Nama Perusahaan</label>
							</td>
							<td>
								<select class="form-control select2" name="idPerusahaan" id="idPerusahaan" required>

								</select>
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
								<label class="control-label">Alamat</label>
							</td>
							<td>
								<input class="form-control" type="text" name="alamat" id="alamat" required>
								<div class="invalid-feedback">
									Kalom Alamat Perusahan Tidak Boleh Kosong.
								</div>
							</td>
							
						</tr>
						<tr class="hidden">
							<td colspan="2">

							</td>
						</tr>
						<tr>
							<td>
								<label class="control-label">Tanggal Pelaksanaan</label>
							</td>
							<td>
								<input class="form-control tanggal" type="text" name="tanggal" id="tanggal" required>
								<div class="invalid-feedback">
									Kalom Tanggal Pelaksanaan Tidak Boleh Kosong.
								</div>
							</td>

						</tr>
						<tr class="hidden">
							<td colspan="2">

							</td>
						</tr>
					</table>
					<div class="row">
						<div class="col-lg-12">
							<table id="akses" class="table table-hover table-striped sr-only">
								<thead>
									<th style="width: 15%;"></th>
									<th class="text-center" style="width: 30%;">Akses CCTV</th>
									<th class="text-center" style="width: 30%;">Akses IT Inventory</th>
									<th class="text-center" style="width: 25%;">Akses E-Seal</th>
								</thead>
								<tbody>
									<tr>
										<td>
											<strong>Link Akses</strong>
										</td>
										<td class="text-center">
											<a id="linkCctv" target="_blank">
												<i class="fas fa-video"></i>
											</a> &nbsp; 
											<input type="hidden" name="linkCctv">
											<button type="button" id="btnCctv" class="btn btn-default" onclick="salin('linkCctv')">Copy Link</button>
										</td>
										<td class="text-center">
											<a id="linkIt" target="_blank">
												<i class="fas fa-boxes"></i>
											</a> &nbsp; 
											<input type="hidden" name="linkIt">
											<button type="button" class="btn btn-default" onclick="salin('linkIt')">Copy Link</button>
										</td>
										<td class="text-center">
											<a id="linkEseal" target="_blank">
												<i class="fas fa-lock"></i>
											</a> &nbsp;
											<input type="hidden" name="linkEseal">
											<button type="button" class="btn btn-default" onclick="salin('linkEseal')">Copy Link</button>
										</td>
									</tr>
								</tbody>
							</table> 
						</div>
					</div>
					<table class="table table-bordered table-responsive table-hover table-striped">
						<thead>
							<th style="text-align: center; vertical-align: middle; width: 5%;"><b>NO</b></th>
							<th style="text-align: center; vertical-align: middle; width: 15%"><b>KEGIATAN</b></th>
							<th style="text-align: center; vertical-align: middle; width: 40%;"><b>URAIAN KEGIATAN</b></th>
							<th style="text-align: center; vertical-align: middle; width: 40%;"><b>KESESUAIAN DENGAN PERATURAN</b></th>
						</thead>
						<tbody>
							<!-- START POIN 1 -->
							<tr>
								<td style="text-align: center; vertical-align: top;">1</td>
								<td style="vertical-align: top;"><b>Monitoring Umum melalui pemanfaatan CCTV</b></td>
								<td style="text-align: left; vertical-align: top;">
									Langkah-langkah yang dapat dilaksanakan adalah sebagai berikut: <br>
									<ul>
										<li>
											Melakukan pemeriksaan apakah CCTV dapat diakses.
										</li>
										<li>
											Keseluruhan CCTV yang dipersyaratkan apakah masih terpasang dan bisa diakses.
										</li>
										<li>
											Pengawasan seluruh TPB melalui CCTV dan dilakukan pencatatan pada log book yang paling kurang memuat pelaksanaan pengamatan melalui CCTV. berdasarkan manajemen risiko dan dapat dilakukan secara <i>random</i>.
										</li>
									</ul>
									atensi: <br>
									<ul>
										<li>
											CCTV yang tidak dapat diakses pada jam rawan seperti sabtu malam atau minggu malam
										</li>
										<li>
											CCTV tidak dapat diakses pada saat pembongkaran atau penimbunan barang
										</li>
									</ul>
									<i>
										Catat hasil pengamatan terhadap CCTV jika ada hal yang mencurigakan dan dilakukan konfirmasi jika ada hal yang mencurigakan.
									</i>
								</td>
								<td style="text-align: left; vertical-align: top; width: 50%;">
									<div class="form-group">
										<label class="form-label">Status CCTV</label>
										<div class="frame-wrap">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="statusCCTV_Y" name="cctv[Status]" value="Y">
												<label class="custom-control-label" for="statusCCTV_Y">Aktif</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="statusCCTV_N" name="cctv[Status]" value="N" >
												<label class="custom-control-label" for="statusCCTV_N">Tidak Aktif</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Rekaman CCTV</label>
										<div class="frame-wrap">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="rekamanCCTV_Y" name="cctv[Rekaman]" value="Y">
												<label class="custom-control-label" for="rekamanCCTV_Y">Minimal 7 hari atau lebih</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="rekamanCCTV_N" name="cctv[Rekaman]" value="N" >
												<label class="custom-control-label" for="rekamanCCTV_N">Kurang dari 7 hari</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Kualitas Gambar CCTV</label>
										<div class="frame-wrap">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="kualitasCCTV_Y" name="cctv[Kualitas]" value="Y">
												<label class="custom-control-label" for="kualitasCCTV_Y">Kualitas Gambar Bagus</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="kualitasCCTV_N" name="cctv[Kualitas]" value="N" >
												<label class="custom-control-label" for="kualitasCCTV_N">Kualitas Gambar Jelek / Pecah / Blur</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="form-group">
											<label class="form-label">Lokasi CCTV Terpasang minimal 6 titik sesuai PER-19/BC/2018</label>
											<div class="frame-wrap">
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" class="custom-control-input" id="lokasiCCTV_Y" name="cctv[Lokasi]" value="Y">
													<label class="custom-control-label" for="lokasiCCTV_Y">Ya</label>
												</div>
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" class="custom-control-input" id="lokasiCCTV_N" name="cctv[Lokasi]" value="N" >
													<label class="custom-control-label" for="lokasiCCTV_N">Tidak - Jelaskan dalam hasil pengamatan</label>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="form-group">
											<label class="form-label">CCTV dipasang sedemikian rupa sehingga atas setiap kendaraan pengangkut barang yang masuk dan keluar Kawasan Beriakt dapat dilihat dan diketahui gambarang yang menunjukkan spesifikasi kendaraan dan tanda pengaman</label>
											<div class="frame-wrap">
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" class="custom-control-input" id="penempatanCCTV_Y" name="cctv[Penempatan]" value="Y">
													<label class="custom-control-label" for="penempatanCCTV_Y">Ya</label>
												</div>
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" class="custom-control-input" id="penempatanCCTV_N" name="cctv[Penempatan]" value="N" >
													<label class="custom-control-label" for="penempatanCCTV_N">Tidak - Jelaskan dalam hasil pengamatan</label>
												</div>
											</div>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td colspan="4">
									<div class="d-flex align-items-center justify-content-center"><h2 class="text-center">Hasil Pengamatan</h2></div>
									<textarea class="form-control" name="laporan1" id="laporan1" style="width: 100%" rows="15"></textarea>
								</td>
							</tr>
							<!-- END POIN 1 -->
							<!-- START POIN 2 -->
							<tr>
								<td style="text-align: center; vertical-align: top;">2</td>
								<td style="vertical-align: top;"><b>Monitoring Umum melalui pemanfaatan <i>IT Inventory</i></b></td>
								<td style="text-align: left; vertical-align: top;">
									Langkah-langkah yang dapat dilaksanakan adalah sebagai berikut: <br>
									<ul>
										<li>
											Melakukan pemeriksaan apakah <i>IT Inventory</i> dapat diakses.
										</li>
										<li>
											Melakukan pemeriksaan apakah <i>IT Inventory</i> dapat dimanfaatkan.
										</li>
										<li>
											Uji petik pemanfaatan <i>IT Inventory</i> dengan membandingkan data pada SKP <i>real time</i> dicatatan. Jika tidak, harus diketahui saat TPB melakukan input data pada <i>IT Inventory</i> sesuai SKP.
										</li>
										<li>
											Unduh data pemasukan dan pengeluaran pada <i>IT Inventory</i> untuk dilakukan uji petik analisis kewajaran.
										</li>
										<li>
											Catat hasil analisis pada log book
										</li>
									</ul>
									atensi: <br>
									<ul>
										<li>
											TPB yang terlalu <i>lag</i>/jeda waktu pencatatannya antara <i>IT Inventory</i> dengan SKP dibandingkan SOP Perusahaan.
										</li>
										<li>
											Kewajaran antara jumlah data pemasukan dan data pengeluaran.
										</li>
										<li>
											Kewajaran antara jumlah data pada <i>IT Inventory</i> dengan data pada SKP.
										</li>
									</ul>
									<i>
										Catat hasil analisis terhadap <i>IT Inventory</i> perusahaan jika ada yang mencurigakan.
									</i>
								</td>
								<td style="text-align: left; vertical-align: top; width: 50%;">
									<div class="form-group">
										<label class="form-label">Status IT Inventory</label>
										<div class="frame-wrap">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="statusIT_Y" name="it[Status]" value="Y">
												<label class="custom-control-label" for="statusIT_Y">Aktif</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="statusIT_N" name="it[Status]" value="N" >
												<label class="custom-control-label" for="statusIT_N">Tidak Aktif</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">IT Inventory Subsistem dengan Aplikasi Pencatatan Keuangan</label>
										<div class="frame-wrap">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="subsistemIT_Y" name="it[subSistem]" value="Y">
												<label class="custom-control-label" for="subsistemIT_Y">Subsistem Golongan A/B</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="subsistemIT_N" name="it[subSistem]" value="N" >
												<label class="custom-control-label" for="subsistemIT_N">Tidak Subsistem</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Data pada IT Inventory Kontinu dan <i>Realtime</i> sesuai SPI</label>
										<div class="frame-wrap">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="dataIT_Y" name="it[Data]" value="Y">
												<label class="custom-control-label" for="dataIT_Y">Data Kontinu dan <i>Realtime</i></label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="dataIT_N" name="it[Data]" value="N" >
												<label class="custom-control-label" for="dataIT_N">Data Tidak Kontinu / Tidak <i>Realtime</i></label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="form-group">
											<label class="form-label">Dapat Menghasilkan Laporan Yang dapat diakses online dari kantor pabean dan dari kantor pajak sesuai PER-19/BC/2018</label>
											<div class="frame-wrap">
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" class="custom-control-input" id="laporanIT_Y" name="it[Laporan]" value="Y">
													<label class="custom-control-label" for="laporanIT_Y">Ya</label>
												</div>
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" class="custom-control-input" id="laporanIT_N" name="it[Laporan]" value="N" >
													<label class="custom-control-label" for="laporanIT_N">Tidak - Jelaskan dalam hasil pengamatan</label>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="form-group">
											<label class="form-label">Dapat Mencatat riwayat perekaman dan penelusuran kegiatan pengguna</label>
											<div class="frame-wrap">
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" class="custom-control-input" id="riwayatIT_Y" name="it[Riwayat]" value="Y">
													<label class="custom-control-label" for="riwayatIT_Y">Ya</label>
												</div>
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" class="custom-control-input" id="riwayatIT_N" name="it[Riwayat]" value="N" >
													<label class="custom-control-label" for="riwayatIT_Y">Tidak</label>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="form-group">
											<label class="form-label">Memiliki kemampuan untuk penelusuran posisi barang (<i>traceablity</i>)</label>
											<div class="frame-wrap">
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" class="custom-control-input" id="traceabilityIT_Y" name="it[Traceability]" value="Y">
													<label class="custom-control-label" for="traceabilityIT_Y">Ya</label>
												</div>
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" class="custom-control-input" id="traceabilityIT_N" name="it[Traceability]" value="N" >
													<label class="custom-control-label" for="traceabilityIT_N">Tidak</label>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="form-group">
											<label class="form-label">Pencatatan hanya dapat dilakukan oleh orang yang memiliki akses khusus (<i>authorized access</i>)</label>
											<div class="frame-wrap">
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" class="custom-control-input" id="accessIT_Y" name="it[Access]" value="Y">
													<label class="custom-control-label" for="accessIT_Y">Ya</label>
												</div>
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" class="custom-control-input" id="accessIT_N" name="it[Access]" value="N" >
													<label class="custom-control-label" for="accessIT_N">Tidak</label>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="form-group">
											<label class="form-label">Perubahan Pencatatan dan/atau perubahan data hanya dapat dilakukan oleh orang yang sesuai dengan kewenangannya</label>
											<div class="frame-wrap">
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" class="custom-control-input" id="kewenanganIT_Y" name="it[Kewenangan]" value="Y">
													<label class="custom-control-label" for="kewenanganIT_Y">Ya</label>
												</div>
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" class="custom-control-input" id="kewenanganIT_N" name="it[Kewenangan]" value="N" >
													<label class="custom-control-label" for="kewenanganIT_N">Tidak</label>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="form-group">
											<label class="form-label">IT Inventory dapat menggambarkan keterkaitan dengan dokumen kepabeanan</label>
											<div class="frame-wrap">
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" class="custom-control-input" id="keterkaitanIT_Y" name="it[Keterkaitan]" value="Y">
													<label class="custom-control-label" for="keterkaitanIT_Y">Ya</label>
												</div>
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" class="custom-control-input" id="keterkaitanIT_N" name="it[Keterkaitan]" value="N" >
													<label class="custom-control-label" for="keterkaitanIT_N">Tidak</label>
												</div>
											</div>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td colspan="4">
									<div class="d-flex align-items-center justify-content-center"><h2 class="text-center">Hasil Pengamatan</h2></div>
									<textarea class="form-control" name="laporan2" id="laporan2" style="width: 100%" rows="15"></textarea>
								</td>
							</tr>
							<!-- END POIN 2 -->
							<!-- START POIN 3 -->
							<tr>
								<td style="text-align: center; vertical-align: top;">3</td>
								<td style="vertical-align: top;"><b>Monitoring Umum melalui pemanfaatan CEISA TPB</b></td>
								<td style="text-align: left; vertical-align: top;">
									Langkah-langkah yang dapat dilaksanakan adalah sebagai berikut: <br>
									<ul>
										<li>Unduh data pada CEISA sebagai pembanding untuk keandalan IT Inventory</li>
										<li>
											Gunakan data pada SKP sebagai sumber database pola bisnis yang dilakukan perusahaan, misalnya:
											<ul>
												<li>pembelian yang dilakukan</li>
												<li>pekerjaa sub kontrak yang ada, dilakukan oleh siapa saja?</li>
												<li>penjualan lokal yang dilakukan</li>
												<li>penjualan ekspor yang dilakukan</li>
												<li>barang sisa atau scrap yang dijual</li>
												<li>penggunaan perusahaan jasa transportasi/sarana pengangkut</li>
											</ul>
										</li>
										<li>Unduh data BC 2.3 khusus barang modal, barang contoh, dan barang lainnya yang memerlukan atensi untuk dilakukan pengawasan lebih lanjut <br> Atensi:</li>
										<li>Dokumen BC 2.5 yang besar dan tidak wajar sesuai komposisi penjualan lokal yang ada pada umumnya</li>
										<li>Kondisi barang yang diluar kebiasaan dari pola bisnis perusahaan TPB</li>
										<li>Dalam hal sistem transaksi tidak biasa dalam aplikasi monitoring dan evaluasi belum tersedia secara elektronik, pengawasan dapat dilakukan secara manual</li>
										<li>Dalam hal pelaksanaan monitoring dan evaluasi tidak terdapat sistem transaksi tidak biasa, maka pengawasan monitoring dan evaluasi dilakukan sesuai pedoman ini.</li>
									</ul>
									<i>
										Catat hasil analisis terhadap <i>CEISA TPB</i> perusahaan jika ada yang mencurigakan.
									</i>
								</td>
								<td style="text-align: left; vertical-align: top; width: 50%;">
									<div class="form-group">
										<label class="form-label">Status CEISA</label>
										<div class="frame-wrap">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="statusCEISA_Y" name="ceisa[Status]" value="Y">
												<label class="custom-control-label" for="statusCEISA_Y">Aktif</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="statusCEISA_N" name="ceisa[Status]" value="N" >
												<label class="custom-control-label" for="statusCEISA_N">Tidak Aktif</label>
											</div>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td colspan="4">
									<div class="d-flex align-items-center justify-content-center"><h2 class="text-center">Hasil Pengamatan</h2></div>
									<textarea class="form-control" name="laporan3" id="laporan3" style="width: 100%" rows="15"></textarea>
								</td>
							</tr>
							<!-- END POIN 3 -->
							<!-- START POIN 4 -->
							<tr>
								<td style="text-align: center; vertical-align: top;">4</td>
								<td style="vertical-align: top;"><b>Monitoring Umum melalui pemanfaatan data e-seal</b> <br> Monitoring ini dilakukan kepada TPB yang dipersyaratkan menggunakan e-seal.</td>
								<td style="text-align: left; vertical-align: top;">
									Langkah-langkah yang dapat dilaksanakan adalah sebagai berikut: <br>
									<ul>
										<li>Melakukan pemeriksaan apakah data e-seal termasuk pergerakannya dapat diakses.</li>
										<li>Melakukan pemeriksaan apakah data logbook e-seal dapat diakses.</li><br> Atensi
										<li>
											Nomor e-seal yang belum tertulis akibat pengiriman di malam hari dimana tidak ada petugas dan harus dilakukan pemeriksaan
										</li>
										<li>Perubahan pergerakan alat pengangkut sesuai e-seal yang tidak sesuai jalur yang telah diberikan</li>
										<li>Perubahan waktu kedatangan yang berbeda dengan waktu kedatangan yang diberikan</li>
									</ul>
									<i>
										Catat hasil analisis terhadap <i>e-seal</i> perusahaan jika ada yang mencurigakan.
									</i>
								</td>
								<td style="text-align: left; vertical-align: top; width: 50%;">
									<div class="form-group">
										<label class="form-label">Status E-Seal</label>
										<div class="frame-wrap">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="statusSEAL_Y" name="seal[Status]" value="Y">
												<label class="custom-control-label" for="statusSEAL_Y">Aktif</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="statusSEAL_N" name="seal[Status]" value="N" >
												<label class="custom-control-label" for="statusSEAL_N">Tidak Aktif</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Aplikasi E-Seal dapat menampilkan riwayat perjalanan yang sedang berjalan atau telah selesai</label>
										<div class="frame-wrap">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="riwayatSEAL_Y" name="seal[Riwayat]" value="Y">
												<label class="custom-control-label" for="riwayatSEAL_Y">Iya</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="riwayatSEAL_N" name="seal[Riwayat]" value="N" >
												<label class="custom-control-label" for="riwayatSEAL_Y">Tidak</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">E-Seal dapat memberikan notifikasi apabila terjadi hal yang diluar kewajaran</label>
										<div class="frame-wrap">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="notifikasiSEAL_Y" name="seal[Notifikasi]" value="Y">
												<label class="custom-control-label" for="notifikasiSEAL_Y">Iya</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="notifikasiSEAL_N" name="seal[Notifikasi]" value="N" >
												<label class="custom-control-label" for="notifikasiSEAL_N">Tidak</label>
											</div>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td colspan="4">
									<div class="d-flex align-items-center justify-content-center"><h2 class="text-center">Hasil Pengamatan</h2></div>
									<textarea class="form-control" name="laporan4" id="laporan4" style="width: 100%" rows="15"></textarea>
								</td>
							</tr>
							<!-- END POIN 4 -->
							<!-- START POIN 5 -->
							<tr>
								<td style="text-align: center; vertical-align: top;">5</td>
								<td style="vertical-align: top;">Barang yang ditimbun di TPB selain Kawasan Berikat sesuai dengan yang tercantum dalam izin TPB</td>
								<td style="text-align: left; vertical-align: top;">
									Uji petik pebandingan barang yang ditimbun dengan izin TPB. <br>
									<i>
										Cukup dicentang jika data yang ada masih sama seperti data pada arsip
									</i>
								</td>
								<td style="text-align: left; vertical-align: top; width: 50%;">
									<div class="form-group">
										<label class="form-label">Dalam 6 bulan terakhir apakah GB/PLB pernah memasukkan barang yang tidak sesuai dengan SKEP</label>
										<div class="frame-wrap">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="penimbunan_Y" name="penimbunan[Status]" value="Y">
												<label class="custom-control-label" for="penimbunan_Y">Iya</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="penimbunan_N" name="penimbunan[Status]" value="N" >
												<label class="custom-control-label" for="penimbunan_N">Tidak</label>
											</div>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td colspan="4">
									<div class="d-flex align-items-center justify-content-center"><h2 class="text-center">Hasil Pengamatan</h2></div>
									<textarea class="form-control" name="laporan5" id="laporan5" style="width: 100%" rows="15"></textarea>
								</td>
							</tr>
							<!-- END POIN 5 -->
							<!-- START POIN 6 -->
							<tr>
								<td style="text-align: center; vertical-align: top;">6</td>
								<td style="vertical-align: top;">Barang yang dimasukkan atau dikeluarkan ke dan dari TPB sesuai dengan SKEP (selain KB) atau berhubungan dengan hasil produksi (KB)</td>
								<td style="text-align: left; vertical-align: top;">
									Cek data di SKEP dan pengamatan di tempat penimbunan barang. <br>
									<i>
										Cukup dicentang jika data yang ada masih sama seperti data pada arsip
									</i>
								</td>
								<td style="text-align: left; vertical-align: top; width: 50%;">
									<div class="form-group">
										<label class="form-label">Dalam 6 bulan terakhir apakah KB pernah memasukkan barang yang tidak berhubungan dengan Hasil Produksinya</label>
										<div class="frame-wrap">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="pemasukan_Y" name="pemasukan[Status]" value="Y">
												<label class="custom-control-label" for="pemasukan_Y">Iya</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="pemasukan_N" name="pemasukan[Status]" value="N" >
												<label class="custom-control-label" for="pemasukan_N">Tidak</label>
											</div>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td colspan="4">
									<div class="d-flex align-items-center justify-content-center"><h2 class="text-center">Hasil Pengamatan</h2></div>
									<textarea class="form-control" name="laporan6" id="laporan6" style="width: 100%" rows="15"></textarea>
								</td>
							</tr>
							<!-- END POIN 6 -->
							<tr>
								<td colspan="4"><div class="d-flex align-items-center justify-content-center"><h2 class="text-center">KESIMPULAN</h2></div></td>
							</tr>
							<tr>
								<td colspan="4"><textarea class="form-control" name="kesimpulan" style="width: 100%; height: 200px;"></textarea></td>
							</tr>
						</tbody>
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
<div class="modal fade" id="modalDoc" tabindex="-1" role="dialog" aria-modal="true" data-backdrop="false">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="fal fa-times"></i></span>
				</button>
			</div>
			<div class="modal-body">   
				<iframe id="iframeDoc" style="width: 100%; height: 800px;" src=""></iframe>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect waves-themed" id="back" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal Section -->
<script type="text/javascript">
	var save_method;
	var idEdit;
	var clipboardData;
	$(document).ready(function() {
		$(':input').inputmask();
		$("#jaminan").inputmask({
			alias : 'currency',
			prefix: 'Rp '
		});
		$('.tanggal').datepicker({
			format: 'yyyy-mm-dd',
			todayHighLight: true,
			orientation: "top right"
		});

		CKEDITOR.replace('laporan1');
		CKEDITOR.replace('laporan2');
		CKEDITOR.replace('laporan3');
		CKEDITOR.replace('laporan4');
		CKEDITOR.replace('laporan5');
		CKEDITOR.replace('laporan6');
		CKEDITOR.replace('kesimpulan');

		$('.select2').select2({
			dropdownParent: $('#modalForm'),
			width : '100%',
			placeholder: 'Masukkan Nama Perusahaan Pemberi Subkon',
			minimumInputLength: 5,
			allowClear: true,
			ajax : {
				url : "Nib/getNpwp",
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
							id : item.NPWP,
							text : item.NAMA_PERUSAHAAN
						})
					});
					return{
						results : results
					};
				},
				cache : true
			}
		});

		$("#idPerusahaan").select2({
			dropdownParent:  $("#modalForm"),
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
					if (data.length > 0) {
						var results = [];

						$.each(data, function(index, laporan){
							results.push({
								id : laporan.ID,
								text : laporan.NAMA_PERUSAHAAN + " | " + laporan.NAMA_FASILITAS + " | " + laporan.NO_SKEP
							})
						});
						return{
							results : results
						};
					} else {
						return {results : [{id: 0, text: 'DATA TIDAK DITEMUKAN'}]};
					}
				},
				cache : true
			}
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
					"url" : "Monitoring/datatableListMonumPengawasan",
					"type" : "POST",
				},
			});
	});

	function hidden (a){
		if (a == "pelaksana") {
			$("#tambah").removeClass('sr-only');
		} else {
			if (a != "admin") {
				$("#tambah").addClass('sr-only');
			} else {
				$("#tambah").removeClass('sr-only');
			}

		}
	}

	$("#idPerusahaan").on("select2:selecting", function(e) {
		console.log(e);
		daftarAkses(e.params.args.data.id);
	});

	function daftarAkses(id){
		var linkEseal;
		var userEseal;
		var passEseal;
		$("#akses").addClass('sr-only');
		$("[name='alamat']").val("");
		$("#linkCctv").removeAttr('href');
		$("#linkIt").removeAttr('href');
		$("#linkEseal").removeAttr('href');
		$('[name="linkCctv"]').val("");
		$('[name="linkIt"]').val("");
		$('[name="linkEseal"]').val("");
		$(".added").remove();

		$.ajax({
			url: "Stakeholders/getStakeholdersMonum",
			type: "GET",
			dataType: "JSON",
			data: {ID: id},
			success: function(data){
				if (data.cctv) {
					var x = data.cctv.ALAMAT_AKSES.substring(0,4);
					if ( x == "http") {
						linkCctv = data.cctv.ALAMAT_AKSES;
					} else {
						linkCctv = "http://"+data.cctv.ALAMAT_AKSES;
					}
					userCctv = data.cctv.USERNAME;
					passCctv = data.cctv.PASSWORD;
				} else {
					linkCctv = "#";
					userCctv = "Data Tidak Ditemukan";
					passCctv = "Data Tidak Ditemukan";
				}

				if (data.it) {
					var x = data.it.ALAMAT_AKSES.substring(0,4);
					if ( x == "http") {
						linkIt = data.it.ALAMAT_AKSES;
					} else {
						linkIt = "http://"+data.it.ALAMAT_AKSES;
					}
					userIt = data.it.USERNAME;
					passIt = data.it.PASSWORD;
				} else {
					linkIt = "#";
					userIt = "Data Tidak Ditemukan";
					passIt = "Data Tidak Ditemukan";
				}

				if (data.eseal) {
					var x = data.eseal.ALAMAT_AKSES.substring(0,4);
					console.log(x);
					if ( x == "http") {
						linkEseal = data.eseal.ALAMAT_AKSES;
					} else {
						linkEseal = "http://"+data.eseal.ALAMAT_AKSES;
					}
					userEseal = data.eseal.USERNAME;
					passEseal = data.eseal.PASSWORD;
				} else {
					linkEseal = "#";
					userEseal = "Data Tidak Ditemukan";
					passEseal = "Data Tidak Ditemukan";
				}
				$("#akses").removeClass('sr-only');
				$("[name='alamat']").val(data.umum[2].data);
				$("#linkCctv").attr('href', linkCctv);
				$("#linkIt").attr('href', linkIt);
				$("#linkEseal").attr('href', linkEseal);
				$('[name="linkCctv"]').val(linkCctv);
				$('[name="linkIt"]').val(linkIt);
				$('[name="linkEseal"]').val(linkEseal);
				$("#btnCctv").attr('data-clipboard-text', linkCctv);
				$("#akses > tbody").append('<tr class="added"><td><strong>Username</strong></td><td class="text-center">'+userCctv+'</td><td class="text-center">'+userIt+'</td><td class="text-center">'+userEseal+'</td></tr>');
				$("#akses > tbody").append('<tr class="added"><td><strong>Password</strong></td><td class="text-center">'+passCctv+'</td><td class="text-center">'+passIt+'</td><td class="text-center">'+passEseal+'</td></tr>');
			}
		})
	}

	function salin(a){
		var success = true;
		var range = document.createRange();
		var selection;

		if (window.clipboardData) {
			console.log(window.clipboardData, true);
			window.clipboardData.setData("text",$('[name="'+a+'"]').val());
		} else {
			console.log(window, false);
			var tmpElem = $('<div>');
			tmpElem.css({
				position : 'absolute',
				left: '-1000px',
				top: '-1000px'
			});
			tmpElem.text($('[name="'+a+'"]').val());
			$('body').append(tmpElem);
			range.selectNodeContents(tmpElem.get(0));
			selection = window.getSelection ();
			selection.removeAllRanges ();
			selection.addRange (range);

			try {
				success = document.execCommand("copy",false,null);
			} catch(e) {
				copyToClipboardFF($('[name="'+a+'"]').val());
				console.log(e);
			}

			if (success) {
				tmpElem.remove();
			}
			console.log(success);
		}
	}

	$("#rekam").on('click',function(event) {
		event.preventDefault();
		/* Act on the event */
		save_method = "add";
		var curdate = "<?php echo date('Y-m-d'); ?>";
		$("#formMonev")[0].reset();
	// $("#idPerusahaan").children().remove();
	$(".modal-title").text('Form Laporan Monitoring Umum Pada Ruang Kendali (MONITORING ROOM)');
	$("#modalForm").modal("show");
	$("#tanggal").val(curdate);
	$('input').removeProp('checked');
	$('input[value="N"]').prop('checked', true);
});

	$("#modalForm").on('hidden.bs.modal',function(event) {
		$("input[type='hidden']").remove();
		$("#formMonev")[0].reset();
		$('.select2').val(null).trigger('change');
		$("#akses").addClass('sr-only');
		$("[name='alamat']").val("");
		$("#linkCctv").removeAttr('href');
		$("#linkIt").removeAttr('href');
		$("#linkEseal").removeAttr('href');
		$('[name="linkCctv"]').val("");
		$('[name="linkIt"]').val("");
		$('[name="linkEseal"]').val("");
		$(".added").remove();
	});

	function selectedValue(a,b){
		var data = [{id:a,text:b}];
		var selectedVal = $("#idPerusahaan");
		var option = new Option(b,a,true,true);
		selectedVal.append(option).trigger('change');

		selectedVal.trigger({
			type: "select2:select",
			params: {
				data: data
			}
		})
	}

	function edit(id){
		save_method = "update";
		$.ajax({
			url: "Monitoring/ajax_edit_monum",
			type: "GET",
			dataType: "JSON",
			data: {id: id},
			success: function(d){
				idEdit = id;
				selectedValue(d.laporan.id_perusahaan, d.laporan.nama_perusahaan);
				$('[name="alamat"]').val(d.laporan.alamat);
				$('[name="tanggal"]').val(d.laporan.tanggalLaporan);
				$("#modalForm").modal("show");
				CKEDITOR.instances['kesimpulan'].setData(d.laporan.kesimpulan);
				$(".modal-title").text('Form Laporan Monitoring Umum Pada Ruang Kendali (MONITORING ROOM)');

				var isi = d.isi;
				for (var i = 0; i < isi.length; i++) {
					var textArea = "laporan"+isi[i].item;
					CKEDITOR.instances[textArea].setData(isi[i].keterangan);
				}

				if (d.cctv != null) {
					$("#statusCCTV_"+d.cctv.STATUS).attr('checked', '');
					$("#kualitasCCTV_"+d.cctv.KUALITAS).attr('checked', '');
					$("#lokasiCCTV_"+d.cctv.LOKASI).attr('checked', '');
					$("#penempatanCCTV_"+d.cctv.PENEMPATAN).attr('checked', '');
					$("#rekamanCCTV_"+d.cctv.REKAMAN).attr('checked', '');
				} else {
					$("#statusCCTV_N").attr('checked', '');
					$("#kualitasCCTV_N").attr('checked', '');
					$("#lokasiCCTV_N").attr('checked', '');
					$("#penempatanCCTV_N").attr('checked', '');
					$("#rekamanCCTV_N").attr('checked', '');
				}

				if (d.it != null) {
					$("#statusIT_"+d.it.STATUS).attr('checked', '');
					$("#keterkaitanIT_"+d.it.KETERKAITAN).attr('checked', '');
					$("#kewenanganIT_"+d.it.KEWENANGAN).attr('checked', '');
					$("#laporanIT_"+d.it.LAPORAN).attr('checked', '');
					$("#riwayatIT_"+d.it.RIWAYAT).attr('checked', '');
					$("#subsistemIT_"+d.it.SUBSISTEM).attr('checked', '');
					$("#traceabilityIT_"+d.it.TRACEABILITY).attr('checked', '');
					$("#dataIT_"+d.it.DATA).attr('checked', '');
					$("#accessIT_"+d.it.ACCESS).attr('checked', '');
				} else {
					$("#statusIT_N").attr('checked', '');
					$("#keterkaitanIT_N").attr('checked', '');
					$("#kewenanganIT_N").attr('checked', '');
					$("#laporanIT_N").attr('checked', '');
					$("#riwayatIT_N").attr('checked', '');
					$("#subsistemIT_N").attr('checked', '');
					$("#traceabilityIT_N").attr('checked', '');
					$("#dataIT_N").attr('checked', '');
					$("#accessIT_N").attr('checked', '');
				}

				if (d.ceisa != null) {
					$("#statusCEISA_"+d.ceisa.RIWAYAT).attr('checked', '');
				} else {
					$("#statusCEISA_N").attr('checked', '');
				}
				
				if (d.seal != null) {
					$("#statusSEAL_"+d.seal.STATUS).attr('checked', '');
					$("#riwayatSEAL_"+d.seal.RIWAYAT).attr('checked', '');
					$("#notifikasiSEAL_"+d.seal.NOTIFIKASI).attr('checked', '');
				} else {
					$("#statusSEAL_N").attr('checked', '');
					$("#riwayatSEAL_N").attr('checked', '');
					$("#notifikasiSEAL_N").attr('checked', '');
				}
				
				if (d.penimbunan != null) {
					$("#penimbunan_"+d.penimbunan.RIWAYAT).attr('checked', '');
				} else {
					$("#penimbunan_N").attr('checked', '');
				}
				
				if (d.pemasukan != null) {
					$("#pemasukan_"+d.pemasukan.RIWAYAT).attr('checked', '');
				} else {
					$("#pemasukan_N").attr('checked', '');
				}
				
				daftarAkses(d.laporan.id_perusahaan);
			}
		})
	}

	function save() {
		var url;
		var data;
		var form = $("#formMonev")[0];
		data = new FormData(form);

		if (save_method == "add") {
			url = "Monitoring/ajax_add_monum";
		}else{
			url = "Monitoring/ajax_update_monum";
			data.append('id',idEdit);
		}

		if ($('#formMonev')[0].checkValidity() === false ) {
			play = document.getElementById('notification');
			$("#formMonev").addClass('was-validated');
			toastr.error('Isi Form Dengan Lengkap dan Benar','Gagal');
			play.play();
			delete play;
		} else {
			data.append('kesimpulan', CKEDITOR.instances['kesimpulan'].getData());
			var ckedit = $('.cke');
			$.each(ckedit, function(index, val) {
				/* iterate through array or object */
				var idCk = val.id
				var el = idCk.slice(4);
				if (idCk.slice(4, 8) == 'lapo') {
					data.append('laporan[]', CKEDITOR.instances[el].getData());
				// data.append('content[]', CKEDITOR.instances[el].getContents());
			}
		});
			$.ajax({
				url: url,
				type: 'POST',
				dataType: 'JSON',
				data: data,
				contentType : false,
				cache : false,
				processData : false,
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
			.done(function(){
				$("#akses").addClass('sr-only');
				$("[name='alamat']").val("");
				$("#linkCctv").removeAttr('href');
				$("#linkIt").removeAttr('href');
				$("#linkEseal").removeAttr('href');
				$('[name="linkCctv"]').val("");
				$('[name="linkIt"]').val("");
				$('[name="linkEseal"]').val("");
				$(".added").remove();
			})
		}
	}

	function deleteItem(id){
		if (confirm("data monev akan dihapus?")) {
			$.ajax({
				url: "Monitoring/ajax_delete_monum",
				type: "GET",
				dataType: "JSON",
				data: {ID: id},
				success: function(d){
					alert(d);
					table.ajax.reload(null, false);
				}
			})
		}
	}

	$("#button02").on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		$.ajax({
			url: 'Monitoring/getPerhitungan',
			type: 'GET',
			dataType: 'JSON',
			data: {persetujuan: 'S-638/WBC.09/KPP.MP.07/2020'},
			success: function(d){
				console.log(d);
			}
		})        
	});

	function printItem(id){
		$.ajax({
			url: "Monitoring/ajax_print_monum",
			type: "GET",
			dataType: "JSON",
			data: {id: id},
			success: function(data){
				if (data[0] == 'success') {
					$("#iframeDoc").removeAttr('src');
					$("#iframeDoc").attr('src', data[1]);
					$('.modal-title').text(data[2]);
				// $("#btn_close").attr('value',data[1]);
				$("#modalDoc").modal("show");
			} else {
				alert(data[1]);
			}
			
		}
	})
	}

	function validateItem(id){
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
					url: 'Monitoring/ajax_validate_monum',
					type: 'POST',
					dataType: 'JSON',
					data: {ID: id, Flag: 1},
					success: function(d){
						if (d[0] == 1) {
							swalWithBootstrapButtons.fire(
								"Laporan Berhasil Divalidasi!",
								"Data Laporan Monitoring Umum Sudah Tervalidasi",
								"success"
								);
							table.ajax.reload(null, false);
						} else {
							swalWithBootstrapButtons.fire(
								"Telah Terjadi Kesalahan!",
								"Data Laporan Monitoring Umum Gagal Divalidasi <br> Harap Menghubungi Administrator",
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
					"Proses Validasi Dibatalkan",
					"Data Laporan Monitoring Umum Batal Divalidasi",
					"error"
					);
			}
		});
	}

	$('#modalDoc').on('hidden.bs.modal',  function(event) {
		var filePath = $('#iframeDoc').attr('src');
		$.ajax({
			url: 'Monitoring/ajax_delete_pdf_monum',
			type: 'POST',
			dataType: 'JSON',
			data: {fileName: filePath},
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
		
	});

</script>