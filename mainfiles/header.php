<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap css  -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- Font Awesome css  -->
    <link rel="stylesheet" href="./css/all.min.css">
    <!-- Google font ubuntu  -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <!-- Custom css  -->
    <link rel="stylesheet" href="./css/styles.css">
    <title>DLearning</title>
</head>

<body>

    <!-- Navigation starts  -->
    <nav class="navbar navbar-expand-sm navbar-dark  pl-5 fixed-top bgcolor">
        <div class="container-fluid">
            <a class="navbar-brand " href="index.php">DLearning</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse all-link" id="navbarNavAltMarkup">
                <ul class="navbar-nav custom-nav pl-5 ml-auto">
                    <li class="nav-item custom-nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <!-- <li class="nav-item custom-nav-item"><a class="nav-link" href="paymentstatus.php">Payment Status</a></li> -->
                    <li class="nav-item custom-nav-item"><a class="nav-link" href="./courses.php">Courses</a></li>
                    <?php
                    session_start();
                    if (isset($_SESSION['is_login'])) {
                        echo '
                            <li class="nav-item custom-nav-item"><a class="nav-link" href="studentrecord/studentProfile.php">My Profile</a></li>
                            <li class="nav-item custom-nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                            ';
                    } else {
                        echo '
                            <li class="nav-item custom-nav-item"><a class="nav-link" data-bs-toggle="modal" data-bs-target="#StudentLoginModal" href="#">Log In</a></li>
                            <li class="nav-item custom-nav-item"><a class="nav-link" data-bs-toggle="modal" data-bs-target="#StudentSignUpModal" href="#">Sign up</a></li> ';
                    }

                    ?>


                    <!-- <li class="nav-item custom-nav-item"><a class="nav-link" href="#">Feedback</a></li> -->
                    <li class="nav-item custom-nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navigation ends  -->