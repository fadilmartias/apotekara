@extends('layouts.app')
@section('title', 'Edit Obat - Apotek Ara Farma')
@section('obat', 'active')
@section('content')
          <!-- Begin Page Content -->
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card shadow-lg">
                    <div class="card-header">
                        Edit Obat
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
                        <form action="{{ route('obat.update', $obat->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nama Obat<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    id="name"  value="{{ old('name') ?? $obat->nama_obat }}" required />
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label for="satuan">Satuan<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control @error('satuan') is-invalid @enderror"
                                    id="satuan" name="satuan" 
                                    value="{{ old('satuan') ?? $obat->satuan }}" required />
                                @error('satuan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                            <div class="form-group">
                                <label for="harga_satuan">Harga Satuan<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control @error('harga_satuan') is-invalid @enderror" id="harga_satuan"
                                     name="harga_satuan" value="{{ old('harga_satuan') ?? $obat->harga_satuan }}"
                                    required />
                                @error('harga_satuan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="harga_strip">Harga Strip<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control @error('harga_strip') is-invalid @enderror" id="harga_strip"
                                     name="harga_strip" value="{{ old('harga_strip') ?? $obat->harga_strip }}"
                                    required />
                                @error('harga_strip')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control @error('stok') is-invalid @enderror" id="stok"
                                     name="stok" value="{{ old('stok') ?? $obat->stok }}"
                                    required />
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


