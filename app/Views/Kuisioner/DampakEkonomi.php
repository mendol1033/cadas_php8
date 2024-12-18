<div class="row" id="konten">
	<div class="col-xl-1"></div>
	<div class="col-xl-10">
		<div id="panel-4" class="panel">
			<div class="panel-hdr">
				<h2>
					Kuisioner <span class="fw-300"><i><b>Dampak Ekonomi</b></i></span>
				</h2>
				<div class="panel-toolbar">
					<button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
					<button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
					<button class="btn btn-panel waves-effect waves-themed" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
				</div>
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<ul class="nav nav-tabs nav-fill" role="tablist">
						<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-selected="true">Home</a></li>
						<li class="nav-item"><a class="nav-link disabled" data-toggle="tab" href="#tab-2" role="tab" aria-selected="false">Bagian 1</a></li>
						<li class="nav-item"><a class="nav-link disabled" data-toggle="tab" href="#tab-3" role="tab" aria-selected="false">Bagian 2</a></li>
						<li class="nav-item"><a class="nav-link disabled" data-toggle="tab" href="#tab-4" role="tab" aria-selected="false">Bagian 3</a></li>
						<li class="nav-item"><a class="nav-link disabled" data-toggle="tab" href="#tab-5" role="tab" aria-selected="false">Bagian 4</a></li>
						<li class="nav-item"><a class="nav-link disabled" data-toggle="tab" href="#tab-6" role="tab" aria-selected="false">Bagian 5</a></li>
						<li class="nav-item"><a class="nav-link disabled" data-toggle="tab" href="#tab-7" role="tab" aria-selected="false">Bagian 6</a></li>
						<li class="nav-item"><a class="nav-link disabled" data-toggle="tab" href="#tab-8" role="tab" aria-selected="false">Bagian 7</a></li>
						<li class="nav-item"><a class="nav-link disabled" data-toggle="tab" href="#tab-9" role="tab" aria-selected="false">Bagian 8</a></li>
						<li class="nav-item"><a class="nav-link disabled" data-toggle="tab" href="#tab-10" role="tab" aria-selected="false">Bagian 9</a></li>
						<li class="nav-item"><a class="nav-link disabled" data-toggle="tab" href="#tab-11" role="tab" aria-selected="false">Bagian 10</a></li>
						<li class="nav-item"><a class="nav-link disabled" data-toggle="tab" href="#tab-12" role="tab" aria-selected="false">Bagian 11</a></li>
						<li class="nav-item"><a class="nav-link disabled" data-toggle="tab" href="#tab-13" role="tab" aria-selected="false">Bagian 12</a></li>
						<li class="nav-item"><a class="nav-link disabled" data-toggle="tab" href="#tab-14" role="tab" aria-selected="false">Foto</a></li>
						<li class="nav-item"><a class="nav-link disabled" data-toggle="tab" href="#tab-15" role="tab" aria-selected="false">Pernyataan</a></li>
					</ul>
					<div class="tab-content p-3">
						<div class="tab-pane fade active show" id="tab-1" role="tabpanel">
							<div class="panel-tag" style="font-size: 17px;">
								- Mohon isikan terlebih dahulu alamat email pribadi <b>pengisi kuisioner</b>
							</div>
							<form class="needs-validation" id="formHome" enctype="multipart/form-data" novalidate>
								<div class="form-group">
									<label class="form-label" for="emailKuisioner">Alamat Email</label>
									<input type="email" id="emailKuisioner" name="emailKuisioner" class="form-control" placeholder="Alamat Email Pribadi Pengisi Kuisioner" autocomplete="off" required>
								</div>
							</form>
							<br>
							<div style="font-size: 20px;">
								<p>Sebelum mengisi kuisioner, siapkan terlebih dahulu data-data dan berkas sebagai berikut: </p>
								<ol>
									<li>
										Data jumlah tenaga kerja tahun pengukuran (<?php echo (date('Y')-1)?>) (tenaga kerja asing, tenaga kerja lokal, tenaga kerja terdidik, tenaga kerja tidak terdidik, tenaga kerja laki-laki, dan tenaga kerja perempuan)
									</li>
									<li>
										Data laporan keuangan meliputi nilai ekuitas, beban pajak daerah, beban pajak tidak langsung, beban gaji, beban depresiasi dan laba/rugi perusahaan <b>tahun (<?php echo (date('Y')-1)?>) untuk perusahaan dengan periode laporan keuangan Januari-Desember atau data laporan keuangan tahun terakhir untuk perusahaan dengan periode laporan keuangan lainnya.</b>
									</li>
									<li>
										Data pembayaran Pajak tahun <?php echo (date('Y')-1);?> (Januari s.d. Desember) dan <?php echo date('Y');?> (Januari s.d. April) meliputi PPh Pasal 21, PPh Pasal 22 Impor, PPh Pasal 22 Selain Dalam Rangka Impor, PPh Pasal 23, PPh Pasal 26, PPh Pasal 4 ayat (2), PPN Kurang/(Lebih) Bayar, dan PBB sesuai Surat Setoran Pajak (SSP) terkait atau senilai yang disetorkan ke negara. Nilai PPN Masukan dan PPN Keluaran Tahun 2020 dan Tahun 2021 sesuai SPT Masa PPN terkait.
									</li>
									<li>
										Data SPT PPh Badan Perusahaan yaitu PPh Badan Pasal 25 dan Pasal 29 tahun <?php echo (date('Y')-1);?> untuk periode laporan keuangan Januari s.d. Desember, atau SPT PPh Badan tahun terakhir untuk periode laporan keuangan selain Januari s.d. Desember.
									</li>
									<li>
										Data jumlah industri terkait (seperti vendor, distributor, dll) baik pengguna fasilitas Kawasan Berikat, KITE, atau KITE IKM maupun non-pengguna fasilitas Kawasan Berikat, KITE,KITE IKM untuk memenuhi data jaringan usaha.
									</li>
									<li>
										Data jumlah usaha di sekitar pabrik meliputi bidang perdangan, akomodasi, makanan, dan transportasi
									</li>
									<li>
										Dalam hal perusahaan memiliki beberapa lokasi pabrik yang menggunakan fasilitas kepabeanan dan laporan keuangan yang terpisah atas masing-masing lokasi maka perusahaan harus mengisi kuisioner sebanyak laporan keuangannya
									</li>
									<li>
										Kuisioner ini merupakan panduan untuk pengisian data di google form pada tautan yang sudah disediakan oleh masing-masing KWBC dan KPPBC.
									</li>
								</ol>
								<p>
									Semua data keuangan diisikan dalam mata uang rupiah. Bila nilai masih dalam bentuk mata uang asing, mohon dikonversi terlebih dahulu ke mata uang rupiah berdasarkan kurs 31 Desember di tahun tersebut.
								</p>
								<p>
									Isikan terlebih dahulu <b>alamat "email pribadi"</b> pengisi kuisioner pada form di atas
								</p>
								<iframe src="assets/uploads/s109.pdf" style="width: 100%; height: 500px;"></iframe>
							</div>
							<div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center">
								<button class="btn btn-primary ml-auto waves-effect waves-themed" onclick="formValidate('#formHome', 'tab-1', '#namaPPK')" type="button">Berikutnya</button>
							</div>
						</div>
						<div class="tab-pane fade" id="tab-2" role="tabpanel">
							<div class="panel-tag" style="font-size: 20px;">
								<b>BAGIAN I PROFIL PENGISI KUISIONER</b>
							</div>
							<br>
							<form class="needs-validation" id="form1" enctype="multipart/form-data" novalidate>
								<div class="form-group">
									<label class="form-label" for="namaPPK">Nama Lengkap Pengisi Kuisioner</label>
									<input type="text" id="namaPPK" name="I-namaPPK" class="form-control" placeholder="Nama Lengkap Pengisi Kuisioner" required autocomplete="off">
								</div>
								<div class="form-group">
									<label class="form-label" for="jabatanPPK">Jabatan Pengisi Kuisioner</label>
									<input type="text" id="jabatanPPK" name="I-jabatanPPK" class="form-control" placeholder="Jabatan Pengisi Kuisioner" required autocomplete="off">
								</div>
								<div class="form-group">
									<label class="form-label" for="handphone">Nomor Handphone</label>
									<input type="text" id="handphone" name="I-handphone" class="form-control" placeholder="Nomor Handphone Pengisi Kuisioner" required autocomplete="off">
								</div>
								<div class="form-group">
									<label class="form-label" for="emailPJ">Alamat Email Penanggung Jawab (Email Pribadi)</label>
									<input type="email" id="emailPJ" name="I-emailPJ" class="form-control" placeholder="Alamat Email Pribadi Penanggung Jawab" autocomplete="off" required>
								</div>
								<div class="form-group">
									<label class="form-label" for="fasilitas">Jenis Fasilitas Kepabeanan yang digunakan saat ini (bisa dipilih lebih dari satu)</label>
									<div class="frame-wrap">
										<div class="custom-control custom-checkbox custom-control-inline">
											<input type="checkbox" class="custom-control-input" name="I-fasilitas[]" value="Kawasan Berikat" id="checkboxKB">
											<label class="custom-control-label" for="checkboxKB">Kawasan Berikat</label>
										</div>
										<div class="custom-control custom-checkbox custom-control-inline">
											<input type="checkbox" class="custom-control-input" name="I-fasilitas[]" value="KITE Pembebasan" id="checkboxKiteBebas">
											<label class="custom-control-label" for="checkboxKiteBebas">KITE Pembebasan</label>
										</div>
										<div class="custom-control custom-checkbox custom-control-inline">
											<input type="checkbox" class="custom-control-input" name="I-fasilitas[]" value="KITE Pengembalian" id="checkboxKiteKembali">
											<label class="custom-control-label" for="checkboxKiteKembali">KITE Pengembalian</label>
										</div>
										<div class="custom-control custom-checkbox custom-control-inline">
											<input type="checkbox" class="custom-control-input" name="I-fasilitas[]" value="KITE IKM" id="checkboxKiteIKM">
											<label class="custom-control-label" for="checkboxKiteIKM">KITE IKM</label>
										</div>
									</div>
								</div>
							</form>
							<div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row-reverse">
								<button class="btn btn-primary waves-effect waves-themed" onclick="formValidate('#form1', 'tab-2', '#namaPerusahaan')" type="button">Berikutnya</button>
								<button class="btn btn-primary waves-effect waves-themed" onclick="back('tab-2')" type="button" style="margin-right:15px;">Sebelumnya</button>
							</div>
						</div>
						<div class="tab-pane fade" id="tab-3" role="tabpanel">
							<div class="panel-tag" style="font-size: 20px;">
								<b>BAGIAN II PROFIL PERUSAHAAN</b>
							</div>
							<br>
							<form class="needs-validation" id="form2" enctype="multipart/form-data" novalidate>
								<div class="form-group">
									<label class="form-label" for="namaPerusahaan">Nama Perusahaan</label>
									<input type="text" id="namaPerusahaan" name="II-namaPerusahaan" class="form-control" placeholder="Nama Lengkap Perusahaan" required autocomplete="off">
								</div>
								<div class="form-group">
									<label class="form-label" for="npwp">NPWP Perusahaan</label>
									<input type="text" class="form-control" id="npwp" name="II-npwp-mask" data-inputmask	="'mask':'99.999.999.9-999.999'" required>
									<div class="invalid-feedback">
										Kolom NPWP Penerima Harus Diisi.
									</div>
								</div>
								<div class="form-group">
									<label class="form-label" for="emailPT">Alamat Email Perusahaan (Jika Ada)</label>
									<input type="email" id="emailPT" name="II-emailPT" class="form-control" placeholder="Alamat Email Resmi Perusahaan" autocomplete="off" required>
								</div>
								<div class="form-group">
									<label class="form-label" for="alamatPerusahaan">Alamat Perusahaan</label>
									<input type="text" id="alamatPerusahaan" name="II-alamatPerusahaan" class="form-control" placeholder="Alamat Lengkap Perusahaan" required autocomplete="off">
								</div>
								<div class="form-group">
									<label class="form-label" for="tahunBerdiri">Tahun Berdiri</label>
									<input type="text" id="tahunBerdiri" name="II-tahunBerdiri" class="form-control" placeholder="Tahun Berdirinya Perusahaan" required autocomplete="off" data-inputmask="'mask' : '9999'">
								</div>
								<div class="form-group">
									<label class="form-label" for="jenisIndustriIUI">Jenis Industri (Sesuai IUI)</label>
									<select class="form-control select2" id="jenisIndustriIUI" name="II-jenisIndustriIUI" required>
										<option value="Alas Kaki">Alas Kaki</option>
										<option value="Bahan Kimia">Bahan Kimia</option>
										<option value="Barang dari Logam">Barang dari Logam</option>
										<option value="Barang dari Plastik, Kertas atau Kayu">Barang dari Plastik, Kertas atau Kayu</option>
										<option value="Elektronik">Elektronik</option>
										<option value="Farmasi">Farmasi</option>
										<option value="Furniture">Furniture</option>
										<option value="Kendaraan Bermotor atau Komponennya">Kendaraan Bermotor atau Komponennya</option>
										<option value="Keperluan Rumah Tangga">Keperluan Rumah Tangga</option>
										<option value="Makanan dan Minuman">Makanan dan Minuman</option>
										<option value="Tekstil, Pakaian, atau Benang">Tekstil, Pakaian, atau Benang</option>
										<option value="Lainnya">Other</option>
									</select>
								</div>
								<div class="form-group">
									<label class="form-label" for="jenisInvestasi">Jenis Investasi</label>
									<select class="form-control select2" id="jenisInvestasi" name="II-jenisInvestasi" required>
										<option value="Penanaman Modal Asing (PMA): 100%">Penanaman Modal Asing (PMA): 100%</option>
										<option value="Penanaman Modal Asing (PMA): 76%-99%">Penanaman Modal Asing (PMA): 76%-99%</option>
										<option value="Penanaman Modal Asing (PMA): 51%-75%">Penanaman Modal Asing (PMA): 51%-75%</option>
										<option value="Penanaman Modal Asing (PMA): 26%-50%">Penanaman Modal Asing (PMA): 26%-50%</option>
										<option value="Penanaman Modal Asing (PMA): <25%">Penanaman Modal Asing (PMA): <25%</option>
										<option value="Penanaman Modal Dalam Negeri (PMDN): 100%">Penanaman Modal Dalam Negeri (PMDN): 100%</option>
									</select>
								</div>
								<div class="form-group">
									<label class="form-label" for="tahunFasilitas">Tahun Mulai Menggunakan Fasilitas Tersebut</label>
									<input type="text" id="tahunFasilitas" name="II-tahunFasilitas" class="form-control" placeholder="Tahun Mulai Menggunakan Fasilitas" required autocomplete="off" data-inputmask="'mask' : '9999'">
								</div>
								<div class="form-group">
									<label class="form-label" for="tujuanPenjualan">Tujuan Penjualan Hasil Produksi</label>
									<select class="form-control select2" name="II-tujuanPenjualan" id="tujuanPenjualan" required>
										<option value="Ekspor: 100%">Ekspor: 100%</option>
										<option value="Ekspor: 76%-99%">Ekspor: 76%-99%</option>
										<option value="Ekspor: 51%-75%">Ekspor: 51%-75%</option>
										<option value="Ekspor: <= 50%">Ekspor: <= 50%</option>
										<option value="Tidak Ada Hasil Produksi (Karena GB / PLB)">Tidak Ada Hasil Produksi (Karena GB / PLB)</option>
									</select>
								</div>
								<div class="form-group">
									<label class="form-label" for="jenisProduksi">Jenis Produksi</label>
									<select class="form-control select2" id="jenisProduksi" name="II-jenisProduksi" required>
										<option value="Mass Production">Mass Production</option>
										<option value="Job Order Maklon">Job Order Maklon</option>
										<option value="Job Order Non Maklon">Job Order Non Maklon</option>
										<option value="Job Order Gabungan (Maklon dan Non Maklon)">Job Order Gabungan (Maklon dan Non Maklon)</option>
									</select>
								</div>
								<div class="form-group">
									<label class="form-label" for="kppbcpengawasan">KPPBC Pengawasan</label>
									<select class="form-control select2" name="II-kppbcpengawasan" id="kppbcpengawasan" required>
										
									</select>
								</div>
								<div class="form-group">
									<label class="form-label">Lokasi Pabrik</label>
									<label class="form-label">- Mohon pilih Lokasi Pabrik yang terbesar / utama</label>
								</div>
								<div class="form-group">
									<label class="form-label" for="provinsi">Provinsi</label>
									<select class="form-control select2" id="provinsi" name="II-provinsi" required></select>
								</div>
								<div class="form-group">
									<label class="form-label" for="kota">Kota / Kabupaten</label>
									<select class="form-control select2" id="kota" name="II-kota" required></select>
								</div>
								<div class="form-group">
									<label class="form-label" for="kecamatan">Kecamatan</label>
									<select class="form-control select2" id="kecamatan" name="II-kecamatan" required></select>
								</div>
								<div class="form-group">
									<label class="form-label" for="kelurahan">Kelurahan</label>
									<select class="form-control select2" id="kelurahan" name="II-kelurahan" required></select>
								</div>
								<div class="form-group">
									<label class="form-label" for="namaJalan">Nama Jalan</label>
									<input type="text" id="namaJalan" name="II-namaJalan" class="form-control" required>
								</div>
								<div class="form-group">
									<label class="form-label" for="kbLain">Apakah di sekitar Anda ada perusahaan lain yang menggunakan fasiltias KB?</label>
									<select class="form-control select2" id="kbLain" name="II-kbLain" required>
										<option value="YA">Ya</option>
										<option value="TIDAK">Tidak</option>
										<option value="TIDAK TAHU">Tidak Tahu</option>
									</select>
								</div>
								<div class="form-group">
									<label class="form-label" for="namaKbLain">Sebutkan nama perusahaan tersebut</label>
									<select class="form-control select2 multi-select" id="namaKbLain" name="II-namaKbLain[]" multiple="multiple"></select>
								</div>
							</form>
							<div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row-reverse">
								<button class="btn btn-primary waves-effect waves-themed" onclick="formValidate('#form2', 'tab-3', '#hasilProduksi')" type="button">Berikutnya</button>
								<button class="btn btn-primary waves-effect waves-themed" onclick="back('tab-3')" type="button" style="margin-right:15px;">Sebelumnya</button>
							</div>
						</div>
						<div class="tab-pane fade" id="tab-4" role="tabpanel">
							<div class="panel-tag" style="font-size: 20px;">
								<b>BAGIAN III DATA HASIL PRODUKSI</b><br>
							</div>
							<br>
							<form class="needs-validation" id="form3" enctype="multipart/form-data" novalidate>
								<div class="form-group">
									<label class="form-label" for="hasilProduksi">Hasil Produksi Utama</label>
									<br> <label class="form-label">Sebutkan 10 hasil produksi utama dengan penjualan paling besar</label>
									<select class="form-control select2 multi-select" id="hasilProduksi" name="III-hasilProduksi[]" multiple="multiple" required>
										
									</select>
								</div>
								<div class="form-group">
									<label class="form-label" for="merkProduksi">Merk Hasil Produksi</label>
									<br> <label class="form-label">Dapat Pilih Lebih Dari Satu Merk</label>
									<select class="form-control select2 multi-select" id="merkProduksi" name="III-merkProduksi[]" multiple="multiple" required>
										
									</select>
								</div>
								<div class="form-group">
									<label class="form-label" for="bbImpor">Bahan Baku Yang di Impor</label>
									<select class="form-control select2 multi-select" id="bbImpor" name="III-bbImpor[]" multiple="multiple" required></select>
								</div>
								<div class="form-group">
									<label class="form-label" for="bbLokal">Bahan Baku Lokal</label>
									<select class="form-control select2 multi-select" id="bbLokal" name="III-bbLokal[]" multiple="multiple" required></select>
								</div>
								<div class="form-group">
									<label class="form-label" for="persenBbLokal">Persentase Penggunaan Bahan Baku Lokal</label>
									<input type="text" class="form-control persen" id="persenBbLokal" name="III-persenBbLokal-mask" required>
								</div>
								<div class="form-group">
									<label class="form-label" for="devisaImpor">Nilai Devisa Impor <?php echo (date('Y')-1)?></label>
									<input type="text" class="form-control rupiah" id="devisaImpor" name="III-devisaImpor-mask" required>
								</div>
								<div class="form-group">
									<label class="form-label" for="devisaEkspor">Nilai Devisa Ekspor <?php echo (date('Y')-1)?></label>
									<input type="text" class="form-control rupiah" id="devisaEkspor" name="III-devisaEkspor-mask" required>
								</div>
								<div class="form-group">
									<label class="form-label" for="nilaiFasilitas">Nilai Fasilitas yang diberikan (BM dan PPN/PPnBM) Tahun <?php echo (date('Y')-1)?></label>
									<input type="text" class="form-control rupiah" id="nilaiFasilitas" name="III-nilaiFasilitas-mask" required>
								</div>
							</form>
							<div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row-reverse">
								<button class="btn btn-primary waves-effect waves-themed" onclick="formValidate('#form3', 'tab-4', '#tkaTddkPr')" type="button">Berikutnya</button>
								<button class="btn btn-primary waves-effect waves-themed" onclick="back('tab-4')" type="button" style="margin-right:15px;">Sebelumnya</button>
							</div>
						</div>
						<div class="tab-pane fade" id="tab-5" role="tabpanel">
							<div class="panel-tag" style="font-size: 20px;">
								<b>BAGIAN IV DATA TENAGA KERJA</b><br>
								<ul>
									<li>
										Merupakan total seluruh tenaga keja perusahaan (baik pegawai tetap, pegawai tidak tetap, dan pegawai <i>outsourcing</i>) yang tercatat pada tanggal 31 Desember tahun <?php echo (date('Y')-1)?>.
									</li>
									<li>
										Kriteria tenaga kerja terdidik adalah tenaga kerjayang berasal dari lulusan perguruan tinggi.
									</li>
									<li>
										Kriteria tenaga kerja terlatih adalah adalah tenaga kerja yang memiliki keahlian dalam bidang tertentu dengan melalui pengalaman kerja
									</li>
									<li>
										Jika tidak termasuk dalam kedua jenis kriteria di atas, maka dikelompokkan dalam kategori tenaga kerja lainnya
									</li>
								</ul>
							</div>
							<br>
							<h2>PERIODE <?php echo (date('Y')-1)?></h2>
							<form class="needs-validation" id="form4" enctype="multipart/form-data" novalidate>
								<div class="form-group">
									<label class="form-label" for="totalTK">Total Tenaga Kerja</label>
									<input type="text" class="form-control" id="totalTK" name="IV-totalTK" required>
								</div>
								<div class="row">
									<ol type="a">
										<li>
											<label for="tkAsing">Tenaga Kerja Asing</label>
											<!-- <input type="text" class="form-control" id="tkAsing" name="tkAsing" required> -->
											<ol type="1">
												<li>
													<label for="tkaTerdidik">Tenaga Kerja Terdidik</label>
													<div class="form-group">
														<label class="form-label" for="tkaTddkPr">Tenaga Kerja Wanita</label>
														<input type="text" class="form-control" id="tkaTddkPr" name="IV-tkaTddkPr" required>
													</div>
													<div class="form-group">
														<label class="form-label" for="tkaTddkLk">Tenaga Kerja Laki-Laki</label>
														<input type="text" class="form-control" id="tkaTddkLk" name="IV-tkaTddkLk" required>
													</div>
												</li>
												<li>
													<label for="tkaTerlatih">Tenaga Kerja Terlatih</label>
													<div class="form-group">
														<label class="form-label" for="tkaTlthPr">Tenaga Kerja Wanita</label>
														<input type="text" class="form-control" id="tkaTlthPr" name="IV-tkaTlthPr" required>
													</div>
													<div class="form-group">
														<label class="form-label" for="tkaTlthLk">Tenaga Kerja Laki-Laki</label>
														<input type="text" class="form-control" id="tkaTlthLk" name="IV-tkaTlthLk" required>
													</div>
												</li>
												<li>
													<label for="tkaLainnya">Tenaga Kerja Lainnya</label>
													<div class="form-group">
														<label class="form-label" for="tkaLainPr">Tenaga Kerja Wanita</label>
														<input type="text" class="form-control" id="tkaLainPr" name="IV-tkaLainPr" required>
													</div>
													<div class="form-group">
														<label class="form-label" for="tkaLainLk">Tenaga Kerja Laki-Laki</label>
														<input type="text" class="form-control" id="tkaLainLk" name="IV-tkaLainLk" required>
													</div>
												</li>
											</ol>
										</li>
										<li> <label for="tkLokal">Tenaga Kerja Lokal</label>
											<ol type="1">
												<li>
													<label for="tklTerdidik">Tenaga Kerja Terdidik</label>
													<div class="form-group">
														<label class="form-label" for="tklTddkPr">Tenaga Kerja Wanita</label>
														<input type="text" class="form-control" id="tklTddkPr" name="IV-tklTddkPr" required>
													</div>
													<div class="form-group">
														<label class="form-label" for="tklTddkLk">Tenaga Kerja Laki-Laki</label>
														<input type="text" class="form-control" id="tklTddkLk" name="IV-tklTddkLk" required>
													</div>
												</li>
												<li>
													<label for="tklTerlatih">Tenaga Kerja Terlatih</label>
													<div class="form-group">
														<label class="form-label" for="tklTlthPr">Tenaga Kerja Wanita</label>
														<input type="text" class="form-control" id="tklTlthPr" name="IV-tklTlthPr" required>
													</div>
													<div class="form-group">
														<label class="form-label" for="tklTlthLk">Tenaga Kerja Laki-Laki</label>
														<input type="text" class="form-control" id="tklTlthLk" name="IV-tklTlthLk" required>
													</div>
												</li>
												<li>
													<label for="tklLainnya">Tenaga Kerja Lainnya</label>
													<div class="form-group">
														<label class="form-label" for="tklLainPr">Tenaga Kerja Wanita</label>
														<input type="text" class="form-control" id="tklLainPr" name="IV-tklLainPr" required>
													</div>
													<div class="form-group">
														<label class="form-label" for="tklLainLk">Tenaga Kerja Laki-Laki</label>
														<input type="text" class="form-control" id="tklLainLk" name="IV-tklLainLk" required>
													</div>
												</li>
											</ol>
										</li>
									</ol>
								</div>
							</form>
							<div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row-reverse">
								<button class="btn btn-primary waves-effect waves-themed" onclick="formValidate('#form4', 'tab-5', '#penambahanInvestasi')" type="button">Berikutnya</button>
								<button class="btn btn-primary waves-effect waves-themed" onclick="back('tab-5')" type="button" style="margin-right:15px;">Sebelumnya</button>
							</div>
						</div>
						<div class="tab-pane fade" id="tab-6" role="tabpanel">
							<div class="panel-tag" style="font-size: 20px;">
								<b>BAGIAN V DATA PENAMBAHAN INVESTASI</b><br>
								<ul>
									<li>
										Dihitung berdasarkan jumlah nilai yang digunakan perusahaan untuk melakukan penambahan barang modal meliputi pengadaan, pembuatan, pembelian barang modal baru dari dalam negeri dan barang modal  baru maupun bekas dari luar negeri (termasuk perbaikan besar, transfer atau barter barang modal). Nilai tersebut dikurangi dengan penjualan barang modal (termasuk barang modal yang ditransfer atau barter kepada pihak lain). Barang modal yang dimaksud adalah yang mempunyai umur pemakaian lebih dari satu tahun dan tidak merupakan barang konsumsi. Dapat dilihat di laporan arus kas pada laporan keuangan atau dikonfirmasi ke bagian akuntansi masing-masing.
									</li>
									<li>
										Isikan data dengan mata uang rupiah (kurs untuk tahun <?php echo (date("Y")-1)?>, 1 USD = Rp 14.294,00). Jika nilai investasi pada laporan keuangan ada nilai dibelakang koma, maka nilai investasi tersebut dituliskan dengan pembulatan ke bawah. Sebagai contoh : 1500987,80 atau 1500987,00 penulisannya dibulatkan menjadi 1500987.
									</li>
								</ul>
							</div>
							<br>
							<form class="needs-validation" id="form5" enctype="multipart/form-data" novalidate>
								<div class="form-group">
									<label class="form-label" for="penambahanInvestasi">Nilai Penambahan Investasi Tahun <?php echo (date('Y')-1)?> (Rupiah)</label>
									<input type="text" id="penambahanInvestasi" name="V-penambahanInvestasi-mask" class="form-control rupiah" autocomplete="off" required>
								</div>
								<div class="form-group">
									<label class="form-label" for="penambahanInvestasiBerjalan">Nilai Penambahan Investasi Tahun <?php echo (date('Y'))?> (Rupiah)</label>
									<input type="text" id="penambahanInvestasiBerjalan" name="V-penambahanInvestasiBerjalan-mask" class="form-control rupiah" autocomplete="off" required>
								</div>
								<div class="form-group">
									<label class="form-label" for="totalInvestasi">Nilai Total Investasi Sampai dengan Tahun <?php echo (date('Y'))?> (Rupiah)</label>
									<input type="text" id="totalInvestasi" name="V-totalInvestasi-mask" class="form-control rupiah" autocomplete="off" required>
								</div>
								<div class="form-group">
									<label class="form-label" for="bentukPenamahan">Bentuk Penambahan Investasi</label>
									<select class="form-control select2" id="bentukPenamahan" name="V-bentukPenamahan[]" multiple="multiple" required>
										<option value="Bangunan">Bangunan</option>
										<option value="Mesin dan Perlengkapan">Mesin dan Perlengkapan</option>
										<option value="Kendaraan">Kendaraan</option>
										<option value="Peralatan Lainnya">Peralatan Lainnya</option>
										<option value="Ternak dan Hasilnya">Ternak dan Hasilnya</option>
										<option value="Tanaman Buah-Buahan dan Holtikultura,atau Tanaman Lain Yang Menghasilkan Berulang">Tanaman Buah-Buahan dan Holtikultura,atau Tanaman Lain Yang Menghasilkan Berulang</option>
										<option value="Lainnya">Lainnya</option>
									</select>
								</div>
								<div class="form-group">
									<label class="form-label" for="mesinSewa">Apakah ada barang modal atau mesin-mesin yang disewa dari pihak lain? </label>
									<select class="form-control select2" id="mesinSewa" name="V-mesinSewa" required>
										<option value="Ada">Ada</option>
										<option value="Tidak">Tidak</option>
									</select>
								</div>
								<div class="form-group">
									<label class="form-label" for="bentukMesinSewa">
										Jika ada, apakah jenis barang modal atau mesin-mesin yang disewa dari pihak lain: <br>
										(Bisa Pilih lebih dari satu)
									</label>
									<select class="form-control select2" id="bentukMesinSewa" name="V-bentukMesinSewa[]" multiple="multiple">
										<option value="Bangunan">Bangunan</option>
										<option value="Mesin dan Perlengkapan">Mesin dan Perlengkapan</option>
										<option value="Kendaraan">Kendaraan</option>
										<option value="Peralatan Lainnya">Peralatan Lainnya</option>
										<option value="Lainnya">Lainnya</option>
									</select>
								</div>
							</form>
							<div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row-reverse">
								<button class="btn btn-primary waves-effect waves-themed" onclick="formValidate('#form5', 'tab-6', '#labaSebelumPajak')" type="button">Berikutnya</button>
								<button class="btn btn-primary waves-effect waves-themed" onclick="back('tab-6')" type="button" style="margin-right:15px;">Sebelumnya</button>
							</div>
						</div>
						<div class="tab-pane fade" id="tab-7" role="tabpanel">
							<div class="panel-tag" style="font-size: 20px;">
								<b>BAGIAN VI LABA SEBELUM PAJAK</b><br>
								<ul>
									<li>
										Laba / Rugi sebelum pajak dapat dilihat pada laporan keuangan atau SPT 1771 Formulir 1771-I kolom 3-Jumlah Penghasilan Neto Komersial (Tahun <?php echo (date('Y')-1)?> untuk periode laporan keuangan Januari s.d. Desember atau tahun terakhir untuk periode laporan keuangan selain Januari s.d. Desember).
									</li>
									<li>
										Jika laba, cukup tulis nominal laba dalam satuan rupiah pada bagian pengisian nilai Laba Tahun <?php echo (date('Y')-1)?>/tahun buku terakhir. Jika rugi, cukup tulis nominal rugi dalam rupiah pada bagian pengisian Rugi Tahun <?php echo (date('Y')-1)?>/tahun buku terakhir
									</li>
									<li>
										Diisi dalam mata uang rupiah dan tanpa tanda titik, tanpa tanda koma, dan tanpa lambang mata uang. Contoh: Untuk menuliskan nilai Rp. 1.500.000.000 cukup ditulis dengan 1500000000
									</li>
									<li>
										Jika nilai Laba pada laporan keuangan/SPT ada nilai dibelakang koma, maka nilai laba tersebut dituliskan dengan pembulatan ke bawah. Sebagai contoh : 1500987,80 atau 1500987,00 penulisannya dibulatkan menjadi 1500987
									</li>
									<li>
										Bila nilai masih dalam bentuk mata uang Asing, mohon dikonversi terlebih dahulu ke mata uang rupiah berdasarkan kurs tanggal 31 desember ditahun tersebut. kurs untuk tahun <?php echo (date('Y')-1)?>, 1 USD = Rp 14.294,00
									</li>
								</ul>
							</div>
							<br>
							<form class="needs-validation" id="form6" novalidate enctype="multipart/form-data">
								<div class="form-group">
									<label class="form-label" for="periodeLaporanKeuangan">Periode Laporan Keuangan</label><br>
									<label class="form-label" for="periodeLaporanKeuangan">Contoh : Januari s.d. Desember, April s.d. Maret, dll</label>
									<input type="text" class="form-control" name="VI-periodeLaporanKeuangan">
								</div>
								<div class="form-group">
									<label class="form-label" for="labaSebelumPajak">Tahun <?php echo (date('Y')-1)?> (Rupiah)</label><br>
									<label class="form-label">Apabila rugi tulis dengan angka negatif contoh -1500000000 </label>
									<input type="text" class="form-control rupiah" id="labaSebelumPajak" name="VI-labaSebelumPajak-mask">
								</div>
							</form>
							<div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row-reverse">
								<button class="btn btn-primary waves-effect waves-themed" onclick="formValidate('#form6', 'tab-7', '#pphBadan')" type="button">Berikutnya</button>
								<button class="btn btn-primary waves-effect waves-themed" onclick="back('tab-7')" type="button" style="margin-right:15px;">Sebelumnya</button>
							</div>
						</div>
						<div class="tab-pane fade" id="tab-8" role="tabpanel">
							<div class="panel-tag" style="font-size: 20px;">
								<b>BAGIAN VII PPH BADAN</b><br>
								<ul>
									<li>
										Besar PPh Badan Perusahaan adalah total PPh badan Pasal 25 dan Pasal 29, bisa dilihat d SPT pada kolom   "Total PPh terutang" (Formulir SPT 1771 Bagian B nomor 6) atau dapat juga dilihat di laporan keuangan (Tahun <?php echo (date('Y')-1)?> untuk periode laporan keuangan Januari s.d. Desember atau tahun terakhir untuk periode laporan keuangan selain Januari s.d. Desember).
									</li>
									<li>
										Diisi dalam mata uang rupiah dan tanpa tanda titik, tanpa tanda koma, dan tanpa lambang mata uang. Contoh: Untuk menuliskan nilai Rp. 1.500.000.000  ditulis 1500000000
									</li>
									<li>
										Jika nilai PPh Badan pada SPT atau laporan keuangan/SPT ada nilai dibelakang koma, maka nilai PPh Badan tersebut dituliskan dengan pembulatan ke bawah. Sebagai contoh : 1500987,80 atau 1500987,00 penulisannya dibulatkan menjadi 1500987
									</li>
									<li>
										Bila nilai masih dalam bentuk mata uang Asing, mohon dikonversi terlebih dahulu ke mata uang rupiah berdasarkan kurs tanggal 31 desember tahun <?php echo (date('Y')-1)?>.
									</li>
									<li>
										kurs untuk tahun <?php echo (date('Y')-1)?>, 1 USD = Rp 14.294,00
									</li>
								</ul>
							</div>
							<br>
							<form class="needs-validation" id="form7" novalidate enctype="multipart/form-data">
								<div class="form-group">
									<label>⮚	Nilai PPh Badan (Pasal 25/29) Tahun <?php echo (date('Y')-1)?> (Rupiah)</label>
									<input type="text" class="form-control rupiah" id="pphBadan" name="VII-pphBadan-mask" required>
								</div>
								<div class="form-group">
									<label class="form-label" for="alasanPphBadan">Apabila nilai PPh Badan nol “0”, sertakan alasannya :</label>
									<div class="custom-control custom-radio">
										<input type="radio" class="custom-control-input" id="alasanPph_1" name="VII-alasanPphBadan" value="belum lapor SPT PPh Badan">
										<label class="custom-control-label" for="alasanPph_1">belum lapor SPT PPh Badan</label>
									</div>
									<div class="custom-control custom-radio">
										<input type="radio" class="custom-control-input" id="alasanPph_2" name="VII-alasanPphBadan" value="masih dalam pemeriksaan pajak">
										<label class="custom-control-label" for="alasanPph_2">masih dalam pemeriksaan pajak</label>
									</div>
									<div class="custom-control custom-radio">
										<input type="radio" class="custom-control-input" id="alasanPph_3" name="VII-alasanPphBadan" value="mengalami kerugian pada tahun 2020">
										<label class="custom-control-label" for="alasanPph_3">mengalami kerugian pada tahun 2020</label>
									</div>
									<div class="custom-control custom-radio">
										<input type="radio" class="custom-control-input" id="alasanPph_4" name="VII-alasanPphBadan" value="Lainnya">
										<label class="custom-control-label" for="alasanPph_4">Lainnya</label>
										<input type="text" class="form-control" style="width: 40%;" name="VII-alasanPphBadan-input">
									</div>
								</div>
							</form>
							<div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row-reverse">
								<button class="btn btn-primary waves-effect waves-themed" onclick="formValidate('#form7', 'tab-8', '#pajakDaerah')" type="button">Berikutnya</button>
								<button class="btn btn-primary waves-effect waves-themed" onclick="back('tab-8')" type="button" style="margin-right:15px;">Sebelumnya</button>
							</div>
						</div>
						<div class="tab-pane fade" id="tab-9" role="tabpanel">
							<div class="panel-tag" style="font-size: 20px;">
								<b>BAGIAN VIII PERPAJAKAN</b><br>
								<ul>
									<li>
										Besar nilai pajak terkait Pajak Penghasilan (PPh Pasal 21, PPh Pasal 22, PPh Pasal 23, PPh Pasal 26, PPh Pasal 4 ayat (2) adalah total nilai pajak yang dibayar atau disetor ke kas negara dalam satu tahun di Tahun 2020 dan Semester 1 Tahun 2021 (sesuai jumlah pajak yang disetorkan dalam Surat Setoran Pajak/SSP selama tahun <?php echo (date('Y')-1)?> dan bulan Januari s.d. April <?php echo (date('Y'))?>)
									</li>
									<li>
										Besar nilai pajak terkait PPN adalah total nilai Pajak Masukan dan Pajak Keluaran dalam satu tahun di tahun <?php echo (date('Y')-1)?> dan Semester 1 Tahun <?php echo (date('Y'))?> (dapat dilihat pada kolom SPT Masa Januari s.d. Desember <?php echo (date('Y')-1)?> dan Masa Januari s.d. April <?php echo (date('Y'))?>) dan total Nilai PPN Kurang/Lebih Bayar tahun <?php echo (date('Y')-1)?> dan Semester  1 Tahun <?php echo (date('Y'))?> (sesuai jumlah PPN yang disetorkan dalam Surat Setoran Pajak/SSP selama tahun <?php echo (date('Y')-1)?> dan bulan Januari s.d. April <?php echo (date('Y'))?>)
									</li>
									<li>
										Nilai Pajak bumi dan bangunan adalah total nilai PBB selain yang termasuk pajak daerah antara lain PBB Kehutanan, Pertambangan, dll.
									</li>
									<li>
										Diisi dalam mata uang rupiah dan tanpa tanda titik, tanpa tanda koma, dan tanpa lambang mata uang. Contoh: Untuk menuliskan nilai Rp. 1.500.000.000  ditulis 1500000000
									</li>
								</ul>
							</div>
							<br>
							<form class="needs-validation" id="form14" novalidate enctype="multipart/form-data">
								<div class="form-group">
									<label class="form-label">PPh Pasal 21</label><br>
									<label class="form-label" for="pph21Y1">Tahun <?php echo (date('Y')-1)?> (Rupiah)</label>
									<input type="text" class="form-control rupiah" id="pph21Y1" name="VIII-pph21Y1-mask"><br>
									<label class="form-label" for="pph21Y0">Tahun <?php echo (date('Y'))?> (Rupiah)</label>
									<input type="text" class="form-control rupiah" id="pph21Y0" name="VIII-pph21Y0-mask">
								</div>
								<div class="form-group">
									<label class="form-label">PPh Pasal 22</label><br>
									<label class="form-label" for="pph22Y1">Tahun <?php echo (date('Y')-1)?> (Rupiah)</label>
									<input type="text" class="form-control rupiah" id="pph22Y1" name="VIII-pph22Y1-mask"><br>
									<label class="form-label" for="pph22Y0">Tahun <?php echo (date('Y'))?> (Rupiah)</label>
									<input type="text" class="form-control rupiah" id="pph22Y0" name="VIII-pph22Y0-mask">
								</div>
								<div class="form-group">
									<label class="form-label">PPh Pasal 22 Selain Dalam Rangka Impor</label><br>
									<label class="form-label" for="pph22Y1nonImpor">Tahun <?php echo (date('Y')-1)?> (Rupiah)</label>
									<input type="text" class="form-control rupiah" id="pph22Y1nonImpor" name="VIII-pph22Y1nonImpor-mask"><br>
									<label class="form-label" for="pph22Y0nonImpor">Tahun <?php echo (date('Y'))?> (Rupiah)</label>
									<input type="text" class="form-control rupiah" id="pph22Y0nonImpor" name="VIII-pph22Y0nonImpor-mask">
								</div>
								<div class="form-group">
									<label class="form-label">PPh Pasal 23</label><br>
									<label class="form-label" for="pph23Y1">Tahun <?php echo (date('Y')-1)?> (Rupiah)</label>
									<input type="text" class="form-control rupiah" id="pph23Y1" name="VIII-pph23Y1-mask"><br>
									<label class="form-label" for="pph23Y0">Tahun <?php echo (date('Y'))?> (Rupiah)</label>
									<input type="text" class="form-control rupiah" id="pph23Y0" name="VIII-pph23Y0-mask">
								</div>
								<div class="form-group">
									<label class="form-label">PPh Pasal 26</label><br>
									<label class="form-label" for="pph26Y1">Tahun <?php echo (date('Y')-1)?> (Rupiah)</label>
									<input type="text" class="form-control rupiah" id="pph26Y1" name="VIII-pph26Y1-mask"><br>
									<label class="form-label" for="pph26Y0">Tahun <?php echo (date('Y'))?> (Rupiah)</label>
									<input type="text" class="form-control rupiah" id="pph26Y0" name="VIII-pph26Y0-mask">
								</div>
								<div class="form-group">
									<label class="form-label">PPh Pasal 4 Ayat 2</label><br>
									<label class="form-label" for="pph42Y1">Tahun <?php echo (date('Y')-1)?> (Rupiah)</label>
									<input type="text" class="form-control rupiah" id="pph42Y1" name="VIII-pph42Y1-mask"><br>
									<label class="form-label" for="pph42Y0">Tahun <?php echo (date('Y'))?> (Rupiah)</label>
									<input type="text" class="form-control rupiah" id="pph42Y0" name="VIII-pph42Y0-mask">
								</div>
								<div class="form-group">
									<label class="form-label">PPN Masukan</label><br>
									<label class="form-label" for="ppnMasukan1">Tahun <?php echo (date('Y')-1)?> (Rupiah)</label>
									<input type="text" class="form-control rupiah" id="ppnMasukan1" name="VIII-ppnMasukan1-mask"><br>
									<label class="form-label" for="ppnMasukan0">Tahun <?php echo (date('Y'))?> (Rupiah)</label>
									<input type="text" class="form-control rupiah" id="ppnMasukan0" name="VIII-ppnMasukan0-mask">
								</div>
								<div class="form-group">
									<label class="form-label">PPN Keluaran</label><br>
									<label class="form-label" for="ppnKeluaran1">Tahun <?php echo (date('Y')-1)?> (Rupiah)</label>
									<input type="text" class="form-control rupiah" id="ppnKeluaran1" name="VIII-ppnKeluaran1-mask"><br>
									<label class="form-label" for="ppnKeluaran0">Tahun <?php echo (date('Y'))?> (Rupiah)</label>
									<input type="text" class="form-control rupiah" id="ppnKeluaran0" name="VIII-ppnKeluaran0-mask">
								</div>
								<div class="form-group">
									<label class="form-label">PPN Kurang / Lebih Bayar</label><br>
									<label class="form-label"><b>jika lebih bayar mohon didahului dengan tanda minus “-“</b></label><br>
									<label class="form-label" for="ppnSelisih1">Tahun <?php echo (date('Y')-1)?> (Rupiah)</label>
									<input type="text" class="form-control rupiah" id="ppnSelisih1" name="VIII-ppnSelisih1-mask"><br>
									<label class="form-label" for="ppnSelisih0">Tahun <?php echo (date('Y'))?> (Rupiah)</label>
									<input type="text" class="form-control rupiah" id="ppnSelisih0" name="VIII-ppnSelisih0-mask">
								</div>
								<div class="form-group">
									<label class="form-label">PBB (Pajak Bumi dan Bangunan)</label><br>
									<label class="form-label" for="pbb1">Tahun <?php echo (date('Y')-1)?> (Rupiah)</label>
									<input type="text" class="form-control rupiah" id="pbb1" name="VIII-pbb1-mask"><br>
									<label class="form-label" for="pbb0">Tahun <?php echo (date('Y'))?> (Rupiah)</label>
									<input type="text" class="form-control rupiah" id="pbb0" name="VIII-pbb0-mask">
								</div>
							</form>
							<div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row-reverse">
								<button class="btn btn-primary waves-effect waves-themed" onclick="formValidate('#form14', 'tab-9', '#pajakDaerah')" type="button">Berikutnya</button>
								<button class="btn btn-primary waves-effect waves-themed" onclick="back('tab-9')" type="button" style="margin-right:15px;">Sebelumnya</button>
							</div>
						</div>
						<div class="tab-pane fade" id="tab-10" role="tabpanel">
							<div class="panel-tag" style="font-size: 20px;">
								<b>BAGIAN IX PENGELUARAN</b><br>
								<ul>
									<li>
										Bila nilai masih dalam bentuk mata uang Asing, mohon dikonversi terlebih dahulu ke mata uang rupiah berdasarkan kurs tanggal 31 desember tahun <?php echo (date('Y')-1)?>.
									</li>
									<li>
										kurs untuk tahun <?php echo (date('Y')-1)?>, 1 USD = Rp 13.901,00
									</li>
								</ul>
							</div>
							<br>
							<form class="needs-validation" id="form8" novalidate enctype="multipart/form-data">
								<div class="form-group">
									<label class="form-label" for="pajakDaerah">Total pengeluaran perusahaan untuk pajak daerah dan retribusi daerah</label>
									<input type="text" class="form-control rupiah" id="pajakDaerah" name="IX-pajakDaerah-mask" required>
									<span>jenis-jenis pajak daerah dan retribusi daerah dapat dilihat pada link berikut: <a href="http://bit.ly/JenisPDRD" target="_blank">http://bit.ly/JenisPDRD</a></span>
								</div>
								<div class="form-group">
									<label class="form-label" for="bebanUpah">Beban Upah/Gaji Tahun (<?php echo date('Y')-1?>)</label> <br>
									<label class="form-label">Meliputi beban gaji yang dikeluarkan perusahaan yang tercatat dalam laporan keuangan</label>
									<input type="text" class="form-control rupiah" id="bebanUpah" name="IX-bebanUpah-mask" required>
								</div>
								<div class="form-group">
									<label class="form-label" for="depresiasi">Depresiasi atau Penyusutan Tahun (<?php echo date('Y')-1?>)</label> <br>
									<label class="form-label">Meliputi beban depresiasi yang dikeluarkan perusahaan yang tercatat dalam laporan keuangan</label>
									<input type="text" class="form-control rupiah" id="depresiasi" name="IX-depresiasi-mask" required>
								</div>
								<div class="form-group">
									<label class="form-label" for="pajakTidakLangsung">Pajak Tidak Langsung Tahun (<?php echo date('Y')-1?>)</label> <br>
									<p>Cukup tuliskan total dari pajak tidak langsung.
										Pajak tidak langsung adalah pajak yang dikenakan kepada wajib pajak pada saat tertentu / terjadi suatu peristiwa kena pajak seperti misalnya pajak pertambahan nilai (PPN), pajak bea balik nama kendaraan bermotor (BBNKB), PPN, PPn-BM/pajak penjualan atas barang mewah , BeaMaterai(BM), Cukai, Bea Masuk dll. <br>
									Isikan dengan mata uang rupiah (kurs untuk tahun 2019, 1 USD = Rp 13.901)</p>
									<input type="text" class="form-control rupiah" id="pajakTidakLangsung" name="IX-pajakTidakLangsung-mask" required>
								</div>
							</form>
							<div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row-reverse">
								<button class="btn btn-primary waves-effect waves-themed" onclick="formValidate('#form8', 'tab-10', '#jaringanFasilitas')" type="button">Berikutnya</button>
								<button class="btn btn-primary waves-effect waves-themed" onclick="back('tab-10')" type="button" style="margin-right:15px;">Sebelumnya</button>
							</div>
						</div>
						<div class="tab-pane fade" id="tab-11" role="tabpanel">
							<div class="panel-tag" style="font-size: 20px;">
								<b>BAGIAN X JARINGAN INDUSTRI</b><br>
								<br>
								<p>Adalah jumlah jaringan industri yang terbentuk dari:</p> <br>
								<p>Perusahaan yang memiliki keterkaitan bisnis seperti vendor, distributor, cabang/anak peruahaan dan sejenisnya, meliputi: </p> <br>
								<ul>
									<li>Perusahaan penerima Fasilitas  Kawasan Berikat / KITE/ KITE IKM.</li>
									<li>Perusahaan Non Fasilitas Kawasan Berikat / KITE/ KITE IKM.</li>
								</ul>
							</div>
							<br>
							<form class="needs-validation" id="form9" novalidate enctype="multipart/form-data">
								<div class="form-group">
									<label class="form-label" for="jaringanFasilitas">Jumlah perusahaan yang memiliki keterkaitan yang merupakan Penerima Fasilitas Kawasan Berikat / KITE / KITE IKM Tahun <?php echo date('Y')-1?></label>
									<input type="text" class="form-control" id="jaringanFasilitas" name="X-jaringanFasilitas" required>
								</div>
								<div class="form-group">
									<label class="form-label" for="detailJaringanFasilitas">Tuliskan Nama perusahaan Terkait </label>
									<select class="form-control select2 multi-select" id="detailjaringanFasilitas" name="X-detailjaringanFasilitas[]" multiple="multiple"></select>
								</div>
								<br>
								<br>
								<div class="form-group">
									<label class="form-label" for="jaringanNonFasilitas">Jumlah perusahaan yang memiliki keterkaitan yang merupakan Non penerima Fasilitas Kawasan Berikat / KITE / KITE IKM Tahun <?php echo date('Y')-1?></label>
									<input type="text" class="form-control" id="jaringanNonFasilitas" name="X-jaringanNonFasilitas" required>
								</div>
								<div class="form-group">
									<label class="form-label" for="detailjaringanNonFasilitas">Tuliskan Nama perusahaan Terkait </label>
									<select class="form-control select2 multi-select" id="detailjaringanNonFasilitas" name="X-detailjaringanNonFasilitas[]" multiple="multiple"></select>
								</div>
								<div class="form-group">
									<label class="form-label">Tenaga Kerja Seluruh Jaringan Industri Non Penerima Fasilitas:</label><br>	
									<label class="form-label">Contoh: </label>
									<p style="text-align: center;">Data Tenaga Kerja Jaringan Industri Non Penerima Fasilitas KB dan KITE / KITE IKM <br>
									(vendor, distributor, cabang/anak perusahaan, subkon)</p>
									<div class="row">
										<div class="col-xl-2"></div>
										<div class="col-xl-8 d-flex justify-content-center">
											<table class="table table-bordered table-striped table-responsive" style="width: 100%; align-content: center;">
												<thead>
													<th style="width: 5%">No</th>
													<th style="width: 35%">Nama Perusahaan</th>
													<th style="width: 35%">NPWP</th>
													<th style="width: 25%">Jumlah Tenaga Kerja</th>
												</thead>
												<tbody>
													<tr>
														<td>1</td>
														<td>PT A</td>
														<td>123456789012345</td>
														<td>10</td>
													</tr>
													<tr>
														<td>2</td>
														<td>PT B</td>
														<td>123456789012345</td>
														<td>20</td>
													</tr>
													<tr>
														<td>3</td>
														<td>PT C</td>
														<td>123456789012345</td>
														<td>100</td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="col-xl-2"></div>
									</div>
									<div class="row">
										<div class="col-xl-2"></div>
										<div class="col-xl-8">
											<div class="row">
												<table class="table table-bordered table-striped table-responsive" style="width: 100%; align-content: center;" id="tableDtJr">
													<thead>
														<th style="width: 5%">No</th>
														<th style="width: 35%">Nama Perusahaan</th>
														<th style="width: 35%">NPWP</th>
														<th style="width: 25%">Jumlah Tenaga Kerja</th>
													</thead>
													<tbody>
													</tbody>
												</table>
												<br>
												<table>
													<tbody class="table table-bordered table-striped table-responsive" style="width: 818px; align-content: center;" id="tableDtJrInput">
														<tr>
															<td style="width: 5%">NO</td>
															<td style="width: 35%;"><input type="text" class="form-control" name="X-dtJr-nama"></td>
															<td style="width: 35%;"><input type="text" class="form-control npwp-jaringan" name="X-dtJr-npwp"></td>
															<td style="width: 25%;"><input type="text" class="form-control" name="X-dtJr-jumlah"></td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="row flex-row-reverse">
												<div class="col-xl-2"><button class="btn btn-primary" type="button" onclick="addRow()" style="width: 100px;">Tambah Data</button></div>
												<div class="col-xl-2"><button class="btn btn-primary" type="button" onclick="deleteRow()" style="width: 100px;">Hapus Data</button></div>
											</div>
										</div>
									</div>
								</div>
							</form>
							<div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row-reverse">
								<button class="btn btn-primary waves-effect waves-themed" onclick="formValidate('#form9', 'tab-11', '#dagangRumah')" type="button">Berikutnya</button>
								<button class="btn btn-primary waves-effect waves-themed" onclick="back('tab-11')" type="button" style="margin-right:15px;">Sebelumnya</button>
							</div>
						</div>
						<div class="tab-pane fade" id="tab-12" role="tabpanel">
							<div class="panel-tag" style="font-size: 20px;">
								<b>BAGIAN XI PELAKU USAHA</b><br>
								<p>
									MERUPAKAN JUMLAH PELAKU USAHA / UNIT USAHA DI TAHUN 2019
									Dikelompokkan ke dalam kategori industri rumah tangga, kecil, sedang dan besar berdasarkan jumlah tenaga kerja dengan merujuk pada klasifikasi industri pada Surat Keputusan Menteri Perindustrian Indonesia No.19/M/I/1986 sebagai berikut:
								</p>
								<table class="table table-responsive table-striped table-bordered" style="width: 100%;">
									<thead>
										<th style="width: 10%;">No</th>
										<th style="width: 45%;">Klasifikasi pelaku/unit usaha</th>
										<th style="width: 45%;">Jumlah Tenaga Kerja</th>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Rumah Tangga</td>
											<td>1-4 Orang</td>
										</tr>
										<tr>
											<td>2</td>
											<td>Kecil</td>
											<td>5-19 Orang</td>
										</tr>
										<tr>
											<td>3</td>
											<td>Sedang</td>
											<td>20-99 Orang</td>
										</tr>
										<tr>
											<td>4</td>
											<td>Besar</td>
											<td>100 Orang atau lebih</td>
										</tr>
									</tbody>
								</table>
							</div>
							<br>
							<form class="needs-validation" id="form10" novalidate enctype="multipart/form-data">
								<div class="form-group">
									<label class="form-label">Jumlah pelaku usaha / unit usaha lain di bidang  perdagangan:</label> <br><br>
									<h3>Diisikan dengan Jumlah pelaku usaha / unit usaha dalam jarak 2 km disekitar perusahaan yang muncul karena adanya perusahaan Anda di bidang perdagangan seperti minimarket, toko  kelontong, warung dan sejenisnya.</h3>
									<br>
									<label class="form-label">Rumah Tangga</label>
									<input type="text" class="form-control" id="dagangRumah" name="XI-dagangRumah" required>
									<br>
									<label class="form-label">Kecil</label>
									<input type="text" class="form-control" id="dagangKecil" name="XI-dagangKecil" required>
									<br>
									<label class="form-label">Sedang</label>
									<input type="text" class="form-control" id="dagangSedang" name="XI-dagangSedang" required>
									<br>
									<label class="form-label">Besar</label>
									<input type="text" class="form-control" id="dagangBesar" name="XI-dagangBesar" required>
								</div>
								<div class="form-group">
									<label class="form-label">Jumlah  pelaku usaha / unit usaha lain dibidang Akomodasi:</label> <br><br>
									<h3>Diisikan dengan pelaku usaha / unit usaha dalam lingkup kecamatan disekitar perusahaan yang muncul karena adanya perusahaan Anda termasuk hotel, apartemen, kontrakan, kos-kosan dan sejenisnya.</h3>
									<br>
									<label class="form-label">Rumah Tangga</label>
									<input type="text" class="form-control" id="akomodasiRumah" name="XI-akomodasiRumah" required>
									<br>
									<label class="form-label">Kecil</label>
									<input type="text" class="form-control" id="akomodasiKecil" name="XI-akomodasiKecil" required>
									<br>
									<label class="form-label">Sedang</label>
									<input type="text" class="form-control" id="akomodasiSedang" name="XI-akomodasiSedang" required>
									<br>
									<label class="form-label">Besar</label>
									<input type="text" class="form-control" id="akomodasiBesar" name="XI-akomodasiBesar" required>
								</div>
								<div class="form-group">
									<label class="form-label">Jumlah pelaku usaha / unit usaha di bidang makanan:</label> <br><br>
									<h3>Diisikan dengan jumlah pelaku usaha / unit usaha dalam jarak 1 km di sekitar perusahaan yang muncul karena adanya perusahaan Anda di bidang makanan seperti warteg, rumah makan, restoran dan lainnya.</h3>
									<br>
									<label class="form-label">Rumah Tangga</label>
									<input type="text" class="form-control" id="makananRumah" name="XI-makananRumah" required>
									<br>
									<label class="form-label">Kecil</label>
									<input type="text" class="form-control" id="makananKecil" name="XI-makananKecil" required>
									<br>
									<label class="form-label">Sedang</label>
									<input type="text" class="form-control" id="makananSedang" name="XI-makananSedang" required>
									<br>
									<label class="form-label">Besar</label>
									<input type="text" class="form-control" id="makananBesar" name="XI-makananBesar" required>
								</div>
								<div class="form-group">
									<label class="form-label">Jumlah pelaku usaha / unit usaha di bidang Transportasi:</label> <br><br>
									<h3>Diisikan dengan jumlah pelaku usaha / unit usaha yang memiliki rute di sekitar perusahaan yang muncul karena adanya perusahaan Anda seperti ojek, angkot, sewa mobil dan sejenisnya yang beroperasi di sekitar pabrik.</h3>
									<br>
									<label class="form-label">Rumah Tangga</label>
									<input type="text" class="form-control" id="transportRumah" name="XI-transportRumah" required>
									<br>
									<label class="form-label">Kecil</label>
									<input type="text" class="form-control" id="transportKecil" name="XI-transportKecil" required>
									<br>
									<label class="form-label">Sedang</label>
									<input type="text" class="form-control" id="transportSedang" name="XI-transportSedang" required>
									<br>
									<label class="form-label">Besar</label>
									<input type="text" class="form-control" id="transportBesar" name="XI-transportBesar" required>
								</div>
							</form>
							<div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row-reverse">
								<button class="btn btn-primary waves-effect waves-themed" onclick="formValidate('#form10', 'tab-12', '#umum1')" type="button">Berikutnya</button>
								<button class="btn btn-primary waves-effect waves-themed" onclick="back('tab-12')" type="button" style="margin-right:15px;">Sebelumnya</button>
							</div>
						</div>
						<div class="tab-pane fade" id="tab-13" role="tabpanel">
							<div class="panel-tag" style="font-size: 20px;">
								<b>BAGIAN XII PERTANYAAN UMUM</b><br>
							</div>
							<br>
							<form class="needs-validation" id="form11" novalidate enctype="multipart/form-data">
								<div class="form-group">
									<label class="form-label" for="umum1">1. Fasilitas KB / KITE / KITE IKM memberikan manfaat yang signifikan bagi perusahaan</label>
									<select class="form-control select2" name="XII-umum1" required>
										<option value="Sangat Setuju">Sangat Setuju</option>
										<option value="Setuju">Setuju</option>
										<option value="Netral">Netral</option>
										<option value="Tidak Setuju">Tidak Setuju</option>
										<option value="Sangat Tidak Setuju">Sangat Tidak Setuju</option>
									</select>
									<br>
									<label class="form-label" for="jelasUmum1">Jelaskan Alasan Jawaban anda pada pertanyaan sebelumnya:</label>
									<textarea class="form-control" rows="3" name="XII-umum1-jelas" required></textarea>
								</div>
								<div class="form-group">
									<label class="form-label" for="umum2">2. Berapa persen efisiensi biaya yang diperoleh perusahaan dari pemanfaatan Fasilitas KB/ KITE/ KITE IKM ?</label>
									<br>
									<label class="form-label">(Dihitung dengan cara membandingkan: Biaya produksi (HPP) perusahaan jika menggunakan fasilitas : Biaya produksi (HPP) perusahaan jika tidak menggunakan fasilitas)</label>
									<table style="width: 55%;">
										<tr>
											<td>a</td>
											<td style="width: 50%;">a. Biaya produksi (HPP) jika menggunakan fasilitas = </td>
											<td style="width: 45%;"><input type="text" class="form-control rupiah" name="XII-umum2-a-mask" required></td>
										</tr>
										<tr>
											<td>b</td>
											<td style="width: 50%;">b. Biaya produksi (HPP) jika tidak menggunakan fasilitas =</td>
											<td style="width: 45%;"><input type="text" class="form-control rupiah" name="XII-umum2-b-mask" required></td>
										</tr>
										<tr>
											<td>c</td>
											<td style="width: 50%;">c. Perbandingan (a:b)x100% = </td>
											<td style="width: 45%;"><input type="text" class="form-control persen" name="XII-umum2-c-mask" required></td>
										</tr>
									</table>
								</div>
								<div class="form-group">
									<label class="form-label" for="umum3">3. Apakah dampak bagi perusahaan jika fasilitas kepabeanan dihilangkan oleh pemerintah? (bisa memilih lebih dari satu jawaban)</label>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum3_1" name="XII-umum3[]" value="Persaingan usaha terutama di tingkat international semakin sulit">
										<label class="custom-control-label" for="umum3_1">Persaingan usaha terutama di tingkat international semakin sulit</label>
									</div>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum3_2" name="XII-umum3[]" value="Laba perusahaan menurun">
										<label class="custom-control-label" for="umum3_2">Laba perusahaan menurun</label>
									</div>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum3_3" name="XII-umum3[]" value="Beban produksi meningkat">
										<label class="custom-control-label" for="umum3_3">Beban produksi meningkat</label>
									</div>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum3_4" name="XII-umum3[]" value="Arus barang keluar masuk terhambat">
										<label class="custom-control-label" for="umum3_4">Arus barang keluar masuk terhambat</label>
									</div>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum3_5" name="XII-umum3[]" value="Tidak memberikan dampak bagi bisnis perusahaan">
										<label class="custom-control-label" for="umum3_5">Tidak memberikan dampak bagi bisnis perusahaan</label>
									</div>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum3_6" name="XII-umum3[]" value="Lainnya">
										<label class="custom-control-label" for="umum3_6">Lainnya</label>
									</div>
									<textarea class="form-control" rows="3" id="umum3" name="XII-umum3-input"></textarea>
								</div>
								<div class="form-group">
									<label class="form-label" for="umum4">4. Apakah yang akan dilakukan perusahaan jika fasilitas kepabeanan dihilangkan oleh pemerintah?  (bisa memilih lebih dari satu jawaban)</label>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum4_2" name="XII-umum4[]" value="Perusahaan akan mengurangi jumlah pegawai">
										<label class="custom-control-label" for="umum4_2">Perusahaan akan mengurangi jumlah pegawai</label>
									</div>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum4_3" name="XII-umum4[]" value="Perusahaan menutup usaha">
										<label class="custom-control-label" for="umum4_3">Perusahaan menutup usaha</label>
									</div>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum4_4" name="XII-umum4[]" value="Perusahaan memindahkan usahanya ke negara lain">
										<label class="custom-control-label" for="umum4_4">Perusahaan memindahkan usahanya ke negara lain</label>
									</div>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum4_5" name="XII-umum4[]" value="Perusahaan akan tetap melanjutkan usaha di Indonesia">
										<label class="custom-control-label" for="umum4_5">Perusahaan akan tetap melanjutkan usaha di Indonesia</label>
									</div>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum4_6" name="XII-umum4[]" value="Lainnya">
										<label class="custom-control-label" for="umum4_6">Lainnya</label>
									</div>
									<textarea class="form-control" rows="3" id="umum4" name="XII-umum4-input"></textarea>
								</div>
								<div class="form-group">
									<label class="form-label" for="umum5">5. Negara manakah yang akan menjadi pilihan perusahaan untuk memindahkan usaha jika faslitas kepabeanan dihilangkan oleh pemerintah?</label>
									<select class="form-control select2" name="XII-umum5" required>
										
									</select>
									<br>
									<label class="form-label">Jelaskan alasan pilihan negara tersebut </label>
									<textarea class="form-control" rows="3" id="jelasUmum5" name="XII-umum5-jelas" required></textarea>
									<br>
									<label class="form-label">Apa kelebihan negara tersebut dibandingkan Indonesia?</label>
									<textarea class="form-control" rows="3" name="XII-umum5-kelebihan" required></textarea>
								</div>
								<div class="form-group">
									<label class="form-label" for="umum6">6. Apakah perusahaan berencana untuk melakukan ekspansi ke luar Jawa?</label>
									<select class="form-control select2" name="XII-umum6-select" required>
										<option value="Ya">Ya</option>
										<option value="Tidak">Tidak</option>
									</select>
									<br>
									<label class="form-label">Jelaskan alasan pilihan anda</label><br>
									<label class="form-label">Jika Ya, sebutkan alasannya (bisa pilih lebih dari satu):</label><br>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum6_2" name="XII-umum6[]" value="Adanya potensi pasar di luar Jawa">
										<label class="custom-control-label" for="umum6_2">Adanya potensi pasar di luar Jawa</label>
									</div>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum6_3" name="XII-umum6[]" value="Kemudahan memperoleh bahan baku di luar Jawa">
										<label class="custom-control-label" for="umum6_3">Kemudahan memperoleh bahan baku di luar Jawa</label>
									</div>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum6_4" name="XII-umum6[]" value="Kompetitor di luar Jawa masih sedikit">
										<label class="custom-control-label" for="umum6_4">Kompetitor di luar Jawa masih sedikit</label>
									</div>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum6_5" name="XII-umum6[]" value="Akses yang lebih mudah jika perusahaan berada di luar Jawa">
										<label class="custom-control-label" for="umum6_5">Akses yang lebih mudah jika perusahaan berada di luar Jawa</label>
									</div>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum6_6" name="XII-umum6[]" value="Lainnya">
										<label class="custom-control-label" for="umum6_6">Lainnya</label>
									</div>
									<textarea class="form-control" rows="3" id="jelasUmum6" name="XII-umum6-jelas-ya"></textarea>
									<br>
									<br>
									<label class="form-label">Jika Tidak, sebutkan alasannya (bisa pilih lebih dari satu):</label><br>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum6_7" name="XII-umum6[]" value="Perusahaan memang sudah berlokasi di luar Jawa">
										<label class="custom-control-label" for="umum6_7">Perusahaan memang sudah berlokasi di luar Jawa</label>
									</div>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum6_8" name="XII-umum6[]" value="Biaya yang dibutuhkan untuk ekspansi ke luar Jawa sangat besar">
										<label class="custom-control-label" for="umum6_8">Biaya yang dibutuhkan untuk ekspansi ke luar Jawa sangat besar</label>
									</div>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum6_9" name="XII-umum6[]" value="Tidak ada potensi pasar di luar Jawa">
										<label class="custom-control-label" for="umum6_9">Tidak ada potensi pasar di luar Jawa</label>
									</div>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum6_10" name="XII-umum6[]" value="Tidak ada akses yang memadai di luar Jawa">
										<label class="custom-control-label" for="umum6_100">Tidak ada akses yang memadai di luar Jawa</label>
									</div>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum6_11" name="XII-umum6[]" value="Lainnya">
										<label class="custom-control-label" for="umum6_11">Lainnya</label>
									</div>
									<textarea class="form-control" rows="3" id="jelasUmum6" name="XII-umum6-jelas-tidak"></textarea>
								</div>
								<div class="form-group">
									<label class="form-label" for="umum7">7. Menurut Anda, jenis fasilitas kepabeanan apa yang dapat mendorong perusahaan untuk ekspansi ke Luar Jawa? (dapat memilih lebih dari satu jawaban)</label>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum7_1" name="XII-umum7[]" value="Kawasan Berikat">
										<label class="custom-control-label" for="umum7_1">Kawasan Berikat</label>
									</div>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum7_2" name="XII-umum7[]" value="Pusat Logistik Berikat">
										<label class="custom-control-label" for="umum7_2">Pusat Logistik Berikat</label>
									</div>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum7_3" name="XII-umum7[]" value="Gudang Berikat">
										<label class="custom-control-label" for="umum7_3">Gudang Berikat</label>
									</div>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum7_4" name="XII-umum7[]" value="Kemudahan Impor Tujuan Ekspor">
										<label class="custom-control-label" for="umum7_4">Kemudahan Impor Tujuan Ekspor</label>
									</div>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum7_5" name="XII-umum7[]" value="Tidak Ada">
										<label class="custom-control-label" for="umum7_5">Tidak Ada</label>
									</div>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum7_6" name="XII-umum7[]" value="Lainnya">
										<label class="custom-control-label" for="umum7_6">Lainnya</label>
									</div>
									<textarea class="form-control" rows="3" id="umum7" name="XII-umum7-input"></textarea>
								</div>
								<div class="form-group">
									<label class="form-label" for="umum8">8. (Khusus Perusahaan KITE Pengembalian) </label>
									<br>
									<label class="form-label">a. Berapa persentase scrap/waste atas seluruh hasil produksi?</label>
									<input class="form-control persen" id="umum8-a" name="XII-umum8-a-mask">
									<label class="form-label">b. Terkait pertanyaan 8a, berapa persentase scrap/waste yang sudah tidak dapat dimanfaatkan/dijual?</label>
									<input class="form-control persen" id="umum8-b" name="XII-umum8-b-mask">
									<label class="form-label">c. Terkait kondisi pada poin 8b, Apa pendapat Anda apabila atas scrap/waste tersebut mendapat fasilitas pengembalian KITE? Berikan alasannya!</label>
									<textarea class="form-control" rows="3" id="umum8-c" name="XII-umum8-c"></textarea>
								</div>
								<div class="form-group">
									<label class="form-label" for="umum9">9. Kendala apa saja yang dihadapi perusahaan dalam pemanfaatan fasilitas KB atau KITE / KITE IKM?</label>
									<textarea class="form-control" rows="3" id="umum9" name="XII-umum9" required></textarea>
								</div>
								<div class="form-group">
									<label class="form-label" for="umum10">10. Apakah terdapat ketentuan saat ini yang tidak efektif dalam penerapannya di lapangan? Sebutkan!</label>
									<textarea class="form-control" rows="3" id="umum10" name="XII-umum10" required></textarea>
								</div>
								<div class="form-group">
									<label class="form-label" for="umum11">11. Apa saran anda untuk perbaikan Fasilitas KB atau KITE / KITE IKM kedepannya?</label>
									<textarea class="form-control" rows="3" id="umum11" name="XII-umum11" required></textarea>
								</div>
								<div class="form-group">
									<label class="form-label" for="umum12">12. Hal apa yang diperlukan oleh perusahaan saat ini untuk mendukung kinerja perusahaan terutama dalam peningkatan ekspor ? (bisa dipilih lebih dari 1 jawaban)</label>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum12_1" name="XII-umum12[]" value="0">
										<label class="custom-control-label" for="umum12_1">Penambahan insentif fiskal berupa :</label>
										<textarea type="text" id="umum12_1-input" name="XII-umum12-1" style="width: 30%;"></textarea>
									</div>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum12_2" name="XII-umum12[]" value="1">
										<label class="custom-control-label" for="umum12_2">Kemudahan perizinan berupa :</label>
										<textarea type="text" id="umum12_2-input" name="XII-umum12-2" style="width: 30%;"></textarea>
									</div>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum12_3" name="XII-umum12[]" value="2">
										<label class="custom-control-label" for="umum12_3">Pembiayaan</label>
									</div>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum12_4" name="XII-umum12[]" value="3">
										<label class="custom-control-label" for="umum12_4">Pemasaran di luar negeri</label>
									</div>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="umum12_5" name="XII-umum12[]" value="4">
										<label class="custom-control-label" for="umum12_5">Lainnya</label>
										<textarea type="text" id="umum12_5-input" name="XII-umum12-5" style="width: 30%;"></textarea>
									</div>
								</div>
							</form>
							<div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row-reverse">
								<button class="btn btn-primary waves-effect waves-themed" onclick="formValidate('#form11', 'tab-13')" type="button">Berikutnya</button>
								<button class="btn btn-primary waves-effect waves-themed" onclick="back('tab-13')" type="button" style="margin-right:15px;">Sebelumnya</button>
							</div>
						</div>
						<div class="tab-pane fade" id="tab-14" role="tabpanel">
							<div class="panel-tag" style="font-size: 20px;">
								<b>PERMINTAAN FOTO LOKASI PERUSAHAAN</b><br>
							</div>
							<div class="col-xl-12">
								<table class="table table-responsive" style="width: 100%;">
									<tbody style="width: 100%;">
										<form id="form12" class="needs-validation" novalidate enctype="multipart/form-data">
											<tr>
												<td style="width: 40%">
													<label class="form-label" for="tampakDepan">Foto Tampak Depan Perusahaan</label>
													<input type="file" accept="image/png, image/jpeg" class="form-control form-control-lg" id="tampakDepan" name="foto-tampakDepan" required>
												</td>
												<td style="width: 60%">
													<label class="form-label" id="contoh">CONTOH: </label>
													<img id="foto-tampakDepan" style="width: 100%;" src="assets/img/contoh.png">
												</td>
											</tr>
											<tr>
												<td style="width: 40%">
													<label class="form-label" for="lineProduksi">Foto Line Produksi</label>
													<input type="file" accept="image/png, image/jpeg" class="form-control form-control-lg" id="lineProduksi" name="foto-produksi" required>
												</td>
												<td style="width: 60%">
													<img id="foto-produksi" style="width: 100%;" src="">
												</td>
											</tr>
											<tr>
												<td style="width: 40%">
													<label class="form-label" for="bahanBaku">Foto Gudang Bahan Baku</label>
													<input type="file" accept="image/png, image/jpeg" class="form-control form-control-lg" id="bahanBaku" name="foto-bahanBaku" required>
												</td>
												<td style="width: 60%">
													<img id="foto-bahanBaku" style="width: 100%;" src="">
												</td>
											</tr>
										</form>
									</tbody>
								</table>
							</div>
							<div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row-reverse">
								<button class="btn btn-primary waves-effect waves-themed" onclick="formValidate('#form12', 'tab-14')" type="button">Berikutnya</button>
								<button class="btn btn-primary waves-effect waves-themed" onclick="back('tab-14')" type="button" style="margin-right:15px;">Sebelumnya</button>
							</div>
						</div>
						<div class="tab-pane fade" id="tab-15" role="tabpanel">
							<div class="panel-tag" style="font-size: 20px;">
								<b>PERNYATAAN</b><br>
								<form class="needs-validation" id="form13" novalidate enctype="multipart/form-data">
									<div class="form-group">
										<input type="checkbox" class="custom-control-input" id="pernyataan" name="pernyataan" value="Dengan Mencentang Ini Saya Menyatakan Kuisioner Ini Saya Isi Dengan Data Yang Benar" required>
										<label class="custom-control-label" for="pernyataan">Dengan Mencentang Ini Saya Menyatakan Kuisioner Ini Saya Isi Dengan Data Yang Benar</label>
									</div>
								</form>
							</div>
							<div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row-reverse">
								<button class="btn btn-primary waves-effect waves-themed" onclick="formValidate('#form13', 'tab-15')" type="button" id="submit">Submit</button>
								<button class="btn btn-primary waves-effect waves-themed" onclick="back('tab-15')" type="button" style="margin-right:15px;">Sebelumnya</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-1"></div>
</div>
<script type="text/javascript">
	var jaringanSeri = {};
	var jaringanNama = {};
	var jaringanNpwp = {};
	var jaringanJumlah = {};
	$(document).ready(function() {

		$('.select2').select2({
			width: '100%'
		});
		$(':input').inputmask();
		$('.rupiah').inputmask({
			"alias": "currency",
			"prefix": 'Rp '
		});
		$('.npwp-jaringan').inputmask({
			"mask" : "999999999999999"
		});
		$('.persen').inputmask({
			'alias': 'percentage'
		})
		$('[name="emailKuisioner"]').focus();

		$(window).keydown(function(event){
			if(event.keyCode == 13) {
				event.preventDefault();
				return false;
			}
		});

		$("#kppbcpengawasan").select2({
			width : '100%',
			placeholder: 'Pilih Nama Kantor Pengawasan',
			minimumInputLength: 3,
			ajax : {
				url : "Kuisioner/getRefKantor",
				dataType : "json",
				data: function(params=0){
					return{
						search: params.term
					}
				},
				processResults : function(data){
					console.log(data.results);
					return{
					    results: data.results
					}
				}
			}
		});

		$('[name="XII-umum5"]').select2({
			width: '100%',
			placeholder: 'Ketik Nama Negara yang Diinginkan',
			minimumInputLength: 3,
			allowClear: true,
			ajax: {
				url: "Kuisioner/getOptionNegara",
				dataType: "JSON",
				data: function(params){
					return{
						search: params.term
					}
				},
				processResults: function(data){
					if (data.length > 0) {
						var results = [];

						$.each(data, function(index, item){
							results.push({
								id : item.URAIAN_NEGARA,
								text : item.URAIAN_NEGARA
							})
						});
						return{
							results : results
						};
					}
				},
				cache : true,
			}
		})

		$('.multi-select').select2({
			width: '100%',
			ajax: {
				url: "Kuisioner/getOption",
				dataType: "JSON",
				data: function(params){
					return{
						search: params.term
					}
				},
				processResults: function(data){
					if (data.data.length > 0) {
						var results = [];

						$.each(data, function(index, item){
							results.push({
								id : item.ID,
								text : item.NAMA_PERUSAHAAN
							})
						});
						return{
							results : results
						};
					} else {
						return {results : [{id: data.post, text: data.post}]};
					}

				},
				cache : true,
			}
		})

		$("#provinsi").select2({
			width : '100%',
			placeholder: 'Masukkan Nama Provinsi',
			minimumInputLength: 5,
			allowClear: true,
			ajax : {
				url : "Kuisioner/getProvinsi/",
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
							id : item.lokasi_kode,
							text : item.lokasi_nama
						})
					});
					return{
						results : results
					};
				},
				cache : true
			}
		});


		$("#provinsi").on('select2:select', function(event) {
			event.preventDefault();
			selectedProvince = $(event.currentTarget).find("option:selected").val();
		});

		$("#kota").select2({
			width : '100%',
			placeholder: 'Masukkan Nama Kota/Kabupaten',
			minimumInputLength: 5,
			allowClear: true,
			ajax : {
				url : "Kuisioner/getKabupaten/",
				dataType : "JSON",
				delay : 250,
				data : function(params){
					return{
						nama : params.term,
						provinsi : selectedProvince
					};
				},
				processResults: function(data){
					if($.isArray(data) === true){
						var results = [];

						$.each(data, function(index, item){
							results.push({
								id : item.lokasi_kode,
								text : item.lokasi_nama
							})
						});
						return{
							results : results
						};
					} else {
						alert(data);
						return{
							results : data
						}
					}
				},
				cache : true,
			}
		});

		$("#kota").on('select2:select', function(event) {
			event.preventDefault();
			/* Act on the event */
			selectedKabupaten = $(event.currentTarget).find('option:selected').val();
		});

		$("#kecamatan").select2({
			width : '100%',
			placeholder: 'Masukkan Nama Kecamatan',
			minimumInputLength: 5,
			allowClear: true,
			ajax : {
				url : "Kuisioner/getKecamatan/",
				dataType : "JSON",
				delay : 250,
				data : function(params){
					return{
						nama : params.term,
						kabupaten : selectedKabupaten
					};
				},
				processResults: function(data){
					if($.isArray(data) === true){
						var results = [];

						$.each(data, function(index, item){
							results.push({
								id : item.lokasi_kode,
								text : item.lokasi_nama
							})
						});
						return{
							results : results
						};
					} else {
						alert(data);
						return{
							results : data
						}
					}
				},
				cache : true,
			}
		});

		$("#kecamatan").on('select2:select', function(event) {
			event.preventDefault();
			/* Act on the event */
			selectedKecamatan = $(event.currentTarget).find('option:selected').val();
		});

		$("#kelurahan").select2({
			width : '100%',
			placeholder: 'Masukkan Nama Kelurahan',
			minimumInputLength: 5,
			allowClear: true,
			ajax : {
				url : "Kuisioner/getKelurahan/",
				dataType : "JSON",
				delay : 250,
				data : function(params){
					return{
						nama : params.term,
						kecamatan : selectedKecamatan
					};
				},
				processResults: function(data){
					if($.isArray(data) === true){
						var results = [];

						$.each(data, function(index, item){
							results.push({
								id : item.lokasi_kode,
								text : item.lokasi_nama
							})
						});
						return{
							results : results
						};
					} else {
						alert(data);
						return{
							results : data
						}
					}
				},
				cache : true,
			}
		});
	});

function readURL(input, img) {	
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function(e) {
			$('#'+img).attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]); 
	}
}

$("#tampakDepan, #bahanBaku, #lineProduksi").change(function() {
	var id = $(this).attr('name');
	console.log(id);
	readURL(this, id);
	$('#contoh').addClass('sr-only');
});

function formValidate(form, tab, fokus){
	var activeTab = tab;
	switch (activeTab) {
		case "tab-1":
		nextTab = "tab-2";
		previousTab = null;
		break;
		case "tab-2":
		nextTab = "tab-3";
		previousTab = "tab-1";
		break;
		case "tab-3":
		nextTab = "tab-4";
		previousTab = "tab-2";
		break;
		case "tab-4":
		nextTab = "tab-5";
		previousTab = "tab-3";
		break;
		case "tab-5":
		nextTab = "tab-6";
		previousTab = "tab-4";
		break;
		case "tab-6":
		nextTab = "tab-7";
		previousTab = "tab-5";
		break;
		case "tab-7":
		nextTab = "tab-8";
		previousTab = "tab-6";
		break;
		case "tab-8":
		nextTab = "tab-9";
		previousTab = "tab-7";
		break;
		case "tab-9":
		nextTab = "tab-10";
		previousTab = "tab-8";
		break;
		case "tab-10":
		nextTab = "tab-11";
		previousTab = "tab-9";
		break;
		case "tab-11":
		nextTab = "tab-12";
		previousTab = "tab-10";
		break;
		case "tab-12":
		nextTab = "tab-13";
		previousTab = "tab-11";
		break;
		case "tab-13":
		nextTab = "tab-14";
		previousTab = "tab-12";
		break;
		case "tab-14":
		nextTab = "tab-15";
		previousTab = "tab-13";
		break;
		default:
		nextTab = null;
		previousTab = "tab-14"
		break;
	}

	if ($(form)[0].checkValidity() === false) {
		// if (false) {
			play = document.getElementById('notification');
			$(form).addClass('was-validated');
			toastr.error('Isi Form Dengan Lengkap dan Benar','Gagal');
			play.play();
			delete play;
		} else {
			if (nextTab != null) {
				switch (tab) {
					case 'tab-11':
					var jumlahFasilitas = parseInt($('[name="X-jaringanFasilitas"]').val());
					var jumlahNonFasilitas = parseInt($('[name="X-jaringanNonFasilitas"]').val());
					var jumlahTabel = $('#tableDtJr > tbody > tr').length;
					var jumlahDetailNonFasilitas = $('#detailjaringanNonFasilitas').select2('val');
					var jumlahDetailFasilitas = $('#detailjaringanFasilitas').select2('val');

					if (jumlahFasilitas != jumlahDetailFasilitas.length) {
						play = document.getElementById('notification');
						toastr.error('Jumlah Nama Perusahaan Terkait Fasilitas Tidak Sama dengan Total Perusahaan','Gagal');
						play.play();
						delete play;
						status1 = false;
					} else {
						status1 = true;
					}
					if (jumlahNonFasilitas != jumlahDetailNonFasilitas.length) {
						play = document.getElementById('notification');
						toastr.error('Jumlah Nama Perusahaan Terkait Non Fasilitas Tidak Sama dengan Total Perusahaan','Gagal');
						play.play();
						delete play;
						status2 = false;
					} else {
						status2 = true;
					}


					if (jumlahNonFasilitas != jumlahTabel) {
						play = document.getElementById('notification');
						toastr.error('Lengkapi Data Tenaga Kerja Jaringan Non Fasilitas Sesuai dengan Jumlah Perusahaan','Gagal');
						play.play();
						delete play;
						status3 = false;
					} else {
						status3 = true;
					}

				if (status1 && status2 && status3) {
					play = document.getElementById('notification');
					toastr.success('Lanjut Ke Bagian Berikutnya','Sukses');
					play.play();
					delete play;
					$('a[href="#'+nextTab+'"]').removeClass('disabled').addClass('active');
					$('a[href="#'+activeTab+'"]').removeClass('active');
					$("#"+activeTab).removeClass('active show');
					$("#"+nextTab).addClass('active show');
				} else {
					play = document.getElementById('notification');
					toastr.error('Periksa kembali pengisian data pada bagian ini','Gagal');
					play.play();
					delete play;
				}
				console.log([jumlahDetailNonFasilitas,jumlahDetailFasilitas]);
				break;
				case 'tab-14':
				var fileSize = [];
				$.each($('input[type="file"]'), function(index, val) {
					fileSize.push(val.files[0].size);
					console.log(val.files[0].size);
				});
				console.log(fileSize);
				if (fileSize[0] < 2097152 && fileSize[1] < 2097152 && fileSize[2] < 2097152 ) {
					play = document.getElementById('notification');
					toastr.success('Lanjut Ke Bagian Berikutnya','Sukses');
					play.play();
					delete play;
					$('a[href="#'+nextTab+'"]').removeClass('disabled').addClass('active');
					$('a[href="#'+activeTab+'"]').removeClass('active');
					$("#"+activeTab).removeClass('active show');
					$("#"+nextTab).addClass('active show');
				} else {
					play = document.getElementById('notification');
					toastr.error('Cek Kembali Ukuran File Foto, Ukuran File Maksimal 2 Mb','Gagal');
					play.play();
					delete play;
				}
				break;
				default:
				play = document.getElementById('notification');
				toastr.success('Lanjut Ke Bagian Berikutnya','Sukses');
				play.play();
				delete play;
				$('a[href="#'+nextTab+'"]').removeClass('disabled').addClass('active');
				$('a[href="#'+activeTab+'"]').removeClass('active');
				$("#"+activeTab).removeClass('active show');
				$("#"+nextTab).addClass('active show');
				break;
			}
			// $("#uraianBb").focus();	
		} else {
			$('#submit').append('<div class="spinner-grow text-primary" role="status"><span class="sr-only">Loading...</span></div>');
			$('#submit').prop('disabled', true);
			var data = new FormData();
			for (var i = 0; i < document.forms.length; i++) {
				var form = document.forms[i];
				var d = new FormData(form);
				var formValues = d.entries();
				while (!(ent = formValues.next()).done) {
					data.append(`${ent.value[0]}`, ent.value[1]);
				}
			}

			var npwp = $('input[name="II-npwp-mask"]').inputmask('unmaskedvalue');
			data.append('II-npwpPerusahaan',npwp);

			var devisaEkspor = $('input[name="III-devisaEkspor-mask"]').inputmask('unmaskedvalue');
			data.append('III-devisaEkspor',devisaEkspor);
			var devisaImpor = $('input[name="III-devisaImpor-mask"]').inputmask('unmaskedvalue');
			data.append('III-devisaImpor',devisaImpor);
			var nilaiFasilitas = $('input[name="III-nilaiFasilitas-mask"]').inputmask('unmaskedvalue');
			data.append('III-nilaiFasilitas',nilaiFasilitas);
			var persenBbLokal = $('input[name="III-persenBbLokal-mask"]').inputmask('unmaskedvalue');
			data.append('III-persenBbLokal',persenBbLokal/100);

			var penambahanInvestasi = $('input[name="V-penambahanInvestasi-mask"]').inputmask('unmaskedvalue');
			data.append('V-penambahanInvestasi',penambahanInvestasi);
			var totalInvestasi = $('input[name="V-totalInvestasi-mask"]').inputmask('unmaskedvalue');
			data.append('V-totalInvestasi',totalInvestasi);

			var laba = $('input[name="VI-labaSebelumPajak-mask"]').inputmask('unmaskedvalue');
			data.append('VI-labaSebelumPajak',laba);

			var pph = $('input[name="VII-pphBadan-mask"]').inputmask('unmaskedvalue');
			data.append('VII-pphBadan',pph);

			var pph21Y1 = $('input[name="VIII-pph21Y1-mask"]').inputmask('unmaskedvalue');
			data.append('VIII-pph21Y1',pph21Y1);
			var pph21Y0 = $('input[name="VIII-pph21Y0-mask"]').inputmask('unmaskedvalue');
			data.append('VIII-pph21Y0',pph21Y0);
			var pph22Y1 = $('input[name="VIII-pph22Y1-mask"]').inputmask('unmaskedvalue');
			data.append('VIII-pph22Y1',pph22Y1);
			var pph22Y0 = $('input[name="VIII-pph22Y0-mask"]').inputmask('unmaskedvalue');
			data.append('VIII-pph22Y0',pph22Y0);
			var pph22Y1nonImpor = $('input[name="VIII-pph22Y1nonImpor-mask"]').inputmask('unmaskedvalue');
			data.append('VIII-pph22Y1nonImpor',pph22Y1nonImpor);
			var pph22Y0nonImpor = $('input[name="VIII-pph22Y0nonImpor-mask"]').inputmask('unmaskedvalue');
			data.append('VIII-pph22Y0nonImpor',pph22Y0nonImpor);
			var pph23Y1 = $('input[name="VIII-pph23Y1-mask"]').inputmask('unmaskedvalue');
			data.append('VIII-pph23Y1',pph23Y1);
			var pph23Y0 = $('input[name="VIII-pph23Y0-mask"]').inputmask('unmaskedvalue');
			data.append('VIII-pph23Y0',pph23Y0);
			var pph26Y1 = $('input[name="VIII-pph26Y1-mask"]').inputmask('unmaskedvalue');
			data.append('VIII-pph26Y1',pph);
			var pph26Y0 = $('input[name="VIII-pph26Y0-mask"]').inputmask('unmaskedvalue');
			data.append('VIII-pph26Y0',pph);
			var pph42Y1 = $('input[name="VIII-pph42Y1-mask"]').inputmask('unmaskedvalue');
			data.append('VIII-pph42Y1',pph);
			var pph42Y0 = $('input[name="VIII-pph42Y0-mask"]').inputmask('unmaskedvalue');
			data.append('VIII-pph42Y0',pph);
			var ppnMasukan1 = $('input[name="VIII-ppnMasukan1-mask"]').inputmask('unmaskedvalue');
			data.append('VIII-ppnMasukan1',pph);
			var ppnMasukan0 = $('input[name="VIII-ppnMasukan0-mask"]').inputmask('unmaskedvalue');
			data.append('VIII-ppnMasukan0',pph);
			var ppnKeluaran1 = $('input[name="VIII-ppnKeluaran1-mask"]').inputmask('unmaskedvalue');
			data.append('VIII-ppnKeluaran1',pph);
			var ppnKeluaran0 = $('input[name="VIII-ppnKeluaran0-mask"]').inputmask('unmaskedvalue');
			data.append('VIII-ppnKeluaran0',pph);
			var ppnSelisih1 = $('input[name="VIII-ppnSelisih1-mask"]').inputmask('unmaskedvalue');
			data.append('VIII-ppnSelisih1',pph);
			var ppnSelisih0 = $('input[name="VIII-ppnSelisih0-mask"]').inputmask('unmaskedvalue');
			data.append('VIII-ppnSelisih0',pph);
			var pbb1 = $('input[name="VIII-pbb1-mask"]').inputmask('unmaskedvalue');
			data.append('VIII-pbb1',pph);
			var pbb0 = $('input[name="VIII-pbb0-mask"]').inputmask('unmaskedvalue');
			data.append('VIII-pbb0',pph);


			var pajakDaerah = $('input[name="IX-pajakDaerah-mask"]').inputmask('unmaskedvalue');
			data.append('IX-pajakDaerah',pajakDaerah);
			var bebanUpah = $('input[name="IX-bebanUpah-mask"]').inputmask('unmaskedvalue');
			data.append('IX-bebanUpah', bebanUpah);
			var depresiasi = $('input[name="IX-depresiasi-mask"]').inputmask('unmaskedvalue');
			data.append('IX-depresiasi',depresiasi);
			var pajakTidakLangsung = $('input[name="IX-pajakTidakLangsung-mask"]').inputmask('unmaskedvalue');
			data.append('IX-pajakTidakLangsung',pajakTidakLangsung);

			var umum2_a = $('input[name="XII-umum2-a-mask"]').inputmask('unmaskedvalue');
			data.append('XII-umum2-a',umum2_a);
			var umum2_b = $('input[name="XII-umum2-b-mask"]').inputmask('unmaskedvalue');
			data.append('XII-umum2-b',umum2_b);
			var umum2_c = $('input[name="XII-umum2-c-mask"]').inputmask('unmaskedvalue');
			data.append('XII-umum2-c',umum2_c/100);
			var umum8_a = $('input[name="XII-umum8-a-mask"]').inputmask('unmaskedvalue');
			data.append('XII-umum8-a',umum8_a/100);
			var umum8_b = $('input[name="XII-umum8-b-mask"]').inputmask('unmaskedvalue');
			data.append('XII-umum8-b',umum8_b/100);

			data.append('X-jaringanSeri',JSON.stringify(jaringanSeri));
			data.append('X-jaringanNama',JSON.stringify(jaringanNama));
			data.append('X-jaringanNpwp',JSON.stringify(jaringanNpwp));
			data.append('X-jaringanJumlah',JSON.stringify(jaringanJumlah));

			$.each($('input[type="file"]'), function(index, val) {
				data.append($(this).attr('name'), val.files[0]);
			});

			$.ajax({
				url: 'Kuisioner/submitKuisioner',
				type: 'POST',
				contentType: false,
				cache: false,
				processData: false,
				dataType: 'JSON',
				data: data,
				success: function(d){
					if (d.status == "sukses") {
						play = document.getElementById('notification');
						toastr.success(d.pesan,'Sukses');
						play.play();
						delete play;
						loadPage('Kuisioner/suksesPage');
					} else {
						play = document.getElementById('notification');
						toastr.error(d.pesan,'Gagal');
						play.play();
						delete play;
						console.log(d);
					}
					
				}
			})
			.done(function() {
				console.log("success");
			})
			.fail(function(jqXHR, exception) {
				console.log("error");
				console.log(jqXHR);
			})
			.always(function() {
				console.log("complete");
			});				
		}
	}
}

$('[name="XII-umum2-b-mask"]').focusout(function(event) {
	var value1 = $('[name="XII-umum2-a-mask"]').inputmask('unmaskedvalue');
	var value2 = $('[name="XII-umum2-b-mask"]').inputmask('unmaskedvalue');

	var value3 = value1/value2*100;

	$('[name="XII-umum2-c-mask"]').val(value3);
});

function back(tab){
	var activeTab = tab;
		// alert(activeTab);
		switch (activeTab) {
			case "tab-1":
			nextTab = "tab-2";
			previousTab = null;
			break;
			case "tab-2":
			nextTab = "tab-3";
			previousTab = "tab-1";
			break;
			case "tab-3":
			nextTab = "tab-4";
			previousTab = "tab-2";
			break;
			case "tab-4":
			nextTab = "tab-5";
			previousTab = "tab-3";
			break;
			case "tab-5":
			nextTab = "tab-6";
			previousTab = "tab-4";
			break;
			case "tab-6":
			nextTab = "tab-7";
			previousTab = "tab-5";
			break;
			case "tab-7":
			nextTab = "tab-8";
			previousTab = "tab-6";
			break;
			case "tab-8":
			nextTab = "tab-9";
			previousTab = "tab-7";
			break;
			case "tab-9":
			nextTab = "tab-10";
			previousTab = "tab-8";
			break;
			case "tab-10":
			nextTab = "tab-11";
			previousTab = "tab-9";
			break;
			case "tab-11":
			nextTab = "tab-12";
			previousTab = "tab-10";
			break;
			case "tab-12":
			nextTab = "tab-13";
			previousTab = "tab-11";
			break;
			case "tab-13":
			nextTab = "tab-14";
			previousTab = "tab-12";
			break;
			case "tab-14":
			nextTab = "tab-15";
			previousTab = "tab-13";
			break;
			default:
			nextTab = null;
			previousTab = "tab-14"
			break;
		}

		$('a[href="#'+activeTab+'"]').addClass('disabled').removeClass('active');
		$('a[href="#'+previousTab+'"]').addClass('active');
		$("#"+activeTab).removeClass('active show');
		$("#"+previousTab).addClass('active show');
	}

	function addRow(){
		var rowCount = $('#tableDtJr > tbody > tr').length;

		var nextRow = rowCount +1;
		var nama = $('[name="X-dtJr-nama"]').val();
		var npwp = $('[name="X-dtJr-npwp"]').val();
		var jumlah = $('[name="X-dtJr-jumlah"]').val();

		if (nama !== "" && npwp !== "" && jumlah !== "") {
			jaringanSeri[rowCount] = nextRow;
			jaringanNama[rowCount] = nama;
			jaringanNpwp[rowCount] = npwp;
			jaringanJumlah[rowCount] = jumlah;

			$('#tableDtJr tbody').append('<tr>'
				+'<td>'+nextRow+'</td>'
				+'<td>'+nama+'</td>'
				+'<td>'+npwp+'</td>'
				+'<td>'+jumlah+'</td>'
				+'</tr');

			var nama = $('[name="X-dtJr-nama"]').val("");
			var npwp = $('[name="X-dtJr-npwp"]').val("");
			var jumlah = $('[name="X-dtJr-jumlah"]').val("");
			console.log(jaringanNama);
		} else {
			play = document.getElementById('notification');
			toastr.error('Isi Form Dengan Lengkap dan Benar','Gagal');
			play.play();
			delete play;
		}	
	}

	function deleteRow(){
		$('#tableDtJr > tbody > tr:last').remove();
	}
</script>