<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

  <div class="card shadow mb-4 border-2" style="margin-top: 25px;">

    <div class="card-header py-3 border-0 d-flex justify-content-between align-items-center">
      <h5 class="m-0 font-weight-bold text-primary">Detail Mata Pelajaran</h5>
      <div>
        <a href="<?= base_url() ?>AdminController/editMataPelajaran/<?= $matapelajaran['slug']; ?>" class="btn btn-warning btn-sm">
          <i class="fas fa-edit"></i> Edit
        </a>

        <form action="<?= base_url() ?>AdminController/deleteMataPelajaran/<?= $matapelajaran['id']; ?>" method="post" class="d-inline">
          <?= csrf_field(); ?>
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapusnya?');">
            <i class="fas fa-trash-alt"></i> Delete
          </button>
        </form>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col">

          <div class="card mb-3 mt-3 border-primary">
            <center>
              <img class="mt-3" src="/img/matapelajaran/<?= $matapelajaran['fotoguru_matapelajaran']; ?>" alt="Foto Siswa" style="width: 25%;">
            </center>
            <div class="card-body mt-2 mx-4">
              <div class="row">

                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="username" class="form-label fw-semibold">Nama Mata Pelajaran</label>
                    <p class="card-text"><?= $matapelajaran['nama_matapelajaran']; ?></p>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="username" class="form-label fw-semibold">Guru Mata Pelajaran</label>
                    <p class="card-text"><?= $matapelajaran['guru_matapelajaran']; ?></p>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="username" class="form-label fw-semibold">Jam Mata Pelajaran</label>
                    <p class="card-text"><?= $matapelajaran['jam_matapelajaran']; ?></p>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="username" class="form-label fw-semibold">Kelas Mata Pelajaran</label>
                    <p class="card-text"><?= $matapelajaran['kelas_matapelajaran']; ?></p>
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

<?= $this->endSection('content'); ?>