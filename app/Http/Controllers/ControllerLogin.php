<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerLogin extends Controller
{
    protected $comp_name;
    protected $comp_code;
    
    public function index(){
        return view('auth.login');
    }

    public function postLogin(Request $request){
        if(Auth::attempt($request->only('email', 'password'))){
            $request->session()->regenerate();
            $email = Auth::User()->email;
            $comp_name = Auth::User()->comp_name;
            $comp_code = Auth::User()->comp_code;
            $request->session()->put('comp_name', $comp_name);
            $request->session()->put('email', $email);
            $request->session()->put('comp_code', $comp_code);
                
            return redirect()->intended('/masterdatabarang');
        }
        return redirect()->back();
    }
}
