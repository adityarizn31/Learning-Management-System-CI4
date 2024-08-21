<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="/css/style.css">

  <title> <?= $title ?> </title>

</head>

<body>

  <!-- Digunakan Parsial -->
  <?= $this->include('layout/sidebar'); ?>

  <?= $this->renderSection('content'); ?>

  <script>
    function previewImgSiswa() {
      const pasFoto = document.querySelector('#foto_siswa');
      const imgPreviewPasFoto = document.querySelector('.img-preview');

      const filePasFoto = new FileReader();
      filePasFoto.readAsDataURL(foto_siswa.files[0]);

      filePasFoto.onload = function(e) {
        imgPreviewPasFoto.src = e.target.result;
      }
    }

    function previewImgGuru() {
      const pasFoto = document.querySelector('#foto_guru');
      const imgPreviewPasFoto = document.querySelector('.img-preview');

      const filePasFoto = new FileReader();
      filePasFoto.readAsDataURL(foto_guru.files[0]);

      filePasFoto.onload = function(e) {
        imgPreviewPasFoto.src = e.target.result;
      }
    }
  </script>

</body>

</html>