<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="p-4" id="main-content">

    <button class="btn btn-primary" id="button-toggle">
        <i class="bi bi-list"></i>
    </button>

    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4" style="padding-top: 5%;">
            <h2 class="text-black fw-bold"> Dashboard Guru </h2>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class=""></i></a>
        </div>

        <div class="card mt-3 shadow border-2">
            <div class="container">
                <div class="row">

                    <!-- Kelas X RPL A -->
                    <div class="card shadow border-2" style="width: 19rem; padding: 3%; margin: 3%; border-color: #007BFF;">
                        <a href="/GuruController/dataSiswaRPLA/">
                            <img src="" alt="">

                            <div class="card-body">
                                <h5 class="card-title text-black text-center font-weight-bold"> Kelas X RPL A </h5>
                            </div>

                        </a>
                    </div>

                    <!-- Kelas X RPL B -->
                    <div class="card shadow border-2" style="width: 19rem; padding: 3%; margin: 3%; border-color: #007BFF">
                        <a href="/GuruController/dataSiswaRPLB/">
                            <img src="" alt="">

                            <div class="card-body">
                                <h5 class="card-title text-black text-center font-weight-bold"> Kelas X RPL B </h5>
                            </div>

                        </a>
                    </div>

                    <!-- Kelas X RPL C -->
                    <div class="card shadow border-2" style="width: 19rem; padding: 3%; margin: 3%; border-color: #007BFF">
                        <a href="/GuruController/dataSiswaRPLC/">
                            <img src="" alt="">

                            <div class="card-body">
                                <h5 class="card-title text-black text-center font-weight-bold"> Kelas X RPL C </h5>
                            </div>

                        </a>
                    </div>

                </div>
            </div>
        </div>

</section>

<?= $this->endSection('content'); ?>