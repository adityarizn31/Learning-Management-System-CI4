<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="p-4" id="main-content">

    <button class="btn btn-primary" id="button-toggle">
        <i class="bi bi-list"></i>
    </button>

    <div class="card shadow mb-4 border-2" style="margin-top: 25px; padding: 20px;">
        <div class="container">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary"> Edit Tugas Algoritma Pemrograman </h3>
            </div>

            <form action="/GuruController/updateTugasAlpro/<?= $tugas_alpro['id']; ?>" method="post" enctype="multipart/form-data">

                <?= csrf_field(); ?>

                <?php $validation = \Config\Services::validation(); ?>
                <?php if (session()->has('validation')) : ?>
                    <?php $validation = session('validation'); ?>
                <?php endif; ?>

                <div class="row">
                    <div class="mb-3">
                        <label for="judultugas_alpro" class="form-label fw-semibold"> Judul Tugas Alpro </label>
                        <input type="text" name="judultugas_alpro" id="judultugas_alpro" class="form-control text-black <?= (session('errors.judultugas_alpro')) ? 'is-invalid' : null ?>" autofocus value="<?= (old('judultugas_alpro')) ? old('judultugas_alpro') : $tugas_alpro['judultugas_alpro'] ?>" ?>
                        <div class="invalid-feedback">
                            <?= session('errors.judultugas_alpro'); ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3">
                        <label for="deskripsitugas_alpro" class="form-label fw-semibold"> Deskripsi Tugas Algoritma Pemrograman </label>
                        <input type="text" name="deskripsitugas_alpro" id="deskripsitugas_alpro" class="form-control text-black <?= (session('errors.deskripsitugas_alpro')) ? 'is-invalid' : null ?>" autofocus value="<?= (old('deskripsitugas_alpro')) ? old('deskripsitugas_alpro') : $tugas_alpro['deskripsitugas_alpro'] ?>" ?>
                        <div class="invalid-feedback">
                            <?= session('errors.deskripsitugas_alpro'); ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3">
                        <label for="bataswaktu_alpro" class="form-label fw-semibold"> Batas Waktu </label>
                        <input type="datetime-local" name="bataswaktu_alpro" id="bataswaktu_alpro" value="<?= (old('bataswaktu_alpro')) ? old('bataswaktu_alpro') : $tugas_alpro['bataswaktu_alpro'] ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.bataswaktu_alpro') ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3">
                        <label for="filetugas_alpro" class="form-label fw-semibold"> Dokumen Tugas Alpro </label>
                        <input type="file" name="filetugas_alpro" id="filetugas_alpro" class="form-control text-black <?= (session('errors.filetugas_alpro')) ? 'is-invalid' : ''; ?>" value="<?= old('filetugas_alpro'); ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.filetugas_alpro') ?>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" value="submit" name="submit" id="submit" class="btn btn-primary btn-sm"> Ubah Tugas </button>
                </div>

            </form>

        </div>
    </div>

</section>

<?= $this->endSection('content'); ?>