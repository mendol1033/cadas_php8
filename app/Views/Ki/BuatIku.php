<div class="row" style="margin-top: 15px;">
	<div class="col-xl-12">
		<div class="row">
			<div class="col-xl-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active"><a class="text-success fs-xl"><span class="fas fa-file"></span> <strong>Detail Kontrak</strong></a></li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12" id="kontenKontrak">

			</div>	
		</div>
		
		<div class="row">
			<div class="col-xl-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active"><a class="text-info fs-xl"><span class="fas fa-list"></span> <strong>Detail IKU</strong></a></li>
				</ol>
			</div>
		</div>
		<form class="needs-validation" id="formIku" novalidate enctype="multipart/form-data">
			<div class="row">
				<div class="col-xl-12">
					<div class="alert alert-secondary">
						<div class="row" style="margin-top: 5px;">
							<div class="col-xl-3">
								<label class="form-label fs-xl" for="KODE_IKU">Kodoe IKU<span class="text-danger">*</span></label>
							</div>
							<div class="col-xl-4">
								<input type="text" class="form-control" name="KODE_IKU" id="KODE_IKU" required>
							</div>
						</div>
						<div class="row" style="margin-top: 5px;">
							<div class="col-xl-3">
								<label class="form-label fs-xl" for="KODE_SS">Kode SS</label>
							</div>
							<div class="col-xl-3">
								<select class="form-control select2" name="KODE_SS" id="KODE_SS">
									
								</select>
							</div>
						</div>
						<div class="row" style="margin-top: 5px;">
							<div class="col-xl-3">
								<label class="form-label fs-xl" for="DESKRIPSI_SS">Deskripsi SS</label>
							</div>
							<div class="col-xl-3">
								<!-- <input type="text" class="form-control" name="DESKRIPSI_SS" id="DESKRIPSI_SS" required> -->
							</div>
						</div>
						<div class="row" style="margin-top: 5px;">
							<div class="col-xl-3">
								<label class="form-label fs-xl" for="JENIS_CASCADING">Jenis Cascading</label>
							</div>
							<div class="col-xl-4">
								<select class="form-control select2" name="JENIS_CASCADING" id="JENIS_CASCADING">
									<option value="1">Cascading Peta</option>
									<option value="2">Cascading</option>
									<option value="3">Non Cascading</option>
								</select>
							</div>
						</div>
						<div class="row" style="margin-top: 5px;">
							<div class="col-xl-3">
								<label class="form-label fs-xl" for="NAMA_IKU">Nama IKU<span class="text-danger">*</span></label>
							</div>
							<div class="col-xl-7">
								<textarea class="form-control" name="NAMA_IKU" id="NAMA_IKU" required rows="2">
									
								</textarea>
							</div>
						</div>
						<div class="row" style="margin-top: 5px;">
							<div class="col-xl-3">
								<label class="form-label fs-xl" for="NAMA_SKP">Nama SKP</label>
							</div>
							<div class="col-xl-7">
								<textarea class="form-control" name="NAMA_SKP" id="NAMA_SKP" rows="2">
									
								</textarea>
							</div>
						</div>
						<div class="row" style="margin-top: 5px;">
							<div class="col-xl-3">
								<label class="form-label fs-xl" for="DEFINISI_IKU">Definisi IKU<span class="text-danger">*</span></label>
							</div>
							<div class="col-xl-7">
								<textarea class="form-control" name="DEFINISI_IKU" id="DEFINISI_IKU" required rows="2">
									
								</textarea>
							</div>
						</div>
						<div class="row" style="margin-top: 5px;">
							<div class="col-xl-3">
								<label class="form-label fs-xl" for="FORMULA_IKU">Formula IKU<span class="text-danger">*</span></label>
							</div>
							<div class="col-xl-7">
								<textarea class="form-control" name="FORMULA_IKU" id="FORMULA_IKU" required rows="2">
									
								</textarea>
							</div>
						</div>
						<div class="row" style="margin-top: 5px;">
							<div class="col-xl-3">
								<label class="form-label fs-xl" for="TUJUAN_IKU">Tujuan IKU</label>
							</div>
							<div class="col-xl-7">
								<textarea class="form-control" name="TUJUAN_IKU" id="TUJUAN_IKU" required rows="2">
									
								</textarea>
							</div>
						</div>
						<div class="row" style="margin-top: 5px;">
							<div class="col-xl-3">
								<label class="form-label fs-xl" for="SATUAN_PENGUKURAN">Satuan Pengukuran</label>
							</div>
							<div class="col-xl-4">
								<input type="text" class="form-control" name="SATUAN_PENGUKURAN" id="SATUAN_PENGUKURAN">
							</div>
						</div>
						<div class="row" style="margin-top: 5px;">
							<div class="col-xl-3">
								<label class="form-label fs-xl" for="ASPEK_TARGET">Aspek Target<span class="text-danger">*</span></label>
							</div>
							<div class="col-xl-4">
								<select class="form-control select2" name="ASPEK_TARGET" id="ASPEK_TARGET" required>
									<option value="1">Kuantitas</option>
									<option value="2">Kualitas</option>
									<option value="3">Waktu</option>
									<option value="4">Biaya</option>
								</select>
							</div>
						</div>
						<div class="row" style="margin-top: 5px;">
							<div class="col-xl-3">
								<label class="form-label fs-xl" for="VALIDITAS">Validitas<span class="text-danger">*</span></label>
							</div>
							<div class="col-xl-4">
								<select class="form-control select2" name="VALIDITAS" id="VALIDITAS" required>
									<option>--Pilih Validitas--</option>
									<option value="Exact">Exact</option>
									<option value="Proxy">Proxy</option>
									<option value="Activity">Activity</option>
								</select>
							</div>
						</div>
						<div class="row" style="margin-top: 5px;">
							<div class="col-xl-3">
								<label class="form-label fs-xl" for="TINGKAT_KENDALI">Tingkat Kendali<span class="text-danger">*</span></label>
							</div>
							<div class="col-xl-4">
								<select class="form-control select2" name="TINGKAT_KENDALI" id="TINGKAT_KENDALI" required>
									<option value="1">High</option>
									<option value="2">Moderate</option>
									<option value="3">Low</option>
								</select>
							</div>
						</div>
						<div class="row" style="margin-top: 5px;">
							<div class="col-xl-3">
								<label class="form-label fs-xl" for="PENANGGUNG_JAWAB_IKU">Unit/Pihak Penanggung Jawab IKU</label>
							</div>
							<div class="col-xl-7">
								<input type="text" class="form-control" name="PENANGGUNG_JAWAB_IKU" id="PENANGGUNG_JAWAB_IKU">
							</div>
						</div>
						<div class="row" style="margin-top: 5px;">
							<div class="col-xl-3">
								<label class="form-label fs-xl" for="PENYEDIA_DATA">Unit/Pihak Penyedia Data</label>
							</div>
							<div class="col-xl-7">
								<input type="text" class="form-control" name="PENYEDIA_DATA" id="PENYEDIA_DATA">
							</div>
						</div>
						<div class="row" style="margin-top: 5px;">
							<div class="col-xl-3">
								<label class="form-label fs-xl" for="SUMBER_DATA">Sumber Data</label>
							</div>
							<div class="col-xl-4">
								<input type="text" class="form-control" name="SUMBER_DATA" id="SUMBER_DATA">
							</div>
						</div>
						<div class="row" style="margin-top: 5px;">
							<div class="col-xl-3">
								<label class="form-label fs-xl" for="METODE_CASCADING">Metode Cascading<span class="text-danger">*</span></label>
							</div>
							<div class="col-xl-4">
								<select class="form-control select2" name="METODE_CASCADING" id="METODE_CASCADING" required>
									<option value="1">Direct</option>
									<option value="2">Indirect</option>
								</select>
							</div>
						</div>
						<div class="row" style="margin-top: 5px;">
							<div class="col-xl-3">
								<label class="form-label fs-xl" for="JENIS_KONSOLIDASI_PERIODE">Jenis Konsolidasi Periode<span class="text-danger">*</span></label>
							</div>
							<div class="col-xl-4">
								<select class="form-control select2" name="JENIS_KONSOLIDASI_PERIODE" id="JENIS_KONSOLIDASI_PERIODE" required>
									<option value="1">Sum</option>
									<option value="2">Average</option>	
									<option value="3">Take Last Known</option>
								</select>
							</div>
						</div>
						<div class="row" style="margin-top: 5px;">
							<div class="col-xl-3">
								<label class="form-label fs-xl" for="JENIS_KONSOLIDASI_LOKASI">Jenis Konsolidasi Lokasi</label>
							</div>
							<div class="col-xl-4">
								<select class="form-control select2" name="JENIS_KONSOLIDASI_LOKASI" id="JENIS_KONSOLIDASI_LOKASI">
									<option value>-</option>
									<option value="1">Sum</option>
									<option value="2">Average</option>	
									<option value="3">Take Last Known</option>
								</select>
							</div>
						</div>
						<div class="row" style="margin-top: 5px;">
							<div class="col-xl-3">
								<label class="form-label fs-xl" for="POLARISASI">Polarisasi<span class="text-danger">*</span></label>
							</div>
							<div class="col-xl-4">
								<select class="form-control select2" name="POLARISASI" id="POLARISASI" required>
									<option value="1">Maximize</option>
									<option value="2">Minimize</option>
									<option value="3">Stabilize</option>
								</select>
							</div>
						</div>
						<div class="row" style="margin-top: 5px;">
							<div class="col-xl-3">
								<label class="form-label fs-xl" for="PERIODE_PELAPORAN">Periode Pelaporan<span class="text-danger">*</span></label>
							</div>
							<div class="col-xl-4">
								<select class="form-control select2" name="PERIODE_PELAPORAN" id="PERIODE_PELAPORAN" required>
									<option value="1">Bulanan</option>
									<option value="2">Triwulanan</option>	
									<option value="3">Semesteran</option>
									<option value="4">Tahunan</option>
								</select>
							</div>
						</div>
						<div class="row" style="margin-top: 5px;">
							<div class="col-xl-3">
								<label class="form-label fs-xl" for="KONVERSI_120">Konversi 120</label>
							</div>
							<div class="col-xl-4">
								<select class="form-control select2" name="KONVERSI_120" id="KONVERSI_120" required>
									<option value="true">Tidak</option>
									<option value="false">Ya</option>
								</select>
							</div>
						</div>
						<div class="row" style="margin-top: 20px;">
							<div class="col-xl-12">
								<ol class="breadcrumb">
									<li class="breadcrumb-item active" cstyle="overflow: visible;"><a class="text-info fs-xl"><span class="fas fa-list"></span> <strong>Tabel Data</strong></a></li>
								</ol>
							</div>
						</div>
						<div class="row">
							<div class="col-xl-12">
								<div class="alert alert-secondary" id="targetIku">
									'<div class="row" style="margin-bottom: 8px;">
										<div class="col-xl-3">
											<label class="form-label fs-xl" for="T1">Target Bulan 1</label>
										</div>
										<div class="col-xl-3">
											<input type="number" class="form-control" name="T1" id="T1">
										</div>
									</div>
									<div class="row" style="margin-bottom: 8px;">
										<div class="col-xl-3">
											<label class="form-label fs-xl" for="T2">Target Bulan 2</label>
										</div>
										<div class="col-xl-3">
											<input type="number" class="form-control" name="T2" id="T2">
										</div>
									</div>
									<div class="row" style="margin-bottom: 8px;">
										<div class="col-xl-3">
											<label class="form-label fs-xl" for="T3">Target Bulan 3</label>
										</div>
										<div class="col-xl-3">
											<input type="number" class="form-control" name="T3" id="T3">
										</div>
									</div>
									<div class="row" style="margin-bottom: 8px;">
										<div class="col-xl-3">
											<label class="form-label fs-xl" for="T4">Target Bulan 4</label>
										</div>
										<div class="col-xl-3">
											<input type="number" class="form-control" name="T4" id="T4">
										</div>
									</div>
									<div class="row" style="margin-bottom: 8px;">
										<div class="col-xl-3">
											<label class="form-label fs-xl" for="T5">Target Bulan 5</label>
										</div>
										<div class="col-xl-3">
											<input type="number" class="form-control" name="T5" id="T5">
										</div>
									</div>
									<div class="row" style="margin-bottom: 8px;">
										<div class="col-xl-3">
											<label class="form-label fs-xl" for="T6">Target Bulan 6</label>
										</div>
										<div class="col-xl-3">
											<input type="number" class="form-control" name="T6" id="T6">
										</div>
									</div>
									<div class="row" style="margin-bottom: 8px;">
										<div class="col-xl-3">
											<label class="form-label fs-xl" for="T7">Target Bulan 7</label>
										</div>
										<div class="col-xl-3">
											<input type="number" class="form-control" name="T7" id="T7">
										</div>
									</div>
									<div class="row" style="margin-bottom: 8px;">
										<div class="col-xl-3">
											<label class="form-label fs-xl" for="T8">Target Bulan 8</label>
										</div>
										<div class="col-xl-3">
											<input type="number" class="form-control" name="T8" id="T8">
										</div>
									</div>
									<div class="row" style="margin-bottom: 8px;">
										<div class="col-xl-3">
											<label class="form-label fs-xl" for="T9">Target Bulan 9</label>
										</div>
										<div class="col-xl-3">
											<input type="number" class="form-control" name="T9" id="T9">
										</div>
									</div>
									<div class="row" style="margin-bottom: 8px;">
										<div class="col-xl-3">
											<label class="form-label fs-xl" for="T10">Target Bulan 10</label>
										</div>
										<div class="col-xl-3">
											<input type="number" class="form-control" name="T10" id="T10">
										</div>
									</div>
									<div class="row" style="margin-bottom: 8px;">
										<div class="col-xl-3">
											<label class="form-label fs-xl" for="T11">Target Bulan 11</label>
										</div>
										<div class="col-xl-3">
											<input type="number" class="form-control" name="T11" id="T11">
										</div>
									</div>
									<div class="row" style="margin-bottom: 8px;">
										<div class="col-xl-3">
											<label class="form-label fs-xl" for="T12">Target Bulan 12</label>
										</div>
										<div class="col-xl-3">
											<input type="number" class="form-control" name="T12" id="T12">
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- <div class="row">
							<div class="col-xl-12">
								<ol class="breadcrumb">
									<li class="breadcrumb-item active" style="overflow: visible;"><a class="text-info fs-xl"><span class="fas fa-list"></span> <strong>Tabel Raw Data</strong></a></li>
								</ol>
							</div>
						</div>
						<div class="row">
							<div class="col-xl-12">
								<div class="alert alert-secondary">
									<div class="row" style="margin-bottom: 8px;">
										<div class="col-xl-3">
											<label class="form-label fs-xl" for="RawQ1">Target Raw Q1</label>
										</div>
										<div class="col-xl-3">
											<input type="number" class="form-control" name="RawQ1" id="RawQ1">
										</div>	
									</div>
									<div class="row" style="margin-bottom: 8px;">
										<div class="col-xl-3">
											<label class="form-label fs-xl" for="RawQ2">Target Raw Q2</label>
										</div>
										<div class="col-xl-3">
											<input type="number" class="form-control" name="RawQ2" id="RawQ2">
										</div>
									</div>
									<div class="row" style="margin-bottom: 8px;">
										<div class="col-xl-3">
											<label class="form-label fs-xl" for="RawQ3">Target Raw Q3</label>
										</div>
										<div class="col-xl-3">
											<input type="number" class="form-control" name="RawQ3" id="RawQ3">
										</div>
									</div>
									<div class="row" style="margin-bottom: 8px;">
										<div class="col-xl-3">
											<label class="form-label fs-xl" for="RawQ3Q4">Target Raw Q4</label>
										</div>
										<div class="col-xl-3">
											<input type="number" class="form-control" name="RawQ4" id="RawQ4">
										</div>
									</div>
								</div>
							</div>
						</div> -->
					</div>
				</div>
			</div>
			<div class="row d-flex justify-content-center">
				<button type="button" class="btn btn-primary waves-effect waves-themed" id="btnBack"><span class="fas fa-backward"></span> Batal</button>
				<button type="submit" class="btn btn-success waves-effect waves-themed" id="btnSave" value="new" style="margin-left: 15px;" disabled="disabled"><span class="fas fa-save"></span> Simpan</button>
			</div>
		</form>
	</div>
</div>
<script src="assets/js/apps/ki/iku.js"></script>