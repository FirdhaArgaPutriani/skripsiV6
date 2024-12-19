@extends('layouts.app_rand')

@section('content')

<!-- Input Data HHBK -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Random Number /</span> Generate Random Number </h4>

    <!-- Input Data HHBK -->
    <div class="card mb-4">
        <h5 class="card-header">Please Enter Data to Randomize The Numbers</h5>
        <form class="card-body" method="POST" action="{{ url ('hasil') }}">
            @csrf
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="form-floating form-floating-outline">
                        <input type="number" id="tahun" name="tahun" class="form-control" value="{{ $tahun }}" min="{{ $smallestYear }}" max="{{ date('Y') }}" placeholder="Masukkan tahun" />
                        <label for="tahun">Year</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating form-floating-outline">
                        <select class="form-select" id="jenis_id" name="jenis_id" required>
                            @foreach($jenisList as $jenis)
                            <option value="{{ $jenis->id }}">{{ $jenis->name }}</option>
                            @endforeach
                        </select>
                        <label for="jenis_id" class="form-label">Types of NTFP</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating form-floating-outline">
                        <input type="text" id="zi" name="zi" class="form-control" placeholder="Zi < Modulus" />
                        <label for="zi">Zi</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating form-floating-outline">
                        <input type="text" id="c" name="c" class="form-control" placeholder="c < Modulus " />
                        <label for="c">C</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating form-floating-outline">
                        <input type="text" id="a" name="a" class="form-control" placeholder="a < Modulus" />
                        <label for="a">A</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating form-floating-outline">
                        <input type="text" id="modulus" name="modulus" class="form-control" placeholder="Modulus > 0" />
                        <label for="modulus">Modulus</label>
                    </div>
                </div>

                <input type="hidden" id="jmlsim" name="jmlsim" class="form-control" value=3/>

                <input type="hidden" value="{{ $amount }}" name="amount">
                <input type="hidden" value="{{ print base64_encode(serialize($botInterval)) }}" name="botInterval">
                <input type="hidden" value="{{ print base64_encode(serialize($topInterval)) }}" name="topInterval">
                <div class="pt-4">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Count</button>
                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection