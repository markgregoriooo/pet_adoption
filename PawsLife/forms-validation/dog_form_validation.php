<?php
    // associative array for adoption-form errors
    $dogErrors = array('dogName' => '', 'dogGender' => '', "dogAge" => '', 'dog_date_of_birth' => '', 'size' => '', 'upload_photo' => '', 'leash_trained' => '');

    // var inst
    $dogNameInput = $dogGenderInput = $dogAgeInput = $dogDateFBirth =  $dogSizeInput = $dogPhotoInput = $leashTrained =  "";

    // default border colors
    $dogNameInputBorderColor = $dogGenderInputBorderColor = $dogAgeInputBorderColor = $dogDateFBirthBorderColor =  $dogSizeInputBorderColor = $dogPhotoInputBorderColor  = "border-dark";

    if(isset($_POST['editAdptdPetForm-btn']) || isset($_POST['edit-dog-form-btn']) || isset($_POST['add-dog-form-btn']) ){

        // dog name validation
        if(empty($_POST['dog-name'])){

            $dogErrors['dogName'] = "Name is required.";
            $dogNameInputBorderColor = "border-danger border-2";
        }else{

            $dogNameInput = htmlspecialchars($_POST['dog-name']);
            // regex
            if(!preg_match("/^[a-z]{1,20}\s*([a-z]{2,20}\s*)*$/i",$dogNameInput)){ //input regex
                $dogErrors['dogName'] = "Invalid name.";
                $dogNameInputBorderColor = "border-danger border-2";
            }else{
                //change border color
                $dogNameInputBorderColor = "border-success border-2";
            }
        }

        // dog gender validation
        if(empty($_POST['dog-gender'])){

            $dogErrors['dogGender'] = "Gender is required.";
            $dogGenderInputBorderColor = "border-danger border-2";
        }else{

            $dogGenderInput = htmlspecialchars($_POST['dog-gender']);
            // regex
            if(!preg_match("/^(male|female)$/i",$dogGenderInput)){ //input regex
                $dogErrors['dogGender'] = "Invalid gender.";
                $dogGenderInputBorderColor = "border-danger border-2";
            }else{
                //change border color
                $dogGenderInputBorderColor = "border-success border-2";
            }
        }

        // dog age validation
        if(empty($_POST['dog-age'])){

            $dogErrors['dogAge'] = "Gender is required.";
            $dogAgeInputBorderColor = "border-danger border-2";
        }else{

            $dogAgeInput = htmlspecialchars($_POST['dog-age']);
            // regex
            if(!preg_match("/^\d+$/i",$dogAgeInput)){ //input regex
                $dogErrors['dogAge'] = "Invalid gender.";
                $dogAgeInputBorderColor = "border-danger border-2";
            }else{
                //change border color
                $dogAgeInputBorderColor = "border-success border-2";
            }
        }

        // dog date-of-birth validation
        if(empty($_POST['dog-date-of-birth'])){

            $dogErrors['dog_date_of_birth'] = "Date of Birth is required.";
            $dogDateFBirthBorderColor = "border-danger border-2";
        }else{

            $dogDateFBirth = htmlspecialchars($_POST['dog-date-of-birth']);
            // regex
            if(!preg_match("/^\d{4}[-]\d{2}[-]\d{2}$/i",$dogDateFBirth)){ //input regex
                $dogErrors['dog_date_of_birth'] = "Invalid Date of Birth.";
                $dogDateFBirthBorderColor = "border-danger border-2";
            }else{
                //change border color
                $dogDateFBirthBorderColor = "border-success border-2";
            }
        }

        //  dog size validation
        if(empty($_POST['dog-size'])){
            $dogErrors['size'] = "Size is required.";
            $dogSizeInputBorderColor = "border-danger border-2";
        }else{

            $dogSizeInput = htmlspecialchars($_POST['dog-size']);
            // regex
            if(!preg_match("/^(small|medium|large|extra large)$/i",$dogSizeInput)){ //input regex
                $dogErrors['size'] = "Invalid size Format.";
                $dogSizeInputBorderColor = "border-danger border-2";
            }else{
                //change border color
                $dogSizeInputBorderColor = "border-success border-2";
            }
        }

        //insert PHOTO DATA VALIDATION
        if(empty($_POST['dog_photo'])){
            $dogPhotoInputBorderColor = "border-danger border-2";
            $dogErrors['upload_photo'] = "Please insert an image.";
        }

        // validate leash trained field
        if(empty($_POST['isLeashTrained'])){
            $dogErrors['leash_trained'] = "Please select an option.";
        }


    }// end
?>