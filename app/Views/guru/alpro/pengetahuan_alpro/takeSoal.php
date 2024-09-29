<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<section class="p-4">

    <div class="card shadow border-2 border-primary">

        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between" style="padding-top: 10px;">
                <h3 class="m-0 font-weight-bold text-primary"> Kerjakan Soal Pilihan Ganda Algoritma Pemrograman </h3>
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

            <!-- Form untuk mengerjakan soal -->
            <form action="<?= base_url('GuruController/submitQuiz') ?>" method="post">

                <?= csrf_field() ?>

                <?php if (!empty($soal)): ?>
                    <?php foreach ($soal as $index => $soal): ?>
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Soal <?= $index + 1 ?>:</h5>
                                <p class="card-text"><?= esc($soal['pertanyaan']) ?></p>

                                <!-- Pilihan jawaban -->
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answers[<?= $soal['id'] ?>]" value="A" id="pilihanA<?= $index ?>" required>
                                    <label class="form-check-label" for="pilihanA<?= $index ?>">
                                        A. <?= esc($soal['pilihan_a']) ?>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answers[<?= $soal['id'] ?>]" value="B" id="pilihanB<?= $index ?>" required>
                                    <label class="form-check-label" for="pilihanB<?= $index ?>">
                                        B. <?= esc($soal['pilihan_b']) ?>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answers[<?= $soal['id'] ?>]" value="C" id="pilihanC<?= $index ?>" required>
                                    <label class="form-check-label" for="pilihanC<?= $index ?>">
                                        C. <?= esc($soal['pilihan_c']) ?>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answers[<?= $soal['id'] ?>]" value="D" id="pilihanD<?= $index ?>" required>
                                    <label class="form-check-label" for="pilihanD<?= $index ?>">
                                        D. <?= esc($soal['pilihan_d']) ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Tombol Submit -->
                    <button type="submit" class="btn btn-primary">Kirim Jawaban</button>
                <?php else: ?>
                    <p class="text-danger">Tidak ada soal yang tersedia saat ini.</p>
                <?php endif; ?>
            </form>

        </div>

    </div>

</section>

<?= $this->endSection('content'); ?>