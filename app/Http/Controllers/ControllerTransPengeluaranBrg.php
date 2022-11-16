<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerTransPengeluaranBrg extends Controller
{
    public function index(){
        return view('pages.transaction.tpengeluaranbrg');
    }
    public function list(){
        return view('pages.transaction.tpengeluaranbrglist');
    }
}
