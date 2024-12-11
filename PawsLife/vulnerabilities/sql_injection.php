<?php
$usernameInput = $passwordInput = ""; // variable initialization
//connect to db
include('../config/db_connect.php');

// check if the form is submitted
if (isset($_POST['login'])) {
    $usernameInput = $_POST['admin-username'];  //store the inputted username in var username in var without using htmlspecialchar 

    $passwordInput = $_POST['admin-password']; //store the inputted password in var without using htmlspecialchar function

    // store in database
    $sql = "INSERT INTO admin_user (username, password) VALUES ('$usernameInput', '$passwordInput')";

    // Redirect to admin page
    echo "<script>
        alert('Welcome, Admin!');
        window.location.href = 'admin.php'; 
        </script>";
    exit();
}
