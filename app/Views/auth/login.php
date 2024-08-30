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
                                        <h1 class="h4 text-gray-900 mb-4"> <?= lang('Auth.loginTitle') ?> </h1>
                                    </div>

                                    <?= view('Myth\Auth\Views\_message_block') ?>

                                    <form class="user" action="<?= url_to('login') ?>" method="post">
                                        <?= csrf_field() ?>

                                        <?php
                                        // Memeriksa apakah $config telah didefinisikan dan bukan null
                                        if ($config && is_array($config->validFields) && in_array('email', $config->validFields)) :
                                        ?>

                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?> " name="login" aria-describedby="email" placeholder="<?= lang('Auth.email') ?>">
                                                <div class="invalid-feedback">
                                                    <?= session('errors.login') ?>
                                                </div>
                                            </div>

                                        <?php else : ?>

                                            <div class="form-group">
                                                <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                                                <div class="invalid-feedback">
                                                    <?= session('errors.login') ?>
                                                </div>
                                            </div>

                                        <?php endif; ?>

                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                                            <div class="invalid-feedback">
                                                <?= session('errors.password') ?>
                                            </div>
                                        </div>

                                        <?php if ($config && property_exists($config, 'allowRemembering') && $config->allowRemembering) : ?>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                                    <?= lang('Auth.rememberMe') ?>
                                                </label>
                                            </div>
                                        <?php endif; ?>

                                        <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.loginAction') ?></button>

                                    </form>

                                    <hr>

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