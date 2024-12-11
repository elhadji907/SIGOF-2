@extends('layout.user-layout')
@section('space-work')
    <div class="pagetitle">
        {{-- <h1>Data Tables</h1> --}}
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Accueil</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Courriers</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            {{-- <div class="col-lg-12">
            <div class="row">
                <h1>{{ $chart1->options['chart_title'] }}</h1>
                {!! $chart1->renderHtml() !!}
            </div>
        </div> --}}
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Diagramme à barres des courriers</h5>

                        <canvas id="barChart" style="max-height: 400px;"></canvas>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new Chart(document.querySelector('#barChart'), {
                                    type: 'bar',
                                    data: {
                                        labels: ['Arrivés', 'Départs', 'Internes'],
                                        datasets: [{
                                            label: 'Diagramme à barres',
                                            data: [{{ $arrives }}, {{ $departs }}, {{ $internes }}],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(255, 159, 64, 0.2)',
                                                'rgba(255, 205, 86, 0.2)',
                                            ],
                                            borderColor: [
                                                'rgb(255, 99, 132)',
                                                'rgb(255, 159, 64)',
                                                'rgb(255, 205, 86)',
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            });
                        </script>

                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Graphique courriers</h5>

                        <canvas id="lineChart" style="max-height: 400px;"></canvas>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new Chart(document.querySelector('#lineChart'), {
                                    type: 'line',
                                    data: {
                                        labels: ['Arrivés', 'Départs', 'Internes'],
                                        datasets: [{
                                            label: 'Graphique courriers',
                                            data: [{{ $arrives }}, {{ $departs }}, {{ $internes }}],
                                            fill: false,
                                            borderColor: 'rgb(75, 192, 192)',
                                            tension: 0.1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            });
                        </script>

                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Diagramme circulaire</h5>

                    <canvas id="pieChart" style="max-height: 365px;"></canvas>
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new Chart(document.querySelector('#pieChart'), {
                                type: 'pie',
                                data: {
                                    labels: [
                                        'Masculin',
                                        'Féminin',
                                    ],
                                    datasets: [{
                                        label: 'Diagramme circulaire',
                                        data: [{{ $masculin }}, {{ $feminin }}],
                                        backgroundColor: [
                                            'rgb(255, 205, 86)',
                                            'rgb(54, 162, 235)',
                                        ],
                                        hoverOffset: 4
                                    }]
                                }
                            });
                        });
                    </script>

                </div>
            </div>
        </div> --}}
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Diagramme circulaire courriers</h5>

                        <!-- Donut Chart -->
                        <div id="donutChart" style="min-height: 365px;" class="echart"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                echarts.init(document.querySelector("#donutChart")).setOption({
                                    tooltip: {
                                        trigger: 'item'
                                    },
                                    legend: {
                                        top: '5%',
                                        left: 'center'
                                    },
                                    series: [{
                                        name: 'Access From',
                                        type: 'pie',
                                        radius: ['40%', '70%'],
                                        avoidLabelOverlap: false,
                                        label: {
                                            show: false,
                                            position: 'center'
                                        },
                                        emphasis: {
                                            label: {
                                                show: true,
                                                fontSize: '18',
                                                fontWeight: 'bold'
                                            }
                                        },
                                        labelLine: {
                                            show: false
                                        },
                                        data: [{
                                                value: {{ $arrives }},
                                                name: 'Arrivés'
                                            },
                                            {
                                                value: {{ $departs }},
                                                name: 'Départs'
                                            },
                                            {
                                                value: {{ $internes }},
                                                name: 'Internes'
                                            }
                                        ]
                                    }]
                                });
                            });
                        </script>
                        <!-- End Donut Chart -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <!-- Sales Card -->
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="card info-card sales-card">

                            <a href="{{ url('/courriers') }}">
                                <div class="card-body">
                                    <h5 class="card-title">Courriers <span>| Tous</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-plus-fill"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $total_courrier }}</h6>
                                            {{--  <span class="text-success small pt-1 fw-bold">12%</span> <span
                                            class="text-muted small pt-2 ps-1">increase</span> --}}

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div><!-- End Sales Card -->
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="card info-card sales-card">

                            <a href="{{ url('/arrives') }}">
                                <div class="card-body">
                                    <h5 class="card-title">Courriers <span>| Arrivés</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-envelope-open"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $total_arrive }}</h6>
                                            <span
                                                class="text-success small pt-1 fw-bold">{{ number_format($pourcentage_arrive, 2, ',', ' ') . '%' }}</span>
                                            {{-- <span class="text-muted small pt-2 ps-1">increase</span> --}}

                                        </div>
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div><!-- End Sales Card -->
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="card info-card sales-card">

                            <a href="{{ url('/departs') }}">
                                <div class="card-body">
                                    <h5 class="card-title">Courriers <span>| Départs</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-envelope"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $total_depart }}</h6>
                                            <span
                                                class="text-success small pt-1 fw-bold">{{ number_format($pourcentage_depart, 2, ',', ' ') . '%' }}</span>
                                            {{-- <span class="text-muted small pt-2 ps-1">increase</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div><!-- End Sales Card -->
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="card info-card sales-card">

                            <a href="#">
                                <div class="card-body">
                                    <h5 class="card-title">Courriers <span>| Interne</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-envelope"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $total_interne }}</h6>
                                            <span
                                                class="text-success small pt-1 fw-bold">{{ number_format($pourcentage_interne, 2, ',', ' ') . '%' }}</span>
                                            {{-- <span class="text-muted small pt-2 ps-1">increase</span> --}}

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div><!-- End Sales Card -->
                </div>
            </div>
        </div>
    </section>
@endsection
