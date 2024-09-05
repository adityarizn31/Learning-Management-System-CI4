<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<section class="p-4" id="main-content">

    <div class="card shadow shadow-blue-500/50 mb-4 border-2" style="padding: 20px;">
        <div class="container">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Tambah Siswa X RPL B</h4>
            </div>

            <form action="<?= base_url(); ?>/GuruController/savesiswaB" method="post" enctype="multipart/form-data">

                <?= csrf_field(); ?>

                <?php $validation = \Config\Services::validation(); ?>
                <?php if (session()->has('validation')) : ?>
                    <?php $validation = session('validation'); ?>
                <?php endif; ?>

                <!-- NIS Siswa -->
                <div class="form-group row mb-3">
                    <label for="nis_siswa" class="form-label fw-semibold">NIS Siswa</label>
                    <input type="text" name="nis_siswa" id="nis_siswa" autofocus value="<?= old('nis_siswa'); ?>" class="form-control text-black <?= (session('errors.nis_siswa')) ? 'is-invalid' : null ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.nis_siswa') ?>
                    </div>
                </div>

                <!-- Username Siswa -->
                <div class="form-group row mb-3">
                    <label for="username_siswa" class="form-label fw-semibold">Username Siswa</label>
                    <input type="text" name="username_siswa" id="username_siswa" value="<?= old('username_siswa'); ?>" class="form-control text-black <?= (session('errors.username_siswa')) ? 'is-invalid' : null ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.username_siswa') ?>
                    </div>
                </div>

                <!-- Password Siswa -->
                <div class="form-group row mb-3">
                    <label for="password_siswa" class="form-label fw-semibold">Password Siswa</label>
                    <input type="password" name="password_siswa" id="password_siswa" value="<?= old('password_siswa'); ?>" class="form-control text-black <?= (session('errors.password_siswa')) ? 'is-invalid' : null ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.password_siswa') ?>
                    </div>
                </div>

                <!-- Nama Siswa -->
                <div class="form-group row mb-3">
                    <label for="nama_siswa" class="form-label fw-semibold">Nama Siswa</label>
                    <input type="text" name="nama_siswa" id="nama_siswa" value="<?= old('nama_siswa'); ?>" class="form-control text-black <?= (session('errors.nama_siswa')) ? 'is-invalid' : null ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.nama_siswa') ?>
                    </div>
                </div>

                <!-- Jenis Kelamin Siswa -->
                <div class="form-group col mb-3">
                    <label class="form-label fw-semibold">Jenis Kelamin Siswa </label>
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

                <!-- Kelas Siswa -->
                <div class="form-group row mb-3">
                    <label for="kelas_siswa" class="form-label fw-semibold">Kelas Siswa</label>
                    <input name="kelas_siswa" id="kelas_siswa" class="form-control" disabled placeholder="A">
                </div>

                <!-- No Hp Siswa -->
                <div class="form-group row mb-3">
                    <label for="nohp_siswa" class="form-label fw-semibold">Nomor HP/WA</label>
                    <input type="text" name="nohp_siswa" id="nohp_siswa" value="<?= old('nohp_siswa'); ?>" class="form-control text-black <?= (session('errors.nohp_siswa')) ? 'is-invalid' : null ?>">
                    <div class="invalid-feedback">
                        <?= session('errors.nohp_siswa') ?>
                    </div>
                </div>

                <!-- Alamat Siswa -->
                <div class="form-group row mb-3">
                    <label for="alamat_siswa" class="form-label fw-semibold">Alamat Siswa</label>
                    <textarea name="alamat_siswa" id="alamat_siswa" class="form-control text-black text-area <?= (session('errors.alamat_siswa')) ? 'is-invalid' : null ?>"><?= old('alamat_siswa'); ?></textarea>
                    <div class="invalid-feedback">
                        <?= session('errors.alamat_siswa') ?>
                    </div>
                </div>

                <!-- Jurusan Siswa -->
                <div class="form-group row mb-3">
                    <label for="jurusan_siswa" class="form-label fw-semibold">Jurusan Siswa</label>
                    <input name="jurusan_siswa" id="jurusan_siswa" class="form-control" disabled placeholder="Rekayasa Perangkat Lunak">
                </div>

                <!-- Foto Siswa -->
                <div class="form-group row mb-3">
                    <label for="foto_siswa" class="form-label fw-semibold">Foto Siswa</label>
                    <input type="file" name="foto_siswa" id="foto_siswa" class="form-control text-black <?= (session('errors.foto_siswa')) ? 'is-invalid' : ''; ?>" value="<?= old('foto_siswa'); ?>" onchange="previewImgSiswa()">
                    <div class="invalid-feedback">
                        <?= session('errors.foto_siswa') ?>
                    </div>
                    <div class="col-sm-2 my-4">
                        <img src="/img/default/face.PNG" class="img-thumbnail img-preview">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <div class="col-12">
                        <button type="submit" value="submit" name="submit" id="submit" class="btn btn-primary w-100">Tambah</button>
                    </div>
                </div>

            </form>

        </div>

    </div>

</section>

<?= $this->endSection('content'); ?>