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
            <h6 class="py-2 text-center fs-3 ">Wali Nikah</h6>
        </div>
        <div class="col-md-7">

            <form action="/calon-pengantin/wali/{{ $wanita_id->id_cpwanita }}" method ="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 row">
                    <label for="nama" id ="nama"class="col-sm-3 col-form-label fs-6 fw-bolder ">Nama Wali Nikah</label>
                    <div class="mt-1 col-sm-8">
                        <input type="text" name="nama" class="form-control text-uppercase @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                    </div>
                    @error('nama')
                    <div class="text-center invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 row">
                    <label for="nik" id="nik" class="col-sm-3 col-form-label fs-6 fw-bolder ">NIK Wali Nikah </label>
                    <div class="mt-1 col-sm-8">
                        <input type="text" name="nik" class="form-control text-uppercase @error('nik') is-invalid @enderror" value="{{ old('nik') }}">
                    </div>
                    @error('nik')
                    <div class="text-center invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 row">
                    <label for="hubungan" id="hubungan" class="col-sm-3 col-form-label fs-6 fw-bolder ">Hubungan</label>
                    <div class="col-sm-8">
                        <input type="text" name="hubungan" class="form-control text-uppercase @error('hubungan') is-invalid @enderror" value="{{ old('hubungan') }}">
                    </div>
                    @error('hubungan')
                    <div class="text-center invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <div class="mb-3 row">
                    <label for="agama" class="col-sm-3 col-form-label fs-6 fw-bolder ">Agama</label>
                    <div class="col-sm-8">
                    <select class="form-select @error('agama') is-invalid @enderror" name="agama" aria-label="Default select example">
                        <option value="1">Islam</option>
                        <option value="2">Kristen</option>
                        <option value="3">Hindu</option>
                        <option value="4">Khatolik</option>
                        <option value="5">Budha</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="alamat" id="alamat" class="col-sm-3 col-form-label fs-6 fw-bolder ">Alamat</label>
                    <div class="col-sm-8">
                        <textarea type="text" name="alamat" class="form-control  text-uppercase @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" rows="3">{{ old('alamat') }}</textarea>
                    </div>
                    @error('alamat')
                    <div class="text-center invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

        </div>

    
        <div class="col-md-5 "> 
            <div class="pt-2 mb-1 text-center">
                <label for="ktpimg" class="form-label fw-bold">Kartu Tanda Penduduk</label>                          
                <img src=" " class="mb-2 img-preview2 img-fluid col-sm-5 d-block " style="height: 15rem; width: 100%; ">
                <input class="form-control form-control-sm @error('image2') is-invalid @enderror" type="file" id="image2" name ="ktpimg" onchange ="previewImage2()">
                @error('ktpimg')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

    </div>

        <div class="mt-5 row">
            <div class="col-sm-6 text-end">
                <input class="px-5 mb-5 btn btn-success" type="submit" value="Simpan Data">
            </div>
        </div>
    </form>
</div>




<script>
// preview image
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