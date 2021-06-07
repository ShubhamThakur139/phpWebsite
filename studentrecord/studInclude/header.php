<?php

if (!isset($_SESSION)) {
    session_start();
}
include_once('../dbConnection.php');
if (isset($_SESSION['is_login'])) {
    $studEmail = $_SESSION['studLoginEmail'];
} else {
    echo "<script> location.href = '../index.php';</script>";
}

if (isset($studEmail)) {
    $sql = "SELECT stud_img FROM student WHERE stud_email = '$studEmail'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $stud_img = $row['stud_img'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap css  -->
    <!-- <link rel="stylesheet" href="./css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Font Awesome css  -->
    <link rel="stylesheet" href="../css/all.min.css">
    <!-- Google font ubuntu  -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <!-- owl carouseal css  -->
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/owl.theme.green.css">
    <!-- Custom css  -->
    <link rel="stylesheet" href="../css/styles.css">
    <title>Profile</title>
</head>

<body>
    <!-- Top Navbar  -->

    <nav class="navbar navbar-dark fixed-top flex-md-nowrap pl-5 p-0 shadow mb-5" style="background-color: #225470;">
        <div class="container-fluid">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../index.php">DLearning</a>
            <span class="navbar-text mr-5">New way of Learning</span>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="container-fluid mb-5" style="margin-top: 40px;">
        <div class="row">
            <nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-3">
                            <img src="<?php echo $stud_img; ?>" alt="studentimage" class="img-thumbnail rounded-circle">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="studentProfile.php">
                                <i class="fas fa-user"></i>
                                Profile <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="myCourse.php">
                                <i class="fab fa-accessible-icon"></i>
                                My Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="studfeedback.php">
                                <i class="fab fa-accessible-icon"></i>
                                Feedback
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="studChngPass.php">
                                <i class="fas fa-key"></i>
                                Change Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>