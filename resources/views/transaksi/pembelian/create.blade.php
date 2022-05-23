@extends('layouts.app')
@section('title', 'Tambah Pembelian - Apotek Ara Farma')
@section('pembelian', 'active')
@section('content')

    <div class="container-fluid">
                <div class="card shadow-sm">
                    <div class="card-body">
                    <form action="{{ route('pembelian.store') }}" class="insert-form" id="insert_form" method="POST">
                        @csrf
                        <h1 class="text-center">Tambah Pembelian</h1>
                        <hr>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span>{{ $message }}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered" id="table_field">
                                <thead>
                                    <tr>
                                        <th>Nama Penjual</th>
                                        <th>Nama Obat</th>
                                        <th>Satuan</th>
                                        <th>Qty</th>
                                        <th>Stok</th>
                                        <th>Harga Satuan</th>
                                        <th>Total Harga</th>
                                        {{-- <th>Aksi</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="col-md-2"><input type="text" name="nama_penjual"
                                            class="form-control @error('nama_penjual') is-invalid @enderror" required>
                                        @error('nama_penjual')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </td>
                                        <td class="col-md-2">
                                            <select
                                                class="js-example-basic-single form-select @error('name') is-invalid @enderror"
                                                data-width="100%" name="name" required>
                                                <option value="">-- Pilih Obat --</option>
                                                @foreach ($obats as $obat)
                                                    <option value="{{ $obat->id }}"
                                                        data-hargasatuan="{{ $obat->harga_satuan }}"
                                                        data-hargastrip="{{ $obat->harga_strip }}"
                                                        data-stok="{{ $obat->stok }}">
                                                        {{ $obat->nama_obat }}</option>
                                                @endforeach
                                            </select><br>
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                        <td class="col-md-1"><select
                                                class="js-example-basic-single form-select @error('satuan') is-invalid @enderror"" data-width="
                                                100%" name="satuan" id="satuan" required>
                                                <option value="">-- Pilih Satuan --
                                                </option>
                                                <option value="Pcs">Pcs
                                                </option>
                                                <option value="Strip">Strip
                                                </option>
                                                <option value="Botol">Botol
                                                </option>
                                            </select><br>
                                            @error('satuan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                        <td class="col-md-1"><input type="text" name="qty"
                                                class="form-control @error('qty') is-invalid @enderror" required >
                                            @error('qty')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                        <td class="col-md-1"><input type="text" name="stok"
                                                class="form-control @error('stok') is-invalid @enderror" required>
                                            @error('stok')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                        <td class="col-md-2">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="text" name="harga_satuan"
                                                    class="form-control @error('harga_satuan') is-invalid @enderror" id="harga_satuan"
                                                    required>
                                            </div>
                                            @error('harga_satuan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                        <td class="col-md-2">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="text" name="total_harga"
                                                    class="form-control @error('total_harga') is-invalid @enderror" id="total_harga"
                                                    required disabled>
                                            </div>
                                            @error('total_harga')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                        {{-- <td class="col-md-1"><input type="button" name="add" id="add" value="Tambah Baris" class="btn btn-primary"></td> --}}
                                    </tr>
                                </tbody>
                            </table>


                            <div class="text-center">
                                <a class="btn btn-danger mr-3" href="{{ route('pembelian.index') }}">Kembali</a>
                                <input type="submit" id="add" class="btn btn-success">
                            </div>
                    </form>
                </div>
            </div>
    </div>
    </div>

    @push('head-script')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @endpush

    @push('body-script')
        {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('#add').on('click', function() {
                var html = '';
                html +=
                    html += '<tr>'
                html += '<td class="col-md-4"><select class="js-example-basic-single form-select" data-width="100%" name="name[]">@foreach ($obats as $obat)<option value="{{ $obat->id }}" data-harga="{{ $obat->harga_satuan }}">{{ $obat->nama_obat }}</option>@endforeach</select></td>'
                html += '<td><input type="text" name="satuan[]" class="form-control" required></td>'
                html += '<td><input type="text" name="qty[]" class="form-control" required></td>'
                html += '<td><input type="text" name="harga[]" class="form-control" required></td>'
                // html += '<td><input type="text" name="stok[]" class="form-control" required></td>'
                html +=
                    '<td><input type="button" name="remove" id="remove" value="Hapus Baris" class="btn btn-danger"></td>'
                html += '</tr>'
                $('tbody').append(html);

            });
        });
        $(document).on('click', '#remove', function() {
            $(this).closest('tr').remove();
        });
    </script> --}}
        <script>
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>
        <script>
            $("[name^='name']").on('change', function() {
                var valStok = $(this).children('option:selected').data('stok');
                var stok = $("[name^='stok']");
                var harga_satuan = $("[name^='harga_satuan']");
                var qty = $("[name^='qty']");
                var total_harga = $("[name^='total_harga']");
                $('#satuan').on('change', function() {
                    qty.val(1);
                    stok.val(valStok + 1);
                    $(qty).removeAttr('disabled');
                });
                $('#satuan').on('change', function() {
                    qty.val(1);
                    stok.val(valStok + 1);
                    $(qty).removeAttr('disabled');
                });
                $('#harga_satuan').on('change', function() {
                    total_harga.val(qty.val() * harga_satuan.val());
                });
                qty.val(1);
                stok.val(valStok + 1);
                $('#satuan').removeAttr('disabled');
                $(qty).on('change', function() {
                    var satuan = $('#satuan').val();
                    if (satuan === "Pcs" || satuan === "Botol") {
                        stok.val(valStok + Number(qty.val()));
                    } else {
                        stok.val(valStok + qty.val() * 10);
                    }
                });
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
