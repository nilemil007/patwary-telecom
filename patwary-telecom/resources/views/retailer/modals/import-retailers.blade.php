<div class="modal modal-blur fade" id="import-retailers" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <form action="{{ route('retailer.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-title">Import Retailer's</div>
                    <div class="input-group">
                        <input name="import_retailers" type="file" class="form-control" aria-label="Upload" required>
                        <button class="btn btn-primary" type="submit" data-bs-dismiss="modal">Upload</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
