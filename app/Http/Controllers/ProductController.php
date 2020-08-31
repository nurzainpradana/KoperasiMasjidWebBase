<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ProductController extends Controller{
    public function index(){
        //Mengambil data dari tabel product
        $product = DB::table('tb_product')->get();

        return view('product',['product' => $product]);
    }

    public function tambah(){
        return view('addproduct');
    }

    public function edit($id){
        //Mengambil data product berdasarkan id yang dipilih
        $product = DB::table('tb_product')->where('id_products',$id)->get();

        return view('editproduct', ['product' => $product ]);
    }

    public function simpan(Request $request){
        $product = DB::table('tb_product')->insert([
            'name' => $request->name,
            'price' => $request->price, 
            'unit' => $request->unit,
            'description' => $request->description,
            'image' => $request->image,
            'id_category' => $request->id_category,
        ]);

        return redirect()->route('product');
    }

    public function update(Request $request){
        $product = DB::table('tb_product')->where('id_products', $request->id_product)->update([
            'name' => $request->name,
            'price' => $request->price,
            'unit' => $request->unit,
            'description' => $request->description,
            'image' => $request->image,
            'id_category' => $request->id_category,
        ]);

        return redirect()->route('product');
    }

}