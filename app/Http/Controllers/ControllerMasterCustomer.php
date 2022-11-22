<?php

namespace App\Http\Controllers;

use App\Models\Mcust;
use Illuminate\Http\Request;

class ControllerMasterCustomer extends Controller
{
    public function index(){
        $datas = Mcust::select('id','code','name','address','npwp','cp','phone')->whereNull('deleted_at')->get();
        return view('pages.master.mcustomer',[
            'datas' => $datas
        ]);
    }

    public function post(Request $request){
        $checkexist = Mcust::select('id','code','name')->where('code','=', $request->kode)->first();
        if($checkexist == null){
            Mcust::create([
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

    public function getedit(Mcust $mcust){
        return view('pages.master.mcustomeredit',[ 'mcust' => $mcust]);
    }

    public function update(Mcust $mcust){
        Mcust::where('id', '=', $mcust->id)->update([
            'code' => request('kode'),
            'name' => request('nama'),
            'address' => request('address'),
            'npwp' => request('npwp'),
            'cp' => request('cp'),
            'phone' => request('phone'),
        ]);

        return redirect()->route('mcust');
    }

    public function delete(Mcust $mcust){
        Mcust::find($mcust->id)->delete();
        return redirect()->route('mcust');
    }
}
