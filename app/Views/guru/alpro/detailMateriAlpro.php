<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="p-4">

    <button class="btn btn-primary" id="button-toggle">
        <i class="bi bi-list"></i>
    </button>

    <div class="card shadow mb-2 border-2 border-primary" style="margin-top: 25px;">

        <div class="card-header py-3 border-0">
            <h5 class="m-0 font-weight-bold text-primary"> Materi Algoritma Pemrograman </h5>
        </div>

        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="card mb-3 mt-3 border-1 border-primary">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="username" class="form-label fw-semibold"> Pertemuan </label>
                                <p class="card-text"><?= $materi_alpro['id']; ?></p>
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

                    <div class="container mb-3 align-items-center">
                        <div class="row">

                            <a href="/GuruController/editMateriAlpro/<?= $materi_alpro['slug']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/GuruController/deleteMateriAlpro/<?= $materi_alpro['id']; ?>" method="post" class="d-inline btn btn-danger mt-2">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin ingin dihapus ?? ');">Delete</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>

<?= $this->endSection('content'); ?>