<!-- Menghubungkan dengan view template master -->
@extends('master')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Buat Product')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')

<h3>BUAT DATA PRODUCT</h3>
@if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }} <br/>
					@endforeach
				</div>
@endif
<br>

<a href="{{ route('product') }}">Kembali</a>
<br>
<br>

<form action="{{route('product.simpan') }}" method="post" enctype="multipart/form-data"> 
    {{ csrf_field()}}
    Nama Product <input type="text" name="name" required="required"> <br>
    Harga <input type="number" name="price" required="required"> <br>

    <div class="form-group row">
    <label for="category">Kategori</label>
    <div class="col-md-6">
    <select name="id_category" id="id_category" class="form-control" required="required">
        <option value="">== Pilih Kategori ==</option>
        @foreach ($category as $c)
        <option value="{{ $c->id_category }}">{{ $c->name }}</option>
        @endforeach
    </select>
    </div>
    </div>
    
    <div class="form-group row">
    <label for="status">Status</label>
    <div class="col-md-6">
    <select name="status" id="status" class="form-control" required="required">
        <option value="">== Pilih Status ==</option>
        <option value="Kosong">Kosong</option>
        <option value="Tersedia">Tersedia</option>
    </select>
    </div>
    </div>
    Description <input type="text" name="description" required="required"> <br>

    <div class="form-group">
        <b>File Gambar</b> <br>
        <input type="file" name="file">
    </div>

    <div class="form-group">
        <b>Keterangan</b>
        <textarea name="keterangan" class="form-control"></textarea>
    </div>

    
    
    <input type="submit" value="Simpan Data">

</form>

@endsection