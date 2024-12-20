<?php
// initialize variable for user inputs
$donatorFname = $donatorEmail = $donateAmount = '';
// assoc array for donator errors
$donateErrors = array('donatorFullnameError' => '', 'donatorEmailError' => '', 'amountError' => '', 'donator_photo' => '');

// if any of these button is clicked
if (isset($_POST['donate-btn']) || isset($_POST['edit-donator-form-btn'])) {

  //check full name
  if (empty($_POST['donator-fullname'])) {
    $donateErrors['donatorFullnameError'] = "* Full Name is required";
  } else {
    $donatorFname = htmlspecialchars($_POST['donator-fullname']);
    if (!preg_match("/^[a-z]{1,20}\s([a-zA-Z]{1,20}\s*)+$/i", $donatorFname)) { //regex for donator full name
      $donateErrors['donatorFullnameError'] = "* Input a valid full name.";
    }
  }

  //check email
  if (empty($_POST['donator-email'])) {
    $donateErrors['donatorEmailError'] = "* An Email Address is required";
  } else {
    $donatorEmail = htmlspecialchars($_POST['donator-email']);
    if (!filter_var($donatorEmail, FILTER_VALIDATE_EMAIL)) {  //email validation
      $donateErrors['donatorEmailError'] = "* Email must be a valid email address";
    }
  }

  //check amount
  if (empty($_POST['donate-amount'])) {
    $donateErrors['amountError'] = "* An Amount is required. Minimum 1 PHP.";
  } else {
    $donateAmount = $_POST['donate-amount'];
  }
}
