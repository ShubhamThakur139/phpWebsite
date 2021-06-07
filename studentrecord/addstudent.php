<?php

// session start if session is not start before 
if (!isset($_SESSION)) {
    session_start();
}

// isset() : The isset() function checks whether a variable is set, which means that it has to be declared and is not NULL.
// This function returns true if the variable exists and is not NULL, otherwise it returns false.

include_once('../dbConnection.php');

// Checking Email Already exists 
if (isset($_POST['checkemail']) && isset($_POST['studSignUpEmail'])) {
    $studSignUpEmail = $_POST['studSignUpEmail'];
    $sql = "SELECT stud_email FROM student WHERE stud_email = '$studSignUpEmail'";
    $result = $conn->query($sql);
    $row = $result->num_rows;
    echo json_encode($row);
}

// Insert Student details in Table or Database  
if (isset($_POST['studSignUp']) && isset($_POST['studSignUpName']) && isset($_POST['studSignUpEmail']) && isset($_POST['studSignUpPassword'])) {

    $studSignUpName = $_POST['studSignUpName'];
    $studSignUpEmail = $_POST['studSignUpEmail'];
    $studSignUpPassword = $_POST['studSignUpPassword'];

    $sql = "INSERT INTO student(stud_name, stud_email, stud_pass) VALUES ('$studSignUpName', '$studSignUpEmail', '$studSignUpPassword')";

    if ($conn->query($sql) == TRUE) {
        echo json_encode("OK");
    } else {
        echo json_encode("Failed");
    }
}

// Login student while verifying user exists or not
if (!isset($_SESSION['is_login'])) {
    if (isset($_POST['studLoginUp']) && isset($_POST['studLoginEmail']) && isset($_POST['studLoginPassword'])) {
        $studLoginEmail = $_POST['studLoginEmail'];
        $studLoginPassword = $_POST['studLoginPassword'];

        $sql = "SELECT stud_email FROM student WHERE stud_email = '$studLoginEmail' AND stud_pass = '$studLoginPassword'";
        $result = $conn->query($sql);
        $row = $result->num_rows;
        // echo json_encode($row);
        if ($row === 1) {
            $_SESSION['is_login'] = true;
            $_SESSION['studLoginEmail'] = $studLoginEmail;
            echo json_encode($row);
        } else if ($row === 0) {
            echo json_encode($row);
        }
    }
}
?>