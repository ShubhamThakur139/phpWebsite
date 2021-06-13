<!-- start including header section -->
<?php
include('./mainfiles/header.php');
include_once('./dbConnection.php');
?>
<!-- End including header section -->

<!-- start home page  -->
<div class="container-fluid">
    <div class="row">
        <img src="./images/homeBackground.jpg" alt="This is an image" style="height: 550px; width: 100%; object-fit:cover; box-shadow: 10px;">
    </div>
</div>
<!-- end home page  -->

<!-- start course detail section  -->
<section>
    <div class="container my-5 ">
        <?php
        if (isset($_GET['course_id'])) {
            $course_id = $_GET['course_id'];
            $sql = "SELECT * FROM course WHERE course_id = '$course_id' ";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $courseName = $row['course_name'];
            $courseDesc = $row['course_desc'];
            $courseDuration = $row['course_duration'];
            $coursePrice = $row['course_price'];
            $courseOriginalPrice = $row['course_original_price'];
        }
        ?>
        <div class="row">
            <p><?php echo $course_id; ?></p>
            <div class="col-md-4">
                <img src="./images/cprogrammingE.png" class="card-img-top" alt="C Programming">
            </div>
            <div class="col-md-8 mt-3">
                <div class="card-body">
                    <h6 class="card-title font-weight-bold">Course Name : <span style="color: #6d6565; font-weight:500;"><?php echo $courseName; ?> </span> </h6>
                    <h6 class="card-title font-weight-bold">Description: <span style="color: #6d6565; font-weight:500;"><?php echo $courseDesc; ?></span></h6>
                    <h6 class="card-title font-weight-bold">Duration: <span style="color: #6d6565; font-weight:500;"><?php echo $courseDuration; ?></span></h6>
                    <form action="" method="post">
                        <h6 class="card-title d-inline font-weight-bold">Price: <small><del>&#8377 <span style="color: #6d6565;"><?php echo $coursePrice; ?></span> </del></small><span class="font-weight-bolder"><span style="color: #6d6565;"> &#8377 <?php echo $courseOriginalPrice; ?></span></span></h6>
                        <button type="submit" class="custom-btn custom-btn-primary font-weight-bolder float-right" name="buy">Buy Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Lesson No.</th>
                    <th scope="col">Lesson Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Introduction</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- end course detail section  -->

<!-- start including footer section  -->
<?php
include('./mainfiles/footer.php');
?>
<!-- End including footer section  -->