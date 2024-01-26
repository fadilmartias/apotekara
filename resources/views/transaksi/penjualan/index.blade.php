@extends('layouts.app')
@section('title', 'Penjualan - Apotek Ara Farma')
@section('penjualan', 'active')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Penjualan
        </h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('penjualan.create') }}" class="btn btn-primary btn-icon-split float-right mt-0">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Penjualan
                    </span>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span>{{ $message }}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @elseif ($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <span>{{ $message }}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No. Transaksi</th>
                                <th>Total Harga</th>
                                <th>Kasir</th>
                                <th>Nama Pembeli</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penjualan as $data)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $data->no_transaksi }}</td>
                                    <td class="text-right">Rp. {{ number_format($data->total_transaksi, 0, ',', '.') }}</td>
                                    <td>{{ $data->user->nama_user }}</td>
                                    <td>{{ $data->nama_pembeli }}</td>
                                    <td>
                                        <button class="btn btn-secondary" data-toggle="modal"
                                            data-target="#detail-{{ $data->id }}">Lihat</button>
                                        <button class="btn btn-info" data-toggle="modal"
                                            data-target="#invoice-{{ $data->id }}">Cetak Invoice</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    @foreach ($penjualan as $data)
        <!-- Modal -->
        <div class="modal fade" id="detail-{{ $data->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="font-weight-bold">No. Transaksi : {{ $data->no_transaksi }}</h5>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Obat</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detailPenjualan->where('no_transaksi', $data->no_transaksi) as $detail)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $detail->obat->nama_obat }}</td>
                                        <td>{{ $detail->qty }}</td>
                                        <td class="text-right">Rp. {{ number_format($detail->harga, 0, ',', '.') }}</td>
                                        <td class="text-right">Rp. {{ number_format($detail->total_harga, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="font-weight-bold">
                                    <td colspan="4">Total Harga :</td>
                                    <td class="text-right">Rp. {{ number_format($data->total_transaksi, 0, ',', '.') }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="invoice-{{ $data->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Invoice</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('penjualan.invoice', $data->id) }}" method="POST" formtarget="_blank" target="_blank">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <label for="nama_pembeli">Nama Pembeli</label>
                                    <input type="text" class="form-control mb-3" id="nama_pembeli" name="nama_pembeli">
                                </div>
                                <div class="col-6">
                                    <label for="telp_pembeli">No. Telp Pembeli</label>
                                    <input type="text" class="form-control" id="telp_pembeli" name="telp_pembeli">
                                </div>
                                <div class="col-12">
                                    <label for="alamat_pembeli">Alamat Pembeli</label>
                                    <input type="text" class="form-control" id="alamat_pembeli" name="alamat_pembeli">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Cetak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@push('head-script')
    <link href="{{ asset('datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@push('body-script')
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    <script src="{{ asset('datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatables/dataTables.bootstrap4.min.js') }}"></script>
@endpush
