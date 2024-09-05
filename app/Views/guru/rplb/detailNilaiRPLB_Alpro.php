<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <h2 class="mb-4">Data Siswa dan Nilai Algoritma Pemrograman RPL B</h2>

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

    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Dropdown Sorting -->
        <form action="<?= base_url() ?>GuruController/dataSiswaNilai" method="get" class="mb-3">
            <label for="sort" class="me-2">Urutkan berdasarkan:</label>
            <select name="sort" id="sort" class="form-select form-select-sm d-inline-block w-auto" onchange="this.form.submit()">
                <option value="tugas_terbaru">Tugas Terbaru</option>
                <option value="pertemuan_asc">Pertemuan Baru</option>
                <option value="pertemuan_asc">Pertemuan Lama</option>
            </select>
        </form>

        <!-- Tombol Tambah Nilai Siswa -->
        <a href="<?= base_url() ?>GuruController/createNilaiSiswaB" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Nilai Siswa
        </a>
    </div>

    <!-- Tabel Siswa dan Nilai -->
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
            <?php $pertemuan = 1; ?>
            <?php foreach ($siswa_nilai as $sn): ?>
                <tr>
                    <td><?= esc($sn['nama_siswa']); ?></td>
                    <td>X RPL C</td>
                    <td><?= esc($sn['mata_pelajaran']); ?></td>
                    <td>1</td>
                    <td>
                        <!-- Tombol Preview Tugas -->
                        <a href="<?= base_url() ?>GuruController/createNilaiSiswaBModal" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i> Nilai Tugas
                        </a>
                    </td>
                    <td><?= !empty($sn['nilai']) ? esc($sn['nilai']) : 'kosong'; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">
                        Grafik Pelayanan Si Lancar
                    </div>
                    <div class="card-body bg-white viewTampilGrafik">
                        <canvas id="myChart" width="200" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var NilaiAlgoritmaB = <?php echo json_encode($siswa_nilai); ?>;
        
        // Prepare data for chart
        var labels = [];
        var data = [];
        
        NilaiAlgoritmaB.forEach(function(item) {
            labels.push(item['nama_siswa']);
            data.push(item['nilai'] ? parseInt(item['nilai']) : 0);
        });

        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Nilai Tugas Siswa',
                    data: data,
                    borderWidth: 1,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });
    </script>

</div>

<?= $this->endSection('content'); ?>
