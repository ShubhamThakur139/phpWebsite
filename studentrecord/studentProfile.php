<?php

if (!isset($_SESSION)) {
    session_start();
}

include('./studInclude/header.php');
include_once('../dbConnection.php');

if (isset($_SESSION['is_login'])) {
    $studEmail = $_SESSION['studLoginEmail'];
} else {
    echo "<script> location.href = '../index.php';</script>";
}

$sql = "SELECT * FROM student WHERE stud_email = '$studEmail'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $studID = $row['stud_id'];
    $studName = $row['stud_name'];
    $studOcc = $row['stud_occupation'];
    $studImg = $row['stud_img'];
}


if (isset($_REQUEST['updStudBtn'])) {
    if (($_REQUEST['studName'] == "") || ($_REQUEST['studOccupation'] == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">All Fields are Required !</div>';
    } else {
        $studName = $_REQUEST['studName'];
        $studOcc = $_REQUEST['studOccupation'];
        // Store Pic in images folder
        $stu_image = $_FILES['studImg']['name'];
        $stu_image_temp = $_FILES['studImg']['tmp_name'];
        $img_folder = '../images/stu/' . $stu_image;
        move_uploaded_file($stu_image_temp, $img_folder);
        // Update table values 
        $sql = "UPDATE student SET stud_name = '$studName', stud_occupation = '$studOcc', stud_img = '$img_folder' WHERE stud_email = '$studEmail' ";
        if ($conn->query($sql) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully </div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Update !</div>';
        }
    }
}
?>

<div class="col-sm-6 mt-5 mx-3">

    <form class="" action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="studID" class="form-label font-weight-bold">Student ID</label>
            <input class="form-control" type="text" name="studID" id="studID" value="<?php echo $studID; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="studEmail" class="form-label font-weight-bold">Email</label>
            <input class="form-control" type="text" name="studEmail" id="studEmail" value="<?php echo $studEmail; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="studName" class="form-label font-weight-bold">Name</label>
            <input class="form-control" type="text" name="studName" id="studName" value="<?php echo $studName; ?>">
        </div>
        <div class="form-group">
            <label for="studOccupation" class="form-label font-weight-bold">Occupation</label>
            <input class="form-control" type="text" name="studOccupation" id="studOccupation" value="<?php echo $studOcc; ?>">
        </div>
        <div class="form-group mb-3">
            <label for="studImg" class="form-label font-weight-bold">Upload Image</label>
            <input type="file" name="studImg" id="studImg" class="form-control-file">
        </div>
        <?php if (isset($msg)) {
            echo $msg;
        } ?>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" name="updStudBtn">Update</button>
            <a class="btn btn-primary" href="../index.php">Home</a>
        </div>
    </form>
</div>

<?php
include('./studInclude/footer.php')
?>