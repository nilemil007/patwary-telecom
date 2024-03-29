<div class="modal modal-blur fade" id="delete_all_balance" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">Are you sure?</div>
                <div>If you proceed, you will lose all your data.</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger"
                        data-bs-dismiss="modal"
                        onclick="document.getElementById('deleteAllBalance').submit();">
                    Yes, delete all
                </button>

                <form action="{{ route('raw.balance.destroy') }}" id="deleteAllBalance" method="POST">@csrf @method('DELETE')</form>
            </div>
        </div>
    </div>
</div>
