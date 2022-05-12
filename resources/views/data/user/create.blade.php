@extends('layouts.app')
@section('title', 'Tambah User - Apotek Ara Farma')
@section('user', 'active')
@section('content')
    <!-- Begin Page Content -->
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card shadow-lg">
                    <div class="card-header">
                        Tambah User
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span>{{ $message }}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    id="name" required />
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="username">Username<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    id="username" name="username" required />
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email<sup class="text-danger">*</sup></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" required />
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" required />
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No. HP<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                                    name="no_hp" required />
                                @error('no_hp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
