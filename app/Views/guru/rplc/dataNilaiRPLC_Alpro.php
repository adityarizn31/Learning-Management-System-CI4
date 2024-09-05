<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <h2 class="mb-4">Data Siswa dan Nilai Algoritma Pemrograman RPL A</h2>

    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Tabel Siswa dan Nilai -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tugas</th>
                <th>Pertemuan</th>
                <th>Tanggal Pertemuan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor = 1; ?>
            <?php foreach ($siswa_nilai as $sn): ?>
                <tr>
                    <td><?= $nomor++; ?></td>
                    <td>Dasar Algoritma</td>
                    <td>1</td>
                    <td>Rabu, 30 Agustus 2024</td>
                    <td>
                        <!-- Tombol Preview Tugas -->
                        <a href="/GuruController/dataNilaiRPLC_Alpro" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i> Detail Grafik
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?= $this->endSection('content'); ?>