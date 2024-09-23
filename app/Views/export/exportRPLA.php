<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<?php

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Siswa RPL A.xls")

?>

<html>

<body>

    <table class="table table-fixed table-hover">

        <thead class="table-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Foto Siswa</th>
                <th scope="col">NIS Siswa</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">Username Siswa</th>
                <th scope="col">Password Siswa</th>
                <th scope="col">Kelas Siswa</th>
                <th scope="col">Jenis Kelamin Siswa</th>
                <th scope="col">No HP Siswa</th>
                <th scope="col">Alamat Siswa</th>
            </tr>
        </thead>

        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($siswaa as $a) : ?>
                <tr>
                    <th><?= $i++; ?></th>
                    <td><img src="/img/rpla/<?= $a['foto_siswa']; ?>" alt="" style="width: 20%;"></td>
                    <td><?= $a['nis_siswa']; ?></td>
                    <td><?= $a['nama_siswa']; ?></td>
                    <td><?= $a['username_siswa']; ?></td>
                    <td><?= $a['password_siswa'] ?></td>
                    <td><?= $a['kelas_siswa'] ?></td>
                    <td><?= $a['jk_siswa'] ?></td>
                    <td><?= $a['nohp_siswa'] ?></td>
                    <td><?= $a['alamat_siswa'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

</body>

</html>

<?= $this->endSection('content') ?>