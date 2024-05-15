<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cppria;
use App\Models\cpwanita;
use App\Models\akad;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\View;
use Dompdf\Dompdf;

class CetakController extends Controller
{
    public function cetak() 
    { 
        $akad = akad::where('id_user', auth()->user()->id_user)->get()->first();

        return view('kartunikah', [
            'title' => 'Kartu Nikah',
            'akad' => $akad,
            'cpprias' => cppria::where('id_akad', $akad->id_akad)->first(),
            'cpwanitas' => cpwanita::where('id_cppria', $akad->id_akad)->first(),
        ]);
    }
}
