<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<!-- container-fluid -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="text-black fw-bold">Dashboard Admin</h2>
    </div>

    <div class="card shadow border-2 border-primary text-center" style="padding: 2%;">        

        <img src="/img/default/stm.png" alt="Foto Admin" class="mx-auto d-block" style="width: 20%; height: 20%;">

        <div class="card-body text-black">
            <h5 class="card-title text-black font-weight-bold">Selamat Datang, Admin!</h5>            
            <p class="card-text">Website LMS STEMANIKAKU adalah platform pembelajaran online yang dirancang khusus untuk mendukung kegiatan belajar mengajar di STEMANIKAKU. Platform ini menyediakan berbagai fitur untuk mengelola kelas, materi, dan tugas dengan mudah.</p>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection('content'); ?>