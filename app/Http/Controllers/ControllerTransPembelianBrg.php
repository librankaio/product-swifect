<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerTransPembelianBrg extends Controller
{
    public function index(){
        return view('pages.transaction.tbelibrg');
    }
    public function list(){
        return view('pages.transaction.tbelibrglist');
    }
}
