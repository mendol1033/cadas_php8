<div class="row justify-content-between">
    <div class="col-xl-6 border-faded bg-faded p-3 mb-g">
        <form class="needs-validation" id="form-search">
            <div class="form-group d-flex">
                <div class="col-xl-2">
                    <label class="form-label">Periode</label>
                </div>
                <div class="col-xl-3">
                    <input type="text" id="tanggalMulai" name="tanggalMulai" class="form-control shadow-inset-2 form-control" placeholder="yyyy-mm-dd">
                </div>
                <div class="col-xl-1"><span class="form-label">s.d.</span></div>
                <div class="col-xl-3">
                    <input type="text" id="tanggalAkhir" name="tanggalAkhir" class="form-control shadow-inset-2 form-control" placeholder="yyyy-mm-dd">
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
</div>
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
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
                        <thead style="text-align: center;">
                            <tr>
                                <th colspan="2">LEMBAR INFORMASI</th>
                                <th colspan="2">LEMBAR KLASIFIKASI INFORMASI</th>
                                <th colspan="2">LEMBAR KERJA ANALISIS INTELIJEN</th>
                                <th colspan="3">NOTA HASIL INTELIJEN</th>
                                <th colspan="3">NOTA INFORMASI</th>
                                <th colspan="3">REKOMENDASI LAINNYA</th>
                                <th colspan="3">INFORMASI LAINNYA</th>
                                <th colspan="3">LAPORAN TUGAS PENINDAKAN</th>
                                <th rowspan="2" style="vertical-align: middle;">KETERANGAN</th>
                            </tr>
                            <tr>
                                <td>No</td>
                                <td>Tanggal</td>
                                <td>No</td>
                                <td>Tanggal</td>
                                <td>No</td>
                                <td>Tanggal</td>
                                <td>No</td>
                                <td>Tanggal</td>
                                <td>Penerima</td>
                                <td>No</td>
                                <td>Tanggal</td>
                                <td>Penerima</td>
                                <td>No</td>
                                <td>Tanggal</td>
                                <td>Penerima</td>
                                <td>No</td>
                                <td>Tanggal</td>
                                <td>Penerima</td>
                                <td>No</td>
                                <td>Tanggal</td>
                                <td>Kesimpulan<br>(sesuai/tidak sesuai)</td>
                            </tr>
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
