    <?= $this->extend('layout/templates'); ?>

    <?= $this->section('content'); ?>

    <div class="container-fluid">

      <div class="card shadow mb-4 border-2">

        <div class="card-header py-3 border-0 d-flex justify-content-between align-items-center">
          <h5 class="m-0 font-weight-bold text-primary">Detail Guru</h5>
          <div>
            <a href="<?= base_url() ?>AdminController/editGuru/<?= $guru['slug']; ?>" class="btn btn-warning btn-sm">
              <i class="fas fa-edit"></i> Edit
            </a>

            <form action="<?= base_url() ?>AdminController/deleteGuru/<?= $guru['id']; ?>" method="post" class="d-inline">
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

              <div class="card mb-3 mt-3">
                <center>
                  <img class="mt-3" src="/img/guru/<?= $guru['foto_guru']; ?>" alt="Foto Guru" style="width: 25%;">
                </center>
                <div class="card-body mt-2 mx-4">
                  <div class="row">

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="username" class="form-label fw-semibold">Username Guru</label>
                        <p class="card-text"><?= $guru['username_guru']; ?></p>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="password_guru" class="form-label fw-semibold">Password Guru</label>
                        <p class="card-text"><?= $guru['password_guru']; ?></p>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="nip_guru" class="form-label fw-semibold">NIP Guru</label>
                        <p class="card-text"><?= $guru['nip_guru']; ?></p>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="nama_guru" class="form-label fw-semibold">Nama Guru</label>
                        <p class="card-text"><?= $guru['nama_guru']; ?></p>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="jk_guru" class="form-label fw-semibold">Jenis Kelamin Guru</label>
                        <p class="card-text"><?= $guru['jk_guru']; ?></p>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="alamat_guru" class="form-label fw-semibold">Alamat Guru</label>
                        <p class="card-text"><?= $guru['alamat_guru']; ?></p>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="nohp_guru" class="form-label fw-semibold">No HP/WA Guru</label>
                        <p class="card-text"><?= $guru['nohp_guru']; ?></p>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="pendidikanterakhir_guru" class="form-label fw-semibold">Pendidikan Terakhir Guru</label>
                        <p class="card-text"><?= $guru['pendidikanterakhir_guru']; ?></p>
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