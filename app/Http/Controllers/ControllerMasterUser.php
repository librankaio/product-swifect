<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerMasterUser extends Controller
{
    public function index(){
        return view('pages.master.muser');
    }
}
