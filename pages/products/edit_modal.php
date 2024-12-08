<?php echo '<div id="editModal'.$row['id'].'" class="modal fade">
    <form method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-sm" style="width:600px !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Product</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" value="'.$row['id'].'" name="hidden_id" id="hidden_id"/>
                            
                            <div class="form-group">
                                <label>Category Type:</label>
                                <select name="txt_type" class="form-control input-sm select2" style="width:100%">
                                    <option disabled selected>-- Select Category Type --</option>';
                                    $qc = mysqli_query($con, "SELECT * FROM tblcategory WHERE status='ACTIVE'");
                                    while ($rowc = mysqli_fetch_array($qc)) {
                                        $selected = ($rowc['id'] == $row['txt_type']) ? 'selected' : '';
                                        echo '<option value="' . $rowc['id'] . '" ' . $selected . '>' . $rowc['category'] . '</option>';
                                    }
                                    echo '</select>
                            </div> 


                            <div class="form-group">
                                <label>Name:</label>
                                <input name="txt_name" class="form-control input-sm" type="text" value="'.$row['name'].'"/>
                            </div>
                            <div class="form-group">
                                <label>Price:</label>
                                <input name="txt_price" class="form-control input-sm" type="text" value="'.$row['price'].'"/>
                            </div>
                            <div class="form-group">
                                <label>Quantity:</label>
                                <input name="txt_quantity" class="form-control input-sm" type="text" value="'.$row['qty'].'"/>
                            </div>
                            <div class="form-group">
                                <label>Status:</label>
                                <input name="txt_status" class="form-control input-sm" type="text" value="'.$row['pstatus'].'"/>
                            </div>
                            <div class="form-group">
                                <label>Description:</label>
                                <textarea name="txt_description" class="form-control input-sm">'.$row['description'].'</textarea>
                            </div>

                            <div class="form-group">
                                <label>Supplier:</label>
                                <select name="txt_supplier" class="form-control input-sm select2" style="width:100%">
                                    <option disabled selected>-- Select Supplier --</option>';
                                    $qc = mysqli_query($con, "SELECT * FROM tblsupplier");
                                    while ($rowc = mysqli_fetch_array($qc)) {
                                        $selected = ($rowc['id'] == $row['name']) ? 'selected' : '';
                                        echo '<option value="' . $rowc['id'] . '" ' . $selected . '>' . $rowc['name'] . '</option>';
                                    }
                                    echo '</select>
                            </div> 
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                    <input type="submit" class="btn btn-primary btn-sm" name="btn_save" value="Save"/>
                </div>
            </div>
        </div>
    </form>
</div>';?>
