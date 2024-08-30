<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4" style="padding-top: 5%;">
        <h2 class="text-black fw-bold"> Dashboard Guru </h2>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class=""></i></a>
    </div>

    <div class="card mt-3 shadow border-2">

        <div class="container">
            <div class="row">

                <div class="card shadow border-2" style="width: 14rem; padding: 2%; margin: 1%; border-color: #007BFF;">
                    <a href="/GuruController/dataMateriAlpro/">
                        <img src="" alt="">

                        <div class="card-body">
                            <h5 class="card-title text-black text-center font-weight-bold"> Algoritma dan Pemrograman A </h5>
                        </div>

                    </a>
                </div>


                <div class="card shadow border-2" style="width: 14rem; padding: 2%; margin: 1%; border-color: #007BFF">
                    <a href="#">
                        <img src="" alt="">

                        <div class="card-body">
                            <h5 class="card-title text-black text-center font-weight-bold"> Algoritma dan Pemrograman B </h5>
                        </div>

                    </a>
                </div>


                <div class="card shadow border-2" style="width: 14rem; padding: 2%; margin: 1%; border-color: #007BFF">
                    <a href="#">
                        <img src="" alt="">

                        <div class="card-body">
                            <h5 class="card-title text-black text-center font-weight-bold"> Algoritma dan Pemrograman C </h5>
                        </div>

                    </a>
                </div>

            </div>
        </div>

    </div>

</div>

<?= $this->endSection('content'); ?>