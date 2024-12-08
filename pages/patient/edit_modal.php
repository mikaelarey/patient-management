<div id="editModal" class="modal fade">
    <form method="post">
        <div class="modal-dialog modal-sm" style="width:600px !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Patient</h4>
                </div>
                <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" id="edit-patient-id"/>
                        <div class="form-group">
                            <label>Firstname:</label>
                            <input id="edit-patient-firstname" class="form-control input-sm" type="text"/>
                        </div>
                        <div class="form-group">
                            <label>Lastname:</label>
                            <input id="edit-patient-lastname" class="form-control input-sm" type="text"/>
                        </div>
                        <div class="form-group">
                            <label>Middlename:</label>
                            <input id="edit-patient-middlename" class="form-control input-sm" type="text"/>
                        </div>
                        <div class="form-group">
                            <label>Phone No:</label>
                            <input id="edit-patient-phoneno" class="form-control input-sm" type="text"/>
                        </div>
                        <div class="form-group">
                            <label>Add Date:</label>
                            <input id="edit-patient-adddate" class="form-control input-sm" type="date"/>
                        </div>
                        <div class="form-group">
                            <label>Sino:</label>
                            <input id="edit-patient-sino" class="form-control input-sm" type="text"/>
                        </div>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                    <input type="button" class="btn btn-primary btn-sm" id="update-patient-details" value="Save"/>
                </div>
            </div>
        </div>
    </form>
</div>
