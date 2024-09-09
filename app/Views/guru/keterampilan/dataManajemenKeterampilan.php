<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <!-- Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="text-black fw-bold">Keterampilan Algoritma Pemrograman</h2>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus"></i> Action -->
        </a>
    </div>

    <!-- Card Container -->
    <div class="card shadow border-primary mb-4">
        <div class="card-body">
            <div class="row justify-content-center">

                <!-- Card 1 -->
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card shadow border-primary h-100 text-center">
                        <a href="<?= base_url() ?>GuruController/dataNilaiKeterampilanA/" class="stretched-link">
                            <div class="card-body">
                                <h5 class="card-title text-black font-weight-bold">Keterampilan X RPL A</h5>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card shadow border-primary h-100 text-center">
                        <a href="<?= base_url() ?>GuruController/dataNilaiRPLB_Alpro/" class="stretched-link">
                            <div class="card-body">
                                <h5 class="card-title text-black font-weight-bold">Keterampilan X RPL B</h5>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card shadow border-primary h-100 text-center">
                        <a href="<?= base_url() ?>GuruController/dataNilaiRPLC_Alpro/" class="stretched-link">
                            <div class="card-body">
                                <h5 class="card-title text-black font-weight-bold">Keterampilan X RPL C</h5>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

<?= $this->endSection('content'); ?>
