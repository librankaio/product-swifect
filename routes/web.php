<?php

use App\Http\Controllers\ControllerLogin;
use App\Http\Controllers\ControllerMasterBank;
use App\Http\Controllers\ControllerMasterCabang;
use App\Http\Controllers\ControllerMasterCustomer;
use App\Http\Controllers\ControllerMasterDataBrg;
use App\Http\Controllers\ControllerMasterGroup;
use App\Http\Controllers\ControllerMasterLocation;
use App\Http\Controllers\ControllerMasterMerk;
use App\Http\Controllers\ControllerMasterSatuan;
use App\Http\Controllers\ControllerMasterSupp;
use App\Http\Controllers\ControllerMasterUser;
use App\Http\Controllers\ControllerTransPembelianBrg;
use App\Http\Controllers\ControllerTransPengeluaranBrg;
use App\Http\Controllers\ControllerTransPos;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/form', function () {
    return view('pages.form');
});
Route::get('/chart', function () {
    return view('chartjs');
});
Route::get('/transaction', function () {
    return view('pages.transaction.tpengeluaranbrglist');
});
Route::get('/table', function () {
    return view('pages.table');
});
Route::get('/advform', function () {
    return view('pages.advancedform');
});
Route::get('/modal', function () {
    return view('pages.modal'); 
});
//LOGIN
Route::get('/', [ControllerLogin::class, 'index'])->name('login');
Route::post('/', [ControllerLogin::class, 'postLogin'])->name('postlogin');
// Route::get('/', [ControllerMasterDataBrg::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    //HOME
    Route::get('/home', function () {
        return view('chartjs');
    })->name('home');
    // Route::get('/home', [ControllerMasterDataBrg::class, 'home'])->name('home');
    //MITEM or Master data Item
    Route::get('/masterdatabarang', [ControllerMasterDataBrg::class, 'index'])->name('mbrg');
    Route::post('/masterdatabarangpost', [ControllerMasterDataBrg::class, 'post'])->name('mbrgpost');
    Route::get('/masterdatabarang/{mitem}/edit', [ControllerMasterDataBrg::class, 'getedit'])->name('mbrggetedit');
    Route::post('/masterdatabarang/{mitem}', [ControllerMasterDataBrg::class, 'update'])->name('mbrgupdt');
    Route::post('/masterdatabarang/delete/{mitem}', [ControllerMasterDataBrg::class, 'delete'])->name('mbrgdelete');


    Route::get('/mastercabang', [ControllerMasterCabang::class, 'index'])->name('mcabang');
    Route::get('/mastermerk', [ControllerMasterMerk::class, 'index'])->name('mmerk');

    //MUOM or Master Satuan
    Route::get('/mastersatuan', [ControllerMasterSatuan::class, 'index'])->name('msatuan');
    Route::post('/msatuanpost', [ControllerMasterSatuan::class, 'post'])->name('msatuanpost');
    Route::get('/mastersatuan/{muom}/edit', [ControllerMasterSatuan::class, 'getedit'])->name('msatuangetid');
    Route::post('/mastersatuan/{muom}', [ControllerMasterSatuan::class, 'update'])->name('msatuanupdt');
    Route::post('/mastersatuan/delete/{muom}', [ControllerMasterSatuan::class, 'delete'])->name('msatuandelete');

    //MGRP or Master Group
    Route::get('/mastergroup', [ControllerMasterGroup::class, 'index'])->name('mgrup');
    Route::post('/mastergrouppost', [ControllerMasterGroup::class, 'post'])->name('mgruppost');
    Route::get('/mastergroup/{mgrp}/edit', [ControllerMasterGroup::class, 'getedit'])->name('mgrupgetid');
    Route::post('/mastergroup/{mgrp}', [ControllerMasterGroup::class, 'update'])->name('mgrupupdt');
    Route::post('/mastergroup/delete/{mgrp}', [ControllerMasterGroup::class, 'delete'])->name('mgrupdelete');

    //MBANK or Master Bank
    Route::get('/masterbank', [ControllerMasterBank::class, 'index'])->name('mbank');
    Route::post('/masterbankpost', [ControllerMasterBank::class, 'post'])->name('mbankpost');
    Route::get('/masterbank/{mbank}/edit', [ControllerMasterBank::class, 'getedit'])->name('mbankgetid');
    Route::post('/masterbank/{mbank}', [ControllerMasterBank::class, 'update'])->name('mbankupdt');
    Route::post('/masterbank/delete/{mbank}', [ControllerMasterBank::class, 'delete'])->name('mbankdelete');

    //MCUST or Master Customer
    Route::get('/mastercust', [ControllerMasterCustomer::class, 'index'])->name('mcust');
    Route::post('/mastercustpost', [ControllerMasterCustomer::class, 'post'])->name('mcustpost');
    Route::get('/mastercust/{mcust}/edit', [ControllerMasterCustomer::class, 'getedit'])->name('mcustgetid');
    Route::post('/mastercust/{mcust}', [ControllerMasterCustomer::class, 'update'])->name('mcustupdt');
    Route::post('/mastercust/delete/{mcust}', [ControllerMasterCustomer::class, 'delete'])->name('mcustdelete');

    //MSUPP or Master Supplier
    Route::get('/mastersupplier', [ControllerMasterSupp::class, 'index'])->name('msupp');
    Route::post('/mastersupplierpost', [ControllerMasterSupp::class, 'post'])->name('msupppost');
    Route::get('/mastersupplier/{msupp}/edit', [ControllerMasterSupp::class, 'getedit'])->name('msuppgetid');
    Route::post('/mastersupplier/{msupp}', [ControllerMasterSupp::class, 'update'])->name('msuppupdt');
    Route::post('/mastersupplier/delete/{msupp}', [ControllerMasterSupp::class, 'delete'])->name('msuppdelete');

    //MWHSE or Master Location
    Route::get('/masterloct', [ControllerMasterLocation::class, 'index'])->name('mwhse');
    Route::post('/masterloctpost', [ControllerMasterLocation::class, 'post'])->name('mwhsepost');
    Route::get('/masterloct/{mwhse}/edit', [ControllerMasterLocation::class, 'getedit'])->name('mwhsegetedit');
    Route::post('/masterloct/{mwhse}', [ControllerMasterLocation::class, 'update'])->name('mwhseupdt');
    Route::post('/masterloct/delete/{mwhse}', [ControllerMasterLocation::class, 'delete'])->name('mwhsedelete');

    //TPOS or Transaction POS
    Route::get('/transpos', [ControllerTransPos::class, 'index'])->name('tpos');
    Route::post('/transpospost', [ControllerTransPos::class, 'post'])->name('transpospost');
    Route::post('/getmitem', [ControllerTransPos::class, 'getMitem'])->name('getmitem');
    //TPOS LIST or Trans POS LIST
    Route::get('/transposlist', [ControllerTransPos::class, 'list'])->name('tposlist');
    Route::get('/transpos/{tposh}/edit', [ControllerTransPos::class, 'getedit'])->name('transposedit');
    Route::post('/transpos/{tposh}', [ControllerTransPos::class, 'update'])->name('transposupdate');
    Route::post('/transpos/delete/{tposh}', [ControllerTransPos::class, 'delete'])->name('tposdelete');

    //TBeli Barang
    Route::get('/transbelibrg', [ControllerTransPembelianBrg::class, 'index'])->name('transbelibrg');
    Route::get('/transbelibrglist', [ControllerTransPembelianBrg::class, 'list'])->name('tbelibrglist');
    
    // TBeli Barang
    Route::get('/transpengeluaranbrg', [ControllerTransPengeluaranBrg::class, 'index'])->name('tpengeluaranbrg');
    Route::get('/transpengeluaranbrglist', [ControllerTransPengeluaranBrg::class, 'list'])->name('tpengeluaranbrglist');

    // Route::get('/masteruser', [ControllerMasterUser::class, 'index'])->name('muser');
    // Route::get('/transbelibrg', [ControllerTransPembelianBrg::class, 'index'])->name('tbelibrg');
});
