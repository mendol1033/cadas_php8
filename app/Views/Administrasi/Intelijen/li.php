<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    <?php echo $tableTitle;?> <span class="fw-300"><i>Table</i></span>
                </h2>
                <div class="panel-toolbar">
                    <div class="panel-toolbar flex-row-reverse">
                        <button id="btnFullscreen" class="btn btn-warning btn-pills btn-xs waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen" style="width: 90;">Fullscreen</button>
                        <button id="LI" class="btn btn-primary btn-pills btn-xs waves-effect waves-themed" data-toggle="tooltip" data-offset="0,10" style="width: 90; margin-right: 15px;"><i class="fal fa-file"></i> &nbsp;Buat LI</button>
                    </div>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <!-- datatable start -->
                    <table id="dataTable" class="table table-bordered table-hover table-striped w-100 dataTable no-footer" role="grid">
                        <thead>
                            <th>No</th>
                            <th>NOMOR LI</th>
                            <th>TANGGAL LI</th>
                            <th>TINDAK LANJUT</th>
                            <th>TUJUAN DISPOSISI</th>
                            <th>FLAG PROSES</th>
                            <th>Action</th>
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
<div class="modal fade" id="modalLi" tabindex="-1" role="dialog" aria-modal="true" data-backdrop="false">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" id="formLI" novalidate enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="form-label" for="NOMOR_LI">Nomor</label>
                                <input type="text" class="form-control" id="NOMOR_LI" name="NOMOR_LI_MASK" required>
                                <div class="invalid-feedback">
                                    Kolom Nomor Induk Berusaha Harus Diisi.
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="form-label" for="TANGGAL_LI">Tanggal</label>
                                <input type="text" class="form-control tanggal" id="TANGGAL_LI" name="TANGGAL_LI" required>
                                <div class="invalid-feedback">
                                    Kolom Nomor Induk Berusaha Harus Diisi.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-xl-3">
                            <h3><strong>SUMBER INFORMASI</strong></h3>
                        </div>
                        <div class="col-xl-3">
                            <div class="frame-wrap">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="SUMBER_LI_I" name="SUMBER_LI" value="I">
                                    <label class="custom-control-label" for="SUMBER_INFORMASI">Internal</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="SUMBER_LI_E" name="SUMBER_LI" value="E">
                                    <label class="custom-control-label" for="SUMBER_INFORMASI2">Eksternal</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="form-label" for="MEDIA">Media</label>
                                <input type="text" class="form-control" id="MEDIA" name="MEDIA" required>
                                <div class="invalid-feedback">
                                    Kolom Nomor Induk Berusaha Harus Diisi.
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="TANGGAL_TERIMA">Tanggal Terima</label>
                                <input type="text" class="form-control tanggal" id="TANGGAL_TERIMA" name="TANGGAL_TERIMA" required>
                                <div class="invalid-feedback">
                                    Kolom Nomor Induk Berusaha Harus Diisi.
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="NO_DOKUMEN">No. Dokumen</label>
                                <input type="text" class="form-control" id="NO_DOKUMEN" name="NO_DOKUMEN">
                                <div class="invalid-feedback">
                                    Kolom Nomor Induk Berusaha Harus Diisi.
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="TANGGAL_DOKUMEN">Tanggal</label>
                                <input type="text" class="form-control tanggal" id="TANGGAL_DOKUMEN" name="TANGGAL_DOKUMEN">
                                <div class="invalid-feedback">
                                    Kolom Nomor Induk Berusaha Harus Diisi.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="INFORMASI"><h3><strong>ISI INFORMASI</strong></h3></label>
                        <textarea class="form-control" id="INFORMASI" name="INFORMASI" rows="5" required></textarea>
                        <div class="invalid-feedback">
                            Kolom Nomor Induk Berusaha Harus Diisi.
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="form-label" for="TUJUAN_DISPOSISI">Disposisi Kepada</label>
                                <select class="form-control select2 nip" id="TUJUAN_DISPOSISI" name="TUJUAN_DISPOSISI" required>

                                </select>
                                <div class="invalid-feedback">
                                    Kolom Nomor Induk Berusaha Harus Diisi.
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="form-label" for="TANGGAL_DISPOSISI">Tanggal Disposisi</label>
                                <input type="text" class="form-control tanggal" id="TANGGAL_DISPOSISI" name="TANGGAL_DISPOSISI" required>
                                <div class="invalid-feedback">
                                    Kolom Nomor Induk Berusaha Harus Diisi.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-xl-3"><h3><strong>TINDAK LANJUT</strong></h3></div>
                        <div class="col-xl-3">
                            <div class="frame-wrap">
                                <div class="demo">
                                    <div class="custom-control custom-checkbox">
                                        <input type="radio" class="custom-control-input" id="TINDAK_LANJUT_K" name="TINDAK_LANJUT" value="K">
                                        <label class="custom-control-label" for="TINDAK_LANJUT_K">Klasifikasi</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="radio" class="custom-control-input" id="TINDAK_LANJUT_A" name="TINDAK_LANJUT" value="A">
                                        <label class="custom-control-label" for="TINDAK_LANJUT_A">Arsip</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-xl-3"><h3><strong>CATATAN</strong></h3></div>
                        <div class="col-xl-9">
                            <textarea class="form-control" id="CATATAN" name="CATATAN" rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="form-label" for="PEJABAT_TTD">Kasubsi Intelijen</label>
                                <select class="form-control select2 nip" name="PEJABAT_TTD" id="PEJABAT_TTD" required>

                                </select>
                                <div class="invalid-feedback">
                                    Kolom Nomor Induk Berusaha Harus Diisi.
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="form-label" for="NIP_PEJABAT_TTD">NIP Kasubsi</label>
                                <input type="text" class="form-control" id="NIP_PEJABAT_TTD" name="NIP_PEJABAT_TTD" required>
                                <div class="invalid-feedback">
                                    Kolom Nomor Induk Berusaha Harus Diisi.
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="form-label" for="PENYUSUN">Penyusun</label>
                                <select class="form-control select2 nip" name="PENYUSUN" id="PENYUSUN" required>

                                </select>
                                <div class="invalid-feedback">
                                    Kolom Nomor Induk Berusaha Harus Diisi.
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label class="form-label" for="NIP_PENYUSUN">NIP Penyusun</label>
                                <input type="text" class="form-control" id="NIP_PENYUSUN" name="NIP_PENYUSUN" required>
                                <div class="invalid-feedback">
                                    Kolom Nomor Induk Berusaha Harus Diisi.
                                </div>
                            </div>
                        </div>
                    </div>
                </form> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect waves-themed" id="back" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-themed" id="simpan" onclick="post('formLI')">Simpan</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = yyyy + '/' + mm + '/' + dd;
    $(document).ready(function(){
        var newLI;
        var year = new Date().getFullYear();

        $(':input').inputmask();
        $('[name="NOMOR_LI_MASK"]').inputmask({mask: "LI-9{1,3}/WBC.0\\9/KPP.MP.0702/"+year, gready: false});
        var controls = {
            leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
            rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
        }
        var pegawaiUrl = "Pegawai/getPegawaiByName"
        $('.tanggal').datepicker({
            language: "id",
            format: "yyyy-mm-dd",
            orientation: "bottom right",
            todayHighlight: true,
            templates: controls
        });

        tabel = $("#dataTable").DataTable({
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
                    return "\n\t\t\t\t\t\t<div class='d-flex demo'>\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-success btn-icon btn-inline-block mr-1' title='Send Record' onclick=\"kirim("+data+")\"><i class=\"fal fa-paper-plane\"></i></a>\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1' title='Edit' onclick=\"edit("+data+")\"><i class=\"fal fa-edit\"></i></a>\n\t\t\t\t\t\t\t</div>";
                }
            }],
            "ajax" : {
                "url" : "Administrasi/datatableListLI",
                "type" : "POST",
                "data" : {
                    "FLAG" : 0
                }
            },
        });

        $('[name="PENYUSUN"]').select2({
            placeholder: 'Ketik Nama Penyusun LI',
            dropdownParent: $('[name="PENYUSUN"]').parent(),
            minimumInputLength: 3,
            allowClear: true,
            ajax : {
                url : pegawaiUrl,
                dataType : "JSON",
                delay : 250,
                data : function(params){
                    return{
                        name : params.term
                    };
                },
                processResults: function(data){
                    // console.log(data);
                    var results = [];

                    $.each(data, function(index, item){
                        results.push({
                            id : item.NIPPegawai,
                            text : item.NamaPegawai
                        })
                    });
                    return{
                        results : results
                    };
                },
                cache : true
            }
        });

        $('[name="TUJUAN_DISPOSISI"]').select2({
            placeholder: 'Ketik Nama Penerima Disposisi',
            dropdownParent: $('[name="TUJUAN_DISPOSISI"]').parent(),
            minimumInputLength: 3,
            allowClear: true,
            ajax : {
                url : pegawaiUrl,
                dataType : "JSON",
                delay : 250,
                data : function(params){
                    return{
                        name : params.term
                    };
                    // console.log(params);
                },
                processResults: function(data){
                    // console.log(data);
                    var results = [];

                    $.each(data, function(index, item){
                        results.push({
                            id : item.NIPPegawai,
                            text : item.NamaPegawai
                        })
                    });
                    return{
                        results : results
                    };
                },
                cache : true
            }
        });

        $('[name="PEJABAT_TTD"]').select2({
            placeholder: 'Ketik Nama Kasubsi Intelijen',
            dropdownParent: $('[name="PEJABAT_TTD"]').parent(),
            minimumInputLength: 3,
            allowClear: true,
            ajax : {
                url : pegawaiUrl,
                dataType : "JSON",
                delay : 250,
                data : function(params){
                    return{
                        name : params.term
                    };
                },
                processResults: function(data){
                    var results = [];

                    $.each(data, function(index, item){
                        results.push({
                            id : item.NIPPegawai,
                            text : item.NamaPegawai
                        })
                    });
                    return{
                        results : results
                    };
                },
                cache : true
            }
        });
    });

    // LEMBAR INFORMASI FUNCTION
    $("#LI").on('click', function(event) {
        event.preventDefault();
        /* Act on the event */
        $("#formLI")[0].reset();
        $('.select2').trigger('change');
        getLastLINumber("LI");
        $('[name="TANGGAL_LI"]').val(today);
        $(".modal-title").text('Input Data Lembar Informasi');
        $("#modalLi").modal('show');
    });

    function getLastLINumber(doc){
        $.ajax({
            url: 'Administrasi/getNomorLi',
            type: 'GET',
            dataType: 'JSON',
            data: {tahun: new Date().getFullYear(), type: doc},
            success: function(d){
                $('[name="NOMOR_LI"]').val(d);
            }
        })
    }

    $('[name="PEJABAT_TTD"], [name="PENYUSUN"]').on('select2:select', function(e) {
        var sasaran;
        el = this.getAttribute('name');
        if (el == "PEJABAT_TTD") {
            sasaran = "NIP_PEJABAT_TTD";
        } else {
            sasaran = "NIP_PENYUSUN";
        }

        $('[name="'+sasaran+'"]').val(e.params.data.id);
    });

    function selectedValue(element,a,b){
        var data = [{id:a,text:b}];
        var selectedVal = $("#"+element);
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
        $.ajax({
            url: 'Administrasi/getLiById',
            type: 'GET',
            dataType: 'JSON',
            data: {ID: id},
            success: function(d){
                $('[name="NOMOR_LI_MASK"]').val(d.NOMOR_LI);
                $('[name="TANGGAL_LI"]').val(d.TANGGAL_LI);
                $('#SUMBER_LI_'+d.SUMBER_LI).attr('checked', 'checked');
                $('[name="MEDIA"]').val(d.MEDIA);
                $('[name="TANGGAL_TERIMA"]').val(d.TANGGAL_TERIMA);
                $('[name="NO_DOKUMEN"]').val(d.NO_DOKUMEN);
                $('[name="TANGGAL_DOKUMEN"]').val(d.TANGGAL_DOKUMEN);
                $('[name="INFORMASI"]').val(d.INFORMASI);
                selectedValue('TUJUAN_DISPOSISI', d.TUJUAN_DISPOSISI, d.NAMA_DISPOSISI);
                $('[name="TANGGAL_DISPOSISI"]').val(d.TANGGAL_DISPOSISI);
                $('#TINDAK_LANJUT_'+d.TINDAK_LANJUT).attr('checked', 'checked');
                selectedValue('PENYUSUN', d.PETUGAS_PENYUSUN, d.NAMA_PENYUSUN);
                $('[name="CATATAN"]').val(d.CATATAN);
                $('[name="NIP_PENYUSUN"]').val(d.PETUGAS_PENYUSUN);
                selectedValue('PEJABAT_TTD', d.PEJABAT_TTD, d.NAMA_PEJABAT_TTD);
                $('[name="NIP_PEJABAT_TTD"]').val(d.PEJABAT_TTD);

                $(".modal-title").text('Ubah Data Lembar Informasi');
                $('#modalLi').modal('show');
            }
        })       
    }

    function post(form){
        var usedForm = "#"+form;
        
        if ($(usedForm)[0].checkValidity() === false ) {
            play = document.getElementById('notification');
            $(usedForm).addClass('was-validated');
            toastr.error('Isi Form Dengan Lengkap dan Benar','Gagal');
            play.play();
            delete play;
        } else {
            var data = $(usedForm).serializeArray();
            var nomor_li = $('input[name="NOMOR_LI_MASK"]').inputmask('unmaskedvalue');
            data[data.length] = {name: 'NOMOR_LI', value: nomor_li};
            data[data.length] = {name: 'FORM', value: form};
            console.log(data);
            $.ajax({
                url: 'Administrasi/postDataIntelijen',
                type: 'POST',
                dataType: 'JSON',
                data: data,
                success: function(d){
                    play = document.getElementById('notification');
                    if (d.status == 'success') {
                        toastr.success(d.pesan,'Berhasil');
                    } else {
                        toastr.error(d.pesan,'Gagal');
                    }
                    
                    play.play();
                    delete play;
                    $("#modalLi").modal('hide');
                    tabel.ajax.reload();
                }
            })
        }      
    }

</script>