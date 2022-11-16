<?php

namespace App\Http\Controllers;

use App\Models\Mbank;
use Illuminate\Http\Request;

class ControllerMasterBank extends Controller
{
    public function index(){
        $datas = Mbank::select('id','code','name','note')->whereNull('deleted_at')->get();
        return view('pages.master.mbank',[
            'datas' => $datas
        ]);
    }

    public function post(Request $request){
        Mbank::create([
            'code' => $request->kode,
            'name' => $request->nama,
            'note' => $request->note,
        ]);
        return redirect()->back();
    }

    public function getedit(Mbank $mbank){
        // dd($mbank);
        return view('pages.master.mbankedit',[ 'mbank' => $mbank]);
    }

    public function update(Mbank $mbank){
        Mbank::where('id', '=', $mbank->id)->update([
            'code' => request('kode'),
            'name' => request('nama'),
            'note' => request('note'),
        ]);

        return redirect()->route('mbank');
    }

    public function delete(Mbank $mbank){
        Mbank::find($mbank->id)->delete();
        return redirect()->route('mbank');
    }
}
