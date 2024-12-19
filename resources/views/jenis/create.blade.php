<div class="modal fade" id="modalJenis" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Types of NTFP</h5>
            </div>
            <div class="modal-body">
                <form class="card-body" method="POST" action="{{ url('jenis') }}">
                    @csrf
                    <div class="pt-3">
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="j_nama" name="j_nama" class="form-control" placeholder="Getah Pinus" />
                            <label for="j_nama">Name of NTFP</label>
                        </div>
                    </div>
                    
                    <div class="modal-footer pt-3">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary me-sm-3 me-1" id="btn-save">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>