<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        //Mengambil data dari tabel product
        $user = DB::table('tb_user')->get();
        return view('user',['user' => $user]);
    }
}
