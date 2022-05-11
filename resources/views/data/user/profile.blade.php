@extends('layouts.app')
@section('title', 'Edit Profil - Apotek Ara Farma')
@section('content')
    <!-- Begin Page Content -->
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card shadow-lg">
                    <div class="card-header">
                        Edit Profile
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
                        <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="text-center">
                                    <img class="rounded-circle" style="width:15%;"
                                    src="{{ asset('img/undraw_profile.svg') }}">
                                </div><br>
                                <div class="text-center text-primary">
                                    <a href="#">Ubah foto profil</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Nama<sup
                                    class="text-danger">*</sup></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name"
                                    value="{{ old('name') ?? Auth::user()->nama_user }}" required />
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Username<sup
                                    class="text-danger">*</sup></label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username"
                                    value="{{ old('username') ?? Auth::user()->username }}" required />
                                    @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Email<sup
                                    class="text-danger">*</sup></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email"
                                    value="{{ old('email') ?? Auth::user()->email }}" required />
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">No. HP<sup
                                    class="text-danger">*</sup></label>
                                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="No. HP" name="no_hp"
                                    value="{{ old('no_hp') ?? Auth::user()->no_hp }}" required />
                                    @error('no_hp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>
                            <div class="d-flex justify-content-end mt-4">
                                <button type="button" class="btn btn-outline-danger mr-2" data-toggle="modal"
                                    data-target="#gantiPassword">
                                    Ganti Password
                                </button>
                            <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <!-- Ganti Password -->
<div class="modal fade" id="gantiPassword" data-backdrop="static" data-keyboard="false" tabindex="-1"
aria-labelledby="gantiPasswordLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="gantiPasswordLabel">Ganti Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" action="{{ route('profile.password', Auth::user()->id) }}">
            @csrf
            @method('put')

            <div class="modal-body">
                <div class="form-group">
                    <label for="curr_password" class="form-label">Password Sekarang<sup
                            class="text-danger">*</sup></label>
                    <input type="password" class="form-control @error('curr_password') is-invalid @enderror"
                        id="curr_password" name="curr_password" required>

                    @error('curr_password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="new_password" class="form-label">Password Baru<sup
                            class="text-danger">*</sup></label>
                    <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                        id="new_password" name="new_password" required>

                    @error('new_password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="new_password_confirmation" class="form-label">Konfirmasi Password Baru<sup
                            class="text-danger">*</sup></label>
                    <input type="password"
                        class="form-control @error('new_password_confirmation') is-invalid @enderror"
                        id="new_password_confirmation" name="new_password_confirmation" required>

                    @error('new_password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Ganti Password</button>
            </div>
        </form>

    </div>
</div>
</div>
@endsection
