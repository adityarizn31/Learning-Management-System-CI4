<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <div class="card shadow mb-4 border-2" style="margin-top: 25px; padding: 20px;">
        <div class="container">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary"> Edit Data Guru </h3>
            </div>

            <form action="<?= base_url() ?>AdminController/updateGuru/<?= $guru['id']; ?>" method="post" enctype="multipart/form-data">

                <?= csrf_field(); ?>

                <?php $validation = \Config\Services::validation(); ?>
                <?php if (session()->has('validation')) : ?>
                    <?php $validation = session('validation'); ?>
                <?php endif; ?>

                <input type="hidden" name="fotolama" value="<?= $guru['foto_guru']; ?>">

                <div class="form-group row mb-3">
                    <label for="username_guru" class="form-label fw-semibold"> Username Guru </label>
                    <input type="text" name="username_guru" id="username_guru" class="form-control text-black <?= (session('errors.username_guru')) ? 'is-invalid' : null ?>" autofocus value="<?= (old('username_guru')) ? old('username_guru') : $guru['username_guru'] ?>" ?>
                    <div class="invalid-feedback">
                        <?= session('errors.username_guru'); ?>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="password_guru" class="form-label fw-semibold"> Password Guru </label>
                    <input type="text" name="password_guru" id="password_guru" class="form-control text-black <?= (session('errors.password_guru')) ? 'is-invalid' : null ?>" autofocus value="<?= (old('password_guru')) ? old('password_guru') : $guru['password_guru'] ?>" ?>
                    <div class="invalid-feedback">
                        <?= session('errors.password_guru'); ?>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="nip_guru" class="form-label fw-semibold"> NIP Guru </label>
                    <input type="text" name="nip_guru" id="nip_guru" class="form-control text-black <?= (session('errors.nip_guru')) ? 'is-invalid' : null ?>" autofocus value="<?= (old('nip_guru')) ? old('nip_guru') : $guru['nip_guru'] ?>" ?>
                    <div class="invalid-feedback">
                        <?= session('errors.nip_guru'); ?>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="nama_guru" class="form-label fw-semibold"> Nama Guru </label>
                    <input type="text" name="nama_guru" id="nama_guru" class="form-control text-black <?= (session('errors.nama_guru')) ? 'is-invalid' : null ?>" autofocus value="<?= (old('nama_guru')) ? old('nama_guru') : $guru['nama_guru'] ?>" ?>
                    <div class="invalid-feedback">
                        <?= session('errors.nama_guru'); ?>
                    </div>
                </div>

                <div class="form-group col mb-3">
                    <label class="form-label fw-semibold">Jenis Kelamin Guru</label>
                    <div>
                        <input type="radio" name="jk_guru" id="Laki-laki" value="Laki laki" class="<?= (session('errors.jk_guru')) ? 'is-invalid' : '' ?>">
                        <label for="Laki-laki">Laki-laki</label>
                    </div>
                    <div>
                        <input type="radio" name="jk_guru" id="Perempuan" value="Perempuan" class="<?= (session('errors.jk_guru')) ? 'is-invalid' : '' ?>">
                        <label for="Perempuan">Perempuan</label>
                    </div>
                    <?php if (session('errors.jk_guru')) : ?>
                        <div class="invalid-feedback">
                            <?= session('errors.jk_guru') ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group row mb-3">
                    <label for="alamat_guru" class="form-label fw-semibold"> Alamat Guru </label>
                    <input type="text" name="alamat_guru" id="alamat_guru" class="form-control text-black <?= (session('errors.alamat_guru')) ? 'is-invalid' : null ?>" autofocus value="<?= (old('alamat_guru')) ? old('alamat_guru') : $guru['alamat_guru'] ?>" ?>
                    <div class="invalid-feedback">
                        <?= session('errors.alamat_guru'); ?>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="nohp_guru" class="form-label fw-semibold"> No Hp Guru </label>
                    <input type="text" name="nohp_guru" id="nohp_guru" class="form-control text-black <?= (session('errors.nohp_guru')) ? 'is-invalid' : null ?>" autofocus value="<?= (old('nohp_guru')) ? old('nohp_guru') : $guru['nohp_guru'] ?>" ?>
                    <div class="invalid-feedback">
                        <?= session('errors.nohp_guru'); ?>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="pendidikanterakhir_guru" class="form-label fw-semibold"> Pendidikan Terakhir Guru </label>
                    <input type="text" name="pendidikanterakhir_guru" id="pendidikanterakhir_guru" class="form-control text-black <?= (session('errors.pendidikanterakhir_guru')) ? 'is-invalid' : null ?>" autofocus value="<?= (old('pendidikanterakhir_guru')) ? old('pendidikanterakhir_guru') : $guru['pendidikanterakhir_guru'] ?>" ?>
                    <div class="invalid-feedback">
                        <?= session('errors.pendidikanterakhir_guru'); ?>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="foto_guru" class="form-label fw-semibold"> Foto Guru </label>
                    <input type="file" name="foto_guru" id="foto_guru" class="form-control text-black <?= (session('errors.foto_guru')) ? 'is-invalid' : null ?>" value="<?= old('foto_guru'); ?>" onchange="previewImgGuru()">
                    <div class="invalid-feedback">
                        <?= session('errors.foto_guru'); ?>
                    </div>
                    <div class="col-sm-2 my-4">
                        <img src="/img/guru/<?= $guru['foto_guru']; ?>" class="img-thumbnail img-preview" srcset="">
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