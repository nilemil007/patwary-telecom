<div class="modal modal-blur fade" id="approve-reject-{{ $replace->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Approve or Reject</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card mb-4">
                    <div class="card-status-top bg-success"></div>
                    <div class="card-body">
                        <h3 class="card-title text-center ">Present Number</h3>
                        <p class="display-3 text-center text-success">{{ $replace->itop_number }}</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-status-bottom bg-danger"></div>
                    <div class="card-body">
                        <h3 class="card-title text-center">New Number</h3>
                        <p class="display-3 text-center text-danger">{{ $replace->tmp_itop_number }}</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <!-- Reject Number -->
                <form action="{{ route('itop-replace.numberReject', $replace->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <x-button class="me-auto btn-danger" data-bs-dismiss="modal">
                        <x-icon.ban/>Reject
                    </x-button>
                </form>

                <!-- Accept Number -->
                <form action="{{ route('itop-replace.numberAccept', $replace->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="newItopNumber" value="{{ $replace->tmp_itop_number }}">
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">
                        Approve
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
