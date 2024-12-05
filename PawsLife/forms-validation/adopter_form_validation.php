<?php

    // associative array for adoption-form errors
    $adoptertErrors = array('fName' => '', 'emailAddress' => '', "address" => '', 'contactNo' => '', 'date_of_birth' => '', 'occupation' => '', 'income' => '', 'gender' => '', 'status' => '', );

    // var inst
    $fNameInput = $emailAddInput = $addressInput = $contactNumInput =  $dateOfBirthInput = $occupInput = $incomeInput = $gender = $status = "";

    // default border colors
    $fNameInputBorderColor = $emailAddInputBorderColor = $addressInputBorderColor = $contactNumInputBorderColor =  $dateOfBirthInputBorderColor = $occupInputBorderColor = $uploadPhotoBorderColor = $incomeInputBorderColor = "border-dark";

    if(isset($_POST['adopter-form-btn']) || isset($_POST['cat-adoption-form-btn']) || isset($_POST['dog-adoption-form-btn'])){
        
        // adopter fwullname validation
        if(empty($_POST['adopter-fullname'])){

            $adoptertErrors['fName'] = "Full name is required.";
            $fNameInputBorderColor = "border-danger border-2";
        }else{

            $fNameInput = htmlspecialchars($_POST['adopter-fullname']);
            // regex
            if(!preg_match("/^[a-z]{1,20}\s([a-zA-Z]{1,20}\s*)+$/i",$fNameInput)){ //input regex
                $adoptertErrors['fName'] = "Invalid full name.";
                $fNameInputBorderColor = "border-danger border-2";
            }else{
                //change border color
                $fNameInputBorderColor = "border-success border-2";
            }
        }


        // adopter email-address validation
        if(empty($_POST['adopter-email-address'])){

            $adoptertErrors['emailAddress'] = "Email Address is required.";
            $emailAddInputBorderColor = "border-danger border-2";
        }else{

            $emailAddInput = htmlspecialchars($_POST['adopter-email-address']);
            // regex
            if(!filter_var($emailAddInput, FILTER_VALIDATE_EMAIL)){ //input regex
                $adoptertErrors['emailAddress'] = "Invalid email address name.";
                $emailAddInputBorderColor = "border-danger border-2";
            }else{
                //change border color
                $emailAddInputBorderColor = "border-success border-2";
            }
        }

        // adopter address validation
        if(empty($_POST['adopter-address'])){

            $adoptertErrors['address'] = "Address is required.";
            $addressInputBorderColor = "border-danger border-2";
        }else{

            $addressInput = htmlspecialchars($_POST['adopter-address']);
            // regex
            if(!preg_match("/^([a-z]{1,10}\s*)+[,]\s*([a-z]{1,10}\s*[\w]*)+[,]\s*([a-z]{1,10}\s*)+[,]\s*([a-z]{1,10}\s*)+$/i",$addressInput)){ //input regex
                $adoptertErrors['address'] = "Invalid address.";
                $addressInputBorderColor = "border-danger border-2";
            }else{
                //change border color
                $addressInputBorderColor = "border-success border-2";
            }
        }

        // adopter contact number validation
        if(empty($_POST['adopter-contact'])){

            $adoptertErrors['contactNo'] = "Contact number is required.";
            $contactNumInputBorderColor = "border-danger border-2";
        }else{

            $contactNumInput = htmlspecialchars($_POST['adopter-contact']);
            // regex
            if(!preg_match("/^[0]\d{3}[-]\d{3}[-]\d{4}$/i",$contactNumInput)){ //input regex
                $adoptertErrors['contactNo'] = "Invalid contact number format.";
                $contactNumInputBorderColor = "border-danger border-2";
            }else{
                //change border color
                $contactNumInputBorderColor = "border-success border-2";
            }
        }

        // adopter date-of-birth validation
        if(empty($_POST['adopter-date_of_birth'])){

            $adoptertErrors['date_of_birth'] = "Date of Birth is required.";
            $dateOfBirthInputBorderColor = "border-danger border-2";
        }else{

            $dateOfBirthInput = htmlspecialchars($_POST['adopter-date_of_birth']);
            // regex
            if(!preg_match("/^\d{4}[-]\d{2}[-]\d{2}$/i",$dateOfBirthInput)){ //input regex
                $adoptertErrors['date_of_birth'] = "Invalid Date of Birth.";
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
                $adoptertErrors['occupation'] = "Invalid occupation.";
                $occupInputBorderColor = "border-danger border-2";
            }else{
                //change border color
                $occupInputBorderColor = "border-success border-2";
            }
        }


        // validate gender field
        if(!empty($_POST['adopterGender'])){
            $gender = htmlspecialchars($_POST['adopterGender']);
        }

        // cat status field
        if(!empty($_POST['adopterStatus'])){

            $status = htmlspecialchars($_POST['adopterStatus']);
        }


       

    
    }//end
?>