@extends('layouts.app_jenis')

@section('content')

<!-- Table Data -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Types /</span> Types of NTFP Tables</h4>
    <button type="submit" class="btn btn-primary me-sm-3 me-2" data-bs-toggle="modal" data-bs-target="#modalJenis">+ Add New Record</button>
    <div class="card mb-4"></div>

    <div class="card mb-4">
        <div class="card">
            <h5 class="card-header">
                Types of NTFP Table
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Export
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('export1') }}"><i></i>Excel</a></li>
                        <li><a class="dropdown-item" href="{{ route('pdf1') }}"><i></i>PDF</a></li>
                    </ul>
                </div>
            </h5>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr align="center">
                            <th>#</th>
                            <th>Types of NTFP</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jenis as $item)
                        <tr align="center">
                            <td>{{ $loop -> iteration }}</td>
                            <td>{{ $item -> name }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalJenisUpdate{{$item->id}}"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                        <a class="dropdown-item"><i class="mdi mdi-trash-can-outline me-1" data-bs-toggle="modal" data-bs-target="#modalJenisDelete{{$item->id}}"></i> Delete</a>
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
@include('jenis.create')

<!-- Modal Update-->
@include('jenis.update')

<!-- Modal delete-->
@include('jenis.delete')

@endsection