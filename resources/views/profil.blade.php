@extends('layouts.header')

@section('container')

@include('sweetalert::alert')


<div class="container-fluid d-flex justify-content-between align-items-center">
    <nav aria-label="breadcrumb">
        <ol class="mt-2 breadcrumb ms-5 fs-5">
            <li class="breadcrumb-item"><a href="/home" class ="text-success text-decoration-none">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profil</li>
        </ol>
    </nav>
    <div class="text-end me-5">
    <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fs-5 text-capitalize fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ auth()->user()->nama }} <i class="bi bi-person-circle fs-3"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end bg-danger" aria-labelledby="navbarDropdown" data-bs-popper="none">
                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="bg-opacity-50 dropdown-item text-light bg-danger">Logout <i class="bi bi-box-arrow-in-right"></i></button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
    </div>
</div>


          <div class="container-fluid">

              <div class="row">
                <div class="mt-3 bg-opacity-50 col-sm-12 bg-success bg-pf">
                  <h6 class="py-2 text-center fs-3 ">Pelaksanaan Akad Nikah</h6>
                </div>
                <div class="mt-1 row ">
                  <div class="col-sm-12 text-end">
                    <a href="/calon-pengantin/akad-edit/{{ $akads->id_akad }}" class="text-secondary me-2"><i class="bi bi-pencil-square"></i></a>
                  </div>
                </div>
                
                <div class="col-sm-6 ms-5 ">
                  <div class="border-0 card">
                    <table class ="m-3 ">
                      <tr>
                          <td class="t-atas">No. Pendaftaran</td>
                          <td class="t-bawah">: {{ $akads->token }}</td>
                      </tr>
                      <tr>
                          <td class="t-atas">Tanggal Akad</td>
                          <td class="t-bawah">: {{ \Carbon\Carbon::parse($akads->tanggal_akad)->formatLocalized('%d %b %Y') }}</td>
                      </tr>
                      <tr>
                          <td class="t-atas">Waktu Akad</td>
                          <td class="t-bawah">: Pukul {{ \Carbon\Carbon::parse($akads->jam_akad)->format('H:i') }} WIB</td>
                      </tr>
                      @if($akads->lokasi == 1)
                      <tr>
                          <td class="t-atas">Lokasi Akad</td>
                          <td class="t-bawah">: Kantor Urusan Agama kec. Trimurjo</td>
                      </tr>
                      @else
                      <tr>
                          <td class="t-atas">Lokasi Akad</td>
                          <td class="t-bawah">: {{ $akads->alamat }}</td>
                      </tr>
                      @endif
                    </table>
                  </div>
                </div>          
              </div>
              
              
                <div class="row">
                    <div class="h-5 bg-opacity-50 bg-success bg-pf">
                      <h6 class="py-2 text-center fs-3">Calon Pengantin</h6>
                    </div>
                    <div class="mt-1 row ">
                      <div class="col-sm-12 text-end">
                        <a href="/calon-pengantin/pria-edit/{{ $cpprias->id_cppria }}" class="text-secondary me-2 "><i class="bi bi-pencil-square"></i></a>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="border-0 card">
                        
                        <div class="pb-3 mt-3 text-center border-bottom border-success border-3">
                            <img src="{{ asset('storage/' . $cpprias->pasimg) }}" class="img-fluid" alt="" style="height:300px;">
                        </div>
                  
                      <table class="datapengantin">
                      <tr class="heading">
                          <td>Nama Penganti Pria</td>

                          <td>: {{ $cpprias->nama }}</td>
                      </tr>
                      <tr class="heading">
                          <td>NIK penganti pria</td>

                          <td>: {{ $cpprias->nik }}</td>
                      </tr>
                      <tr class="heading">
                          <td>Warganegara</td>

                          <td>: {{ $cpprias->warganegara }}</td>
                      </tr>
                      <tr class="heading">
                          <td>Tempat Tanggal Lahir</td>

                          <td>: {{ $cpprias->tempat_lahir }} , {{ \Carbon\Carbon::parse($cpprias->tanggal_lahir)->formatLocalized('%d %b %Y') }}</td>
                      </tr>
                      <tr class="heading">
                          <td>Umur</td>

                          <td>: {{ $cpprias->umur }} Tahun</td>
                      </tr>
                      @if($cpprias->status == 1)
                      <tr class="item">
                          <td>Status</td>

                          <td>: Perjaka</td>
                      </tr>
                      @elseif($cpprias->status == 2)
                      <tr class="item">
                        <td>Status</td>

                        <td>: Duda</td>
                      </tr>
                      @elseif($cpprias->status == 3)
                      <tr class="item">
                        <td>Status</td>

                        <td>: Perawan</td>
                      </tr>
                      @else ($cpprias->status == 4)
                      <tr class="item">
                        <td>Status</td>

                        <td>: Janda</td>
                      </tr>
                      @endif

                      @if($cpprias->agama == 1)
                      <tr class="item">
                          <td>Agama</td>

                          <td>: Islam</td>
                      </tr>
                      @elseif($cpprias->agama == 2)
                      <tr class="item">
                        <td>Agama</td>

                        <td>: Kristen</td>
                      </tr>
                      @elseif($cpprias->agama == 3)
                      <tr class="item">
                        <td>Agama</td>

                        <td>: Hindu</td>
                      </tr>
                      @elseif($cpprias->agama == 4)
                      <tr class="item">
                        <td>Agama</td>

                        <td>: Khatolik</td>
                      </tr>
                      @else($cpprias->agama == 5)
                      <tr class="item">
                        <td>Agama</td>

                        <td>: Budha</td>
                      </tr>
                      @endif

                      <tr class="heading">
                          <td>Pendidikan</td>

                          <td>: {{ $cpprias->pendidikan }}</td>
                      </tr>
                      <tr class="heading">
                          <td>Alamat</td>

                          <td>: {{ $cpprias->alamat }}</td>
                      </tr>
                      </table>
                    </div>
                    </div>


                    <div class="col-sm-6">
                      <div class="border-0 card">
                        
                        <div class="pb-3 mt-3 text-center border-bottom border-success border-3">
                            <img src="{{ asset('storage/' . $cpwanitas->pasimg) }}" class="img-fluid" alt="cpwanita" style="height:300px;">
                        </div>
                  
                      <table class="datapengantin">
                      <tr class="heading">
                          <td>Nama Penganti Wanita</td>

                          <td>: {{ $cpwanitas->nama }}</td>
                      </tr>
                      <tr class="heading">
                          <td>NIK Penganti Wanita</td>

                          <td>: {{ $cpwanitas->nik }}</td>
                      </tr>
                      <tr class="heading">
                          <td>Warganegara</td>

                          <td>: {{ $cpwanitas->warganegara }}</td>
                      </tr>
                      <tr class="heading">
                          <td>Tempat Tanggal Lahir</td>

                          <td>: {{ $cpwanitas->tempat_lahir }} , {{ \Carbon\Carbon::parse($cpwanitas->tanggal_lahir)->formatLocalized('%d %b %Y') }}</td>
                      </tr>
                      <tr class="heading">
                          <td>Umur</td>

                          <td>: {{ $cpwanitas->umur }} Tahun</td>
                      </tr>
                      @if($cpwanitas->status == 1)
                      <tr class="item">
                          <td>Status</td>

                          <td>: Perjaka</td>
                      </tr>
                      @elseif($cpwanitas->status == 2)
                      <tr class="item">
                        <td>Status</td>

                        <td>: Duda</td>
                      </tr>
                      @elseif($cpwanitas->status == 3)
                      <tr class="item">
                        <td>Status</td>

                        <td>: Perawan</td>
                      </tr>
                      @else ( $cpwanitas->status == 4 )
                      <tr class="item">
                        <td>Status</td>

                        <td>: Janda</td>
                      </tr>
                      @endif

                      @if($cpwanitas->agama == 1)
                      <tr class="item">
                          <td>Agama</td>

                          <td>: Islam</td>
                      </tr>
                      @elseif($cpwanitas->agama == 2)
                      <tr class="item">
                        <td>Agama</td>

                        <td>: Kristen</td>
                      </tr>
                      @elseif($cpwanitas->agama == 3)
                      <tr class="item">
                        <td>Agama</td>

                        <td>: Hindu</td>
                      </tr>
                      @elseif($cpwanitas->agama == 4)
                      <tr class="item">
                        <td>Agama</td>

                        <td>: Khatolik</td>
                      </tr>
                      @else ($cpwanitas->agama == 5)
                      <tr class="item">
                        <td>Agama</td>

                        <td>: Budha</td>
                      </tr>
                      @endif

                      <tr class="heading">
                          <td>Pendidikan</td>

                          <td>: {{ $cpwanitas->pendidikan }}</td>
                      </tr>
                      <tr class="heading">
                          <td>Alamat</td>

                          <td>: {{ $cpwanitas->alamat }}</td>
                      </tr>
                      </table>
                    </div>
                    </div>
                    
                </div>

                <div class="row">
                  <div class="h-5 mt-4 bg-opacity-50 bg-success bg-pf">
                      <h6 class="py-2 text-center fs-3">Wali Nikah</h6>
                  </div>
                  <div class="mt-1 row ">
                    <div class="col-sm-12 text-end">
                      <a href="/calon-pengantin/wali-edit/{{ $walis->id_wali }}" class="text-secondary me-2 "><i class="bi bi-pencil-square"></i></a>
                    </div>
                  </div>

                  <div class="col-sm-4 ms-5 ">
                    <div class="border-0 card ">
                      <table class ="m-3 datawali">
                        <tr class="">
                            <td class="">Nama Wali Nikah</td>
                            <td>: {{ $walis->nama }}</td>
                        </tr>
                        <tr class="">
                            <td>Hubungan</td>
                            <td>: {{ $walis->hubungan }}</td>
                        </tr>
                        @if($cpwanitas->agama == 1)
                        <tr class="">
                            <td class="">Agama</td>

                            <td>: Islam</td>
                        </tr>
                        @elseif($cpwanitas->agama == 2)
                        <tr class="">
                          <td class="">Agama</td>

                          <td>: Kristen</td>
                        </tr>
                        @elseif($cpwanitas->agama == 3)
                        <tr class="">
                          <td class="">Agama</td>

                          <td>: Hindu</td>
                        </tr>
                        @elseif($cpwanitas->agama == 4)
                        <tr class="">
                          <td class="">Agama</td>

                          <td>: Khatolik</td>
                        </tr>
                        @else
                        <tr class="">
                          <td class="">Agama</td>

                          <td>: {{ $cpwanitas->agama }}</td>
                        </tr>
                        @endif
                        <tr class="">
                          <td>Alamat</td>
                          <td>: {{ $walis->alamat }}</td>
                        </tr>
                      </table>
                    </div>
                  </div>  
                </div>

                <div class="mb-4 row">
                  <div class="mt-5 col-sm-12 d-flex justify-content-end">


                    
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $akads->id_akad }}">
                      Upload Foto Akad Nikah <i class="bi bi-file-earmark-fill"></i>
                    </button>
                  
                    <!-- Modal -->
                    <form action="/profil/upload-struk/{{ $akads->id_akad }}" method="post" enctype="multipart/form-data">
                      @method('put')
                      @csrf
                    <div class="modal fade" id="exampleModal-{{ $akads->id_akad }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Foto Akad Nikah</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="deletePreview()"></button>
                          </div>
                          <div class="modal-body ">
                            @if(!empty($akads->strimg) && Storage::exists($akads->strimg))
                            <img src="{{ asset('storage/' . $akads->strimg) }} " class="mx-auto mb-2 img-preview2 img-fluid col-sm-5 d-block" style="height: 25rem; width: 100%; ">
                            @else
                            <img src=" " class="mx-auto mb-2 img-preview2 img-fluid col-sm-5 d-block" style="height: 25rem; width: 65%; ">
                            @endif
                            <input class="form-control form-control-sm @error('image2') is-invalid @enderror" type="file" id="image2" name ="strimg" onchange ="previewImage2()">
                            @error('strimg')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                          </div>
                          <div class="mx-auto modal-footer">
                            <button type="submit" class="btn btn-success ">Save changes </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>

                    @if($akads->status == 'Belum Sah')
                    <button action="/cetak" class="btn btn-secondary text-capitalize ms-1 me-3" disabled>kartu nikah <i class="bi bi-printer-fill ms-1"></i></button>
                    @else
                    <a href="/cetak" class="btn btn-danger text-capitalize ms-1 me-3">kartu nikah <i class="bi bi-printer-fill ms-1"></i></a>
                    @endif
                  </div>
                </div>
          </div>

          <script>

              function previewImage2(){
                  const image = document.querySelector('#image2');
                  const imgPreview = document.querySelector('.img-preview2');

                  imgPreview.style.display = 'block';
                  
                  const oFReader = new FileReader();
                  oFReader.readAsDataURL(image.files[0]);

                  oFReader.onload = function (oFREvent) {
                  imgPreview.src = oFREvent.target.result;

                  }   
              }
            </script>

@endsection

