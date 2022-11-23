<?php

namespace App\Http\Controllers;

use App\Models\Mgrp;
use App\Models\Mitem;
use App\Models\Muom;
use App\Models\Mwhse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerMasterDataBrg extends Controller
{
    public function index(){
        $datas = Mitem::select('id','code','name','code_muom','price','price2','code_mgrp','code_mwhse','admin_id','note')->whereNull('deleted_at')->get();
        $muoms = Muom::select('id','code','name')->whereNull('deleted_at')->get();
        $mgrps = Mgrp::select('id','code','name')->whereNull('deleted_at')->get();
        $mwhses = Mwhse::select('id','code','name', 'location')->whereNull('deleted_at')->get();
        return view('pages.master.mdatabrg',[
            'datas' => $datas,
            'muoms' => $muoms,
            'mgrps' => $mgrps,
            'mwhses' => $mwhses
        ]);
    }

    public function post(Request $request){        
        $checkexist = Mitem::select('id','code','name')->where('code','=', $request->kode)->first();
        // dd($checkexist);
        if($checkexist == null){
            Mitem::create([
                'code' => $request->kode,
                'name' => $request->nama,
                'code_muom' => $request->satuan,
                'price' => (float) str_replace(',', '', $request->hrgbeli),
                'price2' => (float) str_replace(',', '', $request->hrgjual),
                'code_mgrp' => $request->itemgrp,
                'code_mwhse' => $request->lokasi,
                'note' => $request->note,
            ]);
            return redirect()->back();
        }else{
            return redirect()->back();
        }        
    }

    public function getedit(Mitem $mitem){
        $muoms = Muom::select('id','code','name')->whereNull('deleted_at')->get();
        $mgrps = Mgrp::select('id','code','name')->whereNull('deleted_at')->get();
        $mwhses = Mwhse::select('id','code','name', 'location')->whereNull('deleted_at')->get();
        return view('pages.master.mdatabrgedit',[ 
            'mitem' => $mitem,
            'muoms' => $muoms,
            'mgrps' => $mgrps,
            'mwhses' => $mwhses,
        ]);
    }

    public function update(Mitem $mitem){
        Mitem::where('id', '=', $mitem->id)->update([
            'code' => request('kode'),
            'name' => request('nama'),
            'code_muom' => request('satuan'),
            'price' => request('hrgbeli'),
            'price2' => request('hrgjual'),
            'code_mgrp' => request('itemgrp'),
            'code_mwhse' => request('lokasi'),
            'note' => request('note'),
        ]);

        return redirect()->route('mbrg');
    }

    public function delete(Mitem $mitem){
        Mitem::find($mitem->id)->delete();
        return redirect()->route('mbrg');
    }
}
