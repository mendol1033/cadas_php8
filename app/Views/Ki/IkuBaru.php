<div class="row">
	<div class="col-xl-12">
		<div id="panel-1" class="panel">
			<div class="panel-hdr">
				<h2>
					<span class="fas fa-list"></span>
					&nbsp; Input Data IKU Baru
				</h2>
				<div class="panel-toolbar">
					<button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
					<button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
					<button class="btn btn-panel waves-effect waves-themed" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
				</div>
			</div>
			<div class="panel-container collapse show" style="">
				<div class="panel-content">
					<div id="mainContent">
						<div class="row" style="margin-top: 15px;">
							<div class="col-xl-6">
								<form class="needs-validation" id="formNewKontrak" enctype="multipart/form-data" novalidate>
									<div class="row" style="margin-top: 10px;">
										<div class="col-xl-3">
											<label class="form-label" for="nomor_kontrak">Nomor Kontrak<span class="text-danger">*</span></label>
										</div>
										<div class="col-xl-9">
											<input type="text" class="form-control" name="nomor_kontrak" id="nomor_kontrak" required>
										</div>
										<div class="invalid-feedback">
											Nomor Kontrak Wajib Diisi
										</div>
									</div>
									<div class="row" style="margin-top: 10px;">
										<div class="col-xl-3">
											<label class="form-label" for="jenis_kontrak">Jenis Kontrak<span class="text-danger">*</span></label>
										</div>
										<div class="col-xl-9">
											<select class="form-control select2" name="jenis_kontrak" id="jenis_kontrak" required>
												<option label="KK Non Peta" value="1" selected="selected">KK Non Peta</option>
												<option label="KK Peta" value="2">KK Peta</option>
												<option label="SKP Tanpa KK" value="3">SKP Tanpa KK</option>
												<option label="Tugas Belajar" value="4">Tugas Belajar</option>
											</select>
										</div>
										<div class="invalid-feedback">
											Pilih Jenis Kontrak
										</div>
									</div>
									<div class="row" style="margin-top: 10px;">
										<div class="col-xl-3">
											<label class="form-label" for="tipe_kontrak">Tipe Kontrak<span class="text-danger">*</span></label>
										</div>
										<div class="col-xl-9">
											<select class="form-control select2" name="tipe_kontrak" id="tipe_kontrak" required>
												<option value="" class="" selected="selected">-- Pilih Tipe Kontrak --</option>
												<option label="Pejabat Eselon I, II, III Pemilik Peta dan Fungsional Tertentu/Nonstruktural Setara Eselon II" value="1">Pejabat Eselon I, II, III Pemilik Peta dan Fungsional Tertentu/Nonstruktural Setara Eselon II</option>
												<option label="Pejabat Eselon III Bukan Pemilik Peta, Nonstruktural Setara Eselon III" value="2">Pejabat Eselon III Bukan Pemilik Peta, Nonstruktural Setara Eselon III</option>
												<option label="Pejabat Fungsional Tertentu Setara Eselon III" value="3">Pejabat Fungsional Tertentu Setara Eselon III</option>
												<option label="Pejabat Eselon IV/Nonstruktural Setara Eselon IV (1 Level di bawah PS)" value="4">Pejabat Eselon IV/Nonstruktural Setara Eselon IV (1 Level di bawah PS)</option>
												<option label="Pejabat Fungsional Tertentu Setara Eselon IV" value="5">Pejabat Fungsional Tertentu Setara Eselon IV</option>
												<option label="Pejabat Eselon IV/Nonstruktural Setara Eselon IV (2 Level di bawah PS)" value="6">Pejabat Eselon IV/Nonstruktural Setara Eselon IV (2 Level di bawah PS)</option>
												<option label="Pejabat Fungsional Tertentu Nonmanajerial" value="7">Pejabat Fungsional Tertentu Nonmanajerial</option>
												<option label="Fungsional Tertentu Setara Fungsional Umum / Pelaksana (Manajerial)" value="8">Fungsional Tertentu Setara Fungsional Umum / Pelaksana (Manajerial)</option>
												<option label="Pejabat Eselon V dan Fungsional Umum / Pelaksana" value="9">Pejabat Eselon V dan Fungsional Umum / Pelaksana</option>
											</select>
										</div>
										<div class="invalid-feedback">
											Pilih Tipe Kontrak
										</div>
									</div>
									<div class="row" style="margin-top: 10px;">
										<div class="col-xl-3">
											<label class="form-label" for="tanggal_mulai">Tanggal Mulai<span class="text-danger">*</span></label>
										</div>
										<div class="col-xl-9">
											<input type="text" class="form-control datepicker" name="tanggal_mulai" id="tanggal_mulai" required>
										</div>
										<div class="invalid-feedback">
											Tanggal Mulai Wajib Diisi
										</div>
									</div>
									<div class="row" style="margin-top: 10px;">
										<div class="col-xl-3">
											<label class="form-label" for="tanggal_selesai">Tanggal Selesai<span class="text-danger">*</span></label>
										</div>
										<div class="col-xl-9">
											<input type="text" class="form-control datepicker" name="tanggal_selesai" id="tanggal_selesai" required>
										</div>
										<div class="invalid-feedback">
											Tanggal Selesai Wajib Diisi
										</div>
									</div>
									<div class="row" style="margin-top: 10px;">
										<div class="col-xl-3">
											<label class="form-label" for="tahun">Tahun<span class="text-danger">*</span></label>
										</div>
										<div class="col-xl-9">
											<input type="text" class="form-control" name="tahun" id="tahun" required>
										</div>
										<div class="invalid-feedback">
											Tahun Wajib Diisi
										</div>
									</div>
									<div class="row" style="margin-top: 10px;">
										<div class="col-xl-3"></div>
										<div class="col-xl-9">
											<button type="button" class="btn btn-secondary" onclick="loadPage('Ki/KontrakKinerja')"><span class="fas fa-undo fa-sm"></span> BATAL</button>
											<button class="btn btn-success" style="margin-left: 15px;"><span class="fas fa-save fa-lg"></span> SIMPAN</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>