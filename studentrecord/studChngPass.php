<?php

if (!isset($_SESSION)) {
    session_start();
}
include('./studInclude/header.php');;
include_once('../dbConnection.php');

if (isset($_SESSION['is_login'])) {
    $studEmail = $_SESSION['studLoginEmail'];
} else {
    echo "<script> location.href = '../index.php'; </script>";
}

if(isset($_REQUEST['studUpdPassBtn'])){
    if($_REQUEST['inputNewPassword'] == ""){
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">All Fields are Required !</div>';
    }else{
        $sql = "SELECT * FROM student WHERE stud_email = '$studEmail'";
        $result = $conn->query($sql);
        if($result->num_rows == 1){
            $newPass = $_REQUEST['inputNewPassword'];
            $sql = "UPDATE student SET stud_pass = '$newPass' WHERE stud_email = '$studEmail' ";
            if($conn->query($sql) == TRUE){
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Password Updated Successfully</div>';
            }else{
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Update</div>';
            }

        }
        
        
    }
}

?>

<div class="col-sm-6  mt-5 mx-3 mb-5 ">
    <h3 class="text-center font-weight-bold mb-5">New Password</h3>
    <form autocomplete="off">
        <div class="form-group mb-5">
            <i class="fa fa-envelope"></i>
            <label for="inputEmail" class="form-label font-weight-bold">Email</label>
            <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email" value="<?php echo $studEmail;  ?>" readonly>
        </div>
        <div class="form-group mb-5">
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
        <button type="submit" class="btn btn-danger"  name="studUpdPassBtn">Update</button>
        <!-- <button type="reset" class="btn btn-secondary" >Home</button> -->
        <a class="btn btn-primary" href="../index.php">Home</a>
        </div>
        
    </form>
</div>

<?php
include('./studInclude/footer.php');
?>