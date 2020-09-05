<!-- Menghubungkan dengan view template master -->
@extends('master')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Product')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')

<h3>DATA PRODUK</h3>

<a href="{{ route('product.tambah') }}"> + Tambah Product Baru</a>

<br>
<br>

<table border="1">
    <tr>
        <th>Id Product</th>
        <th>Nama Product</th>
        <th>Harga</th>
        <th>Status</th>
        <th>Description</th>
        <th>Image</th>
        <th>Kategory</th>
        <th>Action</th>
    </tr>

    @foreach($product as $p)
        <tr>
            <td>{{ $p->id_products }}</td>
            <td>{{ $p->name }}</td>
            <td>{{ $p->price }}</td>
            <td>{{ $p->status }}</td>
            <td>{{ $p->description }}</td>
            <td><img src="{{ url('/image/product/'.$p->image) }}" width="150px" height="150px">{{  url('/image/product/'.$p->image) }}</td>
            
            <td>{{ $p->category_name}}</td>
            
            
            <td>
                
                
                <a href="{{ route('product.edit', ['id_products' => $p->id_products ]) }}">Edit</a>
                <a href="{{ route('product.delete', ['id_products' => $p->id_products ]) }}">Hapus</a>
            </td>
        </tr>
    @endforeach
</table>

Halaman : {{ $product->currentPage() }} <br/>
	Jumlah Data : {{ $product->total() }} <br/>
	Data Per Halaman : {{ $product->perPage() }} <br/>


    {{ $product->links() }}

    <br>



@endsection