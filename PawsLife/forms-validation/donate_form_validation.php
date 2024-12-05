<?php 
    $donatorFname = $donatorEmail = $donateAmount = '';
    $donateErrors = array('donatorFullnameError' => '', 'donatorEmailError' => '', 'amountError' => '');
    if(isset($_POST['donate-btn'])){
      
      //check full name
      if(empty($_POST['donator-fullname'])){
        $donateErrors['donatorFullnameError'] = "* Full Name is required";
      }else{
        $donatorFname = htmlspecialchars($_POST['donator-fullname']);
        if(!preg_match("/^[a-z]{1,20}\s([a-zA-Z]{1,20}\s*)+$/i", $donatorFname)){
          $donateErrors['donatorFullnameError'] = "* Input a valid full name.";
        }
      }
  
      //check email
      if(empty($_POST['donator-email'])){
        $donateErrors['donatorEmailError'] = "* An Email Address is required";
      }else{
        $donatorEmail = htmlspecialchars($_POST['donator-email']);
        if(!filter_var($donatorEmail, FILTER_VALIDATE_EMAIL)){
          $donateErrors['donatorEmailError'] = "* Email must be a valid email address";
        }
      }
  
      //check amount
      if(empty($_POST['donate-amount'])){
        $donateErrors['amountError'] = "* An Amount is required. Minimum 1 PHP.";
      }else{
        $donateAmount = htmlspecialchars($_POST['donate-amount']);
        if(!preg_match("/^\d{1,3}(?:,\d{3})*(?:\.\d{1,2})?$/ ", $donateAmount)){
          $donateErrors['amountError'] = "* Invalid format. Please enter a valid amount (e.g., 1,234.56).";
        }
      }

  
  
    }
?>