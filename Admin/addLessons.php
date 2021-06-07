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


if(isset($_REQUEST['lessonSubmitBtn'])){
    if(($_REQUEST['courseID']  == "" ) || ($_REQUEST['courseName'] == "") || ($_REQUEST['lessonName'] == "") || ($_REQUEST['lessonDesc'] == "") || ($_FILES['lessonLink'] == "")){
        // msg displayed if any field is empty 
        $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>All Fields are Required</div>";
    }else{
        // Assigning user values to variables 
        $lessonName = $_REQUEST['lessonName'];
        $lessonDesc = $_REQUEST['lessonDesc'];
        $courseID = $_REQUEST['courseID'];
        $courseName = $_REQUEST['courseName'];
        
        // link stored in folder 
        $lessonLink = $_FILES['lessonLink']['name'];
        $lessonLinkTemp = $_FILES['lessonLink']['tmp_name'];
        $linkFolder = '../lessonvid/'.$lessonLink;
        move_uploaded_file($lessonLinkTemp,$linkFolder);

        $sql = "INSERT INTO lesson(lesson_name, lesson_desc, lesson_link , course_id, course_name) VALUES ('$lessonName', '$lessonDesc', '$linkFolder', '$courseID','$courseName')";

        if($conn->query($sql) == TRUE){
            $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'>Lesson Added Successfully</div>";
        }else {
            $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to Add Lesson</div>";
        }
    }

}
?>


<div class="col-sm-6 mt-4 mx-3 jumbotron">
    <h3 class="text-center font-weight-bold">Add New Lesson</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="courseID">Course ID</label>
            <input type="text" class="form-control" name="courseID" id="courseID" value="<?php if(isset($_SESSION['course_id'])){ echo $_SESSION['course_id']; } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="courseName">Course Name</label>
            <input type="text" class="form-control" name="courseName" id="courseName" value="<?php if(isset($_SESSION['course_name'])){ echo $_SESSION['course_name']; } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="courseName">Lesson Name</label>
            <input type="text" class="form-control" name="lessonName" id="lessonName" >
        </div>
        <div class="form-group">
            <label for="lessonDesc">Lesson Description</label>
            <textarea class="form-control" name="lessonDesc" id="lessonDesc" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="lessonLink">Lesson Video Link </label>
            <input type="file" class="form-control-file" name="lessonLink" id="lessonLink">
        </div>
        <?php
        if(isset($msg)){echo $msg;}
        ?>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="lessonSubmitBtn" name="lessonSubmitBtn">Submit</button>
            <a href="Lessons.php" class="btn btn-secondary">Close</a>
        </div>
    </form>
</div>


<?php
include('./adminIncludeFile/footer.php');
?>