@extends('layouts.app')
@section('title', 'Tambah User - Apotek Ara Farma')
@section('user', 'active')
@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row justify-content-center ">

                        <div class="col-xl-10 col-lg-12 col-md-9">

                            <div class="card o-hidden border-0 shadow-lg my-5">
                                <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6">
                                            <div class="p-5">
                                                <div class="text-center">
                                                    <h1 class="h4 text-gray-900 mb-4">Tambah User</h1>
                                                </div>
                                                <form class="user mt-4" action="{{ route('user.store') }} " method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <input type="text" name="name" placeholder="Name"
                                                            class="form-control form-control-user {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                            required />
                                                            @if ($errors->has('name'))
                                                                <p class="text-danger">{{ $errors->first('name') }}</p>
                                                            @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="username" placeholder="Username"
                                                            class="form-control form-control-user {{ $errors->has('username') ? 'is-invalid' : '' }}"
                                                            required />
                                                            @if ($errors->has('username'))
                                                                <p class="text-danger">{{ $errors->first('username') }}</p>
                                                            @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" placeholder="Password" name="password"
                                                            class="form-control form-control-user {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                                            required />
                                                            @if ($errors->has('password'))
                                                                <p class="text-danger">{{ $errors->first('password') }}</p>
                                                            @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" placeholder="Email" name="email"
                                                            class="form-control form-control-user {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                            required />
                                                            @if ($errors->has('email'))
                                                                <p class="text-danger">{{ $errors->first('email') }}</p>
                                                            @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="No. HP" name="no_hp"
                                                            class="form-control form-control-user {{ $errors->has('no_hp') ? 'is-invalid' : '' }}"
                                                            required />
                                                            @if ($errors->has('no_hp'))
                                                                <p class="text-danger">{{ $errors->first('no_hp') }}</p>
                                                            @endif
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
                <!-- /.container-fluid -->
@endsection


