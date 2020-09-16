<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Login</title>

 
  <!-- Custom fonts for this template -->
  <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

  <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

  <script src="{{ asset('assets/vendor/jquery/jquery.js') }}"></script>

</head>

<body class="bg-gradient-light">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h6 text-gray-900 mb-4">Assalamu'alaikum Warahmatullahi Wabarokatuh</h1>
                    <h1 class="h3 text-gray-900 mb-4">Selamat Datang</h1>
                  </div>

                  @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            {{ $error }} <br/>
                            @endforeach
                        </div>
                @endif

                @if ($message = Session::get('sukses'))
                <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{{ $message }}</strong>
                </div>
                @endif
        
                @if ($message = Session::get('gagal'))
                <div class="alert alert-danger alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{{ $message }}</strong>
                </div>
                @endif
        
                @if ($message = Session::get('peringatan'))
                <div class="alert alert-warning alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{{ $message }}</strong>
                </div>
                @endif

                  <form method="POST" action="{{ route('login.proses') }}" class="user">
                    @csrf
                    <div class="form-group">
                      <input type="text" name="inputUsername" class="form-control form-control-user" id="inputUsername"  placeholder="Masukkan Username...">
                      <br>
                    <div class="form-group">
                      <input type="password" name="inputPassword" class="form-control form-control-user" id="inputPassword" placeholder="Masukkan Password">
                    </div>
                    
                    <input type="submit" class="btn btn-danger btn-user btn-block" value="Login">
                    
                 
                  </form>
                  <hr>
                  <div class="text-center">
                  <p class="text-gray-900 mb-4">Koperasi Masjid At-Taqwa Bekasi</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>


</body>

</html>
