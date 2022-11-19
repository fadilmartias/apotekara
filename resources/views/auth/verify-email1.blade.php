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
                    <h3 class="m-0 font-weight-bold text-primary text-center p-2">Verifikasi Email</h3>
                </div>
                @if (session('error'))
                    <div class="alert alert-danger">
                        <b>Opps!</b> {{ session('error') }}
                    </div>
                @elseif(session('success'))
                    <div class="alert alert-success">
                        <b>Horee!</b> {{ session('success') }}
                    </div>
                @endif
                <div class="card-body p-5">
                    {{-- <img class="" style="height:350px; width:350px;"
                        src="{{ asset('storage/source-img/forgot-password.jpg') }}"> <br> --}}
                       <p>Silakan buka link verifikasi yang telah kami kirimkan ke emailmu untuk memverifikasi akunmu. Tidak menerima email? Tekan tombol kirim ulang email verifikasi</p>
                       
                       @if (session('status') == 'verification-link-sent')
                       <div class="alert alert-success p-3">
                          Link verifikasi baru telah dikirim ke emailmu
                       </div>
                   @endif
                   <div class="mt-4 d-flex items-center justify-content-between">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <div>
                            <button type="submit" class="btn btn-primary">
                                Kirim Ulang Email Verifikasi
                            </button>
                        </div>
                    </form>
        
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-link">
                            Log Out
                        </button>
                    </form>
                </div>
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

</body>

</html>
