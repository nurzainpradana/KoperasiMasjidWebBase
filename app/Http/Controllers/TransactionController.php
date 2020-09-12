<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Session;

class TransactionController extends Controller
{
    public function index(){
        //Mengambil data dari tabel product

        $transaction = DB::table('tb_transaction')
        ->leftJoin('tb_user as u', 'tb_transaction.id_user', 'u.id_user')
        ->paginate(10);
        return view('transaction',['transaction' => $transaction]);
    }

    public function detail($id_transaction){
        $transaction = DB::table('tb_transaction')
        ->leftJoin('tb_user as u', 'tb_transaction.id_user', 'u.id_user')
        ->rightJoin('tb_detail_transaction as d','tb_transaction.id_transaction', 'd.id_transaction')
        ->leftJoin('tb_product as p', 'd.id_product', 'p.id_products')
        ->select('tb_transaction.id_transaction', 'tb_transaction.date_order', 'tb_transaction.status','tb_transaction.total_order','u.name as user_name','p.name as product_name','p.image', 'd.harga_satuan', 'd.quantity', 'd.subtotal')
        ->where('tb_transaction.id_transaction', $id_transaction)
        ->get();

        $head_transaction = DB::table('tb_transaction')->where('id_transaction',$id_transaction)->leftJoin('tb_user as u', 'tb_transaction.id_user', 'u.id_user')->get();

        return view('detailtransaction',['transaction' => $transaction, 'head' => $head_transaction]);
    }

    public function update(Request $request){
        $update = DB::table('tb_transaction')->where('id_transaction', $request->id_transaction )->update([
            'status' => $request->status
        ]);

        if($update) {
            Session::flash('sukses','Berhasil Mengupdate Data'); 
        } else {
            Session::flash('gagal','Gagal Mengupdate Data'); 
        }

        return redirect()->route('transaction');
    }
}
