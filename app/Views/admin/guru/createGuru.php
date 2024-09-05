<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

  <div class="card shadow mb-4 border-2" style="margin-top: 25px; padding: 20px;">

    <div class="card-header py-3">
      <div class="d-sm-flex align-items-center justify-content-between" style="padding-top: 10px;"></div>
      <h4 class="m-0 font-weight-bold text-primary">Buat Akun Guru</h4>
    </div>

    <form action="<?= base_url(); ?>AdminController/saveGuru" method="post" enctype="multipart/form-data">

      <div class="card-body">
        <div class="row">

          <!-- Username Guru -->
          <div class="col-sm-6">
            <div class="form-group">
              <label for="username" class="form-label fw-semibold">Username Guru</label>
              <input type="text" name="username_guru" id="username_guru" autofocus value="<?= old('username_guru'); ?>" class="form-control text-black <?= (session('errors.username_guru')) ? 'is-invalid' : null ?>">
              <div class="invalid-feedback">
                <?= session('errors.username_guru') ?>
              </div>
            </div>
          </div>

          <!-- Password Guru -->
          <div class="col-sm-6">
            <div class="form-group">
              <label for="password" class="form-label fw-semibold">Password Guru</label>
              <input type="password" name="password_guru" id="password_guru" autofocus value="<?= old('password_guru'); ?>" class="form-control text-black <?= (session('errors.password_guru')) ? 'is-invalid' : null ?>">
              <div class="invalid-feedback">
                <?= session('errors.password_guru') ?>
              </div>
            </div>
          </div>

          <!-- NIP Guru -->
          <div class="col-sm-6">
            <div class="form-group">
              <label for="nip_guru" class="form-label fw-semibold">NIP Guru</label>
              <input type="text" name="nip_guru" id="nip_guru" autofocus value="<?= old('nip_guru'); ?>" class="form-control text-black <?= (session('errors.nip_guru')) ? 'is-invalid' : null ?>">
              <div class="invalid-feedback">
                <?= session('errors.nip_guru') ?>
              </div>
            </div>
          </div>

          <!-- Nama Guru -->
          <div class="col-sm-6">
            <div class="form-group">
              <label for="nama_guru" class="form-label fw-semibold">Nama Guru</label>
              <input type="text" name="nama_guru" id="nama_guru" autofocus value="<?= old('nama_guru'); ?>" class="form-control text-black <?= (session('errors.nama_guru')) ? 'is-invalid' : null ?>">
              <div class="invalid-feedback">
                <?= session('errors.nama_guru') ?>
              </div>
            </div>
          </div>

          <!-- Jenis Kelamin Siswa -->
          <div class="col-sm-6">
            <div class="mb-3">
              <label class="form-label fw-semibold">Jenis Kelamin Siswa</label>
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
          </div>

          <!-- Alamat Guru -->
          <div class="col-sm-6">
            <div class="form-group">
              <label for="alamat_guru" class="form-label fw-semibold">Alamat Guru</label>
              <input type="text" name="alamat_guru" id="alamat_guru" autofocus value="<?= old('alamat_guru'); ?>" class="form-control text-black <?= (session('errors.alamat_guru')) ? 'is-invalid' : null ?>">
              <div class="invalid-feedback">
                <?= session('errors.alamat_guru') ?>
              </div>
            </div>
          </div>

          <!-- No Hp Guru -->
          <div class="col-sm-6">
            <div class="form-group">
              <label for="nohp_guru" class="form-label fw-semibold">No Hp Guru</label>
              <input type="text" name="nohp_guru" id="nohp_guru" autofocus value="<?= old('nohp_guru'); ?>" class="form-control text-black <?= (session('errors.nohp_guru')) ? 'is-invalid' : null ?>">
              <div class="invalid-feedback">
                <?= session('errors.nohp_guru') ?>
              </div>
            </div>
          </div>

          <!-- Pendidikan Terakhir Guru -->
          <div class="col-sm-6">
            <div class="form-group">
              <label for="pendidikanterakhir_guru" class="form-label fw-semibold">Pendidikan Terakhir Guru</label>
              <input type="text" name="pendidikanterakhir_guru" id="pendidikanterakhir_guru" autofocus value="<?= old('pendidikanterakhir_guru'); ?>" class="form-control text-black <?= (session('errors.pendidikanterakhir_guru')) ? 'is-invalid' : null ?>">
              <div class="invalid-feedback">
                <?= session('errors.pendidikanterakhir_guru') ?>
              </div>
            </div>
          </div>

          <!-- Foto Siswa -->
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="foto_guru" class="form-label fw-semibold">Foto Guru</label>
              <input type="file" name="foto_guru" id="foto_guru" class="form-control text-black <?= (session('errors.foto_guru')) ? 'is-invalid' : ''; ?>" value="<?= old('foto_guru'); ?>" onchange="previewImgGuru()">
              <div class="invalid-feedback">
                <?= session('errors.foto_guru') ?>
              </div>
              <div class="col-sm-2 my-4">
                <img src="/img/default/face.PNG" class="img-thumbnail img-preview">
              </div>
            </div>
          </div>

          <!-- Button Create -->
          <div class="col-sm-12">
            <div class="row">
              <button type="submit" class="btn btn-primary btn-user btn-block">
                Tambah Data Guru
              </button>
            </div>
          </div>

        </div>

    </form>
  </div>
</div>

<?= $this->endSection('content'); ?>