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
            <a class="nav-link" href="<?= base_url(); ?>GuruController/index/">
                <i class="fas fa-fw fa-user-shield"></i>
                <span> Dashboard Guru </span></a>
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
                <span> Manajemen Kelas </span>
            </a>
            <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url(); ?>GuruController/dataSiswaRPLA"> Kelas X RPL A</a>
                    <a class="collapse-item" href="<?= base_url(); ?>GuruController/dataSiswaRPLB"> Kelas X RPL B</a>
                    <a class="collapse-item" href="<?= base_url(); ?>GuruController/dataSiswaRPLC"> Kelas X RPL C</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url() ?>GuruController/dataMataPelajaran">
                <i class="fas fa-fw fa-book"></i>
                <span> Manajemen Mata Pelajaran </span>
            </a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url(); ?>GuruController/dataGuru" data-toggle="collapse" data-target="#collapseZero">
                <i class="fas fa-fw fa-chalkboard-teacher"></i>
                <span> Manajemen Data Guru</span>
            </a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                aria-expanded="true" aria-controls="collapseThree">
                <i class="fas fa-lightbulb"></i>
                <span>Manajemen Nilai</span>
            </a>
            <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url(); ?>GuruController/dataManajemenNilai/"> Algoritma Pemrograman </a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
                aria-expanded="true" aria-controls="collapseFour">
                <i class="fas fa-lightbulb"></i>
                <span>Manajemen Keterampilan</span>
            </a>
            <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url(); ?>GuruController/dataManajemenKeterampilan/"> Algoritma Pemrograman </a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

    </ul>
    <!-- End of Sidebar -->