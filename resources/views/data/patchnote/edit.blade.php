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
                            <label>Thumbnail<sup class="text-danger">*</sup></label>
                            <div class="custom-file">
                                <label class="custom-file-label" for="file">Pilih File</label>
                                <input type="file" class="custom-file-input @error('thumbnail') is-invalid @enderror" id="file" name="thumbnail" accept=".jpg, .jpeg, .png, .svg" value="{{ old('thumbnail') ?? $pn->thumbnail }}"
                                    id="thumbnail" required />
                                @error('thumbnail')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="title">Title<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ?? $pn->title }}"
                                    id="title" name="title" required />
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{ old('slug') ?? $pn->slug }}"
                                    name="slug" required />
                                @error('slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="subtitle">Subtitle<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control @error('subtitle') is-invalid @enderror"
                                    id="subtitle" name="subtitle" value="{{ old('subtitle') ?? $pn->subtitle }}" required />
                                @error('subtitle')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="featured_img">Featured Img<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control @error('featured_img') is-invalid @enderror" id="featured_img" value="{{ old('featured_img') ?? $pn->featured_img }}"
                                    name="featured_img" required />
                                @error('featured_img')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="body">Body<sup class="text-danger">*</sup></label>
                                <textarea id="summernote" class="form-control @error('body') is-invalid @enderror" id="body" value="{{ old('body') ?? $pn->body }}"
                                    name="body" required style="resize: none">{{ old('body') }}</textarea>
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
        if (document.getElementById("password").classList.contains("is-invalid")) {
            $("#gantiPassword").modal('show');
        }
    </script>
@endpush
