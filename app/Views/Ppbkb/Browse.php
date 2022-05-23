<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    <?php echo $tableTitle;?>
                </h2>
                <div class="panel-toolbar">
                    <div class="panel-toolbar flex-row-reverse">
                        <button id="btnFullscreen" class="btn btn-warning btn-pills btn-xs waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen" style="width: 90;">Fullscreen</button>
                    </div>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <!-- datatable start -->
                    <div class="row">
                        <div class="col-xl-12">
                            <form class="needs-validation" id="searchForm" novalidate enctype="multipart/form-data">
                                <div class="row form-group">
                                    <label class="col-xl-2 form-label" for="hanggar">Nama Hanggar</label>
                                    <select class="col-xl-4 form-control form-control-sm select2" name="hanggar" id="hanggar">
                                        <option value="0"></option>
                                        <?php foreach ($hanggar as $key => $value) { ?>
                                            <option value="<?php echo $value['id'];?>"><?php echo $value['grupHanggar'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="row form-group">
                                    <label class="col-xl-2 form-label" for="nomor">Nomor / Tanggal Daftar</label>
                                    <input type="text" name="nomor" class="col-xl-2 form-control form-control-xs"> <span >&nbsp;/&nbsp;</span> <input type="text" name="tanggalMulai" class="col-xl-2 form-control form-control-xs datepicker" value="<?php echo date('Y-m-d');?>">—<input type="text" name="tanggalAkhir" class="col-xl-2 form-control form-control-xs datepicker" value="<?php echo date('Y-m-d');?>">
                                </div>
                                <div class="row form-group">
                                    <label class="col-xl-2 form-label" for="Nama">Nama Perusahaan</label>
                                    <input type="text" name="Nama" class="col-xl-3 form-control form-control-sm">
                                    <label class="col-xl-1 form-label" for="npwp">NPWP</label>
                                    <input type="text" name="npwp" class="col-xl-3 form-control form-control-sm">
                                </div>
                                <div class="row form-group">
                                    <label class="col-xl-2 form-label" for="aju">Nomor Aju</label>
                                    <input type="text" name="aju" class="col-xl-3 form-control form-control-sm">
                                    <button type="button" class="btn btn-sm btn-info" style="margin-left: 15px; margin-bottom: 20px;"><span><i class="fal fa-binoculars"></i></span>&nbsp;Filter</button>
                                    <button type="button" class="btn btn-sm btn-danger" style="margin-left: 15px; margin-bottom: 20px;"><span><i class="fal fa-trash"></i></span>&nbsp;Clear</button>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                    <div class="row">
                        <table id="dataTable" class="table table-bordered table-hover table-striped w-100 dataTable no-footer" role="grid">
                            <thead>
                                <th>Kode</th>
                                <th>Nomor Daftar</th>
                                <th>Nomor Aju</th>
                                <th>Tanggal Daftar</th>
                                <th>Nama Perusahaan</th>
                                <th>NPWP</th>
                                <th>Nama Hanggar</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <!-- datatable end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Section -->
<div class="modal fade" id="modalForm" role="dialog" aria-modal="true" data-backdrop="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">   
                <div class="panel-content">
                    <!-- <div class="panel-tag">
                    </div> -->
                    <form class="needs-validation" id="Form" novalidate enctype="multipart/form-data">
                        <input type="hidden" name="tipe">
                        <div class="form-group">
                            <label class="form-label" for="Stakeholders">Nama Perusahaan</label>
                            <input type="text" name="Stakeholders" id="Stakeholders" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="npwp">NPWP</label>
                            <input type="text" name="npwp-mask" id="npwp-mask" class="form-control" data-inputmask="'mask':'99.999.999.9-999.999'" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="Jenis">Jenis Akses</label>
                            <select class="form-control select2" id="Jenis" name="Jenis" required>
                                <option value="1">Web Aplication</option>
                                <option value="2">Remote Dekstop</option>
                                <option value="3">Remote Application</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="Aplikasi">Aplikasi Akses</label>
                            <select class="form-control select2" id="Aplikasi" name="Aplikasi" required>
                                <option value="1">Browser</option>
                                <option value="2">Dekstop Application</option>
                                <option value="3">Dekstop Application With VPN Akses</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="NamaAplikasi">Nama Aplikasi</label>
                            <select class="form-control" id="NamaAplikasi" name="NamaAplikasi" required>

                            </select>
                            <div class="invalid-feedback">
                                Kolom Nama Aplikasi harus diisi
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="Akses">Alamat Akses</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="http" name="Protocol" value="http://" class="custom-control-input" checked>
                                            <label class="custom-control-label" for="http">http://</label>
                                        </div>
                                    </div>
                                    <div class="input-group-text">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="https" name="Protocol" value="https://" class="custom-control-input">
                                            <label class="custom-control-label" for="https">https://</label>
                                        </div>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="Akses" name="Akses" required>
                            </div>
                            <div class="invalid-feedback">
                                Kolom Alamat Akses  Berusaha Harus Diisi.
                            </div>
                        </div>
                        <div class="form-group" id="divJenisCctv">
                            <label class="form-label" for="JenisCctv">Jenis CCTV</label>
                            <input class="form-control" type="text" id="JenisCctv" name="JenisCctv" placeholder="Jenis Sistem CCTV yang digunakan oleh Stakeholders">
                            <div class="invalid-feedback">
                                Kolom Jenis CCTV harus diisi
                            </div>
                        </div>
                        <div class="form-group" id="divSealProvider">
                            <label class="form-label" for="itProvider">Provider E-Seal</label>
                            <input class="form-control" type="text" id="sealProvider" name="sealProvider">
                            <div class="invalid-feedback">
                                Kolom Provider E-Seal harus diisi
                            </div>
                        </div>
                        <div class="form-group" id="divItProvider">
                            <label class="form-label" for="itProvider">Provider IT Inventory</label>
                            <input class="form-control" type="text" id="itProvider" name="itProvider">
                            <div class="invalid-feedback">
                                Kolom Provider IT Inventory harus diisi
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="Username">Username</label>
                            <input class="form-control" type="text" id="Username" name="Username" required>
                            <div class="invalid-feedback">
                                Kolom Username  harus diisi
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="Password">Password</label>
                            <input class="form-control" type="text" id="Password" name="Password" required>
                            <div class="invalid-feedback">
                                Kolom Password  harus diisi
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="Petunjuk">Petunjuk Akses</label>
                            <textarea class="form-control" id="Petunjuk" name="Petunjuk" rows="7"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="Status">Status</label>
                            <select class="form-control select2" id="Status" name="Status">
                                <option value="N">Tidak Aktif</option>
                                <option value="Y">Aktif</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="Ket">Keterangan</label>
                            <textarea class="form-control" id="Ket" name="ket" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="File">Upload User Manual</label>
                            <input class="form-control" type="file" name="File[]" id="File" multiple>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-themed" id="simpan" value="new">Simpan</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="assets/js/apps/ppbkb/browse.js"></script>