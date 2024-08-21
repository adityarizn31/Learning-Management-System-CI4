<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="p-4">

    <button class="btn btn-primary" id="button-toggle">
        <i class="bi bi-list"></i>
    </button>

    <div class="card shadow mt-3 border-2 border-primary">

        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between" style="padding-top: 10px;">
                <h3 class="m-0 font-weight-bold text-primary"> Data Guru </h3>
                <a href="/AdminController/createGuru/" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Tambah Guru </a>
            </div>
        </div>

        <!-- Digunakan untuk Pesan -->
        <div class="container mt-4">
            <div class="row">
                <div class="col">

                    <?php if (session()->getFlashdata('pesan')) : ?>

                        <div id="myModal" class="modal" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-semibold"> Pendaftaran Guru Stemanikaku </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Guru Baru telah didaftarkan !!</p>                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <script>
                            var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
                                keyboard: false
                            });
                            myModal.show();
                        </script>

                    <?php endif; ?>

                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-fixed table-hover">

                <thead class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Foto Guru</th>
                        <th scope="col">NIP Guru</th>
                        <th scope="col">Nama Guru</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($guru as $gur) : ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><img src="/img/guru/<?= $gur['foto_guru']; ?>" alt="" style="width: 20%;"></td>
                            <td><?= $gur['nip_guru']; ?></td>
                            <td><?= $gur['nama_guru']; ?></td>
                            <td><a href="/admin/detailGuru/<?= $gur['slug']; ?>" class="btn btn-success">Detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>

    </div>



</section>

<?= $this->endSection('content'); ?>