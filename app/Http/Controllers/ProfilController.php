<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cppria;
use App\Models\cpwanita;
use App\Models\akad;
use App\Models\wali;
use App\Models\user;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;



class ProfilController extends Controller
{
    public function profil() {
        $akad = akad::where('id_user', auth()->user()->id_user)->get()->first();

        if (!$akad) {
            return view('notfound', [
                'title' => 'Profil'
            ]);
        }
        
        return view('profil', [
            'title' => 'Profil',
            'akads' => $akad,
            'cpprias' => cppria::where('id_akad', $akad->id_akad)->first(),
            'cpwanitas' => cpwanita::where('id_cppria', $akad->id_akad)->first(),
            'walis' => wali::where('id_cpwanita', $akad->id_akad)->first()
        ]);
    }
}
