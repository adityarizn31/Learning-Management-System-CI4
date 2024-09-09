<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <h2 class="mb-4">Buat Pertanyaan Keterampilan</h2>

    <form action="<?= base_url('GuruController/saveKeterampilanQuestions'); ?>" method="post">
        <?= csrf_field(); ?>

        <?php for ($i = 1; $i <= 5; $i++): ?>
            <div class="mb-3">
                <label for="pertanyaan_<?= $i; ?>" class="form-label">Pertanyaan <?= $i; ?></label>
                <textarea class="form-control" id="pertanyaan_<?= $i; ?>" name="pertanyaan_<?= $i; ?>" rows="3" required></textarea>
            </div>

            <!-- Radio buttons for 1-5 -->
            <div class="mb-3">
                <label class="form-label">Jawaban yang diharapkan:</label>
                <div>
                    <!-- Pilihan  -->
                    <?php for ($j = 1; $j <= 5; $j++): ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="nilai_<?= $i; ?>" id="nilai_<?= $i; ?>_<?= $j; ?>" value="<?= $j; ?>" required>
                            <label class="form-check-label" for="nilai_<?= $i; ?>_<?= $j; ?>"><?= $j; ?></label>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        <?php endfor; ?>

        <button type="submit" class="btn btn-primary">Simpan Pertanyaan</button>
    </form>
</div>

<?= $this->endSection(); ?>
