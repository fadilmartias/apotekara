@extends('layouts.app')
@section('title', 'Data Obat - Apotek Ara Farma')
@section('obat', 'active')
@section('content')
@push('head-script')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@push('body-script')
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function swalDelete(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Yakin ingin menghapus obat ini?',
                text: "Sekali dihapus data akan hilang",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $(`#id-${id}`).submit();

                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Data obat telah dihapus.',
                        'success'
                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Batal',
                        'Obat tidak jadi dihapus',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Obat
        </h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('obat.create') }}" class="btn btn-primary btn-icon-split float-right mt-0">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Obat
                    </span>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Obat</th>
                                <th>Harga/Satuan</th>
                                <th>Harga/Strip</th>
                                <th>Stok Tersedia</th>
                                @if (Auth::user()->is_admin)
                                <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($obats as $obat)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $obat->nama_obat }}</td>
                                <td>{{ $obat->harga_satuan }}</td>
                                <td>{{ $obat->harga_strip }}</td>
                                <td>{{ $obat->stok }}</td>
                                @if (Auth::user()->is_admin)
                                <td>
                                    <a href="{{ route('obat.edit', $obat->id )}}" class="btn btn-warning">
                                        <i class="fab fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <button type="submit" class="btn btn-danger"
                                            onclick="swalDelete({{ $obat->id }})">
                                            <i class="fab fa-solid fa-trash"></i>
                                            <form id="id-{{ $obat->id }}"
                                                action="{{ route('obat.destroy', $obat->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </button>

                                    {{-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter-{{ $loop->index }}">
                                        <i class="fab fa-solid fa-trash"></i>
                                      </button>
                                      <div class="modal fade" id="exampleModalCenter-{{ $loop->index }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLongTitle">Hapus Obat</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              Yakin ingin menghapus obat ini?
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                              <form class="d-inline" action="{{ route('obat.destroy', $obat->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-primary">Hapus Obat</button>
                                            </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div> --}}
                                </td>
                                @endif
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="6"> Data Kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    <!-- Modal -->


@endsection
