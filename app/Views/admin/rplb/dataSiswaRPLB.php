<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <div class="card shadow mt-3 border-2 border-primary">

        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary">Data Siswa RPL B</h3>
                <div class="d-flex">
                    <!-- Tombol Export Excel -->
                    <a href="<?= base_url() ?>AdminController/exportExcel" class="btn btn-sm btn-success shadow-sm mr-2">
                        <i class="fas fa-file-excel"></i> Export Excel
                    </a>
                </div>
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
                        <th scope="col">Grafik Perkembangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($siswab as $b) : ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><img src="/img/rplb/<?= $b['foto_siswa']; ?>" alt="" style="width: 30%;"></td>
                            <td><?= $b['nis_siswa']; ?></td>
                            <td><?= $b['nama_siswa']; ?></td>
                            <td><?= $b['kelas_siswa']; ?></td>
                            <td>
                                <a href="<?= base_url() ?>Detail/grafikSiswaRPLB/<?= $b['slug']; ?>" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-chart-bar"></i> Grafik
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>AdminController/detailSiswaRPLB/<?= $b['slug']; ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Detail
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>

    </div>

</div>

<?= $this->endSection('content'); ?>