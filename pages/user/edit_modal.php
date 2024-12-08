<div id="editModal" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-sm" style="width:300px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit User Account</h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" name="hidden_id" id="edit-user-id"/>
                <div class="form-group">
                    <label>Name: <span style="color:gray; font-size: 10px;">(Lastname, Firstname Middlename)</span></label>
                    <input id="edit-user-name" class="form-control input-sm" type="text" />
                </div>
                <div class="form-group">
                    <label>Username: </label>
                    <input id="edit-user-username" class="form-control input-sm" type="text"  />
                </div>
                <div class="form-group">
                    <label>Password: </label>
                    <input id="edit-user-password" class="form-control input-sm" type="password"  />
                </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
            <input type="button" class="btn btn-primary btn-sm" id="update-user-btn" value="Save"/>
        </div>
    </div>
  </div>
</form>
</div>


<script>
    $(function () {
        

        
    })
</script>
