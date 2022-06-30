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
                        <button type="button" class="btn btn-xs btn-primary waves-effect waves-themed" id="newKontrak" style="margin-right: 10px;" onclick="tambah()"><span class="fas fa-plus-circle"></span> Tambah Pegawai</button>
                        <button type="button" class="btn btn-xs btn-danger waves-effect waves-themed" id="statusPegawai" style="margin-right: 10px;" onclick="pegawaiTidakAktif()"><span class="fas fa-plus-circle"></span> Pegawai Tidak Aktif</button>
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
                    <form class="needs-validation" id="form" novalidate="novalidate">
                        <div class="col-xl-12 col-lg-12">
                            <div class="form-group">
                                <label class="form-label" id="labelNIP" for="nipPegawai">Nomor Induk Pegawai</label>
                                <div class="col-xl-12">
                                    <input class="form-control" type="text" name="NIP" id="nipPegawai">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" id="labelNama" for="namaPegawai">Nama Pegawai</label>
                                <div class="col-xl-12">
                                    <input class="form-control" type="text" name="Nama" id="namaPegawai">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xl-6">
                                    <label class="form-label" id="labelGol" for="golPegawai">Golongan Pangkat</label>
                                    <div class="col-xl-12">
                                        <select class="form-control select2" name="Gol" id="golPegawai">

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-xl-6">
                                    <label class="form-label" id="labelEselon" for="eselonPegawai">Eselon</label>
                                    <div class="col-xl-12">
                                        <select class="form-control select2" name="Eselon" id="eselonPegawai">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" id="labelSeksi" for="seksiPegawai">Seksi</label>
                                <div class="col-xl-12">
                                    <select class="form-control select2" name="Seksi" id="seksiPegawai">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" id="labelJabatan" for="jabatanPegawai">Jabatan</label>
                                <div class="col-xl-12">
                                    <select class="form-control select2" name="Jabatan" id="jabatanPegawai">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" id="labelStatus" for="statusPegawai">Status</label>
                                <div class="col-xl-12">
                                    <select class="form-control select2" name="Status" id="statusPegawai">
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
<script type="text/javascript">
    var statusPegawai = "N";
    $(document).ready(function() {
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
                    return "\n\t\t\t\t\t\t<div class='d-flex demo'>\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-danger btn-icon btn-inline-block mr-1' title='Delete Record' onclick=\"hapus("+data+")\"><i class=\"fal fa-times\"></i></a>\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1' title='Edit' onclick=\"edit("+data+")\"><i class=\"fal fa-edit\"></i></a>\n\t\t\t\t\t\t\t</div>";
                }
            }],
            "ajax" : {
                "url" : "Pegawai/datatableList",
                "type" : "POST",
                "data" : function(d){
                    d.Status = getStatusPegawai(); 
                }
            },
        });
    });

    function edit(id){
        $.ajax({
            url: 'Pegawai/getPegawaiById',
            type: 'GET',
            dataType: 'JSON',
            data: {ID: id},
            success: function(data){
                $('#form')[0].reset();
                $("#simpan").val(id);
                $('[name="NIP"]').val(data.NIPPegawai);
                $('[name="Nama"]').val(data.NamaPegawai);
                $('[name="Gol"]').val(data.GolPegawai);
                $('[name="Seksi"]').val(data.Seksi);
                $('[name="Eselon"]').val(data.Eselon);
                $('[name="Jabatan"]').val(data.JabatanPegawai);
                $('[name="Status"]').val(data.Status);
                $('.select2').trigger('change');
                $('.modal-title').text('Ubah Data Pegawai');
                $('#modalForm').modal('show');
            }
        })       
    }

    function tambah(){
        $('#simpan').val('new');
        $('#form')[0].reset();
        $('.select2').trigger('change');
        $('.modal-title').text('Tambah Data Pegawai');
        $('#modalForm').modal('show');
    }

    function pegawaiTidakAktif(){
        tabel.ajax.reload(null,false);
    }

    function getStatusPegawai(){
        if (statusPegawai == "Y") {
            statusPegawai = "N";
            $("#statusPegawai").empty().append("Pegawai Aktif");
        } else {
            statusPegawai = "Y";
            $("#statusPegawai").empty().append("Pegawai Tidak Aktif");
        }
        return statusPegawai;
    }

    $('#simpan').on('click', function(event) {
        event.preventDefault();
        /* Act on the event */

        if ($('#form')[0].checkValidity() === false) {
            play = document.getElementById('notification');
            $("#form").addClass('was-validated');
            toastr.error('Isi Form Dengan Lengkap dan Benar','Gagal');
            play.play();
            delete play;
        } else {
            val = $('#simpan').val();
            data = $('#form').serializeArray();

            if (val == 'new') {
                url = 'Pegawai/AddPegawai';
            } else {
                url = 'Pegawai/UpdatePegawai';
                data[data.length] = {name: 'IdPegawai', value: val};
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
</script>