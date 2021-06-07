<?php

if(!isset($_SESSION)){
    session_start();
}

include('./adminIncludeFile/header.php');
include('../dbConnection.php');

if(isset($_SESSION['is_admin_login'])){
    $adminEmail = $_SESSION['adminLoginEmail'];
}else{
    echo "<script> location.href = '../index.php' </script>";
}

if(isset($_REQUEST['courseSubmitBtn'])){
    if(($_REQUEST['courseName'] == "") || ($_REQUEST['courseDesc'] == "") || ($_REQUEST['courseAuthor'] == "") || ($_REQUEST['courseDuration'] == "") || ($_REQUEST['courseOriginalPrice'] == "") || ($_REQUEST['coursePrice'] == "") || ($_FILES['courseImg'] == "")){
        $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>All Fields are Required</div>";
    }else{
        $courseName = $_REQUEST['courseName'];
        $courseDesc = $_REQUEST['courseDesc'];
        $courseAuthor = $_REQUEST['courseAuthor'];
        $courseDuration = $_REQUEST['courseDuration'];
        $courseOriginalPrice = $_REQUEST['courseOriginalPrice'];
        $coursePrice = $_REQUEST['coursePrice'];
        // img stored in folder 
        $courseImg = $_FILES['courseImg']['name'];
        $courseImgTemp = $_FILES['courseImg']['tmp_name'];
        $imgFolder = '../images/courseImg/'.$courseImg;
        move_uploaded_file($courseImgTemp,$imgFolder);

        $sql = "INSERT INTO course(course_name, course_desc, course_author, course_img, course_duration, course_price, course_original_price) VALUES ('$courseName', '$courseDesc', '$courseAuthor', '$imgFolder', '$courseDuration', '$coursePrice', '$courseOriginalPrice')";

        if($conn->query($sql) == TRUE){
            $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'>Course Added Successfully</div>";
        }else {
            $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to Add Course</div>";
        }
    }

}


?>

<div class="col-sm-6 mt-4 mx-3 jumbotron">
    <h3 class="text-center font-weight-bold">Add New Course</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="courseName">Course Name</label>
            <input type="text" class="form-control" name="courseName" id="courseName">
        </div>
        <div class="form-group">
            <label for="courseDesc">Course Description</label>
            <textarea class="form-control" name="courseDesc" id="courseDesc" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="courseAuthor">Course Author</label>
            <input type="text" class="form-control" name="courseAuthor" id="courseAuthor">
        </div>
        <div class="form-group">
            <label for="courseDuration">Course Duration</label>
            <input type="text" class="form-control" name="courseDuration" id="courseDuration">
        </div>
        <div class="form-group">
            <label for="courseOriginalPrice">Course Original Price</label>
            <input type="text" class="form-control" name="courseOriginalPrice" id="courseOriginalPrice">
        </div>
        <div class="form-group">
            <label for="coursePrice">Course Selling Price</label>
            <input type="text" class="form-control" name="coursePrice" id="coursePrice">
        </div>
        <div class="form-group">
            <label for="courseImg">Course Image</label>
            <input type="file" class="form-control-file" name="courseImg" id="courseImg">
        </div>
        <?php
        if(isset($msg)){echo $msg;}
        ?>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="courseSubmitBtn" name="courseSubmitBtn">Submit</button>
            <a href="Courses.php" class="btn btn-secondary">Close</a>
        </div>
        
    </form>

</div>


<?php
include('./adminIncludeFile/footer.php');
?>