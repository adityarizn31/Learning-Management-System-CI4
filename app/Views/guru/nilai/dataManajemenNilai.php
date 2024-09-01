<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<!-- container-fluid -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="text-black fw-bold"> Algoritma Pemrograman </h2>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class=""></i></a>
    </div>

    <div class="card shadow border-2 border-primary">

        <div class="row">

            <div class="card shadow border-2" style="width: 17rem; padding: 3%; margin: 3%; border-color: #007BFF">
                <a href="/GuruController/dataNilaiRPLA_Alpro/">
                    <img src="" alt="">

                    <div class="card-body">
                        <h5 class="card-title text-black text-center font-weight-bold"> Nilai X RPL A </h5>
                    </div>

                </a>
            </div>

            <div class="card shadow border-2" style="width: 17rem; padding: 3%; margin: 3%; border-color: #007BFF">
                <a href="/GuruController/dataNilaiRPLB_Alpro/">
                    <img src="" alt="">

                    <div class="card-body">
                        <h5 class="card-title text-black text-center font-weight-bold"> Nilai X RPL B </h5>
                    </div>

                </a>
            </div>

            <div class="card shadow border-2" style="width: 17rem; padding: 3%; margin: 3%; border-color: #007BFF">
                <a href="/GuruController/dataNilaiRPLC_Alpro/">
                    <img src="" alt="">

                    <div class="card-body">
                        <h5 class="card-title text-black text-center font-weight-bold"> Nilai X RPL C </h5>
                    </div>

                </a>
            </div>

        </div>
    </div>

</div>


<?= $this->endSection('content'); ?>