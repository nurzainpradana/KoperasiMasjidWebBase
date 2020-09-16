<!-- Menghubungkan dengan view template master -->
@extends('master')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'DATA PRODUCT')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a href="{{ route('product.tambah') }}"> + Tambah Product Baru</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
            

            <form action="{{ route('product.cari') }}" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" name="cari" required="required" class="form-control bg-light border-1 small" placeholder="Cari Product ...">
                    <div class="input-group-append">
                        <input type="submit" value="Cari" class="btn btn-danger">
                    </div>
                </div>
             </form>
          <br>
          <br>

                @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            {{ $error }} <br/>
                            @endforeach
                        </div>
                @endif


                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
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
                  </thead>
                  <tbody>
                  @foreach($product as $p)
                    <tr>
                        <td>{{ $p->id_products }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->price }}</td>
                        <td>
                          @if ( $p->status  === 'Kosong')
                            <div class="btn btn-warning btn-sm">{{ $p->status }}</div>
                          @else
                            <div class="btn btn-success btn-sm">{{ $p->status }}</div>
                          @endif
                        </td>
                        <td>{{ $p->description }}</td>
                        <td ><img class="img-responsive img-thumbnail" src="{{ url('/image/product/'.$p->image) }}" width="300px"></td>
                        
                        <td>{{ $p->category_name}}</td>
                        
                        
                        <td>
                            
                            
                            <a class="btn btn-warning btn-sm mb-2" role="button" href="{{ route('product.edit', ['id_products' => $p->id_products ]) }}">Edit</a> <br>
                            <a class="btn btn-danger btn-sm" href="{{ route('product.delete', ['id_products' => $p->id_products ]) }}">Hapus</a>
                        </td>
                    </tr>
                @endforeach
                  </tbody>
                </table>

                Halaman : {{ $product->currentPage() }} <br/>
                Jumlah Data : {{ $product->total() }} <br/>
                Data Per Halaman : {{ $product->perPage() }} <br/>


                {{ $product->links() }}
                <br>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->


@endsection