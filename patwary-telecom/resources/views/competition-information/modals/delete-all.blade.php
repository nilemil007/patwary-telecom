<div class="modal modal-blur fade" id="delete_all_ooi_info" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">Are you sure?</div>
                <div>If you proceed, you will lose all data.</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger"
                        data-bs-dismiss="modal"
                        onclick="document.getElementById('deleteAllOoiInfo').submit();">
                    Yes, delete all
                </button>

                <form action="{{ route('others-operator-information.delete.all') }}" id="deleteAllOoiInfo" method="POST">@csrf @method('DELETE')</form>
            </div>
        </div>
    </div>
</div>
