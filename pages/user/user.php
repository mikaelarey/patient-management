<!DOCTYPE html>
<html>

    <?php
    session_start();
    if(!isset($_SESSION['role']))
    {
        header("Location: ../../login.php"); 
    }
    else
    {
    ob_start();
    include('../head_css.php'); ?>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <?php 
        
        include "../connection.php";
        ?>
        <?php include('../header.php'); ?>

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php include('../sidebar-left.php'); ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        User Record
                    </h1>
                    
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                            <div class="box">
                                <div class="box-header">
                                    <div style="padding:10px;">
                                        
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal"><i class="fa fa-user-plus" aria-hidden="true"></i> Add User</button>  
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button> 
                                    </div>                                
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                <form method="post">
                                    <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px !important;"><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)"/></th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th style="width: 40px !important;">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $squery = mysqli_query($con, "select * from tbluser"); ?>
                                            <?php while($row = mysqli_fetch_array($squery)): ?>
                                                <tr>
                                                    <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="<?php echo $row['id']; ?>" /></td><td style="text-align: center;">
                                                        <img src="uploads/<?php echo $row['photo']; ?>" alt="Photo" style="width:80px;height:80px;" />
                                                    </td>
                                                    <td><?php echo $row['name']; ?></td>
                                                    <td><?php echo $row['username']; ?></td>
                                                    <td><?php echo $row['password']; ?></td>
                                                    <td><?php echo $row['role']; ?></td>
                                                    <td><?php echo $row['active']; ?></td>
                                                    <td>
                                                        <button class="btn btn-primary btn-sm show-edit-user-modal-btn"
                                                            type="button"
                                                            data-id="<?php echo $row['id']; ?>"
                                                            data-name="<?php echo $row['name']; ?>"
                                                            data-username="<?php echo $row['username']; ?>"
                                                            data-password="<?php echo $row['password']; ?>">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                            <?php include "edit_modal.php"; ?>
                                        </tbody>
                                    </table>

                                    <?php include "../deleteModal.php"; ?>

                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                            <?php include "../edit_notif.php"; ?>

                            <?php include "../added_notif.php"; ?>

                            <?php include "../delete_notif.php"; ?>

                            <?php include "../duplicate_error.php"; ?>

            <?php include "add_modal.php"; ?>

            <?php include "function.php"; ?>


                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <?php }
        include "../footer.php"; ?>
<script type="text/javascript">
    $(function() {
        $("#table").dataTable({
           "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0,3 ] } ],"aaSorting": []
        });

        $('.show-edit-user-modal-btn').on('click', function () {
            $('#editModal').modal('show');

            var $this = $(this),
                id = $this.data('id'),
                name = $this.data('name'),
                username = $this.data('username'),
                password = $this.data('password');

            $('#edit-user-id').val(id),
            $('#edit-user-name').val(name),
            $('#edit-user-username').val(username),
            $('#edit-user-password').val(password);
        })

        $('#update-user-btn').on('click', function () {
            var id = $('#edit-user-id').val(),
                name = $('#edit-user-name').val(),
                username = $('#edit-user-username').val(),
                password = $('#edit-user-password').val();

            if (id == '' || name == '' || username == '' || password == '') {
                Swal.fire({
                    icon: "error",
                    title: "Error!",
                    text: 'Please fill up the required fields!'
                });
            } else {
                var data = {
                    action: "update",
                    id: id,
                    name: name,
                    username: username,
                    password: password
                };


                $.ajax({
                    type: "POST",
                    url: "../../ajax/user.php",
                    contentType: "application/json",
                    data: JSON.stringify(data),
                    success: function(resp) { 
                        if (resp == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: "Success",
                                text: 'User has been updated successfully!'
                            }).then(function () {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Failed!",
                                text: "Unable to update user"
                            });
                        }
                    }, error: function(err){
                        Swal.fire({
                            icon: "error",
                            title: "Failed!",
                            text: err
                        });
                    }
                });
            }
        })
    });
</script>
    </body>
</html>