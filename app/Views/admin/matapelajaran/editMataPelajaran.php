<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <div class="card shadow mb-4 border-2">
        <div class="container">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary"> Edit Mata Pelajaran </h3>
            </div>

            <form action="<?= base_url() ?>AdminController/updateMataPelajaran/<?= $matapelajaran['id']; ?>" method="post" enctype="multipart/form-data">

                <?= csrf_field(); ?>

                <?php $validation = \Config\Services::validation(); ?>
                <?php if (session()->has('validation')) : ?>
                    <?php $validation = session('validation'); ?>
                <?php endif; ?>

                <input type="hidden" name="fotolama" value="<?= $matapelajaran['fotoguru_matapelajaran']; ?>">

                <div class="form-group row mb-3">
                    <label for="nama_matapelajaran" class="form-label fw-semibold"> Nama Mata Pelajaran </label>
                    <input type="text" name="nama_matapelajaran" id="nama_matapelajaran" class="form-control text-black <?= (session('errors.nama_matapelajaran')) ? 'is-invalid' : null ?>" autofocus value="<?= (old('nama_matapelajaran')) ? old('nama_matapelajaran') : $matapelajaran['nama_matapelajaran'] ?>" ?>
                    <div class="invalid-feedback">
                        <?= session('errors.nama_matapelajaran'); ?>
                    </div>
                </div>


                <div class="form-group row mb-3">
                    <label for="guru_matapelajaran" class="form-label fw-semibold"> Guru Pengampu </label>
                    <input type="text" name="guru_matapelajaran" id="guru_matapelajaran" class="form-control text-black <?= (session('errors.guru_matapelajaran')) ? 'is-invalid' : null ?>" autofocus value="<?= (old('guru_matapelajaran')) ? old('guru_matapelajaran') : $matapelajaran['guru_matapelajaran'] ?>" ?>
                    <div class="invalid-feedback">
                        <?= session('errors.guru_matapelajaran'); ?>
                    </div>
                </div>


                <div class="form-group row mb-3">
                    <label for="jam_matapelajaran" class="form-label fw-semibold"> Jam Belajar </label>
                    <input type="password" name="jam_matapelajaran" id="jam_matapelajaran" class="form-control text-black <?= (session('errors.jam_matapelajaran')) ? 'is-invalid' : null ?>" autofocus value="<?= (old('jam_matapelajaran')) ? old('jam_matapelajaran') : $matapelajaran['jam_matapelajaran'] ?>" ?>
                    <div class="invalid-feedback">
                        <?= session('errors.jam_matapelajaran'); ?>
                    </div>
                </div>


                <div class="form-group row mb-3">
                    <label for="kelas_matapelajaran" class="form-label fw-semibold"> Kelas Pengampu </label>
                    <input type="text" name="kelas_matapelajaran" id="kelas_matapelajaran" class="form-control text-black <?= (session('errors.kelas_matapelajaran')) ? 'is-invalid' : null ?>" autofocus value="<?= (old('kelas_matapelajaran')) ? old('kelas_matapelajaran') : $matapelajaran['kelas_matapelajaran'] ?>" ?>
                    <div class="invalid-feedback">
                        <?= session('errors.kelas_matapelajaran'); ?>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="foto_siswa" class="form-label fw-semibold"> Foto Siswa </label>
                    <input type="file" name="foto_siswa" id="foto_siswa" class="form-control text-black <?= (session('errors.foto_siswa')) ? 'is-invalid' : null ?>" value="<?= old('foto_siswa'); ?>" onchange="previewImgSiswa()">
                    <div class="invalid-feedback">
                        <?= session('errors.foto_siswa'); ?>
                    </div>
                    <div class="col-sm-2 my-4">
                        <img src="/img/rpla/<?= $matapelajaran['foto_siswa']; ?>" class="img-thumbnail img-preview" srcset="">
                    </div>
                </div>

                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" value="submit" name="submit" id="submit" class="btn btn-primary btn-sm"> Ubah Data Siswa </button>
                </div>

            </form>

        </div>
    </div>

</div>

<?= $this->endSection('content'); ?>