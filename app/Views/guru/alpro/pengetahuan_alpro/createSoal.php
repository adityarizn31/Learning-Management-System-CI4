<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">

        <form action="<?= base_url('AdminController/savePengetahuanAlpro'); ?>" method="post">

            <?= csrf_field(); ?>

            <div class="form-group row mb-3">
                <label for="pertanyaan" class="form-label fw-semibold">Pertanyaan</label>
                <input type="text" name="pertanyaan" id="pertanyaan" autofocus value="<?= old('pertanyaan'); ?>" class="form-control text-black <?= (session('errors.pertanyaan')) ? 'is-invalid' : null ?>">
                <div class="invalid-feedback">
                    <?= session('errors.pertanyaan') ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="answers" class="form-label">Jawaban</label>

                <?php for ($i = 1; $i <= 4; $i++): ?>
                    <div class="input-group mb-2">
                        <div class="input-group-text">
                            <input type="checkbox" name="is_correct[<?= $i; ?>]" value="<?= $i; ?>">
                        </div>
                        <input type="text" class="form-control" name="answers[<?= $i; ?>]" placeholder="Jawaban <?= $i; ?>" required>
                    </div>
                <?php endfor; ?>

            </div>

            <button type="submit" class="btn btn-primary">Simpan Pertanyaan</button>

        </form>    

</div>

<?= $this->endSection(); ?>