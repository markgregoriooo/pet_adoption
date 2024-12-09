<?php
// assoc array for adopt errors
$adoptErrors = array('username' => '', 'adoptPassword' => '');

// initialize variable for user inputs
$username = $adoptPassword = "";

// default input border color
$borderColorUsername = "border-light";
$borderColorPassw = "border-light";


if (isset($_POST['login'])) {

    // connect to database
    include('config/db_connect.php');

    // Check if username is empty
    if (empty($_POST['adopt-username'])) {
        $adoptErrors['username'] = "* Username is required";
        $borderColorUsername = "border-danger border-2";
    } else {
        $username = mysqli_real_escape_string($conn, $_POST['adopt-username']);
    }

    // Check if password is empty
    if (empty($_POST['adopt-password'])) {
        $adoptErrors['adoptPassword'] = "*A Password is required";
        $borderColorPassw = "border-danger border-2";
    } else {
        $adoptPassword = $_POST['adopt-password'];
    }
} else if (isset($_POST["signUp"])) {
    // Redirect to sign up page if 'signUp' button is clicked
    header('Location: user-signUp.php');
    exit();
}
