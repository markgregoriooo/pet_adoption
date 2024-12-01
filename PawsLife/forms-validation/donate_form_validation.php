<?php 
    $donatorFname = $donatorEmail = $donateAmount = $uploadPhoto = '';
    $donateErrors = array('donatorFullnameError' => '', 'donatorEmailError' => '', 'amountError' => '', 'uploadPhotoError' => '');
    if(isset($_POST['donate-btn'])){
      
      //check full name
      if(empty($_POST['donator-fullname'])){
        $donateErrors['donatorFullnameError'] = "* Full Name is required";
      }else{
        $donatorFname = $_POST['donator-fullname'];
        if(!preg_match("/^[A-Z][a-z]+(?:\s[A-Z]\.|[a-z]+)?\s[A-Z][a-z]+$/ ", $donatorFname)){
          $donateErrors['donatorFullnameError'] = "* Input a valid full name.";
        }
      }
  
      //check email
      if(empty($_POST['donator-email'])){
        $donateErrors['donatorEmailError'] = "* An Email Address is required";
      }else{
        $donatorEmail = $_POST['donator-email'];
        if(!filter_var($donatorEmail, FILTER_VALIDATE_EMAIL)){
          $donateErrors['donatorEmailError'] = "* Email must be a valid email address";
        }
      }
  
      //check amount
      if(empty($_POST['donate-amount'])){
        $donateErrors['amountError'] = "* An Amount is required. Minimum 1 PHP.";
      }else{
        $donateAmount = $_POST['donate-amount'];
        if(!preg_match("/^\d{1,3}(?:,\d{3})*(?:\.\d{1,2})?$/ ", $donateAmount)){
          $donateErrors['amountError'] = "* Invalid format. Please enter a valid amount (e.g., 1,234.56).";
        }
      }

       //insert PHOTO DATA VALIDATION
       if(empty($_POST['cat_photo'])){
        $donateErrors['uploadPhotoError'] = "* Please insert an image.";
     }

  
      if(array_filter($donateErrors)){
        // errors exist
      }else{
        header('Location: index.php');
      }
  
    } //end
?>