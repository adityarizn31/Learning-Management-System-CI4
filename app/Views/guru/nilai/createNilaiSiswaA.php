<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <h2 class="mb-4">Input Nilai Siswa Algoritma Pemrograman</h2>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('errors'); ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('/GuruController/saveNilai'); ?>" method="post">
        <?= csrf_field(); ?>
        <div class="form-group mb-3">
            <label for="siswa_id">Pilih Siswa:</label>
            <select name="siswa_id" id="siswa_id" class="form-control <?= (session('errors.siswa_id')) ? 'is-invalid' : '' ?>">
                <option value="">-- Pilih Siswa RPL A --</option>
                <?php foreach ($siswaa as $sw): ?>
                    <option value="<?= esc($sw['id']); ?>"><?= esc($sw['nama_siswa']); ?></option>
                <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">
                <?= session('errors.siswa_id'); ?>
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="mata_pelajaran">Mata Pelajaran:</label>
            <input type="text" name="mata_pelajaran" id="mata_pelajaran" class="form-control <?= (session('errors.mata_pelajaran')) ? 'is-invalid' : '' ?>" value="<?= old('mata_pelajaran'); ?>" placeholder="Algoritma Pemrograman">
            <div class="invalid-feedback">
                <?= session('errors.mata_pelajaran'); ?>
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="nilai">Nilai:</label>
            <input type="number" name="nilai" id="nilai" class="form-control <?= (session('errors.nilai')) ? 'is-invalid' : '' ?>" value="<?= old('nilai'); ?>" min="0" max="100">
            <div class="invalid-feedback">
                <?= session('errors.nilai'); ?>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mb-3 btn-sm">Simpan Nilai</button>

    </form>
</div>

<?= $this->endSection('content'); ?>