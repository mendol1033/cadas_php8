<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    <span class="fw-300"><i>Form</i> </span>&nbsp; <?php echo $pageTitle;?> 
                </h2>
                <div class="panel-toolbar">
                    <div class="panel-toolbar flex-row-reverse">
                        <button id="btnFullscreen" class="btn btn-warning btn-pills btn-xs waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen" style="width: 90;">Fullscreen</button>
                    </div>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <form class="needs-validation" id="form" novalidate="novalidate">
                        <div class="form-group" id="NamaPegawai">
                            <label for="NamaPegawai" class="form-label">Nama Pegawai</label>                        
                            <select name="NIP" id="NIP" class="form-control select2" style="width:100%;">
                            </select>
                        </div>
                        <div class="form-group" id="NIPPegawai">
                            <label for="NipPegawai" class="form-label">NIP Pegawai</label>
                            <input type="text" name="NipPegawai" class="form-control">
                        </div>
                        <div class="form-group" id="Pangkat">
                            <label for="Pangkat" class="form-label">Pangkat</label>                     
                            <div class="col-xl-12">
                                <select name="Pangkat" id="Pangkat" class="form-control select2" style="width:100%;">
                                    <option value="0">--PILIH PANGKAT PEGAWAI--</option>
                                    <option value="21">PENGATUR MUDA / II/a</option>
                                    <option value="22">PENGATUR MUDA TK. I / II/b</option>
                                    <option value="23">PENGATUR / II/c</option>
                                    <option value="24">PENGATUR TK. I / II/d</option>
                                    <option value="31">PENATA MUDA / III/a</option>
                                    <option value="32">PENATA MUDA TK.I / III/b</option>
                                    <option value="33">PENATA / III/c</option>
                                    <option value="34">PENATA TK.I / III/d</option>
                                    <option value="41">PEMBINA / IV/a</option>
                                    <option value="42">PEMBINA TK.I / IV/b</option>
                                    <option value="43">PEMBINA UTAMA MUDA / IV/c</option>
                                    <option value="44">PEMBINA UTAMA MADYA / IV/d</option>
                                    <option value="45">PEMBINA UTAMA / IV/e</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group" id="Jabatan">
                            <label for="Jabatan" class="form-label">Jabatan</label>                     
                            <div class="col-xl-12">
                                <select name="Jabatan" id="Jabatan" class="form-control select2" style="width:100%;">
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
                                <select name="Unit" id="Unit" class="form-control select2" style="width:100%;">
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
                                <input type="text" name="Username" value="" id="Username" class="form-control valid" placeholder="Username Pegawai" autocomplete="off">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Password" class="form-label">Password</label>                       
                            <div class="col-xl-12">
                                <input type="password" name="Password" value="" id="Password" class="form-control" placeholder="Password" autocomplete="off">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="GrupMenu" class="form-label">Grup Menu</label>                      
                            <div class="col-xl-12">
                                <select name="GrupMenu" id="GrupMenu" class="form-control select2">
                                    <option value="0">-- Pilih Menu Grup --</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Informasi</option>
                                    <option value="3">Kepala Kantor</option>
                                    <option value="4">Subbagian Umum</option>
                                    <option value="5">Penindakan</option>
                                    <option value="6">PKC</option>
                                    <option value="7">Perbendaharaan</option>
                                    <option value="8">Penyuluhan dan Layanan Informasi</option>
                                    <option value="9">Manifest</option>
                                    <option value="10">Kepatuhan Internal</option>
                                    <option value="11">PDAD</option>
                                    <option value="12">Hanggar</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Status" class="form-label">Status</label>                       
                            <div class="col-xl-12">
                                <select name="Status" id="Status" class="form-control">
                                    <option value="Y">AKTIF</option>
                                    <option value="N">TIDAK AKTIF</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-secondary waves-effect waves-themed" data-dismiss="modal" onclick="loadPage('Pegawai/user')">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-themed" id="simpan" value="new">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2({
            width: '100%',
            dropdownParent: "#modalForm"
        });

        $("#NIP").select2({
            placeholder: 'Masukkan Nama Pegawai',
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
    });

    $('#NIP').on('select2:select', function(e) {
        console.log(e);
        nip = e.params.data.id;

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
                console.log(data);
            }
        })
    });
</script>

