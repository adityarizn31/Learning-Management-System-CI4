<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid" id="main-content">

    <div class="card shadow mb-2 border-2 border-primary" style="margin-top: 25px;">

        <div class="card-header py-3 border-0 d-flex justify-content-between align-items-center">
            <h5 class="m-0 font-weight-bold text-primary"> Detail Materi Alpro </h5>
            <div>
                <a href="/GuruController/editMateriAlpro/<?= $materi_alpro['slug']; ?>" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i> Edit
                </a>

                <form action="/GuruController/deleteMateriAlpro/<?= $materi_alpro['id']; ?>" method="post" class="d-inline">
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

                    <div class="card mb-3 mt-3 border-1 border-primary">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="username" class="form-label fw-semibold"> Pertemuan </label>
                                <p class="card-text text-black"><?= $materi_alpro['id']; ?></p>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="username" class="form-label fw-semibold"> Nama Materi </label>
                                <p class="card-text"><?= $materi_alpro['nama_materi']; ?></p>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="username" class="form-label fw-semibold"> Deskripsi Singkat Materi </label>
                                <p class="card-text"><?= $materi_alpro['deskripsi_materi']; ?></p>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12" style="padding: 20px;">
                            <div class="card card-outline card-primary">

                                <div class="card-header">
                                    <div class="card-title text-black fw-semibold"> Berkas Materi Pertemuan <?= $materi_alpro['id']; ?> </div>
                                </div>

                                <div class="col-sm-12">
                                    <iframe src="<?= base_url('/dokumen/alpro/' . $materi_alpro['dokumen_materi']) ?>" frameborder="0" height="500" width="100%"></iframe>
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