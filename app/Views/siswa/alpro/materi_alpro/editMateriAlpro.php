<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <div class="card shadow mb-4 border-2 border-primary border-1">
        <div class="container">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary"> Edit Materi Algoritma Pemrograman </h3>
            </div>

            <form action="<?= base_url() ?>GuruController/updateMateriAlpro/<?= $materi_alpro['id']; ?>" method="post" enctype="multipart/form-data">

                <?= csrf_field(); ?>

                <?php $validation = \Config\Services::validation(); ?>
                <?php if (session()->has('validation')) : ?>
                    <?php $validation = session('validation'); ?>
                <?php endif; ?>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama_materi" class="form-label fw-semibold">Nama Materi Algoritma Pemrograman</label>
                        <input type="text" name="nama_materi" id="nama_materi" class="form-control text-black <?= (session('errors.nama_materi')) ? 'is-invalid' : '' ?>" autofocus value="<?= (old('nama_materi')) ? old('nama_materi') : $materi_alpro['nama_materi'] ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.nama_materi'); ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="deskripsi_materi" class="form-label fw-semibold">Deskripsi Tugas Algoritma Pemrograman</label>
                        <input type="text" name="deskripsi_materi" id="deskripsi_materi" class="form-control text-black <?= (session('errors.deskripsi_materi')) ? 'is-invalid' : '' ?>" value="<?= (old('deskripsi_materi')) ? old('deskripsi_materi') : $materi_alpro['deskripsi_materi'] ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.deskripsi_materi'); ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="dokumen_materi" class="form-label fw-semibold">Dokumen Materi</label>
                        <input type="file" name="dokumen_materi" id="dokumen_materi" class="form-control <?= (session('errors.dokumen_materi')) ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.dokumen_materi'); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <div class="col-12">
                        <button type="submit" value="submit" name="submit" id="submit" class="btn btn-primary w-100">Ubah Materi</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>