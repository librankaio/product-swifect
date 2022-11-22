<?php

namespace App\Http\Controllers;

use App\Models\Msupp;
use Illuminate\Http\Request;

class ControllerMasterSupp extends Controller
{
    public function index(){
        $datas = Msupp::select('id','code','name','address','npwp','cp','phone')->whereNull('deleted_at')->get();
        return view('pages.master.msupp',[
            'datas' => $datas
        ]);
    }

    public function post(Request $request){
        $checkexist = Msupp::select('id','code','name')->where('code','=', $request->kode)->first();
        if($checkexist == null){
            Msupp::create([
                'code' => $request->kode,
                'name' => $request->nama,
                'address' => $request->address,
                'npwp' => $request->npwp,
                'cp' => $request->cp,
                'phone' => $request->phone,
            ]);
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    public function getedit(Msupp $msupp){
        return view('pages.master.msuppedit',[ 'msupp' => $msupp]);
    }

    public function update(Msupp $msupp){
        Msupp::where('id', '=', $msupp->id)->update([
            'code' => request('kode'),
            'name' => request('nama'),
            'address' => request('address'),
            'npwp' => request('npwp'),
            'cp' => request('cp'),
            'phone' => request('phone'),
        ]);

        return redirect()->route('msupp');
    }

    public function delete(Msupp $msupp){
        Msupp::find($msupp->id)->delete();
        return redirect()->route('msupp');
    }
}
