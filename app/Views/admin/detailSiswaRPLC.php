<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="p-4">

    <button class="btn btn-primary" id="button-toggle">
        <i class="bi bi-list"></i>
    </button>

    <div class="card shadow mb-4 border-2" style="margin-top: 25px;">

        <div class="card-header py-3 border-0">
            <h6 class="m-0 font-weight-bold text-primary"> Detail Siswa RPL C </h6>
        </div>

        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="card mb-3 mt-3">
                        <center>
                            <img class="mt-3" src="/img/rplc/<?= $rplc['foto_siswa']; ?>" alt="Foto Siswa" style="width: 25%;">
                        </center>
                        <div class="card-body mt-2 mx-4">
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="username" class="form-label fw-semibold">NIS Siswa</label>
                                        <p class="card-text"><?= $rplc['nis_siswa']; ?></p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="username" class="form-label fw-semibold">Nama Siswa</label>
                                        <p class="card-text"><?= $rplc['nama_siswa']; ?></p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="username" class="form-label fw-semibold">Username Siswa</label>
                                        <p class="card-text"><?= $rplc['username_siswa']; ?></p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="username" class="form-label fw-semibold">Password Siswa</label>
                                        <p class="card-text"><?= $rplc['password_siswa']; ?></p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="username" class="form-label fw-semibold">Kelas Siswa</label>
                                        <p class="card-text"><?= $rplc['kelas_siswa']; ?></p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="username" class="form-label fw-semibold">Jenis Kelamin Siswa</label>
                                        <p class="card-text"><?= $rplc['jk_siswa']; ?></p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="username" class="form-label fw-semibold">No HP/WA Siswa</label>
                                        <p class="card-text"><?= $rplc['nohp_siswa']; ?></p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="username" class="form-label fw-semibold">Alamat Siswa</label>
                                        <p class="card-text"><?= $rplc['alamat_siswa']; ?></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="container mb-3 align-items-center">
                        <div class="row">

                            <a href="/AdminController/editSiswaRPLC/<?= $rplc['slug']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/AdminController/deleteSiswaRPLC/<?= $rplc['id']; ?>" method="post" class="d-inline btn btn-danger mt-2">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin ingin dihapus ?? ');">Delete</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>

<?= $this->endSection('content'); ?>