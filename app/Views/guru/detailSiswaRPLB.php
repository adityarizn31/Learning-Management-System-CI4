<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<section class="p-4">

    <div class="card shadow mb-4 border-2">

        <div class="card-header py-3 border-0 d-flex justify-content-between align-items-center">
            <h5 class="m-0 font-weight-bold text-primary">Detail Siswa RPL B</h5>
            <div class="d-flex align-items-center">
                <a href="/GuruController/editSiswaRPLB/<?= $siswab['slug']; ?>" class="btn btn-warning btn-sm mr-2">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <form action="/GuruController/deleteSiswaRPLB/<?= $siswab['id']; ?>" method="post" class="d-inline m-0 p-0">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin ingin dihapus ?? ');">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </form>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="card mb-3 mt-3">
                        <center>
                            <img class="mt-3" src="/img/rplb/<?= $siswab['foto_siswa']; ?>" alt="Foto Siswa" style="width: 25%;">
                        </center>
                        <div class="card-body mt-2 mx-4">
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="username" class="form-label fw-semibold">NIS Siswa</label>
                                        <p class="card-text"><?= $siswab['nis_siswa']; ?></p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="username" class="form-label fw-semibold">Nama Siswa</label>
                                        <p class="card-text"><?= $siswab['nama_siswa']; ?></p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="username" class="form-label fw-semibold">Username Siswa</label>
                                        <p class="card-text"><?= $siswab['username_siswa']; ?></p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="username" class="form-label fw-semibold">Password Siswa</label>
                                        <p class="card-text"><?= $siswab['password_siswa']; ?></p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="username" class="form-label fw-semibold">Kelas Siswa</label>
                                        <p class="card-text"><?= $siswab['kelas_siswa']; ?></p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="username" class="form-label fw-semibold">Jenis Kelamin Siswa</label>
                                        <p class="card-text"><?= $siswab['jk_siswa']; ?></p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="username" class="form-label fw-semibold">No HP/WA Siswa</label>
                                        <p class="card-text"><?= $siswab['nohp_siswa']; ?></p>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="username" class="form-label fw-semibold">Alamat Siswa</label>
                                        <p class="card-text"><?= $siswab['alamat_siswa']; ?></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card mb-3 mt-3">
                        <table class="table table-fixed table-hover">

                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Mata Pelajaran</th>
                                    <th scope="col">Nilai</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>

<?= $this->endSection('content'); ?>