<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login - Apotek Ara Farma</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('img/mortar-pestle-solid.svg') }}">

</head>

<body class="bg-gradient-primary">

    <div class="container vh-100">
        <div class="content-wrapper d-flex justify-content-center align-items-center w-50 h-100 m-auto">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4 text-center">
                <div class="card-header py-3">
                    <h3 class="m-0 font-weight-bold text-primary text-center p-2">Lupa Password</h3>
                </div>
                <div class="card-body p-5">
                    <img class="" style="height:350px; width:350px;"
                        src="{{ asset('img/forgot-password.svg') }}"> <br>
                    Lupa Password? Jangan khawatir, cukup masukkan emailmu dan kami akan mengirimkan link untuk mereset
                    passwordmu
                    <form class="user mt-4" action="{{ route('password.email') }} " method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Email" class="form-control form-control-user @error('email') is-invalid @enderror" value="{{ old('email')}}"
                                required autofocus/>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                 <x-auth-session-status class="mb-2 mt-2" :status="session('status')" />
                        </div>
                        
                        <div class="form-group row justify-content-center">
                            <a class="mr-3 btn btn-secondary btn-user" href="{{ route('login') }}">Kembali</a>
                            <button class="btn btn-primary btn-user" type="submit">Konfirmasi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
