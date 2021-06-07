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

$sql = "SELECT * FROM student WHERE stud_email = '$studEmail' ";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $studID = $row['stud_id'];
}

if (isset($_REQUEST['feedbackSubBtn'])) {
    if (($_REQUEST['f_content'] == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">All Fields are Required !</div>';
    } else {
        $fcontent  = $_REQUEST['f_content'];
        $sql = "INSERT INTO feedback (f_content,stu_id) VALUES ('$fcontent','$studID')";
        if($conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Submitted Successfully</div>';
        }else{
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Submission Failed</div>';
        }
    }
}

?>

<div class="col-sm-6 mt-5">
<h3 class="text-center mb-4">FeedBack</h3>
    <form class="mx-5" action="" method="POST" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label for="studID" class="form-label font-weight-bold">Student ID</label>
            <input type="text" name="studID" id="studID" class="form-control" value="<?php if(isset($studID)){ echo $studID; }?>" readonly>
        </div>
        <div class="form-group mb-5">
            <label for="f_content" class="form-label font-weight-bold">Give Feedback</label>
            <textarea name="f_content" id="f_content" class="form-control" rows="3"></textarea>
        </div>
        <?php if (isset($msg)) {
            echo $msg;
        } ?>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" name="feedbackSubBtn">Submit</button>
            <a class="btn btn-primary" href="../index.php">Home</a>
        </div>

    </form>

</div>

<?php
include('./studInclude/footer.php');
?>