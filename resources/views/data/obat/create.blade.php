@extends('layouts.app')
@section('title', 'Tambah Obat - Apotek Ara Farma')
@section('obat', 'active')
@section('content')

<div class="container">
    <form action="{{ route('obat.store') }}" class="insert-form" id="insert_form" method="POST">
    @csrf
    <hr>
    <h1 class="text-center">Tambah Obat</h1>
    <hr>
    <div class="input-field">
            <table class="table table-bordered" id="table_field">
                <thead>
                    <tr>
                        <th>Nama Obat</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="name[]" class="form-control" required></td>
                        <td><input type="text" name="satuan[]" class="form-control" required></td>
                        <td><input type="text" name="harga[]" class="form-control" required></td>
                        <td><input type="text" name="stok[]" class="form-control" required></td>
                        <td><input type="button" name="add" id="add" value="Tambah Baris" class="btn btn-primary"></td>
                    </tr>
                </tbody>
            </table>
            <center>
                <input type="submit" name="save" id="add" value="Simpan Obat" class="btn btn-success">
            </center>
        </form>
    </div>
</div>

@push('head-script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#add').on('click',function() {
            var html = '';
            html+=
            html+='<tr>'
            html+='<td><input type="text" name="name[]" class="form-control" required></td>'
            html+='<td><input type="text" name="satuan[]" class="form-control" required></td>'
            html+='<td><input type="text" name="harga[]" class="form-control" required></td>'
            html+='<td><input type="text" name="stok[]" class="form-control" required></td>'
            html+='<td><input type="button" name="remove" id="remove" value="Hapus Baris" class="btn btn-danger"></td>'
            html+='</tr>'
            $('tbody').append(html);
        });
    });
    $(document).on('click','#remove',function(){
        $(this).closest('tr').remove();
    });
</script>
@endpush






































                <!-- Begin Page Content -->
                {{-- <div class="container">

                    <div class="row justify-content-center ">

                        <div class="col-xl-10 col-lg-12 col-md-9">

                            <div class="card o-hidden border-0 shadow-lg my-5">
                                <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6">
                                            <div class="p-5">
                                                <div class="text-center">
                                                    <h1 class="h4 text-gray-900 mb-4">Tambah Obat</h1>
                                                </div>
                                                <form class="user mt-4" action="{{ route('obat.create') }} " method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <input type="text" name="name" placeholder="Nama Obat"
                                                            class="form-control form-control-user {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                            required />
                                                            @if ($errors->has('name'))
                                                                <p class="text-danger">{{ $errors->first('name') }}</p>
                                                            @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="satuan" placeholder="Satuan"
                                                            class="form-control form-control-user {{ $errors->has('satuan') ? 'is-invalid' : '' }}"
                                                            required />
                                                            @if ($errors->has('satuan'))
                                                                <p class="text-danger">{{ $errors->first('satuan') }}</p>
                                                            @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="number" placeholder="Harga" name="harga"
                                                            class="form-control form-control-user {{ $errors->has('harga') ? 'is-invalid' : '' }}"
                                                            required />
                                                            @if ($errors->has('harga'))
                                                                <p class="text-danger">{{ $errors->first('harga') }}</p>
                                                            @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="number" placeholder="Stok" name="stok"
                                                            class="form-control form-control-user {{ $errors->has('stok') ? 'is-invalid' : '' }}"
                                                            required />
                                                            @if ($errors->has('stok'))
                                                                <p class="text-danger">{{ $errors->first('stok') }}</p>
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
                <!-- /.container-fluid --> --}}

@endsection


