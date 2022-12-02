<?php

namespace App\Http\Controllers;

use App\Models\Mbank;
use Illuminate\Http\Request;

class ControllerTransBayarOps extends Controller
{
    public function index(){
        $banks = Mbank::select('id','code','name')->whereNull('deleted_at')->get();
        return view('pages.transaction.tbayarops',[
            'banks' => $banks
        ]);
    }
}
