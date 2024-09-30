s<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<section class="p-4">

    <div class="card shadow border-2 border-primary">

        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between" style="padding-top: 10px;">
                <h3 class="m-0 font-weight-bold text-primary"> Soal Pilihan Ganda Algoritma Pemrograman </h3>

                <a href="<?= base_url() ?>AdminController/createSoal/" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus"> </i> Soal </a>
                <!-- <a href="<?= base_url() ?>AdminController/createPengetahuanAlpro/" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                    <i class="fas fa-edit me-2"></i> Edit Quiz
                </a>
                <a href="<?= base_url() ?>AdminController/deletePengetahuanAlpro/" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                    <i class="fas fa-trash-alt me-2"></i> Delete Quiz
                </a> -->

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

            <table class="table table-fixed table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Pertanyaan</th>
                        <th scope="col">Pilihan A</th>
                        <th scope="col">Pilihan B</th>
                        <th scope="col">Pilihan C</th>
                        <th scope="col">Pilihan D</th>
                        <th scope="col">Kunci Jawaban</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($soal as $s) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $s['pertanyaan'] ?></td>
                            <td><?= $s['pilihan_a'] ?></td>
                            <td><?= $s['pilihan_b'] ?></td>
                            <td><?= $s['pilihan_c'] ?></td>
                            <td><?= $s['pilihan_d'] ?></td>
                            <td><?= $s['pilihan_benar'] ?></td>
                            <td>
                                <a href="<?= site_url('/guru/edit-soal/' . $s['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="<?= site_url('/guru/hapus-soal/' . $s['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus soal ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>

    </div>

</section>

<?= $this->endSection('content'); ?>