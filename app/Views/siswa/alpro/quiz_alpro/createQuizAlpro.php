<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<section class="p-4" id="main-content">

    <button class="btn btn-primary" id="button-toggle">
        <i class="bi bi-list"></i>
    </button>

    <div class="card shadow mb-2 border-2 border-primary" style="margin-top: 25px;">

        <div class="card-header py-3 border-0">
            <h5 class="m-0 font-weight-bold text-primary"> Quiz Algoritma Pemrograman </h5>
        </div>

        <div class="container">
            <div class="row">
                <div class="col">

                    <form action="<?= base_url() ?>Siswa/takeQuiz" method="post">
                        <?php foreach ($pertanyaans as $pertanyaan): ?>
                            <div>
                                <p><?= $pertanyaan['pertanyaan'] ?></p>
                                <label><input type="radio" name="jawaban[<?= $pertanyaan['id'] ?>]" value="A" required> <?= $pertanyaan['pilihan_a'] ?></label><br>
                                <label><input type="radio" name="jawaban[<?= $pertanyaan['id'] ?>]" value="B"> <?= $pertanyaan['pilihan_b'] ?></label><br>
                                <label><input type="radio" name="jawaban[<?= $pertanyaan['id'] ?>]" value="C"> <?= $pertanyaan['pilihan_c'] ?></label><br>
                                <label><input type="radio" name="jawaban[<?= $pertanyaan['id'] ?>]" value="D"> <?= $pertanyaan['pilihan_d'] ?></label><br>
                            </div>
                            <br>
                        <?php endforeach; ?>

                        <button type="submit">Kirim Jawaban</button>
                    </form>


                </div>
            </div>
        </div>

    </div>

</section>

<?= $this->endSection('content'); ?>