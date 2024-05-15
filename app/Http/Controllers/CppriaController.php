<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cppria;
use App\Models\cpwanita;
use App\Models\akad;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;


class CppriaController extends Controller
{

    public function cppria($id_akad){
        $akad_id = akad::findOrFail($id_akad);
        return view('cppria', compact('akad_id') , [
            'title' => 'Formulir Data'
        ]);
    }


    public function cppria_ct(request $request, $id_akad) {

        $akad_id = akad::where('id_akad',$id_akad )->first();

        $cppria = $request->validate([
            'nama'          => 'required',
            'nik'           => 'required | numeric | digits:16 | unique:cpprias',
            'warganegara'   => 'required',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required',
            'umur'          => 'required',
            'status'        => 'required',
            'agama'         => 'required',
            'pendidikan'    => 'required',
            'alamat'        => 'required',
            'pasimg'        => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'ktpimg'        => 'required|image|mimes:jpeg,png,jpg|max:2048',

        ]);

        $cppria = new cppria;
        $cppria->id_akad          = $akad_id->id_akad;
        $cppria->nama             = $request->nama;
        $cppria->nik              = $request->nik;
        $cppria->warganegara      = $request->warganegara;
        $cppria->tempat_lahir     = $request->tempat_lahir;
        $cppria->tanggal_lahir    = $request->tanggal_lahir;
        $cppria->umur             = $request->umur;
        $cppria->status           = $request->status;
        $cppria->agama            = $request->agama;
        $cppria->pendidikan       = $request->pendidikan;
        $cppria->alamat           = $request->alamat;


        if($request->file('pasimg')){
            $cppria['pasimg'] = $request->file('pasimg')->store('pas-img');
            if($request->file('ktpimg')){
                $cppria['ktpimg'] = $request->file('ktpimg')->store('ktp-img');
            }
        }

        $cppria->save();
        return redirect()->route('cpwanita', $cppria->id_cppria);
    }


    public function edit($id_cppria) {

        $edit = cppria::where('id_cppria',$id_cppria )->first();

        return view('editcppria', [
            'cppria' => $edit,
            'title' => 'Edit Formulir'
        ]);
    }



    public function update(request $request, $id_cppria) {

        $edit = cppria::where('id_cppria',$id_cppria )->first();
        $cpwanitas = cpwanita::where('id_cppria', $id_cppria)->first();

        $cppriaupdate = $request->validate([
            'nama'          => 'required',
            'nik'           => [
                'required',
                'numeric',
                'digits:16',
                // Rule::unique('cpprias')->ignore($id_cppria)
            ],
            'warganegara'   => 'required',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required',
            'umur'          => 'required',
            'status'        => 'required',
            'agama'         => 'required',
            'pendidikan'    => 'required',
            'alamat'        => 'required',
            'pasimg'        => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ktpimg'        => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        if($request->file('pasimg')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
                $cppriaupdate['pasimg'] = $request->file('pasimg')->store('pas-img');
        }

        if($request->file('ktpimg')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
                $cppriaupdate['ktpimg'] = $request->file('ktpimg')->store('ktp-img');
        }
        

        cppria::where('id_cppria', $edit->id_cppria)
                ->update($cppriaupdate);
         return redirect()->route('cpwanitaedit', $cpwanitas->id_cppria);
    }
}