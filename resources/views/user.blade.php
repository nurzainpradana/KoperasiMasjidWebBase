<!-- Menghubungkan dengan view template master -->
@extends('master')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman User')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')

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
                <a href="{{ route('user.reset') }}">Edit</a>
                <a href="{{ route('user.hapus') }}">Hapus</a>
            </td>
        </tr>
    @endforeach
</table>



@endsection