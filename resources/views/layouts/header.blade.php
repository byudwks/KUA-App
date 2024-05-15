<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/header.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="img/kua.png" rel="icon" type = "image/x-icon">


    <title>KUA-APP {{ $title }}</title>
  </head>
  <body>

<header>
<div class="container-fluid bg-success">
  <div class="row ">
    <div class="col-sm-12 text-end">
        <h2 class="fs-6">Sistem Informasi Manajemen Nikah</h2>
    </div>
  </div>
</div>

<div class="container-fluid bg-success bg-opacity-10 bg-sim">
  <div class="row paren-simkah">
    <div class="col-sm-12 bg-simkah text-end">
      <img src="/img/simkah.png" alt="" class="img-simkah">
    </div>
    <div class="text-header">
      <h2 class="fw-bold">Kantor Urusan Agama</h2>
      <h2 class="fw-bold">Kecamatan Trimurjo</h2>
    </div>
    <img src="/img/kua.png" alt="" class="img-kua">
  </div>
</div>
</header>



@yield('container')


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>