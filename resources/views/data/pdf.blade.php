@extends('layouts.app_pdf')

@section('content')

<!-- Table Data -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Data /</span> Data Tables</h4>
    
    <div class="card mb-4">
        <div class="card">
            <h5 class="card-header">
                Data Table
            </h5>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr align="center">
                            <th>#</th>
                            <th>Year</th>
                            <th>Period</th>
                            <th>Types</th>
                            <th>Volume</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produksi as $item)
                        <tr align="center">
                            <td>{{ $loop -> iteration }}</td>
                            <td>{{ $item -> tahun }}</td>
                            <td>{{ $item -> periode }}</td>
                            <td>{{ $item -> jenis -> name }}</td>
                            <td>{{ number_format($item -> volume) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection