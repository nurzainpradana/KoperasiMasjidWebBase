<!-- Menghubungkan dengan view template master -->
@extends('master')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman User')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')

<style type="text/css">
    .pagination li{
        float: left;
        list-style-type: none;
        margin: 5px;
    }
</style>

<h3>DATA USER</h3>

<br>
<br>

<table border="1">
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

    @foreach($user as $u)
        <tr>
            <td>{{ $u->id_user }}</td>
            <td>{{ $u->name }}</td>
            <td>{{ $u->no_phone }}</td>
            <td>{{ $u->username }}</td>
            <td>{{ $u->email }}</td>
            <td>{{ $u->address }}</td>
            <td>{{ $u->date_of_birth }}</td>
            <td>{{ $u->photo_profile }}</td>
            <td>
                <a href="{{ route('user.reset', ['id_user' => $u->id_user ]) }}">Reset Password</a>
                <a href="{{ route('user.delete', ['id_user' => $u->id_user ]) }}">Hapus</a>
            </td>
        </tr>
    @endforeach
</table>
<br/>
	Halaman : {{ $user->currentPage() }} <br/>
	Jumlah Data : {{ $user->total() }} <br/>
	Data Per Halaman : {{ $user->perPage() }} <br/>


    {{ $user->links() }}

    <br>

@endsection