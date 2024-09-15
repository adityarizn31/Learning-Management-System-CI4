<?= $this->extend('layout/template'); ?>

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

                    <form action="<?= base_url('/QuizController/createQuizAlpro'); ?>" method="post">

                        <?= csrf_field(); ?>

                        <div>
                            <label for="question_count">Jumlah Pertanyaan:</label>
                            <input type="number" name="question_count" id="question_count" min="1" required>
                        </div>

                        <div>
                            <button type="submit"> Lanjutkan </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>

</section>

<?= $this->endSection('content'); ?>