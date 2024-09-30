<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<section class="p-4" id="main-content">

    <div class="card shadow shadow-blue-500/50 mb-4 border-2" style="padding: 20px;">
        <div class="container">
            
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Buat Soal Survey</h4>
            </div>

            <form action="<?= base_url(); ?>GuruController/saveSurvey" method="post" enctype="multipart/form-data">

                <?= csrf_field(); ?>

                <?php $validation = \Config\Services::validation(); ?>
                <?php if (session()->has('validation')) : ?>
                    <?php $validation = session('validation'); ?>
                <?php endif; ?>

                <!-- Pertanyaan 1 -->
                <div class="form-group row mb-3">
                    <label for="pertanyaan1" class="form-label fw-semibold">Pertanyaan 1</label>
                    <input type="text" name="pertanyaan1" id="pertanyaan1" autofocus value="<?= old('pertanyaan1'); ?>" class="form-control text-black <?= (session('errors.pertanyaan1')) ? 'is-invalid' : null ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.pertanyaan1') ?>
                    </div>
                </div>

                <!-- Pertanyaan 2 -->
                <div class="form-group row mb-3">
                    <label for="pertanyaan2" class="form-label fw-semibold">Pertanyaan 2</label>
                    <input type="text" name="pertanyaan2" id="pertanyaan2" autofocus value="<?= old('pertanyaan2'); ?>" class="form-control text-black <?= (session('errors.pertanyaan2')) ? 'is-invalid' : null ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.pertanyaan2') ?>
                    </div>
                </div>

                <!-- Pertanyaan 3 -->
                <div class="form-group row mb-3">
                    <label for="pertanyaan3" class="form-label fw-semibold">Pertanyaan 3</label>
                    <input type="text" name="pertanyaan3" id="pertanyaan3" autofocus value="<?= old('pertanyaan3'); ?>" class="form-control text-black <?= (session('errors.pertanyaan3')) ? 'is-invalid' : null ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.pertanyaan3') ?>
                    </div>
                </div>

                <!-- Pertanyaan 4 -->
                <div class="form-group row mb-3">
                    <label for="pertanyaan4" class="form-label fw-semibold">Pertanyaan 4</label>
                    <input type="text" name="pertanyaan4" id="pertanyaan4" autofocus value="<?= old('pertanyaan4'); ?>" class="form-control text-black <?= (session('errors.pertanyaan4')) ? 'is-invalid' : null ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.pertanyaan4') ?>
                    </div>
                </div>

                <!-- Pertanyaan 5 -->
                <div class="form-group row mb-3">
                    <label for="pertanyaan5" class="form-label fw-semibold">Pertanyaan 5</label>
                    <input type="text" name="pertanyaan5" id="pertanyaan5" autofocus value="<?= old('pertanyaan5'); ?>" class="form-control text-black <?= (session('errors.pertanyaan5')) ? 'is-invalid' : null ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.pertanyaan5') ?>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <div class="col-12">
                        <button type="submit" value="submit" name="submit" id="submit" class="btn btn-primary w-100">Tambah</button>
                    </div>
                </div>

            </form>

        </div>

    </div>

</section>

<?= $this->endSection('content'); ?>
