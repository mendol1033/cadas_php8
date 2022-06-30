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