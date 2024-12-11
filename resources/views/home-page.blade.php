@extends('layout.user-layout')
@section('space-work')
    @can('home-view')
        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                {{-- <div class="col-lg-12">
                <div class="row">
                    <h1>{{ $chart1->options['chart_title'] }}</h1>
                    {!! $chart1->renderHtml() !!}
                </div>
            </div> --}}
                {{-- <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $annee_lettre }}</h5>

                        <canvas id="barChart" style="max-height: 400px;"></canvas>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new Chart(document.querySelector('#barChart'), {
                                    type: 'bar',
                                    data: {
                                        labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août',
                                            'Septembre', 'Octobre', 'Novembre', 'Décembre'
                                        ],
                                        datasets: [{
                                            label: 'Diagramme à barres',
                                            data: [{{ $janvier }}, {{ $fevrier }}, {{ $mars }},
                                                {{ $avril }}, {{ $mai }}, {{ $juin }},
                                                {{ $juillet }}, {{ $aout }}, {{ $septembre }},
                                                {{ $octobre }}, {{ $novembre }}, {{ $decembre }}
                                            ],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(255, 159, 64, 0.2)',
                                                'rgba(255, 205, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(201, 203, 207, 0.2)',
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(255, 159, 64, 0.2)',
                                                'rgba(255, 205, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                            ],
                                            borderColor: [
                                                'rgb(255, 99, 132)',
                                                'rgb(255, 159, 64)',
                                                'rgb(255, 205, 86)',
                                                'rgb(75, 192, 192)',
                                                'rgb(54, 162, 235)',
                                                'rgb(153, 102, 255)',
                                                'rgb(201, 203, 207)',
                                                'rgb(255, 99, 132)',
                                                'rgb(255, 159, 64)',
                                                'rgb(255, 205, 86)',
                                                'rgb(75, 192, 192)',
                                                'rgb(54, 162, 235)',
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
            </div> --}}
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Graphique linéaire demandes individuelles</h5>

                            <canvas id="lineChart" style="max-height: 400px;"></canvas>
                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new Chart(document.querySelector('#lineChart'), {
                                        type: 'line',
                                        data: {
                                            labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août',
                                                'Septembre', 'Octobre', 'Novembre', 'Décembre'
                                            ],
                                            datasets: [{
                                                label: 'Graphique linéaire',
                                                data: [{{ $janvier }}, {{ $fevrier }}, {{ $mars }},
                                                    {{ $avril }}, {{ $mai }}, {{ $juin }},
                                                    {{ $juillet }}, {{ $aout }}, {{ $septembre }},
                                                    {{ $octobre }}, {{ $novembre }}, {{ $decembre }}
                                                ],
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
                </div>
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
                            <h5 class="card-title">Diagramme circulaire demandes individulles</h5>

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
                                                    value: {{ $attente }},
                                                    name: 'Attente'
                                                },
                                                {
                                                    value: {{ $nouvelle }},
                                                    name: 'Nouvelles'
                                                },
                                                {
                                                    value: {{ $retenue }},
                                                    name: 'Retenues'
                                                },
                                                {
                                                    value: {{ $terminer }},
                                                    name: 'Terminées'
                                                },
                                                {
                                                    value: {{ $rejeter }},
                                                    name: 'Rejetées'
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
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                </div>
                                <a href="#">
                                    <div class="card-body">
                                        <h5 class="card-title">Individuelles<span> | aujourd'hui</span></h5>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-calendar-check-fill"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>
                                                    <span
                                                        class="text-primary">{{ number_format($count_today, 0, '', ' ') }}</span>
                                                </h6>
                                                <span class="text-success small pt-1 fw-bold">Aujourd'hui</span>
                                                {{-- <span class="text-muted small pt-2 ps-1">increase</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="card info-card sales-card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                </div>
                                <a href="{{ route('individuelles.index') }}">
                                    <div class="card-body">
                                        <h5 class="card-title">Individuelles <span>| toutes</span></h5>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-file-earmark-text"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>
                                                    <span
                                                        class="text-primary">{{ number_format(count($individuelles), 0, '', ' ') }}</span>
                                                </h6>
                                                <span class="text-success small pt-1 fw-bold">Toutes</span>
                                                {{-- <span class="text-muted small pt-2 ps-1">increase</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="card info-card sales-card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                </div>
                                <a href="{{ route('showMasculin') }}">
                                    <div class="card-body">
                                        <h5 class="card-title">Individuelles <span>| hommes</span></h5>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-file-earmark-text"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>
                                                    <span
                                                        class="text-primary">{{ number_format($masculin, 0, '', ' ') }}</span>
                                                </h6>
                                                <span
                                                    class="text-success small pt-1 fw-bold">{{ number_format($pourcentage_hommes, 2, ',', ' ') . '%' }}</span>
                                                <span class="text-muted small pt-2 ps-1">Hommes</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="card info-card sales-card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                </div>
                                <a href="{{ route('showFeminin') }}">
                                    <div class="card-body">
                                        <h5 class="card-title">Individuelles <span>| femmes</span></h5>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-file-earmark-text"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>
                                                    <span class="text-primary">{{ number_format($feminin, 0, '', ' ') }}</span>
                                                </h6>
                                                <span
                                                    class="text-success small pt-1 fw-bold">{{ number_format($pourcentage_femmes, 2, ',', ' ') . '%' }}</span>
                                                <span class="text-muted small pt-2 ps-1">Femmes</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
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
                        @if (auth()->user()->hasRole('super-admin|admin'))
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="card info-card sales-card">

                                    {{-- <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Roles</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#">
                                            @foreach (Auth::user()->roles as $role)
                                                <div>{{ $role->name }}</div>
                                            @endforeach
                                        </a></li>
                                </ul>
                            </div> --}}

                                    <a href="{{ url('/user') }}">
                                        <div class="card-body">
                                            <h5 class="card-title">Utilisateurs <span>| Tous</span></h5>

                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-person-plus-fill"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>{{ number_format($total_user, 0, '', ' ') }}</h6>
                                                    <span
                                                        class="text-success small pt-1 fw-bold">{{ number_format($email_verified_at, 2, ',', ' ') . '%' }}</span>
                                                    <span class="text-muted small pt-2 ps-1">comptes vérifiés</span>

                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div><!-- End Sales Card -->
                        @endif

                        @if (auth()->user()->hasRole('super-admin|admin|courrier'))
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
                                                    <h6>{{ number_format($total_arrive, 0, '', ' ') }}</h6>
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
                                                    <h6>{{ number_format($total_depart, 0, '', ' ') }}</h6>
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
                                            <h5 class="card-title">Courriers <span>| Internes</span></h5>

                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-envelope"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>{{ number_format($total_interne, 0, '', ' ') }}</h6>
                                                    <span
                                                        class="text-success small pt-1 fw-bold">{{ number_format($pourcentage_interne, 2, ',', ' ') . '%' }}</span>
                                                    {{-- <span class="text-muted small pt-2 ps-1">increase</span> --}}

                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div><!-- End Sales Card -->
                        @endif

                    </div>
                </div>
            </div>
        </section>
    @endcan
@endsection
