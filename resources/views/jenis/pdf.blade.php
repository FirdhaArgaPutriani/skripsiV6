@extends('layouts.app_pdf')

@section('content')

<!-- Table Data -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Types /</span> Types of NTFP Tables</h4>

    <div class="card mb-4">
        <div class="card">
            <h5 class="card-header">
                Types of NTFP Table
            </h5>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr align="center">
                            <th>#</th>
                            <th>Types of NTFP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jenis as $item)
                        <tr align="center">
                            <td>{{ $loop -> iteration }}</td>
                            <td>{{ $item -> name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection