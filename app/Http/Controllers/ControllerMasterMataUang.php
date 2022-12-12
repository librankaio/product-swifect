<?php

namespace App\Http\Controllers;

use App\Models\Mmatauang;
use Illuminate\Http\Request;

class ControllerMasterMataUang extends Controller
{
    public function index(Mmatauang $mmatauang){
        // $datas = DB::table('muom')->select('code','name','id')->get();
        $datas = Mmatauang::select('id','code','name')->whereNull('deleted_at')->get();
        // dd($datas);
        return view('pages.master.mmatauang',[
            'datas' => $datas,
        ]);
    }

    public function post(Request $request){
        $checkexist = Mmatauang::select('id','code','name')->where('code','=', $request->kode)->first();
        if($checkexist == null){
            Mmatauang::create([
                'code' => $request->kode,
                'name' => $request->nama,
            ]);
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    public function getedit(Mmatauang $mmatauang){
        // dd($muom);
        return view('pages.master.mmatauangedit',[ 'mmatauang' => $mmatauang]);
    }

    public function update(Mmatauang $mmatauang){
        // dd(request()->all());
        Mmatauang::where('id', '=', $mmatauang->id)->update([
            'code' => request('kode'),
            'name' => request('nama'),
        ]);

        return redirect()->route('mmatauang');
    }

    public function delete(Mmatauang $mmatauang){
        // dd($muom);
        Mmatauang::find($mmatauang->id)->delete();
        return redirect()->route('mmatauang');
    }
}
