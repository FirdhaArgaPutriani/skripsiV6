@foreach ($jenis as $item)
<div class="modal fade" id="modalJenisDelete{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Types of NTFP</h5>
            </div>
            <div class="modal-body">
                <form class="card-body" method="POST" action="{{ url('jenis', $item->id) }}">
                    @method('DELETE')
                    @csrf
                    <div class="pt-2">
                        <p>Are you sure to delete, data {{ $item->name }} ...? </p>
                    </div>
                    <div class="modal-footer pt-3">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger me-sm-3 me-1">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach