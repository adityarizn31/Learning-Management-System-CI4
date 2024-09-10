<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<section class="p-4">

    <div class="card shadow border-2 border-primary">

        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between" style="padding-top: 10px;">
                <h3 class="m-0 font-weight-bold text-primary"> Data RPL A Pengetahuan Algoritma Pemrograman </h3>

                <a href="<?= base_url() ?>AdminController/createSiswaRPLA/" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus"> </i> Quiz </a>
            </div>
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

        <div class="card-body">
            <?php foreach ($materi_alpro as $alpro) : ?>
                <div class="card shadow border-2 border-primary mb-4">
                    <div class="card-header py-3">
                        <h5 class="m-0 font-weight-bold text-primary">Pertemuan </h5>
                    </div>
                    <div class="card-body">
                        <?php $i = 1; ?>
                        <?php foreach ($rpla as $a) : ?>
                            <?php if ($a['pertemuan'] == $alpro['pertemuan']) : ?>
                                <div class="row mb-2">
                                    <div class="col-2">
                                        <img src="/img/rpla/<?= $a['foto_siswa']; ?>" alt="" style="width: 50%;">
                                    </div>
                                    <div class="col-10">
                                        <h6><?= $a['nama_siswa']; ?></h6>
                                        <p>NIS: <?= $a['nis_siswa']; ?></p>
                                        <p>Kelas: <?= $a['kelas_siswa']; ?></p>
                                        <a href="<?= base_url() ?>GuruController/detailSiswaRPLA/<?= $a['slug']; ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-award"></i>
                                            Input Nilai
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

</section>

<?= $this->endSection('content'); ?>