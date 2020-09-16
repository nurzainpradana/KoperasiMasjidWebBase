

<!-- -------------------------------------------------------------------------- --> 

<!-- Menghubungkan dengan view template master -->
@extends('master')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'DATA USER')

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
                    <input type="text" name="cari" required="required" class="form-control bg-light border-1 small" placeholder="Cari User ...">
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
                    <th>Id User</th>
                    <th>Nama User</th>
                    <th>No Phone</th>
                    <th>Username</th>
                    <th>email</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                    <th>Photo Profile</th>
                    <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($user as $u)
                    <tr>
                        <td>{{ $u->id_user }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->no_phone }}</td>
                        <td>{{ $u->username }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->address }}</td>
                        <td>{{ $u->date_of_birth }}</td>
                        <td><img class="img-responsive img-thumbnail" src="{{ url('/image/user/'.$u->photo_profile) }}" width="300px"> </td>
                        <td>
                            <a class="btn btn-warning btn-sm mb-2" href="{{ route('user.reset', ['id_user' => $u->id_user ]) }}">Reset Password</a>
                            <a class="btn btn-danger btn-sm" href="{{ route('user.delete', ['id_user' => $u->id_user ]) }}">Hapus</a>
                        </td>
                    </tr>
                @endforeach
                  </tbody>
                </table>

                

                Halaman : {{ $user->currentPage() }} <br/>
                Jumlah Data : {{ $user->total() }} <br/>
                Data Per Halaman : {{ $user->perPage() }} <br/>


                {{ $user->links() }}
                <br>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->


@endsection