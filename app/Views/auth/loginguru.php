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
                                        <h1 class="h4 text-gray-900 mb-4"> Login Guru Stemanikaku </h1>
                                    </div>

                                    <form action="<?= base_url() ?>Auth/saveLogin" class="" method="post">

                                        <?= csrf_field(); ?>

                                        <?php $validation = \Config\Services::validation(); ?>
                                        <?php if (session()->has('validation')) : ?>
                                            <?php $validation = session('validation'); ?>
                                        <?php endif; ?>

                                        <div class="form-group">
                                            <input type="text" name="username_siswa" class="form-control form-control-user <?php if (session('errors.username_siswa')) : ?> is-invalid <?php endif ?>" name="login" aria-describedby="username_siswa" placeholder="username" id="">
                                            <div class="invalid-feedback">
                                                <?= session('errors.username_siswa') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password_siswa" class="form-control  <?php if (session('errors.password_siswa')) : ?>is-invalid<?php endif ?>" placeholder="password">
                                            <div class="invalid-feedback">
                                                <?= session('errors.password_siswa') ?>
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                                <?= lang('Auth.rememberMe') ?>
                                            </label>
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