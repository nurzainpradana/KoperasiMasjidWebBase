<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

//Panggil model users
use App\Users;

use Session;

class UserController extends Controller
{
    public function index(){
        //Mengambil data dari tabel product
        /*
        $user = DB::table('tb_user')->paginate(10);
        
        */
        $user = Users::paginate(10);
        return view('user',['user' => $user]);
    }

    public function reset($id_user){
        
        $user = DB::table('tb_user')->where('id_user', $id_user)->update([
            //Password Default '12345'
            'password' => '1f32aa4c9a1d2ea010adcf2348166a04',
        ]);

        if($user) {
            Session::flash('sukses','Berhasil Mereset Password'); 
        } else {
            Session::flash('gagal','Gagal Mereset Password'); 
        }

        return redirect()->route('user');
    }

    public function delete($id_user){
        $user = DB::table('tb_user')->where('id_user', $id_user)->delete();

        if($user) {
            Session::flash('sukses','Berhasil Menghapus Data'); 
        } else {
            Session::flash('gagal','Gagal Menghapus Data'); 
        }

        

        return redirect()->route('user');
    }

    public function cari(Request $request){
        //Menanangkap data yang dicari
        $cari = $request->cari;

        //mengambil data dari tabel sesuai pencarian
        //$product = Product::where('name','LIKE','%'.$cari.'%')->get();
        //$product = DB::table('tb_product')->where('name','LIKE','%'.$cari.'%')->paginate(10);

        $user = DB::table('tb_user')->where('id_user', $id_user)->paginate(10);

        //return redirect()->route('product', ['product' => $product]);
        return view('user',['user' => $user, 'notif'=> "Berhasil Update"]);
    }

}
