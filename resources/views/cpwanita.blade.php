@extends('layouts.header')

@section('container')

<nav aria-label="breadcrumb">
        <ol class="mt-2 breadcrumb ms-5 fs-5">
            <li class="breadcrumb-item"><a href="/home" class ="text-success text-decoration-none">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Pengantin</li>
        </ol>
    </nav>

<div class="container">
    <div class="mt-4 row">
        <div class="mb-4 bg-opacity-50 bg-success bg-pf">
            <h6 class="py-2 text-center fs-3 ">Calon Pengantin Wanita</h6>
        </div>
        <div class="col-md-7">

            <form action="/calon-pengantin/wanita/{{ $pria_id->id_cppria }}" method ="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 row">
                    <label for="nama" id ="nama"class="col-sm-3 col-form-label fs-6 fw-bolder ">Nama Calon Pengatin Wanita</label>
                    <div class="mt-3 col-sm-8">
                        <input type="text" name="nama" class="form-control text-uppercase @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                    </div>
                    @error('nama')
                    <div class="text-center invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 row">
                    <label for="nik" id="nik" class="col-sm-3 col-form-label fs-6 fw-bolder ">NIK Calon Pengatin Wanita </label>
                    <div class="mt-3 col-sm-8">
                        <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}">
                    </div>
                    @error('nik')
                    <div class="text-center invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 row">
                    <label for="warganegara" id="warganegara" class="col-sm-3 col-form-label fs-6 fw-bolder ">Warganegara</label>
                    <div class="col-sm-8">
                        <input type="text" name="warganegara" class="form-control text-uppercase @error('warganegara') is-invalid @enderror" value="{{ old('warganegara') }}">
                    </div>
                    @error('warganegara')
                    <div class="text-center invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 row">
                    <label for="tempat_lahir" id="tempat_lahir" class="col-sm-3 col-form-label fs-6 fw-bolder ">Tempat Lahir</label>
                    <div class="col-sm-8">
                        <input type="text" name="tempat_lahir" class="form-control text-uppercase @error('tempat_lahir') is-invalid @enderror" value="{{ old('tempat_lahir') }}" >
                    </div>
                    @error('tempat_lahir')
                    <div class="text-center invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 row">
                    <label for="tanggal_lahir" id="tanggal_lahir" class="col-sm-3 col-form-label fs-6 fw-bolder ">Tanggal Lahir</label>
                    <div class="col-sm-8">
                        <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir') }}">
                    </div>
                    @error('tanggal_lahir')
                    <div class="text-center invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 row">
                    <label for="umur" id="umur" class="col-sm-3 col-form-label fs-6 fw-bolder ">Umur</label>
                    <div class="col-sm-8">
                        <input type="number" name="umur" class="form-control @error('umur') is-invalid @enderror" value="{{ old('umur') }}">
                    </div>
                    @error('umur')
                    <div class="text-center invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 row">
                    <label for="status" class="col-sm-3 col-form-label fs-6 fw-bolder">Status</label>
                    <div class="col-sm-8">
                    <select class="form-select" name="status" aria-label="Default select example">
                        <option value="1">Perjaka</option>
                        <option value="2">Duda</option>
                        <option value="3">Perawan</option>
                        <option value="4">Janda</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="agama" class="col-sm-3 col-form-label fs-6 fw-bolder">Agama</label>
                    <div class="col-sm-8">
                    <select class="form-select" name="agama" aria-label="Default select example">
                        <option value="1">Islam</option>
                        <option value="2">Kristen</option>
                        <option value="3">Hindu</option>
                        <option value="4">Khatolik</option>
                        <option value="5">Budha</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="pendidikan"id="pendidikan" class="col-sm-3 col-form-label fs-6 fw-bolder ">Pendidikan terahir</label>
                    <div class="col-sm-8">
                        <input type="text" name="pendidikan" class="form-control text-uppercase @error('pendidikan') is-invalid @enderror" value="{{ old('pendidikan') }}">
                    </div>
                    @error('pendidikan')
                    <div class="text-center invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 row">
                    <label for="alamat" id="alamat" class="col-sm-3 col-form-label fs-6 fw-bolder ">Alamat</label>
                    <div class="col-sm-8">
                        <textarea type="text" name="alamat" class="form-control text-uppercase @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" rows="3">{{ old('alamat') }}</textarea>
                    </div>
                    @error('alamat')
                    <div class="text-center invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

        </div>

    
        <div class="col-md-5 "> 
            <div class="mb-1 text-center">
                <label for="pasimg" class="form-label fw-bold">Pas Foto 4x6</label>                           
                <img src=" " class="mx-auto mb-2 img-preview1 img-fluid col-sm-5 d-block " style="height: 15rem; width: 45%; ">
                <input class="form-control form-control-sm @error('pasimg') is-invalid @enderror" type="file" id="image1" name ="pasimg" onchange ="previewImage1()">
                @error('pasimg')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="pt-4 mb-1 text-center">
                <label for="ktpimg" class="form-label fw-bold">Kartu Tanda Penduduk</label>                          
                <img src=" " class="mb-2 img-preview2 img-fluid col-sm-5 d-block " style="height: 15rem; width: 100%; ">
                <input class="form-control form-control-sm @error('ktpimg') is-invalid @enderror" type="file" id="image2" name ="ktpimg" onchange ="previewImage2()">
                @error('ktpimg')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

    </div>

        <div class="mt-5 text-center row">
            <div class="col-sm-12 ">
                <input class="px-5 mb-5 btn btn-success" type="submit" value="Next">
            </div>
         </div>
    </form>
</div>




<script>
// preview image
    function previewImage1(){
        const image = document.querySelector('#image1');
        const imgPreview = document.querySelector('.img-preview1');

        imgPreview.style.display = 'block';
        
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {
        imgPreview.src = oFREvent.target.result;

        }   
    }


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