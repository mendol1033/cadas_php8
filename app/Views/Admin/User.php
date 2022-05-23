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
                        <button type="button" class="btn btn-xs btn-primary waves-effect waves-themed" id="newKontrak" style="margin-right: 10px;" onclick="tambah()"><span class="fas fa-plus-circle"></span> Tambah User</button>
                        <button type="button" class="btn btn-xs btn-danger waves-effect waves-themed" id="statusUser" style="margin-right: 10px;" onclick="userTidakAktif()"><span class="fas fa-plus-circle"></span> User Tidak Aktif</button>
                    </div>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <!-- datatable start -->
                    <table id="dataTable" class="table table-bordered table-hover table-striped w-100 dataTable no-footer" role="grid">
                        <thead>
                            <th>No</th>
                            <th>NIP</th>
                            <th style="width: 20%;">Nama</th>
                            <th>Pangkat / Golongan</th>
                            <th>Jabatan</th>
                            <th>Unit</th>
                            <th>Status</th>
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
                    <form class="needs-validation" id="form" method="post" accept-charset="utf-8" novalidate="novalidate">
                        <div class="col-xl-12">
                            <div class="form-group" id="NamaPegawai">
                                <label for="NamaPegawai" class="form-label">Nama Pegawai</label>                        
                                <select name="NIP" id="NIP" class="form-control select2" style="width:100%;">
                                </select>
                            </div>
                            <div class="form-group" id="NIPPegawai">
                                <label for="NipPegawai" class="form-label">NIP Pegawai</label>                      
                                <input type="text" name="NipPegawai" id="NipPegawai" class="form-control" disabled>
                            </div>
                            <div class="form-group" id="Pangkat">
                                <label for="Pangkat" class="form-label">Pangkat</label>                     
                                <div class="col-xl-12">
                                    <select name="Pangkat" id="Pangkat" class="form-control select2" style="width:100%;" disabled>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group" id="Jabatan">
                                <label for="Jabatan" class="form-label">Jabatan</label>                     
                                <div class="col-xl-12">
                                    <select name="Jabatan" id="Jabatan" class="form-control select2" style="width:100%;" disabled>
                                        <option value="0">--PILIH JABATAN PEGAWAI--</option>
                                        <option value="1">KEPALA KANTOR</option>
                                        <option value="2">KEPALA SUBBAGIAN UMUM</option>
                                        <option value="3">KEPALA SEKSI PENINDAKAN DAN PENYIDIKAN</option>
                                        <option value="4">KEPALA SEKSI ADMINISTRASI MANIFES</option>
                                        <option value="5">KEPALA SEKSI PERBENDAHARAAN</option>
                                        <option value="6">KEPALA SEKSI PELAYANAN KEPABEANAN DAN CUKAI I</option>
                                        <option value="7">KEPALA SEKSI PELAYANAN KEPABEANAN DAN CUKAI II</option>
                                        <option value="8">KEPALA SEKSI PELAYANAN KEPABEANAN DAN CUKAI III</option>
                                        <option value="9">KEPALA SEKSI PELAYANAN KEPABEANAN DAN CUKAI IV</option>
                                        <option value="10">KEPALA SEKSI PELAYANAN KEPABEANAN DAN CUKAI V</option>
                                        <option value="11">KEPALA SEKSI PELAYANAN KEPABEANAN DAN CUKAI VI</option>
                                        <option value="12">KEPALA SEKSI PELAYANAN KEPABEANAN DAN CUKAI VII</option>
                                        <option value="13">KEPALA SEKSI PELAYANAN KEPABEANAN DAN CUKAI VIII</option>
                                        <option value="14">KEPALA SEKSI PELAYANAN KEPABEANAN DAN CUKAI IX</option>
                                        <option value="15">KEPALA SEKSI PENYULUHAN DAN LAYANAN INFORMASI</option>
                                        <option value="16">KEPALA SEKSI KEPATUHAN INTERNAL</option>
                                        <option value="17">KEPALA SEKSI PENGOLAHAN DATA DAN ADMINISTRASI DOKUMEN</option>
                                        <option value="18">PEMERIKSA BEA DAN CUKAI MUDA</option>
                                        <option value="19">KEPALA URUSAN TATA USAHA DAN KEPEGAWAIAN</option>
                                        <option value="20">KEPALA URUSAN KEUANGAN</option>
                                        <option value="21">KEPALA URUSAN RUMAH TANGGA</option>
                                        <option value="22">KEPALA SUBSEKSI INTELIJEN I</option>
                                        <option value="23">KEPALA SUBSEKSI INTELIJEN II</option>
                                        <option value="24">KEPALA SUBSEKSI PENINDAKAN I</option>
                                        <option value="25">KEPALA SUBSEKSI PENINDAKAN II</option>
                                        <option value="26">KEPALA SUBSEKSI PENYIDIKAN DAN BARANG HASIL PENINDAKAN</option>
                                        <option value="27">KEPALA SUBSEKSI SARANA OPERASI</option>
                                        <option value="28">KEPALA SUBSEKSI PENGADMINISTRASIAN MANIFES</option>
                                        <option value="29">KEPALA SUBSEKSI PENGADMINISTRASIAN PEMBERITAHUAN PENGANGKUTAN BARANG</option>
                                        <option value="30">KEPALA SUBSEKSI ADMINISTRASI PENERIMAAN DAN JAMINAN I</option>
                                        <option value="31">KEPALA SUBSEKSI ADMINISTRASI PENERIMAAN DAN JAMINAN II</option>
                                        <option value="32">KEPALA SUBSEKSI ADMINISTRASI PENAGIHAN DAN PENGEMBALIAN I</option>
                                        <option value="33">KEPALA SUBSEKSI ADMINISTRASI PENAGIHAN DAN PENGEMBALIAN II</option>
                                        <option value="34">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI I</option>
                                        <option value="35">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI II</option>
                                        <option value="36">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI III</option>
                                        <option value="37">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI IV</option>
                                        <option value="38">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI V</option>
                                        <option value="39">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI VI</option>
                                        <option value="40">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI VII</option>
                                        <option value="41">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI VIII</option>
                                        <option value="42">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI IX</option>
                                        <option value="43">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI X</option>
                                        <option value="44">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI XI</option>
                                        <option value="45">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI XII</option>
                                        <option value="46">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI XIII</option>
                                        <option value="47">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI XIV</option>
                                        <option value="48">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI XV</option>
                                        <option value="49">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI XVI</option>
                                        <option value="50">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI XVII</option>
                                        <option value="51">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI XVIII</option>
                                        <option value="52">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI XIX</option>
                                        <option value="53">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI XX</option>
                                        <option value="54">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI XXI</option>
                                        <option value="55">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI XXII</option>
                                        <option value="56">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI XXIII</option>
                                        <option value="57">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI XXIV</option>
                                        <option value="58">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI XXV</option>
                                        <option value="59">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI XXVI</option>
                                        <option value="60">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI XXVII</option>
                                        <option value="61">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI XXVIII</option>
                                        <option value="62">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI XXIX</option>
                                        <option value="63">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI XXX</option>
                                        <option value="64">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI XXXI</option>
                                        <option value="65">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI XXXII</option>
                                        <option value="66">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI XXXIII</option>
                                        <option value="67">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI XXXIV</option>
                                        <option value="68">KEPALA SUBSEKSI HANGGAR PABEAN DAN CUKAI XXXV</option>
                                        <option value="69">KEPALA SUBSEKSI PENYULUHAN</option>
                                        <option value="70">KEPALA SUBSEKSI LAYANAN INFORMASI</option>
                                        <option value="71">KEPALA SUBSEKSI KEPATUHAN PELAKSANAAN TUGAS PELAYANAN DAN ADMINISTRASI</option>
                                        <option value="72">KEPALA SUBSEKSI KEPATUHAN PELAKSANAAN TUGAS PENGAWASAN</option>
                                        <option value="73">KEPALA SUBSEKSI PENGOLAHAN DATA</option>
                                        <option value="74">KEPALA SUBSEKSI ADMINISTRASI DOKUMEN</option>
                                        <option value="75">PELAKSANA ADMINISTRASI</option>
                                        <option value="76">PELAKSANA PEMERIKSA</option>
                                        <option value="77">PEJABAT FUNGSIONAL PEMERIKSA DOKUMEN</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group" id="Unit">
                                <label for="Unit" class="form-label">Unit</label>                       
                                <div class="col-xl-12">
                                    <select name="Unit" id="Unit" class="form-control select2" style="width:100%;" disabled>
                                        <option value="0">--PILIH SEKSI PEGAWAI--</option>
                                        <option value="1">KEPALA KANTOR</option>
                                        <option value="2">FUNGSIONAL</option>
                                        <option value="3">SUBBAGIAN UMUM</option>
                                        <option value="4">SEKSI PENINDAKAN DAN PENYIDIKAN</option>
                                        <option value="5">SEKSI ADMINISTRASI MANIFES</option>
                                        <option value="6">SEKSI PERBENDAHARAAN</option>
                                        <option value="7">SEKSI PELAYANAN KEPABEANAN DAN CUKAI I</option>
                                        <option value="8">SEKSI PELAYANAN KEPABEANAN DAN CUKAI II</option>
                                        <option value="9">SEKSI PELAYANAN KEPABEANAN DAN CUKAI III</option>
                                        <option value="10">SEKSI PELAYANAN KEPABEANAN DAN CUKAI IV</option>
                                        <option value="11">SEKSI PELAYANAN KEPABEANAN DAN CUKAI V</option>
                                        <option value="12">SEKSI PELAYANAN KEPABEANAN DAN CUKAI VI</option>
                                        <option value="13">SEKSI PELAYANAN KEPABEANAN DAN CUKAI VII</option>
                                        <option value="14">SEKSI PELAYANAN KEPABEANAN DAN CUKAI VIII</option>
                                        <option value="15">SEKSI PELAYANAN KEPABEANAN DAN CUKAI IX</option>
                                        <option value="16">SEKSI PENYULUHAN DAN LAYANAN INFORMASI</option>
                                        <option value="17">SEKSI KEPATUHAN INTERNAL</option>
                                        <option value="18">SEKSI PENGOLAHAN DATA DAN ADMINISTRASI DOKUMEN</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="form-group">
                                <label for="Username" class="form-label">Username</label>                       
                                <div class="col-xl-12">
                                    <input type="text" name="Uname" id="Uname" class="form-control valid" placeholder="Username Pegawai" autocomplete="off" required>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Password" class="form-label">Password</label>                       
                                <div class="col-xl-12">
                                    <input type="password" name="Pswd" id="Pswd" class="form-control" placeholder="Password" autocomplete="off" required> 
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="GrupMenu" class="form-label">Grup Menu</label>                      
                                <div class="col-xl-12">
                                    <select name="GrupMenu" id="GrupMenu" class="form-control select2" required>
                                        <option value="0">-- Pilih Menu Grup --</option>
                                        <?php foreach ($hakAkses as $key => $value) { ?>
                                            <option value="<?php echo $value['ID'];?>"><?php echo $value['GrupMenu'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Status" class="form-label">Status</label>                       
                                <div class="col-xl-12">
                                    <select name="Status" id="Status" class="form-control" required>
                                        <option value="Y">AKTIF</option>
                                        <option value="N">TIDAK AKTIF</option>
                                    </select>
                                </div>
                            </div>
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
<div class="modal fade" id="modalHakAkses" role="dialog" aria-modal="true" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title hakAkses">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">   
                <div class="panel-content">
                    <!-- <div class="panel-tag">
                    </div> -->
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-xl-12">
                            <form class="needs-validation" id="formHakAkses" novalidate>
                                <input type="hidden" name="IdUser" value="">
                                <div class="form-group">
                                    <label class="form-label">Hak Akses</label>
                                    <select name="HakAkses" id="HakAkses" class="form-control select2" style="width:100%;" required>
                                        <option value="0">-- Pilih Menu Grup --</option>
                                        <?php foreach ($hakAkses as $key => $value) { ?>
                                            <option value="<?php echo $value['ID'];?>"><?php echo $value['GrupMenu'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="row flex-row-reverse">
                                    <button class="btn btn-primary" type="button" id="addHakAkses"><i class="fal fa-plus-circle"></i>&nbsp;Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                           <table id="dataTableHakAkses" class="table table-bordered table-hover table-striped w-100 dataTable no-footer" role="grid">
                            <thead>
                                <th>No</th>
                                <th style="width: 70%;">Menu</th>
                                <th>Action</th>
                            </thead>
                            <tbody>

                            </tbody>
                        </table> 
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    var statusUser = "Y";
    $(document).ready(function() {
        $("#HakAkses").select2({
            width: '100%',
            dropdownParent: "#modalHakAkses"
        });

        $("#NIP").select2({
            placeholder: 'Masukkan Nama Pegawai',
            dropdownParent: "#modalForm",
            minimumInputLength: 3,
            allowClear: true,
            ajax : {
                url : "Pegawai/getList",
                dataType : "JSON",
                delay : 250,
                data : function(params){
                    return{
                        nip : params.term,
                        search : 'NIPPegawai, NamaPegawai'
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
        })

        $("#golPegawai").select2({
            placeholder: '--PILIH PANGKAT PEGAWAI--',
            dropdownParent: "#modalForm",
            ajax : {
                url : "Pegawai/getListPangkat",
                dataType: "json",
                processResults: function(data){
                    return{
                        results: data.results
                    }
                }
            }
        })

        $("#eselonPegawai").select2({
            placeholder: '--PILIH ESELON PEGAWAI--',
            dropdownParent: "#modalForm",
            ajax : {
                url : "Pegawai/getListEselon",
                dataType: "json",
                processResults: function(data){
                    return{
                        results: data.results
                    }
                }
            }
        })

        $("#seksiPegawai").select2({
            placeholder: '--PILIH SEKSI PEGAWAI--',
            dropdownParent: "#modalForm",
            ajax : {
                url : "Pegawai/getListSeksi",
                dataType: "json",
                processResults: function(data){
                    return{
                        results: data.results
                    }
                }
            }
        })

        $("#jabatanPegawai").select2({
            placeholder: '--PILIH JABATAN PEGAWAI--',
            dropdownParent: "#modalForm",
            ajax : {
                url : "Pegawai/getListJabatan",
                dataType: "json",
                processResults: function(data){
                    return{
                        results: data.results
                    }
                }
            }
        })

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
                "targets"   : 1,
                "title"     : 'NIP',
                "orderable" : true,
                "render"    : function(data, type, full, meta){
                    str1 = data.substring(0, 8);
                    str2 = data.substring(8, 14);
                    str3 = data.substring(14, 15);
                    str4 = data.substring(15);
                    return str1+" "+str2+" "+str3+" "+str4;
                }
            },
            {
                "targets"   : -1,
                "title"     : 'Action',
                "orderable" : false,
                "render"    : function(data, type, full, meta){
                    return "\n\t\t\t\t\t\t<div class='d-flex demo'>\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-success btn-icon btn-inline-block mr-1' title='Tambah Hak Akses' onclick=\"hakAkses("+data+")\"><i class=\"fal fa-list\"></i></a>\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1' title='Edit' onclick=\"edit("+data+")\"><i class=\"fal fa-edit\"></i></a>\n\t\t\t\t\t\t\t</div>";
                }
            }],
            "ajax" : {
                "url" : "Pegawai/datatableListUser",
                "type" : "POST",
                "data" : function(d){
                    d.Status = getStatusUser(); 
                }
            },
        });

        tabelHakAkses = $("#dataTableHakAkses").DataTable({
            initComplete : function(){
                var api = this.api();
                $("#dataTableHakAkses_filter input")
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
                    return "\n\t\t\t\t\t\t<div class='d-flex demo'>\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-danger btn-icon btn-inline-block mr-1' title='Hapus Hak Akses' onclick=\"hapus("+data+")\"><i class=\"fal fa-times\"></i></a>\n\t\t\t\t\t\t\t</div>";
                }
            }],
            "ajax" : {
                "url" : "Pegawai/datatableListHakAkses",
                "type" : "POST",
            },
        });
    });

$('#NIP').on('select2:selecting', function(e) {
    nip = e.params.args.data.id;

    $.ajax({
        url: 'Pegawai/getByNip',
        type: 'GET',
        dataType: 'JSON',
        data: {NIP: nip},
        success: function(data){
            $('[name="NipPegawai"]').val(data.NIPPegawai);
            $('[name="Pangkat"]').val(data.GolPegawai);
            $('[name="Jabatan"]').val(data.JabatanPegawai);
            $('[name="Unit"]').val(data.Seksi);
            $('.select2').trigger('change');
        }
    })
});

function tambah(){
    $('#simpan').val('new');
    $('#form')[0].reset();
    $('.select2').trigger('change');
    $('.modal-title').text('Tambah Data User');
    $('#modalForm').modal('show');
}

function userTidakAktif(){
    if (statusUser == "Y") {
        statusUser = "N";
        $("#statusUser").empty().append("User Aktif");
    } else {
        statusUser = "Y";
        $("#statusUser").empty().append("User Tidak Aktif");
    }
    tabel.ajax.reload(null,false);
}

function getStatusUser(){
    return statusUser;
}

function hakAkses(id){
    tabelHakAkses.ajax.url('Pegawai/datatableListHakAkses/'+id).load();
    $('[name="IdUser"]').val(id);
    $('.hakAkses').text('Hak Akses User');
    $('#modalHakAkses').modal('show');
}

$("#addHakAkses").on('click', function(event) {
    event.preventDefault();
    /* Act on the event */

    val = $('[name="HakAkses"]').val();
    if (val == 0) {
        $('#formHakAkses').addClass('was-validated');
        play = document.getElementById('notification');
        toastr.error('Pilih Hak Akses Yang Akan Ditambahkan','Gagal');
        play.play();
        delete play;
    } else {
        IdUser = $('[name="IdUser"]').val();
        $.ajax({
            url: 'Pegawai/AddHakAkses',
            type: 'POST',
            dataType: 'JSON',
            data: $('#formHakAkses').serializeArray(),
            success: function(d){
                play = document.getElementById('notification');
                if (d.status == 'success') {
                    toastr.success(d.pesan,'Berhasil');
                } else {
                    toastr.error(d.pesan,'Gagal');
                }

                play.play();
                delete play;
                tabelHakAkses.ajax.url('Pegawai/datatableListHakAkses/'+IdUser).load();
            }
        })
    }    
});

function edit(id){
    $.ajax({
        url: 'Pegawai/getUserById',
        type: 'GET',
        dataType: 'JSON',
        data: {ID: id},
        success: function(data){
            $('#form')[0].reset();
            $('#simpan').val(id);
            $('#NIP').append('<option value="'+data.NIPPegawai+'">'+data.NamaPegawai+'</option>');
            $('[name="NIP"]').val(data.NIPPegawai);
            $('[name="NipPegawai"]').val(data.NIPPegawai);
            $('[name="Pangkat"]').val(data.GolPegawai);
            $('[name="Unit"]').val(data.Seksi);
            $('[name="Jabatan"]').val(data.JabatanPegawai);
            $('[name="Uname"]').val(data.NmUser);
            $('[name="GrupMenu"]').val(data.GrupMenu);
            $('[name="Status"]').val(data.StatusUser)
            $('.select2').trigger('change');
            $('.modal-title').text('Ubah Data User');
            $('#modalForm').modal('show');
        }
    })       
}

$('#simpan').on('click', function(event) {
    event.preventDefault();
    /* Act on the event */        
    if ($('#form')[0].checkValidity() === false) {
        $("#form").addClass('was-validated');
        play = document.getElementById('notification');
        toastr.error('Isi Form Dengan Lengkap dan Benar','Gagal');
        play.play();
        delete play;
    } else {
        val = $('#simpan').val();
        data = $('#form').serializeArray();

        if (val == 'new') {
            url = 'Pegawai/AddUser';
        } else {
            url = 'Pegawai/UpdateUser';
            data[data.length] = {name: 'IdUser', value: val};
        }

        $.ajax({
            url: url,
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
                $("#modalForm").modal('hide');
                tabel.ajax.reload();
            }
        })           
    }

});

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
        title: "Kontrak Kinerja Akan Dihapus?",
        text: "Anda Tidak Akan Dapat Mengembalikan Data Kontrak Kinerja",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, Hapus Kontrak!",
        cancelButtonText: "Tidak, Batalkan!",
        reverseButtons: true
    })
    .then(function(result)
    {
        if (result.value)
        {   
            IdUser = $('[name="IdUser"]').val();
            $.ajax({
                url: 'Pegawai/HapusHakAkses',
                type: 'POST',
                dataType: 'JSON',
                data: {ID: id},
                success: function(d){
                    if (d['status'] == 'success') {
                        swalWithBootstrapButtons.fire(
                            "Terhapus!",
                            "Data Hak Akses Berhasil Dihapus",
                            "success"
                            );
                    } else {
                        swalWithBootstrapButtons.fire(
                            "Telah Terjadi Kesalahan!",
                            "Data Hak Akses Gagal Dihapus <br> Harap Menghubungi Administrator",
                            "error"
                            );
                    }
                    tabelHakAkses.ajax.url('Pegawai/datatableListHakAkses/'+IdUser).load();
                }
            })
        }
        else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
                )
        {
            swalWithBootstrapButtons.fire(
                "Cancelled",
                "Your imaginary file is safe :)",
                "error"
                );
        }
    });
}
</script>