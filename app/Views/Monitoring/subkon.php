<div class="row">
    <div class="col-xl-12">
        <div class="border-faded bg-faded p-3 mb-g d-flex">
            <div class="col-xl-9">
                <input type="text" id="js-filter-contacts" name="filter-contacts" class="form-control shadow-inset-2 form-control-lg" placeholder="Nomor Persetujuan Subkontrak" name="persetujuan">
            </div>
            <div class="col-xl-3">
                <button type="button" class="btn btn-lg btn-outline-primary waves-effect waves-themed" id="cari">
                    <span class="fal fa-search mr-1"></span>
                    Cari Data
                </button>
                <button type="button" class="btn btn-lg btn-outline-primary waves-effect waves-themed" id="rekam">
                    <span class="fal fa-file-plus mr-1"></span>
                    Rekam
                </button>
            </div>
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
                            <th>No</th>
                            <th>NPWP</th>
                            <th>Nomor Surat</th>
                            <th>Tanggal Surat</th>
                            <th>Npwp Penerima</th>
                            <th>Nama Penerima</th>
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
<!-- Modal Section -->
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-modal="true" data-backdrop="false">
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
                    <div class="panel-tag">
                    </div>
                    <ul class="nav nav-tabs justify-content-end" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#header" role="tab">Header</a></li>
                        <li class="nav-item"><a class="nav-link disabled" data-toggle="tab" href="#bbForm" role="tab">Bahan Baku</a></li>
                        <li class="nav-item"><a class="nav-link disabled" data-toggle="tab" href="#bjForm" role="tab">Barang Jadi</a></li>
                        <li class="nav-item"><a class="nav-link disabled" data-toggle="tab" href="#bsForm" role="tab">Bahan Sisa</a></li>
                    </ul>
                    <div class="tab-content p-3">
                        <div class="tab-pane fade show active" id="header" role="tabpanel">
                            <form class="needs-validation" id="form" novalidate enctype="multipart/form-data">
                                <h2>Pemberi Kerja</h2>
                                <div class="form-group">
                                    <label class="form-label" for="persetujuan">Nomor Surat Persetujuan</label>
                                    <input type="text" class="form-control" id="persetujuan" name="persetujuan" placeholder="Input Nomor Surat Persetujuan" data-inputmask="'mask':'S-9{1,6}'" required>
                                    <div class="invalid-feedback">
                                        Kolom Nomor Surat Persetujuan Harus Diisi.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="tanggal">Tanggal Surat Persetujuan</label>
                                    <input type="text" class="form-control tanggal" id="tanggal" name="tanggal" placeholder="dd/mm/yyyy" required>
                                    <div class="invalid-feedback">
                                        Kolom Tanggal Surat Persetujuan Harus Diisi.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="perusahaan">Nama Perusahaan</label>
                                    <select class="form-control select2" id="perusahaan" name="perusahaan" required>
                                    </select>
                                    <div class="invalid-feedback">
                                        Kolom Nama Perusahaan Harus Diisi.
                                    </div>
                                </div>
                                <h2>Penerima Barang</h2>
                                <div class="form-group">
                                    <label class="form-label" for="penerima">Nama Penerima</label>
                                    <input type="text" class="form-control" id="penerima" name="penerima" required>
                                    <div class="invalid-feedback">
                                        Kolom Nama Penerima Harus Diisi.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="npwp">NPWP Penerima</label>
                                    <input type="text" class="form-control" id="npwp" name="npwp-mask" data-inputmask="'mask':'99.999.999.9-999.999'" required>
                                    <div class="invalid-feedback">
                                        Kolom NPWP Penerima Harus Diisi.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="alamat">Alamat Penerima</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                                    <div class="invalid-feedback">
                                        Kolom Alamat Penerima Harus Diisi.
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-7">
                                        <div class="form-group">
                                            <label class="form-label" for="noKontrak">Nomor Kontrak Kerja</label>
                                            <input type="text" class="form-control" id="noKontrak" name="noKontrak" required>
                                            <div class="invalid-feedback">
                                                Kolom Nomor Kontrak Kerja Harus Diisi.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-5">
                                        <div class="form-group">
                                            <label class="form-label" for="tanggalKontrak">Tanggal Kontrak</label>
                                            <input type="text" class="form-control tanggal" id="tanggalKontrak" name="tanggalKontrak" placeholder="dd/mm/yyyy" required>
                                            <div class="invalid-feedback">
                                                Kolom Tanggal Kontrak Harus Diisi.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="pekerjaan">Pekerjaan</label>
                                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
                                    <div class="invalid-feedback">
                                        Kolom Pekerjaan Harus Diisi.
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="form-label" for="jaminan">Nilai Jaminan</label>
                                            <input type="text" class="form-control" id="jaminan" name="jaminan-mask" required>
                                            <div class="invalid-feedback">
                                                Kolom Nilai Jaminan Harus Diisi.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="form-label" for="jatuhTempo">Tanggal Jatuh Tempo</label>
                                            <input type="text" class="form-control tanggal" id="jatuhTempo" name="jatuhTempo" placeholder="dd/mm/yyyy" required>
                                            <div class="invalid-feedback">
                                                Kolom Tanggal Jatuh Tempo Harus Diisi.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade show" id="bbForm" role="tabpanel">
                            <form id="formbb">
                                <div class="form-group">
                                    <label class="form-label" for="uraianBb">Uraian Barang, Merk, Ukuran, Tipe, Spesifikasi Lain</label>
                                    <input type="text" class="form-control" id="uraianBb" name="uraianBb">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="kodeBb">Kode Barang</label>
                                    <input type="text" class="form-control" id="kodeBb" name="kodeBb">
                                </div>
                                <div class="row">
                                    <div class="col-xl-9">
                                        <div class="form-group">
                                            <label class="form-label" for="jumlahBb">Jumlah Satuan</label>
                                            <input type="text" class="form-control" id="jumlahBb" name="jumlahBb">
                                        </div>
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="form-group">
                                            <label class="form-label" for="satuanBb">Jenis Satuan</label>
                                            <input type="text" class="form-control" id="satuanBb" name="satuanBb">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="ketBb">Keterangan</label>
                                    <input type="text" class="form-control" id="ketBb" name="ketBb">
                                </div>
                                <div class="row">
                                    <div class="col-xl-4 ml-auto d-inline-flex justify-content-end">
                                        <button type="button" class="btn btn-secondary waves-effect pos-right" id="addBb">Tambah Bahan Baku</button>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-xl-12">
                                    <table id="tableBb" class="table table-bordered table hover table striped w-100">
                                        <thead>
                                            <th>No</th>
                                            <th>Uraian Barang, Merk, Ukuran, Tipe, Spesifikasi Lain</th>
                                            <th>Kode Barang</th>
                                            <th>Jumlah Satuan</th>
                                            <th>Jenis Satuan</th>
                                            <th>Keterangan</th>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="bjForm" role="tabpanel">
                            <form id="formbj">
                                <div class="form-group">
                                    <label class="form-label" for="uraianBj">Uraian Barang, Merk, Ukuran, Tipe, Spesifikasi Lain</label>
                                    <input type="text" class="form-control" id="uraianBj" name="uraianBj">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="kodeBj">Kode Barang</label>
                                    <input type="text" class="form-control" id="kodeBj" name="kodeBj">
                                </div>
                                <div class="row">
                                    <div class="col-xl-9">
                                        <div class="form-group">
                                            <label class="form-label" for="jumlahBj">Jumlah Satuan</label>
                                            <input type="text" class="form-control" id="jumlahBj" name="jumlahBj">
                                        </div>
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="form-group">
                                            <label class="form-label" for="satuanBj">Jenis Satuan</label>
                                            <input type="text" class="form-control" id="satuanBj" name="satuanBj">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="ketBj">Keterangan</label>
                                    <input type="text" class="form-control" id="ketBj" name="ketBj">
                                </div>
                                <div class="row">
                                    <div class="col-xl-4 ml-auto d-inline-flex justify-content-end">
                                        <button type="button" class="btn btn-secondary waves-effect pos-right" id="addBj">Tambah Barang Jadi</button>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-xl-12">
                                    <table id="tableBj" class="table table-bordered table hover table striped w-100">
                                        <thead>
                                            <th>No</th>
                                            <th>Uraian Barang, Merk, Ukuran, Tipe, Spesifikasi Lain</th>
                                            <th>Kode Barang</th>
                                            <th>Jumlah Satuan</th>
                                            <th>Jenis Satuan</th>
                                            <th>Keterangan</th>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="bsForm" role="tabpanel">
                            <form id="formbs">
                                <div class="form-group">
                                    <label class="form-label" for="uraianBs">Uraian Barang, Merk, Ukuran, Tipe, Spesifikasi Lain</label>
                                    <input type="text" class="form-control" id="uraianBs" name="uraianBs">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="kodeBs">Kode Barang</label>
                                    <input type="text" class="form-control" id="kodeBs" name="kodeBs">
                                </div>
                                <div class="row">
                                    <div class="col-xl-9">
                                        <div class="form-group">
                                            <label class="form-label" for="jumlahBs">Jumlah Satuan</label>
                                            <input type="text" class="form-control" id="jumlahBs" name="jumlahBs">
                                        </div>
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="form-group">
                                            <label class="form-label" for="satuanBs">Jenis Satuan</label>
                                            <input type="text" class="form-control" id="satuanBs" name="satuanBs">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="ketBs">Keterangan</label>
                                    <input type="text" class="form-control" id="ketBs" name="ketBs">
                                </div>
                                <div class="row">
                                    <div class="col-xl-4 ml-auto d-inline-flex justify-content-end">
                                        <button type="button" class="btn btn-secondary waves-effect pos-right" id="addBs">Tambah Bahan Sisa</button>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-xl-12">
                                    <table id="tableBs" class="table table-bordered table hover table striped w-100">
                                        <thead>
                                            <th>No</th>
                                            <th>Uraian Barang, Merk, Ukuran, Tipe, Spesifikasi Lain</th>
                                            <th>Kode Barang</th>
                                            <th>Jumlah Satuan</th>
                                            <th>Jenis Satuan</th>
                                            <th>Keterangan</th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect waves-themed" id="back">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-themed" id="proses">Next</button>
                <button type="submit" class="btn btn-primary waves-effect waves-themed" disabled id="simpan">Simpan</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var tableBb;
    var tableBj;
    var tableBs;
    var iBb = 0;
    var iBj = 0;
    var iBs = 0;
    $(document).ready(function() {
        $(':input').inputmask();
        $("#jaminan").inputmask({
            alias : 'currency',
            prefix: 'Rp '
        });
        $('.tanggal').datepicker({
            format: 'dd/mm/yyyy',
            todayHighLight: true,
            orientation: "top right"
        });

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

        tableBb = $("#tableBb").DataTable({
            "responsive":true,
            "ajax":'Monitoring/getDetailS?barang=bb',
            "columns": [
            {data: 'NO_SERI'},
            {data: 'URAIAN_BARANG'},
            {data: 'KODE_BARANG'},
            {data: 'JUMLAH_SATUAN'},
            {data: 'SATUAN'},
            {data: 'KETERANGAN'}
            ] 
        });

        tableBj = $("#tableBj").DataTable({
            "responsive":true,
            "ajax":'Monitoring/getDetailS?barang=bj',
            "columns": [
            {data: 'NO_SERI'},
            {data: 'URAIAN_BARANG'},
            {data: 'KODE_BARANG'},
            {data: 'JUMLAH_SATUAN'},
            {data: 'SATUAN'},
            {data: 'KETERANGAN'}
            ]
        });

        tableBs = $("#tableBs").DataTable({
            "responsive":true,
            "ajax":'Monitoring/getDetailS?barang=bs',
            "columns": [
            {data: 'NO_SERI'},
            {data: 'URAIAN_BARANG'},
            {data: 'KODE_BARANG'},
            {data: 'JUMLAH_SATUAN'},
            {data: 'SATUAN'},
            {data: 'KETERANGAN'}
            ]
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
                    return "\n\t\t\t\t\t\t<div class='d-flex demo'>\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-danger btn-icon btn-inline-block mr-1' title='Delete Record'><i class=\"fal fa-times\"></i></a>\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1' title='Edit' onclick=\"edit("+data+")\"><i class=\"fal fa-edit\"></i></a>\n\t\t\t\t\t\t\t</div>";
                    console.log(meta);
                }
            }],
            "ajax" : {
                "url" : "Monitoring/datatableList",
                "type" : "POST",
            },
        });
    });

var save_method;

$("#rekam").on('click',function(event) {
    event.preventDefault();
    /* Act on the event */
    $("#form")[0].reset();
    save_method = "add";
    $(".modal-title").text('Form Rekam Persetujuan Subkontrak');
    $("#modalForm").modal('show');
});

$("#proses").on('click', function(event) {
    event.preventDefault();
    /* Act on the event */
    var tab = $('div.active').attr('id');
    switch (tab) {
        case 'header':
        $('a[href="#bbForm"]').removeClass('disabled').addClass('active');
        $('a[href="#header"]').removeClass('active');
        $("#header").removeClass('active');
        $("#bbForm").addClass('active');
        $('#back').text('Back');
        $("#uraianBb").focus();
        break;
        case 'bbForm':
        $('a[href="#bjForm"]').removeClass('disabled').addClass('active');
        $('a[href="#bbForm"]').removeClass('active');
        $("#bbForm").removeClass('active');
        $("#bjForm").addClass('active');
        $("#uraianBj").focus();
        break;
        default:
        $('a[href="#bsForm"]').removeClass('disabled').addClass('active');
        $('a[href="#bjForm"]').removeClass('active');
        $("#bjForm").removeClass('active');
        $("#bsForm").addClass('active');
        $('#proses').attr('disabled', 'disabled');
        $('#simpan').removeAttr('disabled');
        $("#uraianBs").focus();
        break;
    }
});

$("#back").on('click', function(event) {
    event.preventDefault();
    /* Act on the event */
    var tab = $('div.active').attr('id');
    switch (tab) {
        case 'header':
        $('#modalForm').modal('hide');
        break;
        case 'bbForm':
        $('a[href="#bbForm"]').removeClass('active').addClass('disabled');
        $('a[href="#header"]').addClass('active');
        $("#header").addClass('active');
        $("#bbForm").removeClass('active');
        $('#back').text('Close');
        $("#persetujuan").focus();
        break;
        case 'bjForm':
        $('a[href="#bjForm"]').removeClass('active').addClass('disabled');
        $('a[href="#bbForm"]').addClass('active');
        $("#bbForm").addClass('active');
        $("#bjForm").removeClass('active');
        $("#uraianBb").focus();
        break;
        default:
        $('a[href="#bsForm"]').removeClass('active').addClass('disabled');
        $('a[href="#bjForm"]').addClass('active');
        $("#bjForm").addClass('active');
        $("#bsForm").removeClass('active');
        $("#proses").removeAttr('disabled');
        $("#uraianBj").focus();
        break;
    }
});

$("#simpan").on('click', function(event) {
    event.preventDefault();
    /* Act on the event */
    var data = $("#form").serializeArray();

    if ($('#form')[0].checkValidity() === false) {
        $("#form").addClass('was-validated');
    } else {
        var npwp = $('input[name="npwp-mask"]').inputmask('unmaskedvalue');
        var jaminan = $('input[name="jaminan-mask"]').inputmask('unmaskedvalue');
        data[data.length] = {name: 'npwp', value: npwp};
        data[data.length] = {name: 'jaminan', value: jaminan};
        $.ajax({
            url: 'Monitoring/addSubkon',
            type: 'POST',
            dataType: 'JSON',
            data: data,
            success: function(d){
                console.log(d);
            }
        })
    }
});

$("#addBb").on('click', function(event) {
    event.preventDefault();
    /* Act on the event */
    iBb++;
    var data = $('#formbb').serializeArray();
    data[data.length] = {name: 'barang', value: 'bb'};
    data[data.length] = {name: 'noSeri', value: iBb};
    $.ajax({
        url: 'Monitoring/addDetail',
        type: 'POST',
        dataType: 'JSON',
        data: data,
        success: function(data){
            tableBb.ajax.reload(null,false);
        }
    })
});

$("#addBj").on('click', function(event) {
    event.preventDefault();
    /* Act on the event */
    iBj++;
    var data = $('#formbj').serializeArray();
    data[data.length] = {name: 'barang', value: 'bj'};
    data[data.length] = {name: 'noSeri', value: iBj};
    $.ajax({
        url: 'Monitoring/addDetail',
        type: 'POST',
        dataType: 'JSON',
        data: data,
        success: function(data){
            tableBj.ajax.reload(null,false);
        }
    })
});
$("#addBs").on('click', function(event) {
    event.preventDefault();
    /* Act on the event */
    iBs++;
    var data = $('#formbs').serializeArray();
    data[data.length] = {name: 'barang', value: 'bs'};
    data[data.length] = {name: 'noSeri', value: iBs};
    $.ajax({
        url: 'Monitoring/addDetail',
        type: 'POST',
        dataType: 'JSON',
        data: data,
        success: function(data){
            tableBs.ajax.reload(null,false);
        }
    }) 
});

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
</script>