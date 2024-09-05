<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between">
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

    <div class="card mt-2 shadow border-2 border-primary">
        <div class="container">

            <div class="card-header">
                <div class="d-sm-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 text-center">
                        <h4 class="p-2 font-weight-bold">Materi Algoritma Pemrograman</h4>
                    </div>
                    <div class="align-self-start mt-3">
                        <a href="<?= base_url() ?>GuruController/createMateriAlpro" class="btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-plus"></i> Materi
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <?php $pertemuan = 1; ?>

                <?php if (empty($materi_alpro)) : ?>
                    <div class="card shadow border-2 border-danger my-3 ">
                        <div class="card-body">
                            <h5 class="card-title text-black text-center font-weight-bold"> Belum ada Pertemuan</h5>
                        </div>
                    </div>
                <?php else : ?>
                    <?php foreach ($materi_alpro as $alpro) : ?>
                        <div class="card shadow border-2 border-primary" style="width: 19rem; padding: 3%; margin: 3%;">
                            <img src="" alt="">

                            <div class="card-body">
                                <h5 class="card-title text-black text-center font-weight-bold"> Pertemuan <?= $pertemuan++; ?> </h5>
                                <h5 class="card-title text-black text-center font-weight-bold"> <?= $alpro['nama_materi'] ?> </h5>
                            </div>

                            <div class="container">
                                <div class="col">
                                    <a href="<?= base_url() ?>GuruController/detailMateriAlpro/<?= $alpro['slug']; ?>" class="btn btn-outline-primary my-2">Materi</a>
                                    <a href="<?= base_url() ?>GuruController/dataTugasAlpro/<?= $alpro['slug']; ?>" class="btn btn-outline-primary my-2">Tugas</a>
                                    <a href="<?= base_url() ?>GuruController/dataPengetahuanAlpro/" class="btn btn-outline-primary my-2">Pengetahuan</a>
                                    <a href="<?= base_url() ?>GuruController/detailMateriAlpro/<?= $alpro['slug']; ?>" class="btn btn-outline-primary my-2">Keterampilan</a>
                                </div>
                            </div>

                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>

</div>

<?= $this->endSection('content'); ?>