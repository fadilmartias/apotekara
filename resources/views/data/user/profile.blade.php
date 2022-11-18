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
                        <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="text-center">
                                    @if (Auth::user()->avatar)
                                        <img class="rounded-circle" style="height:150px; width:150px; "
                                            src="{{ asset('storage/' . Auth::user()->avatar) }}">
                                    @else
                                        <img class="rounded-circle" style="height:150px; width:150px;"
                                            src="{{ asset('img/undraw_profile.svg') }}">
                                    @endif
                                </div><br>
                                <div class="text-center">
                                    <a href="#avatar" data-toggle="modal">Ubah foto
                                        profil</a>
                                    @if (Auth::user()->avatar)
                                        <a class="text-danger ml-4" href="#" data-toggle="modal"
                                            data-target="#hapusAvatar">Hapus
                                            foto profil</a>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Nama<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    id="name" placeholder="Name" value="{{ old('name') ?? Auth::user()->nama_user }}"
                                    required />
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="username">Username<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    id="username" name="username" placeholder="Username"
                                    value="{{ old('username') ?? Auth::user()->username }}" required />
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email<sup class="text-danger">*</sup></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    placeholder="Email" name="email" value="{{ old('email') ?? Auth::user()->email }}"
                                    required />
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No. HP<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                                    placeholder="No. HP" name="no_hp" value="{{ old('no_hp') ?? Auth::user()->no_hp }}"
                                    required />
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
                                id="password" name="curr_password" required>

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
                                id="password" name="new_password" required>
                                <div><small class="text-muted">*password minimal 8 karakter</small></div>

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
                                id="password" name="new_password_confirmation" required>

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

    <!-- Upload Avatar -->
    <div class="modal fade" id="avatar" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="avatarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gantiPasswordLabel">Upload Foto Profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="#" enctype="multipart/form-data" id="formAvatar">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('avatar') is-invalid @enderror" id="file"
                                accept=".jpg, .jpeg, .png, .svg" name="avatar" required>
                            <label class="custom-file-label" for="file">Pilih File</label>
                            @error('avatar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div id="uploading"></div>
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                        <button type="submit" class="btn btn-primary" id="upload">Upload</button> --}}
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Hapus Avatar -->
    <div class="modal fade" id="hapusAvatar" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="hapusAvatarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gantiPasswordLabel">Hapus Foto Profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('profile.avatar.destroy', Auth::user()->id) }}"
                    enctype="multipart/form-data" id="formAvatarDelete" type="hidden">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        Yakin ingin menghapus foto profil?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" id="hapus">Yakin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('head-script')
    <link rel="stylesheet" href="{{ asset('ijaboCropTool/ijaboCropTool.min.css') }}">
@endpush

@push('body-script')
    <script>
        $('#file').on('change', function() {
            if (this.files && this.files[0]) {
                const fileName = this.files[0].name;
                const label = $('[for="file"]')[0];

                label.innerText = fileName;

                let uploadBtn = $('#upload');

                uploadBtn.prop('disabled', false);

                uploadBtn.on('click', function() {
                    uploadBtn.prop('disabled', true);
                    $('#formAvatar').submit();
                });
            }
        });
    </script>

    <script src="{{ asset('ijaboCropTool/ijaboCropTool.min.js') }}"></script>

    <script>
        $('#file').ijaboCropTool({
            preview: '.imgTagClass',
            setRatio: 1,
            allowedExtensions: ['jpg', 'jpeg', 'png'],
            buttonsText: ['CROP', 'QUIT'],
            buttonsColor: ['#30bf7d', '#ee5155', -15],
            processUrl: '{{ route('profile.avatar.crop', Auth::user()->id) }}',
            withCSRF: ['_token', '{{ csrf_token() }}'],
            onSuccess: function(message, element, status) {
                alert(message);
                window.location.reload()
            },
            onError: function(message, element, status) {
                alert(message);
                window.location.reload()
            }

        });
    </script>

    <script>
        if (document.getElementById("password").classList.contains("is-invalid")) {
            $("#gantiPassword").modal('show');
        }
    </script>
@endpush
