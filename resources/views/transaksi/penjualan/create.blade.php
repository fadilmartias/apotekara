@extends('layouts.app')
@section('title', 'Tambah Penjualan - Apotek Ara Farma')
@section('penjualan', 'active')
@section('content')

    <div class="container">
        <form action="{{ route('penjualan.store') }}" class="insert-form" id="insert_form" method="POST">
            @csrf
            <h1 class="text-center">Tambah Penjualan</h1>
            <hr>
            <div class="input-field">
                <table class="table table-bordered" id="table_field">
                    <thead>
                        <tr>
                            <th>Nama Obat</th>
                            <th>Satuan</th>
                            <th>Qty</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            {{-- <th>Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-4">
                                <select class="js-example-basic-single form-select" data-width="100%" name="name">
                                    @foreach ($obats as $obat)
                                        <option value="{{ $obat->id }}" data-hargasatuan="{{ $obat->harga_satuan }}"
                                            data-hargastrip="{{ $obat->harga_strip }}" data-stok="{{ $obat->stok }}">
                                            {{ $obat->nama_obat }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="col-md-1"><select class="js-example-basic-single form-select" data-width="100%"
                                    name="satuan" id="satuan" disabled>
                                    <option value="">-- Pilih Satuan --
                                    </option>
                                    <option value="Pcs">Pcs
                                    </option>
                                    <option value="Strip">Strip
                                    </option>
                                    <option value="Botol">Botol
                                    </option>
                                </select></td>
                            <td class="col-md-1"><input type="text" name="qty" class="form-control" required
                                    disabled></td>
                            <td class="col-md-1"><input type="text" name="stok" class="form-control" required
                                    disabled></td>
                            <td class="col-md-2">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="text" name="harga" class="form-control" id="harga" required disabled>
                                </div>
                            </td>
                            {{-- <td class="col-md-1"><input type="button" name="add" id="add" value="Tambah Baris" class="btn btn-primary"></td> --}}
                        </tr>
                    </tbody>
                </table>
                <center>
                    <input type="submit" id="add" class="btn btn-success">
                </center>
        </form>
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
                        var valHargaSatuan = $(this).children('option:selected').data('hargasatuan');
                        var valHargaStrip = $(this).children('option:selected').data('hargastrip');
                        var valStok = $(this).children('option:selected').data('stok');
                        var harga = $("[name^='harga']");
                        var stok = $("[name^='stok']");
                        var qty = $("[name^='qty']");
                        qty.val(1);
                        $('#satuan').on('change', function() {
                            var satuan = $('#satuan').val();
                            if (satuan === "Pcs" || satuan === "Botol" ) {
                                harga.val(valHargaSatuan);
                            } else {
                                harga.val(valHargaStrip);
                            }
                        });
                            stok.val(valStok - 1);
                            $(qty).removeAttr('disabled');
                            $('#satuan').removeAttr('disabled');
                            $(qty).on('change', function() {
                                var satuan = $('#satuan').val();
                                if (satuan === "Pcs" || satuan === "Botol" ) {
                                    harga.val(valHargaSatuan * qty.val());
                                    stok.val(valStok - qty.val());
                            } else {
                                harga.val(valHargaStrip * qty.val());
                                stok.val(valStok - qty.val()*10);
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