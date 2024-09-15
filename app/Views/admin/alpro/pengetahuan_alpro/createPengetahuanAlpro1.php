<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <h2 class="mb-4">Buat Pertanyaan Pilihan Ganda</h2>

    <form action="<?= base_url('AdminController/savePengetahuanAlpro'); ?>" method="post">
        <?= csrf_field(); ?>

        <div class="mb-3">
            <label for="question_text" class="form-label">Pertanyaan</label>
            <textarea class="form-control" id="question_text" name="question_text" rows="3" required></textarea>
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