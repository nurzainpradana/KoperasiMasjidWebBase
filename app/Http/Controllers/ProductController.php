<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Product;
use App\Category;
use Image;
use File;


use Session;

class ProductController extends Controller{
    public function index(){
        //Mengambil data dari tabel product
        $product = DB::table('tb_product')
        ->leftJoin('tb_category as c', 'tb_product.id_category', 'c.id_category')
        ->select('tb_product.id_products', 'tb_product.name', 'tb_product.price','tb_product.status','tb_product.description', 'tb_product.image','c.name as category_name')
        ->paginate(10);
        
        //$product = Product::paginate(10);

        return view('product',['product' => $product]);
    }

    public function tambah(){
        $category = Category::get();
        return view('addproduct', ['category' => $category]);
    }

    public function edit($id_products){
        //Mengambil data product berdasarkan id yang dipilih
        //$product = DB::table('tb_product')->where('id_products',$id_products)->get();
        //$product = Product::where('id_product','=',$id_products)->get();
        $product = Product::where('id_products','=',$id_products)->get();

        $category = Category::get();

        return view('editproduct', ['product' => $product, 'category' => $category]);
    }

    public function simpan(Request $request){
       $image = $request->file('file');

        $destinationPath = public_path('/image/product');
        if($image != null) {
            $img = Image::make($image->getRealPath());
            $imglink = rand().$image->getClientOriginalName();
    
            $img->resize(360, 360, function ($constraint) {$constraint->aspectRatio();})->save($destinationPath.'/'.$imglink);
            $image->move($destinationPath,rand().$imglink);
        } else { $imglink = ''; }

        $this->validate($request,[
            'name' => 'required',
            'price' => 'required',
            'status' => 'required',
            'id_category' => 'required',
            'description' => 'required'
        ]);

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price, 
            'status' => $request->status,
            'description' => $request->description,
            'image' => $imglink,
            'id_category' => $request->id_category,
        ]);

        if($product) {
            Session::flash('sukses','Berhasil Menambahkan Data'); 
        } else {
            Session::flash('gagal','Gagal Menambahkan Data'); 
        }

        return redirect()->route('product');
    }

    public function update(Request $request){
       
        $this->validate($request,[
            'name' => 'required',
            'price' => 'required',
            'status' => 'required',
            'description' => 'required',
            'id_category' => 'required'
        ]);

        $oldimage = $request->image;
        $image = $request->file('file');
        //$input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        

        if($image != null){
            $imagefile = rand().$image->getClientOriginalName();
        } else {
            $imagefile = "";
        }

        $update = DB::table('tb_product')->where('id_products',$request->id_products)->update([
            'name' => $request->name,
            'price' => $request->price,
            'status' => $request->status,
            'description' => $request->description,
            'image' => $imagefile,
            'id_category' => $request->id_category,
        ]);


        /*$product = Product::find($request->id_products)->first();
        $product->name = $request->name;
        $product->price = $request->price; 
        $product->status = $request->status;
        $product->description = $request->description;
        if($image != null){
            $product->image = $image->getClientOrginalExtension();
        } else {
            $product->image = $request->image;
        }
        $product->id_category = $request->id_category;
        $product->save();
        */

        if($image != null){
            $destinationPath = public_path('/image/product');
        $img = Image::make($image->getRealPath());
        $img->resize(360, 360, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$imagefile);
        $image->move($destinationPath,$imagefile);
        }

        if($oldimage != null){
            File::delete('image/product/'.$oldimage);
        }

        if($update) {
            Session::flash('sukses','Berhasil Mengupdate Data'); 
        } else {
            Session::flash('gagal','Gagal Mengupdate Data'); 
        }

        /*if($image != null){
            $imagefile = $image->getClientOrginalExtension();
        } else {
            $imagefile = $request->image;
        }

         
        */

        return redirect()->route('product');
    }

    public function delete($id_products){
        //Mengambil data product berdasarkan id yang dipilih
        //$product = DB::table('tb_product')->where('id_products',$id_products)->delete();
        $product = Product::find($id_products);

        File::delete('image/product/'.$product->image);
        $deleteproduct = $product->delete();

        if($deleteproduct) {
            Session::flash('sukses','Berhasil Menghapus Data'); 
        } else {
            Session::flash('gagal','Gagal Menghapus Data'); 
        }

        return redirect()->route('product');
    }

    public function cari(Request $request){
        $this->validate($request,[
            'car' => 'required'
        ]);
        //Menanangkap data yang dicari
        $cari = $request->cari;

        

        //mengambil data dari tabel sesuai pencarian
        //$product = Product::where('name','LIKE','%'.$cari.'%')->get();
        //$product = DB::table('tb_product')->where('name','LIKE','%'.$cari.'%')->paginate(10);

        $product = DB::table('tb_product')
        ->leftJoin('tb_category as c', 'tb_product.id_category', 'c.id_category')
        ->select('tb_product.id_products', 'tb_product.name', 'tb_product.price','tb_product.status','tb_product.description', 'tb_product.image','c.name as category_name')
        ->where('tb_product.name','LIKE','%'.$cari.'%')
        ->paginate(10);

        //return redirect()->route('product', ['product' => $product]);
        return view('product',['product' => $product]);
    }

    //UPLOAD GAMBAR

    public function proses_upload(Request $request){
        $this->validate($request, [
            'file' => 'required',
            'keterangan' => 'required'
        ]);

        //Menyimpan data file yang diupload ke variable $_FILES
        $file = $request->file('file');

        //nama file
        echo 'File Name : '.$file->getClientOriginalName();
        echo '<br>';

        //ekstensi file
        echo 'File Extension : '.$file->getRealPath();
        echo '<br>';

        //real path
        echo 'File Real Path : '.$file->getRealPath();
        echo '<br>';

        //ukuran file
        echo 'File Size : '.$file->getSize();
        echo '<br>';

        //Tipe Mine
        echo 'File Mime Type : '.$file->getMimeType();
        
        //isi dengan nama folder tempat kemana file di upload
        $tujuan_upload = 'image/product';

        //upload file
        $file->move($tujuan_upload, $file->getClientOriginalName());
    }

    public function checkLogin(){
        if(session('berhasil_login')){
            return redirect()->route('login');
        }
    }

}