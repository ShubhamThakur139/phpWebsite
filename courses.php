    <!-- Start including header section  -->
    <?php
    include('./dbConnection.php');
    include('./mainfiles/header.php');
    ?>
    <!-- End including header section  -->

    <!-- start home page  -->

    <div class="container-fluid bg-dark">
        <div class="row">
            <img src="./images/homeBackground.jpg" alt="This is an image" style="height: 550px; width: 100%; object-fit:cover; box-shadow: 10px;">
        </div>
    </div>

    <!-- end home page  -->

    <!-- All courses start  -->

    <section class="courses pb-5">
        <div class="container pt-3">
            <h1 class="text-center mb-3">All Courses</h1>
            <hr class="w-25 mx-auto">
            <div class="row mt-4">
                <?php
                $sql = "SELECT * FROM course";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $course_id = $row['course_id'];
                        echo '
                <div class="col-sm-4 mb-4">
                <a href="coursedetails.php?course_id = ' . $course_id . '" class="btn" style="text-align: left; padding: 0px; margin: 0px;">
                <div class="card" >
                <img class="card-img-top" src="' . str_replace('..', '.', $row['course_img']) . '" alt="Card image">
                <div class="card-body">
                    <h5 class="card-title">' . $row['course_name'] . '</h5>
                    <p class="card-text">' . $row['course_desc'] . '</p>
                </div>
                <div class="card-footer">
                    <p class="card-text d-inline">Price: <small><del>&#8377 ' . $row['course_original_price'] . ' </del></small><span class="font-weight-bolder">&#8377 ' . $row['course_price'] . '</span></p>
                    <a href="coursedetails.php?course_id = ' . $course_id . '" class="custom-btn custom-btn-primary font-weight-bolder float-right">Enroll</a>
                </div>
            </div>
            </a>
                </div>
                ';
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <!-- All courses end  -->

    <!-- Start Include footer section  -->
    <?php
    include('./mainfiles/footer.php');
    ?>
    <!-- End Including footer section  -->