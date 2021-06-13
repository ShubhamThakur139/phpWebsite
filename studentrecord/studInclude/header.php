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
    $sql = "SELECT * FROM student WHERE stud_email = '$studEmail'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $studName = $row['stud_name'];
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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Font Awesome css  -->
    <link rel="stylesheet" href="../css/all.min.css">
    <!-- Google font ubuntu  -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <!-- Custom css  -->
    <link rel="stylesheet" href="../css/styles.css">
    <title>User Profile</title>
</head>

<body>
    <!-- Top Navbar  -->

    <nav class="navbar navbar-dark fixed-top flex-md-nowrap pl-5 p-0 shadow mb-5 " style=" background: linear-gradient(51deg, #16a3fe, #41faa4);">
        <div class="container-fluid">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../index.php">DLearning</a>
            <span class="text-uppercase " style="font-weight: 700; color: white; font-size: 1.3rem; letter-spacing: 1px;"><?php echo $studName; ?></span>
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
                            <a class="nav-link" href="studfeedback.php">
                                <i class="fas fa-comments"></i>
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