<?php

namespace App\Http\Controllers;

use App\Models\wali;
use App\Models\cpwanita;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;



class WaliController extends Controller
{
    public function wali($id_cpwanita){  
            $wanita_id = cpwanita::findOrFail($id_cpwanita);
            return view('wali', compact('wanita_id'),[
                'title' => 'Formulir Data'
            ]); 
    }


    public function wali_ct(request $request, $id_cpwanita) {

        $wanita_id = cpwanita::where('id_cpwanita',$id_cpwanita )->first();

        $datawali = $request->validate([
            'nik'           => 'required | numeric | digits:16 | unique:walis',
            'ktpimg'       => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);


        $datawali = new wali;
        $datawali->id_cpwanita  = $wanita_id->id_cpwanita;
        $datawali->nama         = $request->nama;
        $datawali->nik          = $request->nik;
        $datawali->hubungan     = $request->hubungan;
        $datawali->agama        = $request->agama;
        $datawali->alamat       = $request->alamat;

        if($request->file('ktpimg')){
            $datawali['ktpimg'] = $request->file('ktpimg')->store('ktp-img');
        }

        $datawali->save();
        Alert::success('Berhasil', 'Mengisi Formulir');
        return redirect('/home');
    }

    public function edit($id_wali) {

        $edit = wali::where('id_wali',$id_wali )->first();

        return view('editwali', [
            'wali' => $edit,
            'title' => 'Edit Formulir'
        ]);
    }

    public function update(request $request, $id_wali) {

        $edit = wali::where('id_wali',$id_wali )->first();

        $waliupdate = $request->validate([
            'nama'          => 'required',
            'nik'           => [
                'required',
                'numeric',
                'digits:16',
                // Rule::unique('walis')->ignore($id_wali)
            ],
            'hubungan'      => 'required',
            'agama'         => 'required',
            'alamat'        => 'required',
            'ktpimg'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        if($request->file('ktpimg')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
                $waliupdate['ktpimg'] = $request->file('ktpimg')->store('ktp-img');
        }
        

        wali::where('id_wali', $edit->id_wali)
                ->update($waliupdate);
        Alert::success('Berhasil', 'Mengubah Data');
        return redirect('/profil');
    }
    
}
