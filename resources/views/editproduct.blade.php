

<!-- Menghubungkan dengan view template master -->
@extends('master')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Edit Product')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card mt-5">
                <div class="card-body">
                <h3 class="text-center">Edit Data Product</h3>

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
                @foreach($product as $p)
                <form action="{{route('product.update') }}" method="post" enctype="multipart/form-data"> 
                    {{ csrf_field()}}

                    <div class="form-group">
                        <label for="name">Id Product</label>
                        <input class="form-control" readonly type="text" name="id_products" required="required" value="{{ $p->id_products }}" type="hidden">
                    </div>


                    <div class="form-group">
                        <label for="name">Nama Product</label>
                        <input class="form-control" type="text" name="name" required="required" value="{{ $p->name }}">
                    </div>

                    <div class="form-group">
                        <label for="price">Harga Product</label>
                        <input class="form-control" type="number" name="price" required="required" value="{{ $p->price }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input class="form-control" type="text" name="description" required="required" value="{{ $p->description }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="category">Kategori</label>
                        <select name="id_category" id="id_category" class="form-control" required="required">
                            <option value="">== Pilih Kategori ==</option>
                            @foreach ($category as $c)
                            <option value="{{ $c->id_category }}" {{ ($c->id_category == $p->id_category) ? 'selected': '' }}>{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>

    
                    <div class="form-group">
                        <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required="required">
                                <option value="">== Pilih Status ==</option>
                                <option value="Kosong" {{ ($p->status == "Kosong") ? 'selected' : ''}}>Kosong</option>
                                <option value="Tersedia" {{ ($p->status == "Tersedia") ? 'selected' : ''}}>Tersedia</option>
                            </select>
                    </div>

                    <img src="{{ url('/image/product/'.$p->image) }}" name="image"  id="image" width="150px" height="150px"> <br>
                    <div class="form-group">
                        <label for="image">Old Image</label>
                        <input class="form-control" readonly type="text" name="image" required="required" value="{{ $p->image }}" >
                    </div>

                    <div class="form-group">
                        <label for="file">File Gambar</label>
                        <input type="file"  class="form-control-file" name="file">
                    </div>
                    
                    <input type="submit" class="btn btn-primary" value="Simpan Data">
                    <a href="{{ route('product') }}" class="btn btn-secondary ">Kembali</a>

                </form>
                @endforeach
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection