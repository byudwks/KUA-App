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
    <link href="/css/home.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="img/kua.png" rel="icon" type = "image/x-icon">



    <title>KUA-APP {{ $title }}</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom sticky-top">
    <div class="container p-3">
        <a class="navbar-brand" href="#">
            <img src="/img/logo.png" alt="" width="200" height="50" class="border-none me-1">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
        </button>
        <div class="nav_menu collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto ">
                <li class="nav-item ms-4">
                    <a class="nav-link on fw-bold" href="#">Beranda</a>
                </li>
                <li class="nav-item ms-4">
                    <a class="nav-link fw-bold" href="#alur">Alur Pendaftaran Online</a>
                </li>
                <li class="nav-item ms-4">
                    <a class="nav-link fw-bold" href="#kontak">Kontak</a>
                </li>
            </ul>
        </div>


        @auth
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle fs-4"></i>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/profil">Profil </a></li>
                  <li><hr class="dropdown-divider"></li>
                <li>
              <form action= "/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item text-danger"></i> Logout <i class="bi bi-arrow-bar-right"></i></button>
              </form>
            </li>
          </li>
          </ul>
          @else
          <div>
            <a href="/login" class="btn btn-success btn-sm fw-bold py-1 px-4">Login</a>
        </div>
          @endauth
          
        
    </div>
</nav>



@yield('container')


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>