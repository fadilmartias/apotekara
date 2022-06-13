@extends('layouts.app')
@section('title', 'Edit Patch Note - Apotek Ara Farma')
@section('kelola-patchnote', 'active')
@section('content')
    <!-- Begin Page Content -->
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card shadow-lg">
                    <div class="card-header">
                        Edit Patch Note
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
                        <form action="{{ route('patchnote.update', $pn->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="text-center">
                                    @if ($pn->thumbnail)
                                        <img class="rounded-circle" style="height:150px; width:150px;"
                                            src="{{ asset('storage/' . $pn->thumbnail) }}">
                                    @else
                                        <img class="rounded-circle" style="height:150px; width:150px;"
                                            src="{{ asset('img/undraw_profile.svg') }}">
                                    @endif
                                </div><br>
                                <div class="text-center">
                                    <a href="#avatar" data-toggle="modal">Ubah foto
                                        profil</a>
                                    @if ($pn->thumbnail)
                                        <a class="text-danger ml-4" href="#" data-toggle="modal"
                                            data-target="#hapusAvatar">Hapus
                                            foto profil</a>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title">title<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                    id="title" placeholder="Title" value="{{ old('title') ?? $pn->title }}" required />
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                    id="slug" name="slug" placeholder="Slug"
                                    value="{{ old('slug') ?? $pn->slug }}" required />
                                @error('slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="subtitle">Subtitle<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle"
                                    placeholder="Subtitle" name="subtitle" value="{{ old('subtitle') ?? $pn->subtitle }}"
                                    required />
                                @error('subtitle')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="featured_img">Featured Img<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control @error('featured_img') is-invalid @enderror" id="featured_img"
                                    placeholder="Featured Img" name="featured_img" value="{{ old('featured_img') ?? $pn->featured_img }}"
                                    required />
                                @error('featured_img')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="body">Body<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control @error('body') is-invalid @enderror" id="body"
                                    placeholder="Body" name="body" value="{{ old('body') ?? $pn->body }}"
                                    required />
                                @error('body')
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
                <form method="POST" action="{{ route('profile.avatar.destroy', $user->id) }}"
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
            processUrl: '{{ route('profile.avatar.crop', $user->id) }}',
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
