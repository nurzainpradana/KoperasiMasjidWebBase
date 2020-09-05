<!-- Menghubungkan dengan view template master -->
@extends('master')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Edit Product')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')

<h3>EDIT DATA PRODUCT</h3>

<br>

<a href="{{ route('product') }}">Kembali</a>
<br>
<br>
@foreach($product as $p)
<form action="{{ route('product.update') }}" method="post"> 
    {{ csrf_field()}}
    Id Product <input type="text" name="id_products" required="required" value=" {{ $p->id_products }}"> <br>
    Nama Product <input type="text" name="name" required="required" value=" {{ $p->name }}"> <br>
    Harga <input type="number" name="price" required="required" value="{{ $p->price }}"> <br>
    Status <input type="text" name="status" required="required" value="{{ $p->status }}"> <br>
    Description <input type="text" name="description" required="required" value=" {{ $p->description }}"> <br>
    <img src="{{ url('/image/product/'.$p->image) }}" width="150px" height="150px"> <br>
    Image <input type="text" name="image" required="required" value=" {{ $p->image }}"> <br>
    Kategori <input type="number" name="id_category" required="required" value="{{$p->id_category}}"> <br>
    <input type="submit" value="Simpan Data">

</form>
@endforeach

@endsection