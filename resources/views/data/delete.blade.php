@foreach ($produksi as $item)
<div class="modal fade" id="modalDataDelete{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Data</h5>
            </div>
            <div class="modal-body">
                <form class="card-body" method="POST" action="{{ url('data', $item->id) }}">
                    @method('DELETE')
                    @csrf
                    <div class="pt-2">
                        <p>Are you sure to delete, data {{ $item->periode }} at {{ $item->tahun }} ...? </p>
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