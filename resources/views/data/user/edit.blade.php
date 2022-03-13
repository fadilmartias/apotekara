@extends('layouts.app')
@section('title', 'Edit User - Apotek Ara Farma')
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
                                                    <h1 class="h4 text-gray-900 mb-4">Edit User</h1>
                                                </div>
                                                <form class="user mt-4" action="{{ route('user.update', $user->id) }} " method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <input type="text" name="name" placeholder="Name"
                                                            class="form-control form-control-user" value="{{ old('name') ?? $user->nama_user }}"
                                                            required />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="username" placeholder="Username"
                                                            class="form-control form-control-user" value="{{ old('username') ?? $user->username }}"
                                                            required />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" placeholder="Password" name="password"
                                                            class="form-control form-control-user"
                                                         />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" placeholder="Email" name="email"
                                                            class="form-control form-control-user" value="{{ old('email') ?? $user->email }}"
                                                            required />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="No. HP" name="no_hp"
                                                            class="form-control form-control-user" value="{{ old('no_hp') ?? $user->no_hp }}"
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
                <!-- /.container-fluid -->
@endsection


