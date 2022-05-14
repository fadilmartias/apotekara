@extends('layouts.app')
@section('title', 'Dashboard - Apotek Ara Farma')
@section('dashboard', 'active')
@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Pendapatan Kotor Hari Ini</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$today_penjualan}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-solid fa-circle-dollar-to-slot fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Total Pengeluaran Hari Ini</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $today_pembelian }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-solid fa-money-check-dollar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Pendapatan Bersih Hari Ini</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $today_pendapatan }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-solid fa-rupiah-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <!-- /.container-fluid -->
@endsection
