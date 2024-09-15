<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<section class="p-4">

    <div class="card shadow border-2 border-primary">

        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between" style="padding-top: 10px;">
                <h3 class="m-0 font-weight-bold text-primary"> Edit Survey RPL A Keterampilan Algoritma Pemrograman </h3>
            </div>
        </div>

        <div class="container mt-4">
            <div class="row">
                <div class="col">
                    <?php
                    if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="card-body">

            <form action="<?= base_url() ?>AdminController/updateKeterampilanAlpro/" method="post" enctype="multipart/form-data">

                <?= csrf_field(); ?>

                <?php $validation = \Config\Services::validation(); ?>
                <?php if (session()->has('validation')) : ?>
                    <?php $validation = session('validation'); ?>
                <?php endif; ?>

                <div class="form-group row mb-3">
                    <label for="pertanyaan1" class="form-label fw-semibold"> Pertanyaan 1 </label>
                    <input type="text" name="pertanyaan1" id="pertanyaan1" class="form-control text-black <?= (session('errors.pertanyaan1')) ? 'is-invalid' : null ?>" autofocus value="<?= (old('pertanyaan1')) ? old('pertanyaan1') : (isset($surveyketerampilan['pertanyaan1']) ? $surveyketerampilan['pertanyaan1'] : '') ?>" ?>
                    <div class="invalid-feedback">
                        <?= session('errors.pertanyaan1'); ?>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="pertanyaan2" class="form-label fw-semibold"> Pertanyaan 2 </label>
                    <input type="text" name="pertanyaan2" id="pertanyaan2" class="form-control text-black <?= (session('errors.pertanyaan2')) ? 'is-invalid' : null ?>" value="<?= (old('pertanyaan2')) ? old('pertanyaan2') : (isset($surveyketerampilan['pertanyaan2']) ? $surveyketerampilan['pertanyaan2'] : '') ?>" ?>
                    <div class="invalid-feedback">
                        <?= session('errors.pertanyaan2'); ?>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="pertanyaan3" class="form-label fw-semibold"> Pertanyaan 3 </label>
                    <input type="text" name="pertanyaan3" id="pertanyaan3" class="form-control text-black <?= (session('errors.pertanyaan3')) ? 'is-invalid' : null ?>" value="<?= (old('pertanyaan3')) ? old('pertanyaan3') : (isset($surveyketerampilan['pertanyaan3']) ? $surveyketerampilan['pertanyaan3'] : '') ?>" ?>
                    <div class="invalid-feedback">
                        <?= session('errors.pertanyaan3'); ?>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="pertanyaan4" class="form-label fw-semibold"> Pertanyaan 4 </label>
                    <input type="text" name="pertanyaan4" id="pertanyaan4" class="form-control text-black <?= (session('errors.pertanyaan4')) ? 'is-invalid' : null ?>" value="<?= (old('pertanyaan4')) ? old('pertanyaan4') : (isset($surveyketerampilan['pertanyaan4']) ? $surveyketerampilan['pertanyaan4'] : '') ?>" ?>
                    <div class="invalid-feedback">
                        <?= session('errors.pertanyaan4'); ?>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="pertanyaan5" class="form-label fw-semibold"> Pertanyaan 5 </label>
                    <input type="text" name="pertanyaan5" id="pertanyaan5" class="form-control text-black <?= (session('errors.pertanyaan5')) ? 'is-invalid' : null ?>" value="<?= (old('pertanyaan5')) ? old('pertanyaan5') : (isset($surveyketerampilan['pertanyaan5']) ? $surveyketerampilan['pertanyaan5'] : '') ?>" ?>
                    <div class="invalid-feedback">
                        <?= session('errors.pertanyaan5'); ?>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <div class="col-12">
                        <button type="submit" value="submit" name="submit" id="submit" class="btn btn-primary w-100">Ubah Survey Keterampilan</button>
                    </div>
                </div>

            </form>

        </div>

    </div>

</section>

<?= $this->endSection('content'); ?>