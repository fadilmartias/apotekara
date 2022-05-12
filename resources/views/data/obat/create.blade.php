@extends('layouts.app')
@section('title', 'Tambah Obat - Apotek Ara Farma')
@section('obat', 'active')
@section('content')

<!-- Begin Page Content -->
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card shadow-lg">
                <div class="card-header">
                    Tambah Obat
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
                    <form action="{{ route('obat.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Obat<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="name" required />
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label for="satuan">Satuan<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control @error('satuan') is-invalid @enderror"
                                id="satuan" name="satuan" required />
                            @error('satuan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}
                        <div class="form-group">
                            <label for="harga_satuan">Harga Satuan<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control @error('harga_satuan') is-invalid @enderror" id="harga_satuan"
                                name="harga_satuan" required />
                            @error('harga_satuan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="harga_strip">Harga Strip<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control @error('harga_strip') is-invalid @enderror"
                                id="harga_strip" name="harga_strip" required />
                            @error('harga_strip')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control @error('stok') is-invalid @enderror" id="stok"
                                name="stok" required />
                            @error('stok')
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


