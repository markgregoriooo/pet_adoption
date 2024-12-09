<?php
// associative array for cat form errors
$catErrors = array('catName' => '', 'catGender' => '', "catAge" => '', 'cat_date_of_birth' => '', 'color' => '',  'litter_trained' => '', 'indoor' => '');

// initialize variable for user inputs
$catNameInput = $catGenderInput = $catAgeInput = $catDateFBirth =  $catColorInput = $litterTrained = $indoor = "";

// default border colors
$catNameInputBorderColor = $catGenderInputBorderColor = $catAgeInputBorderColor = $catDateFBirthBorderColor =  $catColorInputBorderColor = $catPhotoInputBorderColor  = "border-dark";

// if any of these button is clicked
if (isset($_POST['editAdptdPetForm-btn']) || isset($_POST['cat-form-btn']) || isset($_POST['add-cat-form-btn']) || isset($_POST['edit-cat-form-btn'])) {

    //connect to db
    include('../config/db_connect.php');

    // cat name validation
    if (empty($_POST['cat-name'])) {

        $catErrors['catName'] = "Name is required.";
        $catNameInputBorderColor = "border-danger border-2";
    } else {

        $catNameInput = mysqli_real_escape_string($conn, $_POST['cat-name']);
        // regex
        if (!preg_match("/^[a-z]{1,20}\s*([a-z]{2,20}\s*)*$/i", $catNameInput)) { //regex for cat name
            $catErrors['catName'] = "Invalid name.";
            $catNameInputBorderColor = "border-danger border-2";
        } else {
            //change border color
            $catNameInputBorderColor = "border-success border-2";
        }
    }

    // cat gender validation
    if (empty($_POST['cat-gender'])) {

        $catErrors['catGender'] = "Gender is required.";
        $catGenderInputBorderColor = "border-danger border-2";
    } else {

        $catGenderInput = mysqli_real_escape_string($conn, $_POST['cat-gender']);
        // regex
        if (!preg_match("/^(male|female)$/i", $catGenderInput)) { //regex for gender
            $catErrors['catGender'] = "Invalid gender.";
            $catGenderInputBorderColor = "border-danger border-2";
        } else {
            //change border color
            $catGenderInputBorderColor = "border-success border-2";
        }
    }

    // cat age validation
    if (empty($_POST['cat-age'])) {

        $catErrors['catAge'] = "Age is required.";
        $catAgeInputBorderColor = "border-danger border-2";
    } else {

        $catAgeInput = mysqli_real_escape_string($conn, $_POST['cat-age']);
        // regex
        if (!preg_match("/^\d+$/i", $catAgeInput)) { //regex for age
            $catErrors['catAge'] = "Invalid gender.";
            $catAgeInputBorderColor = "border-danger border-2";
        } else {
            //change border color
            $catAgeInputBorderColor = "border-success border-2";
        }
    }

    // cat date-of-birth validation
    if (empty($_POST['cat-date-of-birth'])) {

        $catErrors['cat_date_of_birth'] = "Date of Birth is required.";
        $catDateFBirthBorderColor = "border-danger border-2";
    } else {

        $catDateFBirth = mysqli_real_escape_string($conn, $_POST['cat-date-of-birth']);
        // regex
        if (!preg_match("/^\d{4}[-]\d{2}[-]\d{2}$/i", $catDateFBirth)) { //regex for date of birth
            $catErrors['cat-date-of-birth'] = "Invalid Date of Birth.";
            $catDateFBirthBorderColor = "border-danger border-2";
        } else {
            //change border color
            $catDateFBirthBorderColor = "border-success border-2";
        }
    }

    // cat color validation
    if (empty($_POST['cat-color'])) {

        $catErrors['color'] = "Color is required.";
        $catColorInputBorderColor = "border-danger border-2";
    } else {

        $catColorInput = mysqli_real_escape_string($conn, $_POST['cat-color']);
        // regex
        if (!preg_match("/^[a-z]{1,20}\s*([a-z]{2,20}\s*)*$/i", $catColorInput)) { //regex for cat color
            $catErrors['color'] = "Invalid Color Format.";
            $catColorInputBorderColor = "border-danger border-2";
        } else {
            //change border color
            $catColorInputBorderColor = "border-success border-2";
        }
    }


    // validate litter trained field
    if (!empty($_POST['litterTrained'])) {
        $litterTrained = (bool)$_POST['litterTrained'];
    }

    // cat indoor validation
    if (!empty($_POST['isIndoor'])) {

        $indoor = (bool)$_POST['isIndoor'];
    }
} // end
