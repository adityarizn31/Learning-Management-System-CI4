<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <h2 class="mb-4">Buat Pertanyaan Pilihan Ganda</h2>

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

    <form action="<?= base_url() ?>GuruController/saveSoal" method="post">

        <?= csrf_field() ?>

        <?php for ($i = 1; $i <= 10; $i++): ?>
            <div class="question">
                <label for="pertanyaan<?= $i ?>">Soal <?= $i ?>:</label>
                <input type="text" class="form-control text-black" name="pertanyaans[<?= $i ?>][pertanyaan]" id="pertanyaan<?= $i ?>" required>

                <div class="options">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Pilihan A:</label>
                            <input type="text" class="form-control text-black" name="pertanyaans[<?= $i ?>][pilihan_a]" required>
                        </div>
                        <div class="col-md-6">
                            <label>Pilihan B:</label>
                            <input type="text" class="form-control text-black" name="pertanyaans[<?= $i ?>][pilihan_b]" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Pilihan C:</label>
                            <input type="text" class="form-control text-black" name="pertanyaans[<?= $i ?>][pilihan_c]" required>
                        </div>
                        <div class="col-md-6">
                            <label>Pilihan D:</label>
                            <input type="text" class="form-control text-black" name="pertanyaans[<?= $i ?>][pilihan_d]" required>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <label>Jawaban Benar:</label>
                        <select class="form-control text-black" name="pertanyaans[<?= $i ?>][jawaban_benar]" required>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
                </div>
            </div>

            <br>
            <br>
            <br>

        <?php endfor; ?>

        <button type="submit" value="submit" class="btn btn-sm btn-primary">Simpan Soal</button>
    </form>
</div>

<?= $this->endSection(); ?>