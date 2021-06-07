<?php

if(!isset($_SESSION)){
    session_start();
}

include('./adminIncludeFile/header.php');
include('../dbConnection.php');

if(isset($_SESSION['is_admin_login'])){
    $adminEmail = $_SESSION['adminLoginEmail'];
}else{
    echo "<script> location.href = '../index.php';</script>";
}

// update course details
if (isset($_REQUEST['updBtn'])) {
    if ($_REQUEST['courseName'] == "" || $_REQUEST['courseDesc'] == "" || $_REQUEST['courseAuthor'] == "" || $_REQUEST['courseDuration'] == "" || $_REQUEST['courseOriginalPrice'] == "" || $_REQUEST['coursePrice'] == "") {
        // msg displayed if required fields are missing
        $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'>All Fields are Required</div>";
    } else {
        // assigning user value to variable
        $cid =  $_REQUEST['courseID'];
        $cname = $_REQUEST['courseName'];
        $cdesc = $_REQUEST['courseDesc'];
        $cauthor = $_REQUEST['courseAuthor'];
        $coriginalprice = $_REQUEST['courseOriginalPrice'];
        $cprice = $_REQUEST['coursePrice'];
        $cimg = '../images/courseImg/'.$_FILES['courseImg']['name'];

        $sql = "UPDATE course SET course_id = '$cid', course_name = '$cname', course_desc = '$cdesc', course_author = '$cauthor', course_original_price = '$coriginalprice', course_price = '$cprice', course_img = '$cimg' WHERE course_id = '$cid' ";
        if($conn->query($sql) == TRUE){
            // if form update successfully 
            $msg =  '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert" > Updated Successfully</div>';
        }else{
            // if form updation failed 
            $msg =  '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert" > Unable to /update</div>';
        }
    }
}

?>

<div class="col-sm-6 mt-4 mx-3 jumbotron">
    <h3 class="text-center">Update Course Details</h3>

    <?php
    if (isset($_REQUEST['edit'])) {
        $sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="courseID">Course ID</label>
            <input type="text" class="form-control" name="courseID" id="courseID" value="<?php if (isset($row['course_id'])) { echo $row['course_id'];} ?>" readonly>
        </div>
        <div class="form-group">
            <label for="courseName">Course Name</label>
            <input type="text" class="form-control" name="courseName" id="courseName" value="<?php if (isset($row['course_name'])) {
            echo $row['course_name']; } ?>">
        </div>
        <div class="form-group">
            <label for="courseDesc">Course Description</label>
            <textarea class="form-control" name="courseDesc" id="courseDesc" rows="3"><?php if (isset($row['course_desc'])) {
            echo $row['course_desc'];} ?></textarea>
        </div>
        <div class="form-group">
            <label for="courseAuthor">Course Author</label>
            <input type="text" class="form-control" name="courseAuthor" id="courseAuthor" value="<?php if (isset($row['course_author'])) {
            echo $row['course_author'];} ?>">
        </div>
        <div class="form-group">
            <label for="courseDuration">Course Duration</label>
            <input type="text" class="form-control" name="courseDuration" id="courseDuration" value="<?php if (isset($row['course_duration'])) {
            echo $row['course_duration'];} ?>">
        </div>
        <div class="form-group">
            <label for="courseOriginalPrice">Course Original Price</label>
            <input type="text" class="form-control" name="courseOriginalPrice" id="courseOriginalPrice" value="<?php if (isset($row['course_original_price'])) {echo $row['course_original_price']; } ?>">
        </div>
        <div class="form-group">
            <label for="coursePrice">Course Selling Price</label>
            <input type="text" class="form-control" name="coursePrice" id="coursePrice" value="<?php if (isset($row['course_price'])) {echo $row['course_price'];} ?>">
        </div>
        <div class="form-group">
            <label for="courseImg">Course Image</label>
            <img src="<?php if(isset($row['course_img'])) {
            echo $row['course_img']; } ?>" alt="" class="img-thumbnail">
            <input type="file" class="form-control-file" name="courseImg" id="courseImg" value="">
        </div>
        <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="updBtn" name="updBtn">Update</button>
            <a href="Courses.php" class="btn btn-secondary">Close</a>
        </div>

    </form>

</div>

<?php
include('./adminIncludeFile/footer.php');
?>