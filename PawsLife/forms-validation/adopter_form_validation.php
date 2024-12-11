<?php

// associative array for adopter-form errors
$adoptertErrors = array('fName' => '', 'emailAddress' => '', "address" => '', 'contactNo' => '', 'date_of_birth' => '', 'occupation' => '', 'income' => '', 'gender' => '', 'status' => '', 'upload_photo' => '');

// initialize variable for user inputs
$fNameInput = $emailAddInput = $addressInput = $contactNumInput =  $dateOfBirthInput = $occupInput = $incomeInput = $gender = $status = "";

// default border colors
$fNameInputBorderColor = $emailAddInputBorderColor = $addressInputBorderColor = $contactNumInputBorderColor =  $dateOfBirthInputBorderColor = $occupInputBorderColor = $uploadPhotoBorderColor = $incomeInputBorderColor = "border-dark";

// if any of these button is clicked
if (isset($_POST['adopter-form-btn']) || isset($_POST['cat-adoption-form-btn']) || isset($_POST['dog-adopt-form-btn']) || isset($_POST['edit-adopter-form-btn'])) {

    // adopter fwullname validation
    if (empty($_POST['adopter-fullname'])) {

        $adoptertErrors['fName'] = "Full name is required.";
        $fNameInputBorderColor = "border-danger border-2";
    } else {

        $fNameInput = htmlspecialchars($_POST['adopter-fullname']);
        // regex
        if (!preg_match("/^[a-z]{1,20}\s([a-zA-Z]{1,20}\s*)+$/i", $fNameInput)) { //regex for fullname
            $adoptertErrors['fName'] = "Invalid full name.";
            $fNameInputBorderColor = "border-danger border-2";
        } else {
            //change border color
            $fNameInputBorderColor = "border-success border-2";
        }
    }


    // adopter email-address validation
    if (empty($_POST['adopter-email-address'])) {

        $adoptertErrors['emailAddress'] = "Email Address is required.";
        $emailAddInputBorderColor = "border-danger border-2";
    } else {

        $emailAddInput = htmlspecialchars($_POST['adopter-email-address']);
        // regex
        if (!filter_var($emailAddInput, FILTER_VALIDATE_EMAIL)) { // regex for email
            $adoptertErrors['emailAddress'] = "Invalid email address name.";
            $emailAddInputBorderColor = "border-danger border-2";
        } else {
            //change border color
            $emailAddInputBorderColor = "border-success border-2";
        }
    }

    // adopter address validation
    if (empty($_POST['adopter-address'])) {

        $adoptertErrors['address'] = "Address is required.";
        $addressInputBorderColor = "border-danger border-2";
    } else {

        $addressInput = htmlspecialchars($_POST['adopter-address']);
        // regex
        if (!preg_match("/^([a-z]{1,10}\s*)+[,]\s*([a-z]{1,10}\s*[\w]*)+[,]\s*([a-z]{1,10}\s*)+[,]\s*([a-z]{1,10}\s*)+$/i", $addressInput)) { //regext for address
            $adoptertErrors['address'] = "Invalid address.";
            $addressInputBorderColor = "border-danger border-2";
        } else {
            //change border color
            $addressInputBorderColor = "border-success border-2";
        }
    }

    // adopter contact number validation
    if (empty($_POST['adopter-contact'])) {

        $adoptertErrors['contactNo'] = "Contact number is required.";
        $contactNumInputBorderColor = "border-danger border-2";
    } else {

        $contactNumInput = htmlspecialchars($_POST['adopter-contact']);
        // regex
        if (!preg_match("/^[0]\d{3}[-]\d{3}[-]\d{4}$/i", $contactNumInput)) { //regec for contact no.
            $adoptertErrors['contactNo'] = "Invalid contact number format.";
            $contactNumInputBorderColor = "border-danger border-2";
        } else {
            //change border color
            $contactNumInputBorderColor = "border-success border-2";
        }
    }

    // adopter date-of-birth validation
    if (empty($_POST['adopter-date_of_birth'])) {

        $adoptertErrors['date_of_birth'] = "Date of Birth is required.";
        $dateOfBirthInputBorderColor = "border-danger border-2";
    } else {

        $dateOfBirthInput = htmlspecialchars($_POST['adopter-date_of_birth']);
        // regex
        if (!preg_match("/^\d{4}[-]\d{2}[-]\d{2}$/i", $dateOfBirthInput)) { //regex for date of birth
            $adoptertErrors['date_of_birth'] = "Invalid Date of Birth.";
            $dateOfBirthInputBorderColor = "border-danger border-2";
        } else {
            //change border color
            $dateOfBirthInputBorderColor = "border-success border-2";
        }
    }

    // adopter occupation validation
    if (!empty($_POST['adopter-occupation'])) {

        $occupInput = htmlspecialchars($_POST['adopter-occupation']);
        // regex
        if (!preg_match("/^([a-z]{1,30}\s*)+$/i", $occupInput)) { //regex for occupation
            $adoptertErrors['occupation'] = "Invalid occupation.";
            $occupInputBorderColor = "border-danger border-2";
        } else {
            //change border color
            $occupInputBorderColor = "border-success border-2";
        }
    }

    // validate income field
    if (!empty($_POST['adopter-income'])) {
        $incomeInput = htmlspecialchars($_POST['adopter-income']);
        $incomeInputBorderColor =  "border-success border-2";
    }

    // validate gender field
    if (!empty($_POST['adopterGender'])) {
        $gender = htmlspecialchars($_POST['adopterGender']);
    }

    // validate status field
    if (!empty($_POST['adopterStatus'])) {

        $status = htmlspecialchars($_POST['adopterStatus']);
    }
} //end
