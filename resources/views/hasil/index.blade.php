@extends('layouts.app_hasil')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Simulation Result /</span> Result Tables</h4>
    <div class="card mb-4">
        <div class="card">
            <h5 class="card-header">Result Table</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Random Number</th>
                            <th>Result</th>
                            <th>Data Real</th>
                            <th>Accuracy</th>
                            <th>MAPE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i = 0; $i < $jmlsim; $i++)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $angka_random[$i] }}</td>
                            <td>{{ isset($demandResult[$i]) ? number_format($demandResult[$i], 3) : '-' }}</td>
                            <td>{{ isset($dataReal[$i]) ? number_format($dataReal[$i], 3) : '-' }}</td>
                            @php
                            $realValue = $dataReal[$i] ?? 0;
                            $simulatedValue = $demandResult[$i] ?? 0;
                            $accuracy = $realValue != 0 && $simulatedValue != 0 ? 
                                ($simulatedValue >= $realValue ? round(($realValue / $simulatedValue) * 100, 2) : round(($simulatedValue / $realValue) * 100, 2)) : 
                                0;
                            $mape = $realValue != 0 ? round(abs(($simulatedValue - $realValue) / $realValue) * 100, 2) : 0;
                            @endphp
                            <td>{{ $accuracy }}%</td>
                            <td>{{ $mape }}%</td>
                        </tr>
                        @endfor
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-end">Total MAPE</td>
                            <td>{{ $totalMAPE }}%</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-end">Average MAPE</td>
                            <td>{{ $averageMAPE }}%</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card">
            <h5 class="card-header">Simulation Chart Result</h5>
            <div class="card-body">
                <canvas id="simulationChart" width="400" height="100"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('simulationChart').getContext('2d');
        var historicalData = @json($historicalData);
        var demandResult = @json($demandResult);
        var dataReal = @json($dataReal);
        var labels = [];

        // Generate labels for the chart
        for (var year = {{ $startYear }}; year <= {{ $tahun }}; year++) {
            for (var period = 1; period <= 4; period++) {
                labels.push('Q' + period + ' ' + year);
            }
        }

        // Combine historical data and forecast data for plotting
        var combinedData = historicalData.concat(dataReal);

        var simulationChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Data Real',
                        data: combinedData,
                        backgroundColor: '#a2e0ff',
                        borderColor: '#16b1ff',
                        borderWidth: 1,
                        fill: false,
                    },
                    {
                        label: 'Result',
                        data: new Array(historicalData.length).concat(demandResult),
                        backgroundColor: '#c6a7fe',
                        borderColor: '#9359fd',
                        borderWidth: 1,
                        fill: false,
                    }
                ]
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
@endsection
