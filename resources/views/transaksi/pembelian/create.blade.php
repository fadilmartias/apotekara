@extends('layouts.app')
@section('title', 'Tambah Pembelian - Apotek Ara Farma')
@section('pembelian', 'active')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow-lg">
                    <div class="card-header">
                        Tambah Pembelian
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span>{{ $message }}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form action="{{ route('pembelian.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama_penjual" class="font-weight-bold">Nama Penjual</label>
                                <input type="text" class="form-control @error('nama_penjual') is-invalid @enderror " id="nama_penjual"
                                name="nama_penjual" value="{{ old('nama_penjual') }}" required />
                            @error('nama_penjual')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th style="width:45%;">Nama Obat<sup class="text-danger">*</sup></th>
                                        <th style="width:10%;">Qty<sup class="text-danger">*</sup></th>
                                        <th style="width:20%;">Harga<sup class="text-danger">*</sup></th>
                                        <th style="width:20%;">Total Harga<sup class="text-danger">*</sup></th>
                                        <th style="width:5%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <div>
                                                    <select name="obat_id[]" id="obat-0" class="form-control" onchange="loadData(0)" style="width:684.469px">
                                                    <option selected disabled>--- Pilih Obat ---</option>
                                                    @foreach ($obat as $data)
                                                    <option {{ old('obat_id[]') == $data->id ? "selected" : "" }} value="{{ $data->id }}" data-stok="{{ $data->stok }}" data-harga="{{ $data->harga }}">{{ $data->nama_obat }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('obat_id[]')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="number" class="form-control @error('qty[]') is-invalid @enderror " id="qty-0"
                                                name="qty[]" onchange="loadData(0)" min="0" oninput="validity.valid||(value='');" value="{{ old('qty[]') }}" disabled />
                                                <small class="text-muted" id="infoStok-0">Stok : -</small>
                                            @error('qty[]')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                  </div>
                                                <input type="text" class="text-right form-control @error('harga[]') is-invalid @enderror"
                                                    id="harga-0" name="harga[]" value="{{ old('harga[]') }}" disabled />
                                                @error('harga[]')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                  </div>
                                                <input type="text" class="text-right form-control @error('total_harga[]') is-invalid @enderror"
                                                id="total_harga-0" name="total_harga[]" value="{{ old('total_harga[]') }}" disabled />
                                                @error('total_harga[]')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </td>
                                        <td>
                                               <button type="button" class="btn btn-info" onclick="addRow()">Tambah</button>
                                        </td>
                                    </tr>
                                    <tr> 
                                       <td colspan="3" class="font-weight-bold"><h5>Total Transaksi</h5></td>
                                       <td>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                              </div>
                                              <input type="text" name="total_transaksi" id="total" class="text-right form-control" 
                                              {{-- style="background-color: white; border: 0"  --}}
                                              readonly>
                                        </div>
                                        
                                       </td>
                                       <td>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                       </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    @push('head-script')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vanilla-masker@1.1.1/build/vanilla-masker.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endpush

    @push('body-script')

        <script>  
            $('#obat-0').select2();
            var id = 1
            const loadData = (index) => {
                const qty = document.querySelector('#qty-'+index);
                const obat = document.querySelector('#obat-'+index);
                const harga = document.querySelector('#harga-'+index);
                const infoStok = document.querySelector('#infoStok-'+index);
                const total_harga = document.querySelector('#total_harga-'+index);
                const option = obat.options[obat.selectedIndex];
                const hargaObat = option.getAttribute('data-harga');
                const stokObat = option.getAttribute('data-stok');
                qty.removeAttribute('disabled');
                harga.value = hargaObat;
                if(qty.value != "") {
                    const stokAkhir = parseInt(stokObat) + parseInt(qty.value) 
                    infoStok.innerHTML = `Stok : ${stokAkhir}`
                    total_harga.value = hargaObat * qty.value
                } else {
                    const stokAkhir = parseInt(stokObat) + qty.value 
                    infoStok.innerHTML = `Stok : ${stokAkhir}`
                }
                var arr = document.getElementsByName('total_harga[]');
                var tot = 0;
                for(var i=0;i<arr.length;i++){
                    if(parseInt(arr[i].value))
                    tot += parseInt(arr[i].value.replaceAll('.', ''));
                }
                document.getElementById('total').value = tot;
                VMasker(harga).maskMoney({
                    // Decimal precision -> "90"
                    precision: 0,
                    // Decimal separator -> ",90"
                    separator: ',',
                    // Number delimiter -> "12.345.678"
                    delimiter: '.',
                    // Money unit -> "R$ 12.345.678,90"
                    zeroCents: true
                });
                VMasker(arr).maskMoney({
                    // Decimal precision -> "90"
                    precision: 0,
                    // Decimal separator -> ",90"
                    separator: ',',
                    // Number delimiter -> "12.345.678"
                    delimiter: '.',
                    // Money unit -> "R$ 12.345.678,90"
                    zeroCents: true
                });
                VMasker(document.getElementById('total')).maskMoney({
                    // Decimal precision -> "90"
                    precision: 0,
                    // Decimal separator -> ",90"
                    separator: ',',
                    // Number delimiter -> "12.345.678"
                    delimiter: '.',
                    // Money unit -> "R$ 12.345.678,90"
                    zeroCents: true
                });
                // if(parseInt(qty.value) > parseInt(stokObat)) {
                //     infoStok.classList.remove('text-muted')
                //     infoStok.classList.add('text-danger')
                //     infoStok.innerHTML = `Stok tersedia : ${stokObat}`
                //     qty.classList.add('is-invalid')
                // } else {
                //     infoStok.classList.add('text-muted')
                //     infoStok.classList.remove('text-danger')
                //     infoStok.innerHTML = `Stok : ${stokAkhir}`
                //     qty.classList.remove('is-invalid')
                // }

            }

            const addRow = () => {
               var index = id++
               const table = document.getElementById('table');
               var row = table.insertRow(2);
               var cell1 = row.insertCell(0);
               var cell2 = row.insertCell(1);
               var cell3 = row.insertCell(2);
               var cell4 = row.insertCell(3);
               var cell5 = row.insertCell(4);

               cell1.innerHTML = `<div class="form-group">
                                                <div>
                                                    <select name="obat_id[]" id="obat-${index}" class="form-control" onchange="loadData(${index})" style="width:684.469px">
                                                    <option selected disabled>--- Pilih Obat ---</option>
                                                    @foreach ($obat as $data)
                                                    <option value="{{ $data->id }}" data-stok="{{ $data->stok }}" data-harga="{{ $data->harga }}">{{ $data->nama_obat }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('obat_id[]')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>`
                
                cell2.innerHTML = `<div class="form-group">
                                                <input type="number" class="form-control @error('qty[]') is-invalid @enderror" id="qty-${index}"
                                                name="qty[]" onchange="loadData(${index})" min="0" oninput="validity.valid||(value='');" value="{{ old('qty[]') }}" disabled required />
                                                <small class="text-muted" id="infoStok-${index}">Stok : -</small>
                                            @error('qty[]')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>`
                cell3.innerHTML = `<div class="input-group">
                    <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                  </div>
                                                <input type="text" class="text-right form-control @error('harga[]') is-invalid @enderror"
                                                    id="harga-${index}" name="harga[]" min="0" oninput="validity.valid||(value='');" value="{{ old('harga[]') }}" disabled />
                                                @error('harga[]')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>`
                cell4.innerHTML = `<div class="input-group">
                    <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                  </div>
                                                <input type="text" class="text-right form-control @error('total_harga[]') is-invalid @enderror"
                                                id="total_harga-${index}" name="total_harga[]" min="0" oninput="validity.valid||(value='');" value="{{ old('total_harga[]') }}" disabled />
                                                @error('total_harga[]')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>`
                cell5.innerHTML = `<button type="button" class="btn btn-danger" onclick="delRow(this)">Hapus</button>`;
                $('#obat-'+index).select2({
                    width: 'style'
                });
            }
            const delRow = (r) => {
            var i = r.parentNode.parentNode.rowIndex;
             document.getElementById('table').deleteRow(i);
             var arr = document.getElementsByName('total_harga[]');
             var tot = 0;
                for(var i=0;i<arr.length;i++){
                    if(parseInt(arr[i].value))
                        tot += parseInt(arr[i].value.replaceAll('.', ''));
                }
                document.getElementById('total').value = tot;
            }
        </script>
    @endpush
@endsection
