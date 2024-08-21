<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="p-4" id="main-content">

    <button class="btn btn-primary" id="button-toggle">
        <i class="bi bi-list"></i>
    </button>

    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4" style="padding-top: 5%;">
            <h2 class="text-black fw-bold"> Dashboard Guru </h2>
            <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class=""></i></a>
        </div>

        <div class="container mt-4">
            <div class="row">
                <div class="col">

                    <?php if (session()->getFlashdata('pesan')) : ?>

                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>

                    <?php endif; ?>

                </div>
            </div>
        </div>

        <div class="card mt-3 shadow border-2 border-primary">
            <div class="container">
                <div class="row">

                    <div class="d-sm-flex justify-content-between align-items-center">
                        <div class="flex-grow-1 text-center">
                            <h4 class="p-2 font-weight-bold">Materi Algoritma Pemrograman</h4>
                        </div>
                    </div>

                    <?php $pertemuan = 1; ?>

                    <?php if (empty($materi_alpro)) : ?>
                        <div class="card shadow border-2 border-danger my-3 ">
                            <div class="card-body">
                                <h5 class="card-title text-black text-center font-weight-bold"> Belum ada Pertemuan</h5>
                            </div>
                        </div>
                    <?php else : ?>
                        <?php foreach ($materi_alpro as $alpro) : ?>
                            <div class="card shadow border-2 border-primary" style="width: 19rem; padding: 2%; margin: 3%;">
                                <img src="" alt="">

                                <div class="card-body">
                                    <h5 class="card-title text-black text-center font-weight-bold"> Pertemuan <?= $pertemuan++; ?> </h5>
                                    <h5 class="card-title text-black text-center font-weight-bold"> <?= $alpro['nama_materi'] ?> </h5>
                                </div>

                                <div class="container">
                                    <div class="row mx-1">
                                        <a href="/SiswaController/detailMateriAlpro/<?= $alpro['slug']; ?>" class="btn btn-outline-primary my-2">Materi</a>
                                        <a href="/SiswaController/dataTugasAlpro/<?= $alpro['slug']; ?>" class="btn btn-outline-primary my-2">Tugas</a>
                                        <a href="/SiswaController/dataPengetahuanAlpro/" class="btn btn-outline-primary my-2">Pengetahuan</a>
                                        <a href="/SiswaController/detailMateriAlpro/<?= $alpro['slug']; ?>" class="btn btn-outline-primary my-2">Keterampilan</a>
                                    </div>
                                </div>

                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>

</section>

<?= $this->endSection('content'); ?>