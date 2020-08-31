<!-- Menghubungkan dengan view template master -->
@extends('master')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Transaction')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')

<h3>DATA TRANSACTION</h3>

<br>
<br>

<table border="1">
    <tr>
        <th>Id Transaction</th>
        <th>Tanggal Order</th>
        <th>Id Member</th>
        <th>Total Order</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    @foreach($transaction as $t)
        <tr>
            <td>{{ $t->id_transaction }}</td>
            <td>{{ $t->date_order }}</td>
            <td>{{ $t->id_member }}</td>
            <td>{{ $t->total_order }}</td>
            <td>{{ $t->status }}</td>
            <td>
                <a href="{{ route('transaction.detail') }}">Detail</a>
            </td>
        </tr>
    @endforeach
</table>

@endsection