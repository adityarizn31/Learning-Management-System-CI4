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

                    <form action="<?= base_url('/QuizController/storeQuestions_Alpro'); ?>" method="post">

                        <?= csrf_field(); ?>

                        <?php for ($pertanyaan = 1; $pertanyaan <= $jumlahpertanyaan_alpro; $pertanyaan++) : ?>

                            <h3> Pertanyaan <?= $pertanyaan; ?> </h3>

                            <div>
                                <label for="question_<?= $i; ?>">Pertanyaan:</label>
                                <textarea name="questions[<?= $i; ?>][question]" id="question_<?= $i; ?>" required><?= old("questions[$i][question]"); ?></textarea>
                            </div>

                            <div>
                                <label for="option_a_<?= $i; ?>">Opsi A:</label>
                                <input type="text" name="questions[<?= $i; ?>][option_a]" id="option_a_<?= $i; ?>" value="<?= old("questions[$i][option_a]"); ?>" required>
                            </div>

                            <div>
                                <label for="option_b_<?= $i; ?>">Opsi B:</label>
                                <input type="text" name="questions[<?= $i; ?>][option_b]" id="option_b_<?= $i; ?>" value="<?= old("questions[$i][option_b]"); ?>" required>
                            </div>

                            <div>
                                <label for="option_c_<?= $i; ?>">Opsi C:</label>
                                <input type="text" name="questions[<?= $i; ?>][option_c]" id="option_c_<?= $i; ?>" value="<?= old("questions[$i][option_c]"); ?>" required>
                            </div>

                            <div>
                                <label for="option_d_<?= $i; ?>">Opsi D:</label>
                                <input type="text" name="questions[<?= $i; ?>][option_d]" id="option_d_<?= $i; ?>" value="<?= old("questions[$i][option_d]"); ?>" required>
                            </div>

                            <div>
                                <label for="correct_answer_<?= $i; ?>">Jawaban Benar:</label>
                                <select name="questions[<?= $i; ?>][correct_answer]" id="correct_answer_<?= $i; ?>" required>
                                    <option value="A" <?= old("questions[$i][correct_answer]") == 'A' ? 'selected' : ''; ?>>A</option>
                                    <option value="B" <?= old("questions[$i][correct_answer]") == 'B' ? 'selected' : ''; ?>>B</option>
                                    <option value="C" <?= old("questions[$i][correct_answer]") == 'C' ? 'selected' : ''; ?>>C</option>
                                    <option value="D" <?= old("questions[$i][correct_answer]") == 'D' ? 'selected' : ''; ?>>D</option>
                                </select>
                            </div>

                            <hr>

                        <?php endfor; ?>

                        <div>
                            <button type="submit"> Simpan Kuis </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>

</section>

<?= $this->endSection('content'); ?>