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
                        <button id="LPPI" class="btn btn-primary btn-pills btn-xs waves-effect waves-themed" data-toggle="tooltip" data-offset="0,10" style="width: 90; margin-right: 15px;"><i class="fal fa-file"></i> &nbsp;Buat LPPI</button>
                    </div>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <!-- datatable start -->
                    <table id="dataTable" class="table table-bordered table-hover table-striped w-100 dataTable no-footer" role="grid">
                        <thead>
                            <th>No</th>
                            <th>NOMOR LPPI</th>
                            <th>TANGGAL LPPI</th>
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
<div class="modal fade" id="modalLPPI" tabindex="-1" role="dialog" aria-modal="true" data-backdrop="false">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" id="formLPPI" novalidate enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xl-12">
                            <h3><strong>IDENTITAS TARGET INFORMASI</strong></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <label class="form-label"><h5 class="frame-heading">JENIS KEGIATAN</h5></label>
                            <div class="frame-wrap">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="KEGIATAN_IMPOR" name="JENIS_KEGIATAN" value="IMPOR">
                                    <label class="custom-control-label" for="KEGIATAN_IMPOR">IMPOR</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="KEGIATAN_EKSPOR" name="JENIS_KEGIATAN" value="EKSPOR">
                                    <label class="custom-control-label" for="KEGIATAN_EKSPOR">EKSPOR</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="KEGIATAN_FASILITAS" name="JENIS_KEGIATAN" value="FASILITAS">
                                    <label class="custom-control-label" for="KEGIATAN_FASILITAS">FASILITAS</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="KEGIATAN_CUKAI" name="JENIS_KEGIATAN" value="CUKAI">
                                    <label class="custom-control-label" for="KEGIATAN_CUKAI">CUKAI</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12" id="IDENTITAS">

                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-xl-3">
                            <h3><strong>ISI INFORMASI</strong></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="form-label" for="NOMOR_LPPI">Nomor</label>
                                <input type="text" class="form-control" id="NOMOR_LPPI" name="NOMOR_LPPI_MASK" required>
                                <div class="invalid-feedback">
                                    Kolom Nomor Induk Berusaha Harus Diisi.
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="form-label" for="TANGGAL_LPPI">Tanggal</label>
                                <input type="text" class="form-control tanggal" id="TANGGAL_LPPI" name="TANGGAL_LPPI" required>
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
                        <div class="col-xl-9">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="SUMBER_LPPI_I" name="SUMBER_LPPI[]" value="I">
                                <label class="custom-control-label" for="SUMBER_LPPI_I">Internal</label>
                            </div>
                            <table class="table" style="margin-top: 10px; margin-bottom: 10px;">
                                <tbody>
                                    <tr>
                                        <td><label class="form-label" for="MEDIA_I">Media</label></td>
                                        <td>
                                            <input type="text" class="form-control" id="MEDIA_I" name="MEDIA[]" disabled>
                                            <div class="invalid-feedback">Kolom Nomor Induk Berusaha Harus Diisi.</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-label" for="TANGGAL_TERIMA_I">Tanggal Terima</label></td>
                                        <td>
                                            <input type="text" class="form-control tanggal" id="TANGGAL_TERIMA_I" name="TANGGAL_TERIMA[]" disabled>
                                            <div class="invalid-feedback">Kolom Nomor Induk Berusaha Harus Diisi.</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-label" for="NO_DOKUMEN_I">No. Dokumen</label></td>
                                        <td>
                                            <input type="text" class="form-control" id="NO_DOKUMEN_I" name="NO_DOKUMEN[]" disabled>
                                            <div class="invalid-feedback">Kolom Nomor Induk Berusaha Harus Diisi.</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-label" for="TANGGAL_DOKUMEN_I">Tanggal</label></td>
                                        <td>
                                            <input type="text" class="form-control tanggal" id="TANGGAL_DOKUMEN_I" name="TANGGAL_DOKUMEN[]" disabled>
                                            <div class="invalid-feedback">Kolom Nomor Induk Berusaha Harus Diisi.</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="SUMBER_LPPI_E" name="SUMBER_LPPI[]" value="E">
                                <label class="custom-control-label" for="SUMBER_LPPI_E">Eksternal</label>
                            </div>
                            <table class="table" style="margin-top: 10px; margin-bottom: 10px; b">
                                <tbody>
                                    <tr>
                                        <td><label class="form-label" for="MEDIA_E">Media</label></td>
                                        <td>
                                            <input type="text" class="form-control" id="MEDIA_E" name="MEDIA[]" disabled>
                                            <div class="invalid-feedback">Kolom Nomor Induk Berusaha Harus Diisi.</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-label" for="TANGGAL_TERIMA_E">Tanggal Terima</label></td>
                                        <td>
                                            <input type="text" class="form-control tanggal" id="TANGGAL_TERIMA_E" name="TANGGAL_TERIMA[]" disabled>
                                            <div class="invalid-feedback">Kolom Nomor Induk Berusaha Harus Diisi.</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-label" for="NO_DOKUMEN_E">No. Dokumen</label></td>
                                        <td>
                                            <input type="text" class="form-control" id="NO_DOKUMEN_E" name="NO_DOKUMEN[]" disabled>
                                            <div class="invalid-feedback">Kolom Nomor Induk Berusaha Harus Diisi.</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-label" for="TANGGAL_DOKUMEN_E">Tanggal</label></td>
                                        <td>
                                            <input type="text" class="form-control tanggal" id="TANGGAL_DOKUMEN_E" name="TANGGAL_DOKUMEN[]" disabled>
                                            <div class="invalid-feedback">Kolom Nomor Induk Berusaha Harus Diisi.</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-xl-12">
                            <table id="tabelInformasi" class="table table-bordered table-striped">
                                <thead class="text-center  ">
                                    <th style="width: 5%;">NO</th>
                                    <th style="width: 75%;">
                                        IKHTISAR INFORMASI <button class="btn btn-success" id="tambahInfo" style="margin-left: 15px;">Tambah Informasi</button>
                                    </th>
                                    <th style="width: 10%;">SUMBER</th>
                                    <th style="width: 10%;">VALIDITAS</th>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2">
                                           <div class="form-group">
                                            <label class="form-label" for="PENERIMA_TTD">Penerima Informasi</label>
                                            <select class="form-control select2 nip" name="PENERIMA_TTD" id="PENERIMA_TTD" required>

                                            </select>
                                            <div class="invalid-feedback">
                                               Kolom Nomor Induk Berusaha Harus Diisi.
                                           </div>
                                       </div>     
                                   </th>
                                   <th colspan="2">
                                    <div class="form-group">
                                     <label class="form-label" for="PENILAI_TTD">Penilai Informasi</label>
                                     <select class="form-control select2 nip" name="PENILAI_TTD" id="PENILAI_TTD" required>

                                     </select>
                                     <div class="invalid-feedback">
                                        Kolom Nomor Induk Berusaha Harus Diisi.
                                    </div>
                                </div> 
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row" style="margin-top: 15px;">
            <div class="col-xl-3"><h3><strong>KESIMPULAN</strong></h3></div>
            <div class="col-xl-9">
                <textarea class="form-control" id="KESIMPULAN" name="KESIMPULAN" rows="3" required></textarea>
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
                            <input type="radio" class="custom-control-input" id="TINDAK_LANJUT_Analisis" name="TINDAK_LANJUT" value="Analisis">
                            <label class="custom-control-label" for="TINDAK_LANJUT_Analisis">Analisis</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="radio" class="custom-control-input" id="TINDAK_LANJUT_Arsip" name="TINDAK_LANJUT" value="Arsip">
                            <label class="custom-control-label" for="TINDAK_LANJUT_Arsip">Arsip</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 15px;">
            <div class="col-xl-3"><h3><strong>CATATAN</strong></h3></div>
            <div class="col-xl-9">
                <textarea class="form-control" id="CATATAN" name="CATATAN" rows="3" required></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="form-group">
                    <label class="form-label" for="PEJABAT_TTD">Kepala Seksi/Jabfung Intelijen</label>
                    <select class="form-control select2 nip" name="PEJABAT_TTD" id="PEJABAT_TTD" required>

                    </select>
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
    <button type="button" class="btn btn-primary waves-effect waves-themed" id="simpan" onclick="post('formLPPI')">Simpan</button>
</div>

<script type="text/javascript">
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    var pegawai = [];
    var rowId;
    var postMethod;
    var idEdit;
    var controls = {
        leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
        rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
    }

    today = yyyy + '-' + mm + '-' + dd;
    $(document).ready(function(){
        var newLPPI;
        var year = new Date().getFullYear();
        getDataPegawai();

        $(':input').inputmask();
        $('[name="NOMOR_LPPI_MASK"]').inputmask({mask: "LPPI-9{1,3}/KBC.0\\90702/"+year, gready: false});
        
        var pegawaiUrl = "Pegawai/getPegawaiByName"
        $('.tanggal').datepicker({
            language: "id",
            format: "yyyy-mm-dd",
            orientation: "bottom right",
            todayHighlight: true,
            templates: controls
        });

        $('.nip').select2({
            placeholder: 'Ketik Nama Petugas/Pejabat',
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
                    var option;
                    var del = "\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-danger btn-icon btn-inline-block mr-1' title='Delete Record' onclick=\"hapus("+data.id+")\"><i class=\"fal fa-times\"></i></a>";
                    var val = "\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-success btn-icon btn-inline-block mr-1' title='Send Record' onclick=\"kirim("+data.id+")\"><i class=\"fal fa-paper-plane\"></i></a>";
                    var ed =  "\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1' title='Edit' onclick=\"ubah("+data.id+")\"><i class=\"fal fa-edit\"></i></a>";
                    var pri = "\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1' title='Print Record' onclick=\"cetak("+data.id+")\"><i class=\"fal fa-print\"></i></a>";
                    if (data.flag == 0) {
                        option = "\n\t\t\t\t\t\t<div class='d-flex demo'>"+del+ed+"\n\t\t\t\t\t\t\t</div><div class='d-flex demo'>"+val+pri+"</div>";
                    } else 
                    { 
                        option = "\n\t\t\t\t\t\t<div class='d-flex demo'>"+pri+"\n\t\t\t\t\t\t\t</div>";
                    }
                    return option;
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
    });

    function getDataPegawai(){
        $.ajax({
            url: 'Pegawai/getAllPegawaiNip',
            type: 'GET',
            dataType: 'JSON',
            success: function(d){
                $.each(d, function(index, val) {
                   /* iterate through array or object */
                   pegawai[val['NIPPegawai']] = val['NamaPegawai'];
               });
            }
        })        
    }

    $('[name="JENIS_KEGIATAN"]').on('change', function(event) {
        $("#IDENTITAS").empty();
        switch (event.currentTarget.id) {
            case 'KEGIATAN_CUKAI':
            $("#IDENTITAS").append('<div class="row"><div class="col-xl-6"><div class="form-group"><label class="form-label" for="NPWP">NPWP</label><input class="form-control" name="NPWP" id="NPWP" required><div class="invalid-feedback">Kolom NPWP Harus Diisi.</div></div></div><div class="col-xl-6"><div class="form-group"><label class="form-label" for="NAMA">Nama Perusahaan</label><input class="form-control" name="NAMA" id="NAMA" required><div class="invalid-feedback">Kolom Nama Perusahaan Harus Diisi.</div></div></div></div>');
            $("#IDENTITAS").append('<div class="row"><div class="col-xl-3"><div class="form-group"><label class="form-label" for="JENIS_DOK">Jenis Dokumen</label><input class="form-control" name="JENIS_DOK" id="JENIS_DOK" required><div class="invalid-feedback">Kolom Jenis Dokumen Harus Diisi.</div></div></div><div class="col-xl-3"><div class="form-group"><label class="form-label" for="NO_DOK">Nomor Dokumen</label><input class="form-control" name="NONO_DOK_PIB" id="NO_DOK" required><div class="invalid-feedback">Kolom Nomor Dokumen Harus Diisi.</div></div></div><div class="col-xl-6"><div class="form-group"><label class="form-label" for="TANGGAL_DOK">Tanggal Dokumen</label><input class="form-control tanggal" name="TANGGAL_DOK" id="TANGGAL_DOK" required><div class="invalid-feedback">Kolom Tanggal PIB Diisi.</div></div></div></div>');
            $("#IDENTITAS").append('<div class="row"><div class="col-xl-6"><div class="form-group"><label class="form-label" for="PENGANGKUT">Eks/Untuk Kapal/Pesawat/Alat Angkut/Lainnya</label><input class="form-control" name="PENGANGKUT" id="PENGANGKUT" required><div class="invalid-feedback">Kolom Eks/Untuk Kapal/Pesawat/Alat Angkut/Lainnya Harus Diisi.</div></div></div><div class="col-xl-3"><div class="form-group"><label class="form-label" for="NO_BL">Nomor BL/AWB</label><input class="form-control" name="NO_BL" id="NO_BL" required><div class="invalid-feedback">Kolom Nomor PIB Diisi.</div></div></div><div class="col-xl-3"><div class="form-group"><label class="form-label" for="TANGGAL_BL">Tanggal PIB</label><input class="form-control tanggal" name="TANGGAL_BL" id="TANGGAL_BL" required><div class="invalid-feedback">Kolom Tanggal BL/AWB Diisi.</div></div></div></div>');
            $("#IDENTITAS").append('<div class="row"><div class="col-xl-6"><div class="form-group"><label class="form-label" for="JENIS_BARANG">Jenis Barang</label><input class="form-control" name="JENIS_BARANG" id="JENIS_BARANG" required><div class="invalid-feedback">Kolom Jenis Barang Harus Diisi.</div></div></div><div class="col-xl-3"><div class="form-group"><label class="form-label" for="JUMLAH_BARANG">Jumlah Barang</label><input class="form-control" name="JUMLAH_BARANG" id="JUMLAH_BARANG" required><div class="invalid-feedback">Kolom Jumlah Barang Harus Diisi.</div></div></div><div class="col-xl-3"><div class="form-group"><label class="form-label" for="SATUAN_BARANG">Satuan Barang</label><input class="form-control" name="SATUAN_BARANG" id="SATUAN_BARANG" required><div class="invalid-feedback">Kolom Satuan Barang Harus Diisi.</div></div></div></div>');
            break;
            case 'KEGIATAN_EKSPOR':
            // statements_1
            break;
            default:
            $("#IDENTITAS").append('<div class="row"><div class="col-xl-6"><div class="form-group"><label class="form-label" for="NPWP">NPWP</label><input class="form-control" name="NPWP" id="NPWP" required><div class="invalid-feedback">Kolom NPWP Harus Diisi.</div></div></div><div class="col-xl-6"><div class="form-group"><label class="form-label" for="NAMA">Nama Perusahaan</label><input class="form-control" name="NAMA" id="NAMA" required><div class="invalid-feedback">Kolom Nama Perusahaan Harus Diisi.</div></div></div></div>');
            $("#IDENTITAS").append('<div class="row"><div class="col-xl-3"><div class="form-group"><label class="form-label" for="JENIS_DOK">Jenis Dokumen</label><input class="form-control" name="JENIS_DOK" id="JENIS_DOK" required><div class="invalid-feedback">Kolom Jenis Dokumen Harus Diisi.</div></div></div><div class="col-xl-3"><div class="form-group"><label class="form-label" for="NO_DOK">Nomor Dokumen</label><input class="form-control" name="NONO_DOK_PIB" id="NO_DOK" required><div class="invalid-feedback">Kolom Nomor Dokumen Harus Diisi.</div></div></div><div class="col-xl-6"><div class="form-group"><label class="form-label" for="TANGGAL_DOK">Tanggal Dokumen</label><input class="form-control tanggal" name="TANGGAL_DOK" id="TANGGAL_DOK" required><div class="invalid-feedback">Kolom Tanggal PIB Diisi.</div></div></div></div>');
            $("#IDENTITAS").append('<div class="row"><div class="col-xl-6"><div class="form-group"><label class="form-label" for="PENGANGKUT">Eks/Untuk Kapal/Pesawat/Alat Angkut/Lainnya</label><input class="form-control" name="PENGANGKUT" id="PENGANGKUT" required><div class="invalid-feedback">Kolom Eks/Untuk Kapal/Pesawat/Alat Angkut/Lainnya Harus Diisi.</div></div></div><div class="col-xl-3"><div class="form-group"><label class="form-label" for="NO_BL">Nomor BL/AWB</label><input class="form-control" name="NO_BL" id="NO_BL" required><div class="invalid-feedback">Kolom Nomor PIB Diisi.</div></div></div><div class="col-xl-3"><div class="form-group"><label class="form-label" for="TANGGAL_BL">Tanggal PIB</label><input class="form-control tanggal" name="TANGGAL_BL" id="TANGGAL_BL" required><div class="invalid-feedback">Kolom Tanggal BL/AWB Diisi.</div></div></div></div>');
            $("#IDENTITAS").append('<div class="row"><div class="col-xl-6"><div class="form-group"><label class="form-label" for="JENIS_BARANG">Jenis Barang</label><input class="form-control" name="JENIS_BARANG" id="JENIS_BARANG" required><div class="invalid-feedback">Kolom Jenis Barang Harus Diisi.</div></div></div><div class="col-xl-3"><div class="form-group"><label class="form-label" for="JUMLAH_BARANG">Jumlah Barang</label><input class="form-control" name="JUMLAH_BARANG" id="JUMLAH_BARANG" required><div class="invalid-feedback">Kolom Jumlah Barang Harus Diisi.</div></div></div><div class="col-xl-3"><div class="form-group"><label class="form-label" for="SATUAN_BARANG">Satuan Barang</label><input class="form-control" name="SATUAN_BARANG" id="SATUAN_BARANG" required><div class="invalid-feedback">Kolom Satuan Barang Harus Diisi.</div></div></div></div>');
            break;
        }
        $('.tanggal').datepicker({
            language: "id",
            format: "yyyy-mm-dd",
            orientation: "bottom right",
            todayHighlight: true,
            templates: controls
        });
    });

$("#SUMBER_LPPI_I").change(function(event) {
    if (this.checked) {
     $("#MEDIA_I, #TANGGAL_TERIMA_I, #NO_DOKUMEN_I, #TANGGAL_DOKUMEN_I").attr('required', 'required').removeAttr('disabled'); 
 } else {
    $("#MEDIA_I, #TANGGAL_TERIMA_I, #NO_DOKUMEN_I, #TANGGAL_DOKUMEN_I").removeAttr('required').attr('disabled', 'disabled');
}    
});

$("#SUMBER_LPPI_E").change(function(event) {
    if (this.checked) {
     $("#MEDIA_E, #TANGGAL_TERIMA_E, #NO_DOKUMEN_E, #TANGGAL_DOKUMEN_E").attr('required', 'required').removeAttr('disabled'); 
 } else {
    $("#MEDIA_E, #TANGGAL_TERIMA_E, #NO_DOKUMEN_E, #TANGGAL_DOKUMEN_E").removeAttr('required').attr('disabled', 'disabled');
}    
});

    // LEMBAR INFORMASI FUNCTION
    $("#LPPI").on('click', function(event) {
        event.preventDefault();
        /* Act on the event */
        postMethod = 'add';
        rowId = 0;
        console.log($('#formLPPI'));
        $("#formLPPI")[0].reset();
        $('.nip').empty().trigger('change');
        $('#SUMBER_LPPI_I').removeAttr('checked','checked');
        $('#SUMBER_LPPI_E').removeAttr('checked','checked');
        $('#TINDAK_LANJUT_Analisis').removeAttr('checked', 'checked');
        $('#TINDAK_LANJUT_Arsip').removeAttr('checked', 'checked');
        $('.custom-control-input').trigger('change');
        $('#tabelInformasi > tbody').empty();
        getLastLPPINumber("LPPI");
        $('[name="TANGGAL_LPPI"]').val(today);
        $(".modal-title").text('Input Data Lembar Informasi');
        $("#modalLPPI").modal('show');
    });

    function getLastLPPINumber(doc){
        $.ajax({
            url: 'Administrasi/getNomorLPPI',
            type: 'GET',
            dataType: 'JSON',
            data: {tahun: new Date().getFullYear(), type: doc},
            success: function(d){
                var no = ("000"+d.no).substr(-3);
                $('[name="NOMOR_LPPI_MASK"]').val(no);
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

    function ubah(id){
        $("#formLPPI")[0].reset();
        $('.custom-control-input').trigger('change');
        $('#tabelInformasi > tbody').empty();
        $.ajax({
            url: 'Administrasi/getLPPIById',
            type: 'GET',
            dataType: 'JSON',
            data: {ID: id},
            success: function(d){
                postMethod = 'edit';
                idEdit = d.master.ID_LPPI;
                var noLPPI = ('000'+d.master.NO_LPPI).substr(-3);
                $('[name="NOMOR_LPPI_MASK"]').val(noLPPI);
                $('[name="TANGGAL_LPPI"]').val(d.master.TANGGAL_LPPI);
                $('[name="KESIMPULAN"]').val(d.master.KESIMPULAN);
                selectedValue('PENERIMA_TTD', d.master.PENERIMA_INFO, pegawai[d.master.PENERIMA_INFO]);
                selectedValue('PENILAI_TTD', d.master.PENILAI_INFO, pegawai[d.master.PENILAI_INFO]);
                selectedValue('TUJUAN_DISPOSISI', d.master.DISPOSISI, pegawai[d.master.DISPOSISI]);
                $('[name="TANGGAL_DISPOSISI"]').val(d.master.TANGGAL_DISPOSISI);
                $('#TINDAK_LANJUT_'+d.master.TINDAK_LANJUT).attr('checked', 'checked');
                $('[name="CATATAN"]').val(d.master.CATATAN);
                selectedValue('PEJABAT_TTD', d.master.PEJABAT, pegawai[d.master.PEJABAT]);

                $.each(d.sumber, function(index, val) {
                   /* iterate through array or object */
                   switch (val.SUMBER) {
                       case 'I':
                       $('#SUMBER_LPPI_I').attr('checked','checked');
                       $('#MEDIA_I').val(val.MEDIA).removeAttr('disabled');
                       $('#TANGGAL_TERIMA_I').val(val.TANGGAL_TERIMA).removeAttr('disabled');
                       $('#NO_DOKUMEN_I').val(val.NO_DOKUMEN).removeAttr('disabled');
                       $('#TANGGAL_DOKUMEN_I').val(val.TANGGAL_DOKUMEN).removeAttr('disabled');
                       break;
                       default:
                       $('#SUMBER_LPPI_E').attr('checked','checked');
                       $('#MEDIA_E').val(val.MEDIA).removeAttr('disabled');
                       $('#TANGGAL_TERIMA_E').val(val.TANGGAL_TERIMA).removeAttr('disabled');
                       $('#NO_DOKUMEN_E').val(val.NO_DOKUMEN).removeAttr('disabled');
                       $('#TANGGAL_DOKUMEN_E').val(val.TANGGAL_DOKUMEN).removeAttr('disabled');
                       break;
                   }
               });

                $.each(d.info, function(index, val) {
                   /* iterate through array or object */
                   $('#tabelInformasi > tbody').append('<tr class="text-center" id="row'+val.ID_LPPI_INFO+'"><td>'+val.NOMOR+'<br><button type="button" class="btn btn-sm btn-icon btn-inline-block btn-outline-danger" onclick="deleteRow('+"'"+'row'+val.ID_LPPI_INFO+"'"+')"><i class="fal fa-trash-alt"></i></button></td><td><input type="hidden" name="ID_LPPI_INFO[]" value="'+val.ID_LPPI_INFO+'"><textarea class="form-control" name="informasi[]" onkeyup="textAreaAdjust(this)" id="text'+val.ID_LPPI_INFO+'" required></textarea></td><td><select class="form-control select2 sumber" name="sumber[]" id="sumber'+val.NOMOR+'" required><option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option><option value="F">F</option></select></td><td><select class="form-control select2 validitas" name="validitas[] id="validitis'+val.NOMOR+'" required"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option></select></td></tr>');
                   selectedValue('sumber'+val.NOMOR, val.SUMBER, val.SUMBER);
                   selectedValue('validitas'+val.NOMOR, val.VALIDITAS, val.VALIDITAS);
                   CKEDITOR.replace('text'+val.ID_LPPI_INFO);
                   CKEDITOR.instances['text'+val.ID_LPPI_INFO].setData(val.INFORMASI);
               });

                $(".modal-title").text('Ubah Data LPPI');
                $('#modalLPPI').modal('show');
            }
        })
        .done(function(){
            $('textarea').keyup();
        })    
    }

    function textAreaAdjust(el){
        el.style.height = "1px";
        el.style.height = (25+el.scrollHeight)+"px";
    }

    function hapus(id){
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
                    url: 'Administrasi/hapusDataIntelijen',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {ID_LPPI: id, TYPE: 'LPPI'},
                    success: function (d) {
                        play = document.getElementById('notification');
                        if (d.status == 'success') {
                            swalWithBootstrapButtons.fire(
                                "Laporan Berhasil Divalidasi!",
                                "Data Laporan Monitoring Umum Sudah Tervalidasi",
                                "success"
                                );
                        } else {
                            swalWithBootstrapButtons.fire(
                                "Telah Terjadi Kesalahan!",
                                "Data Laporan Monitoring Umum Gagal Divalidasi <br> Harap Menghubungi Administrator",
                                "error"
                                );
                        }
                        tabel.ajax.reload(null, false);
                    }
                })
            }
            else if (
                 // Read more about handling dismissals
                 result.dismiss === Swal.DismissReason.cancel
                 )
            {
                swalWithBootstrapButtons.fire(
                    "Proses Hapus Laporan Dibatalkan",
                    "Data Lembar Pengumpulan dan Penilaian",
                    "error"
                    );
            }
        });        
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
            var nomor_li = $('input[name="NOMOR_LPPI_MASK"]').inputmask('unmaskedvalue');
            var test = [1,2,3];
            data[data.length] = {name: 'NOMOR_LPPI', value: nomor_li};
            data[data.length] = {name: 'FORM', value: form};
            data[data.length] = {name: 'postMethod', value: postMethod};
            data[data.length] = {name: 'test[]', value: test};
            var ckedit = $('.cke');
            $.each(ckedit, function(index, val) {
               /* iterate through array or object */
               var idCk = val.id
               var el = idCk.slice(4);
               if (idCk.slice(4, 8) == 'text') {
                data[data.length] = {name: 'INFO[]', value: CKEDITOR.instances[el].getData()};
            }
        });
            if (postMethod == 'edit') {
                data[data.length] = {name: 'ID_LPPI', value: idEdit};
            }
            // console.log(data);
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
                    console.log(d);
                    $("#modalLPPI").modal('hide');
                    tabel.ajax.reload();
                }
            })
        }      
    }

    function deleteRow(row){
        $('#'+row).remove();
    }

    $("#tambahInfo").on('click', function(event) {
        event.preventDefault();
        var rowCount = $("#tabelInformasi > tbody tr").length;
        var row = parseInt(rowCount)+1;
        /* Act on the event */
        $("#tabelInformasi > tbody").append('<tr id="row'+rowId+'"><td class="text-center">'+row+'<br><button type="button" class="btn btn-sm btn-icon btn-inline-block btn-outline-danger" onclick="deleteRow('+"'"+'row'+rowId+"'"+')"><i class="fal fa-trash-alt"></i></button></td><td><textarea class="form-control" name="informasi[]" id="text'+rowId+'" onkeyup="textAreaAdjust(this)" required></textarea></td><td><select class="form-control select2 sumber" name="sumber[]" required><option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option><option value="F">F</option></select></td><td><select class="form-control select2 validitas" name="validitas[] required"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option></select></td></tr>');
        $('.sumber, .validitas').select2({
            dropdownParent: $("#PEJABAT_TTD").parent()
        });
        CKEDITOR.replace('text'+rowId);
        rowId++;
    });

</script>