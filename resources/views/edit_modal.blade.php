<!-- Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-modal-label">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="attachment-body-content">
                <form id="edit-form" class="form-horizontal" method="POST" action="">
                    <div class="card text-white bg-dark mb-0">
                        <div class="card-header">
                            <h2 class="m-0">Edit</h2>
                        </div>
                        <div class="card-body">
                            <!-- id -->
                            <div class="form-group">
                                <label class="col-form-label" for="modal-input-id">Id (just for reference not meant to
                                    be shown to the general public) </label>
                                <input type="text" name="modal-input-id" class="form-control" id="modal-input-id"
                                       required>
                            </div>
                            <!-- /id -->
                            <!-- name -->
                            <div class="form-group">
                                <label class="col-form-label" for="modal-input-name">Name</label>
                                <input type="text" name="modal-input-name" class="form-control" id="modal-input-name"
                                       required autofocus>
                            </div>
                            <!-- /name -->
                            <!-- description -->
                            <div class="form-group">
                                <label class="col-form-label" for="modal-input-description">Email</label>
                                <input type="text" name="modal-input-description" class="form-control"
                                       id="modal-input-description" required>
                            </div>
                            <!-- /description -->
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
