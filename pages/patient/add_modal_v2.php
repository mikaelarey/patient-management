<div id="addModal" class="modal fade">
    <form method="post">
        <div class="modal-dialog modal-lg" style="width:600px !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Patient</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Firstname:</label>
                                <input id="add-patient-firstname" class="form-control input-sm" type="text" placeholder="Enter firstname"  />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Lastname:</label>
                                <input id="add-patient-lastname" class="form-control input-sm" type="text" placeholder="Enter lastname"  />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Middlename:</label>
                                <input id="add-patient-middlename" class="form-control input-sm" type="text" placeholder="Enter middlename" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Phone No:</label>
                                <input id="add-patient-phoneno" class="form-control input-sm" type="text" placeholder="Enter phone number"  />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Add Date:</label>
                                <input id="add-patient-adddate" class="form-control input-sm" type="date"  />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Sino:</label>
                                <input id="add-patient-sino" class="form-control input-sm" type="text" placeholder="Enter sino"  />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                    <input type="button" class="btn btn-primary btn-sm" id="add-patient-btn" value="Add Patient"/>
                </div>
            </div>
        </div>
    </form>
</div>