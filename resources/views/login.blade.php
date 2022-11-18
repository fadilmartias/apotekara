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

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center m-0 mt-5 ">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Apotek Ara Farma <small>v.1.1</small> </h1>
                                    </div>
                                    <div class="">
                                        <svg style="display:block; height:150px; width:150px; margin:0 auto;"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                            <path
                                                d="M501.5 60.87c17.25-17.12 12.5-46.25-9.25-57.13c-12.12-6-26.5-4.75-37.38 3.375L251.1 159.1h151.4L501.5 60.87zM496 191.1h-480c-8.875 0-16 7.125-16 16v32c0 8.875 7.125 16 16 16L31.1 256c0 81 50.25 150.1 121.1 178.4c-12.75 16.88-21.75 36.75-25 58.63C126.8 502.9 134.2 512 144.2 512h223.5c10 0 17.51-9.125 16.13-19c-3.25-21.88-12.25-41.75-25-58.63C429.8 406.1 479.1 337 479.1 256L496 255.1c8.875 0 16-7.125 16-16v-32C512 199.1 504.9 191.1 496 191.1z" />
                                        </svg>
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
                                    <form class="user mt-4" action="{{ route('actionLogin') }} " method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="username" placeholder="Username / Email"
                                                class="form-control form-control-user" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" placeholder="Password" name="password"
                                                class="form-control form-control-user" id="password-field" required />

                                            {{-- <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span> --}}
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-md-6 custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck" name="remember_me">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                            <div class="col-md-6">
                                                <a class="small float-right" href="{{ route('password.request') }}">Forgot
                                                    Password?</a>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" data-toggle="modal" data-target="#register">Create an
                                            Account!</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Register -->
    <div class="modal fade" id="register" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="registerLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerLabel">Buat Akun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('actionRegister') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-label">Nama<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" required>

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="username" class="form-label">Username<sup
                                    class="text-danger">*</sup></label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                name="username" required>

                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email<sup class="text-danger">*</sup></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" required>

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="new_password" class="form-label">Password<sup
                                    class="text-danger">*</sup></label>
                            <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                                name="new_password" required>
                                <div><small class="text-muted">*password minimal 8 karakter</small></div>

                            @error('new_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="new_password_confirmation" class="form-label">Konfirmasi Password<sup
                                    class="text-danger">*</sup></label>
                            <input type="password"
                                class="form-control @error('new_password_confirmation') is-invalid @enderror"
                                name="new_password_confirmation" required>

                            @error('new_password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="no_hp" class="form-label">No. HP<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                name="no_hp" required>

                            @error('no_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
                </form>

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

    <script type="text/javascript">
        @error('email')
            $('#register').modal('show');
        @enderror

        @error('name')
            $('#register').modal('show');
        @enderror

        @error('username')
            $('#register').modal('show');
        @enderror

        @error('new_password')
            $('#register').modal('show');
        @enderror

        @error('new_password_confirmation')
            $('#register').modal('show');
        @enderror

        @error('no_hp')
            $('#register').modal('show');
        @enderror
    </script>

</body>

</html>
