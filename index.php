<!-- Include header section  -->
<?php
include_once('./dbConnection.php');
include('./mainfiles/header.php');
?>
<!-- Include header section  -->

<!-- Home page starts  -->

<section class="home-page">
    <div class="container-fluid remove-img-margin">
        <div class="home-img">
            <img src="./images/picture.jpg" class="img-fluid" alt="This is an background image">
            <div class="img-content">
                <h1 class="my-content">Welcome to <span>DigitalLearning</span></h1>
                <p class="my-content">new way of learning</p>
                <br>

                <?php
                if (isset($_SESSION['is_login'])) {
                    echo '<a href="studentrecord/studentProfile.php" class="custom-btn custom-btn-primary">My Profile</a>';
                } else {
                    echo '<a href="#" data-bs-toggle="modal" data-bs-target="#StudentSignUpModal" class="custom-btn custom-btn-primary">Get Started</a>';
                }
                ?>

            </div>
        </div>
    </div>
</section>
<!-- Home page ends  -->

<!-- start text banner -->
<div class="container-fluid text-white txt-banner p-2">
    <div class="row">
        <div class="col-sm">
            <h5><i class="fas fa-book-open mr-2"></i>100+ Online Courses</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fas fa-users mr-2"></i>Expert Instructors</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fas fa-keyboard mr-2"></i>Lifetime Access</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fas fa-rupee-sign mr-2"></i>Money Back Guarantee</h5>
        </div>
    </div>
</div>
<!-- end text banner  -->

<!-- popular courses start  -->

<section class="courses">
    <div class="container pt-5">
        <h1 class="text-center mb-3">Popular Courses</h1>
        <hr class="w-25 mx-auto">
        <!-- start first deck   -->
        <div class="card-deck mt-4 ">
            <?php
            $sql = "SELECT * FROM course LIMIT 3";
            $result = $conn->query($sql);
            if ($row = $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $course_id = $row['course_id'];
                    echo '
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
                    </a>';
                }
            }
            ?>
        </div>
        <!-- End first deck  -->
        <!-- second deck start  -->
        <div class="card-deck mt-4 ">
            <?php
            $sql = "SELECT * FROM course LIMIT 3 ,3";
            $result = $conn->query($sql);
            if ($row = $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $course_id = $row['course_id'];
                    echo '
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
                    </a>';
                }
            }
            ?>
        </div>
        <!-- second deck end  -->

        <div class="text-center mt-5 pb-5">
            <a class="custom-btn custom-btn-primary" href="courses.php">View All Courses</a>
        </div>
    </div>
</section>

<!-- popular courses end  -->

<!-- start Contact us  -->

<?php
include('./contact.php');
?>

<!-- end Contact us  -->

<!-- start student testimonial  -->
<!-- <section class="student-testimonial">
    <div class="container-fluid mt-5" style="background-color: #3dcfd3;" id="Feedback">
        <h1 class="text-center text-white p-4 testyheading">Student's Feedback</h1>
        <div class="row">
            <div class="col-md-12">
                <div id="testimonial-slider" class="owl-carousel">
                    <div class="testimonial">
                        <p class="description">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ea dicta illo tempore minima laboriosam ullam, illum ducimus animi, eos beatae earum blanditiis. Corrupti delectus repudiandae esse ab aspernatur voluptas!
                        </p>
                        <div class="pic">
                            <img src="./images/advancedjava.jpg" alt="" />
                        </div>
                        <div class="testimonial-prof">
                            <h4>Sonam</h4>
                            <small>Web Developer</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- end student testimonial  -->

<!-- start social links  -->

<section>
    <div class="container-fluid social p-2">
        <div class="row">
            <div class="col-sm">
                <a href="https://www.facebook.com/shibuuu55/" target="_"><i class="fab fa-facebook-f mr-2"></i>Facebook</a>
            </div>
            <div class="col-sm">
                <a href="https://github.com/Shibuu155" target="_"><i class="fab fa-github mr-2"></i>Github</a>
            </div>
            <div class="col-sm">
                <a href="https://www.instagram.com/___thakurshubham/" target="_"><i class="fab fa-instagram mr-2"></i>Instagram</a>
            </div>
            <div class="col-sm">
                <a href="https://www.linkedin.com/in/shubham-thakur-a1b179199" target="_"><i class="fab fa-linkedin mr-2"></i>Linkedin</a>
            </div>
        </div>
    </div>
</section>

<!-- End social links  -->

<!-- start about section  -->
<section>
    <div class="container-fluid p-4">
        <div class="container">
            <div class="row text-center">
                <div class="col-sm">
                    <h5>About us</h5>
                    <p>DLearning Platform provide you quality education in terms of practical knowledge or as well as theory knowledge too. DLearning knows the value of your money.</p>
                </div>
                <div class="col-sm category">
                    <h5>Top Categories</h5>
                    <a class="text-dark" href="#">Web Designing</a><br>
                    <a class="text-dark" href="#">Web Development</a><br>
                    <a class="text-dark" href="#">App Development</a><br>
                    <a class="text-dark" href="#">Artificial Intelligence</a><br>
                    <a class="text-dark" href="#">Cloud Computing</a>
                </div>
                <div class="col-sm">
                    <h5>Contact Us</h5>
                    <p>DLearning,
                        Near Veer Palace,<br> Ludhiana,
                        Punjab - 141015 <br>
                        Phone: +91 1234567890 <br>
                        www.Dlearning.com
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End about section  -->

<!-- Start Include footer section  -->
<?php
include('./mainfiles/footer.php');
?>
<!-- End Including footer section  -->

<!-- style="width:400px" 
    mt-4 ml-2 
    col-lg-4 col-12-->
<!-- Start second deck  -->
<!-- 4th card deck  -->
<!-- <div class="card-deck col-lg-4 col-12 mt-4 ml-2">
                    <a href="#" class="btn" style="text-align: left; padding: 0px; margin: 0px;">

                        <div class="card" style="width:400px">
                            <img class="card-img-top" src="./images/cloudcomputing.png" alt="Card image">
                            <div class="card-body">
                                <h5 class="card-title">Cloud Computing</h5>
                                <p class="card-text">Some example text.</p>
                            </div>
                            <div class="card-footer">
                                <p class="card-text">Price: <small><del>&#8377 4000 </del></small><span class="font-weight-bolder">&#8377 800</span></p>
                                <a href="#" class="custom-btn custom-btn-primary font-weight-bolder float-right">Enroll</a>
                            </div>
                        </div>

                    </a>
                </div>
                5th card deck  -->
<!-- <div class="card-deck col-lg-4 col-12 mt-4 ml-2">
                    <a href="#" class="btn" style="text-align: left; padding: 0px; margin: 0px;">

                        <div class="card" style="width:400px">
                            <img class="card-img-top" src="./images/webdevelopmentE.jpeg" alt="Card image">
                            <div class="card-body">
                                <h5 class="card-title">Web Development</h5>
                                <p class="card-text">Some example text.</p>
                            </div>
                            <div class="card-footer">
                                <p class="card-text">Price: <small><del>&#8377 7000 </del></small><span class="font-weight-bolder">&#8377 1000</span></p>
                                <a href="#" class="custom-btn custom-btn-primary font-weight-bolder float-right">Enroll</a>
                            </div>
                        </div>

                    </a>
                </div>
             6th card deck 
                <div class="card-deck col-lg-4 col-12 mt-4 ml-2">
                    <a href="#" class="btn" style="text-align: left; padding: 0px; margin: 0px;">

                        <div class="card" style="width:400px">
                            <img class="card-img-top" src="./images/advancedjavaE.jpg" alt="Card image">
                            <div class="card-body">
                                <h5 class="card-title">Advanced Java programming</h5>
                                <p class="card-text">Some example text.</p>
                            </div>
                            <div class="card-footer">
                                <p class="card-text">Price: <small><del>&#8377 2500 </del></small><span class="font-weight-bolder">&#8377 400</span></p>
                                <a href="#" class="custom-btn custom-btn-primary font-weight-bolder float-right">Enroll</a>
                            </div>
                        </div>

                    </a>
                </div> -->
<!-- second deck end  -->