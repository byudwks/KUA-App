@extends('layouts.header')

@section('container')

<div class="container">
    <div class="row mt-4">
        <div class="bg-success bg-opacity-50 bg-pf mb-4">
            <h6 class="text-center py-2 fs-3 ">Edit Calon Pengantin Pria</h6>
        </div>
        <div class="col-md-7">

            <form action="" method ="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3 row">
                    <label for="nama" id ="nama"class="col-sm-3 col-form-label fs-6 fw-bolder @error('nama') is-invalid @enderror">Nama Calon Pengatin Pria</label>
                    <div class="col-sm-8 mt-3">
                        <input type="text" name="nama" class="form-control text-uppercase" value="{{ old('nama', $cppria->nama) }}">
                    </div>
                    @error('nama')
                    <div class="invalid-feedback text-center">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 row">
                    <label for="nik" id="nik" class="col-sm-3 col-form-label fs-6 fw-bolder @error('nik') is-invalid @enderror">NIK Calon Pengatin Pria </label>
                    <div class="col-sm-8 mt-3">
                        <input type="text" name="nik" class="form-control" value="{{ old('nik', $cppria->nik) }}">
                    </div>
                    @error('nik')
                    <div class="invalid-feedback text-center">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 row">
                    <label for="warganegara" id="warganegara" class="col-sm-3 col-form-label fs-6 fw-bolder @error('warganegara') is-invalid @enderror">Warganegara</label>
                    <div class="col-sm-8">
                        <input type="text" name="warganegara" class="form-control text-uppercase" value="{{ old('warganegara', $cppria->warganegara) }}">
                    </div>
                    @error('warganegara')
                    <div class="invalid-feedback text-center">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 row">
                    <label for="tempat_lahir" id="tempat_lahir" class="col-sm-3 col-form-label fs-6 fw-bolder @error('tempat_lahir') is-invalid @enderror">Tempat Lahir</label>
                    <div class="col-sm-8">
                        <input type="text" name="tempat_lahir" class="form-control text-uppercase" value="{{ old('tempat_lahir', $cppria->tempat_lahir) }}">
                    </div>
                    @error('tempat_lahir')
                    <div class="invalid-feedback text-center">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 row">
                    <label for="tanggal_lahir" id="tanggal_lahir" class="col-sm-3 col-form-label fs-6 fw-bolder @error('tanggal_lahir') is-invalid @enderror">Tanggal Lahir</label>
                    <div class="col-sm-8">
                        <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $cppria->tanggal_lahir) }}">
                    </div>
                    @error('tanggal_lahir')
                    <div class="invalid-feedback text-center">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 row">
                    <label for="umur" id="umur" class="col-sm-3 col-form-label fs-6 fw-bolder @error('umur') is-invalid @enderror">Umur</label>
                    <div class="col-sm-8">
                        <input type="number" name="umur" class="form-control" value="{{ old('umur', $cppria->umur) }}">
                    </div>
                    @error('umur')
                    <div class="invalid-feedback text-center">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 row">
                    <label for="status" class="col-sm-3 col-form-label fs-6 fw-bolder @error('status') is-invalid @enderror">Status</label>
                    <div class="col-sm-8">
                    <select class="form-select" name="status" aria-label="Default select example">
                        <option value="1" {{ ($cppria->status == 1) ? 'selected' : '' }}>Perjaka</option>
                        <option value="2" {{ ($cppria->status == 2) ? 'selected' : '' }}>Duda</option>
                        <option value="3" {{ ($cppria->status == 3) ? 'selected' : '' }}>Perawan</option>
                        <option value="4" {{ ($cppria->status == 4) ? 'selected' : '' }}>Janda</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="agama" class="col-sm-3 col-form-label fs-6 fw-bolder @error('agama') is-invalid @enderror">Agama</label>
                    <div class="col-sm-8">
                    <select class="form-select" name="agama" aria-label="Default select example">
                        <option value="1" {{ ($cppria->agama == 1) ? 'selected' : '' }}>Islam</option>
                        <option value="2" {{ ($cppria->agama == 2) ? 'selected' : '' }}>Kristen</option>
                        <option value="3" {{ ($cppria->agama == 3) ? 'selected' : '' }}>Hindu</option>
                        <option value="4" {{ ($cppria->agama == 4) ? 'selected' : '' }}>Khatolik</option>
                        <option value="5" {{ ($cppria->agama == 5) ? 'selected' : '' }}>Budha</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="pendidikan"id="pendidikan" class="col-sm-3 col-form-label fs-6 fw-bolder @error('pendidikan') is-invalid @enderror">Pendidikan terahir</label>
                    <div class="col-sm-8">
                        <input type="text" name="pendidikan" class="form-control text-uppercase" value="{{ old('pendidikan', $cppria->pendidikan) }}">
                    </div>
                    @error('pendidikan')
                    <div class="invalid-feedback text-center">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 row">
                    <label for="alamat" id="alamat" class="col-sm-3 col-form-label fs-6 fw-bolder @error('alamat') is-invalid @enderror">Alamat</label>
                    <div class="col-sm-8">
                        <textarea type="text" name="alamat" class="form-control text-uppercase"  value="{{ old('alamat', $cppria->alamat) }}" rows="3">{{ old('alamat', $cppria->alamat) }}</textarea>
                    </div>
                    @error('alamat')
                    <div class="invalid-feedback text-center">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

        </div>

    
        <div class="col-md-5 "> 
            <div class="mb-1 text-center">
                <label for="pasimg" class="form-label fw-bold ">Pas Foto 4x6</label>  
                <input type="hidden" name="oldImage" value="{{ $cppria->pasimg }}">
                <img src="{{ asset('storage/' . $cppria->pasimg) }} " class="img-preview1 img-fluid mb-2 col-sm-5 d-block mx-auto " style="height: 15rem; width: 45%; ">
                <input class="form-control form-control-sm @error('pasimg') is-invalid @enderror" type="file" id="image1" name ="pasimg" onchange ="previewImage1()" >
                @error('pasimg')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-1 pt-4 text-center">
                <label for="ktpimg" class="form-label fw-bold">Kartu Tanda Penduduk</label>
                <input type="hidden" name="oldImage" value="{{ $cppria->ktpimg }}">                          
                <img src="{{ asset('storage/' . $cppria->ktpimg) }}" class="img-preview2 img-fluid mb-2 col-sm-5 d-block " style="height: 15rem; width: 100%; ">
                <input class="form-control form-control-sm @error('ktpimg') is-invalid @enderror" type="file" id="image2" name ="ktpimg" onchange ="previewImage2()">
                @error('ktpimg')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

    </div>

        <div class="row text-center mt-5">
            <div class="col-sm-6 mx-auto">
                <input class="btn btn-success px-5 mb-5" type="submit" value="Next">
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