@extends('layouts.app')
@section('title', 'Data User - Apotek Ara Farma')
@section('kelola-patchnote', 'active')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Patch Note
        </h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 ">
                <a href="{{ route('patchnote.create') }}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Patch Note
                    </span>
                </a>

                {{-- <button type="button" class="btn btn-info btn-icon-split float-right" data-toggle="modal"
                    data-target="#exampleModal">
                    <span class="icon text-white-50">
                        <i class="fas fa-upload"></i>
                    </span>
                    <span class="text">Upload Excel
                    </span>
                </button>
                <a href="{{ route('user.export') }}" class="btn btn-success btn-icon-split float-right mr-2">
                    <span class="icon text-white-50">
                        <i class="fas fa-download"></i>
                    </span>
                    <span class="text">Download Excel
                    </span>
                </a> --}}
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
                        @endif

                        @if (isset($errors) && $errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($patchnotes as $pn)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <div class="text-center">
                                            <img class="" style="height:75px; width:75px;"
                                            src="{{ asset('storage/' . $pn->thumbnail) }}">
                                        </div>
                                    </td>
                                    <td>{{ $pn->title}}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#details{{ $loop->index }}" class="btn btn-secondary">
                                            <i class="fab fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('patchnote.edit', $pn->id) }}" class="btn btn-warning">
                                            <i class="fab fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger"
                                            onclick="swalDelete({{ $pn->id }})">
                                            <i class="fab fa-solid fa-trash"></i>
                                            <form id="id-{{ $pn->id }}"
                                                action="{{ route('patchnote.destroy', $pn->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </button>
                                    </td>
                                </tr>
                                 <!-- Modal -->
    <div class="modal fade" id="details{{ $loop->index }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body p-3">
                <dl class="row">
                    <dt class="col-4">Thumbnail</dt>
                    <dd class="col-8"> <img class="w-50 h-50"
                        src="{{ asset('storage/' . $pn->thumbnail) }}"></dd>
                    <dt class="col-4">Title</dt>
                    <dd class="col-8">{{ $pn->title }}</dd>
                    <dt class="col-4">Slug</dt>
                    <dd class="col-8">{{ $pn->slug }}</dd>
                    <dt class="col-4">Subtitle</dt>
                    <dd class="col-8">{{ $pn->subtitle }}</dd>
                    <dt class="col-4">Featured Img</dt>
                    <dd class="col-8">{{ $pn->featured_img }}</dd>
                    <dt class="col-4">Body</dt>
                    <dd class="col-8">{{ $pn->body }}</dd>
                  </dl>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </form>
            </div>
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


 {{-- <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload Excel</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('user.import') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" accept=".xlsx">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Upload</button>
        </div>
         </form>
      </div>
    </div>
  </div> --}}

@endsection

@push('head-script')
    <link href="{{ asset('datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@push('body-script')
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    <script src="{{ asset('datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatables/dataTables.bootstrap4.min.js') }}"></script>
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
                title: 'Yakin ingin menghapus user ini?',
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
                        'Data user telah dihapus.',
                        'success'
                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Batal',
                        'User tidak jadi dihapus',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
