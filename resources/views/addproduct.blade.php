<!-- Menghubungkan dengan view template master -->
@extends('master')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Buat Product')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')

<h3>BUAT DATA PRODUCT</h3>

<br>

<a href="{{ route('product') }}">Kembali</a>
<br>
<br>
<form action="{{route('product.simpan') }}" method="post"> 
    {{ csrf_field()}}
    Nama Product <input type="text" name="name" required="required"> <br>
    Harga <input type="number" name="price" required="required"> <br>
    Status <input type="text" name="status" required="required"> <br>
    Description <input type="text" name="description" required="required"> <br>
    Image <input type="text" name="image" required="required"> <br>
    Kategori <input type="number" name="id_category" required="required"> <br>
    <input type="submit" value="Simpan Data">

</form>

@endsection