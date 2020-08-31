<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index(){
        //Mengambil data dari tabel product
        $transaction = DB::table('tb_transaction')->get();
        return view('transaction',['transaction' => $transaction]);
    }
}
