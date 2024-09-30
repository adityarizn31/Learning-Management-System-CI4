<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>

<section class="p-4">

    <div class="card shadow border-2 border-primary">

        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between" style="padding-top: 10px;">
                <h3 class="m-0 font-weight-bold text-primary"> Survey RPL A Keterampilan Algoritma Pemrograman </h3>
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

            <form action="<?= base_url() ?>GuruController/takeSaveSurvey" method="post">

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
                                <label for="Sangat_Tidak_Puas">Siswa tidak masuk kelas</label>
                            </div>
                            <div class="col">
                                <input type="radio" name="jawaban1" id="Tidak_Puas" value="Tidak Puas" class="<?= (session('errors.jawaban1')) ? 'is-invalid' : '' ?>">
                                <label for="Tidak_Puas">Siswa tidak siap belajar</label>
                            </div>
                            <div class="col">
                                <input type="radio" name="jawaban1" id="Kurang_Puas" value="Kurang Puas" class="<?= (session('errors.jawaban1')) ? 'is-invalid' : '' ?>">
                                <label for="Kurang_Puas">Siswa lupa membawa bahan belajar</label>
                            </div>
                            <div class="col">
                                <input type="radio" name="jawaban1" id="Puas" value="Puas" class="<?= (session('errors.jawaban1')) ? 'is-invalid' : '' ?>">
                                <label for="Puas">Siswa siap dengan bahan belajar namun telat masuk kelas</label>
                            </div>
                            <div class="col">
                                <input type="radio" name="jawaban1" id="Sangat_Puas" value="Sangat Puas" class="<?= (session('errors.jawaban1')) ? 'is-invalid' : '' ?>">
                                <label for="Sangat_Puas">Siswa siap dengan bahan belajar</label>
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
                                <label for="Sangat_Tidak_Puas">Siswa tidak pernah atau jarang sekali siap dengan bahan belajar dan tugas</label>
                            </div>
                            <div class="col">
                                <input type="radio" name="jawaban2" id="Tidak_Puas" value="Tidak Puas" class="<?= (session('errors.jawaban2')) ? 'is-invalid' : '' ?>">
                                <label for="Tidak_Puas">Siswa sering kali tidak siap dengan bahan belajar atau tugas yang belum dikerjakan</label>
                            </div>
                            <div class="col">
                                <input type="radio" name="jawaban2" id="Kurang_Puas" value="Kurang Puas" class="<?= (session('errors.jawaban2')) ? 'is-invalid' : '' ?>">
                                <label for="Kurang_Puas">Siswa terkadang lupa membawa bahan belajar atau tugas yang diperlukan</label>
                            </div>
                            <div class="col">
                                <input type="radio" name="jawaban2" id="Puas" value="Puas" class="<?= (session('errors.jawaban2')) ? 'is-invalid' : '' ?>">
                                <label for="Puas">Siswa biasanya siap dengan bahan belajar dan tugas, meskipun terkadang ada kekurangan</label>
                            </div>
                            <div class="col">
                                <input type="radio" name="jawaban2" id="Sangat_Puas" value="Sangat Puas" class="<?= (session('errors.jawaban2')) ? 'is-invalid' : '' ?>">
                                <label for="Sangat_Puas">Siswa selalu siap dengan bahan belajar, seperti buku, alat tulis, dan tugas yang telah dikerjakan</label>
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
                                <label for="Sangat_Tidak_Puas">Siswa menunjukkan motivasi yang sangat rendah dan tidak terlibat dalam kegiatan belajar</label>
                            </div>
                            <div class="col">
                                <input type="radio" name="jawaban3" id="Tidak_Puas" value="Tidak Puas" class="<?= (session('errors.jawaban3')) ? 'is-invalid' : '' ?>">
                                <label for="Tidak_Puas">Siswa menunjukkan motivasi yang rendah dan jarang terlibat aktif dalam kegiatan belajar</label>
                            </div>
                            <div class="col">
                                <input type="radio" name="jawaban3" id="Kurang_Puas" value="Kurang Puas" class="<?= (session('errors.jawaban3')) ? 'is-invalid' : '' ?>">
                                <label for="Kurang_Puas">Siswa menunjukkan motivasi yang sedang-sedang saja dalam belajar dan hanya kadang-kadang terlibat akti</label>
                            </div>
                            <div class="col">
                                <input type="radio" name="jawaban3" id="Puas" value="Puas" class="<?= (session('errors.jawaban3')) ? 'is-invalid' : '' ?>">
                                <label for="Puas">Siswa menunjukkan motivasi yang baik dalam belajar dan terlibat aktif dalam kegiatan belajar</label>
                            </div>
                            <div class="col">
                                <input type="radio" name="jawaban3" id="Sangat_Puas" value="Sangat Puas" class="<?= (session('errors.jawaban3')) ? 'is-invalid' : '' ?>">
                                <label for="Sangat_Puas">Siswa menunjukkan antusiasme tinggi dan motivasi kuat dalam belajar</label>
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
                                <label for="Sangat_Tidak_Puas">Siswa hampir tidak pernah berpartisipasi dalam kelas dan tidak berkontribusi dalam diskusi atau aktivitas</label>
                            </div>
                            <div class="col">
                                <input type="radio" name="jawaban4" id="Tidak_Puas" value="Tidak Puas" class="<?= (session('errors.jawaban4')) ? 'is-invalid' : '' ?>">
                                <label for="Tidak_Puas">Siswa jarang berpartisipasi dalam kelas dan biasanya hanya berkontribusi sedikit dalam diskusi atau aktivitas.</label>
                            </div>
                            <div class="col">
                                <input type="radio" name="jawaban4" id="Kurang_Puas" value="Kurang Puas" class="<?= (session('errors.jawaban4')) ? 'is-invalid' : '' ?>">
                                <label for="Kurang_Puas">Siswa berpartisipasi dalam kelas tetapi tidak secara konsisten, dan kadang-kadang kurang aktif dalam diskusi atau aktivitas</label>
                            </div>
                            <div class="col">
                                <input type="radio" name="jawaban4" id="Puas" value="Puas" class="<?= (session('errors.jawaban4')) ? 'is-invalid' : '' ?>">
                                <label for="Puas">Siswa aktif berpartisipasi dalam kelas sebagian besar waktu, meskipun mungkin tidak selalu konsisten dalam kontribusinya</label>
                            </div>
                            <div class="col">
                                <input type="radio" name="jawaban4" id="Sangat_Puas" value="Sangat Puas" class="<?= (session('errors.jawaban4')) ? 'is-invalid' : '' ?>">
                                <label for="Sangat_Puas">Siswa selalu aktif berpartisipasi dalam kelas, mengikuti diskusi, dan berkontribusi secara konsisten dalam aktivitas kelas</label>
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
                                <label for="Sangat_Tidak_Puas">Tidak mampu menginterpretasikan instruksi atau demonstrasi dengan benar dan sering kali bingung</label>
                            </div>
                            <div class="col">
                                <input type="radio" name="jawaban5" id="Tidak_Puas" value="Tidak Puas" class="<?= (session('errors.jawaban5')) ? 'is-invalid' : '' ?>">
                                <label for="Tidak_Puas">Siswa menunjukkan kesalahan dalam menginterpretasikan instruksi atau demonstrasi dan sering memerlukan bantuan</label>
                            </div>
                            <div class="col">
                                <input type="radio" name="jawaban5" id="Kurang_Puas" value="Kurang Puas" class="<?= (session('errors.jawaban5')) ? 'is-invalid' : '' ?>">
                                <label for="Kurang_Puas">Siswa membutuhkan arahan lebih lanjut untuk menginterpretasikan instruksi atau demonstrasi dengan benar</label>
                            </div>
                            <div class="col">
                                <input type="radio" name="jawaban5" id="Puas" value="Puas" class="<?= (session('errors.jawaban5')) ? 'is-invalid' : '' ?>">
                                <label for="Puas">Siswa cukup baik dalam menginterpretasikan instruksi atau demonstrasi dan biasanya dapat mencontohkan dengan benar</label>
                            </div>
                            <div class="col">
                                <input type="radio" name="jawaban5" id="Sangat_Puas" value="Sangat Puas" class="<?= (session('errors.jawaban5')) ? 'is-invalid' : '' ?>">
                                <label for="Sangat_Puas">Siswa menunjukkan kemampuan interpretasi yang tinggi terhadap instruksi, petunjuk, atau demonstrasi guru, dan dapat mereplikasi atau mencontohkan dengan sangat tepat</label>
                            </div>
                        </div>
                        <?php if (session('errors.jawaban5')) : ?>
                            <div class="invalid-feedback">
                                <?= session('errors.jawaban5') ?>
                            </div>
                        <?php endif; ?>
                    </div>

                <?php endforeach; ?>

                <!-- Tombol Submit -->
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">Submit Survey</button>
                </div>

            </form>
        </div>

    </div>

</section>

<?= $this->endSection('content'); ?>