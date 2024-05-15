@extends('layouts.navbar')

@section('container')

@include('sweetalert::alert')

<div class="container-fluid text-end w-100 position-relative">
    <div class="row">
        <img src="/img/hero-img.jpg" alt="" class="image-fluid" style ="height: 550px;">
    </div>
    <div class="hero-text text-start" >
        <h1 class ="text-capitalize fw-bold ">sistem infromasi</h1>
        <h1 class ="text-capitalize fw-bold ">Manejemen nikah</h1>
        <div class="d-flex align-items-center mt-4">
          <img src="/img/kua.png" alt="" style="height: 70px; width: 75px">
          <h4 class="ms-3 mt-3 text-uppercase fs-6 fw-bold">Kantor Urusan Agama <br> Kecamatan Trimurjo</h4>
        </div>
        </br>
        <a href="/calon-pengantin/akad"class="btn btn-success btn-md mt-4 px-4 py-3 fw-bold">Daftar Nikah</a>
    </div>
</div>


<div class="container mt-5" id="alur">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="fw-bold mt-5">Alur Pendaftaran Online</h1>
        </div>
    </div> 
    <div class="row">
        <div class="col-sm-4">
            <img src="{{ asset('img/step_1_online.svg') }}" alt="Deskripsi gambar" style="height:600px; width:300px">
            <div class="row">
                <div class="col-sm-2 bg-success rounded-circle text-center p-2 fs-3 fw-bold text-light">
                    1
                </div>
                <div class="col-sm-10 fs-4 text-secondary fw-bold mt-2">
                    Langkah Pertama
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12 fs-6 text-secondary fw-bold ">
                    <ul>
                        <li class="mt-2">Kunjungi Website SIMKAH http://simkah.kemenag.go.id</li>
                        <li class="mt-4">Pilih Menu Masuk/Daftar.</li>
                        <li class="mt-4">Apabila kamu sudah mendaftar dan sudah mempunyai akun maka perlu , maka kamu bisa langsung masuk.</li>
                        <li class="mt-4">Kamu akan di arahkan ke menu dashboard area, silahkan lengkapi data diri kamu.</li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="col-sm-4">
            <img src="{{ asset('img/step_2_online.svg') }}" alt="Deskripsi gambar" style="height:600px; width:300px">
            <div class="row">
                <div class="col-sm-2 bg-success rounded-circle text-center p-2 fs-3  fw-bold text-light">
                    2
                </div>
                <div class="col-sm-10 fs-4 text-secondary fw-bold mt-2">
                    Langkah Kedua
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12 fs-6 text-secondary fw-bold ">
                    <ul>
                        <li class="mt-2">Pilih menu Daftar Nikah pada dashboard area.</li>
                        <li class="mt-4">Isi dan lengkapi semua form-form yang disediakan.</li>
                        <li class="mt-4">Pernikahan di kenakan biaya layanan sebesar Rp.300.000, bagi calon pengantin</li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="col-sm-4">
            <img src="{{ asset('img/step_3_online.svg') }}" alt="Deskripsi gambar" style="height:600px; width:300px">
            <div class="row">
                <div class="col-sm-2 bg-success rounded-circle text-center  p-2 fs-3 fw-bold text-light">
                    3
                </div>
                <div class="col-sm-10 fs-4 text-secondary fw-bold mt-2">
                    Langkah Ketiga
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12 fs-6 text-secondary fw-bold ">
                    <ul>
                        <li class="mt-2">Pemeriksaan data nikah calon pengantin dan wali nikah di KUA tempat akad nikah oleh petugas KUA.</li>
                        <li class="mt-4">Pelaksanaan akad nikah dan penyerahan buku nikah di lokasi nikah apabila pernikahan dilaksanakan diluar kantor KUA.</li>
                        <li class="mt-4">Pelaksanaan akad nikah dan penyerahan buku nikah di kantor KUA apabila pernikahan dilaksanakan di kantor KUA.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5" id="kontak">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="fw-bold mt-5">Kontak</h1>
        </div>
    </div> 
    <div class="row mt-5">
        <div class="col-md-3 text-center">
            <img src="{{ asset('img/sms_whatsapp.svg') }}" alt="Deskripsi gambar" style="height:55px; width:55px">
            <h5 class="fs-6 text-secondary fw-bold">(+62)811-1890-444 / (021)31924509,3193056</h5>
        </div>
        <div class="col-md-3 text-center">
            <img src="{{ asset('img/mail.svg') }}" alt="Deskripsi gambar" style="height:55px; width:55px">
            <h5 class="fs-6 text-secondary fw-bold">kuatrimurjolamteng@gmail.com</h5>
        </div>
        <div class="col-md-3 text-center">
            <img src="{{ asset('img/location.svg') }}" alt="Deskripsi gambar" style="height:55px; width:55px">
            <h5 class="fs-6 text-secondary fw-bold">Jln. Raya Simbarwaringin Kec. Trimurjo Kp. 34172</h5>
        </div>
        <div class="col-md-3 text-center">
            <img src="{{ asset('img/operasional.svg') }}" alt="Deskripsi gambar" style="height:55px; width:55px">
            <h5 class="fs-6 text-secondary fw-bold">09.00 - 17.00 (Senin sampai Jumat, Sabtu & Ahad Libur)</h5>
        </div>
    </div>
</div>


<div class="contianer border-top" style ="margin-top : 10rem;">
    <div class="row">
        <div class="col-md-12 text-center">
            <img src="/img/logo.png" alt="" width="200" height="50" class="border-none mt-5">
            <h5 class="fs-6 text-secondary fw-bold mt-5">Kami adalah bagian dari Kementerian Agama Republik Indonesia di bawah naungan</h5>
            <h5 class="fs-6 text-secondary fw-bold">Direktorat Jenderal Bimbingan Masyarakat Islam yang menyajikan seluruh informasi mengenai pernikahan.</h5>  
        </div>
    </div>

        <div class="row">
          <div class="col-md-12 d-flex justify-content-center my-4">
            <a href=""><img src="{{ asset('img/facebook.svg') }}" alt="Deskripsi gambar" style="height:25px; width:25px" class="mx-2"></a>
            <a href=""><img src="{{ asset('img/instagram.svg') }}" alt="Deskripsi gambar" style="height:25px; width:25px" class="mx-2"></a>
            <a href=""><img src="{{ asset('img/twitter.svg') }}" alt="Deskripsi gambar" style="height:25px; width:25px" class="mx-2"></a>
        </div>
        <h5 class="fs-6 text-black-50 fw-bold text-center" style ="margin-top : 3rem;">Copyright &#169; 2023 Kantor Urusan Agama Trimurjo All rigths reserved</h5>  
        </div>

@endsection