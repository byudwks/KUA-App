@extends('layouts.header')

@section('container')

<div class="container">
    <div class="mt-4 row">
        <div class="mb-4 bg-opacity-50 bg-success bg-pf">
            <h6 class="py-2 text-center fs-3 ">Edit Wali Nikah</h6>
        </div>
        <div class="col-md-7">

            <form action="/calon-pengantin/wali-edit/{{ $wali->id_wali }}" method ="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3 row">
                    <label for="nama" id ="nama"class="col-sm-3 col-form-label fs-6 fw-bolder @error('nama') is-invalid @enderror">Nama Wali Nikah</label>
                    <div class="mt-1 col-sm-8">
                        <input type="text" name="nama" class="form-control text-uppercase" value="{{ old('nama', $wali->nama) }}">
                    </div>
                    @error('nama')
                    <div class="text-center invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 row">
                    <label for="nik" id="nik" class="col-sm-3 col-form-label fs-6 fw-bolder @error('nik') is-invalid @enderror">NIK Wali Nikah </label>
                    <div class="mt-1 col-sm-8">
                        <input type="text" name="nik" class="form-control text-uppercase" value="{{ old('nik', $wali->nik) }}">
                    </div>
                    @error('nik')
                    <div class="text-center invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 row">
                    <label for="hubungan" id="hubungan" class="col-sm-3 col-form-label fs-6 fw-bolder @error('hubungan') is-invalid @enderror">Hubungan</label>
                    <div class="col-sm-8">
                        <input type="text" name="hubungan" class="form-control text-uppercase" value="{{ old('hubungan', $wali->hubungan) }}">
                    </div>
                    @error('hubungan')
                    <div class="text-center invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <div class="mb-3 row">
                    <label for="agama" class="col-sm-3 col-form-label fs-6 fw-bolder">Agama</label>
                    <div class="col-sm-8">
                    <select class="form-select" name="agama" aria-label="Default select example">
                        <option value="1" {{ ($wali->agama == 1) ? 'selected' : '' }}>Islam</option>
                        <option value="2" {{ ($wali->agama == 2) ? 'selected' : '' }}>Kristen</option>
                        <option value="3" {{ ($wali->agama == 3) ? 'selected' : '' }}>Hindu</option>
                        <option value="4" {{ ($wali->agama == 4) ? 'selected' : '' }}>Khatolik</option>
                        <option value="5" {{ ($wali->agama == 5) ? 'selected' : '' }}>Budha</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="alamat" id="alamat" class="col-sm-3 col-form-label fs-6 fw-bolder @error('alamat') is-invalid @enderror">Alamat</label>
                    <div class="col-sm-8">
                        <textarea type="text" name="alamat" class="form-control text-uppercase" value="{{ old('alamat') }}" rows="3">{{ old('alamat', $wali->alamat) }}</textarea>
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
                <input type="hidden" name="oldImage" value="{{ $wali->ktpimg }}">                          
                <img src="{{ asset('storage/' . $wali->ktpimg) }}" class="mb-2 img-preview2 img-fluid col-sm-5 d-block " style="height: 15rem; width: 100%; ">
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