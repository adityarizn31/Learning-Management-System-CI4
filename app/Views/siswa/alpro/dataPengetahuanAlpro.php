<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="p-4">

    <button class="btn btn-primary" id="button-toggle">
        <i class="bi bi-list"></i>
    </button>

    <div class="card shadow mt-3 border-2 border-primary">

        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between" style="padding-top: 10px;">
                <h3 class="m-0 font-weight-bold text-primary"> Data RPL A Pengetahuan Algoritma Pemrograman </h3>
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
                        <th scope="col" colspan="2" class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($rpla as $a) : ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><img src="<?= base_url() ?>/img/rpla/<?= $a['foto_siswa']; ?>" alt="" style="width: 20%;"></td>
                            <td><?= $a['nis_siswa']; ?></td>
                            <td><?= $a['nama_siswa']; ?></td>
                            <td><?= $a['kelas_siswa']; ?></td>
                            <td>
                                <a href="/guru/detailSiswaRPLA/<?= $a['slug']; ?>" class="btn btn-success btn-sm"><i class="fa fa-question-circle"></i>
                                    Pertanyaan
                                </a>
                            </td>
                            <td>
                                <a href="/guru/detailSiswaRPLA/<?= $a['slug']; ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-award"></i>
                                    Pengetahuan
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>

    </div>



</section>

<?= $this->endSection('content'); ?>