<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ControllerMasterUser extends Controller
{
    public function index(){
        $datas = User::select('id','username','email')->get();
        return view('pages.master.muser',[
            'datas' => $datas
        ]);
    }

    public function post(Request $request){      
        $checkexist = User::select('id','username','email')->where('username','=', $request->username)->first();
        // dd($checkexist);
        if($checkexist == null){
            $password = Hash::make($request->password);
            // dd($password);
            User::create([
                'username' => $request->username,
                'name' => $request->username,
                'email' => $request->email,
                'password' => $request->password
            ]);
            return redirect()->back();
        }else{
            return redirect()->back();
        }        
    }

    public function getedit(User $user){
        return view('pages.master.museredit',[
            'user' => $user,
        ]);
    }

    public function update(User $user){
        // dd(request()->all());
        User::where('id', '=', $user->id)->update([
            'username' => request('username'),
            'name' => request('username'),
            'email' => request('email'),
            'password' => request('password'),
        ]);

        return redirect()->route('muser');        
    }

    public function delete(User $user){
        User::find($user->id)->delete();
        return redirect()->route('muser')->with('success','Data Berhasil Di Hapus');
    }
}
