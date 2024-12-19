<div class="modal fade" id="modalData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Data</h5>
            </div>
            <div class="modal-body">
                <form class="card-body" method="POST" action="{{ url('data') }}">
                    @csrf
                    <div class="pt-2">
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="th_periode" name="th_periode" class="form-control" placeholder="2024" value="{{ old ('tahun') }}" />
                            <label for="th_periode">Year</label>
                        </div>
                    </div>
                    <div class="pt-3">
                        <div class="form-floating form-floating-outline">
                            <select id="periode" name="periode" class="select2 form-select @error('periode') is-invalid @enderror" data-allow-clear="true">
                                <option name="periode" value="">Select a period</option>
                                <option name="periode" value="Triwulan 1">Triwulan 1</option>
                                <option name="periode" value="Triwulan 2">Triwulan 2</option>
                                <option name="periode" value="Triwulan 3">Triwulan 3</option>
                                <option name="periode" value="Triwulan 4">Triwulan 4</option>
                            </select>
                            <label for="periode">Period</label>
                        </div>
                    </div>
                    <div class="pt-3">
                        <div class="form-floating form-floating-outline">
                            <select id="jenis" name="jenis_id" class="select2 form-select @error('jenis_id') is-invalid @enderror" data-allow-clear="true">
                                <option name="jenis_id" value="">Select a types</option>
                                @foreach ($jenis as $item_j)
                                <option value="{{ $item_j->id }}">{{ $item_j->name }}</option>
                                @endforeach
                            </select>
                            <label for="jenis">Types of NTFP</label>
                        </div>
                    </div>
                    <div class="pt-3">
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="volume" name="volume" class="form-control" placeholder="5350710" />
                            <label for="volume">Production Volume (Kg)</label>
                        </div>
                    </div>

                    <input type="hidden" id="user_id" name="user_id" class="form-control" value="{{Auth::user()->id}}" />

                    <div class="modal-footer pt-3">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary me-sm-3 me-1" id="btn-save">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>