@extends('layouts.app_interval')

@section('content')

<!-- Input Data HHBK -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Process /</span> Process Tables</h4>

    <div class="card mb-4">
        <form class="card-body" method="GET" action="{{ route('interval') }}">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating form-floating-outline">
                        <select name="jenis_id" id="jenis" class="select form-select" onchange="this.form.submit()" data-allow-clear="true">
                            @foreach ($jenisList as $jenis)
                            <option value="{{ $jenis->id }}" {{ $jenisId == $jenis->id ? 'selected' : '' }}>{{ $jenis->name }}</option>
                            @endforeach
                        </select>
                        <label for="jenis">Types of NTFP</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating form-floating-outline">
                        <select name="tahun" id="tahun" class="select form-select" onchange="this.form.submit()" data-allow-clear="true">
                            @foreach ($yearsList as $year)
                            <option value="{{ $year }}" {{ $tahun == $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endforeach
                        </select>
                        <label for="tahun">Year</label>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Basic Bootstrap Table -->
    <div class="card mb-4">
        <div class="card">
            <h5 class="card-header">Process Table</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr align="center">
                            <th>#</th>
                            <th>Volume</th>
                            <th>Probability Distribution</th>
                            <th>Cumulative Distribution</th>
                            <th>Initial Interval</th>
                            <th>End Interval</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produksi as $index => $item)
                        <tr align="center">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ number_format($item->volume, 3) }}</td>
                            <td>{{ $probability[$index] }}</td>
                            <td>{{ $cumulative[$index] }}</td>
                            <td>{{ $botInterval[$index] }}</td>
                            <td>{{ $topInterval[$index] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr align="center">
                            <td>Amount</td>
                            <td>{{ number_format($total, 3) }}</td>
                            <td>{{ $jumlahProbabilitas }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!--/ Responsive Table -->
</div>
<!--/ Responsive Table -->

@endsection