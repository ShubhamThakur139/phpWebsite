<?php
if(!isset($_SESSION)){
    session_start();
}
include('./adminIncludeFile/header.php');
include('../dbConnection.php');

if(isset($_SESSION['is_admin_login'])){
    $adminEmail = $_SESSION['adminLoginEmail'];
}else{
    echo "<script> location.href = '../index.php'; </script>";
}

if(isset($_REQUEST['updBtn'])){
    if($_REQUEST['studName'] == "" || $_REQUEST['studEmail'] == "" || $_REQUEST['studPassword'] == "" || $_REQUEST['studOccupation'] == ""){
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">All Fields are Required</div>';
    }else{
        $studid = $_REQUEST['studID'];
        $studName = $_REQUEST['studName'];
        $studEmail = $_REQUEST['studEmail'];
        $studPassword = $_REQUEST['studPassword'];
        $studOccupation = $_REQUEST['studOccupation'];

        $sql = "UPDATE student SET stud_id = '$studid', stud_name = '$studName', stud_pass = '$studPassword', stud_occupation = '$studOccupation' WHERE stud_id = '$studid'";
        if($conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Updated Student Details</div>';
        }else{
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Unable to Update</div>';
        }
    }
}


?>

<div class="col-sm-6 mt-4 mx-3 jumbotron">
<h3 class="text-center">Edit Student Details</h3>

<?php

if(isset($_REQUEST['edit'])){
    $sql = "SELECT * FROM student WHERE stud_id = {$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group mb-3">
        <label for="studID" class="form-label font-weight-bold">Student ID</label>
        <input type="text" class="form-control" name="studID" id="studID" value="<?php if(isset($row['stud_id'])){ echo $row['stud_id']; } ?>" readonly>
    </div>
    <div class="form-group mb-3">
        <label for="studName" class="form-label font-weight-bold">Name</label>
        <input type="text" class="form-control" name="studName" id="studName" placeholder="Name" value="<?php if(isset($row['stud_name'])){ echo $row['stud_name']; } ?>">
    </div>
    <div class="form-group mb-3">
        <label for="studEmail" class="form-label font-weight-bold">Email address</label>
        <input type="email" class="form-control" name="studEmail" id="studEmail" placeholder="Email" aria-describedby="emailHelp" value="<?php if(isset($row['stud_email'])){ echo $row['stud_email']; }  ?>">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="form-group mb-3">
        <label for="studPassword" class="form-label font-weight-bold">Password</label>
        <input type="password" class="form-control" name="studPassword" id="studPassword" placeholder="Password" value="<?php if(isset($row['stud_pass'])) echo $row['stud_pass']; ?>">
    </div>
    <div class="form-group mb-3">
        <label for="studOccupation" class="form-label font-weight-bold">Occupation</label>
        <input class="form-control" type="text" name="studOccupation" id="studOccupation" placeholder="Occupation" value="<?php if(isset($row['stud_occupation'])) { echo $row['stud_occupation']; } ?>">
    </div>
    <?php if(isset($msg)){ echo $msg; } ?>
    <div class="text-center">
        <button type="submit" class="btn btn-danger" id="updBtn" name="updBtn">Update</button>
        <a href="students.php" class="btn btn-secondary">Cancel</a>
    </div>
    
</form>
</div>

<?php
include('./adminIncludeFile/footer.php')
?>