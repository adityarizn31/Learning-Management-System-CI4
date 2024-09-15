<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<section class="p-4">

    <div class="card shadow border-2 border-primary">

        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between" style="padding-top: 10px;">
                <h3 class="m-0 font-weight-bold text-primary"> Survey RPL A Keterampilan Algoritma Pemrograman </h3>

                <a href="<?= base_url() ?>AdminController/editKeterampilan/" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                    <i class="fas fa-edit me-2"></i> Edit Quiz
                </a>
                <a href="<?= base_url() ?>AdminController/deleteKeterampilan/" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                    <i class="fas fa-trash-alt me-2"></i> Delete Survey
                </a>

            </div>
        </div>

        <div class="container mt-4">
            <div class="row">
                <div class="col">

                    <?php if (session()->getFlashdata('pesan')) : ?>

                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>

                    <?php endif; ?>

                </div>
            </div>
        </div>

        <div class="card-body">
            <?php foreach ($surveyketerampilan as $survey): ?>

                <!-- Pertanyaan 1 -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="username" class="form-label fw-semibold">1. <?= $survey['pertanyaan1']; ?></label>
                    </div>
                </div>

                <!-- Jawaban 1 -->
                <div class="form-group col-md-12 mb-5">
                    <div class="row">
                        <div class="col">
                            <input type="radio" name="jawaban1" id="Sangat_Tidak_Puas" value="Laki laki" class="<?= (session('errors.jawaban1')) ? 'is-invalid' : '' ?>">
                            <label for="Sangat_Tidak_Puas">1</label>
                        </div>
                        <div class="col">
                            <input type="radio" name="jawaban1" id="Tidak_Puas" value="Tidak Puas" class="<?= (session('errors.jawaban1')) ? 'is-invalid' : '' ?>">
                            <label for="Tidak_Puas">2</label>
                        </div>
                        <div class="col">
                            <input type="radio" name="jawaban1" id="Kurang_Puas" value="Kurang Puas" class="<?= (session('errors.jawaban1')) ? 'is-invalid' : '' ?>">
                            <label for="Kurang_Puas">3</label>
                        </div>
                        <div class="col">
                            <input type="radio" name="jawaban1" id="Puas" value="Puas" class="<?= (session('errors.jawaban1')) ? 'is-invalid' : '' ?>">
                            <label for="Puas">4</label>
                        </div>
                        <div class="col">
                            <input type="radio" name="jawaban1" id="Sangat_Puas" value="Sangat Puas" class="<?= (session('errors.jawaban1')) ? 'is-invalid' : '' ?>">
                            <label for="Sangat_Puas">5</label>
                        </div>
                    </div>
                    <?php if (session('errors.jawaban1')) : ?>
                        <div class="invalid-feedback">
                            <?= session('errors.jawaban1') ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Pertanyaan 2 -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="username" class="form-label fw-semibold">2. <?= $survey['pertanyaan2']; ?></label>
                    </div>
                </div>

                <!-- Jawaban 2 -->
                <div class="form-group col-md-12 mb-5">
                    <div class="row">
                        <div class="col">
                            <input type="radio" name="jawaban2" id="Sangat_Tidak_Puas" value="Laki laki" class="<?= (session('errors.jawaban2')) ? 'is-invalid' : '' ?>">
                            <label for="Sangat_Tidak_Puas">1</label>
                        </div>
                        <div class="col">
                            <input type="radio" name="jawaban2" id="Tidak_Puas" value="Tidak Puas" class="<?= (session('errors.jawaban2')) ? 'is-invalid' : '' ?>">
                            <label for="Tidak_Puas">2</label>
                        </div>
                        <div class="col">
                            <input type="radio" name="jawaban2" id="Kurang_Puas" value="Kurang Puas" class="<?= (session('errors.jawaban2')) ? 'is-invalid' : '' ?>">
                            <label for="Kurang_Puas">3</label>
                        </div>
                        <div class="col">
                            <input type="radio" name="jawaban2" id="Puas" value="Puas" class="<?= (session('errors.jawaban2')) ? 'is-invalid' : '' ?>">
                            <label for="Puas">4</label>
                        </div>
                        <div class="col">
                            <input type="radio" name="jawaban2" id="Sangat_Puas" value="Sangat Puas" class="<?= (session('errors.jawaban2')) ? 'is-invalid' : '' ?>">
                            <label for="Sangat_Puas">5</label>
                        </div>
                    </div>
                    <?php if (session('errors.jawaban2')) : ?>
                        <div class="invalid-feedback">
                            <?= session('errors.jawaban2') ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Pertanyaan 3 -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="username" class="form-label fw-semibold">3. <?= $survey['pertanyaan3']; ?></label>
                    </div>
                </div>

                <!-- Jawaban 3 -->
                <div class="form-group col-md-12 mb-5">
                    <div class="row">
                        <div class="col">
                            <input type="radio" name="jawaban3" id="Sangat_Tidak_Puas" value="Laki laki" class="<?= (session('errors.jawaban3')) ? 'is-invalid' : '' ?>">
                            <label for="Sangat_Tidak_Puas">1</label>
                        </div>
                        <div class="col">
                            <input type="radio" name="jawaban3" id="Tidak_Puas" value="Tidak Puas" class="<?= (session('errors.jawaban3')) ? 'is-invalid' : '' ?>">
                            <label for="Tidak_Puas">2</label>
                        </div>
                        <div class="col">
                            <input type="radio" name="jawaban3" id="Kurang_Puas" value="Kurang Puas" class="<?= (session('errors.jawaban3')) ? 'is-invalid' : '' ?>">
                            <label for="Kurang_Puas">3</label>
                        </div>
                        <div class="col">
                            <input type="radio" name="jawaban3" id="Puas" value="Puas" class="<?= (session('errors.jawaban3')) ? 'is-invalid' : '' ?>">
                            <label for="Puas">4</label>
                        </div>
                        <div class="col">
                            <input type="radio" name="jawaban3" id="Sangat_Puas" value="Sangat Puas" class="<?= (session('errors.jawaban3')) ? 'is-invalid' : '' ?>">
                            <label for="Sangat_Puas">5</label>
                        </div>
                    </div>
                    <?php if (session('errors.jawaban3')) : ?>
                        <div class="invalid-feedback">
                            <?= session('errors.jawaban3') ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Pertanyaan 4 -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="username" class="form-label fw-semibold">4. <?= $survey['pertanyaan4']; ?></label>
                    </div>
                </div>

                <!-- Jawaban 4 -->
                <div class="form-group col-md-12 mb-5">
                    <div class="row">
                        <div class="col">
                            <input type="radio" name="jawaban4" id="Sangat_Tidak_Puas" value="Laki laki" class="<?= (session('errors.jawaban4')) ? 'is-invalid' : '' ?>">
                            <label for="Sangat_Tidak_Puas">1</label>
                        </div>
                        <div class="col">
                            <input type="radio" name="jawaban4" id="Tidak_Puas" value="Tidak Puas" class="<?= (session('errors.jawaban4')) ? 'is-invalid' : '' ?>">
                            <label for="Tidak_Puas">2</label>
                        </div>
                        <div class="col">
                            <input type="radio" name="jawaban4" id="Kurang_Puas" value="Kurang Puas" class="<?= (session('errors.jawaban4')) ? 'is-invalid' : '' ?>">
                            <label for="Kurang_Puas">3</label>
                        </div>
                        <div class="col">
                            <input type="radio" name="jawaban4" id="Puas" value="Puas" class="<?= (session('errors.jawaban4')) ? 'is-invalid' : '' ?>">
                            <label for="Puas">4</label>
                        </div>
                        <div class="col">
                            <input type="radio" name="jawaban4" id="Sangat_Puas" value="Sangat Puas" class="<?= (session('errors.jawaban4')) ? 'is-invalid' : '' ?>">
                            <label for="Sangat_Puas">5</label>
                        </div>
                    </div>
                    <?php if (session('errors.jawaban4')) : ?>
                        <div class="invalid-feedback">
                            <?= session('errors.jawaban4') ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Pertanyaan 5 -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="username" class="form-label fw-semibold">5. <?= $survey['pertanyaan5']; ?></label>
                    </div>
                </div>

                <!-- Jawaban 5 -->
                <div class="form-group col-md-12 mb-5">
                    <div class="row">
                        <div class="col">
                            <input type="radio" name="jawaban5" id="Sangat_Tidak_Puas" value="Laki laki" class="<?= (session('errors.jawaban5')) ? 'is-invalid' : '' ?>">
                            <label for="Sangat_Tidak_Puas">1</label>
                        </div>
                        <div class="col">
                            <input type="radio" name="jawaban5" id="Tidak_Puas" value="Tidak Puas" class="<?= (session('errors.jawaban5')) ? 'is-invalid' : '' ?>">
                            <label for="Tidak_Puas">2</label>
                        </div>
                        <div class="col">
                            <input type="radio" name="jawaban5" id="Kurang_Puas" value="Kurang Puas" class="<?= (session('errors.jawaban5')) ? 'is-invalid' : '' ?>">
                            <label for="Kurang_Puas">3</label>
                        </div>
                        <div class="col">
                            <input type="radio" name="jawaban5" id="Puas" value="Puas" class="<?= (session('errors.jawaban5')) ? 'is-invalid' : '' ?>">
                            <label for="Puas">4</label>
                        </div>
                        <div class="col">
                            <input type="radio" name="jawaban5" id="Sangat_Puas" value="Sangat Puas" class="<?= (session('errors.jawaban5')) ? 'is-invalid' : '' ?>">
                            <label for="Sangat_Puas">5</label>
                        </div>
                    </div>
                    <?php if (session('errors.jawaban5')) : ?>
                        <div class="invalid-feedback">
                            <?= session('errors.jawaban5') ?>
                        </div>
                    <?php endif; ?>
                </div>

            <?php endforeach; ?>
        </div>

    </div>

</section>

<?= $this->endSection('content'); ?>