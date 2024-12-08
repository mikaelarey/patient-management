<?php

if(isset($_POST['btn_add'])){
    $txt_type= $_POST['txt_type'];
    $txt_name = $_POST['txt_name'];
    $txt_price = $_POST['txt_price'];
    $txt_quantity = $_POST['txt_quantity'];
    $txt_description = $_POST['txt_description'];
    $txt_supplier = $_POST['txt_supplier'];
    //$txt_image = $_POST['txt_image'];
    $name = basename($_FILES['txt_image']['name']);
    $temp = $_FILES['txt_image']['tmp_name'];
    $imagetype = $_FILES['txt_image']['type'];
    $size = $_FILES['txt_image']['size'];


    $milliseconds = round(microtime(true) * 1000);
    $image = $milliseconds.'_'.$name;

    if(isset($_SESSION['role'])){
        $action = 'Added Product named '.$txt_name;
        $iquery = mysqli_query($con,"INSERT INTO tbllogs (user,logdate,action) values ('".$_SESSION['role']."', NOW(), '".$action."')");
    }

    $su = mysqli_query($con,"SELECT * from tblproduct where name = '".$txt_name."' ");
    $ct = mysqli_num_rows($su);
    
    if($ct == 0){

        if($name != ""){
            if(($imagetype=="image/jpeg" || $imagetype=="image/png" || $imagetype=="image/bmp" || $imagetype=="image/jpg") && $size<=2048000){
                    if(move_uploaded_file($temp, '../../assets/img/'.$image))
                    {
                    $txt_image = $image;
                    $query = mysqli_query($con,"INSERT INTO tblproduct (name,price,qty,description,image,cat_id) 
                    values ('$txt_name','$txt_price','$txt_quantity','$txt_description', '$txt_image' , '$txt_type')") or die('Error: ' . mysqli_error($con));
                    }
            }
            else
            {
                $_SESSION['filesize'] = 1; 
                header ("location: ".$_SERVER['REQUEST_URI']);
            }
        }
        else
        {
             $txt_image = 'default.png';
             
             $query = mysqli_query($con,"INSERT INTO tblproduct (name,price,qty,description,image,cat_id) 
             values ('$txt_name','$txt_price','$txt_quantity','$txt_description', '$txt_image' , '$txt_type')") or die('Error: ' . mysqli_error($con));
             }

        
            if($query == true)
            {
                $_SESSION['added'] = 1;
                header ("location: ".$_SERVER['REQUEST_URI']);
            }
    }
    else{
        $_SESSION['duplicateuser'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }    

}




if (isset($_POST['btn_save'])) {

    $txt_id = $_POST['hidden_id'];
    $txt_type = $_POST['txt_type'];
    $txt_name = $_POST['txt_name'];
    $txt_price = $_POST['txt_price'];
    $txt_quantity = $_POST['txt_quantity'];
    $txt_description = $_POST['txt_description'];
    $txt_status = $_POST['txt_status'];
    $txt_supplier = $_POST['txt_supplier'];

    // Check if the user is logged in and log the action
    if (isset($_SESSION['role'])) {
        $action = 'Added Product named ' . $txt_name;
        $iquery = mysqli_query($con, "INSERT INTO tbllogs (user, logdate, action) VALUES ('" . $_SESSION['role'] . "', NOW(), '" . $action . "')");
    }
    
    $query = mysqli_query($con, "UPDATE tblproduct SET supplier_id='$txt_supplier',price='$txt_price', qty='$txt_quantity', description='$txt_description', status='$txt_status', cat_id='$txt_type' WHERE id = '$txt_id'") or die('Error: ' . mysqli_error($con));

    if ($query) {
        // Handle successful update
        $_SESSION['updated'] = 1;
        header("location: " . $_SERVER['REQUEST_URI']);
        exit();
    } else {
        // Handle query execution failure
        $_SESSION['update_failure'] = 1;
        header("location: " . $_SERVER['REQUEST_URI']);
        exit();
    }
}






if(isset($_POST['btn_delete']))
{
    if(isset($_POST['chk_delete']))
    {
        foreach($_POST['chk_delete'] as $value)
        {
            $delete_query = mysqli_query($con,"DELETE from tblproduct where id = '$value' ") or die('Error: ' . mysqli_error($con));
                    
            if($delete_query == true)
            {
                $_SESSION['delete'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
    }
}

if (isset($_POST['btn_archived'])) {
    $txt_id = $_POST['hidden_id'];

    // Validate $txt_id as a numeric value
    if (is_numeric($txt_id)) {
        // Use prepared statements to update the status to "ARCHIVED"
        $stmt = mysqli_prepare($con, "UPDATE tblproduct SET status = 'ARCHIVED' WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $txt_id); // "i" stands for integer
        $success = mysqli_stmt_execute($stmt);

        if ($success) {
            $_SESSION['archived'] = 1;
        } else {
            // Handle update error, e.g., log the error message
            echo "Error archiving customer with ID: $txt_id";
        }

        mysqli_stmt_close($stmt);
    }

    // Redirect or display success message as needed
    header("location: ".$_SERVER['REQUEST_URI']);
}

?>