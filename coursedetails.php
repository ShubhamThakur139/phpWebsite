
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
        if(isset($_GET['course_id'])){
            $course_id = $_GET['course_id'];
            $sql = "SELECT * FROM course WHERE course_id = '$course_id' ";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        }
        ?>
            <div class="row">
                <div class="col-md-4">
                    <img src="./images/cprogrammingE.png" class="card-img-top" alt="C Programming">
                </div>
                <div class="col-md-8 mt-3">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bolder">Course Name : <?php if(isset($row['course_name'])){ echo $row['course_name']; }?> </h5>
                        <p class="card-text">Description: <?php echo $row['course_desc'] ?></p>
                        <p class="card-text">Duration: <?php echo $row['course_duration'] ?></p>
                        <form action="" method="post">
                            <p class="card-text d-inline">Price: <small><del>&#8377 <?php echo $row['course_original_price'] ?> </del></small><span class="font-weight-bolder">&#8377 <?php echo $row['course_price'] ?></span></p>
                            <button type="submit" class="custom-btn custom-btn-primary1 font-weight-bolder float-right" name="buy">Buy Now</button>
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
