@extends('layouts.header')

@section('container')


<div class="container">
    <div class="mt-4 row">
        <div class="mb-4 bg-opacity-50 bg-success bg-pf">
            <h6 class="py-2 text-center fs-3 ">Edit Pelaksaan Akad Nikah</h6>
        </div>
        <div class="col-md-7">

            <form action="/calon-pengantin/akad-edit/{{ $akad->id_akad }}" method ="post">
                @method('put')
                @csrf
                <div class="mb-3 row">
                    <label for="tanggal_akad" id="tanggal_akad" class="col-sm-3 col-form-label fs-6 fw-bolder">Tanggal Akad</label>
                    <div class="col-sm-8">
                        <input type="date" name="tanggal_akad" class="form-control" value="{{ old('tanggal_akad', $akad->tanggal_akad) }}">
                    </div>
                    @error('tanggal_akad')
                    <div class="text-center invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 row">
                    <label for="jam_akad" id="jam_akad" class="col-sm-3 col-form-label fs-6 fw-bolder">Waktu Akad</label>
                    <div class="col-sm-8">
                        <input type="time" name="jam_akad" class="form-control " value="{{ old('jam_akad', $akad->jam_akad) }}">
                    </div>
                    @error('jam_akad')
                    <div class="text-center invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 row">
                    <label for="nohp" id="nohp" class="col-sm-3 col-form-label fs-6 fw-bolder">No HP</label>
                    <div class="col-sm-8">
                        <input type="text" name="nohp" class="form-control @error('nohp') is-invalid @enderror" value="{{ old('nohp', $akad->nohp) }}">
                    </div>
                    @error('nohp')
                    <div class="text-center invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            
                <div class="mb-3 row">
                    <label for="lokasi" class="col-sm-3 col-form-label fs-6 fw-bolder">Lokasi Akad Nikah</label>
                    <div class="col-sm-8">
                        <select class="form-select" name="lokasi" aria-label="Default select example" id="lokasi" value="{{ old('lokasi', $akad->lokasi) }}">
                        <option value="1" {{ ($akad->lokasi == 1) ? 'selected' : '' }}>Kantor Urusan Agama Kec. Trimurjo</option>
                        <option value="2" {{ ($akad->lokasi == 2) ? 'selected' : '' }}>Di luar KUA</option>
                        </select>
                    </div>
                    @error('lokasi')
                    <div class="text-center invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 row" id="alamat-input" style="display:none">
                    <label for="alamat" id="alamat" class="col-sm-3 col-form-label fs-6 fw-bolder text-light">Alamat Akad Nikah</label>
                    <div class="col-sm-8">
                        <h6 class="fs-6 fw-light fst-italic">* jika lokasi di luar KUA, silakan isikan alamat di bawah *</h6>
                        <textarea type="text" name="alamat" class="form-control text-uppercase" value="{{ old('alamat', $akad->alamat) }}" rows="3" >{{ ($akad->lokasi == 2) ? $akad->alamat : old('alamat') }}</textarea>
                    </div>
                    @error('alamat')
                    <div class="text-center invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mt-5 row">
                    <div class="mx-auto col-sm-6">
                        <input class="px-5 mb-5 btn btn-success" type="submit" value="Lanjutkan">
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


       // saat halaman dimuat
       document.addEventListener('DOMContentLoaded', function() {
        // jika nilai select adalah 2 (Di luar KUA), tampilkan form alamat
        if (document.getElementById('lokasi').value == 2) {
            document.getElementById('alamat-input').style.display = 'flex';
        }
    });

    // saat nilai select diubah
    document.getElementById('lokasi').addEventListener('change', function() {
        // jika nilai select adalah 2 (Di luar KUA), tampilkan form alamat
        if (this.value == 2) {
            document.getElementById('alamat-input').style.display = 'flex';
        } else {
            document.getElementById('alamat-input').style.display = 'none';
        }
    });
</script>

 
@endsection