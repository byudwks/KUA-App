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
use Illuminate\Support\Str;


class AdminController extends Controller
{
    public function admin(Request $request,) {
        $akad = Akad::latest();
    
        if ($request->input('search')) {
            $akad->where('created_at', 'like', '%' . $request->input('search') . '%');
        }
    
        $akads = $akad->with('cppria', 'cppria.cpwanita')->get(); 
        
        session(['filtered_akads' => $akads]);
    
        return view('admin', [
            'akads' => $akads,
        ]);
    }

    public function rekap(){

        $filteredAkads = session('filtered_akads');
        
        return view('rekap', [
            'filteredAkads' => $filteredAkads
        ]);
    }
    
}