<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <div class="card shadow mt-3 border-2 border-primary">

        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between" style="padding-top: 10px;">
                <h3 class="m-0 font-weight-bold text-primary"> Data Guru </h3>

                <!-- Tombol Export Excel -->
                <a href="<?= base_url(); ?>AdminController/exportExcel" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" style="margin-right: 10px;">
                    <i class="fas fa-file-excel"></i> Export Excel
                </a>

                <!-- <a href="<?= base_url(); ?>/AdminController/createGuru/" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus"></i> Guru </a> -->

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
            <table class="table table-fixed table-hover table-responsive">

                <thead class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Foto Guru</th>
                        <th scope="col">NIP Guru</th>
                        <th scope="col">Nama Guru</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($guru as $gur) : ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><img src="/img/guru/<?= $gur['foto_guru']; ?>" alt="" style="width: 20%;"></td>
                            <td><?= $gur['nip_guru']; ?></td>   
                            <td><?= $gur['nama_guru']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>AdminController/detailGuru/<?= $gur['slug']; ?>" class="btn btn-success btn-sm">
                                    <i class="fas fa-eye"></i> Detail
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