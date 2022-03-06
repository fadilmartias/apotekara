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
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('img/mortar-pestle-solid.svg') }}">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center ">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Apotek Ara Farma</h1>
                                    </div>
                                    <div class="">
                                        <img style="height:150px;width:150px; display:block; margin:auto;" src="{{ asset('img/apotek.jpg') }}" alt="apotek">
                                    </div>
                                    @if(session('error'))
                                    <div class="alert alert-danger">
                                        <b>Opps!</b> {{session('error')}}
                                    </div>
                                    @endif
                                    <form class="user mt-4" action="{{ route('actionLogin') }} " method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="username" placeholder="Username"
                                                class="form-control form-control-user"
                                                required />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" placeholder="Password" name="password"
                                                class="form-control form-control-user"
                                                required />
                                        </div>
                                        <div class="form-group">
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>
