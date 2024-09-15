<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <div class="card shadow mt-3 border-2 border-primary">

        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between" style="padding-top: 10px;">
                <h3 class="m-0 font-weight-bold text-primary"> Tugas Algoritma Pemrograman </h3>
                <a href="/GuruController/createTugasAlpro/" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus"></i> Tugas Alpro </a>
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

            <div class="container">
                <div class="row">
                    <div class="col">

                        <?php if (empty($tugas_alpro)) : ?>
                            <div class="alert alert-danger text-center" role="alert">
                                Belum Ada Tugas yang tersedia !!
                            </div>
                        <?php else : ?>
                            <?php $i = 1; ?>
                            <?php foreach ($tugas_alpro as $alpro) :  ?>

                                <div class="card text-center border-1 border-primary mb-2">
                                    <div class="card-header">
                                        Tugas Pertemuan <?= $i++;  ?>
                                    </div>
                                    <div class="card-body border-primary">
                                        <h5 class="card-title"><?= $alpro['judultugas_alpro']; ?></h5>
                                        <p class="card-text"><?= $alpro['deskripsitugas_alpro'] ?></p>
                                        <a href="/GuruController/detailTugasAlpro/<?= $alpro['slug'] ?>" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                    <div class="card-footer text-muted">
                                        <p>Batas Waktu Pengumpulan <?= $alpro['bataswaktu_alpro']; ?></p>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

</section>

<?= $this->endSection('content'); ?>