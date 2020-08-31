<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koperasi Masjid</title>
</head>
<body>

    <header>
        <h2>Koperasi Masjid</h2>
        <nav>
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('product') }}">Product</a>
            <a href="{{ route('user') }}">User</a>
            <a href="{{ route('transaction') }}">Transaction</a>
        </nav>
    </header>

    <hr>
    <br>
    <br>

    <!-- bagian judul halaman blog -->
    <h3> @yield('judul_halaman') </h3>

    <!-- bagian judul konten blog -->
    @yield('konten')

    <br>
    <br>
    <hr>
    <footer>
        <p>&copy; <a href="http://localhost/koperasimasjid/public">Koperasi Masjid</a></p>
    </footer>

    
</body>
</html>