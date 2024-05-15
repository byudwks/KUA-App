<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CppriaController;
use App\Http\Controllers\CpwanitaController;
use App\Http\Controllers\WaliController;
use App\Http\Controllers\AkadController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', function () {
    return view('home', [
        'title' => 'Homepage'
    ]);
});
Route::get('/calon-pengantin/akad', [AkadController::class, 'akad'])->middleware(['auth', 'user']);
Route::post('/calon-pengantin/akad', [AkadController::class, 'akad_ct'])->middleware(['auth', 'user']);
Route::get('/calon-pengantin/pria/{akad:id_akad}', [CppriaController::class, 'cppria'])->name('cppria')->middleware(['auth', 'user']);
Route::post('/calon-pengantin/pria/{akad:id_akad}', [CppriaController::class, 'cppria_ct'])->middleware(['auth', 'user']);
Route::get('/calon-pengantin/wanita/{cppria:id_cppria}', [CpwanitaController::class, 'cpwanita'])->name('cpwanita')->middleware(['auth', 'user']);
Route::post('calon-pengantin/wanita/{cppria:id_cppria}', [CpwanitaController::class, 'cpwanita_ct'])->middleware(['auth', 'user']);
Route::get('/calon-pengantin/wali/{cpwanita:id_cpwanita}' , [WaliController::class, 'wali'])->name('wali')->middleware(['auth', 'user']);
Route::post('calon-pengantin/wali/{cpwanita:id_cpwanita}' , [WaliController::class, 'wali_ct'])->middleware(['auth', 'user']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/registrasi', [RegistrasiController::class, 'index'])->middleware('guest');
Route::post('/registrasi', [RegistrasiController::class, 'regis']);
Route::get('/profil', [ProfilController::class, 'profil'])->middleware(['auth', 'user']);
Route::get('/calon-pengantin/akad-edit/{akads:id_akad}', [AkadController::class, 'edit'])->middleware(['auth', 'user']);
Route::put('/calon-pengantin/akad-edit/{akads:id_akad}', [AkadController::class, 'update'])->middleware(['auth', 'user']);
Route::get('/calon-pengantin/pria-edit/{cppria:id_cppria}', [CppriaController::class, 'edit'])->middleware(['auth', 'user']);
Route::put('/calon-pengantin/pria-edit/{cppria:id_cppria}', [CppriaController::class, 'update'])->middleware(['auth', 'user']);
Route::get('/calon-pengantin/wanita-edit/{cpwanita:id_cpwanita}', [CpwanitaController::class, 'edit'])->name('cpwanitaedit')->middleware(['auth', 'user']);
Route::put('/calon-pengantin/wanita-edit/{cpwanita:id_cpwanita}', [CpwanitaController::class, 'update'])->middleware(['auth', 'user']);
Route::get('/calon-pengantin/wali-edit/{wali:id_wali}' , [WaliController::class, 'edit'])->middleware(['auth', 'user']);
Route::put('/calon-pengantin/wali-edit/{wali:id_wali}' , [WaliController::class, 'update'])->middleware(['auth', 'user']);
Route::get('/cetak', [CetakController::class, 'cetak'])->name('cetak')->middleware(['auth', 'user']);
Route::get('/admin', [AdminController::class,  'admin'])->middleware(['auth', 'admin']);
Route::post('/calon-pengantin/akad/{akad:id_akad}', [AkadController::class, 'ubah'])->middleware(['auth', 'admin']);
Route::put('/profil/upload-struk/{akad:id_akad}', [AkadController::class, 'updata'])->middleware(['auth', 'user']);
Route::get('/admin-rekap' , [AdminController::class, 'rekap']);