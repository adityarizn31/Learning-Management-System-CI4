<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <h2 class="mb-4">Jawab Soal Pilihan Ganda</h2>

    <form action="<?= base_url('SiswaController/submitJawaban'); ?>" method="post">
        <?= csrf_field(); ?>

        <?php foreach ($soal as $index => $item): ?>
            <div class="mb-4">
                <label class="form-label"><?= ($index + 1) . '. ' . $item['pertanyaan']; ?></label>
                <?php foreach ($item['pilihan'] as $pilihan): ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jawaban_<?= $item['id']; ?>" id="jawaban_<?= $item['id'] . '_' . $pilihan['id']; ?>" value="<?= $pilihan['id']; ?>" required>
                        <label class="form-check-label" for="jawaban_<?= $item['id'] . '_' . $pilihan['id']; ?>">
                            <?= $pilihan['teks']; ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>

        <button type="submit" class="btn btn-primary">Kirim Jawaban</button>
    </form>
</div>

<?= $this->endSection(); ?>
