<?php

namespace App\Http\Controllers;

use App\Models\AuthUser;
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
        // dd($request->all());
        $checkexist = User::select('id','username','email')->where('username','=', $request->username)->first();
        if($checkexist == null){
            $password = Hash::make($request->password);
            // dd($password);
            User::create([
                'username' => $request->username,
                'name' => $request->username,
                'email' => $request->email,
                'password' => $password,
            ]);
            $user = User::select('id','username','email','name')->where('username','=', $request->username)->first();
            for ($i=0; $i<sizeof($request->features); $i++){
                AuthUser::create([
                    'id_user' => $user->id,
                    'username' => $user->username,
                    'email' => $user->email,
                    'name' => $user->name,
                    'feature' => $request->features[$i],
                ]);
            }

            AuthUser::where('id_user', '=', $user->id)->where('feature', '=', 'mitem')->update([
                'save' => $request->create_mitem,
                'open' => $request->read_mitem,
                'updt' => $request->update_mitem,
                'dlt' => $request->delete_mitem,
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
            'create_acs' => request('create_acs'),
            'read_acs' => request('read_acs'),
            'update_acs' => request('update_acs'),
            'delete_acs' => request('delete_acs')
        ]);

        return redirect()->route('muser');        
    }

    public function delete(User $user){
        User::find($user->id)->delete();
        return redirect()->route('muser')->with('success','Data Berhasil Di Hapus');
    }
}
