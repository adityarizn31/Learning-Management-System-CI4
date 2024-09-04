<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <div class="card shadow mb-4 border-2" style="margin-top: 25px; padding: 20px;">
        <div class="container">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary"> Edit Data Siswa RPL B </h3>
            </div>

            <form action="/AdminController/updateSiswaRPLB/<?= $rplb['id']; ?>" method="post" enctype="multipart/form-data">

                <?= csrf_field(); ?>

                <?php $validation = \Config\Services::validation(); ?>
                <?php if (session()->has('validation')) : ?>
                    <?php $validation = session('validation'); ?>
                <?php endif; ?>

                <input type="hidden" name="fotolama" value="<?= $rplb['foto_siswa']; ?>">

                <div class="form-group row mb-3">
                    <label for="nis_siswa" class="form-label fw-semibold"> NIS Siswa </label>
                    <input type="text" name="nis_siswa" id="nis_siswa" class="form-control text-black <?= (session('errors.nis_siswa')) ? 'is-invalid' : null ?>" autofocus value="<?= (old('nis_siswa')) ? old('nis_siswa') : $rplb['nis_siswa'] ?>" ?>
                    <div class="invalid-feedback">
                        <?= session('errors.nis_siswa'); ?>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="username_siswa" class="form-label fw-semibold"> Username Siswa </label>
                    <input type="text" name="username_siswa" id="username_siswa" class="form-control text-black <?= (session('errors.username_siswa')) ? 'is-invalid' : null ?>" autofocus value="<?= (old('username_siswa')) ? old('username_siswa') : $rplb['username_siswa'] ?>" ?>
                    <div class="invalid-feedback">
                        <?= session('errors.username_siswa'); ?>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="password_siswa" class="form-label fw-semibold"> Password Siswa </label>
                    <input type="password" name="password_siswa" id="password_siswa" class="form-control text-black <?= (session('errors.password_siswa')) ? 'is-invalid' : null ?>" autofocus value="<?= (old('password_siswa')) ? old('password_siswa') : $rplb['password_siswa'] ?>" ?>
                    <div class="invalid-feedback">
                        <?= session('errors.password_siswa'); ?>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="nama_siswa" class="form-label fw-semibold"> Nama Siswa </label>
                    <input type="text" name="nama_siswa" id="nama_siswa" class="form-control text-black <?= (session('errors.nama_siswa')) ? 'is-invalid' : null ?>" autofocus value="<?= (old('nama_siswa')) ? old('nama_siswa') : $rplb['nama_siswa'] ?>" ?>
                    <div class="invalid-feedback">
                        <?= session('errors.nama_siswa'); ?>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="form-label fw-semibold">Jenis Kelamin Siswa</label>
                    <div>
                        <input type="radio" name="jk_siswa" id="Laki-laki" value="Laki laki" class="<?= (session('errors.jk_siswa')) ? 'is-invalid' : '' ?>">
                        <label for="Laki-laki">Laki-laki</label>
                    </div>
                    <div>
                        <input type="radio" name="jk_siswa" id="Perempuan" value="Perempuan" class="<?= (session('errors.jk_siswa')) ? 'is-invalid' : '' ?>">
                        <label for="Perempuan">Perempuan</label>
                    </div>
                    <?php if (session('errors.jk_siswa')) : ?>
                        <div class="invalid-feedback">
                            <?= session('errors.jk_siswa') ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group row mb-3">
                    <label for="nohp_siswa" class="form-label fw-semibold"> No HP Siswa </label>
                    <input type="text" name="nohp_siswa" id="nohp_siswa" class="form-control text-black <?= (session('errors.nohp_siswa')) ? 'is-invalid' : null ?>" autofocus value="<?= (old('nohp_siswa')) ? old('nohp_siswa') : $rplb['nohp_siswa'] ?>" ?>
                    <div class="invalid-feedback">
                        <?= session('errors.nohp_siswa'); ?>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="alamat_siswa" class="form-label fw-semibold"> Alamat Siswa </label>
                    <input type="text" name="alamat_siswa" id="alamat_siswa" class="form-control text-black <?= (session('errors.alamat_siswa')) ? 'is-invalid' : null ?>" autofocus value="<?= (old('alamat_siswa')) ? old('alamat_siswa') : $rplb['alamat_siswa'] ?>" ?>
                    <div class="invalid-feedback">
                        <?= session('errors.alamat_siswa'); ?>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="foto_siswa" class="form-label fw-semibold"> Foto Siswa </label>
                    <input type="file" name="foto_siswa" id="foto_siswa" class="form-control text-black <?= (session('errors.foto_siswa')) ? 'is-invalid' : null ?>" value="<?= old('foto_siswa'); ?>" onchange="previewImgSiswa()">
                    <div class="invalid-feedback">
                        <?= session('errors.foto_siswa'); ?>
                    </div>
                    <div class="col-sm-2 my-4">
                        <img src="/img/rplb/<?= $rplb['foto_siswa']; ?>" class="img-thumbnail img-preview" srcset="">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <div class="col-12">
                        <button type="submit" value="submit" name="submit" id="submit" class="btn btn-primary w-100">Ubah Data</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>