<div class="row justify-content-between">
    <div class="col-xl-6 border-faded bg-faded p-3 mb-g">
        <form class="needs-validation" id="form-search">
            <div class="form-group d-flex">
                <div class="col-xl-2">
                    <label class="form-label">Nama Perusahaan</label>
                </div>
                <div class="col-xl-8">
                    <input type="text" id="nama" class="form-control shadow-inset-2 form-control" placeholder="Nama Perusahaan" name="nama">
                </div>
            </div>
            <div class="form-group d-flex">
                <div class="col-xl-2">
                    <label class="form-label">Tanggal</label>
                </div>
                <div class="col-xl-3">
                    <input type="text" id="tanggalMulai" name="tanggalMulai" class="form-control shadow-inset-2 form-control tanggal" placeholder="yyyy-mm-dd">
                </div>
                <div class="col-xl-1"><span class="form-label">s.d.</span></div>
                <div class="col-xl-3">
                    <input type="text" id="tanggalAkhir" name="tanggalAkhir" class="form-control shadow-inset-2 form-control tanggal" placeholder="yyyy-mm-dd">
                </div>
                <div class="col-xl-4">
                    <button type="button" class="btn btn btn-outline-primary waves-effect waves-themed" id="cari">
                        <span class="fal fa-search mr-1"></span>
                        Cari Data
                    </button>
                </div>
            </div>
        </form> 
    </div>
    <div class="col-xl-3 border-faded bg-faded p-3 mb-g d-flex flex-row-reverse align-items-end">
        <div class="col-xl-4">
            <button class="btn btn btn-outline-primary waves-effect waves-themed" id="rekam">
                <span class="fal fa-plus mr-1"></span>
                Rekam Monev
            </button>
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
                            <th style="vertical-align: middle;">No</th>
                            <th style="vertical-align: middle;">NPWP</th>
                            <th style="width: 20%;">
                                Nama Perusahaan <br>
                                Fasilitas <br>
                                Nomor Skep TPB
                            </th>
                            <th style="vertical-align: middle; width: 40%;">Alamat</th>
                            <th style="vertical-align: middle;">Periode</th>
                            <th style="vertical-align: middle;">Tanggal Laporan</th>
                            <th style="vertical-align: middle;">Action</th>
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
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">   
                <form id="formMonevUmum" class="needs-validation" enctype="multipart/form-data" novalidate="novalidate">
                    <table class="table table-striped" style="width: 100%;">
                        <tr>
                            <td style="width: 20%;">
                                <label class="control-label">Nama Perusahaan</label>
                            </td>
                            <td>
                                <select class="form-control select2" name="idPerusahaan" id="idPerusahaan" required>

                                </select>
                                <div class="invalid-feedback">
                                    Kalom Nama Perusahan Tidak Boleh Kosong.
                                </div>
                            </td>
                        </tr>
                        <tr class="sr-only">
                            <td colspan="2">

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="control-label">Alamat</label>
                            </td>
                            <td>
                                <input class="form-control" type="text" name="alamat" id="alamat" required>
                                <div class="invalid-feedback">
                                    Kalom Alamat Perusahan Tidak Boleh Kosong.
                                </div>
                            </td>
                            
                        </tr>
                        <tr class="sr-only">
                            <td colspan="2">

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="control-label">Tanggal Pelaksanaan</label>
                            </td>
                            <td>
                                <input class="form-control tanggal" type="text" name="tanggal" id="tanggal" required>
                                <div class="invalid-feedback">
                                    Kalom Tanggal Pelaksanaan Tidak Boleh Kosong.
                                </div>
                            </td>
                        </tr>
                        <tr class="sr-only">
                            <td colspan="2">

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="control-label">Flag KB Mandiri</label>
                            </td>
                            <td>
                                <select class="form-control select2" name="FlagMandiri" id="FlagMandiri">
                                    <option value="Y">YA</option>
                                    <option value="N" selected>TIDAK</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="sr-only">
                            <td colspan="2">

                            </td>
                        </tr>
                    </table>
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="akses" class="table table-hover table-striped sr-only">
                                <thead>
                                    <th style="width: 15%;"></th>
                                    <th class="text-center" style="width: 30%;">Akses CCTV</th>
                                    <th class="text-center" style="width: 30%;">Akses IT Inventory</th>
                                    <th class="text-center" style="width: 25%;">Akses E-Seal</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <strong>Link Akses</strong>
                                        </td>
                                        <td class="text-center">
                                            <a id="linkCctv" target="_blank">
                                                <i class="fas fa-video"></i>
                                            </a> &nbsp; 
                                            <input type="hidden" name="linkCctv">
                                            <button type="button" id="btnCctv" class="btn btn-default" onclick="salin('linkCctv')">Copy Link</button>
                                        </td>
                                        <td class="text-center">
                                            <a id="linkIt" target="_blank">
                                                <i class="fas fa-boxes"></i>
                                            </a> &nbsp; 
                                            <input type="hidden" name="linkIt">
                                            <button type="button" class="btn btn-default" onclick="salin('linkIt')">Copy Link</button>
                                        </td>
                                        <td class="text-center">
                                            <a id="linkEseal" target="_blank">
                                                <i class="fas fa-lock"></i>
                                            </a> &nbsp;
                                            <input type="hidden" name="linkEseal">
                                            <button type="button" class="btn btn-default" onclick="salin('linkEseal')">Copy Link</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table> 
                        </div>
                    </div>
                    <table class="table table-bordered table-responsive table-hover table-striped">
                        <thead>
                            <th rowspan="2" style="text-align: center; vertical-align: middle; width: 5%;">NO</th>
                            <th rowspan="2" style="text-align: center; vertical-align: middle; width: 30%">KRITERIA</th>
                            <th colspan="3" style="text-align: center; vertical-align: middle; width: 30%;">KONDISI</th>
                            <th rowspan="2" style="text-align: center; vertical-align: middle; width: 35%;">PEMBUKTIAN</th>
                            <tr>
                                <th style="text-align: center; vertical-align: middle; width: 5%;">YA</th>
                                <th style="text-align: center; vertical-align: middle; width: 5%;">TIDAK</th>
                                <th style="text-align: center; vertical-align: middle;">KETERANGAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center; vertical-align: top;">1</td>
                                <td style="vertical-align: top;">Izin Usaha perusahaan TPB masih berlaku</td>
                                <td class="bg-success" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist1" value="Y" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="bg-danger" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist1" value="N">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td style="vertical-align: top; width: 25%">
                                    <textarea class="form-control" style="width: 100%; height: 100px;" name="keterangan1"></textarea>
                                    <br>
                                    <label>Sertakan file jika ada</label>
                                    <input class="form-control" type="file" multiple="multiple" name="file1[]" style="width: 100%;">
                                </td>
                                <td style="vertical-align: top;">Cek izin usaha (bisa dilihat dari file arsip yang sudah ada) <br> <i>Cantumkan masa berlaku pada kolom keterangan</i> <br> <br> <i>Cukup dicentang jika data yang ada masih sama seperti data pada arsip</i></td>
                            </tr>
                            <tr class="sr-only">
                                <td colspan="6">

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center; vertical-align: top;">2</td>
                                <td style="vertical-align: top;">Penanggung Jawab TPB yang tercantum dalam izin TPB sesuai dengan akte perusahaan terakhir</td>
                                <td  class="bg-success" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist2" value="Y" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="bg-danger" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist2" value="N">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td style="vertical-align: top; width: 25%">
                                    <textarea class="form-control" style="width: 100%; height: 100px;" name="keterangan2"></textarea>
                                    <br>
                                    <label>Sertakan file jika ada</label>
                                    <input class="form-control" type="file" multiple="multiple" name="file2[]" style="width: 100%;">
                                </td>
                                <td style="vertical-align: top;">Cek akte terakhir (bisa dilihat dari file arsip yang sudah ada) <br> <i>Cukup dicentang jika data yang ada masih sama seperti data pada arsip</i> <br> <i>Pengecekan dilakukan sebulan sekali, untuk meyakini kebenaran penanggung jawab TPB dapat dimintakan surat pernyataan dari pimpinan perusahaan</i> <br> <br> <i>Cantumkan nama jika ada penanggung jawab baru untuk rekomendasi presentasi proses bisnis ulang</i></td>
                            </tr>
                            <tr class="sr-only">
                                <td colspan="6">

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center; vertical-align: top;">3</td>
                                <td style="vertical-align: top;">Di Lokasi TPB dipasang tanda nama perusahaan dan jenis TPB pada tempat yang dapat dilihat jelas oleh umum</td>
                                <td class="bg-success" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist3" value="Y" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="bg-danger" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist3" value="N">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td style="vertical-align: top; width: 25%">
                                    <textarea class="form-control" style="width: 100%; height: 100px;" name="keterangan3"></textarea>
                                    <br>
                                    <label>Sertakan file jika ada</label>
                                    <input class="form-control" type="file" multiple="multiple" name="file3[]" style="width: 100%;">
                                </td>
                                <td style="vertical-align: top;">Foto tanda nama perusahaan (cukup dilakukan centang jika masih ada dan belum berubah) <br> <br><i>Cukup dicentang jika data yang ada masih sama seperti data pada arsip</i></td>
                            </tr>
                            <tr class="sr-only">
                                <td colspan="6">

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center; vertical-align: top;">4</td>
                                <td style="vertical-align: top;">Tersedia ruang hanggar yang layak dab representatif untuk melakukan tugas beserta sarana penunjangnya</td>
                                <td class="bg-success" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist4" value="Y" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="bg-danger" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist4" value="N">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td style="vertical-align: top; width: 25%">
                                    <textarea class="form-control" style="width: 100%; height: 100px;" name="keterangan4"></textarea>
                                    <br>
                                    <label>Sertakan file jika ada</label>
                                    <input class="form-control" type="file" multiple="multiple" name="file4[]" style="width: 100%;">
                                </td>
                                <td style="vertical-align: top;">
                                    Foto tampak luar dan dalam ruang hanggar<br><br>
                                    Kriteria layak dan representatif: <br>
                                    <div class="row">
                                        <ul>
                                            <li>
                                                Ketersediaan ruangan lain sebagai penunjang seperti ruang istirahat dan toilet yang bersih dan memadai
                                            </li>
                                            <li>
                                                Tersedia sarana pendukung perkantoran seperti pengatur suhu ruangan (AC), meja kerja, kursi, lemari/ruang arsip
                                            </li>
                                            <li>
                                                Tersedianya Komputer (PC) dan Printer spesifikasi teknis yang mencukupi untuk menggunakan aplikasi-aplikasi perkantoran terkini dengan baik dan dapat dioperasikan dengan baik
                                            </li>
                                            <li>
                                                Tersedianya sarana komunikasi akses internet 24 jam
                                            </li>
                                        </ul>
                                    </div>
                                    <br>
                                    <i>Cukup dicentang jika data yang ada masih sama seperti data pada arsip</i>
                                </td>
                            </tr>
                            <tr class="sr-only">
                                <td colspan="6">

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center; vertical-align: top;">5</td>
                                <td style="vertical-align: top;">Lokasi TPB dapat diakses langsung dari jalan umum dan dapat dilalui oleh sarana pengankut peti kemas (khusus darat) atau sarana pengangkut lain</td>
                                <td class="bg-success" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist5" value="Y" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="bg-danger" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist5" value="N">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td style="vertical-align: top; width: 25%">
                                    <textarea class="form-control" style="width: 100%; height: 100px;" name="keterangan5"></textarea>
                                    <br>
                                    <label>Sertakan file jika ada</label>
                                    <input class="form-control" type="file" multiple="multiple" name="file5[]" style="width: 100%;">
                                </td>
                                <td style="vertical-align: top;">Foto akses jalan<br> <br> <i>Cukup dicentang jika data yang ada masih sama seperti data pada arsip</i></td>
                            </tr>
                            <tr class="sr-only">
                                <td colspan="6">

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center; vertical-align: top;">6</td>
                                <td style="vertical-align: top;">Lokasi TPB mempunyai batas-batas yang jelas dengan tempat, bangunan, atau TPB lain</td>
                                <td  class="bg-success" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist6" value="Y" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="bg-danger" class="bg-danger" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist6" value="N">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td style="vertical-align: top; width: 25%">
                                    <textarea class="form-control" style="width: 100%; height: 100px;" name="keterangan6"></textarea>
                                    <br>
                                    <label>Sertakan file jika ada</label>
                                    <input class="form-control" type="file" multiple="multiple" name="file6[]" style="width: 100%;">
                                </td>
                                <td style="vertical-align: top;">Bandingkan batas-batas TPB pada izin TPB dengan kondisi fisik<br> <br> <i>Cukup dicentang jika data yang ada masih sama seperti data pada arsip</i></td>
                            </tr>
                            <tr class="sr-only">
                                <td colspan="6">

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center; vertical-align: top;">7</td>
                                <td style="vertical-align: top;">Lokasi TPB tidak berhubungan dengan bangunan lain (kecuali masjid, asrama karyawan, klinik, koperasi, kantin dan bangunan lain) untuk mendukung kepentingan karyawan TPB</td>
                                <td class="bg-success" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist7" value="Y" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="bg-danger" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist7" value="N">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td style="vertical-align: top; width: 25%">
                                    <textarea class="form-control" style="width: 100%; height: 100px;" name="keterangan7"></textarea>
                                    <br>
                                    <label>Sertakan file jika ada</label>
                                    <input class="form-control" type="file" multiple="multiple" name="file7[]" style="width: 100%;">
                                </td>
                                <td style="vertical-align: top;">Cek denah dengan kondisi fisik <br> <br> <i>Cukup dicentang jika data yang ada masih sama seperti data pada arsip</i></td>
                            </tr>
                            <tr class="sr-only">
                                <td colspan="6">

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center; vertical-align: top;">8</td>
                                <td style="vertical-align: top;">Kesesuaian data pemasukan dan pengeluaran barang ke dan dari TPB antara <i>IT Inventory</i> dengan Pemberitahuan Pabean dalam SKP</td>
                                <td class="bg-success" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist8" value="Y" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="bg-danger" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist8" value="N">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td style="vertical-align: top; width: 25%">
                                    <textarea class="form-control" style="width: 100%; height: 100px;" name="keterangan8"></textarea>
                                    <br>
                                    <label>Sertakan file jika ada</label>
                                    <input class="form-control" type="file" multiple="multiple" name="file8[]" style="width: 100%;">
                                </td>
                                <td style="vertical-align: top;">
                                    <div class="row">
                                        <ol>
                                            <li>Cek data pada <i>IT Inventory</i> dan data SKP</li>
                                            <li>Cek jumlah populasi masing-masing jenis pemberitahuan pabean</li>
                                            <li>Uji petik masing-masing jenis pemberitahuan pabean (terutama yang terakhir)</li>
                                        </ol>
                                    </div>
                                    Nomor 2 dan 3 dibuatkan kolom hasilnya.
                                    <br> <br> <i>Mencatat nomor dokumen yang dilakukan uji petik dalam kolom keterangan</i>
                                </td>
                            </tr>
                            <tr class="sr-only">
                                <td colspan="5">

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center; vertical-align: top;"></td>
                                <td style="vertical-align: top;">
                                    <i>IT Inventory</i> mencakup pencatatan: <br>
                                    <div class="row">
                                        <ol type="a">
                                            <li>pemasukan dan pengeluaran barang</li>
                                            <li>terdapat <i>field</i> untuk mencatat jenis dokumen pabean, nomor dan tanggal dokumen pabean</li>
                                            <li>terdapat menu untuk membuat laporan mutasi atas pemasukan, penimbunan, dan pengeluaran barang yang dapat diunduh melalui kantor pabean</li>
                                            <li>pemberian kode barang secara konsisten</li>
                                        </ol>
                                    </div>
                                    <i>Sebagai atensi perlu diperhatikan adalah untuk pencatatan pada IT Inventory harus menggunakan <b>nomor pendaftaran dan bukan nomor pengajuan</b></i>
                                </td>
                                <td class="bg-success" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist9" value="Y" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="bg-danger" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist9" value="N">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td style="vertical-align: top; width: 25%">
                                    <textarea class="form-control" style="width: 100%; height: 100px;" name="keterangan9"></textarea>
                                    <br>
                                    <label>Sertakan file jika ada</label>
                                    <input class="form-control" type="file" multiple="multiple" name="file9[]" style="width: 100%;">
                                </td>
                                <td style="vertical-align: top;"> Screen shoot dan/atau penjelasan di buku manual system <br> <br> <b>Sebagai atensi perlu diperhatikan pencatatan pada IT Inventory harus menggunakan nomor pendaftaran dan bukan nomor pengajuan</b> <br> <br> <i>Cukup dicentang jika data yang ada masih sama seperti data pada arsip</i></td>
                            </tr>
                            <tr class="sr-only">
                                <td colspan="6">

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center; vertical-align: top;"></td>
                                <td style="vertical-align: top;">
                                    Perubahan data hanya bisa dilakukan oleh user yang mempunyai otoritas tertentu
                                </td>
                                <td class="bg-success" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist10" value="Y" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="bg-danger" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist10" value="N">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td style="vertical-align: top; width: 25%">
                                    <textarea class="form-control" style="width: 100%; height: 100px;" name="keterangan10"></textarea>
                                    <br>
                                    <label>Sertakan file jika ada</label>
                                    <input class="form-control" type="file" multiple="multiple" name="file10[]" style="width: 100%;">
                                </td>
                                <td style="vertical-align: top;">Spot check dan/atau penjelasan di buku manual system <br> <br> <i>Cukup dicentang jika data yang ada masih sama seperti data pada arsip</i></td>
                            </tr>
                            <tr class="sr-only">
                                <td colspan="6">

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center; vertical-align: top;">9</td>
                                <td style="vertical-align: top;">
                                    TPB masih aktif melakukan kegiatan fasilitas
                                </td>
                                <td class="bg-success" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist11" value="Y" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="bg-danger" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist11" value="N">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td style="vertical-align: top; width: 25%">
                                    <textarea class="form-control" style="width: 100%; height: 100px;" name="keterangan11"></textarea>
                                    <br>
                                    <label>Sertakan file jika ada</label>
                                    <input class="form-control" type="file" multiple="multiple" name="file11[]" style="width: 100%;">
                                </td>
                                <td style="vertical-align: top;">Cek kegiatan TPB dan data SKP Tidak aktif berarti:<br>
                                    <div class="row">
                                        <ol>
                                            <li>TPB sudah tidak lagi membuat pemberitahuan pabean pemasukan dan pengeluaran</li>
                                            <li>Terdapat Pemberitahuan pabean pemasukan atau pengeluaran, tetapi tidak melakukan pengolahan</li>
                                        </ol>
                                    </div>
                                    <br> <br> <i>Cukup dicentang jika data yang ada masih sama seperti data pada arsip</i>
                                </td>
                            </tr>
                            <tr class="sr-only">
                                <td colspan="6">

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center; vertical-align: top;">10</td>
                                <td style="vertical-align: top;">
                                    <strong style="font-size: 20px;">Dalam hal izin TPB dibekukan</strong>, TPB tidak memasukkan barang dengan mendapatkan fasilitas
                                    <br><br>
                                    <strong>Poin 10 Diisi hanya jika TPB dalam STATUS PEMBEKUAN IZIN</strong>
                                </td>
                                <td class="bg-success" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist12" value="Y">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="bg-danger" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist12" value="N">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td style="vertical-align: top; width: 25%">
                                    <textarea class="form-control" style="width: 100%; height: 100px;" name="keterangan12"></textarea>
                                    <br>
                                    <label>Sertakan file jika ada</label>
                                    <input class="form-control" type="file" multiple="multiple" name="file12[]" style="width: 100%;">
                                </td>
                                <td style="vertical-align: top;">
                                    <div class="row">
                                        <ol>
                                            <li>Cek sudah ada input "pembekuan" di SILFIANA</li>
                                            <li>Cek tempat penimbunan barang, <i>IT Inventory</i>, dan CEISA (antara lain tidak ada dokumen BC 2.3, 4.0, dan 2.7</li>
                                        </ol>
                                    </div>
                                </td>
                            </tr>
                            <tr class="sr-only">
                                <td colspan="6">

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center; vertical-align: top;">11</td>
                                <td style="vertical-align: top;">
                                    Kondisi bangunan TPB dalam keadaan layak untuk mendapatkan fasilitas dari pemerintah dan memenuhi standar keamanan untuk dilakukan penimbunan dan/atau pengolahan barang yang masih terutang pungutan negara
                                </td>
                                <td class="bg-success" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist13" value="Y" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="bg-danger" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist13" value="N">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td style="vertical-align: top; width: 25%">
                                    <textarea class="form-control" style="width: 100%; height: 100px;" name="keterangan13"></textarea>
                                    <br>
                                    <label>Sertakan file jika ada</label>
                                    <input class="form-control" type="file" multiple="multiple" name="file13[]" style="width: 100%;">
                                </td>
                                <td style="vertical-align: top;">
                                    Memastikan tidak ada hal-hal berikut: <br>
                                    <div class="row">
                                        <ol>
                                            <li>lubang/akses/pintu terhubung dengan bangunan/ruangan/tempat lain yang tidak dilaporkan ke DJBC</li>
                                            <li>Bagian bangunan lainnya yang rusak</li>
                                        </ol>
                                    </div>
                                    Sertakan foto jika terdapat kondisi 1 dan 2
                                    <br> <br> <i>Cukup dicentang jika data yang ada masih sama seperti data pada arsip</i>
                                </td>
                            </tr>
                            <tr class="sr-only">
                                <td colspan="6">

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center; vertical-align: top;">12</td>
                                <td style="vertical-align: top;">
                                    Terdapat <i>authorized user log in</i> untuk petugas Bea dan Cukai.
                                    <br> <br> Maksud <i>authorized user logi in</i> adalah kode akses berupa username dan password untuk masuk ke dalam sistem
                                </td>
                                <td class="bg-success" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist14" value="Y" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="bg-danger" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist14" value="N">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td style="vertical-align: top; width: 25%">
                                    <textarea class="form-control" style="width: 100%; height: 100px;" name="keterangan14"></textarea>
                                    <br>
                                    <label>Sertakan file jika ada</label>
                                    <input class="form-control" type="file" multiple="multiple" name="file14[]" style="width: 100%;">
                                </td>
                                <td style="vertical-align: top;">Melakukan spot check dan/atau melihat penjelasan di buku <i>manual system</i> <br>
                                    User admin : <br>
                                    .........<br>
                                    User bea cukai: <br>
                                    .........<br>
                                    dan/atau<br>
                                    User unit internal perusahaan:<br>
                                    .........<br> <i>Dicatat jika ada perubahan authorized user login baru</i>
                                </td>
                            </tr>
                            <tr class="sr-only">
                                <td colspan="6">

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center; vertical-align: top;">13</td>
                                <td style="vertical-align: top;">
                                    Laporan <i>IT Inventory</i> dapat diakses secara <i>online</i> oleh DJBC
                                </td>
                                <td class="bg-success" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist15" value="Y" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="bg-danger" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist15" value="N">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td style="vertical-align: top; width: 25%">
                                    <textarea class="form-control" style="width: 100%; height: 100px;" name="keterangan15"></textarea>
                                    <br>
                                    <label>Sertakan file jika ada</label>
                                    <input class="form-control" type="file" multiple="multiple" name="file15[]" style="width: 100%;">
                                </td>
                                <td style="vertical-align: top;">Membuka tautan <i>IT Inventory</i> perusahaan melalui <i>handphone</i>, komputer, <i>monitoring room</i> dan/atau perangkat lainnya <br> <br> <i>Cukup dicentang jika sesuai</i></td>
                            </tr>
                            <tr class="sr-only">
                                <td colspan="6">

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center; vertical-align: top;">14</td>
                                <td style="vertical-align: top;">
                                    Jumlah dan penempatan CCTV yang dipasang memungkinkan petugas untuk melakukan pengawasan atas pemasukan, pembongkaran, dan pengeluaran barang
                                </td>
                                <td class="bg-success" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist16" value="Y" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="bg-danger" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist16" value="N">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td style="vertical-align: top; width: 25%">
                                    <textarea class="form-control" style="width: 100%; height: 100px;" name="keterangan16"></textarea>
                                    <br>
                                    <label>Sertakan file jika ada</label>
                                    <input class="form-control" type="file" multiple="multiple" name="file16[]" style="width: 100%;">
                                </td>
                                <td style="vertical-align: top;">
                                    Mengecek jumlah dan lokasi penempatan CCTV, yaitu: <br>
                                    <div class="row">
                                        <ol>
                                            <li>Pintu pemasukan dan pengeluaran barang dan orang</li>
                                            <li>Lokasi pembongkaran barang</li>
                                            <li>Lokasi pemuatan barang</li>
                                            <li>Lokasi lain yang diperlukan (contoh: Gudang bahan baku, Gudang produksi, Gudang barang jadi)</li>
                                        </ol>
                                    </div>
                                    <br> <br> <i>Cukup dicentang jika sesuai, minimal penempatan CCTV pada poin no 1 - 3 harus dipenuhi.</i>
                                </td>
                            </tr>
                            <tr class="sr-only">
                                <td colspan="6">

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center; vertical-align: top;">15</td>
                                <td style="vertical-align: top;">
                                    CCTV dapat diakses secara <i>realtime</i> dan <i>online</i> dari ruang hanggar
                                </td>
                                <td class="bg-success" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist17" value="Y" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="bg-danger" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist17" value="N">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td style="vertical-align: top; width: 25%">
                                    <textarea class="form-control" style="width: 100%; height: 100px;" name="keterangan17"></textarea>
                                    <br>
                                    <label>Sertakan file jika ada</label>
                                    <input class="form-control" type="file" multiple="multiple" name="file17[]" style="width: 100%;">
                                </td>
                                <td style="vertical-align: top;">
                                    Mengecek akses CCTV (<i>realtime</i> dan <i>online</i>)
                                    <br> <i>Cukup dicentang jika sesuai</i>
                                </td>
                            </tr>
                            <tr class="sr-only">
                                <td colspan="6">

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center; vertical-align: top;">16</td>
                                <td style="vertical-align: top;">
                                    Hasil pemantauan CCTV dapat direkam dan hasil rekaman CCTV dapat disimpan sekurang-kurangnya 7 (tujuh) hari.
                                </td>
                                <td class="bg-success" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist18" value="Y" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="bg-danger" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist18" value="N">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td style="vertical-align: top; width: 25%">
                                    <textarea class="form-control" style="width: 100%; height: 100px;" name="keterangan18"></textarea>
                                    <br>
                                    <label>Sertakan file jika ada</label>
                                    <input class="form-control" type="file" multiple="multiple" name="file18[]" style="width: 100%;">
                                </td>
                                <td style="vertical-align: top;">Mengecek hasil rekaman CCTV 7 hari yang lalu <br> <br> <i>Cukup dicentang jika sesuai</i></td>
                            </tr>
                            <tr class="sr-only">
                                <td colspan="6">

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center; vertical-align: top;">17</td>
                                <td style="vertical-align: top;">
                                    Gambar CCTV berwarna dan dapat dilihat secara jelas dan dapat digunakan untuk membantu pengawasan
                                </td>
                                <td class="bg-success" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist19" value="Y" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="bg-danger" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist19" value="N">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td style="vertical-align: top; width: 25%">
                                    <textarea class="form-control" style="width: 100%; height: 100px;" name="keterangan19"></textarea>
                                    <br>
                                    <label>Sertakan file jika ada</label>
                                    <input class="form-control" type="file" multiple="multiple" name="file19[]" style="width: 100%;">
                                </td>
                                <td style="vertical-align: top;">Mengecek layar monitor CCTV <br> <br> <i>Cukup dicentang jika Sesuai</i></td>
                            </tr>
                            <tr class="sr-only">
                                <td colspan="6">

                                </td>
                            </tr>
                            <tr class="kbm sr-only">
                                <td style="text-align: center; vertical-align: top;">18</td>
                                <td style="vertical-align: top;">
                                    Setiap pemasukan dan pengeluaran barang telah dilakukan dengan pemberitahuan pabean
                                </td>
                                <td class="bg-success" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist20" value="Y" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="bg-danger" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist20" value="N">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td style="vertical-align: top; width: 25%">
                                    <textarea class="form-control" style="width: 100%; height: 100px;" name="keterangan20"></textarea>
                                    <br>
                                    <label>Sertakan file jika ada</label>
                                    <input class="form-control" type="file" multiple="multiple" name="file20[]" style="width: 100%;">
                                </td>
                                <td style="vertical-align: top;">Lakukan uji petik terhadap pemberitahuan pabean pemasukan dan pengeluaran barang pada: <br>
                                    <ol>
                                        <li><i>IT Inventory</i> dan SKP.</li>
                                        <li>Catatan pemasukan dan pengeluaran barang laporan petugas <i>security</i>/Satpam terhadap (dapat di cek nomor polisi alat angkut)</li>
                                    </ol>
                                </td>
                            </tr>
                            <tr class="sr-only">
                                <td colspan="6">

                                </td>
                            </tr>
                            <tr class="kbm sr-only">
                                <td style="text-align: center; vertical-align: top;">19</td>
                                <td style="vertical-align: top;">
                                    Setiap pemasukan dan pengeluaran barang ke dan dari TPB telah dilakukan pemeriksaan kebenaran peti kemas/kemasan
                                </td>
                                <td class="bg-success" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist21" value="Y" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="bg-danger" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist21" value="N">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td style="vertical-align: top; width: 25%">
                                    <textarea class="form-control" style="width: 100%; height: 100px;" name="keterangan21"></textarea>
                                    <br>
                                    <label>Sertakan file jika ada</label>
                                    <input class="form-control" type="file" multiple="multiple" name="file21[]" style="width: 100%;">
                                </td>
                                <td style="vertical-align: top;">
                                    <ol>
                                        <li>Cek dokumen pengangkutan dengan dokumen pabean</li>
                                        <li>Lihat Laporan atau catatan bagian yang bertanggung jawab terhadap ekspor-impor dan Laporan Penerimaan dan Pengeluaran Barang di Gudang</li>
                                        <li>Lakukan Uji Petik</li>
                                    </ol>
                                </td>
                            </tr>
                            <tr class="sr-only">
                                <td colspan="6">

                                </td>
                            </tr>
                            <tr class="kbm sr-only">
                                <td style="text-align: center; vertical-align: top;">20</td>
                                <td style="vertical-align: top;">
                                    Setiap pemasukan dan pengeluaran barang ke dan dari TPB telah dilakukan pemeriksaan keutuhan atau pelekatan tanda pengaman
                                </td>
                                <td class="bg-success" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist22" value="Y" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="bg-danger" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist22" value="N">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td style="vertical-align: top; width: 25%">
                                    <textarea class="form-control" style="width: 100%; height: 100px;" name="keterangan22"></textarea>
                                    <br>
                                    <label>Sertakan file jika ada</label>
                                    <input class="form-control" type="file" multiple="multiple" name="file22[]" style="width: 100%;">
                                </td>
                                <td style="vertical-align: top;">
                                    <ol>
                                        <li>Cek Laporan Pemeriksaan kedatangan dan keberangkatan alat angkut dengan dokumen pabean</li>
                                        <li>Cek dengan laporan petugas Security/Satpam dan bagian Exim</li>
                                        <li>Lakukan Uji Sampling</li>
                                    </ol>
                                </td>
                            </tr>
                            <tr class="sr-only">
                                <td colspan="6">

                                </td>
                            </tr>
                            <tr class="kbm sr-only">
                                <td style="text-align: center; vertical-align: top;">21</td>
                                <td style="vertical-align: top;">
                                    Setiap pembongkaran dan penimbunan barang telah dilakukan dengan baik dan benar
                                </td>
                                <td class="bg-success" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist23" value="Y" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="bg-danger" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist23" value="N">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td style="vertical-align: top; width: 25%">
                                    <textarea class="form-control" style="width: 100%; height: 100px;" name="keterangan23"></textarea>
                                    <br>
                                    <label>Sertakan file jika ada</label>
                                    <input class="form-control" type="file" multiple="multiple" name="file23[]" style="width: 100%;">
                                </td>
                                <td style="vertical-align: top;">
                                    <ol>
                                        <li>Membandingkan kesesuaian jumlah dan/atau jenis kemasan barang dengan Laporan</li>
                                        <li>Lihat Laporan atau catatan bagian Exim dan Laporan Penerimaan Barang di gudang Penerimaan Barang dan <i>IT Inventory</i></li>
                                        <li>Lakukan Uji Sampling</li>
                                    </ol>
                                </td>
                            </tr>
                            <tr class="sr-only">
                                <td colspan="6">

                                </td>
                            </tr>
                            <tr class="kbm sr-only">
                                <td style="text-align: center; vertical-align: top;">22</td>
                                <td style="vertical-align: top;">
                                    Setiap pemasukan dan pengeluaran barang telah dilakukan pencatatan pada <i>IT Inventory</i>
                                </td>
                                <td class="bg-success" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist24" value="Y" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td class="bg-danger" style="text-align: center; vertical-align: top;">
                                    <label class="checkcontainer">
                                        <input type="radio" name="checklist24" value="N">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td style="vertical-align: top; width: 25%">
                                    <textarea class="form-control" style="width: 100%; height: 100px;" name="keterangan24"></textarea>
                                    <br>
                                    <label>Sertakan file jika ada</label>
                                    <input class="form-control" type="file" multiple="multiple" name="file24[]" style="width: 100%;">
                                </td>
                                <td style="vertical-align: top;">
                                    <ol>
                                        <li>Membandingkan kesesuaian jumlah dan/atau jenis barang dengan Laporan Penerimaan Barang dan Laporan Pengeluaran Barang dengan <i>IT Inventory</i></li>
                                        <li>Lakukan Uji Sampling</li>
                                    </ol>
                                </td>
                            </tr>
                            <tr class="sr-only">
                                <td colspan="6">

                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <label class="col-md-12 pull-left"><b>Keterangan Lain:</b></label>
                        <div class="col-md-12">
                            <textarea class="form-control" name="keteranganLain" style="width: 100%; height: 200px;"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect waves-themed" id="back" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-themed" id="simpan" onclick="save()">Simpan</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDoc" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="dokumen">
        <div class="modal-content">
            <div class="modal-header">
                <button id="btn_close" type="button" class="close" onclick="closeModalView()">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Disini Modal Title</h4>
            </div>
            <div class="modal-body">
                <iframe id="iframeDoc" style="width: 100%; height: 800px;" src=""></iframe>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalLampiran" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="dokumen">
        <div class="modal-content">
            <div class="modal-header">
                <button id="btn_close" type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="titleLampiran">Disini Modal Title</h4>
            </div>
            <div class="modal-body">
                <table id="dataTableLampiran" class="table table-striped table-responsive table-hover">
                    <thead>
                        <tr>
                            <th style="width: 5%;"><p class="text-justify"> No </p></th>
                            <th style="width: 50%;"><p class="text-justify"> Nama File </p></th>
                            <th style="width: 30%;"><p class="text-justify"> Jenis File</p></th>
                            <th style="width: 15%;">
                                <p class="text-justify"> Action </p>
                            </th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <th style="width: 5%;"><p class="text-justify"> No </p></th>
                            <th style="width: 50%;"><p class="text-justify"> Nama File </p></th>
                            <th style="width: 30%;"><p class="text-justify"> Jenis File</p></th>
                            <th style="width: 15%;">
                                <p class="text-justify"> Action </p>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalFile" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="dokumen">
        <div class="modal-content">
            <div class="modal-header">
                <button id="btn_close" type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="titleFile">Disini Modal Title</h4>
            </div>
            <div class="modal-body">
                <iframe id="iframeFile" style="width: 100%; height: 800px;" src=""></iframe>
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
    var type = "<?php echo $type ?>";

    $(document).ready(function() {
        var date = new Date();
        bulan = date.getMonth() + 1;
        tahun = date.getFullYear();
        $('[name="bulan"]').val(bulan);
        $('[name="tahun"]').val(tahun);
        $('[name="bulan"]').trigger('change');
        $('[name="tahun"]').trigger('change');

        // initialize class select2
        $(".select2").select2({
            width : '100%'
        });

        // dateMasking and datePicker
        $('.tanggal').datepicker({
            format: 'dd/mm/yyyy',
            todayHighLight: true,
            orientation: "bottom right"
        });

        // hidden("<?php echo $type; ?>");

        $("#FlagMandiri").select2({
            dropdownParent:$("#modalForm"),
            width : '100%'
        });


        $("#idPerusahaan").select2({
            dropdownParent:$('#modalForm'),
            width : '100%',
            placeholder: 'Pilih Nama Perusahaan',
            minimumInputLength: 5,
            allowClear: true,
            ajax : {
                url : "Stakeholders/getStakeholders",
                dataType : "JSON",
                delay : 250,
                data : function(params){
                    return{
                        nama : params.term
                    };
                },
                processResults: function(data){
                    var results = [];

                    $.each(data, function(index, laporan){
                        results.push({
                            id : laporan.ID,
                            text : laporan.NAMA_PERUSAHAAN + " | " + laporan.NAMA_FASILITAS + " | " + laporan.NO_SKEP
                        })
                    });
                    return{
                        results : results
                    };
                },
                cache : true
            }
        });

        $("#filterPerusahaan").select2({
            width : '100%',
            placeholder: 'Pilih Nama Perusahaan',
            minimumInputLength: 5,
            allowClear: true,
            ajax : {
                url : "MonitoringHanggar/getPerusahaan",
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
            "order" : [],
            "ajax" : {
                "url" : "MonitoringHanggar/datatableList_Monum",
                "type" : "POST",
                "data" : function (a){
                    a.bulan = $('[name="bulan"]').val();
                    a.tahun = $('[name="tahun"]').val();
                    a.type = 'main';
                }
            },
        });
    });

    $("#FlagMandiri").on('select2:select', function(event) {
        /* Act on the event */
        console.log(event);
        if (event.params.data.id === "Y") {
            $(".kbm").removeClass('sr-only');
        } else {
            $(".kbm").addClass('sr-only');
        }
    });

    // initialize dataTable
    tableLampiran = $('#dataTableLampiran').DataTable({
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
        "bFilter"    : true,
        "order" : [],
        "ajax" : {
            "url" : "monevHanggar/ajaxListLampiran",
            "type" : "POST",
            "data" : {
                "type" : type
            }
        },
    });

    function daftarAkses(id){
        var linkEseal;
        var userEseal;
        var passEseal;
        $("#akses").addClass('sr-only');
        $("[name='alamat']").val("");
        $("#linkCctv").removeAttr('href');
        $("#linkIt").removeAttr('href');
        $("#linkEseal").removeAttr('href');
        $('[name="linkCctv"]').val("");
        $('[name="linkIt"]').val("");
        $('[name="linkEseal"]').val("");
        $(".added").remove();

        $.ajax({
            url: "Stakeholders/getStakeholdersMonum",
            type: "GET",
            dataType: "JSON",
            data: {ID: id},
            success: function(data){
                if (data.cctv) {
                    var x = data.cctv.ALAMAT_AKSES.substring(0,4);
                    if ( x == "http") {
                        linkCctv = data.cctv.ALAMAT_AKSES;
                    } else {
                        linkCctv = "http://"+data.cctv.ALAMAT_AKSES;
                    }
                    userCctv = data.cctv.USERNAME;
                    passCctv = data.cctv.PASSWORD;
                } else {
                    linkCctv = "#";
                    userCctv = "Data Tidak Ditemukan";
                    passCctv = "Data Tidak Ditemukan";
                }

                if (data.it) {
                    var x = data.it.ALAMAT_AKSES.substring(0,4);
                    if ( x == "http") {
                        linkIt = data.it.ALAMAT_AKSES;
                    } else {
                        linkIt = "http://"+data.it.ALAMAT_AKSES;
                    }
                    userIt = data.it.USERNAME;
                    passIt = data.it.PASSWORD;
                } else {
                    linkIt = "#";
                    userIt = "Data Tidak Ditemukan";
                    passIt = "Data Tidak Ditemukan";
                }

                if (data.eseal) {
                    var x = data.eseal.ALAMAT_AKSES.substring(0,4);
                    console.log(x);
                    if ( x == "http") {
                        linkEseal = data.eseal.ALAMAT_AKSES;
                    } else {
                        linkEseal = "http://"+data.eseal.ALAMAT_AKSES;
                    }
                    userEseal = data.eseal.USERNAME;
                    passEseal = data.eseal.PASSWORD;
                } else {
                    linkEseal = "#";
                    userEseal = "Data Tidak Ditemukan";
                    passEseal = "Data Tidak Ditemukan";
                }
                $("#akses").removeClass('sr-only');
                $("[name='alamat']").val(data.umum[2].data);
                $("#linkCctv").attr('href', linkCctv);
                $("#linkIt").attr('href', linkIt);
                $("#linkEseal").attr('href', linkEseal);
                $('[name="linkCctv"]').val(linkCctv);
                $('[name="linkIt"]').val(linkIt);
                $('[name="linkEseal"]').val(linkEseal);
                $("#btnCctv").attr('data-clipboard-text', linkCctv);
                $("#akses > tbody").append('<tr class="added"><td><strong>Username</strong></td><td class="text-center">'+userCctv+'</td><td class="text-center">'+userIt+'</td><td class="text-center">'+userEseal+'</td></tr>');
                $("#akses > tbody").append('<tr class="added"><td><strong>Password</strong></td><td class="text-center">'+passCctv+'</td><td class="text-center">'+passIt+'</td><td class="text-center">'+passEseal+'</td></tr>');
            }
        })
    }

    function hidden (a){
        if (a == "hanggar") {
            $("#rekam").removeClass('sr-only');
        } else {
            $("#rekam").addClass('sr-only');
        }
    }

    $("#idPerusahaan").on("select2:selecting", function(e) {
        id = e.params.args.data.id

        $.ajax({
            url: "Stakeholders/getStakeholdersById",
            type: "GET",
            dataType: "JSON",
            data: {ID: id},
            success: function(data){
                $("[name='alamat']").val(data.ALAMAT_PABRIK);
                daftarAkses(e.params.args.data.id);
            }
        })
    });

    $("#rekam").on('click', function(event) {
        event.preventDefault();
        /* Act on the event */
        save_method = "add";
        var curdate = "<?php echo date("Y-m-d"); ?>";
        $("#formMonevUmum")[0].reset();
        $("#idPerusahaan").children().remove();
        $(".modal-title").text('Form Laporan Monitoring Umum');
        $("#FlagMandiri").trigger('change');
        $("#modalForm").modal("show");
        $("#tanggal").val(curdate);
        if ($('.kbm').attr('class') == "kbm") {
            $('.kbm').addClass('sr-only');
        }
    });

    function closeModal(){
        $("input[type='hidden']").remove();
        $("#modalForm").modal('hide');
    }

    $("#filter").on('click', function(event) {
        event.preventDefault();
        ajax_reload();
    });

    function selectedValue(a,b){
        var data = [{id:a,text:b}];
        var selectedVal = $("#idPerusahaan");
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
        idEdit = id;
        $.ajax({
            url: "hanggar/monevumum/ajax_edit",
            type: "GET",
            dataType: "JSON",
            data: {id: idEdit},
            success: function(data){
                save_method = "edit";
                var isiLaporan = data[1];
                dataEdit = isiLaporan;
                selectedValue(data[0].idPerusahaan,data[0].nama_perusahaan);
                $("[name='alamat']").val(data[0].alamat);
                $("[name='tanggal']").val(data[0].tanggalLaporan);
                $("[name='keteranganLain']").val(data[0].keterangan);
                for (var i = 0; i < isiLaporan.length; i++) {
                    // $("#formMonevUmum").append("<input type='hidden' name='idIsi"+isiLaporan[i].item+"' value='"+isiLaporan[i].id+"'>");
                    if (isiLaporan[i].kondisi != null) {
                        $("input[name='checklist"+isiLaporan[i].item+"'][value='"+isiLaporan[i].kondisi+"']").prop('checked', true);
                        $("[name='keterangan"+isiLaporan[i].item+"']").val(isiLaporan[i].keterangan);
                    }
                };
                $(".modal-title").text("Ubah Data Laporan");
                $("#modalForm").modal("show");
            }
        })
    }

    function simpan(){
        var url;
        var data;
        var form = $("#formMonevUmum")[0];
        data = new FormData(form);

        if (save_method == "add") {
            url = "hanggar/monevumum/ajax_add";
        }else{
            url = "hanggar/monevumum/ajax_update";
            data.append('id',idEdit);
            for (var i = 0; i < dataEdit.length; i++) {
                data.append("idIsi"+dataEdit[i].item,dataEdit[i].id);
            }
        }

        if ($("#formMonevUmum").valid()) {
            var txtSimpan = $("#txtSimpan");
            $("#segar").removeClass("sr-only");
            $("#simpan").addClass('disabled');
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
                    $("#modalForm").modal('hide');
                }
            })
            .done(function() {
                $("#segar").addClass("sr-only");
                $("#simpan").removeClass('disabled');
                ajax_reload();
            });
        }
    }

    function cetak(id){
        $.ajax({
            url: "hanggar/monevumum/cetak",
            type: "GET",
            dataType: "JSON",
            data: {id: id},
            success:function(data){
                $("#iframeDoc").removeAttr('src');
                $("#iframeDoc").attr('src', data[0]);
                $('.modal-title').text(data[1]);
                $("#btn_close").attr('value', data[1]);
                $("#modalDoc").modal("show");
                console.log(data);
            }
        })
    }

    function closeModalView(){
        var file = $("#btn_close").attr("value");
        $.ajax({
            url: "hanggar/monevumum/delete_pdf",
            type: "GET",
            dataType: "JSON",
            data: {name: file},
            success: function(data){
                console.log(data);
            }
        })
        .done(function(){
            $("#modalDoc").modal("hide");
        })
        .fail(function(){
            $("#modalDoc").modal("hide");
        })
        .always(function(){
            $("#modalDoc").modal("hide");
        });
    }

    function validasi(id, type){
        if (confirm("Laporan Monev Akan divalidasi?")) {}
            $.ajax({
                url: "hanggar/monevumum/validate",
                type: "GET",
                dataType: "JSON",
                data: {id: id, tipe: type},
                success: function(data){
                    alert(data);
                    ajax_reload();
                }
            })
    }

    function hapus(id){
        $.ajax({
            url: "hanggar/monevumum/delete",
            type: "GET",
            dataType: "JSON",
            data: {id: id, type: type},
            success: function(data){
                alert(data);
                ajax_reload();
            }
        })
    }

    function lampiran(id){
        $("#modalLampiran").modal("show");
        $('#titleLampiran').text('Daftar Lampiran');
        ajax_load_lampiran(id);
    }

    function ajax_load_lampiran(id){
        tableLampiran.ajax.url("hanggar/monevumum/ajax_listLampiran/"+id).load();
    }

    function ajax_reload(){
        table.ajax.reload(null, false);
    }

    function lihat(id){
        $.ajax({
            url: "hanggar/monevumum/getFileById",
            type: "GET",
            dataType: "JSON",
            data: {id: id},
            success: function(data){
                $("#iframeFile").removeAttr('src');
                $("#iframeFile").attr('src', data.lokasi);
                $('#titleFile').text(data.namaFile);
                $("#modalFile").modal("show");
            }
        })

    }

    function downloadFile(id){
        $.ajax({
            url: "hanggar/monevumum/getFileById",
            type: "GET",
            dataType: "JSON",
            data: {id: id},
            success: function(data){
                $.fileDownload(data.lokasi).done(function(){console.log("success")})
            }
        })
    }

    function hapusLampiran(id){
        if (confirm("File Lampiran Akan Dihapus?")) {
            $.ajax({
                url: "hanggar/monevumum/hapusFile",
                type: "GET",
                dataType: "JSON",
                data: {id: id},
                success: function(data){
                    alert(data);
                    tableLampiran.ajax.reload(null,false);
                }
            })
        }
    }

    function deleteLaporan(id){
        if (confirm("Draft Laporan akan dihapus")) {
            $.ajax({
                url: "hanggar/monevumum/deleteDraft",
                type: "GET",
                dataType: "JSON",
                data: {id: id},
                success: function(data){
                    alert(data);
                }
            })
            .done(function() {
                ajax_reload();
            })      
        }
    }
</script>
<!-- Script Section -->