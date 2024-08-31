<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="p-4">

    <button class="btn btn-primary" id="button-toggle">
        <i class="bi bi-list"></i>
    </button>

    <div class="card shadow mt-3 border-2 border-primary">

        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between" style="padding-top: 10px;">
                <h3 class="m-0 font-weight-bold text-primary"> Data Siswa RPL C </h3>
                <a href="/GuruController/createSiswaRPLC/" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Tambah Siswa C </a>
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
                    <?php foreach ($rplc as $c) : ?>
                    <tr>
                        <th>1</th>
                        <td><img src="/img/rplc/<?= $c['foto_siswa']; ?>" alt="" style="width: 20%;"></td>
                        <td><?= $c['nis_siswa']; ?></td>
                        <td><?= $c['nama_siswa']; ?></td>
                        <td><?= $c['kelas_siswa']; ?></td>
                        <td><a href="/guru/detailSiswaRPLC/<?= $c['slug']; ?>" class="btn btn-success">Detail</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>

    </div>



</section>

<?= $this->endSection('content'); ?>