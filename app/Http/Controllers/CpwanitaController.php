<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cppria;
use App\Models\cpwanita;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;


class CpwanitaController extends Controller
{
    public function cpwanita($id_cpwanita){
        
        $pria_id = cppria::findOrFail($id_cpwanita);
        return view('cpwanita', compact('pria_id'),[
            'title' => 'Formulir Data'
        ]); 
    }


    public function cpwanita_ct(request $request, $id_cppria) {

        $pria_id = cppria::where('id_cppria',$id_cppria )->first();

        $cpwanita = $request->validate([
            'nik'           => 'required | numeric | digits:16 | unique:cpwanitas',
            'pasimg'        => 'required|image|mimes:jpeg,png,jpg,|max:2048',
            'ktpimg'        => 'required|image|mimes:jpeg,png,jpg,|max:2048',

        ]);

        $cpwanita = new cpwanita;
        $cpwanita->id_cppria        = $pria_id->id_cppria;
        $cpwanita->nama             = $request->nama;
        $cpwanita->nik              = $request->nik;
        $cpwanita->warganegara      = $request->warganegara;
        $cpwanita->tempat_lahir     = $request->tempat_lahir;
        $cpwanita->tanggal_lahir    = $request->tanggal_lahir;
        $cpwanita->umur             = $request->umur;
        $cpwanita->status           = $request->status;
        $cpwanita->agama            = $request->agama;
        $cpwanita->pendidikan       = $request->pendidikan;
        $cpwanita->alamat           = $request->alamat;

        if($request->file('pasimg')){
            $cpwanita['pasimg'] = $request->file('pasimg')->store('pas-img');
            if($request->file('ktpimg')){
                $cpwanita['ktpimg'] = $request->file('ktpimg')->store('ktp-img');
            }
        }
        
        $cpwanita->save();
  
        return redirect()->route('wali', $cpwanita->id_cpwanita);
    }


    public function edit($id_cpwanita) {

        $edit = cpwanita::where('id_cpwanita',$id_cpwanita )->first();

        return view('editcpwanita', [
            'cpwanita' => $edit,
            'title' => 'Edit Formulir'

        ]);
    }


    public function update(request $request, $id_cpwanita) {

        $edit = cpwanita::where('id_cpwanita',$id_cpwanita )->first();

        $cpwanitasupdate = $request->validate([
            'nama'          => 'required',
            'nik'           => [
                'required',
                'numeric',
                'digits:16',
                // Rule::unique('cpwanitas')->ignore($id_cpwanita)
            ],
            'warganegara'   => 'required',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required',
            'umur'          => 'required',
            'status'        => 'required',
            'agama'         => 'required',
            'pendidikan'    => 'required',
            'alamat'        => 'required',
            'pasimg'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ktpimg'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        if($request->file('pasimg')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
                $cpwanitasupdate['pasimg'] = $request->file('pasimg')->store('pas-img');
        }

        if($request->file('ktpimg')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
                $cpwanitasupdate['ktpimg'] = $request->file('ktpimg')->store('ktp-img');
        }
        

        cpwanita::where('id_cpwanita', $edit->id_cpwanita)
                ->update($cpwanitasupdate);
        Alert::success('Berhasil', 'Mengubah Data');
        return redirect('/profil');
    }
}
