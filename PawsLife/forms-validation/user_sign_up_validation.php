<?php

// initialize variable for user inputs
$createdEmail = $username = $createdPass = $cnfrmPass = "";

// assoc array for create account errors
$createAccErrors = array("crtemailError" => "", "crtpassError" => "", "cnfrmPassError" => "", "username" => "");

//default border colors each input
$borderClrEmail = "border-light";
$borderClrPassw = "border-light";
$borderClrConPassw = "border-light";
$borderColorUsername = "border-light";

//if submit btn is clicked
if (isset($_POST["createAcc"])) {

  // connect to db
  include('config/db_connect.php');

  // created email validation
  if (empty($_POST["create-email"])) {
    $createAccErrors["crtemailError"] = "* Email address is required.";
    $borderClrEmail = " border-danger border-2";
  } else {
    $createdEmail = mysqli_real_escape_string($conn, $_POST["create-email"]); // escape esp char & store email to variable
    if (!filter_var($createdEmail, FILTER_VALIDATE_EMAIL)) {  //email validation
      $createAccErrors['crtemailError'] = "* An Email must be a valid email address";
      $borderClrEmail = " border-danger border-2";
    } else {
      $borderClrEmail = " border-primary border-2";
    }
  }

  //check username
  if (empty($_POST['create-username'])) {
    $createAccErrors['username'] = "* Username is required";
    $borderColorUsername = "border-danger border-2";
  } else {
    $username = mysqli_real_escape_string($conn, $_POST['create-username']);  // escape esp char & store username to variable
    $borderColorUsername = "border-primary border-2";
    if (!preg_match("/^[a-z]{2,15}([_]*[\d]*[a-z]*)$/i", $username)) {  //regex for username
      $createAccErrors['username'] = "* Username is invalid";
      $borderColorUsername = "border-danger border-2";
    }
  }

  // created password validation
  if (empty($_POST["create-password"])) {
    $createAccErrors["crtpassError"] = "* Password cannot be empty.";
    $borderClrPassw = " border-danger border-2";
  } else {
    $createdPass = mysqli_real_escape_string($conn, $_POST["create-password"]); // escape esp char & store password to variable
    if (!preg_match(" /^[a-z\d_]{8,}$/ ", $createdPass)) {  // regex for password. must 8 chars long.
      $createAccErrors['crtpassError'] = "* Invalid password. Must be 8 characters long.";
      $borderClrPassw = " border-danger border-2";
    } else {
      $borderClrPassw = " border-primary border-2";
    }
  }

  // confirm password validation
  if (empty($_POST["confirm-password"])) {
    $createAccErrors["cnfrmPassError"] = "* Confirm password cannot be empty.";
    $borderClrConPassw = " border-danger border-2";
  } else {
    $cnfrmPass = mysqli_real_escape_string($conn, $_POST["confirm-password"]);
    if ($cnfrmPass !== $createdPass) {
      $createAccErrors["cnfrmPassError"] = "* Passwords do not match.";
      $borderClrConPassw = " border-danger border-2";
    } else {
      $borderClrConPassw = " border-primary border-2";
    }
  }
}
