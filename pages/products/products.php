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
                        Product Record
                    </h1>
                    
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                            <div class="box">
                                <div class="box-header">
                                <div class="row" style="padding: 10px;">
                                    <div class="col-md-6">
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Products Offer</button>  
                                    </div>
                                    <div class="col-md-6 text-right">

                                    </div>
                                </div>
                                    <div style="padding:10px;">
                                        
                                              </div>                                
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                <form method="post">
                                    <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px !important;"><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)"/></th>
                                                <th>Category</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Status</th>
                                                <th>Description</th>
                                                <th>Image</th>
                                                <th style="width: 40px !important;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $squery = mysqli_query($con, "SELECT p.id, p.name, p.price, p.qty, p.status AS pstatus, p.description, p.image, p.cat_id, p.date_created, p.date_updated, c.category FROM tblproduct AS p INNER JOIN tblcategory AS c ON c.id = p.cat_id WHERE p.status = 'ACTIVE' OR p.status = 'INACTIVE'");
                                           while($row = mysqli_fetch_array($squery))
                                            {
                                                echo '
                                                <tr>
                                                    <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="'.$row['id'].'" /></td>
                                                    <td>'.$row['category'].'</td>
                                                    <td>'.$row['name'].'</td>
                                                    <td>₱ '.$row['price'].'</td>
                                                    <td>'.$row['qty'].'</td>
                                                    <td>'.$row['pstatus'].'</td>
                                                    <td>'.$row['description'].'</td>
                                                    <td style="width:70px;"><image src="../../assets/img/'.basename($row['image']).'" style="width:60px;height:60px;"/></td>
                                                    <td class="d-flex justify-content-between">
                                                        <button class="btn btn-primary btn-sm" data-target="#editModal'.$row['id'].'" data-toggle="modal">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                        </button>
                                                        <button class="btn btn-success btn-sm" data-target="#viewModal'.$row['id'].'" data-toggle="modal">
                                                            <i class="fa fa-eye" aria-hidden="true"></i> View
                                                        </button>
                                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#archivedModal'.$row['id'].'">
                                                            <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                                        </button> 
                                                    </td>
                                                    </tr>
                                                ';

                                                include "archived_modal.php";
                                                include "edit_modal.php";
                                                include "view_modal.php";
                                            }
                                            ?>
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
    });
</script>
    </body>
</html>