<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\akad;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\session;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;




class AkadController extends Controller
{
    public function akad() {
        return view('akad',[
            'title' => 'Formulir Data'
        ]);
    }

    public function akad_ct(request $request) {

        $user_id = auth()->user()->id_user;

        $cek_userid = akad::where('id_user', $user_id)->first();
        if ($cek_userid) {
            Session::flash('message' , ' User ID Anda Sudah Terdaftar');
            Session::flash('alert-class' , 'alert-danger');
            return back();
        }

        $akaddata = $request->validate([
            'tanggal_akad'   => 'required',
            'jam_akad'       => 'required',
            'lokasi'         => 'required',
            'nohp'           => 'required | numeric | digits:12',
        ]);

        $akaddata = new akad;
        $akaddata->token        = mt_rand(0, 9999999999999999);
        $akaddata->tanggal_akad = $request->tanggal_akad;
        $akaddata->jam_akad     = $request->jam_akad;
        $akaddata->lokasi       = $request->lokasi;
        $akaddata->status       = 'Belum Sah';
        $akaddata->nohp         = $request->nohp;

        if($request->input('alamat')){
            $akaddata['alamat'] = $request->input('alamat');
        }
        
        $akaddata['id_user'] = auth()->user()->id_user;

        $akaddata->save();
        return redirect()->route('cppria', $akaddata->id_akad);
    }

    public function edit($id_akad) {

        $edit = akad::where('id_akad',$id_akad )->first();

        return view('editakad', [
            'akad' => $edit,
            'title' => 'Edit Formulir'
        ]);
    }

    public function update(Request $request, $id_akad){
        
        $edit = akad::where('id_akad',$id_akad )->first();

        $akaddata = $request->validate([
            'tanggal_akad'   => 'required',
            'jam_akad'       => 'required',
            'lokasi'         => 'required',
            'nohp'           => 'required | numeric | digits:12',
        ]);

        if($request->input('alamat')){
            $akaddata['alamat'] = $request->input('alamat');
        }
        $akaddata['id_user'] = auth()->user()->id_user;

        akad::where('id_akad', $edit->id_akad)
                ->update($akaddata);
        Alert::success('Berhasil', 'Mengubah Data');
        return redirect('/profil');

    }

    
    public function ubah($id_akad) {
        
        $akad = akad::find($id_akad);

        if (!$akad->strimg) {
            Alert::error('Gagal Konfirmasi', 'Belum Mengupload Foto Akad Nikah');
            return back();
        }

        $akad->status = 'Sah';
        $akad->save();

        Alert::success('Berhasil', 'Mengkonfirmasi Status');
        return back();
    }
    
    
    public function updata(Request $request, $id_akad) {
    
            $upimg = akad::where('id_akad', $id_akad)->first();
    
            $updata = $request->validate([
                'strimg' => 'required|image|mimes:jpeg,png,jpg|max:2048'
            ]);
    
            if($request->file('strimg')){
                if($request->oldImage) {
                    Storage::delete($request->oldImage);
                }
                $updata['strimg'] = $request->file('strimg')->store('str-img');
            }
    
            $updata['id_user'] = auth()->user()->id_user;
    
            akad::where('id_akad', $upimg->id_akad)->update($updata);
            Alert::success('Berhasil', 'Upload Gambar Struk');
            return redirect('/profil');
    }
}
