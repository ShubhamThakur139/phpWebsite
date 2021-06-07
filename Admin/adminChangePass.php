<?php

if (!isset($_SESSION)) {
    session_start();
}

include('./adminIncludeFile/header.php');
include_once('../dbConnection.php');

if(isset($_SESSION['is_admin_login'])){
    $adminEmail = $_SESSION['adminLoginEmail'];
}else{
    echo "<script> location.href = '../index.php'; </script>";
}
$adminEmail = $_SESSION['adminLoginEmail'];

if(isset($_REQUEST['admUpdPassBtn'])){
    // check if any fields are missing 
    if($_REQUEST['inputNewPassword'] == ""){
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
    }else{
        $sql = "SELECT * FROM admin WHERE admin_email = '$adminEmail'";
        $result  = $conn->query($sql);
        $row = $result->num_rows;
        if($row == 1){
            $adminPass = $_REQUEST['inputNewPassword'];
            $sql = "UPDATE admin SET admin_pass = '$adminPass' WHERE admin_email = '$adminEmail'";
            if($conn->query($sql) == TRUE){
                // msg display if password change 
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Password Changed Successfully</div>';
            }else{
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Changed Password</div>';
            }
        }
    }
}


?>



<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center font-weight-bold">Admin New Password</h3>
    <form autocomplete="off">
        <div class="form-group mb-3">
            <i class="fa fa-envelope"></i>
            <label for="inputEmail" class="form-label font-weight-bold">Email</label>
            <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email" value="<?php  echo $adminEmail;  ?>" readonly>
        </div>
        <div class="form-group mb-3">
            <i class="fa fa-key"></i>
            <label for="inputNewPassword" class="form-label font-weight-bold">New Password</label>
            <input type="password" class="form-control" name="inputNewPassword" id="inputNewPassword" placeholder="New Password">
        </div>
        <?php
        if(isset($msg)){
            echo $msg;
        }
        ?>
        <div class="text-center mt-4">
        <button type="submit" class="btn btn-danger"  name="admUpdPassBtn">Update</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
        
    </form>
</div>
<?php
include('./adminIncludeFile/footer.php');
?>