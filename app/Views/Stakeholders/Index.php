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
                        <button type="button" class="btn btn-xs btn-success waves-effect waves-themed" id="new" style="margin-right: 10px;"><span class="fas fa-plus-circle"></span> Tambah</button>
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
                    <form class="needs-validation" id="form" novalidate enctype="multipart/form-data">
                        <!-- <h2>Pemberi Kerja</h2> -->
                        <div class="form-group">
                            <label class="form-label" for="nama">Cari Perusahaan</label>
                            <input type="text" class="form-control" list="dataNama" id="idNib" name="idNib" placeholder="Input Nama Perusahaan">
                            <datalist class="form-control" id="dataNama">

                            </datalist>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="nama">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="namaPerusahaan" name="namaPerusahaan" placeholder="Input Nama Perusahaan" required>
                            <div class="invalid-feedback">
                                Kolom Nama Perusahaan Harus Diisi.
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="NPWP">Nomor Pokok Wajib Pajak (NPWP)</label>
                            <input type="text" class="form-control" id="NPWP" name="npwp-mask" placeholder="Input Nomor Pokok Wajib Pajak" data-inputmask="'mask':'99.999.999.9-999.999'" required>
                            <div class="invalid-feedback">
                                Kolom Nomor Pokok Wajib Pajak (NPWP) Harus Diisi.
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label class="form-label" for="fasilitas">Jenis Fasilitas</label>
                                    <select class="form-control select2" id="fasilitas" name="fasilitas" required>
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
                                    <select class="form-control select2" id="jns-tpb" name="jns-tpb" required>
                                    </select>
                                    <div class="invalid-feedback">
                                        Kolom Jenis TPB Harus Diisi.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="alamat">Alamat Kantor</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap Kantor" required>
                            <div class="invalid-feedback">
                                Kolom Alamat Kantor Harus Diisi.
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="alamat-pabrik">Alamat Pabrik</label>
                            <input type="text" class="form-control" id="alamat-pabrik" name="alamat-pabrik" placeholder="Alamat Lengkap Pabrik" required>
                            <div class="invalid-feedback">
                                Kolom Alamat Pabrik Harus Diisi.
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-xl-6">
                                <label class="form-label" for="skep">Nomor Skep TPB</label>
                                <input type="text" class="form-control" id="skep" name="skep" placeholder="Nomor Skep TPB Terbaru" required>
                                <div class="invalid-feedback">
                                    Kolom Nomor Skep TPB Harus Diisi.
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label class="form-label" for="tanggal">Tanggal Skep</label>
                                    <input type="text" class="form-control tanggal" id="tanggal" name="tanggal" placeholder="yyyy-mm-dd" required>
                                    <div class="invalid-feedback">
                                        Kolom Tanggal Skep Harus Diisi.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label class="form-label" for="usaha">Kategori Usaha</label>
                                    <input type="text" class="form-control" id="usaha" name="usaha" placeholder="Bidang Usaha Perusahaan" required>
                                    <div class="invalid-feedback">
                                        Kolom Kategori Usaha Harus Diisi.
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label class="form-label" for="profil">Profil Resiko</label>
                                    <select class="form-control select2" id="profil" name="profil" required>
                                        <?php foreach ($options['ProfilResiko'] as $key => $value) { ?>
                                            <option value="<?php echo $key?>"><?php echo $value ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Kolom Profil Resiko Harus Diisi.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label class="form-label" for="penanggung-jawab">Nama Penanggung Jawab</label>
                                    <input type="text" class="form-control" id="penanggung-jawab" name="penanggung-jawab" placeholder="Nama Penanggung Jawab" required>
                                    <div class="invalid-feedback">
                                        Kolom Nama Penanggung Jawab Harus Diisi.
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label class="form-label" for="warga-negara">Warga Negara</label>
                                    <input type="text" class="form-control" id="warga-negara" name="warga-negara" placeholder="Warga Negara Penanggung Jawab" required>
                                    <div class="invalid-feedback">
                                        Kolom Warga Negara Harus Diisi.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label class="form-label" for="Koordinat">Koordinat</label>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <input type="text" class="form-control" id="longitude" name="longitude" placeholder="longitude" required>
                                        </div>
                                        <div class="col-xl-6">
                                            <input type="text" class="form-control" id="latitude" name="latitude" placeholder="latitude" required>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">
                                        Kolom Koordinat Harus Diisi.
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label class="form-label" for="lokasi">Lokasi Perusahaan</label>
                                    <select class="form-control select2" id="lokasi" name="lokasi" required>
                                        <?php foreach ($options['Lokasi'] as $key => $value) { ?>
                                            <option value="<?php echo $key?>"><?php echo $value ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Kolom Lokasi Perusahaan Harus Diisi.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label class="form-label" for="luas">Luas Pabrik</label>
                                    <input type="text" class="form-control" id="luas" name="luas" placeholder="Total Luas Pabrik" required>
                                    <div class="invalid-feedback">
                                        Kolom Luas Pabrik Harus Diisi.
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label class="form-label" for="status">Status</label>
                                    <select class="form-control select2" id="status" name="status" required>
                                        <option value="Y">Aktif</option>
                                        <option value="N">Tidak Aktif</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Kolom Lokasi Perusahaan Harus Diisi.
                                    </div>
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
    $(document).ready(function() {
        $(':input').inputmask();
        $('#fasilitas').select2({
            dropdownParent: $('#fasilitas').parent(),
            width: '100%',
        });

        $('#jns-tpb').select2({
            dropdownParent: $('#jns-tpb').parent(),
            width: '100%',
        });

        $('#profil').select2({
            dropdownParent: $('#profil').parent(),
            width: '100%',
        });

        $('#lokasi').select2({
            dropdownParent: $('#lokasi').parent(),
            width: '100%',
        });

        $('#status').select2({
            dropdownParent: $('#status').parent(),
            width: '100%',
        });

        $('.tanggal').datepicker({
            format: 'yyyy-mm-dd',
            todayHighLight: true,
            orientation: "top right"
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
                    return "\n\t\t\t\t\t\t<div class='d-flex demo'>\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-danger btn-icon btn-inline-block mr-1' title='Delete Record' onclick=\"hapus("+data+")\"><i class=\"fal fa-times\"></i></a>\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1' title='Edit' onclick=\"edit("+data+")\"><i class=\"fal fa-edit\"></i></a>\n\t\t\t\t\t\t\t</div>";
                }
            }],
            "ajax" : {
                "url" : "Stakeholders/datatableList",
                "type" : "POST",
                "data" : {
                    "jenisTPB" : <?php echo $jenisTPB?>
                }
            },
        });
    });

    var idNib;

    $("#fasilitas").on('select2:select', function(event) {
        event.preventDefault();
        selectedVal = $('#fasilitas').find(":selected");
        /* Act on the event */
        $("#jns-tpb").select2("destroy");

        $("#jns-tpb").select2({
            dropdownParent: $('#jns-tpb').parent(),
            width: '100%',
            ajax: {
                url: "Stakeholders/getReferensi",
                dataType: "JSON",
                data: function(params){
                    return{
                        search: selectedVal[0].value
                    }
                },
                processResults: function(data){
                    if (data.length > 0) {
                        var results = [];

                        $.each(data, function(index, item){
                            results.push({
                                id : item.IdReferensi,
                                text : item.NmReferensi+" - "+item.DetailReferensi
                            })
                        });
                        return{
                            results : results
                        };
                    } else {
                        return {results : [{id: selectedVal[0].value, text: selectedVal[0].innerHTML}]};
                    }

                },
                cache : true,
            }
        })
    });

    $("#new").on('click', function(event) {
        event.preventDefault();
        /* Act on the event */
        $("#form")[0].reset();
        $('.select2').trigger('change');
        $("#modalForm").modal('show');
        $('#simpan').val('new');
        $('#jns-tpb').empty();
        $('#jns-tpb').select2('destroy');
        $('#jns-tpb').select2({
            dropdownParent: $('#jns-tpb').parent(),
            width: '100%',
        });
    });

    $("#simpan").on('click', function(event) {
        event.preventDefault();
        /* Act on the event */
        data = $("#form").serializeArray();

        if ($('#form')[0].checkValidity() === false) {
            play = document.getElementById('notification');
            $("#form").addClass('was-validated');
            toastr.error('Isi Form Dengan Lengkap dan Benar','Gagal');
            play.play();
            delete play;
        } else {
            if ($(this).val() == "new") {
                url = "Stakeholders/ajaxAdd";
            } else {
                url = "Stakeholders/ajaxEdit";
                data[data.length] = {name: 'ID', value: $('#simpan').val()};
            }
            var npwp = $('input[name="npwp-mask"]').inputmask('unmaskedvalue');
            data[data.length] = {name: 'npwp', value: npwp};
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
    
    function edit(id){
        // var d;
        $.ajax({
            url: 'Stakeholders/getById',
            type: 'GET',
            dataType: 'JSON',
            data: {ID: id},
            success: function(data){
                // d = data;
                getJnsTpb(data.FASILITAS);
            }
        })
        .done(function(d){
            setTimeout(setValue, 300, d)
        })
    }

    function setValue(d){
        $('#simpan').val(d.ID);
        $('[name="idNib"]').val(d.ID_NIB);
        $('[name="namaPerusahaan"]').val(d.NAMA_PERUSAHAAN);
        $('[name="npwp-mask"]').val(d.NPWP);
        $('[name="fasilitas"]').val(d.FASILITAS);
        $('[name="jns-tpb"]').val(d.JENIS);
        $('[name="alamat"]').val(d.ALAMAT_KANTOR);
        $('[name="alamat-pabrik"]').val(d.ALAMAT_PABRIK);
        $('[name="skep"]').val(d.NO_SKEP);
        $('[name="tanggal"]').val(d.TGL_SKEP);
        $('[name="usaha"]').val(d.KATEGORI_USAHA);
        $('[name="profil"]').val(d.PROFIL_RESIKO);
        $('[name="penanggung-jawab"]').val(d.NAMA_PENANGGUNG_JAWAB);
        $('[name="warga-negara"]').val(d.WN_PENANGGUNG_JAWAB);
        $('[name="longitude"]').val(d.LONGITUDE);
        $('[name="latitude"]').val(d.LATITUDE);
        $('[name="lokasi"]').val(d.LOKASI);
        $('[name="luas"]').val(d.LUAS);
        $('[name="status"]').val(d.STATUS);
        $('.select2').trigger('change');
        $('.modal-title').text('Ubah Data Pengguna Jasa');
        $('#modalForm').modal('show');
    }

    // function hapus(id){
    //     var swalWithBootstrapButtons = Swal.mixin(
    //     {
    //         customClass:
    //         {
    //             confirmButton: "btn btn-primary",
    //             cancelButton: "btn btn-danger mr-2"
    //         },
    //         buttonsStyling: false
    //     });
    //     swalWithBootstrapButtons
    //     .fire(
    //     {
    //         title: "Kontrak Kinerja Akan Dihapus?",
    //         text: "Anda Tidak Akan Dapat Mengembalikan Data Kontrak Kinerja",
    //         type: "warning",
    //         showCancelButton: true,
    //         confirmButtonText: "Ya, Hapus Kontrak!",
    //         cancelButtonText: "Tidak, Batalkan!",
    //         reverseButtons: true
    //     })
    //     .then(function(result)
    //     {
    //         if (result.value)
    //         {   
    //             $.ajax({
    //                 url: 'Ki/deleteKontrak',
    //                 type: 'POST',
    //                 dataType: 'JSON',
    //                 data: {ID_KONTRAK_KINERJA: id},
    //                 success: function(d){
    //                     $("#mainContent").empty();
    //                     getKontrakKinerja();
    //                     if (d[0] == 1) {
    //                         swalWithBootstrapButtons.fire(
    //                             "Terhapus!",
    //                             "Data Kontrak Kinerja Anda Berhasil Dihapus",
    //                             "success"
    //                             );
    //                     } else {
    //                         swalWithBootstrapButtons.fire(
    //                             "Telah Terjadi Kesalahan!",
    //                             "Data Kontrak Kinerja Anda Gagal Dihapus <br> Harap Menghubungi Administrator",
    //                             "error"
    //                             );
    //                     }
    //                 }
    //             })
    //         }
    //         else if (
    //                 // Read more about handling dismissals
    //                 result.dismiss === Swal.DismissReason.cancel
    //                 )
    //         {
    //             swalWithBootstrapButtons.fire(
    //                 "Cancelled",
    //                 "Your imaginary file is safe :)",
    //                 "error"
    //                 );
    //         }
    //     });
    // }

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

    $('[name="idNib"]').keypress(function(event) {
        /* Act on the event */
        var nama = $('input[name="idNib"]').inputmask('unmaskedvalue');
        $.ajax({
            url: 'Stakeholders/getNib',
            type: 'GET',
            dataType: 'JSON',
            data: {nama: nama, select: 'ID, ID_NIB, NAMA_PERSEROAN'},
            success: function(d){
                $("#dataNama").empty();
                $.each(d, function(index, val) {
                 /* iterate through array or object */
                 $("#dataNama").append('<option value="'+val.ID_NIB+'">'+val.NAMA_PERSEROAN+'</option>');
             });
            }
        })
    });

    $('input[name="idNib"]').on('focusout', function(event) {
        var val = $('input[name="idNib"]').inputmask('unmaskedvalue');
        if (typeof val !== "undefined") {
            $.ajax({
                url: 'Stakeholders/getNib',
                type: 'GET',
                dataType: 'JSON',
                data: {ID_NIB: val},
                success: function(d){
                    data = d[0];
                    $('[name="namaPerusahaan"]').val(data.NAMA_PERSEROAN);
                    $('[name="npwp-mask"]').val(data.NPWP_PERSEROAN);
                    $('[name="alamat"]').val(data.AL_NPWP);
                    $('[name="alamat-pabrik"]').val(data.AL_NPWP);
                }
            })
        }
    });

    // $('input["name=nama"]').
</script>