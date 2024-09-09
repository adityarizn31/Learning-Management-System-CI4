<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="text-black fw-bold">Daftar Mata Pelajaran</h2>

        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class=""></i> Action
        </a> -->

    </div>

    <div class="card shadow border-primary mb-4">
        <div class="card-body">
            <div class="row justify-content-center">
                
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card shadow border-2 border-primary h-100 text-center">
                        <a href="<?= base_url() ?>GuruController/dataMateriAlpro/" class="stretched-link">
                            <div class="card-body">
                                <h5 class="card-title text-black font-weight-bold">Algoritma dan Pemrograman A</h5>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card shadow border-2 border-primary h-100 text-center">
                        <a href="#" class="stretched-link">
                            <div class="card-body">
                                <h5 class="card-title text-black font-weight-bold">Algoritma dan Pemrograman B</h5>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card shadow border-2 border-primary h-100 text-center">
                        <a href="#" class="stretched-link">
                            <div class="card-body">
                                <h5 class="card-title text-black font-weight-bold">Algoritma dan Pemrograman C</h5>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

<?= $this->endSection('content'); ?>
