<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TransactionExport implements FromCollection
{
    public function __construct(string $start_date, string $end_date){
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }
    public function collection()
    {
        $transaction = DB::table('tb_transaction')
        ->leftJoin('tb_user as u', 'tb_transaction.id_user', 'u.id_user')
        ->where('date_order','<=', $this->end_date)
        ->where('date_order','>=', $this->start_date)
        ->get();
        return $transaction;
    }
}