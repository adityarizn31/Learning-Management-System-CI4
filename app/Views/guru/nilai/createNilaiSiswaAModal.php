<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<div class="col-sm-12 col-md-12" style="padding: 20px;">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <div class="card-title text-black fw-semibold"> Berkas Tugas Algoritma Pemrograman </div>
        </div>

        <div class="col-sm-12">
            <iframe src="" frameborder="0" height="500" width="100%"></iframe>
        </div>
    </div>
</div>

<!-- Form untuk Menilai Tugas -->
<div class="col-sm-12 col-md-12 mt-4">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <div class="card-title text-black fw-semibold">Form Penilaian Tugas</div>
        </div>

        <div class="card-body">
            <form action="<?= base_url('/GuruController/submitNilai') ?>" method="post">
                <!-- Input Nilai -->
                <div class="mb-3">
                    <label for="nilai" class="form-label">Nilai Tugas:</label>
                    <input type="number" name="nilai" id="nilai" class="form-control" min="0" max="100" required>
                </div>

                <!-- Input Komentar -->
                <div class="mb-3">
                    <label for="komentar" class="form-label">Komentar:</label>
                    <textarea name="komentar" id="komentar" class="form-control" rows="3"></textarea>
                </div>

                <!-- Hidden Input untuk ID Tugas -->
                <input type="hidden" name="id_tugas" value="">

                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary btn-sm">Submit Nilai</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection('content') ?>