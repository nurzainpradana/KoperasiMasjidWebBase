<?php

namespace App\Http\Controllers\otentikasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Hash;

class OtentikasiController extends Controller
{
    public function index(){
        return view('otentikasi/login');
        $password = bcrypt(123456);
        


    }

    public function login(Request $req){
        //dd($req->all());
        $admin = Admin::where('name', $req->inputUsername)->first();
        
        if($admin != null){
            if(Hash::check($req->inputPassword, $admin->password)){
                session(['berhasil_login' => true]);
                
                return redirect()->route('product');
                
            } else {
                return redirect()->route('login')->with('gagal','Password Salah');
            }
            
        } else {
            return redirect()->route('login')->with('gagal','Username Salah');
        }
        return redirect()->route('login')->with('gagal','Username Salah');

    }

    public function logout(Request $req){
        $req->session()->flush();
        return redirect('/');
    }
}
