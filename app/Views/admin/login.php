<?= $this->extend('layout/templateloginregister'); ?>

<?= $this->section('contentloginregister'); ?>

<div class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5 text-center">

                                    <!-- School Logo -->
                                    <div class="mb-4">
                                        <img src="/img/default/stm.png" alt="Stemanikaku" style="max-width: 100px;">
                                    </div>

                                    <!-- Login Title -->
                                    <h1 class="h4 text-gray-900 mb-4"><?= lang('Auth.loginTitle') ?></h1>

                                    <!-- Login Buttons -->
                                    <div class="d-flex justify-content-center gap-3 flex-wrap m-2">
                                        <a href="<?= base_url() ?>Auth/loginadmin/" class="btn btn-primary btn-sm d-flex align-items-center mb-2 mx-2">
                                            <i class="fas fa-user-shield me-2"> </i> Login Admin
                                        </a>
                                        <a href="<?= base_url() ?>Auth/loginsiswa/" class="btn btn-success btn-sm d-flex align-items-center mb-2 mx-2">
                                            <i class="fas fa-user-graduate me-2"> </i> Login Siswa
                                        </a>
                                        <a href="<?= base_url() ?>Auth/loginguru/" class="btn btn-info btn-sm d-flex align-items-center mb-2 mx-2">
                                            <i class="fas fa-chalkboard-teacher me-2"> </i> Login Guru
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('contentloginregister'); ?>
