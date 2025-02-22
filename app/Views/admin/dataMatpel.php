<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="p-4">

    <button class="btn btn-primary" id="button-toggle">
        <i class="bi bi-list"></i>
    </button>

    <div class="card shadow mb-4 border-2" style="margin-top: 25px;">

        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between" style="padding-top: 10px;">
                <h3 class="m-0 font-weight-bold text-primary"> Data Mata Pelajaran </h3>
                <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Tambah Mata Pelajaran </a>
            </div>
        </div>

        <!-- Digunakan untuk Pesan -->
        <div class="container mt-4">
            <div class="row">
                <div class="col">

                    <?php if (session()->getFlashdata('pesan')) : ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-fixed table-hover">

                <thead class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Mata Pelajaran</th>
                        <th scope="col">Guru Mata Pelajaran</th>
                        <th scope="col">Jam Mata Pelajaran</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($matapelajaran as $mat) : ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><?= $mat['nama_matapelajaran']; ?></td>
                            <td><?= $mat['guru_matapelajaran']; ?></td>
                            <td><?= $mat['jam_matapelajaran']; ?> Jam</td>
                            <td><a href="/admin/detailSiswaRPLA/<?= $mat['slug']; ?>" class="btn btn-success">Detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>

    </div>



</section>

<?= $this->endSection('content'); ?>