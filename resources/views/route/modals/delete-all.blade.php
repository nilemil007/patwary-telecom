<div class="modal modal-blur fade" id="delete_all_routes" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">Are you sure?</div>
                <div>If you proceed, you will lose all your route data.</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger"
                        data-bs-dismiss="modal"
                        onclick="document.getElementById('deleteAllRoutes').submit();">
                    Yes, delete all routes
                </button>

                <form action="{{ route('delete.all.routes') }}" id="deleteAllRoutes" method="POST">@csrf @method('DELETE')</form>
            </div>
        </div>
    </div>
</div>
