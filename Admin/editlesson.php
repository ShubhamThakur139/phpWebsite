<?php

if (!isset($_SESSION)) {
    session_start();
}

include('./adminIncludeFile/header.php');
include_once('../dbConnection.php');

if (isset($_SESSION['is_admin_login'])) {
    $adminEmail = $_SESSION['adminLoginEmail'];
} else {
    echo "<script>location.href = '../index.php';</script>";
}


// Update Lesson Details 

if(isset($_REQUEST['updLessonBtn'])){
    //messae displayed if any field is missing
    if(($_REQUEST['lessonName'] == "") || ($_REQUEST['lessonDesc'] == "") || ($_REQUEST['lessonID'] == "") || ($_REQUEST['courseID'] == "") || ($_REQUEST['courseName'] == "")){
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">All Fields are Required !</div>';
    }else{
        $lessonID = $_REQUEST['lessonID'];
        $lessonName = $_REQUEST['lessonName'];
        $lessonDesc = $_REQUEST['lessonDesc'];
        $courseID = $_REQUEST['courseID'];
        $courseName = $_REQUEST['courseName'];
        $lessonLink = '../lessonvid/'.$_FILES['lessonLink']['name'];

        $sql = "UPDATE lesson SET lesson_id = '$lessonID', lesson_name = '$lessonName', lesson_desc = '$lessonDesc', course_id = '$courseID', course_name = '$courseName', lesson_link = '$lessonLink' WHERE lesson_id = '$lessonID'";
        if($conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Update Lesson Details</div>';
        }else{
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Update</div>';
        }
    }
}


?>

<div class="col-sm-6 mt-4 mx-3 jumbotron">
    <h3 class="text-center">Update Lesson Details</h3>

    <?php
    if (isset($_REQUEST['edit'])) {
        $sql = "SELECT * FROM lesson WHERE lesson_id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>

<form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="courseID">Course ID</label>
            <input type="text" class="form-control" name="courseID" id="courseID" value="<?php if(isset($row['course_id'])){ echo $row['course_id']; } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="courseName">Course Name</label>
            <input type="text" class="form-control" name="courseName" id="courseName" value="<?php if(isset($row['course_name'])){ echo $row['course_name']; } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="lessonID">Lesson ID</label>
            <input type="text" class="form-control" name="lessonID" id="lessonID" value="<?php if(isset($row['lesson_id'])){ echo $row['lesson_id']; } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="lessonName">Lesson Name</label>
            <input type="text" class="form-control" name="lessonName" id="lessonName" value="<?php if(isset($row['lesson_name'])){ echo $row['lesson_name']; } ?>">
        </div>
        <div class="form-group">
            <label for="lessonDesc">Lesson Description</label>
            <textarea class="form-control" name="lessonDesc" id="lessonDesc" rows="3" ><?php if(isset($row['lesson_desc'])) { echo $row['lesson_desc']; } ?></textarea>
        </div>
        <div class="form-group">
            <label for="lessonLink">Lesson Video Link </label>
            <video src="<?php if(isset($row['lesson_link'])){ echo $row['lesson_link']; } ?>" class="video-thumbnail"></video>
            <input type="file" class="form-control-file" name="lessonLink" id="lessonLink">
        </div>
        <?php
        if(isset($msg)){echo $msg;}
        ?>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="updLessonBtn" name="updLessonBtn">Submit</button>
            <a href="Lessons.php" class="btn btn-secondary">Close</a>
        </div>
    </form>

</div>


<?php
include('./adminIncludeFile/footer.php');
?>