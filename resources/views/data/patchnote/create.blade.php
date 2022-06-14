@extends('layouts.app')
@section('title', 'Tambah Patch Note - Apotek Ara Farma')
@section('kelola-patchnote', 'active')
@section('content')
    <!-- Begin Page Content -->
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card shadow-lg">
                    <div class="card-header">
                        Tambah Patch Note
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
                        <form action="{{ route('patchnote.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label>Thumbnail<sup class="text-danger">*</sup></label>
                            <div class="custom-file">
                                <label class="custom-file-label" for="file">Pilih File</label>
                                <input type="file" class="custom-file-input @error('thumbnail') is-invalid @enderror" id="file" name="thumbnail" accept=".jpg, .jpeg, .png, .svg"
                                    id="thumbnail" required />
                                @error('thumbnail')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="title">Title<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" required />
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
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
                                    id="subtitle" name="subtitle" required />
                                @error('subtitle')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="featured_img">Featured Img<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control @error('featured_img') is-invalid @enderror" id="featured_img"
                                    name="featured_img" required />
                                @error('featured_img')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="body">Body<sup class="text-danger">*</sup></label>
                                <textarea id="summernote" class="form-control @error('body') is-invalid @enderror" id="body"
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

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            tabsize: 2,
            height: 300,
            toolbar: [
            ['style', ['style']],
            ['view', ['undo', 'redo']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['table', 'link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>
@endpush
