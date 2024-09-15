<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">

    <h2 class="mb-4">Buat Pertanyaan Pilihan Ganda</h2>

    <form action="<?= base_url('AdminController/savePengetahuanAlpro'); ?>" method="post">
        <?= csrf_field(); ?>

        <?php $validation = \Config\Services::validation(); ?>
        <?php if (session()->has('validation')) : ?>
            <?php $validation = session('validation'); ?>
        <?php endif; ?>

        <!-- Pertanyaan1 -->
        <div class="form-group row mb-3">
            <label for="pertanyaan1" class="form-label fw-semibold"> Pertanyaan 1 </label>
            <input type="text" name="pertanyaan1" id="pertanyaan1" autofocus value="<?= old('pertanyaan1'); ?>" class="form-control text-black <?= (session('errors.pertanyaan1')) ? 'is-invalid' : null ?>">
            <div class="invalid-feedback">
                <?= session('errors.pertanyaan1') ?>
            </div>
        </div>

        <!-- Pertanyaan2 -->
        <div class="form-group row mb-3">
            <label for="pertanyaan2" class="form-label fw-semibold"> Pertanyaan 2 </label>
            <input type="text" name="pertanyaan2" id="pertanyaan2" value="<?= old('pertanyaan2'); ?>" class="form-control text-black <?= (session('errors.pertanyaan2')) ? 'is-invalid' : null ?>">
            <div class="invalid-feedback">
                <?= session('errors.pertanyaan2') ?>
            </div>
        </div>

        <!-- Pertanyaan3 -->
        <div class="form-group row mb-3">
            <label for="pertanyaan3" class="form-label fw-semibold"> Pertanyaan 3 </label>
            <input type="text" name="pertanyaan3" id="pertanyaan3" value="<?= old('pertanyaan3'); ?>" class="form-control text-black <?= (session('errors.pertanyaan3')) ? 'is-invalid' : null ?>">
            <div class="invalid-feedback">
                <?= session('errors.pertanyaan3') ?>
            </div>
        </div>

        <!-- Pertanyaan4 -->
        <div class="form-group row mb-3">
            <label for="pertanyaan4" class="form-label fw-semibold"> Pertanyaan 4 </label>
            <input type="text" name="pertanyaan4" id="pertanyaan4" value="<?= old('pertanyaan4'); ?>" class="form-control text-black <?= (session('errors.pertanyaan4')) ? 'is-invalid' : null ?>">
            <div class="invalid-feedback">
                <?= session('errors.pertanyaan4') ?>
            </div>
        </div>

        <!-- Pertanyaan5 -->
        <div class="form-group row mb-3">
            <label for="pertanyaan5" class="form-label fw-semibold"> Pertanyaan 5 </label>
            <input type="text" name="pertanyaan5" id="pertanyaan5" value="<?= old('pertanyaan5'); ?>" class="form-control text-black <?= (session('errors.pertanyaan5')) ? 'is-invalid' : null ?>">
            <div class="invalid-feedback">
                <?= session('errors.pertanyaan5') ?>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Pertanyaan</button>

    </form>

</div>

<?= $this->endSection(); ?>