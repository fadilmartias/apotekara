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
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Penjualan</th>
                                <th>No. Penjualan</th>
                                <th>Total Harga</th>
                                <th>Dijual Oleh</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($penjualans as $penjualan)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $penjualan->created_at->format('d-M-Y H.i') }}</td>
                                    <td>{{ $penjualan->no_penjualan }}</td>
                                    <td>{{ $penjualan->total_harga }}</td>
                                    <td>{{ $penjualan->User->nama_user }}</td>
                                    <td>
                                        <button type="button" class="btn btn-secondary" data-toggle="modal"
                                            data-target="#ModalDetails-{{ $loop->index }}">
                                            <i class="fab fa-solid fa-eye"></i>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="ModalDetails-{{ $loop->index }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        No. Penjualan : {{ $penjualan->no_penjualan }} <br>
                                                        <table class="table table-bordered" id="dataTable" width="100%"
                                                            cellspacing="0">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Nama Obat</th>
                                                                    <th>Qty</th>
                                                                    <th>Satuan</th>
                                                                    <th>Harga</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($transaksis as $transaksi)
                                                                <tr>
                                                                <td>{{ $loop->index+1 }}</td>
                                                                <td>@foreach ($transaksi->Obat as $obat)
                                                                    {{ $obat->nama_obat }}
                                                                @endforeach</td>
                                                                <td>{{ $transaksi->qty }}</td>
                                                                <td>{{ $transaksi->satuan }}</td>
                                                                <td>{{ $transaksi->harga }}</td>
                                                                </tr>
                                                                @endforeach
                                                            <tbody>
                                                        </table>
                                                        {{-- <div class="text-right mr-4">Total Harga : {{ $penjualan->total_harga }}</div> --}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </button>

                </div>
            </div>
        </div>
        </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="text-center"> Data Kosong</td>
        </tr>
        @endforelse
        </tbody>
        </table>
    </div>
    </div>
    </div>

    </div>
    <!-- /.container-fluid -->

@endsection

@push('head-script')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@push('body-script')
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
@endpush
