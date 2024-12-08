<!DOCTYPE html>
<html>
    <?php
    session_start();
    if (!isset($_SESSION['role'])) {
        header("Location: ../../login.php"); 
        exit();
    } else {
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
                        <h1>Patient Record</h1>
                    </section>

                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <!-- left column -->
                            <div class="box">
                                <div class="box-header">
                                    <div style="padding:10px;">
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Patient</button>  
                                    </div>                                
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <form method="post"> <!-- Update with your actual PHP script for deleting records -->
                                        <table id="table" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="width: 20px !important;"><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)"/></th>
                                                    <th>Firstname</th>
                                                    <th>Lastname</th>
                                                    <th>Middlename</th>
                                                    <th>Phone No</th>
                                                    <th>Add Date</th>
                                                    <th>Sino</th>
                                                    <th style="width: 40px !important;">Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $squery = mysqli_query($con, "SELECT * FROM tblpatient"); ?>
                                                <?php while ($row = mysqli_fetch_array($squery)): ?>
                                                    <tr>
                                                        <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="<?php echo $row['id']; ?>" /></td>
                                                        <td><?php echo $row['firstname']; ?></td>
                                                        <td><?php echo $row['lastname']; ?></td>
                                                        <td><?php echo $row['middlename']; ?></td>
                                                        <td><?php echo $row['phoneno']; ?></td>
                                                        <td><?php echo $row['adddate']; ?></td>
                                                        <td><?php echo $row['sino']; ?></td>
                                                        <td>
                                                            <button type="button"
                                                                class="btn btn-primary btn-sm show-update-patient-details" 
                                                                data-target="#editModal" 
                                                                data-toggle="modal"
                                                                data-id="<?php echo $row['id']; ?>"
                                                                data-firstname="<?php echo $row['firstname']; ?>"
                                                                data-lastname="<?php echo $row['lastname']; ?>"
                                                                data-middlename="<?php echo $row['middlename']; ?>"
                                                                data-phoneno="<?php echo $row['phoneno']; ?>"
                                                                data-adddate="<?php echo $row['adddate']; ?>"
                                                                data-sino="<?php echo $row['sino']; ?>">
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                            </button>
                                                            <br>
                                                            <button type="button"
                                                                class="btn btn-danger btn-sm delete-patient-btn" 
                                                                data-name="<?php echo $row['firstname'].' '.$row['lastname']; ?>"
                                                                data-id="<?php echo $row['id']; ?>">
                                                                <i class="fa fa-trash" aria-hidden="true"></i> Remove
                                                            </button>
                                                        </td>
                                                    </tr>
                                                   
                                                <?php endwhile; ?>
                                                <?php include "edit_modal.php"; ?>
                                                <?php include "delete_modal.php"; ?>
                                            </tbody>
                                        </table>
                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                            <?php include "../edit_notif.php"; ?>
                            <?php include "../added_notif.php"; ?>
                            <?php include "../delete_notif.php"; ?>
                            <?php include "../duplicate_error.php"; ?>
                            <?php include "add_modal_v2.php"; ?>
                            <?php include "function.php"; ?>

                        </div>   <!-- /.row -->
                    </section><!-- /.content -->
                </aside><!-- /.right-side -->
            </div><!-- ./wrapper -->
            <!-- jQuery 2.0.2 -->
            <?php }
            include "../footer.php"; ?>
            <?php include "delete_modal.php"; ?>
            <script type="text/javascript">
                $(function() {
                    $("#table").dataTable({
                       "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0, 7 ] } ],"aaSorting": []
                    });

                    $('.delete-patient-btn').on('click', function () {
                        var id = $(this).data('id'),
                            name = $(this).data('name');

                        var data = {
                            action: "delete",
                            id: id
                        };

                        Swal.fire({
                            icon: 'question',
                            title: "Do you want to delete the record of <b>" + name + "</b>?",
                            showDenyButton: true,
                            showCancelButton: true,
                            confirmButtonText: "Yes"
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                $.ajax({
                                    type: "POST",
                                    url: "../../ajax/patient.php",
                                    contentType: "application/json",
                                    data: JSON.stringify(data),
                                    success: function(resp) { 
                                        if (resp == 'success') {
                                            Swal.fire({
                                                icon: 'success',
                                                title: "Success",
                                                text: 'Patient has been deleted successfully!'
                                            }).then(function () {
                                                location.reload();
                                            });
                                        } else {
                                            Swal.fire({
                                                icon: "error",
                                                title: "Failed!",
                                                text: err
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
                        });
                    })

                    $('.show-update-patient-details').on('click', function () {
                        $this = $(this);

                        $('#edit-patient-id').val($this.data('id'));
                        $('#edit-patient-firstname').val($this.data('firstname'));
                        $('#edit-patient-lastname').val($this.data('lastname'));
                        $('#edit-patient-middlename').val($this.data('middlename'));
                        $('#edit-patient-phoneno').val($this.data('phoneno'));
                        $('#edit-patient-adddate').val($this.data('adddate'));
                        $('#edit-patient-sino').val($this.data('sino'));
                    })

                    $('#addModal').on('shown', function(){
                        alert("I want this to appear after the modal has opened!");
                    });

                    $('#add-patient-btn').on('click', function () {
                        var firstname = $('#add-patient-firstname').val(),
                            lastname = $('#add-patient-lastname').val(),
                            middlename = $('#add-patient-middlename').val(),
                            phoneno = $('#add-patient-phoneno').val(),
                            adddate = $('#add-patient-adddate').val(),
                            sino = $('#add-patient-sino').val();

                        if (firstname == '' || lastname == '' || phoneno == '' || adddate == '' || sino == '') {
                            Swal.fire({
                                icon: "error",
                                title: "Error!",
                                text: 'Please fill up the required fields!'
                            });
                        } else {
                            var data = {
                                action: "create",
                                firstname: firstname,
                                lastname: lastname,
                                phoneno: phoneno,
                                adddate: adddate,
                                sino: sino,
                                middlename: middlename
                            };


                            $.ajax({
                                type: "POST",
                                url: "../../ajax/patient.php",
                                contentType: "application/json",
                                data: JSON.stringify(data),
                                success: function(resp) { 
                                    if (resp == 'success') {
                                        Swal.fire({
                                            icon: 'success',
                                            title: "Success",
                                            text: 'Patient has been created successfully!'
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

                    $('#update-patient-details').on('click', function () {
                        var id = $('#edit-patient-id').val(),
                            firstname = $('#edit-patient-firstname').val(),
                            lastname = $('#edit-patient-lastname').val(),
                            middlename = $('#edit-patient-middlename').val(),
                            phoneno = $('#edit-patient-phoneno').val(),
                            adddate = $('#edit-patient-adddate').val(),
                            sino = $('#edit-patient-sino').val();

                        if (id == '' || firstname == '' || lastname == '' || phoneno == '' || adddate == '' || sino == '') {
                            Swal.fire({
                                icon: "error",
                                title: "Error!",
                                text: 'Please fill up the required fields!'
                            });
                        } else {
                            var data = {
                                action: "update",
                                id: id,
                                firstname: firstname,
                                lastname: lastname,
                                phoneno: phoneno,
                                adddate: adddate,
                                sino: sino,
                                middlename: middlename
                            };


                            $.ajax({
                                type: "POST",
                                url: "../../ajax/patient.php",
                                contentType: "application/json",
                                data: JSON.stringify(data),
                                success: function(resp) { 
                                    if (resp == 'success') {
                                        Swal.fire({
                                            icon: 'success',
                                            title: "Success",
                                            text: 'Patient has been updated successfully!'
                                        }).then(function () {
                                            location.reload();
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: "error",
                                            title: "Failed!",
                                            text: err
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
    
