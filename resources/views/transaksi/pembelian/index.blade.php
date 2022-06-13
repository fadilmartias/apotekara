@extends('layouts.app')
@section('title', 'Pembelian - Apotek Ara Farma')
@section('pembelian', 'active')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Pembelian
    </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('pembelian.create') }}" class="btn btn-primary btn-icon-split float-right mt-0">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Pembelian
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
                            <th>Tanggal Obat Sampai</th>
                            <th>Nama Obat</th>
                            <th>Satuan</th>
                            <th>Qty</th>
                            <th>Harga Satuan</th>
                            <th>Total Harga</th>
                            <th>Nama Penjual</th>
                            <th>Penerima</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembelians as $pembelian)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $pembelian->created_at->format('d-M-Y H.i') }}</td>
                                <td>{{ $pembelian->obat->nama_obat }}</td>
                                <td>{{ $pembelian->satuan }}</td>
                                <td>{{ $pembelian->qty }}</td>
                                <td>{{ number_format($pembelian->harga_satuan,0,",",".") }}</td>
                                <td>{{ number_format($pembelian->total_harga,0,",",".") }}</td>
                                <td>{{ $pembelian->nama_penjual }}</td>
                                <td>{{ $pembelian->user->nama_user }}</td>
                            </tr>
            </div>
        </div>
    </div>
    @endforeach
    </tbody>
    </table>
</div>
</div>
</div>

</div>
<!-- /.container-fluid -->

@endsection

@push('head-script')
<link href="{{ asset('datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@push('body-script')
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
<script src="{{ asset('datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('datatables/dataTables.bootstrap4.min.js') }}"></script>
@endpush
