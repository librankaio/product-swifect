<?php

namespace App\Http\Controllers;

use App\Models\Mbank;
use App\Models\Tbayaropsd;
use App\Models\Tbayaropsh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerTransBayarOps extends Controller
{
    public function index(){
        $banks = Mbank::select('id','code','name')->whereNull('deleted_at')->get();
        return view('pages.transaction.tbayarops',[
            'banks' => $banks
        ]);
    }

    public function post(Request $request){
        // dd($request->all());

        $checkexist = Tbayaropsh::select('id','no')->where('no','=', $request->no)->first();
        if($checkexist == null){
            Tbayaropsh::create([
                'no' => $request->no,
                'tdt' => $request->dt,
                'jenis' => $request->jenis,
                'akun_pembayaran' => $request->akun_bayar,
                'noref' => $request->noref,
                'total' => $request->nominal,
                'grdtotal' => (float) str_replace(',', '', $request->grand_total),
            ]);
            $idh_loop = Tbayaropsh::select('id')->whereNull('deleted_at')->where('no','=',$request->no)->get();
            for($j=0; $j<sizeof($idh_loop); $j++){
                $idh = $idh_loop[$j]->id;
            }
    
            $countrows = sizeof($request->no_d);
            $count=0;
            for ($i=0;$i<sizeof($request->no_d);$i++){
                Tbayaropsd::create([
                    'idh' => $idh,
                    'no_tbayaropsh' => $request->no,
                    'total' => (float) str_replace(',', '', $request->total_d[$i]),
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

    public function getedit(Tbayaropsh $tbayaropsh){
        $banks = Mbank::select('id','code','name')->whereNull('deleted_at')->get();
        $tbayaropsds = Tbayaropsd::select('id','idh','no_tbayaropsh','total','note')->whereNull('deleted_at')->where('idh','=',$tbayaropsh->id)->get();
        return view('pages.transaction.tbayaropsedit',[
            'tbayaropsh' => $tbayaropsh,
            'tbayaropsds' => $tbayaropsds,
            'banks' => $banks
        ]);
    }

    public function update(Tbayaropsh $tbayaropsh){
        // dd(request()->all());
        for($j=0;$j<sizeof(request('no_d'));$j++){
            $no_tbayaropsh = request('no');
        }
        DB::delete('delete from tbayaropsds where no_tbayaropsh = ?', [$no_tbayaropsh] );
        Tbayaropsh::where('id', '=', $tbayaropsh->id)->update([
            'no' => request('no'),
            'tdt' => request('dt'),
            'jenis' => request('jenis'),
            'akun_pembayaran' => request('akun_bayar'),
            'noref' => request('noref'),
            'total' => request('nominal'),
            'grdtotal' => (float) str_replace(',', '', request('grand_total'))
        ]);
        $count=0;
        $countrows = sizeof(request('no_d'));
        for ($i=0;$i<sizeof(request('no_d'));$i++){
            Tbayaropsd::create([
                'idh' => $tbayaropsh->id,
                'no_tbayaropsh' => request('no'),
                'total' => (float) str_replace(',', '', request('total_d')[$i]),
                'note' => request('note_d')[$i],
            ]);
            $count++;
        }
        
        if($count == $countrows){
            return redirect()->back();
        }
    }

    public function list(Tbayaropsh $tbayaropsh){
        $tbayaropshs = Tbayaropsh::select('id','no','tdt','jenis','noref','total','grdtotal','akun_pembayaran','note')->whereNull('deleted_at')->get();
        $tbayaropsds = Tbayaropsd::select('id','idh','no_tbayaropsh','total')->whereNull('deleted_at')->get();
        return view('pages.transaction.tbayaropslist',[
            'tbayaropshs' => $tbayaropshs,
            'tbayaropsds' => $tbayaropsds
        ]);
    }
}
