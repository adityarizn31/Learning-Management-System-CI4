<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <!-- <i class="fas fa-laugh-wink"></i> -->
            </div>
            <div class="sidebar-brand-text mx-3"> STEMANIKAKU </sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>AdminController/">
                <i class="fas fa-fw fa-user-shield"></i>
                <span> Dashboard Admin </span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading text-center">
            Layanan - Layanan
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                aria-expanded="true" aria-controls="collapseOne">
                <i class="fas fa-fw fa-user-graduate"></i>
                <span>Tambah Data Siswa</span>
            </a>
            <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Buat Data Baru Siswa</h6>
                    <a class="collapse-item" href="<?= base_url(); ?>AdminController/createSiswaRPLA"> Data Siswa X RPL A</a>
                    <a class="collapse-item" href="<?= base_url(); ?>AdminController/createSiswaRPLB"> Data Siswa X RPL B</a>
                    <a class="collapse-item" href="<?= base_url(); ?>AdminController/createSiswaRPLC"> Data Siswa X RPL C</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-chalkboard"></i>
                <span>Manajemen Kelas Siswa</span>

            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url(); ?>AdminController/dataSiswaRPLA"> Kelas X RPL A</a>
                    <a class="collapse-item" href="<?= base_url(); ?>AdminController/dataSiswaRPLB"> Kelas X RPL B</a>
                    <a class="collapse-item" href="<?= base_url(); ?>AdminController/dataSiswaRPLC"> Kelas X RPL C</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url() ?>AdminController/createGuru">
                <i class="fas fa-fw fa-chalkboard-teacher"></i>
                <span>Tambah Data Guru</span>
            </a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url(); ?>AdminController/dataGuru">
                <i class="fas fa-fw fa-chalkboard-teacher"></i>
                <span> Manajemen Data Guru</span>
            </a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url() ?>AdminController/createMataPelajaran">
                <i class="fas fa-fw fa-book"></i>
                <span>Tambah Mata Pelajaran</span>
            </a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url() ?>AdminController/dataMataPelajaran">
                <i class="fas fa-fw fa-book-open"></i>
                <span>Manajemen Mata Pelajaran</span>
            </a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                aria-expanded="true" aria-controls="collapseThree">
                <i class="fas fa-handshake"></i>
                <span>Indikator Keterampilan</span>
            </a>
            <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url() ?>AdminController/createPilgan/"> Buat Survey </a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

    </ul>
    <!-- End of Sidebar -->