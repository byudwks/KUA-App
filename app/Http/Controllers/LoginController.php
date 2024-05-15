<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index() {
        return view('login', [
            'title' => 'Login   '
        ]);
    }

    public function login(Request $request)
    {
        $datalogin = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($datalogin)){

            $request->session()->regenerate();
            if(Auth::user()->id_role == 1){
                toast('Login Berhasil','success');
                return redirect('/admin');
            }
            
            if(Auth::user()->id_role == 2) {
                toast('Login Berhasil','success');
                return redirect('/home');
            }
        }
        Alert::error('Gagal Login', 'Silahkan Ulangi Proses');
        return redirect('/login');
    }

    public function logout(){
        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/home');
    }

}
