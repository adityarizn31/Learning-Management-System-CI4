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
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"> Login Siswa Stemanikaku </h1>
                                    </div>

                                    <form method="POST" action="<?= base_url('Auth/loginprocess') ?>" class="needs-validation">

                                        <?= csrf_field(); ?>

                                        <div class="form-group">
                                            <input type="text" name="username_siswa" class="form-control form-control-user <?= session('errors.username_siswa') ? 'is-invalid' : '' ?>" placeholder="Username" value="<?= old('username_siswa') ?>">
                                            <div class="invalid-feedback">
                                                <?= session('errors.username_siswa') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password_siswa" class="form-control <?= session('errors.password_siswa') ? 'is-invalid' : '' ?>" placeholder="Password">
                                            <div class="invalid-feedback">
                                                <?= session('errors.password_siswa') ?>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-block"> Login </button>

                                    </form>
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
