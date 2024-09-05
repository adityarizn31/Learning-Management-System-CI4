<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <div class="card shadow mb-4 border-2" style="margin-top: 25px; padding: 20px;">

        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between" style="padding-top: 10px;"></div>
            <h4 class="m-0 font-weight-bold text-primary">Tambah Matpel</h4>
        </div>

        <form action="<?= base_url(); ?>AdminController/saveMatpel" method="post" enctype="multipart/form-data">

            <div class="card-body">
                <div class="row">

                    <!-- Nama Matpel -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nama_matapelajaran" class="form-label fw-semibold">Nama Mata Pelajaran</label>
                            <input type="text" name="nama_matapelajaran" id="nama_matapelajaran" autofocus value="<?= old('nama_matapelajaran'); ?>" class="form-control text-black <?= (session('errors.nama_matapelajaran')) ? 'is-invalid' : null ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.nama_matapelajaran') ?>
                            </div>
                        </div>
                    </div>

                    <!-- Guru Matpel -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="guru_matapelajaran" class="form-label fw-semibold">Guru Mata Pelajaran</label>
                            <input type="text" name="guru_matapelajaran" id="guru_matapelajaran" value="<?= old('guru_matapelajaran'); ?>" class="form-control text-black <?= (session('errors.guru_matapelajaran')) ? 'is-invalid' : null ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.guru_matapelajaran') ?>
                            </div>
                        </div>
                    </div>

                    <!-- Jam Matpel -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="jam_matapelajaran" class="form-label fw-semibold">Jam Mata Pelajaran</label>
                            <input type="text" name="jam_matapelajaran" id="jam_matapelajaran" value="<?= old('jam_matapelajaran'); ?>" class="form-control text-black <?= (session('errors.jam_matapelajaran')) ? 'is-invalid' : null ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.jam_matapelajaran') ?>
                            </div>
                        </div>
                    </div>

                    <!-- Button Create -->
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Tambah Matpel
                        </button>
                    </div>

                </div>

        </form>
    </div>

</div>

<?= $this->endSection('content'); ?>