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
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $today_penjualan }}</div>
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
        <div class="row">
            <div class="col-auto">
                <form action="" method="post">
                    <select name="" id=""class="form-control">
                        <option value="">2022</option>
                    </select>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card shadow" id="chartTransaksi"></div>
            </div>
            <div class="col-6">
                <div class="card shadow" id="chartKeuangan"></div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">System Update v1.1</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <strong>Apa yang baru di versi ini?</strong>
                <ul>
                    <li>Login sekarang bisa dengan email/password</li>
                    <li>Perbaikan bug gambar, reset password dan konfirmasi email ketika mendaftar</li>
                    <li>Peningkatan pengalaman pengguna</li>
                </ul>
            </div>
            <div class="modal-footer">
                {{-- <div class="d-flex flex-grow-1 justify-content-start custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="popupMaintenanceCheckbox" name="checkbox-maintenance"/>
                    <label class="custom-control-label checkbox-maintenance" for="popupMaintenanceCheckbox">Don't show me again</label>
                </div> --}}
                <button type="button" class="btn btn-primary" data-dismiss="modal">Oke</button>
            </div>
        </div>
    </div>
</div>

@push('body-script')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        // if ({{ $first_time_login }}) {
        //     $("#exampleModalCenter").modal('show');
        // }
        var bulan = JSON.parse('{!! json_encode($bulan) !!}');
        // Grafik Keuangan
        var pendapatan = JSON.parse('{!! json_encode($pendapatan) !!}');
        var pengeluaran = JSON.parse('{!! json_encode($pengeluaran) !!}');
        var options = {
            series: [{
                name: 'Pengeluaran',
                data: pengeluaran
            }, {
                name: 'Pendapatan',
                data: pendapatan
            }, ],
            chart: {
                type: 'bar',
                height: 350,
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: bulan,
            },
            yaxis: {
                title: {
                    text: 'Rp'
                }
            },
            fill: {
                opacity: 1
            },
            title: {
    text: 'Grafik Keuangan',
    align: 'center',
    margin: 10,
    offsetX: 0,
    offsetY: 0,
    floating: false,
    style: {
      fontSize:  '14px',
      fontWeight:  'bold',
      fontFamily:  'Nunito',
      color:  '#263238'
    },
},
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "Rp. " + val
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chartKeuangan"), options);
        chart.render();

        // chart Keuangan
        var penjualan = JSON.parse('{!! json_encode($penjualan) !!}');
        var pembelian = JSON.parse('{!! json_encode($pembelian) !!}');


        var options = {
            series: [{
                name: 'Pembelian',
                data: pembelian
            }, {
                name: 'Penjualan',
                data: penjualan
            }, ],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: bulan,
            },
            yaxis: {
                title: {
                    text: 'Jumlah'
                }
            },
            fill: {
                opacity: 1
            },
            title: {
    text: 'Grafik Transaksi',
    align: 'center',
    margin: 10,
    offsetX: 0,
    offsetY: 0,
    floating: false,
    style: {
      fontSize:  '14px',
      fontWeight:  'bold',
      fontFamily:  'Nunito',
      color:  '#263238'
    },
},
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chartTransaksi"), options);
        chart.render();
    </script>
@endpush
