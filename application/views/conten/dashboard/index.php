            <!-- card -->
            <div class="row g-4">
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-5x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Tiket On Progress</p>
                            <h6 class="mb-0"><?= $progres; ?> Tiket</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-bar fa-5x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Tiket Pending</p>
                            <h6 class="mb-0"><?= $pending; ?> Tiket</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-area fa-5x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Tiket Closed</p>
                            <h6 class="mb-0"><?= $closed; ?> Tiket</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-area fa-5x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Tiket</p>
                            <h6 class="mb-0"><?= $totalt; ?> Tiket</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4 mt-1 mb-2">
                <div class="col-sm-6 col-xl-4">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-5x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Pegawai Aktif</p>
                            <h6 class="mb-0"><?= $aktif; ?> Pegawai</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-bar fa-5x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Pegawai Tidak Aktif</p>
                            <h6 class="mb-0"><?= $taktif; ?> Pegawai</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-area fa-5x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Pegawai</p>
                            <h6 class="mb-0"><?= $totalp; ?> pegawai</h6>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card End -->
            <!-- grafik -->
            <!-- <div class="container-fluid pt-4 px-4"> -->
            <div class="row g-4 mt-2">
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-light text-center rounded p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0">Worldwide Sales</h6>
                            <a href="">Show All</a>
                        </div>
                        <canvas id="worldwide-sales"></canvas>
                    </div>
                </div>
            </div>
            <!-- grafik End -->