<!-- -------------------------------------------------------------------------- --> 

<!-- Menghubungkan dengan view template master -->
@extends('master')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'DATA TRANSACTION')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
              <div class="table-responsive">
            

            <form action="{{ route('user.cari') }}" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" name="cari" class="form-control bg-light border-1 small" placeholder="Cari User ...">
                    <div class="input-group-append">
                        <input type="submit" value="Cari" class="btn btn-danger">
                    </div>
                </div>
             </form>
          <br>
          <br>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Id Transaction</th>
                        <th>Tanggal Order</th>
                        <th>User</th>
                        <th>Total Order</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($transaction as $t)
                    <tr>
                        <td>{{ $t->id_transaction }}</td>
                        <td>{{ $t->date_order }}</td>
                        <td>{{ $t->name }}</td>
                        <td>{{ $t->total_order }}</td>
                        <td>
                            @if ( $t->status  == 'sedang disiapkan')
                                <div class="btn-info btn-sm">{{ $t->status }}</div>
                            @elseif ( $t->status  == 'belum diproses')
                                <div class="btn-secondary btn-sm">{{ $t->status }}</div>
                            @elseif ( $t->status  == 'siap ambil')
                                <div class="btn-warning btn-sm">{{ $t->status }}</div>
                            @elseif ( $t->status  == 'sudah diambil')
                                <div class="btn-success btn-sm">{{ $t->status }}</div>
                            @elseif ( $t->status  == 'ditolak')
                                <div class="btn-danger btn-sm">{{ $t->status }}</div>
                          @endif
                          
                        </td>
                        <td>
                            <a class="btn btn-warning btn-sm mb-2" href="{{ route('transaction.detail', ['id_transaction' => $t->id_transaction ]) }}">Lihat Detail</a>
                        </td>
                    </tr>
                @endforeach
                  </tbody>
                </table>

                

                Halaman : {{ $transaction->currentPage() }} <br/>
                Jumlah Data : {{ $transaction->total() }} <br/>
                Data Per Halaman : {{ $transaction->perPage() }} <br/>


                {{ $transaction->links() }}
                <br>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->


@endsection