@extends('layouts.app_data')

@section('content')

<!-- Table Data -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Data /</span> Data Tables</h4>
    <button type="submit" class="btn btn-primary me-sm-3 me-2" data-bs-toggle="modal" data-bs-target="#modalData">+ Add New Record</button>

    <div class="card mb-4"></div>

    <div class="card mb-4">
        <div class="card">
            <h5 class="card-header">
                Data Table
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Export
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('export') }}"><i></i>Excel</a></li>
                        <li><a class="dropdown-item" href="{{ route('pdf') }}"><i></i>PDF</a></li>
                    </ul>
                </div>
            </h5>

            <div class="table-responsive text-nowrap table-container">
                <table class="table">
                    <thead>
                        <tr align="center">
                            <th>#</th>
                            <th>Year</th>
                            <th>Period</th>
                            <th>Types</th>
                            <th>Volume</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produksi as $item)
                        <tr align="center">
                            <td>{{ $loop -> iteration }}</td>
                            <td>{{ $item -> tahun }}</td>
                            <td>{{ $item -> periode }}</td>
                            <td>{{ $item -> jenis -> name }}</td>
                            <td>{{ number_format($item -> volume, 3) }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalDataUpdate{{$item->id}}"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                        <a class="dropdown-item"><i class="mdi mdi-trash-can-outline me-1" data-bs-toggle="modal" data-bs-target="#modalDataDelete{{$item->id}}"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Create-->
@include('data.create')

<!-- Modal Update-->
@include('data.update')

<!-- Modal delete-->
@include('data.delete')

@endsection