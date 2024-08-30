<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

  <div class="card shadow mb-4 border-2" style="margin-top: 25px;">

    <div class="card-header py-3 border-0">
      <h5 class="m-0 font-weight-bold text-primary"> Detail Mata Pelajaran </h5>
    </div>

    <div class="container">
      <div class="row">
        <div class="col">

          <div class="card mb-3 mt-3">
            <center>
              <img class="mt-3" src="/img/rpla/<?= $rpla['foto_siswa']; ?>" alt="Foto Siswa" style="width: 25%;">
            </center>
            <div class="card-body mt-2 mx-4">
              <div class="row">

                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="username" class="form-label fw-semibold">NIS Siswa</label>
                    <p class="card-text"><?= $rpla['nis_siswa']; ?></p>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="username" class="form-label fw-semibold">Nama Siswa</label>
                    <p class="card-text"><?= $rpla['nama_siswa']; ?></p>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="username" class="form-label fw-semibold">Username Siswa</label>
                    <p class="card-text"><?= $rpla['username_siswa']; ?></p>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="username" class="form-label fw-semibold">Password Siswa</label>
                    <p class="card-text"><?= $rpla['password_siswa']; ?></p>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="username" class="form-label fw-semibold">Kelas Siswa</label>
                    <p class="card-text"><?= $rpla['kelas_siswa']; ?></p>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="username" class="form-label fw-semibold">Jenis Kelamin Siswa</label>
                    <p class="card-text"><?= $rpla['jk_siswa']; ?></p>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="username" class="form-label fw-semibold">No HP/WA Siswa</label>
                    <p class="card-text"><?= $rpla['nohp_siswa']; ?></p>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="username" class="form-label fw-semibold">Alamat Siswa</label>
                    <p class="card-text"><?= $rpla['alamat_siswa']; ?></p>
                  </div>
                </div>

              </div>
            </div>
          </div>

          <div class="card mb-3 mt-3">
            <table class="table table-fixed table-hover">

              <thead class="table-dark">
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">No</th>
                  <th scope="col">No</th>
                  <th scope="col">No</th>
                  <th scope="col">No</th>
                </tr>
              </thead>

            </table>
          </div>

          <div class="container mb-3 align-items-center">
            <div class="row">
              <a href="" class="btn btn-warning">Edit</a>
              <a href="" class="btn btn-danger mt-2">Delete</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

</div>

<?= $this->endSection('content'); ?>