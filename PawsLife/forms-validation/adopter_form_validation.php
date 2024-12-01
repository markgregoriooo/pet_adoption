<?php

    // associative array for adoption-form errors
    $editAdoptertErrors = array('fName' => '', 'emailAddress' => '', "address" => '', 'contactNo' => '', 'date_of_birth' => '', 'occupation' => '', 'income' => '', 'upload_photo' => '', 'gender' => '', 'status' => '', );

    // var inst
    $fNameInput = $emailAddInput = $addressInput = $contactNumInput =  $dateOfBirthInput = $occupInput = $incomeInput = "";

    // default border colors
    $fNameInputBorderColor = $emailAddInputBorderColor = $addressInputBorderColor = $contactNumInputBorderColor =  $dateOfBirthInputBorderColor = $occupInputBorderColor = $uploadPhotoBorderColor = "border-dark";

    if(isset($_POST['edit-adopter-form-btn'])){
        
        // adopter fwullname validation
        if(empty($_POST['adopter-fullname'])){

            $editAdoptertErrors['fName'] = "Full name is required.";
            $fNameInputBorderColor = "border-danger border-2";
        }else{

            $fNameInput = htmlspecialchars($_POST['adopter-fullname']);
            // regex
            if(!preg_match("/^[a-z]{1,20}\s([a-zA-Z]{1,20}\s*)+$/i",$fNameInput)){ //input regex
                $editAdoptertErrors['fName'] = "Invalid full name.";
                $fNameInputBorderColor = "border-danger border-2";
            }else{
                //change border color
                $fNameInputBorderColor = "border-success border-2";
            }
        }


        // adopter email-address validation
        if(empty($_POST['adopter-email-address'])){

            $editAdoptertErrors['emailAddress'] = "Email Address is required.";
            $emailAddInputBorderColor = "border-danger border-2";
        }else{

            $emailAddInput = htmlspecialchars($_POST['adopter-email-address']);
            // regex
            if(!filter_var($emailAddInput, FILTER_VALIDATE_EMAIL)){ //input regex
                $editAdoptertErrors['emailAddress'] = "Invalid email address name.";
                $emailAddInputBorderColor = "border-danger border-2";
            }else{
                //change border color
                $emailAddInputBorderColor = "border-success border-2";
            }
        }

        // adopter address validation
        if(empty($_POST['adopter-address'])){

            $editAdoptertErrors['address'] = "Address is required.";
            $addressInputBorderColor = "border-danger border-2";
        }else{

            $addressInput = htmlspecialchars($_POST['adopter-address']);
            // regex
            if(!preg_match("/^([a-z]{1,10}\s*)+[,]\s*([a-z]{1,10}\s*[\w]*)+[,]\s*([a-z]{1,10}\s*)+[,]\s*([a-z]{1,10}\s*)+$/i",$addressInput)){ //input regex
                $editAdoptertErrors['address'] = "Invalid address.";
                $addressInputBorderColor = "border-danger border-2";
            }else{
                //change border color
                $addressInputBorderColor = "border-success border-2";
            }
        }

        // adopter contact number validation
        if(empty($_POST['adopter-contact'])){

            $editAdoptertErrors['contactNo'] = "Contact number is required.";
            $contactNumInputBorderColor = "border-danger border-2";
        }else{

            $contactNumInput = htmlspecialchars($_POST['adopter-contact']);
            // regex
            if(!preg_match("/^[0]\d{3}[-]\d{3}[-]\d{4}$/i",$contactNumInput)){ //input regex
                $editAdoptertErrors['contactNo'] = "Invalid contact number format.";
                $contactNumInputBorderColor = "border-danger border-2";
            }else{
                //change border color
                $contactNumInputBorderColor = "border-success border-2";
            }
        }

        // adopter date-of-birth validation
        if(empty($_POST['adopter-date_of_birth'])){

            $editAdoptertErrors['date_of_birth'] = "Date of Birth is required.";
            $dateOfBirthInputBorderColor = "border-danger border-2";
        }else{

            $dateOfBirthInput = htmlspecialchars($_POST['adopter-date_of_birth']);
            // regex
            if(!preg_match("/^\d{4}[-]\d{2}[-]\d{2}$/i",$dateOfBirthInput)){ //input regex
                $editAdoptertErrors['date_of_birth'] = "Invalid Date of Birth.";
                $dateOfBirthInputBorderColor = "border-danger border-2";
            }else{
                //change border color
                $dateOfBirthInputBorderColor = "border-success border-2";
            }
        }

        // adopter occupation validation
        if(!empty($_POST['adopter-occupation'])){

            $occupInput = htmlspecialchars($_POST['adopter-occupation']);
            // regex
            if(!preg_match("/^([a-z]{1,30}\s*)+$/i",$occupInput)){ //input regex
                $editAdoptertErrors['occupation'] = "Invalid occupation.";
                $occupInputBorderColor = "border-danger border-2";
            }else{
                //change border color
                $occupInputBorderColor = "border-success border-2";
            }
        }

         //insert PHOTO DATA VALIDATION
         if(empty($_POST['adopter-photo-data'])){
            $uploadPhotoBorderColor = "border-danger border-2";
            $editAdoptertErrors['upload_photo'] = "Please insert an image.";
        }

        // validate gender field
        if(empty($_POST['editAdopterGender'])){
            $editAdoptertErrors['gender'] = "Please select an option.";
        }

        // cat status field
        if(empty($_POST['editAdopterStatus'])){

            $editAdoptertErrors['status'] = "Please select an option.";
        }




    
    }//end
?>