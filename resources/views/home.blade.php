@extends('layouts.app_dash')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="py-3 mb-4">
        <!-- Congratulations card -->
        <div class="col-lg-12 mb-4 order-0">
            <div class="card ">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-8">
                        <div class="card-body">
                            <h5 class="card-title mb-4 text-truncate">Welcome To Dionne! 🎉</h5>
                            <p class="mb-0 text-justify">
                                Dione is a system designed to predict the production volume of non-timber forest products in East Java Province
                                using the Monte Carlo method. This system utilizes probabilistic simulation techniques to address uncertainties
                                in forest production data. Dione integrates historical data to generate accurate and reliable predictions. With
                                this approach, users can plan and manage forest resources more efficiently, enhance sustainability, and support
                                data-driven decision-making. Dione offers an innovative solution in managing non-timber forest products, contributing
                                to local economic development and environmental conservation.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="text-center mb-2">
                            <img src="{{ asset('assets/img/illustrations/illustration-john-2.png') }}" height="200" class="card-img-position bottom-0 w-auto end-0 scaleX-n1-rtl" alt="View Profile">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Avg -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">Average Volume</h5>
                        <form action="{{ route('home') }}" method="GET">
                            <select name="year" id="year" class="form-select" onchange="this.form.submit()">
                                @foreach($years as $year)
                                <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>{{ $year }}</option>
                                @endforeach
                            </select>
                        </form>

                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-5">
                        <div class="col-md-2 col-6">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-primary rounded shadow">
                                        <i class="mdi mdi-trending-up mdi-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="small mb-1">Getah Pinus </div>
                                    <h5 class="mb-0">{{ number_format($gp_avg, 3) }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-success rounded shadow">
                                        <i class="mdi mdi-chart-scatter-plot mdi-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="small mb-1">Daun Kayu Putih</div>
                                    <h5 class="mb-0">{{ number_format($dkp_avg, 3) }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-warning rounded shadow">
                                        <i class="mdi mdi-chart-pie-outline mdi-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="small mb-1">Porang</div>
                                    <h5 class="mb-0">{{ number_format($p_avg, 3) }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-info rounded shadow">
                                        <i class="mdi mdi-finance mdi-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="small mb-1">Empon-Empon</div>
                                    <h5 class="mb-0">{{ number_format($ee_avg, 3) }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-secondary rounded shadow">
                                        <i class="mdi mdi-chart-bubble mdi-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="small mb-1">Madu</div>
                                    <h5 class="mb-0">{{ number_format($m_avg, 3) }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-danger rounded shadow">
                                        <i class="mdi mdi mdi-chart-arc mdi-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="small mb-1">Totals</div>
                                    <h5 class="mb-0">{{ number_format($total, 3) }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Avg -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">Volume</h5>
                        <form action="{{ route('home') }}" method="GET">
                            <select name="year" id="year" class="form-select" onchange="this.form.submit()">
                                @foreach($years as $year)
                                <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>{{ $year }}</option>
                                @endforeach
                            </select>
                        </form>

                    </div>
                </div>
                <div class="card-body">
                    <div id="chart"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var options = {
            chart: {
                type: 'line',
                height: 350
            },
            series: [{
                name: 'Getah Pinus',
                data: @json($gp)
            }, {
                name: 'Daun Kayu Putih',
                data: @json($dkp)
            }, {
                name: 'Porang',
                data: @json($p)
            }, {
                name: 'Empon-Empon',
                data: @json($ee)
            }, {
                name: 'Madu',
                data: @json($m)
            }],
            xaxis: {
                categories: @json($periods)
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    });
</script>

@endsection

