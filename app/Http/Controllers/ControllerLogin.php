<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerLogin extends Controller
{
    protected $comp_name;
    protected $comp_code;
    protected $privilage;
    
    public function index(){
        return view('auth.login');
    }

    public function postLogin(Request $request){
        if(Auth::attempt($request->only('email', 'password'))){
            $request->session()->regenerate();
            $email = Auth::User()->email;
            $comp_name = Auth::User()->comp_name;
            $comp_code = Auth::User()->comp_code;
            $privilage = Auth::User()->privilage;
            $request->session()->put('comp_name', $comp_name);
            $request->session()->put('email', $email);
            $request->session()->put('comp_code', $comp_code);
            $request->session()->put('privilage', $privilage);
                
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
