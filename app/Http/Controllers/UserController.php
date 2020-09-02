<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        //Mengambil data dari tabel product
        $user = DB::table('tb_user')->paginate(5);
        return view('user',['user' => $user]);
    }

    public function reset($id_user){
        $product = DB::table('tb_user')->where('id_user', $id_user)->update([
            //Password Default '12345'
            'password' => '1f32aa4c9a1d2ea010adcf2348166a04',
        ]);

        return redirect()->route('user');
    }

    public function delete($id_user){
        $product = DB::table('tb_user')->where('id_user', $id_user)->delete();

        return redirect()->route('user');
    }


}
