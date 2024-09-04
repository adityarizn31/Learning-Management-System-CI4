<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <h2 class="mb-4">Data Siswa dan Nilai Algoritma Pemrograman RPL A </h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Mata Pelajaran</th>
                <th>Pertemuan</th>
                <th>Tugas</th>
                <th>Nilai</th>
            </tr>   
        </thead>
        <tbody>
            <?php foreach ($siswa_nilai as $sn): ?>
                <tr>
                    <td><?= esc($sn['nama_siswa']); ?></td>
                    <td><?= esc($sn['kelas']); ?></td>
                    <td><?= esc($sn['mata_pelajaran']); ?></td>
                    <td><?= esc($sn['nilai']); ?></td>
                    <!-- Tidak ada Button Nilai -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection('content'); ?>