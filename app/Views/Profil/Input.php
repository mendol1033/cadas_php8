<div class="row">
    <div class="col-xl-12">
        <div id="alertSpace">

        </div>
        <div id="panel-4" class="panel">
            <div class="panel-hdr">
                <h2>
                    FORM <span class="fw-300"><i>Input Data Profil</i></span>
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
                                <div id="cp-1" class="card border" style="padding-left: 5px; padding-right: 5px;">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <h2>DATA SKOR CCTV</h2>
                                            <button class="btn btn-sm btn-default waves-effect waves-themed" data-toggle="collapse" data-target="#cp-1 > .seal" aria-expanded="true">
                                                <span class="collapsed-hidden"><i class="fal fa-arrow-right"></i></span>
                                                <span class="collapsed-reveal"><i class="fal fa-arrow-down"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body seal p-0 show">
                                        <form class="needs-validation" id="cctvForm" novalidate enctype="multipart/form-data">
                                            <div class="panel-tag">
                                                SKOR ATAS KULITAS GAMBAR DAN JARINGAN CCTV
                                            </div>
                                            <div class="form-group">
                                               <label class="form-label" for="PINTU_ORANG">Skor Pintu Orang</label>
                                               <input type="number" name="PINTU_ORANG" class="form-control" max="100" min="0">
                                           </div>
                                           <div class="form-group">
                                               <label class="form-label" for="PINTU_BARANG">Skor Pintu Barang</label>
                                               <input type="number" name="PINTU_BARANG" class="form-control" max="100" min="0">
                                           </div>
                                           <div class="form-group">
                                               <label class="form-label" for="PEMBONGKARAN">Skor Tempat Pembongkaran</label>
                                               <input type="number" name="PEMBONGKARAN" class="form-control" max="100" min="0">
                                           </div>
                                           <div class="form-group">
                                               <label class="form-label" for="MUAT">Skor Tempat Pemuatan</label>
                                               <input type="number" name="MUAT" class="form-control" max="100" min="0">
                                           </div>
                                           <div class="form-group">
                                               <label class="form-label" for="BAHAN_BAKU">Skor Tempat Penimbunan Bahan Baku</label>
                                               <input type="number" name="BAHAN_BAKU" class="form-control" max="100" min="0">
                                           </div>
                                           <div class="form-group">
                                               <label class="form-label" for="HASIL_PRODUKSI">Skor Tempat Penimbunan Barang Hasil Produksi</label>
                                               <input type="number" name="HASIL_PRODUKSI" class="form-control" max="100" min="0">
                                           </div>
                                           <div class="form-group">
                                               <label class="form-label" for="PLAYBACK">Menu Playback?</label>
                                               <div class="frame-wrap">
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input type="radio" class="custom-control-input" id="playback1" name="PLAYBACK" value="Y">
                                                    <label class="custom-control-label" for="playback1">Ada</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input type="radio" class="custom-control-input" id="playback2" name="PLAYBACK" value="N">
                                                    <label class="custom-control-label" for="playback2">Tidak Ada</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                           <label class="form-label" for="LAMA_PLAYBACK">Skor Durasi Playback</label>
                                           <input type="number" name="LAMA_PLAYBACK" class="form-control" max="100" min="0">
                                       </div>
                                       <div class="form-group">
                                           <label class="form-label" for="rata">Skor Rata-Rata</label>
                                           <input type="number" name="rata" class="form-control" max="100" min="0">
                                       </div>
                                   </form>
                               </div>
                           </div>
                       </div>
                       <div class="col-xl-4">
                        <div id="cp-1" class="card border" style="padding-left: 5px; padding-right: 5px;">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h2>DATA SKOR OPERASIONAL</h2>
                                    <button class="btn btn-sm btn-default waves-effect waves-themed" data-toggle="collapse" data-target="#cp-1 > .it" aria-expanded="true">
                                        <span class="collapsed-hidden"><i class="fal fa-arrow-right"></i></span>
                                        <span class="collapsed-reveal"><i class="fal fa-arrow-down"></i></span>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body it p-0 show">
                                <form class="needs-validation" id="operasionalForm" novalidate enctype="multipart/form-data">
                                    <div class="panel-tag">
                                        SKOR INTEGRITAS DAN RESPONSIBILITY
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="INTEGRITAS">Skor Integritas</label>
                                        <input type="number" name="INTEGRITAS" class="form-control" max="100" min="0">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="RESPONSIBILITY">Skor Responsibilty</label>
                                        <input type="number" name="RESPONSIBILITY" class="form-control" max="100" min="0">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="RATA_INTEGRITAS_RESPONSIBILITY">Rata-Rata</label>
                                        <input type="number" name="RATA_INTEGRITAS_RESPONSIBILITY" class="form-control" max="100" min="0">
                                    </div>
                                    <div class="panel-tag">
                                        SKOR MASUKAN INTERNAL / EKSTERNAL DJBC
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="PELORO">Skor Seksi P2</label>
                                        <input type="number" name="PELORO" class="form-control" max="100" min="0">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="PERBEN">Skor Seksi Perbendaharaan</label>
                                        <input type="number" name="PERBEN" class="form-control" max="100" min="0">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="PABEAN">Skor Seksi PKC</label>
                                        <input type="number" name="PABEAN" class="form-control" max="100" min="0">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="KI">Skor Seksi KI</label>
                                        <input type="number" name="KI" class="form-control" max="100" min="0">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="UNIT_LAIN">Skor Seksi Unit Lainnya</label>
                                        <input type="number" name="UNIT_LAIN" class="form-control" max="100" min="0">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="RATA_MASUKAN">Rata-Rata</label>
                                        <input type="number" name="RATA_MASUKAN" class="form-control" max="100" min="0">
                                    </div>
                                    <div class="panel-tag">
                                        SKOR KEIKUTSERTAAN DALAM ASOSIASI TEMPAT PENIMBUNAN BERIKAT
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="ASOSIASI">Skor Asosiasi</label>
                                        <input type="number" name="ASOSIASI" class="form-control" max="100" min="0">
                                    </div>
                                    <div class="panel-tag">
                                        SKOR PENILAIAN KESESUAIAN IT INVENTORY, KEANDALAN CCTV, SPI, DAN KELAYAKAN FISIK
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="IT">Skor IT Inventory</label>
                                        <input type="number" name="IT" class="form-control" max="100" min="0">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="CCTV">Skor CCTV</label>
                                        <input type="number" name="CCTV" class="form-control" max="100" min="0">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="SPI">Skor Sistem Pengendalian Internal</label>
                                        <input type="number" name="SPI" class="form-control" max="100" min="0">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="FISIK">Skor Kelayakan Fisik</label>
                                        <input type="number" name="FISIK" class="form-control" max="100" min="0">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="RATA_PENILAIAN">Rata-Rata</label>
                                        <input type="number" name="RATA_PENILAIAN" class="form-control" max="100" min="0">
                                    </div>
                                    <div class="panel-tag">
                                        SKOR KUALITAS DAMPAK EKONOMI
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="DAMPAK_EKONOMI">Skor Dampak Ekonomi</label>
                                        <input type="number" name="DAMPAK_EKONOMI" class="form-control" max="100" min="0">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div id="cp-1" class="card border" style="padding-left: 5px; padding-right: 5px">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h2>DATA SKOR CEISA 40</h2>
                                    <button class="btn btn-sm btn-default waves-effect waves-themed" data-toggle="collapse" data-target="#cp-1 > .cctv" aria-expanded="true">
                                        <span class="collapsed-hidden"><i class="fal fa-arrow-right"></i></span>
                                        <span class="collapsed-reveal"><i class="fal fa-arrow-down"></i></span>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body cctv p-0 show">
                                <form class="needs-validation" id="ceisaForm" novalidate enctype="multipart/form-data">
                                    <div class="panel-tag">
                                        SKOR PROFILING TERMUTAKHIR DARI CEISA 40
                                    </div>
                                   <div class="form-group">
                                       <label class="form-label" for="inheren">Skor Inheren</label>
                                       <input type="number" name="inheren" class="form-control" max="100" min="0">
                                   </div>
                                   <div class="form-group">
                                       <label class="form-label" for="operasional">Skor Operasional</label>
                                       <input type="number" name="operasional" class="form-control" max="100" min="0">
                                   </div>
                                   <div class="form-group">
                                       <label class="form-label" for="rekam_jejak">Skor Rekam Jejak</label>
                                       <input type="number" name="rekam_jejak" class="form-control" max="100" min="0">
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
                        search: params.term
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