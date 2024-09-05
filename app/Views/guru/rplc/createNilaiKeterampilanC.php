<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <h2 class="mb-4">Form Penilaian Keterampilan Siswa RPL C</h2>

    <form action="/keterampilan/store" method="post">
        <?= csrf_field(); ?>

        <input type="hidden" name="siswa_id" value="<?= esc($siswa['id']); ?>">

        <div class="form-group mb-3">
            <label for="mata_pelajaran_id">Mata Pelajaran</label>
            <select name="mata_pelajaran_id" id="mata_pelajaran_id" class="form-select">
                <?php foreach ($mata_pelajaran as $mp) : ?>
                    <option value="<?= $mp['id']; ?>"><?= esc($mp['nama_mata_pelajaran']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="pertemuan">Pertemuan</label>
            <input type="number" name="pertemuan" class="form-control" id="pertemuan" required>
        </div>

        <div class="form-group mb-3">
            <label for="pertanyaan">Pertanyaan</label>
            <textarea name="pertanyaan" id="pertanyaan" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="nilai">Nilai (1-5)</label>
            <select name="nilai" id="nilai" class="form-select">
                <option value="1">1 - Sangat Kurang</option>
                <option value="2">2 - Kurang</option>
                <option value="3">3 - Cukup</option>
                <option value="4">4 - Baik</option>
                <option value="5">5 - Sangat Baik</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Nilai</button>
    </form>
</div>

<?= $this->endSection(); ?>