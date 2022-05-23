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
                    </div>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <!-- datatable start -->
                    <table id="dataTable" class="table table-bordered table-hover table-striped w-100 dataTable no-footer" role="grid">
                        <thead>
                            <th>No</th>
                            <th>NPWP</th>
                            <th style="width: 20%;">Nama Perusahaan</th>
                            <th>Petunjuk Akses</th>
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
<script type="text/javascript">
    $(document).ready(function() {
        var jenisAkses = <?php echo $akses;?>;
        $(':input').inputmask();
        
        $('#Jenis').select2({
            width: '100%',
            dropdownParent: $("#Jenis").parent()
        });

        $('#Aplikasi').select2({
            width: '100%',
            dropdownParent: $("#Aplikasi").parent()
        });

        $('#Status').select2({
            width: '100%',
            dropdownParent: $("#Status").parent()
        });

        $('#NamaAplikasi').select2({
            width: '100%',
            allowClear: true,
            dropdownParent: $('#NamaAplikasi').parent(),
            placeholder: 'Input Nama Aplikasi Yang Digunakan',
            ajax: {
                url: 'Akses/getReferensi?column=NAMA_APLIKASI&jenis='+jenisAkses,
                dataType: 'JSON',
                data: function(params){
                    val = $('[name="tipe"]').inputmask('unmaskedvalue');
                    if (typeof params.term != 'undefined') {
                        var query = {
                            search: params.term,
                            jenis: val,
                            column: 'NAMA_APLIKASI'
                        }
                    }
                    return query;
                },
                processResults: function(d){
                    console.log(d.data);
                    if (d.data != null) {
                        var results = [];

                        $.each(d.data, function(index, val) {
                           results.push({
                            id: val.NAMA_APLIKASI,
                            text: val.NAMA_APLIKASI
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
                "title"     : 'NPWP',
                "orderable" : false,
                "render"    : function(data, type, full, meta){
                    str1 = data.substring(0, 2);
                    str2 = data.substring(2, 5);
                    str3 = data.substring(5, 8);
                    str4 = data.substring(8, 9);
                    str5 = data.substring(9, 12);
                    str6 = data.substring(12);
                    return str1+"."+str2+"."+str3+"."+str4+"-"+str5+"."+str6;
                }
            },
            {
                "targets"   : 3,
                "title"     : 'Petunjuk Akses',
                "orderable" : false,
                "render"    : function(data, type, full, meta){
                    str = data.replace(/(?:\r\n|\r|\n)/g, '<br>');
                    return str;
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
                "url" : "Akses/datatableList",
                "type" : "POST",
                "data" : {
                    "tipeAkses" : <?php echo $tipeAkses?>
                }
            },
        });
    });

function edit(id){
    $.ajax({
        url: 'Akses/getAksesById',
        type: 'GET',
        dataType: 'JSON',
        data: {ID: id},
        success: function(data){
            $('#Form')[0].reset();
            switch (data.TIPE_AKSES) {
                case '1':
                $('#divJenisCctv').removeClass('sr-only');
                $('#JenisCctv').removeAttr('disabled').attr('required', 'required');
                $('#divItProvider, #divSealProvider').addClass('sr-only');
                $('#itProvider, #sealProvider').removeAttr('required').attr('disabled', 'disabled');
                $('[name="JenisCctv"]').val(data.JENIS_CCTV);
                break;
                case '2':
                $('#divItProvider').removeClass('sr-only');
                $('#itProvider').removeAttr('disabled').attr('required', 'required');
                $('#divJenisCctv, #divSealProvider').addClass('sr-only');
                $('#JenisCctv, #sealProvider').removeAttr('required').attr('disabled', 'disabled');
                $('[name="itProvider"]').val(data.PROVIDER_IT_INVENTORY);
                break;
                default:
                $('#divSealProvider').removeClass('sr-only');
                $('#sealProvider').removeAttr('disabled').attr('required', 'required');
                $('#divJenisCctv, #divItProvider').addClass('sr-only');
                $('#JenisCctv, #itProvider').removeAttr('required').attr('disabled', 'disabled');
                $('[name="sealProvider"]').val(data.PROVIDER_E_SEAL);
                break;
            }
            $('#simpan').val(data.ID_AKSES);
            $('[name="tipe"]').val(data.TIPE_AKSES);
            $('[name="Stakeholders"]').val(data.NAMA_PERUSAHAAN);
            $('[name="npwp-mask"]').val(data.NPWP);
            $('[name="Jenis"]').val(data.JENIS_AKSES);
            $('[name="Aplikasi"]').val(data.APLIKASI_AKSES);
            $('[name="NamaAplikasi"]').val(data.NAMA_APLIKASI);
            $('[name="Akses"]').val(data.ALAMAT_AKSES);
            $('[name="Username"]').val(data.USERNAME);
            $('[name="Password"]').val(data.PASSWORD);
            $('[name="Petunjuk"]').val(data.PETUNJUK_AKSES);
            $('[name="Status"]').val(data.STATUS);
            $('[name="Ket"]').val(data.KETERANGAN);
            $('.select2').trigger('change');
            $('.modal-title').text('Ubah Data Akses');
            $('#modalForm').modal('show');
        }
    })       
}

$("#simpan").on('click', function(event) {
    event.preventDefault();
    data = $('#Form').serializeArray();
    npwp = $('[name="npwp-mask"]').inputmask('unmaskedvalue');
    data[data.length] = {name: 'npwp', value: npwp}
    data[data.length] = {name: 'ID_AKSES', value: $('#simpan').val()}
    /* Act on the event */
    if ($('Form')[0].checkValidity() === false) {
        $("#Form").addClass('was-validated');
        play = document.getElementById('notification');
        toastr.error('Isi Form Dengan Lengkap dan Benar','Gagal');
        play.play();
        delete play;
    } else {
        $.ajax({
            url: 'Akses/UpdateAkses',
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