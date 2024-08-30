<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <div class="card shadow mb-2 border-2 border-primary" style="margin-top: 25px;">

        <div class="card-header py-3 border-0 d-flex justify-content-between align-items-center">
            <h5 class="m-0 font-weight-bold text-primary">Tugas Algoritma Pemrograman</h5>
            <div>
                <a href="/GuruController/editTugasAlpro/<?= $tugas_alpro['slug']; ?>" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i> Edit
                </a>

                <form action="/GuruController/deleteTugasAlpro/<?= $tugas_alpro['id']; ?>" method="post" class="d-inline">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapusnya?');">
                        <i class="fas fa-trash-alt"></i> Delete
                    </button>
                </form>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="card mb-3 mt-3 border-1 border-primary">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="username" class="form-label fw-semibold"> Judul Tugas Algoritma Pemrograman </label>
                                <p class="card-text"><?= $tugas_alpro['judultugas_alpro']; ?></p>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="username" class="form-label fw-semibold"> Deskripsi Tugas Alpro </label>
                                <p class="card-text"><?= $tugas_alpro['deskripsitugas_alpro']; ?></p>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="username" class="form-label fw-semibold"> Batas Waktu Pengumpulan </label>
                                <p class="card-text"><?= $tugas_alpro['bataswaktu_alpro']; ?></p>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12" style="padding: 20px;">
                            <div class="card card-outline card-primary">

                                <div class="card-header">
                                    <div class="card-title text-black fw-semibold"> Berkas Tugas <?= $tugas_alpro['id']; ?> </div>
                                </div>

                                <div class="col-sm-12">
                                    <iframe src="<?= base_url('/dokumen/tugasAlpro/' . $tugas_alpro['filetugas_alpro']) ?>" frameborder="0" height="500" width="100%"></iframe>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection('content'); ?>