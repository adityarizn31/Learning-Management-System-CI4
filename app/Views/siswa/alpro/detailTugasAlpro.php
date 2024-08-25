<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="p-4">

    <button class="btn btn-primary" id="button-toggle">
        <i class="bi bi-list"></i>
    </button>

    <div class="card shadow mb-2 border-2 border-primary" style="margin-top: 25px;">

        <div class="card-header py-3 border-0">
            <h5 class="m-0 font-weight-bold text-primary"> Tugas Algoritma Pemrograman </h5>
        </div>

        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="card mb-3 mt-3 border-1 border-primary">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="username" class="form-label fw-semibold"> Judul Tugas Algoritma Pemrograman </label>
                                <p class="card-text"><?= $tugas_alpro['judultugas_alpro']; ?></p>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="username" class="form-label fw-semibold"> Deskripsi Tugas Alpro </label>
                                <p class="card-text"><?= $tugas_alpro['deskripsitugas_alpro']; ?></p>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="username" class="form-label fw-semibold"> Batas Waktu Pengumpulan </label>
                                <p class="card-text"><?= $tugas_alpro['bataswaktu_alpro']; ?></p>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12" style="padding: 20px;">
                            <div class="card border-1 border-primary">

                                <div class="card-header">
                                    <div class="card-title text-black fw-semibold"> Berkas Tugas <?= $tugas_alpro['id']; ?> </div>
                                </div>

                                <div class="col-sm-12">
                                    <iframe src="<?= base_url('/dokumen/tugasAlpro/' . $tugas_alpro['filetugas_alpro']) ?>" frameborder="0" height="500" width="100%"></iframe>
                                </div>

                            </div>
                        </div>

                        <!-- Form Pengumpulan Tugas -->
                        <div class="col-sm-12">
                            <div class="card border-1 border-primary mt-4 mb-3">
                                <div class="card-header">
                                    <div class="card-title text-black fw-semibold"> Unggah Tugas Anda </div>
                                </div>
                                <div class="card-body">
                                    <form action="<?= base_url('/tugasAlpro/upload/' . $tugas_alpro['id']) ?>" method="post" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="filetugas" class="form-label fw-semibold">Pilih Berkas Tugas (PDF, DOCX, dll)</label>
                                            <input type="file" class="form-control" id="filetugas" name="filetugas" required>
                                        </div>
                                        <button type="submit" class="btn btn-success">Unggah Tugas</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Form Pengumpulan Tugas -->

                    </div>

                </div>
            </div>
        </div>
    </div>

</section>

<?= $this->endSection('content'); ?>