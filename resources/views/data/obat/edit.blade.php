@extends('layouts.app')
@section('title', 'Edit Obat - Apotek Ara Farma')
@section('obat', 'active')
@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row justify-content-center ">

                        <div class="col-xl-10 col-lg-12 col-md-9">

                            <div class="card o-hidden border-0 shadow-lg my-5">
                                <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6">
                                            <div class="p-5">
                                                <div class="text-center">
                                                    <h1 class="h4 text-gray-900 mb-4">Edit Obat</h1>
                                                </div>
                                                <form class="user mt-4" action="{{ route('obat.update', $obat->id) }} " method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <input type="text" name="name" placeholder="Nama Obat"
                                                            class="form-control form-control-user" value="{{ old('name') ?? $obat->name }}"
                                                            required />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="satuan" placeholder="Satuan"
                                                            class="form-control form-control-user" value="{{ old('satuan') ?? $obat->satuan }}"
                                                            required />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="number" placeholder="Harga" name="harga"
                                                            class="form-control form-control-user" value="{{ old('harga') ?? $obat->harga }}"
                                                            required />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="number" placeholder="Stok" name="stok"
                                                            class="form-control form-control-user" value="{{ old('stok') ?? $obat->stok }}"
                                                            required />
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
                <!-- /.container-fluid -->
@endsection


