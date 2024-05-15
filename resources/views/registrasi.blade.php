<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KUA-APP {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="/css/login.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="img/kua.png" rel="icon" type = "image/x-icon">



  </head>
  <body>

  <div class="continer bg-success bg-opacity-10">
      <div class="row">
        <div class="col-sm-4">
            <main class="form-registrasi text-center px-4 mt-5">
              <form action = "/registrasi" method ="post">
                @csrf
                <img class="mb-2" src="/img/kua.png" alt="bumk" style=" width:110px; height:100px;">
                <h1 class="h3 mb-3 fw-bold text-center">Silahkan Mendaftar</h1>
                <div class="form-floating mb-2">
                  <input type="text" name= "nama"  class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama" required value="{{ old('nama') }}">
                  <label for="nama">Nama</label>
                  @error('nama')
                    <div class="invalid-feedback">
                    {{ $message }}
                  @enderror
                </div>
                <div class="form-floating mb-2">
                  <input type="text" name= "username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
                  <label for="username">Username</label>
                  @error('username')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-floating mb-2">
                  <input type="email" name= "email" class="form-control @error('email') is-invalid @enderror " id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                  <label for="email">Alamat Email</label>
                  @error('email')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-floating mb-3">
                  <input type="password" name= "password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                  <label for="password">Password</label>
                  @error('password')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="container-btn-login">
                  <input class="btn btn-success px-5 mb-3" type="submit" value="Registrasi">
                </div>
              </form>
              <small>Sudah Mendaftar<a href="/login" class = "text-decoration-none fw-bold text-success">   Masuk</a></small>
            </main>
        </div>
        <div class="col-sm-8 img-lg">
          <div class="overlay">
          </div>
        </div>
      </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>