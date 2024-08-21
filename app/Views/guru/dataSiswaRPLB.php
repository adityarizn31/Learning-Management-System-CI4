<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="p-4">

    <button class="btn btn-primary" id="button-toggle">
        <i class="bi bi-list"></i>
    </button>

    <div class="card shadow mt-3 border-2 border-primary">

        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between" style="padding-top: 10px;">
                <h3 class="m-0 font-weight-bold text-primary"> Data Siswa RPL B </h3>
                <a href="/GuruController/createSiswaRPLB/" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Tambah Siswa B </a>
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
                        <th scope="col">Foto Siswa</th>
                        <th scope="col">NIS Siswa</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Kelas Siswa</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($rplb as $b) : ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><img src="/img/rplb/<?= $b['foto_siswa']; ?>" alt="" style="width: 20%;"></td>
                            <td><?= $b['nis_siswa']; ?></td>
                            <td><?= $b['nama_siswa']; ?></td>
                            <td><?= $b['kelas_siswa']; ?></td>
                            <td><a href="/guru/detailSiswaRPLB/<?= $b['slug']; ?>" class="btn btn-success">Detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>

    </div>



</section>

<?= $this->endSection('content'); ?>