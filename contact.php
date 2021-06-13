<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once('./dbConnection.php');

if (isset($_SESSION['submitQueryMessage'])) {
    if (($_REQUEST['name'] == "") || ($_REQUEST['subject'] == "") || ($_REQUEST['email'] == "") || ($_REQUEST['message'] == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">All Fields are Required !</div>';
    } else {
        $qname = $_REQUEST['name'];
        $qsubject = $_REQUEST['subject'];
        $qemail = $_REQUEST['email'];
        $qmessage = $_REQUEST['message'];
        $sql = "INSERT INTO studentquery(q_name, q_subject, q_email, q_message) VALUES ('$qname','$qsubject','$qemail','$qmessage') ";
        if ($conn->query($sql) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Submitted Successfully</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Submission Failed</div>';
        }
    }
}


?>



<!-- start contact us -->
<section class="contact-us" id="contact">
    <div class="container mt-1 py-5">
        <h1 class="text-center mt-4 allheading">Contact Us</h1>
        <hr class="w-25 mx-auto pb-5">

        <div class="row">
            <!-- Start contact us Row -->
            <div class="col-md-8">
                <form action="" method="POST">
                    <input type="text" class="form-control" name="name" placeholder="Name" id="name" required><br>
                    <input type="text" class="form-control" name="subject" placeholder="Subject" id="subject"><br>
                    <input type="email" class="form-control" name="email" placeholder="Email" id="email"><br>
                    <textarea class="form-control" name="message" placeholder="How can we help you?" style="height: 120px;" id="message" required></textarea><br>
                    <?php if (isset($msg)) {
                        echo $msg;
                    } ?>
                    <button type="button" class="custom-btn custom-btn-primary" id="submitQueryMessage" name="submitQueryMessage">Send</button><br><br>
                </form>
            </div> <!--  End Contact us Row -->

            <!-- start contact us 2nd column  -->
            <div class="col-md-4 stripe text-white text-center">
                <h4>DLearning</h4>
                <p>DLearning,
                    Near Veer Palace, Ludhiana,
                    Punjab - 141015 <br>
                    Phone: +91 1234567890 <br>
                    www.Dlearning.com
                </p>
            </div>
            <!-- End Contact us 2nd column  -->
        </div>
    </div>
</section>
<!-- End Contact us  -->