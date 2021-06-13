<?php

if (!isset($_SESSION)) {
    session_start();
}

include('./adminIncludeFile/header.php');
include('../dbConnection.php');

if (isset($_SESSION['is_admin_login'])) {
    $adminEmail = $_SESSION['adminLoginEmail'];
} else {
    echo "<script> location.href = '../index.php' </script>";
}

if (isset($_REQUEST['newStudSubmitBtn'])) {
    if (($_REQUEST['studName'] == "") || ($_REQUEST['studEmail'] == "") || ($_REQUEST['studPassword'] == "") || ($_REQUEST['studOccupation'] == "")) {
        $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>All Fields are Required</div>";
    } else {
        $studName = $_REQUEST['studName'];
        $studEmail = $_REQUEST['studEmail'];
        $studPassword = $_REQUEST['studPassword'];
        $studOccupation = $_REQUEST['studOccupation'];

        $sql = "INSERT INTO student(stud_name, stud_email, stud_pass, stud_occupation) VALUES ('$studName', '$studEmail', '$studPassword', '$studOccupation')";

        if ($conn->query($sql) == TRUE) {
            $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'>Student Added Successfully</div>";
            // echo "<script>location.href = 'students.php';</script>";
        } else {
            $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to Add Student</div>";
        }
    }
}


?>

<div class="col-sm-6 mt-4 mx-3 jumbotron">
    <h3 class="text-center font-weight-bold">Add New Student</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label for="studName" class="form-label font-weight-bold">Name</label>
            <small id="statusmsg1"></small>
            <input type="text" class="form-control" name="studName" id="studName" placeholder="Name">
        </div>
        <div class="form-group mb-3">
            <label for="studEmail" class="form-label font-weight-bold">Email address</label>
            <small id="statusmsg2"></small>
            <input type="email" class="form-control" name="studEmail" id="studEmail" placeholder="Email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="form-group mb-3">
            <label for="studPassword" class="form-label font-weight-bold">Password</label>
            <small id="statusmsg3"></small>
            <input type="password" class="form-control" name="studPassword" id="studPassword" placeholder="Password">
        </div>
        <div class="form-group mb-3">
            <label for="studOccupation" class="form-label font-weight-bold">Occupation</label>
            <input class="form-control" type="text" name="studOccupation" id="studOccupation" placeholder="Occupation">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="newStudSubmitBtn" name="newStudSubmitBtn">Add Student</button>
            <a href="students.php" class="btn btn-secondary">Cancel</a>
        </div>
        <?php if (isset($msg)) {
            echo $msg;
        } ?>
    </form>
</div>


<?php
include('./adminIncludeFile/footer.php');
?>