<?php

namespace App\Http\Controllers;

use App\Models\AuthUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerLogin extends Controller
{
    protected $comp_name;
    protected $comp_code;
    protected $create_mitem;
    protected $read_mitem;
    protected $update_mitem;
    protected $delete_mitem;
    protected $create_user;
    protected $read_user;
    protected $update_user;
    protected $delete_user;
    protected $create_satuan;
    protected $read_satuan;
    protected $update_satuan;
    protected $delete_satuan;
    protected $create_group;
    protected $read_group;
    protected $update_group;
    protected $delete_group;
    protected $create_coa;
    protected $read_coa;
    protected $update_coa;
    protected $delete_coa;
    protected $create_bank;
    protected $read_bank;
    protected $update_bank;
    protected $delete_bank;
    protected $create_mtuang;
    protected $read_mtuang;
    protected $update_mtuang;
    protected $delete_mtuang;
    protected $create_cust;
    protected $read_cust;
    protected $update_cust;
    protected $delete_cust;
    protected $create_supp;
    protected $read_supp;
    protected $update_supp;
    protected $delete_supp;
    protected $create_lokasi;
    protected $read_lokasi;
    protected $update_lokasi;
    protected $delete_lokasi;
    protected $create_cabang;
    protected $read_cabang;
    protected $update_cabang;
    protected $delete_cabang;
    protected $create_belibrg;
    protected $read_belibrg;
    protected $update_belibrg;
    protected $delete_belibrg;
    protected $create_pos;
    protected $read_pos;
    protected $update_pos;
    protected $delete_pos;
    protected $create_bayarops;
    protected $read_bayarops;
    protected $update_bayarops;
    protected $delete_bayarops;
    protected $create_jvouch;
    protected $read_jvouch;
    protected $update_jvouch;
    protected $delete_jvouch;
    protected $create_penerimaan;
    protected $read_penerimaan;
    protected $update_penerimaan;
    protected $delete_penerimaan;
    
    public function index(){
        return view('auth.login');
    }

    public function postLogin(Request $request){
        if(Auth::attempt($request->only('username', 'password'))){
            $request->session()->regenerate();
            $username = Auth::User()->username;
            $comp_name = Auth::User()->comp_name;
            $comp_code = Auth::User()->comp_code;
            $request->session()->put('comp_name', $comp_name);
            $request->session()->put('username', $username);
            $request->session()->put('comp_code', $comp_code);
            
            $user = User::select('id','username','email')->where('username','=', $request->username)->first();

            // dd($user->id);
            $auth_mitem = AuthUser::where('id_user', '=', $user->id)->where('feature', '=', 'mitem')->first();

            // $mitem_save = '';
            // if($auth_mitem->save == null || $auth_mitem->save == 'N'){
            //     $mitem_save = 'N';
            //     $request->session()->put('mitem_save', $mitem_save);
            // }else{
            //     $request->session()->put('mitem_save', $auth_mitem->save);
            // }

            // $mitem_open = '';
            // if($auth_mitem->open == null || $auth_mitem->open == 'N'){
            //     $mitem_open = 'N';
            //     $request->session()->put('mitem_open', $mitem_open);
            // }else{
            //     $request->session()->put('mitem_open', $auth_mitem->open);
            // }

            // $mitem_updt = '';
            // if($auth_mitem->updt == null || $auth_mitem->updt == 'N'){
            //     $mitem_updt = 'N';
            //     $request->session()->put('mitem_updt', $mitem_updt);
            // }else{
            //     $request->session()->put('mitem_updt', $auth_mitem->updt);
            // }

            // $mitem_dlt = '';
            // if($auth_mitem->dlt == null || $auth_mitem->dlt == 'N'){
            //     $mitem_dlt = 'N';
            //     $request->session()->put('mitem_dlt', $mitem_dlt);
            // }else{
            //     $request->session()->put('mitem_dlt', $auth_mitem->dlt);
            // }

            $request->session()->put('mitem_save', $auth_mitem->save);
            $request->session()->put('mitem_open', $auth_mitem->open);
            $request->session()->put('mitem_updt', $auth_mitem->updt);
            $request->session()->put('mitem_dlt', $auth_mitem->dlt);

            return redirect()->intended('/home');
        }
        return redirect()->back();
    }

    public function logout(request $request){
        Auth::logout();
        // $current_date_time = Carbon::now()->toDateTimeString();
        // DB::table('userlog')->insert(['username' =>session()->get('username'), 'tbl'=>'ONLINE', 'idtbl'=> '0', 'notbl'=>'', 'act'=>'LOGOUT', 'comp_code'=>session()->get('comp_code'), 'usin'=>1,'datein'=>$current_date_time]);

        return redirect('/');
    }
}
