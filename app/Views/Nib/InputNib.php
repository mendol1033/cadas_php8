<div class="row">
    <div class="col-xl-3">

    </div>
    <div class="col-xl-6">
        <div id="alertSpace">
            
        </div>
        <div id="panel-4" class="panel">
            <div class="panel-hdr">
                <h2>
                    Form Input <span class="fw-300"><i>Data NIB</i></span>
                </h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel waves-effect waves-themed" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <form class="needs-validation" id="formNib" novalidate enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-label" for="noNib">Nomor Induk Berusaha (NIB)</label>
                            <input type="text" class="form-control" id="noNib" name="noNib" required>
                            <div class="invalid-feedback">
                                Kolom Nomor Induk Berusaha Harus Diisi.
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="tanggal">Tanggal NIB</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="dd/mm/yyyy">
                                <div class="input-group-append">
                                    <span class="input-group-text fs-xl">
                                        <i class="fal fa-calendar-alt"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="invalid-feedback">
                                Kolom Tanggal NIB Harus Diisi.
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="namaPerusahaan">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="namaPerusahaan" name="namaPerusahaan" required>
                            <div class="invalid-feedback">
                                Kolom Nama Perusahaan Harus Diisi.
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="alamat">Alamat Perusahaan</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                            <div class="invalid-feedback">
                                Kolom Alamat Perusahaan Harus Diisi.
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="npwp">Nomor Pokok Wajib Pajak (NPWP)</label>
                            <input type="text" class="form-control" id="npwp" name="npwp-mask" data-inputmask="'mask':'99.999.999.9-999.999'" required>
                            <div class="invalid-feedback">
                                Kolom Nomor Pokok Wajib Pajak Harus Diisi.
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="telepon">Nomor Telepon</label>
                            <input type="text" class="form-control" id="telepon" name="telepon" data-inputmask="'mask':'(999) 9999-9{1,6}'" required>
                            <div class="invalid-feedback">
                                Kolom Nomor Telepon Harus Diisi.
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="fax">Nomor Fax</label>
                            <input type="text" class="form-control" id="fax" name="fax" data-inputmask="'mask':'(999) 9999-9{1,6}'" required>
                            <div class="invalid-feedback">
                                Kolom Nomor Fax Harus Diisi.
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email">Alamat Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            <div class="invalid-feedback">
                                Kolom Alamat Email Harus Diisi.
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="kbli">Klasifikasi Baku Lapangan Usaha Indonesia (KBLI)</label>
                            <select class="form-control select2" id="kbli" name="kbli[]" multiple required>
                            </select>
                            <div class="invalid-feedback">
                                Kolom Klasifikasi Baku Lapangan Usaha Indonesia Harus Diisi.
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="api">Jenis Angka Pengenal Impor</label>
                            <select class="form-control select2" id="api" name="api" required>
                                <option value="API-P">Angka Pengenal Importir Produsen</option>
                                <option value="API-U">Angka Pengenal Importir Umum</option>
                                <option value="API-T">Angka Pengenal Importir Terbatas</option>
                                <option value="API-K">Angka Pengenal Importir Khusus</option>                                
                            </select>
                            <div class="invalid-feedback">
                                Kolom Jenis Angka Pengenal Impor Harus Diisi.
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="modal">Status Penanaman Modal</label>
                            <select class="form-control select2" id="modal" name="modal" required>
                                <option value="PMA">Penanaman Modal Asing</option>
                                <option value="PMDN">Penanaman Modal Dalam Negeri</option>
                            </select>
                            <div class="invalid-feedback">
                                Kolom Status Penanaman Modal Harus Diisi.
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="scanNib">Upload File NIB</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="scanNib" id="scanNib" required>
                                <label class="custom-file-label" for="scanNib" id="labelScanNib">Pilih File...</label>
                                <div class="invalid-feedback">Pilih File NIB yang akan diupload terlebih dahulu.</div>
                            </div>
                        </div>
                        <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="kbm" id="kbm" value="Y">
                                <label class="custom-control-label" for="kbm">Flag Kawasan Berikat Mandiri</label>
                            </div>
                            <button class="btn btn-primary ml-auto waves-effect waves-themed" type="submit">Submit form</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">

    </div>
</div>                                                                                     
<script type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        document.getElementById('noNib').focus();
        $(':input').inputmask();
        var controls = {
            leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
            rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
        }
        $('.select2').select2();
        $('[name="tanggal"]').datepicker({
            language: "id",
            format: "dd-mm-yyyy",
            orientation: "bottom right",
            todayHighlight: true,
            templates: controls
        });

        $("#kbli").select2({
            placeholder: 'Ketik Kode Jenis KBLI atau Nama Jenis Lapangan Usaha Anda',
            minimumInputLength: 3,
            allowClear: true,
            ajax : {
                url : "Nib/getKbli",
                dataType : "JSON",
                delay : 250,
                data : function(params){
                    return{
                        kode : params.term
                    };
                },
                processResults: function(data){
                    // console.log(data);
                    var results = [];

                    $.each(data, function(index, item){
                        results.push({
                            id : item.KODE_KBLI,
                            text : item.KATEGORI_KBLI
                        })
                    });
                    return{
                        results : results
                    };
                },
                cache : true
            }
        })
    });

    $('#formNib').on('submit', function(event) {
        event.preventDefault();
        /* Act on the event */
        var data = new FormData(this);
        var main = $('main');

        if (this.checkValidity() === false) {
            $('#formNib').addClass('was-validated');
        } else {
            var npwp = $('input[name="npwp-mask"]').inputmask('unmaskedvalue');
            data.append('npwp',npwp)
            $.ajax({
                url: 'Nib/addNib',
                type: 'POST',
                contentType : false,
                cache : false,
                processData : false,
                dataType: 'JSON',
                data: data,
                success: function(d){
                    if (d.status == 'success') {
                        $("#alertSpace").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><button id="alertButton" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="fal fa-trash-alt"></i></span></button><strong>'+d.status+'! </strong>'+d.pesan+'.</div>');
                    } else {
                        $("#alertSpace").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button id="alertButton" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="fal fa-trash-alt"></i></span></button><strong>'+d.status+'! </strong>'+d.pesan+'.</div>');
                    }
                    setTimeout(dismiss,5000);
                }
            })
            .done(function(){
                document.getElementById('alertButton').focus();
            })            
        }

    });

    function dismiss(){
        $("#alertSpace").empty();
    }

    $('[name="scanNib"]').on('change', function(event) {
        event.preventDefault();
        /* Act on the event */
        $("#labelScanNib").text(this.files[0].name);
        // console.log([event,this]);
    });

</script>