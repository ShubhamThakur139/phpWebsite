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
    <!-- Custom CSS  -->
    <link rel="stylesheet" href="../css/adminStyle.css">
    <!-- font awesome icon 5 version  -->
    <script src="https://kit.fontawesome.com/8ffa9bfb55.js" crossorigin="anonymous"></script>
    <title>Admin Dashboard</title>
</head>

<body>
    <!-- Top navbar  -->
    <nav class="navbar navbar-dark  p-0 shadow" style="background-color: #225470;">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" style="color: #FFF;" href="Dashboard.php">DLearning <small style="color: #E7E7E7;">Admin Area</small></a>
    </nav>

    <!-- Sidebar  -->
    <div class="container-fluid mb-5">
        <div class="row">

            <nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="Dashboard.php"><i class="fas fa-vote-yea"></i>Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Courses.php"><i class="fas fa-tachometer-alt"></i>Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Lessons.php"><i class="fas fa-tachometer-alt"></i>Lessons</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="students.php"><i class="fas fa-users"></i>Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=""><i class="fas fa-table"></i>Sell Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=""><i class="fas fa-rupee-sign"></i>Payment Status</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="adminFeedback.php"><i class="fas fa-comment"></i>Feedback</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="adminChangePass.php" name="admChngPass"><i class="fas fa-key"></i>Change Password</a>
                        </li>
                            <li class="nav-item">
                            <a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
                        </li>
                        
                    </ul>
                </div>
            </nav>