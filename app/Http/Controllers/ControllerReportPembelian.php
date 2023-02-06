<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerReportPembelian extends Controller
{
    public function index(){
        return view('pages.reports.reportpembelian');
    }
}
