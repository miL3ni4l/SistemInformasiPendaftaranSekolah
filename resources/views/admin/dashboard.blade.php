@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <!-- <li class="breadcrumb-item active">Blank Page</li> -->
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">

            <!--PEMASUKAN-->
            <div class="col-md-4 col-sm-4 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fa fa-download"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Pendaftar</span>
                        <h5 class="info-box-number text-dark ">{{$total_pendaftar->count()}}</h5>
                        <div class="progress">
                            <div class="progress-bar bg-info" style="width: 100%"></div>
                        </div>
                        <span class="progress-description">
                            Semua
                        </span>
                    </div>
                </div>
            </div>
            <!--PENGELUARAN-->
            <div class="col-md-4 col-sm-4 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="nav-icon far fa-user"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Guru</span>
                        <h5 class="info-box-number text-dark ">{{$total_guru->count()}}</h5>
                        <div class="progress">
                            <div class="progress-bar bg-success" style="width: 100%"></div>
                        </div>
                        <span class="progress-description">
                            Semua
                        </span>
                    </div>
                </div>
            </div>
            <!--SALDO SEKARANG-->
            <div class="col-md-4 col-sm-4 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="nav-icon fa fa-child"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Siswa</span>
                        <h5 class="info-box-number text-dark ">{{$total_siswa->count()}}</h5>
                        <div class="progress">
                            <div class="progress-bar bg-warning" style="width: 100%"></div>
                        </div>
                        <span class="progress-description">
                            Semua
                        </span>
                    </div>
                </div>
            </div>
            <!--GRAFIK 1-->
            <!-- <div class="col-md-12 col-sm-12 col-12 ">

                <div class="card col-12">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h5 class="position-center ">Grafik <b>Per Bulan</b> Tahun {{date('Y')}} Pria</h5>
                        </div>
                    </div>

                    <div class="position-relative ">
                        <canvas id="grafik1"></canvas>
                    </div>

                </div>
            </div> -->
            <!--GRAFIK 2-->
            <!-- <div class="col-md-6 col-sm-6 col-12 ">

                <div class="card col-12">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h5 class="position-center ">Grafik <b>Per Tahun</b> </h5>

                        </div>
                    </div>
                    <div class="position-relative ">
                        <canvas id=""></canvas>
                    </div>

                </div>

            </div> -->

        </div>
    </div>
</div>

<script>
    var randomScalingFactor = function() {
        return Math.round(Math.random() * 500)
    };

    <?php

    use App\Models\Pendaftaran;
    ?>
    var barChartData = {
        labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
        datasets: [{
                label: 'Pria',
                fillColor: "rgb(52, 152, 219)",
                strokeColor: "rgb(37, 116, 169)",
                highlightFill: "rgba(220,220,220,0.75)",
                highlightStroke: "rgba(220,220,220,1)",
                data: [
                    <?php

                    for ($bulan = 1; $bulan <= 12; $bulan++) {
                        $tahun = date('Y');
                        $pendaftar_pria_grafik = Pendaftaran::where('jk_pendaftar', 'P')
                            ->where('sts_pendaftar', '1')
                            ->whereMonth('created_at',$bulan)
                            ->whereYear('created_at', $tahun)
                            ->get();
                        echo count($pendaftar_pria_grafik);
                    }
                    ?>

                ]
            },
            {
                label: 'Wanita',
                fillColor: "rgb(171, 183, 183)",
                strokeColor: "rgb(149, 165, 166)",
                highlightFill: "rgba(151,187,205,0.75)",
                highlightStroke: "rgba(151,187,205,1)",
                data: [
                    <?php
                    for ($bulan = 1; $bulan <= 12; $bulan++) {
                        $tahun = date('Y');
                        $pendaftar_wanita_grafik = Pendaftaran::where('jk_pendaftar', 'W')
                            ->where('sts_pendaftar', '1')
                            ->whereMonth('created_at', $bulan)
                            ->whereYear('created_at', $tahun)
                            ->get();
                        echo count($pendaftar_wanita_grafik);
                    }
                    ?>

                ]
            }
        ]

    }

    var barChartData1 = {
        labels: [

        ],
        datasets: [{
                label: 'Pemasukan',
                fillColor: "rgb(52, 152, 219)",
                strokeColor: "rgb(37, 116, 169)",
                highlightFill: "rgba(220,220,220,0.75)",
                highlightStroke: "rgba(220,220,220,1)",
                data: [

                ]
            },
            {
                label: 'Pengeluaran',
                fillColor: "rgb(171, 183, 183)",
                strokeColor: "rgb(149, 165, 166)",
                highlightFill: "rgba(151,187,205,0.75)",
                highlightStroke: "rgba(254, 29, 29, 0)",
                data: [

                ]
            }
        ]

    }




    window.onload = function() {

        var ctx = document.getElementById("grafik1").getContext("2d");
        window.myBar = new Chart(ctx).Bar(barChartData, {
            responsive: true,
            animation: true,
            barValueSpacing: 5,
            barDatasetSpacing: 1,
            tooltipFillColor: "rgba(0,0,0,0.8)",
            multiTooltipTemplate: "<%= datasetLabel %> - <%= value.toLocaleString() %>"
        });

        var ctx = document.getElementById("grafik2").getContext("2d");
        window.myBar = new Chart(ctx).Bar(barChartData1, {
            responsive: true,
            animation: true,
            barValueSpacing: 5,
            barDatasetSpacing: 1,
            tooltipFillColor: "rgba(0,0,0,0.8)",
            multiTooltipTemplate: "<%= datasetLabel %> - <%= value.toLocaleString() %>"
        });


    }
</script>

@endsection