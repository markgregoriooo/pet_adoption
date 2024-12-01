<?php

    // associative array for adoption-form errors
    $editDonatorErrors = array('fName' => '', 'emailAddress' => '', "address" => '', 'contactNo' => '', 'amount' => '', 'upload_photo' => '' );

    // var inst
    $fNameInput = $emailAddInput = $addressInput = $contactNumInput =  $amount = "";

    // default border colors
    $fNameInputBorderColor = $emailAddInputBorderColor = $addressInputBorderColor = $contactNumInputBorderColor =  $amountBorderColor = $uploadPhotoBorderColor = "border-dark";

    if(isset($_POST['edit-adopter-form-btn'])){
        
        // donator fwullname validation
        if(empty($_POST['donator-fullname'])){

            $editDonatorErrors['fName'] = "Full name is required.";
            $fNameInputBorderColor = "border-danger border-2";
        }else{

            $fNameInput = htmlspecialchars($_POST['donator-fullname']);
            // regex
            if(!preg_match("/^[a-z]{1,20}\s([a-zA-Z]{1,20}\s*)+$/i",$fNameInput)){ //input regex
                $editDonatorErrors['fName'] = "Invalid full name.";
                $fNameInputBorderColor = "border-danger border-2";
            }else{
                //change border color
                $fNameInputBorderColor = "border-success border-2";
            }
        }


        // donator email-address validation
        if(empty($_POST['donator-email-address'])){

            $editDonatorErrors['emailAddress'] = "Email Address is required.";
            $emailAddInputBorderColor = "border-danger border-2";
        }else{

            $emailAddInput = htmlspecialchars($_POST['donator-email-address']);
            // regex
            if(!filter_var($emailAddInput, FILTER_VALIDATE_EMAIL)){ //input regex
                $editDonatorErrors['emailAddress'] = "Invalid email address name.";
                $emailAddInputBorderColor = "border-danger border-2";
            }else{
                //change border color
                $emailAddInputBorderColor = "border-success border-2";
            }
        }


        // donator contact number validation
        if(empty($_POST['donator-contact'])){

            $editDonatorErrors['contactNo'] = "Contact number is required.";
            $contactNumInputBorderColor = "border-danger border-2";
        }else{

            $contactNumInput = htmlspecialchars($_POST['donator-contact']);
            // regex
            if(!preg_match("/^[0]\d{3}[-]\d{3}[-]\d{4}$/i",$contactNumInput)){ //input regex
                $editDonatorErrors['contactNo'] = "Invalid contact number format.";
                $contactNumInputBorderColor = "border-danger border-2";
            }else{
                //change border color
                $contactNumInputBorderColor = "border-success border-2";
            }
        }


        // donator donation field
        if(empty($_POST['donator-donation'])){
            $editDonatorErrors['amount'] = "Amount is required.";
            $amountBorderColor = "border-danger border-2";
        }
        
        // donator address validation
        if(empty($_POST['donator-address'])){

            $editDonatorErrors['address'] = "Address is required.";
            $addressInputBorderColor = "border-danger border-2";
        }else{

            $addressInput = htmlspecialchars($_POST['donator-address']);
            // regex
            if(!preg_match("/^([a-z]{1,10}\s*)+[,]\s*([a-z]{1,10}\s*[\w]*)+[,]\s*([a-z]{1,10}\s*)+[,]\s*([a-z]{1,10}\s*)+$/i",$addressInput)){ //input regex
                $editDonatorErrors['address'] = "Invalid address.";
                $addressInputBorderColor = "border-danger border-2";
            }else{
                //change border color
                $addressInputBorderColor = "border-success border-2";
            }
        }

        //insert PHOTO DATA VALIDATION
        if(empty($_POST['donator-photo-data'])){
            $uploadPhotoBorderColor = "border-danger border-2";
            $editDonatorErrors['upload_photo'] = "Please insert an image.";
        }

        



    
    }//end
?>