<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="p-4" id="main-content">

    <button class="btn btn-primary" id="button-toggle">
        <i class="bi bi-list"></i>
    </button>

    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4" style="padding-top: 5%;">
            <h2 class="text-black fw-bold"> Dashboard Siswa </h2>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class=""></i></a>
        </div>

        <div class="card mt-3 shadow border-2">
            <div class="container">
                <div class="row">

                <center>
                    <h3 class="font-weight-bold mt-1"> Daftar Mata Pelajaran RPL </h3>
                </center>

                    
                    <div class="card shadow border-2" style="width: 19rem; padding: 3%; margin: 3%; border-color: #007BFF;">
                        <a href="/SiswaController/dataMateriAlpro/">
                            <img src="" alt="">

                            <div class="card-body">
                                <h5 class="card-title text-black text-center font-weight-bold"> Algoritma dan Pemrograman </h5>
                            </div>

                        </a>
                    </div>

                    
                    <div class="card shadow border-2" style="width: 19rem; padding: 3%; margin: 3%; border-color: #007BFF">
                        <a href="#">
                            <img src="" alt="">

                            <div class="card-body">
                                <h5 class="card-title text-black text-center font-weight-bold"> Design Thinking </h5>
                            </div>

                        </a>
                    </div>

                    
                    <div class="card shadow border-2" style="width: 19rem; padding: 3%; margin: 3%; border-color: #007BFF">
                        <a href="#">
                            <img src="" alt="">

                            <div class="card-body">
                                <h5 class="card-title text-black text-center font-weight-bold"> Front End Bussiness </h5>
                            </div>

                        </a>
                    </div>

                </div>
            </div>
        </div>

</section>

<?= $this->endSection('content'); ?>