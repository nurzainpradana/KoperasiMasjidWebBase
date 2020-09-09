<!-- Menghubungkan dengan view template master -->
@extends('master')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
<!-- @section('judul_halaman', 'Halaman Buat Product') -->

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card mt-5">
                <div class="card-body">
                <h3 class="text-center">Buat Product Baru</h3>

                {{-- Menampilkan error validasi --}}
                @if(count($errors) > 0)
				<div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
					<li>{{ $error }} <br/></li>
					@endforeach
                </ul>
				</div>
                @endif

                <br>

                <!-- Form Validasi-->
                <form action="{{route('product.simpan') }}" method="post" enctype="multipart/form-data"> 
                    {{ csrf_field()}}

                    <div class="form-group">
                        <label for="name">Nama Product</label>
                        <input class="form-control" type="text" name="name" required="required" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label for="price">Harga Product</label>
                        <input class="form-control" type="number" name="price" required="required" value="{{ old('price') }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input class="form-control" type="text" name="description" required="required" value="{{ old('description') }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="category">Kategori</label>
                        <select name="id_category" id="id_category" class="form-control" required="required">
                            <option value="">== Pilih Kategori ==</option>
                            @foreach ($category as $c)
                            <option value="{{ $c->id_category }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>

    
                    <div class="form-group">
                        <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required="required">
                                <option value="">== Pilih Status ==</option>
                                <option value="Kosong">Kosong</option>
                                <option value="Tersedia">Tersedia</option>
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="file">File Gambar</label>
                        <input type="file"  class="form-control-file" name="file">
                    </div>
                    
                    <input type="submit" class="btn btn-primary" value="Simpan Data">
                    <a href="{{ route('product') }}" class="btn btn-secondary ">Kembali</a>

                </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection