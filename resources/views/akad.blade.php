@extends('layouts.header')

@section('container')


    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ms-5 mt-2 fs-5">
            <li class="breadcrumb-item"><a href="/home" class ="text-success text-decoration-none">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Pengantin</li>
        </ol>
    </nav>

<div class="container">
    <div class="row mt-4">
        <div class="bg-success bg-opacity-50 bg-pf mb-4">
            <h6 class="text-center py-2 fs-3 ">Pelaksanaan Akad Nikah</h6>
        </div>
        <div class="col-md-7">

        
       <div class="mt-2" style="width: 600px;">
            @if(session('message'))
            <div class="alert {{ session('alert-class') }} alert-dismissible fade show d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-exclamation-triangle-fill me-2" viewBox="0 0 16 16" role="img" aria-label="Danger:" width="24" height="24">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                    {{ session ('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
       </div>


            <form action="/calon-pengantin/akad" method ="post">
                @csrf
                <div class="mb-3 row">
                    <label for="tanggal_akad" id="tanggal_akad" class="col-sm-3 col-form-label fs-6 fw-bolder">Tanggal Akad</label>
                    <div class="col-sm-8">
                        <input type="date" name="tanggal_akad" class="form-control @error('tanggal_akad') is-invalid @enderror" value="{{ old('tanggal_akad') }}">
                    </div>
                    @error('tanggal_akad')
                    <div class="invalid-feedback text-center">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 row">
                    <label for="jam_akad" id="jam_akad" class="col-sm-3 col-form-label fs-6 fw-bolder">Waktu Akad</label>
                    <div class="col-sm-8">
                        <input type="time" name="jam_akad" class="form-control @error('jam_akad') is-invalid @enderror" value="{{ old('jam_akad') }}">
                    </div>
                    @error('jam_akad')
                    <div class="invalid-feedback text-center">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 row">
                    <label for="nohp" id="nohp" class="col-sm-3 col-form-label fs-6 fw-bolder">No HP</label>
                    <div class="col-sm-8">
                        <input type="text" name="nohp" class="form-control @error('nohp') is-invalid @enderror" value="{{ old('nohp') }}">
                    </div>
                    @error('nohp')
                    <div class="invalid-feedback text-center">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            
                <div class="mb-3 row">
                    <label for="lokasi" class="col-sm-3 col-form-label fs-6 fw-bolder">Lokasi Akad Nikah</label>
                    <div class="col-sm-8">
                        <select class="form-select @error('lokasi') is-invalid @enderror" name="lokasi" aria-label="Default select example" id="lokasi">
                        <option value="1">Kantor Urusan Agama Kec. Trimurjo</option>
                        <option value="2">Di luar KUA</option>
                        </select>
                    </div>
                    @error('lokasi')
                    <div class="invalid-feedback text-center">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 row" id="alamat-input" style="display:none">
                    <label for="alamat" id="alamat" class="col-sm-3 col-form-label fs-6 fw-bolder text-light">Alamat Akad Nikah</label>
                    <div class="col-sm-8">
                        <h6 class="fs-6 fw-light fst-italic">* jika lokasi di luar KUA, silakan isikan alamat di bawah *</h6>
                        <textarea type="text" name="alamat" class="form-control text-uppercase" value="{{ old('alamat') }}" rows="3" ></textarea>
                    </div>
                    @error('alamat')
                    <div class="invalid-feedback text-center">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="row mt-5">
                    <div class="col-sm-6 mx-auto">
                        <input class="btn btn-success px-5 mb-5" type="submit" value="Lanjutkan">
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    const lokasi = document.getElementById("lokasi");
    const alamat = document.getElementById("alamat-input");

    // Tambahkan event listener untuk menangani perubahan nilai pada select element
    lokasi.addEventListener("change", function() {
        if (lokasi.value == 2) { // Jika nilai yang dipilih adalah 2 (Di luar KUA)
            alamat.style.display = "flex";
        } else { // Jika nilai yang dipilih adalah 1 (KUA Punggur)
            alamat.style.display = "none";
        }
    });
</script>


@endsection