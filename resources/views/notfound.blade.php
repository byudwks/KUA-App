@extends('layouts.header')

@section('container')
<div class="container-fluid d-flex justify-content-between align-items-center">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ms-5 mt-2 fs-5">
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
                        <button type="submit" class="dropdown-item text-light bg-danger bg-opacity-50">Logout <i class="bi bi-box-arrow-in-right"></i></button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 text-center" style="margin-top: 10rem;">
        <h1>Anda Belum Mengisi Formulir</h1>
    </div>
</div>


@endsection