<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="p-4" id="main-content">

    <button class="btn btn-primary" id="button-toggle">
        <i class="bi bi-list"></i>
    </button>

    <div class="card shadow shadow-blue-500/50 mb-4 border-2" style="margin-top: 25px; padding: 20px;">
        <div class="container">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Tambah Siswa XI RPL C</h4>
            </div>

            <?php if (session()->getFlashdata('pesan')) : ?>

                <div id="myModal" class="modal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fw-semibold"> Pendaftaran Siswa RPL A </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Selamat Pendaftaran Permohonan Kartu Keluarga Anda Telah Berhasil !!</p>
                                <p>Mohon untuk menunggu, Pemrosesan selama 1x24 Jam dan akan dikirim melalui Email / Whatsapp yang telah dicantumkan</p>
                                <p>Untuk Info lebih lanjut Si Lancar 1: </p>
                                <p><i class="fa fa-whatsapp"> 0811 1112 3370 </i></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>

                    </div>
                </div>

                <script>
                    var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
                        keyboard: false
                    });
                    myModal.show();
                </script>

            <?php endif; ?>

            <form action="/AdminController/saveRPLC" method="post" enctype="multipart/form-data">

                <?= csrf_field(); ?>

                <?php $validation = \Config\Services::validation(); ?>
                <?php if (session()->has('validation')) : ?>
                    <?php $validation = session('validation'); ?>
                <?php endif; ?>

                <!-- NIS Siswa -->
                <div class="row">
                    <div class="mb-3">
                        <label for="nis_siswa" class="form-label fw-semibold">NIS Siswa</label>
                        <input type="text" name="nis_siswa" id="nis_siswa" autofocus value="<?= old('nis_siswa'); ?>" class="form-control text-black <?= (session('errors.nis_siswa')) ? 'is-invalid' : null ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.nis_siswa') ?>
                        </div>
                    </div>
                </div>

                <!-- Username Siswa -->
                <div class="row">
                    <div class="mb-3">
                        <label for="username_siswa" class="form-label fw-semibold">Username Siswa</label>
                        <input type="text" name="username_siswa" id="username_siswa" value="<?= old('username_siswa'); ?>" class="form-control text-black <?= (session('errors.username_siswa')) ? 'is-invalid' : null ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.username_siswa') ?>
                        </div>
                    </div>
                </div>

                <!-- Password Siswa -->
                <div class="row">
                    <div class="mb-3">
                        <label for="password_siswa" class="form-label fw-semibold">Password Siswa</label>
                        <input type="text" name="password_siswa" id="password_siswa" value="<?= old('password_siswa'); ?>" class="form-control text-black <?= (session('errors.password_siswa')) ? 'is-invalid' : null ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.password_siswa') ?>
                        </div>
                    </div>
                </div>

                <!-- Nama Siswa -->
                <div class="row">
                    <div class="mb-3">
                        <label for="nama_siswa" class="form-label fw-semibold">Nama Siswa</label>
                        <input type="text" name="nama_siswa" id="nama_siswa" value="<?= old('nama_siswa'); ?>" class="form-control text-black <?= (session('errors.nama_siswa')) ? 'is-invalid' : null ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.nama_siswa') ?>
                        </div>
                    </div>
                </div>

                <!-- Jenis Kelamin Siswa -->
                <div class="row">
                    <div class="mb-3">
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
                </div>


                <!-- Kelas Siswa -->
                <div class="row">
                    <div class="mb-3">
                        <label for="kelas_siswa" class="form-label fw-semibold">Kelas Siswa</label>
                        <input name="kelas_siswa" id="kelas_siswa" class="form-control" disabled placeholder="C">
                    </div>
                </div>

                <!-- No Hp Siswa -->
                <div class="row">
                    <div class="mb-3">
                        <label for="nohp_siswa" class="form-label fw-semibold">Nomor HP/WA</label>
                        <input type="text" name="nohp_siswa" id="nohp_siswa" value="<?= old('nohp_siswa'); ?>" class="form-control text-black <?= (session('errors.nohp_siswa')) ? 'is-invalid' : null ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.nohp_siswa') ?>
                        </div>
                    </div>
                </div>

                <!-- Alamat Siswa -->
                <div class="row">
                    <div class="mb-3">
                        <label for="alamat_siswa" class="form-label fw-semibold">Alamat Siswa</label>
                        <textarea name="alamat_siswa" id="alamat_siswa" class="form-control text-black text-area <?= (session('errors.alamat_siswa')) ? 'is-invalid' : null ?>"><?= old('alamat_siswa'); ?></textarea>
                        <div class="invalid-feedback">
                            <?= session('errors.alamat_siswa') ?>
                        </div>
                    </div>
                </div>

                <!-- Jurusan Siswa -->
                <div class="row">
                    <div class="mb-3">
                        <label for="jurusan_siswa" class="form-label fw-semibold">Jurusan Siswa</label>
                        <input name="jurusan_siswa" id="jurusan_siswa" class="form-control" disabled placeholder="Rekayasa Perangkat Lunak">
                    </div>
                </div>

                <!-- Foto Siswa -->
                <div class="row">
                    <div class="mb-3">
                        <label for="foto_siswa" class="form-label fw-semibold">Foto Siswa</label>
                        <input type="file" name="foto_siswa" id="foto_siswa" class="form-control text-black <?= (session('errors.foto_siswa')) ? 'is-invalid' : ''; ?>" value="<?= old('foto_siswa'); ?>" onchange="previewImgSiswa()">
                        <div class="invalid-feedback">
                            <?= session('errors.foto_siswa') ?>
                        </div>
                        <div class="col-sm-2 my-4">
                            <img src="/img/default/face.PNG" class="img-thumbnail img-preview">
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" value="submit" name="submit" id="submit" class="btn btn-primary">Tambah</button>
                    <!-- <button type="submit" value="submit" name="submit" id="submitModal" class="btn btn-primary btn-sm">Daftar</button> -->
                </div>

                <div class="modal fade" id="modalPendaftaran" tabindex="-1" aria-labelledby="modalPendaftaranLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fw-semibold" id="modalPendaftaranLabel">Data Baru Siswa RPL A</h5>
                                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div id="dataPendaftaranSementara"></div>

                            </div>
                            <div class="modal-footer">
                                <p>Mohon cek kembali Data Siswa Baru. <b>Apakah Anda sudah yakin dengan data di atas ??</b></p>
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" value="submit" name="submit" id="submitModal" class="btn btn-primary btn-sm">Daftar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function validasiData() {
                        var nis_siswa = document.getElementById('nis_siswa').value;
                        var username_siswa = document.getElementById('username_siswa').value;
                        var password_siswa = document.getElementById('password_siswa').value;
                        var nama_siswa = document.getElementById('nama_siswa').value;
                        var jk_siswa = document.getElementById('jk_siswa').value;
                        // var kelas_siswa = document.getElementById('kelas_siswa').value;
                        var nohp_siswa = document.getElementById('nohp_siswa').value;
                        var alamat_siswa = document.getElementById('alamat_siswa').value;
                        // var jurusan_siswa = document.getElementById('jurusan_siswa').value;
                        var foto_siswa = document.getElementById('foto_siswa').value;

                        if (nis_siswa === '' || username_siswa === '' || password_siswa === '' || nama_siswa === '' || jk_siswa === '' || nohp_siswa === '' || alamat_siswa === '' || foto_siswa === '') {
                            alert('Mohon untuk melengkapi semua persyaratan pendaftaran !');
                        } else {
                            tampilkanDataPendaftaran();
                            $('#modalPendaftaran').modal('show');
                        }
                        // kelas_siswa === '' ||
                        // jurusan_siswa === '' ||
                    }

                    function tampilkanDataPendaftaran() {
                        var nis_siswa = document.getElementById('nis_siswa').value;
                        var username_siswa = document.getElementById('username_siswa').value;
                        var password_siswa = document.getElementById('password_siswa').value;
                        var nama_siswa = document.getElementById('nama_siswa').value;
                        var jk_siswa = document.getElementById('jk_siswa').value;
                        // var kelas_siswa = document.getElementById('kelas_siswa').value;
                        var nohp_siswa = document.getElementById('nohp_siswa').value;
                        var alamat_siswa = document.getElementById('alamat_siswa').value;
                        // var jurusan_siswa = document.getElementById('jurusan_siswa').value;
                        var foto_siswa = document.getElementById('foto_siswa').value;

                        var html = '<p><b>NIS Siswa:</b> ' + nis_siswa + '</p>' +
                            '<p><b>Username Siswa:</b> ' + username_siswa + '</p>' +
                            '<p><b>Password Siswa</b>: ' + password_siswa + '</p>' +
                            '<p><b>Nama Siswa:</b> ' + nama_siswa + '</p>' +
                            '<p><b>Jenis Kelamin Siswa:</b> ' + jk_siswa + '</p>' +
                            '<p><b>Kelas Siswa:</b> ' + kelas_siswa + '</p>' +
                            '<p><b>No HP Siswa:</b> ' + nohp_siswa + '</p>' +
                            '<p><b>Alamat Siswa:</b> ' + alamat_siswa + '</p>' +
                            '<p><b>Jurusan Siswa:</b> ' + jurusan_siswa + '</p>' +
                            '<p><b>Foto Siswa:</b> ' + foto_siswa + '</p>';

                        document.getElementById('dataPendaftaranSementara').innerHTML = html;
                    }
                </script>

            </form>

        </div>
    </div>

</section>

<?= $this->endSection('content'); ?>