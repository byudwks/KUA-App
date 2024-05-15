<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  </head>
  <body>
    @include('sweetalert::alert')

    <div class="grid-container">

      <!-- Header -->
      <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
          <span class="material-icons-outlined">menu</span>
        </div>
        <div class="nav-item text-nowrap">
          <form action= "/logout" method="post">
            @csrf
            <button type="submit" class="btn-sm btn btn-outline-secondary"> Logout</button>
          </form>
        </div>
      </header>
      <!-- End Header -->

      <!-- Sidebar -->
      <aside id="sidebar">
        <div class="sidebar-title">
          <div class="sidebar-brand">
            <span class="material-icons-outlined">inventory</span> KUA-APP ADMIN
          </div>
          <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
        </div>

        <ul class="sidebar-list">
          <li class="sidebar-list-item">
            <a href="/admin">
              <span class="material-icons-outlined">dashboard</span> Dashboard
            </a>
          </li>
        </ul>
      </aside>
      <!-- End Sidebar -->

      <!-- Main -->
      <main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">DASHBOARD</p>

          <form action="/admin" class="d-flex">
            <input class="my-3 form-control me-2" type="date" placeholder="Search.." name="search" id="search" value="{{ request('search') }}">
            <button class="my-3 btn btn-outline-success" type="submit">Filter</button>
          </form>

         
        </div>


        @if($akads->count())
        <div class="charts">
          <div class="charts-card">

            @if(request('search'))
              <a href="/admin-rekap" type="button" class="my-3 btn btn-outline-danger">Cetak Rekap Laporan</a>
            @endif

            <p class="chart-title">Data Akad Nikah</p>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">No. Pendaftaran</th>
                    <th scope="col">No. Telepon</th>
                    <th scope="col">Pengantin Pria</th>
                    <th scope="col">Pengantin Wanita</th>
                    <th scope="col">Tanggal Akad</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($akads as $akad)
                    <tr class="text-capitalize">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $akad->token }}</td>
                        <td>{{ $akad->nohp }}</td>
                        <td>{{ $akad->cppria->nama }}</td>
                        <td>{{ $akad->cppria->cpwanita->nama }}</td>
                        <td>{{ \Carbon\Carbon::parse($akad->tanggal_akad)->formatLocalized('%d %b %Y') }}</td>
                        <td class ="d-flex">



                        <button type="button" class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          <i class="bi bi-eye-fill"></i>
                        </button>

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Foto Akad Nikah</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="deletePreview()"></button>
                              </div>
                              <div class="modal-body ">
                                @if(!empty($akad->strimg) && Storage::exists($akad->strimg))
                                <img src="{{ asset('storage/' . $akad->strimg) }} " class="mx-auto mb-2 img-preview2 img-fluid col-sm-5 d-block" style="height: 25rem; width: 65%; ">
                                @else
                                <img src=" " class="mx-auto mb-2 img-preview2 img-fluid col-sm-5 d-block" style="height: 25rem; width: 65%; ">
                                @endif
                              </div>
                            </div>
                          </div>
                        </div>


                        @if($akad->status == 'Belum Sah')
                        <form action="/calon-pengantin/akad/{{ $akad->id_akad }}" method="post">
                          @csrf
                          <button class = "btn btn-success btn-sm" onclick = "return confirm('Yakin Merubah Status')"><i class="bi bi-check-circle-fill text-dark"></i></button>
                        </form>
                        @else 
                        <button class = "btn btn-secondary btn-sm" disabled><i class="bi bi-check-circle-fill text-dark"></i></button>
                        @endif
                        </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>

          </div>

        </div>
        @else 
        <div class="row d-flex justify-content-center">
          <div class="col-md-6">
            <h1> Data Tidak Ditemukan </h1>
          </div>
        </div>
        @endif
      </main>
      <!-- End Main -->

    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- Custom JS -->
    <script src="/js/scripts.js"></script>
  </body>
</html>