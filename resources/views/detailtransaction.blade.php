

<!-- Menghubungkan dengan view template master -->
@extends('master')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Detail Transaction')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card mt-5">
                <div class="card-body">
                <h3 class="text-center">Detail Transaksi</h3>

        
                <!-- Form Validasi-->
                
                
                <form action="{{route('detail.update') }}" method="post"> 
                    @foreach($head as $h)
                    {{ csrf_field()}}

                    <div class="form-group">
                        <label for="id_transaction">Id Transaction</label>
                        <input class="form-control" readonly type="number" name="id_transaction"  value="{{ $h->id_transaction }}">
                    </div>


                    <div class="form-group">
                        <label for="date_order">Tanggal Order</label>
                        <input class="form-control" readonly type="text" name="date_order" value="{{ $h->date_order }}">
                    </div>

                    <div class="form-group">
                        <label for="user_name">Nama User</label>
                        <input class="form-control" readonly type="text" name="user_name" value="{{ $h->name }}">
                    </div>

                    <div class="form-group">
                        <label for="total_order">Total Order</label>
                        <input class="form-control" readonly type="number" name="total_order" value="{{ $h->total_order }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required="required">        
                            <option value="belum diproses" {{($h->status == 'belum diproses') ? 'selected': '' }}>Belum Diproses</option>
                            <option value="sedang disiapkan" {{($h->status == 'sedang disiapkan') ? 'selected': '' }}>Sedang Disiapkan</option>
                            <option value="siap diambil" {{($h->status == 'siap diambil') ? 'selected': '' }}>Siap Diambil</option>
                            <option value="sudah diambil" {{($h->status == 'sudah diambil') ? 'selected': '' }}>sudah diambil</option>
                            <option value="ditolak" {{($h->status == 'ditolak') ? 'selected': '' }}>Ditolak</option>
                            
                        </select>
                    </div>

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Gambar Product</th>
                                <th>Nama Product</th>
                                <th>Harga Satuan</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($transaction as $t)
                            <tr>
                            <td ><img class="img-responsive img-thumbnail" src="{{ url('/image/product/'.$t->image) }}" width="300px"></td>
                                <td>{{ $t->product_name }}</td>
                                <td>{{ $t->harga_satuan }}</td>
                                <td>{{ $t->quantity }}</td>
                                <td>{{ $t->subtotal }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                
                    <input type="submit" class="btn btn-primary" value="Simpan Data">
                    <a href="{{ route('transaction') }}" class="btn btn-secondary ">Kembali</a>

                    @endforeach

                </form>
                
                
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection