<?php 
$squery = mysqli_query($con, "SELECT * FROM tblsupplier");
while ($row = mysqli_fetch_array($squery)) {
    echo '<div id="deleteModal'.$row['id'].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel'.$row['id'].'" aria-hidden="true">
            <form method="post">
                <div class="modal-dialog modal-sm" style="width:700px !important;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Confirm Deletion</h4>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this supplier record? This action cannot be undone.
                            <input type="hidden" name="id" value="'.$row['id'].'"/>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                            <input type="submit" class="btn btn-danger btn-sm" name="btn_delete" value="Delete"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>';
}
?>
