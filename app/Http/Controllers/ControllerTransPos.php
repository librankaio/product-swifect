<?php

namespace App\Http\Controllers;

use App\Models\Mcust;
use App\Models\Mitem;
use App\Models\Tposh;
use App\Models\Tposhd;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerTransPos extends Controller
{
    public function index(){
        $customers = Mcust::select('id','code','name')->whereNull('deleted_at')->get();
        $items = Mitem::select('id','code','name','code_muom','price','code_mgrp','code_mwhse','note')->whereNull('deleted_at')->get();
        return view('pages.transaction.tpos',[
            'customers' => $customers,
            'items' => $items
        ]);
    }

    public function post(Request $request){
        $checkexist = Tposh::select('id','no')->where('no','=', $request->no)->first();
        if($checkexist == null){
            Tposh::create([
                'no' => $request->no,
                'tdt' => $request->dt,
                'code_mcust' => $request->code_cust,
                'disc' => (float) str_replace(',', '', $request->price_disc),
                'tax' => (float) str_replace(',', '', $request->price_tax),
                'grdtotal' => (float) str_replace(',', '', $request->price_total),
                'note' => $request->note,
            ]);
            $idh_loop = Tposh::select('id')->whereNull('deleted_at')->where('no','=',$request->no)->get();
            for($j=0; $j<sizeof($idh_loop); $j++){
                $idh = $idh_loop[$j]->id;
            }
    
            $countrows = sizeof($request->no_d);
            $count=0;
            for ($i=0;$i<sizeof($request->no_d);$i++){
                Tposhd::create([
                    'idh' => $idh,
                    'no_tposh' => $request->no_d[$i],
                    'code_mitem' => $request->kode_d[$i],
                    'qty' => $request->quantity[$i],
                    'code_muom' => $request->satuan_d[$i],
                    'price' => (float) str_replace(',', '', $request->harga_d[$i]),
                    'disc' => (float) str_replace(',', '', $request->disc_d[$i]),
                    'tax' => (float) str_replace(',', '', $request->tax_d[$i]),
                    'subtotal' => (float) str_replace(',', '', $request->subtot_d[$i]),
                    'note' => $request->note_d[$i],
                ]);
                $count++;
            }
            if($count == $countrows){
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }        
    }

    public function getMitem(Request $request){
        $kode = $request->kode;
        if($kode == ''){
            $items = Mitem::select('id','code','name','code_muom','price','price2','code_mgrp','code_mwhse','note')->whereNull('deleted_at')->get();
        }else{
            $items = Mitem::select('id','code','name','code_muom','price','price2','code_mgrp','code_mwhse','note')->whereNull('deleted_at')->where('code','=',$kode)->get();
        }
        return json_encode($items);
    }

    public function getedit(Tposh $tposh){
        $customers = Mcust::select('id','code','name')->whereNull('deleted_at')->get();
        $items = Mitem::select('id','code','name','code_muom','price','code_mgrp','code_mwhse','note')->whereNull('deleted_at')->get();
        $tposhds = Tposhd::select('id','idh','no_tposh','code_mitem','qty','code_muom','price','disc','tax','subtotal','note')->whereNull('deleted_at')->where('idh','=',$tposh->id)->get();
        return view('pages.transaction.tposedit',[
            'tposh' => $tposh,
            'tposhds' => $tposhds,
            'customers' => $customers,
            'items' => $items
        ]);
    }

    public function update(Tposh $tposh){
        // dd(request()->all());
        for($j=0;$j<sizeof(request('no_d'));$j++){
            $no_tposh = request('no');
        }
        DB::delete('delete from tposhds where no_tposh = ?', [$no_tposh] );
        Tposh::where('id', '=', $tposh->id)->update([
            'no' => request('no'),
            'tdt' => request('dt'),
            'code_mcust' => request('code_cust'),
            'disc' => request('price_disc'),
            'tax' => request('price_tax'),
            'grdtotal' => request('price_total'),
            'note' => request('note')
        ]);
        $count=0;
        $countrows = sizeof(request('no_d'));
        for ($i=0;$i<sizeof(request('no_d'));$i++){
            Tposhd::create([
                'idh' => $tposh->id,
                'no_tposh' => request('no_d')[$i],
                'code_mitem' => request('kode_d')[$i],
                'qty' => request('quantity')[$i],
                'code_muom' => request('satuan_d')[$i],
                'price' => request('harga_d')[$i],
                'disc' => request('disc_d')[$i],
                'tax' => request('tax_d')[$i],
                'subtotal' => request('subtot_d')[$i],
                'note' => request('note_d')[$i],
            ]);
            $count++;
        }
        
        if($count == $countrows){
            return redirect()->back();
        }
    }

    public function list(Tposh $tposh){
        $tposhs = Tposh::select('id','no','tdt','code_mcust','disc','tax','grdtotal','note')->whereNull('deleted_at')->get();
        $tposhds = Tposhd::select('id','idh','code_mitem','qty','price','subtotal','note')->whereNull('deleted_at')->get();
        return view('pages.transaction.tposlist',[
            'tposhs' => $tposhs,
            'tposhds' => $tposhds
        ]);
    }

    public function delete(Tposh $tposh){
        Tposh::find($tposh->id)->delete();
        return redirect()->back();
    }
}