<?php
// associative array for dog-form errors
$dogErrors = array('dogName' => '', 'dogGender' => '', "dogAge" => '', 'dog_date_of_birth' => '', 'size' => '', 'leash_trained' => '', 'dog_photo' => '');

// initialize variable for user inputs
$dogNameInput = $dogGenderInput = $dogAgeInput = $dogDateFBirth =  $dogSizeInput  = $leashTrained =  "";

// default border colors
$dogNameInputBorderColor = $dogGenderInputBorderColor = $dogAgeInputBorderColor = $dogDateFBirthBorderColor =  $dogSizeInputBorderColor = $dogPhotoInputBorderColor  = "border-dark";

// if any of these button is clicked
if (isset($_POST['editAdptdPetForm-btn']) || isset($_POST['edit-dog-form-btn']) || isset($_POST['add-dog-form-btn'])) {

    // dog name validation
    if (empty($_POST['dog-name'])) {

        $dogErrors['dogName'] = "Name is required.";
        $dogNameInputBorderColor = "border-danger border-2";
    } else {

        $dogNameInput = htmlspecialchars($_POST['dog-name']);

        if (!preg_match("/^[a-z]{1,20}\s*([a-z]{2,20}\s*)*$/i", $dogNameInput)) { //regex for dog name
            $dogErrors['dogName'] = "Invalid name.";
            $dogNameInputBorderColor = "border-danger border-2";
        } else {
            //change border color
            $dogNameInputBorderColor = "border-success border-2";
        }
    }

    // dog gender validation
    if (empty($_POST['dog-gender'])) {

        $dogErrors['dogGender'] = "Gender is required.";
        $dogGenderInputBorderColor = "border-danger border-2";
    } else {

        $dogGenderInput = htmlspecialchars($_POST['dog-gender']);

        if (!preg_match("/^(male|female)$/i", $dogGenderInput)) { //regex for dog gender
            $dogErrors['dogGender'] = "Invalid gender.";
            $dogGenderInputBorderColor = "border-danger border-2";
        } else {
            //change border color
            $dogGenderInputBorderColor = "border-success border-2";
        }
    }

    // dog age validation
    if (empty($_POST['dog-age'])) {

        $dogErrors['dogAge'] = "Gender is required.";
        $dogAgeInputBorderColor = "border-danger border-2";
    } else {

        $dogAgeInput = htmlspecialchars($_POST['dog-age']);
        // regex
        if (!preg_match("/^\d+$/i", $dogAgeInput)) { //regex for dog age
            $dogErrors['dogAge'] = "Invalid gender.";
            $dogAgeInputBorderColor = "border-danger border-2";
        } else {
            //change border color
            $dogAgeInputBorderColor = "border-success border-2";
        }
    }

    // dog date-of-birth validation
    if (empty($_POST['dog-date-of-birth'])) {

        $dogErrors['dog_date_of_birth'] = "Date of Birth is required.";
        $dogDateFBirthBorderColor = "border-danger border-2";
    } else {

        $dogDateFBirth = htmlspecialchars($_POST['dog-date-of-birth']);
        // regex
        if (!preg_match("/^\d{4}[-]\d{2}[-]\d{2}$/i", $dogDateFBirth)) { //regex for date of birth 
            $dogErrors['dog_date_of_birth'] = "Invalid Date of Birth.";
            $dogDateFBirthBorderColor = "border-danger border-2";
        } else {
            //change border color
            $dogDateFBirthBorderColor = "border-success border-2";
        }
    }

    //  dog size validation
    if (empty($_POST['dog-size'])) {
        $dogErrors['size'] = "Size is required.";
        $dogSizeInputBorderColor = "border-danger border-2";
    } else {

        $dogSizeInput = htmlspecialchars($_POST['dog-size']);
        // regex
        if (!preg_match("/^(small|medium|large|extra large)$/i", $dogSizeInput)) { //regex for dog size
            $dogErrors['size'] = "Invalid size Format.";
            $dogSizeInputBorderColor = "border-danger border-2";
        } else {
            //change border color
            $dogSizeInputBorderColor = "border-success border-2";
        }
    }

    // validate dog photo
    if (empty($_POST['isLeashTrained'])) {
        $dogPhotoInputBorderColor = "border-danger border-2";
        $dogErrors['dog_photo'] = "Please insert a photo.";
    }


    // validate leash trained field
    if (!empty($_POST['isLeashTrained'])) {
        $leastTrained = (bool)$_POST['isLeashTrained'];
    }
} // end
