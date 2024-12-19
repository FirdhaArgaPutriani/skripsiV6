@foreach ($produksi as $item)
<div class="modal fade" id="modalDataUpdate{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data</h5>
            </div>
            <div class="modal-body">
                <form class="card-body" method="POST" action="{{ url('data', $item->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="pt-2">
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="th_periode" name="th_periode" class="form-control" placeholder="2024" value="{{ old('th_periode', $item->tahun) }}" />
                            <label for="th_periode">Tahun Periode</label>
                        </div>
                    </div>
                    <div class="pt-3">
                        <div class="form-floating form-floating-outline">
                            <select id="periode" name="periode" class="select2 form-select @error('periode') is-invalid @enderror" data-allow-clear="true">
                                <option name="periode" value="">Select</option>
                                <option name="periode" value="Triwulan 1" {{ old('periode', $item->periode) == 'Triwulan 1' ? 'selected' : '' }}>Triwulan 1</option>
                                <option name="periode" value="Triwulan 2" {{ old('periode', $item->periode) == 'Triwulan 2' ? 'selected' : '' }}>Triwulan 2</option>
                                <option name="periode" value="Triwulan 3" {{ old('periode', $item->periode) == 'Triwulan 3' ? 'selected' : '' }}>Triwulan 3</option>
                                <option name="periode" value="Triwulan 4" {{ old('periode', $item->periode) == 'Triwulan 4' ? 'selected' : '' }}>Triwulan 4</option>
                            </select>
                            <label for="periode">Periode</label>
                        </div>
                    </div>
                    <div class="pt-3">
                        <div class="form-floating form-floating-outline">
                            <select id="jenis_id" name="jenis_id" class="select2 form-select @error('jenis_id') is-invalid @enderror" data-allow-clear="true">
                                @foreach ($jenis as $item_j)
                                <option name="jenis_id" value="{{ $item_j->id }}" {{ old('jenis_id', $item_j->jenis_id) == $item_j->id ? 'selected' : '' }}>{{ $item_j->name }}</option>
                                @endforeach
                            </select>
                            <label for="jenis_id">Types of NTFP</label>
                        </div>
                    </div>
                    <div class="pt-3">
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="volume" name="volume" class="form-control" placeholder="5350710" value="{{ old('volume', $item->volume) }}" />
                            <label for="volume">Volume Produksi (Kg)</label>
                        </div>
                    </div>
                    <input type="hidden" id="user_id" name="user_id" class="form-control" value="{{Auth::user()->id}}" />
                    <div class="modal-footer pt-3">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach