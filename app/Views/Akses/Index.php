<div class="row">
    <div class="col-xl-12">
        <div id="alertSpace">

        </div>
        <div id="panel-4" class="panel">
            <div class="panel-hdr">
                <h2>
                    FORM <span class="fw-300"><i>Input Data Akses</i></span>
                </h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <!-- <button class="btn btn-panel waves-effect waves-themed" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button> -->
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="col-xl-12" style="margin-bottom: 15px;">
                        <form class="needs-validation" id="mainForm" novalidate enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="form-label" for="nama">Nama Perusahaan</label>
                                <select class="form-control select2" name="nama" id="nama" required>

                                </select>
                                <div class="invalid-feedback">
                                    Kolom Nomor Induk Berusaha Harus Diisi.
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="NPWP">Nomor Pokok Wajib Pajak (NPWP)</label>
                                <input type="text" class="form-control" id="NPWP" name="npwp-mask" placeholder="Input Nomor Pokok Wajib Pajak" data-inputmask="'mask':'99.999.999.9-999.999'" readonly>
                                <div class="invalid-feedback">
                                    Kolom Nomor Pokok Wajib Pajak (NPWP) Harus Diisi.
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label class="form-label" for="fasilitas">Jenis Fasilitas</label>
                                        <select class="form-control select2" id="fasilitas" name="fasilitas" disabled>
                                            <?php foreach ($options['fasTPB'] as $key => $value) { ?>
                                                <option value="<?php echo $key?>"><?php echo $value ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            Kolom Jenis Fasilitas Harus Diisi.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label class="form-label" for="jns-tpb">Jenis TPB</label>
                                        <select class="form-control select2" id="jns-tpb" name="jns-tpb" disabled>
                                        </select>
                                        <div class="invalid-feedback">
                                            Kolom Jenis TPB Harus Diisi.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap Pabrik" readonly>
                                <div class="invalid-feedback">
                                    Kolom Alamat Pabrik Harus Diisi.
                                </div>
                            </div> 
                        </form>
                    </div>
                    <div class="col-xl-12" style="margin-bottom: 15px;">
                        <div class="row">
                           <div class="col-xl-4">
                            <div id="cp-1" class="card border" style="padding-left: 5px; padding-right: 5px">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between">
                                        <h2>DATA CCTV</h2>
                                        <button class="btn btn-sm btn-default waves-effect waves-themed" data-toggle="collapse" data-target="#cp-1 > .cctv" aria-expanded="true">
                                            <span class="collapsed-hidden"><i class="fal fa-arrow-right"></i></span>
                                            <span class="collapsed-reveal"><i class="fal fa-arrow-down"></i></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body cctv p-0 show">
                                    <form class="needs-validation" id="cctvForm" novalidate enctype="multipart/form-data">
                                        <input type="hidden" name="cctv" value="1">
                                        <div class="form-group">
                                            <label class="form-label" for="cctvJenis">Jenis Akses</label>
                                            <select class="form-control select2" id="cctvJenis" name="cctvJenis" required>
                                                <option value="1">Web Aplication</option>
                                                <option value="2">Remote Dekstop</option>
                                                <option value="3">Remote Application</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="cctvAplikasi">Aplikasi Akses</label>
                                            <select class="form-control select2" id="cctvAplikasi" name="cctvAplikasi" required>
                                                <option value="1">Browser</option>
                                                <option value="2">Dekstop Application</option>
                                                <option value="3">Dekstop Application With VPN Akses</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="cctvNamaAplikasi">Nama Aplikasi</label>
                                            <select class="form-control" id="cctvNamaAplikasi" name="cctvNamaAplikasi" required>
                                                
                                            </select>
                                            <div class="invalid-feedback">
                                                Kolom Nama Aplikasi harus diisi
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="cctvAkses">Alamat Akses</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="http" name="cctvProtocol" value="http://" class="custom-control-input" checked>
                                                            <label class="custom-control-label" for="http">http://</label>
                                                        </div>
                                                    </div>
                                                    <div class="input-group-text">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="https" name="cctvProtocol" value="https://" class="custom-control-input">
                                                            <label class="custom-control-label" for="https">https://</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" id="cctvAkses" name="cctvAkses" required>
                                            </div>
                                            <div class="invalid-feedback">
                                                Kolom Alamat Akses CCTV Berusaha Harus Diisi.
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="cctvJenisCctv">Jenis CCTV</label>
                                            <input class="form-control" type="text" id="cctvJenisCctv" name="cctvJenisCctv" placeholder="Jenis Sistem CCTV yang digunakan oleh Stakeholders" required>
                                            <div class="invalid-feedback">
                                                Kolom Jenis CCTV harus diisi
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="cctvUsername">Username</label>
                                            <input class="form-control" type="text" id="cctvUsername" name="cctvUsername" required>
                                            <div class="invalid-feedback">
                                                Kolom Username CCTV harus diisi
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="cctvPassword">Password</label>
                                            <input class="form-control" type="text" id="cctvPassword" name="cctvPassword" required>
                                            <div class="invalid-feedback">
                                                Kolom Password CCTV harus diisi
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="cctvPetunjuk">Petunjuk Akses</label>
                                            <textarea class="form-control" id="cctvPetunjuk" name="cctvPetunjuk" rows="7"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="cctvStatus">Status</label>
                                            <select class="form-control select2" id="cctvStatus" name="cctvStatus">
                                                <option value="N">Tidak Aktif</option>
                                                <option value="Y">Aktif</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="cctvKet">Keterangan</label>
                                            <textarea class="form-control" id="cctvKet" name="cctvket" rows="2"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="cctvFile">Upload User Manual</label>
                                            <input class="form-control" type="file" name="cctvFile[]" id="cctvFile" multiple>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div id="cp-1" class="card border" style="padding-left: 5px; padding-right: 5px;">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between">
                                        <h2>DATA IT INVENTORY</h2>
                                        <button class="btn btn-sm btn-default waves-effect waves-themed" data-toggle="collapse" data-target="#cp-1 > .it" aria-expanded="true">
                                            <span class="collapsed-hidden"><i class="fal fa-arrow-right"></i></span>
                                            <span class="collapsed-reveal"><i class="fal fa-arrow-down"></i></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body it p-0 show">
                                    <form class="needs-validation" id="itForm" novalidate enctype="multipart/form-data">
                                        <input type="hidden" name="it" value="2">
                                        <div class="form-group">
                                            <label class="form-label" for="itJenis">Jenis Akses</label>
                                            <select class="form-control select2" id="itJenis" name="itJenis" required>
                                                <option value="1">Web Aplication</option>
                                                <option value="2">Remote Dekstop</option>
                                                <option value="3">Remote Application</option>
                                                <option value="4">Web Service</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="itAplikasi">Aplikasi Akses</label>
                                            <select class="form-control select2" id="itAplikasi" name="itAplikasi" required>
                                                <option value="1">Browser</option>
                                                <option value="2">Dekstop Application</option>
                                                <option value="3">Dekstop Application With VPN Akses</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="itNamaAplikasi">Nama Aplikasi</label>
                                            <select class="form-control" id="itNamaAplikasi" name="cctvNamaAplikasi" required>
                                                
                                            </select>
                                            <div class="invalid-feedback">
                                                Kolom Nama Aplikasi harus diisi
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="itAkses">Alamat Akses</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="http" name="itProtocol" value="http://" class="custom-control-input" checked>
                                                            <label class="custom-control-label" for="http">http://</label>
                                                        </div>
                                                    </div>
                                                    <div class="input-group-text">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="https" name="itProtocol" value="https://" class="custom-control-input">
                                                            <label class="custom-control-label" for="https">https://</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" id="itAkses" name="itAkses" required>
                                            </div>
                                            <div class="invalid-feedback">
                                                Kolom Alamat Akses IT Berusaha Harus Diisi.
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="itProvider">Provider IT Inventory</label>
                                            <input class="form-control" type="text" id="itProvider" name="itProvider" required>
                                            <div class="invalid-feedback">
                                                Kolom Provider IT Inventory harus diisi
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="itUsername">Username</label>
                                            <input class="form-control" type="text" id="itUsername" name="itUsername" required>
                                            <div class="invalid-feedback">
                                                Kolom Username harus diisi
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="itPassword">Password</label>
                                            <input class="form-control" type="text" id="itPassword" name="itPassword" required>
                                            <div class="invalid-feedback">
                                                Kolom Password harus diisi
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="itPetunjuk">Petunjuk Akses</label>
                                            <textarea class="form-control" id="itPetunjuk" name="itPetunjuk" rows="7"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="itStatus">Status</label>
                                            <select class="form-control select2" id="itStatus" name="itStatus">
                                                <option value="N">Tidak Aktif</option>
                                                <option value="Y">Aktif</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="itKet">Keterangan</label>
                                            <textarea class="form-control" id="itKet" name="itket" rows="2"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="itFile">Upload User Manual</label>
                                            <input class="form-control" type="file" name="itFile[]" id="itFile" multiple>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div id="cp-1" class="card border" style="padding-left: 5px; padding-right: 5px;">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between">
                                        <h2>DATA E-SEAL</h2>
                                        <button class="btn btn-sm btn-default waves-effect waves-themed" data-toggle="collapse" data-target="#cp-1 > .seal" aria-expanded="true">
                                            <span class="collapsed-hidden"><i class="fal fa-arrow-right"></i></span>
                                            <span class="collapsed-reveal"><i class="fal fa-arrow-down"></i></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body seal p-0 show">
                                    <form class="needs-validation" id="sealForm" novalidate enctype="multipart/form-data">
                                        <input type="hidden" name="seal" value="3">
                                        <div class="form-group">
                                            <label class="form-label" for="sealJenis">Jenis Akses</label>
                                            <select class="form-control select2" id="sealJenis" name="sealJenis" >
                                                <option value="1">Web Aplication</option>
                                                <option value="2">Remote Dekstop</option>
                                                <option value="3">Remote Application</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="sealAplikasi">Aplikasi Akses</label>
                                            <select class="form-control select2" id="sealAplikasi" name="sealAplikasi" >
                                                <option value="1">Browser</option>
                                                <option value="2">Dekstop Application</option>
                                                <option value="3">Dekstop Application With VPN Akses</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="sealNamaAplikasi">Nama Aplikasi</label>
                                            <select class="form-control" id="sealNamaAplikasi" name="cctvNamaAplikasi">
                                                
                                            </select>
                                            <div class="invalid-feedback">
                                                Kolom Nama Aplikasi harus diisi
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="sealAkses">Alamat Akses</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="http" name="sealProtocol" value="http://" class="custom-control-input" checked>
                                                            <label class="custom-control-label" for="http">http://</label>
                                                        </div>
                                                    </div>
                                                    <div class="input-group-text">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="https" name="sealProtocol" value="https://" class="custom-control-input">
                                                            <label class="custom-control-label" for="https">https://</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" id="sealAkses" name="sealAkses" >
                                            </div>
                                            <div class="invalid-feedback">
                                                Kolom Alamat Akses E-SEAL Harus Diisi.
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="itProvider">Provider E-Seal</label>
                                            <input class="form-control" type="text" id="sealProvider" name="sealProvider" >
                                            <div class="invalid-feedback">
                                                Kolom Provider E-Seal harus diisi
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="sealUsername">Username</label>
                                            <input class="form-control" type="text" id="sealUsername" name="sealUsername" >
                                            <div class="invalid-feedback">
                                                Kolom Username E-SEAL harus diisi
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="sealPassword">Password</label>
                                            <input class="form-control" type="text" id="sealPassword" name="sealPassword" >
                                            <div class="invalid-feedback">
                                                Kolom Password E-SEAL harus diisi
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="sealPetunjuk">Petunjuk Akses</label>
                                            <textarea class="form-control" id="sealPetunjuk" name="sealPetunjuk" rows="7"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="sealStatus">Status</label>
                                            <select class="form-control select2" id="sealStatus" name="sealStatus">
                                                <option value="N">Tidak Aktif</option>
                                                <option value="Y">Aktif</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="sealKet">Keterangan</label>
                                            <textarea class="form-control" id="sealKet" name="sealket" rows="2"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="sealFile">Upload User Manual</label>
                                            <input class="form-control" type="file" name="sealFile[]" id="sealFile" multiple>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center">
                    <button class="btn btn-primary ml-auto waves-effect waves-themed" type="submit" id="simpan">Submit form</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>   
<script type="text/javascript">
    $(document).ready(function() {
        $(':input').inputmask();
        $('.select2').select2({
            width: '100%'
        });

        $('#cctvNamaAplikasi').select2({
            width: '100%',
            allowClear: true,
            placeholder: 'Input Nama Aplikasi Yang Digunakan',
            ajax: {
                url: 'Akses/getReferensi?jenis=1&column=APLIKASI_AKSES',
                dataType: 'JSON',
                data: function(params){
                    return{
                        search: params.term
                    }
                },
                processResults: function(d){
                    if (typeof d.data !== 'undefined') {
                        var results = [];

                        $.each(d.data, function(index, val) {
                             results.push({
                                id: val.APLIKASI_AKSES,
                                text: val.APLIKASI_AKSES
                             })
                        });
                        return{
                            results: results
                        }
                    } else {
                        return {results: [{id: d.post, text: d.post}]};
                    }
                },
                cache: true,
            }
        });

        $('#itNamaAplikasi').select2({
            width: '100%',
            allowClear: true,
            placeholder: 'Input Nama Aplikasi Yang Digunakan',
            ajax: {
                url: 'Akses/getReferensi?jenis=2&column=APLIKASI_AKSES',
                dataType: 'JSON',
                data: function(params){
                    return{
                        search: params.term
                    }
                },
                processResults: function(d){
                    if (typeof d.data !== 'undefined') {
                        var results = [];

                        $.each(d.data, function(index, val) {
                             results.push({
                                id: val.APLIKASI_AKSES,
                                text: val.APLIKASI_AKSES
                             })
                        });
                        return{
                            results: results
                        }
                    } else {
                        return {results: [{id: d.post, text: d.post}]};
                    }
                },
                cache: true,
            }
        });

        $('#sealNamaAplikasi').select2({
            width: '100%',
            allowClear: true,
            placeholder: 'Input Nama Aplikasi Yang Digunakan',
            ajax: {
                url: 'Akses/getReferensi?jenis=3&column=APLIKASI_AKSES',
                dataType: 'JSON',
                data: function(params){
                    return{
                        search: params.term
                    }
                },
                processResults: function(d){
                    if (typeof d.data !== 'undefined') {
                        var results = [];

                        $.each(d.data, function(index, val) {
                             results.push({
                                id: val.APLIKASI_AKSES,
                                text: val.APLIKASI_AKSES
                             })
                        });
                        return{
                            results: results
                        }
                    } else {
                        return {results: [{id: d.post, text: d.post}]};
                    }
                },
                cache: true,
            }
        });

        $('#nama').select2({
            width: '100%',
            ajax: {
                url: "Stakeholders/getStakeholders",
                dataType: "JSON",
                data: function(params){
                    return{
                        nama: params.term
                    }
                },
                processResults: function(data){
                    if (data.length > 0) {
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
                        return {results : [{id: 0, text: 'DATA TIDAK DITEMUKAN'}]};
                    }

                },
                cache : true,
            }
        })
    });

    $('#nama').on('select2:select', function(event) {
        event.preventDefault();
        /* Act on the event */
        val = $('#nama').find(':selected');
        $.ajax({
            url: 'Stakeholders/getStakeholdersById',
            type: 'GET',
            dataType: 'JSON',
            data: {ID: val[0].value},
            success: function(d){
                getJnsTpb(d.FASILITAS);
            }
        })
        .done(function(d){
            setTimeout(setValue, 300, d);
        })
    });

    function getJnsTpb(fas){
        $.ajax({
            url: 'Stakeholders/getReferensi',
            type: 'GET',
            dataType: 'JSON',
            data: {search: fas},
            success: function(d){
                $('#jns-tpb').empty();
                $.each(d, function(index, val) {
                 /* iterate through array or object */
                 $("#jns-tpb").append('<option value="'+val.IdReferensi+'">'+val.NmReferensi+' / '+val.DetailReferensi+'</option>');
             });
            }
        })        
    }

    function setValue(d){
        $('[name="namaPerusahaan"]').val(d.NAMA_PERUSAHAAN);
        $('[name="npwp-mask"]').val(d.NPWP);
        $('[name="fasilitas"]').val(d.FASILITAS);
        $('[name="jns-tpb"]').val(d.JENIS);
        $('[name="alamat"]').val(d.ALAMAT_PABRIK);
        $('.select2').trigger('change');
    }

    $('#simpan').on('click', function(event) {
        event.preventDefault();
        /* Act on the event */
        if ($('#mainForm')[0].checkValidity() === false || $('#cctvForm')[0].checkValidity() === false || $('#itForm')[0].checkValidity() === false) {
            play = document.getElementById('notification');
            $("#mainForm ,#cctvForm, #itForm").addClass('was-validated');
            toastr.error('Isi Form Dengan Lengkap dan Benar','Gagal');
            play.play();
            delete play;
        } else {
            var data = new FormData();
            for (var i = 0; i < document.forms.length; i++) {
                var form = document.forms[i];
                var d = new FormData(form);
                var formValues = d.entries();
                while (!(ent = formValues.next()).done) {
                    data.append(`${ent.value[0]}`, ent.value[1]);
                }
            }
            $.ajax({
                url: 'Akses/ajaxAdd',
                type: 'POST',
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                dataType: 'JSON',
                success: function(d){
                    play = document.getElementById('notification');
                    if (d.status === 'success') {
                        toastr.success(d.pesan,'Berhasil');
                    } else {
                        toastr.error(d.pesan, 'Gagal');
                    }
                    play.play();
                    delete play;
                }
            })
        }
    });
</script>