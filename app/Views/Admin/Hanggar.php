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
                        <button type="button" class="btn btn-xs btn-primary waves-effect waves-themed" id="tambah" style="margin-right: 10px;"><span class="fas fa-plus-circle"></span> Tambah Hanggar</button>
                        <button type="button" class="btn btn-xs btn-danger waves-effect waves-themed" id="reset" style="margin-right: 10px;"><span class="fas fa-undo"></span> Reset Hanggar</button>
                    </div>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <!-- datatable start -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="box box-default">
                                <div class="box-body">
                                    <table id="dataTable" class="table table-striped table-responsive table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%;"><p class="text-justify"> No </p></th>
                                                <th style=""><p class="text-justify"> SEKSI PKC </p></th>
                                                <th style=""><p class="text-justify"> GROUP HANGGAR </p></th>
                                                <th style=""><p class="text-justify"> LOKASI HANGGAR </p></th>
                                                <th style=""><p class="text-justify"> JUMLAH PETUGAS </p></th>
                                                <th style=""><p class="text-justify"> JUMLAH TPB </p></th>
                                                <th style="width: 5%;"><p class="text-justify"> Action </p></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                        <tfoot>
                                            <tr>
                                                <th style="width: 5%;"><p class="text-justify"> No </p></th>
                                                <th style=""><p class="text-justify"> SEKSI PKC </p></th>
                                                <th style=""><p class="text-justify"> GROUP HANGGAR </p></th>
                                                <th style=""><p class="text-justify"> LOKASI HANGGAR </p></th>
                                                <th style=""><p class="text-justify"> JUMLAH PETUGAS </p></th>
                                                <th style=""><p class="text-justify"> JUMLAH TPB </p></th>
                                                <th style="width: 5%;"><p class="text-justify"> Action </p></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- datatable end -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Section -->
<div class="modal fade" id="modalHanggar" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="dokumen">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">

                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="formHanggar">
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 control-label">Seksi PKC</label>
                        <div class="col-md-9 col-sm-9">
                            <select class="form-control select2" name="seksi" id="seksi" placeholder="Pilih Seksi PKC Yang Membawahi">
                                <option value="1">SEKSI PELAYANAN KEPABEANAN DAN CUKAI I</option>
                                <option value="2">SEKSI PELAYANAN KEPABEANAN DAN CUKAI II</option>
                                <option value="3">SEKSI PELAYANAN KEPABEANAN DAN CUKAI III</option>
                                <option value="4">SEKSI PELAYANAN KEPABEANAN DAN CUKAI IV</option>
                                <option value="5">SEKSI PELAYANAN KEPABEANAN DAN CUKAI V</option>
                                <option value="6">SEKSI PELAYANAN KEPABEANAN DAN CUKAI VI</option>
                                <option value="7">SEKSI PELAYANAN KEPABEANAN DAN CUKAI VII</option>
                                <option value="8">SEKSI PELAYANAN KEPABEANAN DAN CUKAI VIII</option>
                                <option value="9">SEKSI PELAYANAN KEPABEANAN DAN CUKAI IX</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 control-label">Nama Grup Hanggar</label>
                        <div class="col-md-9 col-sm-9">
                            <input class="form-control" type="input" name="groupHanggar" id="groupHanggar">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 control-label" id="labelLokasiHanggar">Lokasi Hanggar</label>
                        <div class="col-md-9 col-sm-9">
                            <select class="form-control select2" name="lokasiHanggar" id="lokasiHanggar">

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 control-label">Alamat Hanggar</label>
                        <div class="col-md-9 col-sm-9">
                            <input class="form-control" type="input" name="alamat" id="alamat">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="batal" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" id="simpan" class="btn btn-primary" onclick="save()">Simpan</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalPetugas" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="dokumen">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">

                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tabPetugas" data-toggle="tab" aria-expdanded="true">PETUGAS HANGGAR</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tabPerusahaan" data-toggle="tab" aria-expanded="true">PERUSAHAAN</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade show active" id="tabPetugas">
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-12 col-sm-12">
                                    <form id="formPetugas">
                                        <input type="hidden" name="idHanggar" value="">
                                        <div class="form-group">
                                            <label class="form-label">NAMA PEGAWAI</label>
                                            <div>
                                                <select class="form-control select2" name="idPegawai" id="idPegawai">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">NIP</label>
                                            <div>
                                                <input class="form-control" type="input" name="nip" disabled="disabled">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">PANGKAT</label>
                                            <div>
                                                <input class="form-control" type="input" name="pangkat" disabled="disabled">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">JABATAN</label>
                                            <div>
                                                <input class="form-control" type="input" name="jabatan" disabled="disabled">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-12 col-sm-12">
                                    <button type="button" id="simpan" class="btn btn-primary pull-right" onclick="tambah('hanggar')" style="margin-bottom: 10px;">TAMBAH</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <table class="table table-bordered table-hover table-responsive" id="tableHanggar">
                                        <thead>
                                            <th>No</th>
                                            <th>Nama Pegawai</th>
                                            <th>Pangkat</th>
                                            <th>Jabatan</th>
                                            <th>Action</th>
                                        </thead>
                                        <tfoot>
                                            <th>No</th>
                                            <th>Nama Pegawai</th>
                                            <th>Pangkat</th>
                                            <th>Jabatan</th>
                                            <th>Action</th>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tabPerusahaan">
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-12 col-sm-12">
                                    <form class="form-horizontal" id="formPerusahaan">
                                        <input type="hidden" name="idHanggar" value="">
                                        <div class="form-group">
                                            <label class="form-label">NAMA PERUSAHAAN</label>
                                            <div>
                                                <select class="form-control select2" name="idPerusahaan" id="idPerusahaan">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">FASILITAS</label>
                                            <div>
                                                <input class="form-control" type="input" name="fasilitas" disabled="disabled">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">SKEP</label>
                                            <div>
                                                <input class="form-control" type="input" name="skep" disabled="disabled">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">ALAMAT</label>
                                            <div>
                                                <input class="form-control" type="input" name="alamat" disabled="disabled">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-12 col-sm-12">
                                    <button type="button" id="simpan" class="btn btn-primary pull-right" onclick="tambah('perusahaan')" style="margin-bottom: 10px;">TAMBAH</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <table class="table table-bordered table-hover table-responsive" id="tablePerusahaan">
                                        <thead>
                                            <th>No</th>
                                            <th>Nama Perushaan</th>
                                            <th>Alamat</th>
                                            <th>Fasilitas</th>
                                            <th>Action</th>
                                        </thead>
                                        <tfoot>
                                            <th>No</th>
                                            <th>Nama Perushaan</th>
                                            <th>Alamat</th>
                                            <th>Fasilitas</th>
                                            <th>Action</th>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="batal" class="btn btn-default" data-dismiss="modal">TUTUP</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Section -->

<!-- Script Section -->
<script type="text/javascript">
    var save_method;
    var idEdit;
    var dataEdit;
    var table;
    var tableHanggar;
    var tablePerusahaan;

    $(document).ready(function() {
        // initialize class select2
        $(".select2").select2({
            width : '100%'
        });

        // dateMasking and datePicker
        $("#tanggal, #tglAwal, #tglAkhir").inputmask(
            'yyyy-mm-dd',{'placeholder' : 'yyyy-mm-dd'}
            );

        $("#tanggal, #tglAwal, #tglAkhir").datepicker({
            autoclose : true,
            format : 'yyyy-mm-dd'
        });

        $("#lokasiHanggar").select2({
            width : '100%',
            dropdownParent : $('#modalHanggar'),
            placeholder: 'Pilih Nama Perusahaan',
            minimumInputLength: 5,
            allowClear: true,
            ajax : {
                url : "pegawai/getPerusahaan",
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
                            id : item.id_perusahaan,
                            text : item.nama_perusahaan + " | " + item.nama_tpb + " | " + item.ijin_kelola_tpb
                        })
                    });
                    return{
                        results : results
                    };
                },
                cache : true
            }
        });

        $("#idPegawai").select2({
            width : '100%',
            dropdownParent : $('#modalPetugas'),
            placeholder: 'Pilih Nama Pegawai',
            minimumInputLength: 3,
            allowClear: true,
            ajax : {
                url : "pegawai/getByName",
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
                            id : item.IdPegawai,
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

        $("#idPerusahaan").select2({
            width : '100%',
            dropdownParent : $('#modalPetugas'),
            placeholder: 'Pilih Nama Perusahaan',
            minimumInputLength: 5,
            allowClear: true,
            ajax : {
                url : "pegawai/getPerusahaan",
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
                            id : item.id_perusahaan,
                            text : item.nama_perusahaan + " | " + item.nama_tpb + " | " + item.ijin_kelola_tpb
                        })
                    });
                    return{
                        results : results
                    };
                },
                cache : true
            }
        });

        // initialize dataTable
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
            "responsive" : true,
            "autoWidth"  : false,
            "bFilter"    : false,
            "bLengthChange": false,
            "order" : [],
            "columnDefs" : [
            {
                "targets"   : -1,
                "title"     : 'Action',
                "orderable" : false,
                "render"    : function(data, type, full, meta){
                    return "\n\t\t\t\t\t\t<div class='d-flex demo'>\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-success btn-icon btn-inline-block mr-1' title='List Petugas' onclick=\"petugas("+data+")\"><i class=\"fal fa-user\"></i></a>\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1' title='Edit Detail Hanggar' onclick=\"edit("+data+")\"><i class=\"fal fa-edit\"></i></a>\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-danger btn-icon btn-inline-block mr-1' title='Delete Record' onclick=\"hapusHanggar("+data+")\"><i class=\"fal fa-trash\"></i></a>\n\t\t\t\t\t\t\t</div>";
                }
            }],
            "ajax" : {
                "url" : "pegawai/datatableListHanggar",
                "type" : "POST",
            },
        });

        tableHanggar = $('#tableHanggar').DataTable({
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
            "responsive" : true,
            "autoWidth"  : false,
            "bFilter"    : false,
            "order" : [],
            "columnDefs" : [
            {
                "targets"   : -1,
                "title"     : 'Action',
                "orderable" : false,
                "render"    : function(data, type, full, meta){
                    return "\n\t\t\t\t\t\t<div class='d-flex demo'>\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-danger btn-icon btn-inline-block mr-1' title='Delete Record' onclick=\"cabut("+data+", 'hanggar')\"><i class=\"fal fa-times\"></i></a>\n\t\t\t\t\t\t\t</div>";
                }
            }],
            "ajax" : {
                "url" : "pegawai/datatableListHanggarPetugas",
                "type" : "POST",
            },
        });

        tablePerusahaan = $('#tablePerusahaan').DataTable({
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
            "responsive" : true,
            "autoWidth"  : false,
            "bFilter"    : false,
            "columnDefs" : [
            {
                "targets"   : -1,
                "title"     : 'Action',
                "orderable" : false,
                "render"    : function(data, type, full, meta){
                    return "\n\t\t\t\t\t\t<div class='d-flex demo'>\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-danger btn-icon btn-inline-block mr-1' title='Delete Record' onclick=\"cabut("+data+", 'perusahaan')\"><i class=\"fal fa-times\"></i></a>\n\t\t\t\t\t\t\t</div>";
                }
            }],
            "order" : [],
            "ajax" : {
                "url" : "pegawai/datatableListHanggarPerusahaan",
                "type" : "POST",
            },
        });

        // $("#formHanggar").validate({
        //     errorClass: "text-danger",
        //     validClass: "has-success",
        //     rules:{
        //         groupHanggar : 'required',
        //         lokasiHanggar: 'required',
        //         alamat : 'required'
        //     },
        //     messages: {
        //         groupHanggar : "Isi Nama Group Hanggar Terlebih Dahulu",
        //         lokasiHanggar: "Lokasi Group Hanggar Tidak Boleh Kosong",
        //         alamat : 'Alamat tidak boleh kosong'
        //     },
        //     errorElement: "span",
        //     errorPlacement:function(error,element){
        //         offset = element.offset();
        //         error.insertBefore(element);
        //     },
        //     highlight: function(element,errorClass, validClass){
        //         $(element).parents('.form-group').addClass("has-error").removeClass(validClass);

        //     },
        //     unhighlight: function(element, errorClass, validClass){
        //         $(element).parents('.form-group').removeClass("has-error").addClass(validClass);

        //         $('#lokasiHanggar').on('select2:select', function(event) {
        //             $('#labelLokasiHanggar').parent().removeClass('has-error').addClass('has-success');
        //             $("#lokasiHanggar-error").remove();
        //         });
        //     }
        // });
    });

$("#lokasiHanggar").on("select2:selecting", function(e) {
    id = e.params.args.data.id

    $.ajax({
        url: "pegawai/getTPBById",
        type: "GET",
        dataType: "JSON",
        data: {id: id},
        success: function(data){
            $("[name='alamat']").val(data.alamat);
        }
    })
});

$("#idPegawai").on("select2:selecting", function(e) {
    id = e.params.args.data.id
    console.log(id);
    $.ajax({
        url: "pegawai/getPegawaiById",
        type: "GET",
        dataType: "JSON",
        data: {ID: id},
        success: function(data){
            $("[name='nip']").val(data.NIPPegawai);
            $("[name='pangkat']").val(data.Pangkat);
            $("[name='jabatan']").val(data.NamaJabatan);
        }
    })
});

$("#idPerusahaan").on("select2:selecting", function(e) {
    id = e.params.args.data.id
    console.log(id);
    $.ajax({
        url: "pegawai/getTPBById",
        type: "GET",
        dataType: "JSON",
        data: {id: id},
        success: function(data){
            $("[name='fasilitas']").val(data.nama_tpb);
            $("[name='skep']").val(data.ijin_kelola_tpb);
            $("[name='alamat']").val(data.alamat);
        }
    })
});

$("#tambah").on('click', function(event) {
    event.preventDefault();
    /* Act on the event */
    save_method = "add";
    $("#formHanggar")[0].reset();
    $(".modal-title").text('Tambah Data Hanggar');
    $("#modalHanggar").modal("show");
});

$("#reset").on('click', function(event) {
    event.preventDefault();
    if (confirm("Seluruh Petugas Hanggar Akan di Reset?")) {
        $.ajax({
            url: "pegawai/resetHanggar",
            type: "GET",
            dataType: "JSON",
            data: {type: "admin"},
            success: function(data){
                alert(data);
                ajax_reload();
            }
        })  
    }
});

function selectedValue(a,b){
    var data = [{id:a,text:b}];
    var selectedVal = $("#lokasiHanggar");
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
        url: "pegawai/ajax_edit_hanggar",
        type: "GET",
        dataType: "JSON",
        data: {id: id},
        success: function(data){
            save_method = "update";
            idEdit = data.id;
            $('#seksi').val(data.idSeksiPKC);
            $('#seksi').trigger('change');
            $('[name="groupHanggar"]').val(data.grupHanggar);
            selectedValue(data.lokasiHanggar, data.nama_perusahaan);
            $('[name="alamat"]').val(data.alamat);
            $("#modalHanggar").modal('show');
        }
    })
}

function save(){
    var url;
    var data;
    var form = $("#formHanggar")[0];
    data = new FormData(form);

    if (save_method == "add") {
        url = "pegawai/ajax_add_hanggar";
    }else{
        url = "pegawai/ajax_update_hanggar";
        data.append('idHanggar',idEdit);
    }

    if ($("#formHanggar")[0].checkValidity() === true) {
        $.ajax({
            url: url,
            type: "POST",
            dataType: "JSON",
            data: data,
            contentType : false,
            cache : false,
            processData : false,
            success: function(data){
                alert(data);
                $("#modalHanggar").modal('hide');
                ajax_reload();
            }
        })
    } else {
        $('#formHanggar').addClass('was-validated');
    }
}

function ajax_reload() {
    table.ajax.reload(null, false);
}

function ajax_reloadHanggar(id){
    tableHanggar.ajax.url("pegawai/datatableListHanggarPetugas/"+id).load()
}

function ajax_reloadPerusahaan(id){
    tablePerusahaan.ajax.url("pegawai/datatableListHanggarPerusahaan/"+id).load()
}

function petugas(id) {
    $.ajax({
        url: "pegawai/getPetugasHanggar",
        type: "GET",
        dataType: "JSON",
        data: {id: id},
        success: function(data){
            $('[name="idHanggar"]').val(id);
            $(".modal-title").text(data.grupHanggar);
            ajax_reloadHanggar(id);
            ajax_reloadPerusahaan(id);
        }
    })
    .done(function() {
        $("#modalPetugas").modal("show");
    });
}

function tambah(a){
    var url;
    var data;
    var form;
    var formValidation;
    var id = $('[name="idHanggar"]').val();
    switch (a) {
        case "hanggar":
        form = $("#formPetugas")[0];
        formValidation = $("#formPetugas")[0];
        data = new FormData(form);
        break;
        default:
        form = $("#formPerusahaan")[0];
        formValidation = $("#formPerusahaan")[0];
        data = new FormData(form);
        break;
    }
    data.append('type',a);

    if (formValidation.checkValidity() === true) {
        $.ajax({
            url: "pegawai/ajax_tambah_petugas",
            type: "POST",
            dataType: "JSON",
            data: data,
            contentType : false,
            cache : false,
            processData : false,
            success: function(data){
                alert(data);
                ajax_reloadHanggar(id);
                ajax_reloadPerusahaan(id);
            }
        })
        .done(function() {
            ajax_reload();
        })
    } else {
        $('#formPetugas').addClass('was-validated');
    }
}

function cabut(id,a){
    var idHanggar = $('[name="idHanggar"]').val();
    $.ajax({
        url: "pegawai/ajax_cabut_petugas",
        type: "GET",
        dataType: "JSON",
        data: {id: id, type: a},
        success: function(data){
            alert(data);
            ajax_reloadHanggar(idHanggar);
            ajax_reloadPerusahaan(idHanggar);
        }
    })
    .done(function() {
        ajax_reload();
    });

}

function hapusHanggar(id){
    if(confirm('Data Hanggar akan dihapus?')){
        $.ajax({
            url: 'pegawai/ajax_delete_hanggar',
            type: 'POST',
            dataType: 'JSON',
            data: {id: id},
            success: function(data){
                alert(data.pesan);
            }
        })
        .done(function() {
            ajax_reload();
        })
    }    
}
</script>
<!-- Script Section -->