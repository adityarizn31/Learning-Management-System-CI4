<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="p-4" id="main-content">

    <button class="btn btn-primary" id="button-toggle">
        <i class="bi bi-list"></i>
    </button>

    <div class="card shadow shadow-blue-500/50 mb-4 border-2" style="margin-top: 25px; padding: 20px;">
        <div class="container">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary"> Tambah Materi Algoritma dan Pemrograman </h4>
            </div>

            <form action="/GuruController/saveMateriAlpro" method="post" enctype="multipart/form-data">

                <?= csrf_field(); ?>

                <?php $validation = \Config\Services::validation(); ?>
                <?php if (session()->has('validation')) : ?>
                    <?php $validation = session('validation'); ?>
                <?php endif; ?>

                <div class="row">
                    <div class="mb-3">
                        <label for="nama_materi" class="form-label fw-semibold"> Nama Materi </label>
                        <input type="text" name="nama_materi" id="nama_materi" autofocus value="<?= old('nama_materi'); ?>" class="form-control text-black <?= (session('errors.nama_materi')) ? 'is-invalid' : null ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.nama_materi') ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3">
                        <label for="deskripsi_materi" class="form-label fw-semibold"> Deskripsi Materi </label>
                        <textarea name="deskripsi_materi" id="deskripsi_materi" class="form-control text-black text-area <?= (session('errors.deskripsi_materi')) ? 'is-invalid' : null ?>"><?= old('deskripsi_materi'); ?></textarea>
                        <div class="invalid-feedback">
                            <?= session('errors.deskripsi_materi') ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3">
                        <label for="dokumen_materi" class="form-label fw-semibold"> Dokumen Materi </label>
                        <input type="file" name="dokumen_materi" id="dokumen_materi" class="form-control text-black <?= (session('errors.dokumen_materi')) ? 'is-invalid' : ''; ?>" value="<?= old('dokumen_materi'); ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.dokumen_materi') ?>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" value="submit" name="submit" id="submit" class="btn btn-primary">Tambah Materi</button>
                </div>

            </form>

        </div>
    </div>

</section>

<?= $this->endSection('content'); ?>