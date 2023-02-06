<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerReportPenjualan extends Controller
{
    public function index(){
        return view('pages.reports.reportpenjualan');
    }
}
