<?php

// session start if session is not start before 
if (!isset($_SESSION)) {
    session_start();
}

// isset() : The isset() function checks whether a variable is set, which means that it has to be declared and is not NULL.
// This function returns true if the variable exists and is not NULL, otherwise it returns false.

include_once('../dbConnection.php');

// Admin Login with correct fields
if (!isset($_SESSION['is_admin_login'])) {
    if (isset($_POST['adminLogin']) && isset($_POST['adminLoginEmail']) && isset($_POST['adminLoginPassword'])) {
        $adminLoginEmail = $_POST['adminLoginEmail'];
        $adminLoginPassword = $_POST['adminLoginPassword'];

        $sql = "SELECT admin_email FROM admin WHERE admin_email = '$adminLoginEmail' AND admin_pass ='$adminLoginPassword'";
        $result = $conn->query($sql);
        $row = $result->num_rows;
        if ($row === 1) {
            $_SESSION['is_admin_login'] = true;
            $_SESSION['adminLoginEmail'] = $adminLoginEmail;
            echo json_encode($row);
        } else if ($row === 0) {
            echo json_encode($row);
        }
    }
}else {
    echo json_encode("Login");
}
