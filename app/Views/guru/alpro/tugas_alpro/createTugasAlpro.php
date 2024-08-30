<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="p-4">

    <button class="btn btn-primary" id="button-toggle">
        <i class="bi bi-list"></i>
    </button>

    <div class="card shadow mb-2 border-2 border-primary" style="margin-top: 25px;">

        <div class="card-header py-3 border-0">
            <h5 class="m-0 font-weight-bold text-primary"> Tugas Algoritma Pemrograman </h5>
        </div>

        <div class="container">
            <div class="row">
                <div class="cal">

                    <form action="/GuruController/saveTugasAlpro" method="post" enctype="multipart/form-data">

                        <?= csrf_field(); ?>

                        <?php $validation = \Config\Services::validation(); ?>
                        <?php if (session()->has('validation')) : ?>
                            <?php $validation = session('validation'); ?>
                        <?php endif; ?>

                        <div class="row">
                            <div class="mb-3">
                                <label for="judultugas_alpro" class="form-label fw-semibold"> Judul Tugas </label>
                                <input type="text" name="judultugas_alpro" id="judultugas_alpro" autofocus value="<?= old('judultugas_alpro'); ?>" class="form-control text-black <?= (session('errors.judultugas_alpro')) ? 'is-invalid' : null ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.judultugas_alpro') ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3">
                                <label for="deskripsitugas_alpro" class="form-label fw-semibold"> Deskripsi Tugas </label>
                                <textarea name="deskripsitugas_alpro" id="deskripsitugas_alpro" class="form-control text-black text-area <?= (session('errors.deskripsitugas_alpro')) ? 'is-invalid' : null ?>"><?= old('deskripsitugas_alpro'); ?></textarea>
                                <div class="invalid-feedback">
                                    <?= session('errors.deskripsitugas_alpro') ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3">
                                <label for="bataswaktu_alpro" class="form-label fw-semibold"> Batas Waktu </label>
                                <input type="datetime-local" name="bataswaktu_alpro" id="bataswaktu_alpro">
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

                        <div class="d-grid gap-2 col-6 mx-auto mb-3">
                            <button type="submit" value="submit" name="submit" id="submit" class="btn btn-primary"> Buat Tugas </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>

</section>


<?= $this->endSection('content'); ?>