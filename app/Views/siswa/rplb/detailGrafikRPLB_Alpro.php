<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<section class="p-4">
    <div class="card shadow border-2 border-primary">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Grafik Perkembangan Siswa</h3>
        </div>

        <div class="card-body">
            <canvas id="grafikNilaiSiswa" width="400" height="200"></canvas>
        </div>
    </div>
</section>

<!-- Grafik -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Data yang akan dimasukkan ke dalam grafik
    var ctx = document.getElementById('grafikNilaiSiswa').getContext('2d');
    var chartData = {
        labels: [
            <?php 
            $counter = 1; // Memulai penghitung dari 1
            foreach ($nilai_siswa as $nilai) : ?>
                // Mengganti slug dengan 'Tugas' dan nomor urut
                'Tugas <?= $counter++; ?>',
            <?php endforeach; ?>
        ],
        datasets: [{
            label: 'Nilai Siswa',
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1,
            data: [
                <?php foreach ($nilai_siswa as $nilai) : ?>
                    <?= $nilai['nilai']; ?>,
                <?php endforeach; ?>
            ]
        }]
    };

    var myChart = new Chart(ctx, {
        type: 'bar', // Anda bisa mengganti menjadi 'line', 'pie', dll.
        data: chartData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<?= $this->endSection('content'); ?>
