<?php 
    // associative array for adoption-form errors
    $AdoptionFormErrors = array('fName' => '', 'emailAddress' => '', "address" => '', 'contactNo' => '', 'date_of_birth' => '', 'occupation' => '', 'income' => '', 'upload_photo' => '', 'gender' => '', 'status' => '', );

    // var inst
    $fNameInput = $emailAddInput = $addressInput = $contactNumInput =  $dateOfBirthInput = $occupInput = $incomeInput = "";

    // default border colors
    $fNameInputBorderColor = $emailAddInputBorderColor = $addressInputBorderColor = $contactNumInputBorderColor =  $dateOfBirthInputBorderColor = $occupInputBorderColor = $incomeInputBorderColor = $uploadPhotoBorderColor = "border-dark";

    if(isset($_POST['adoption-form-btn'])){
        
        // adopter fwullname validation
        if(empty($_POST['adopter-fullname'])){

            $AdoptionFormErrors['fName'] = "Full name is required.";
            $fNameInputBorderColor = "border-danger border-2";
        }else{

            $fNameInput = htmlspecialchars($_POST['adopter-fullname']);
            // regex
            if(!preg_match("//input regex",$fNameInput)){ //input regex
                $AdoptionFormErrors['fName'] = "Invalid full name.";
                $fNameInputBorderColor = "border-danger border-2";
            }else{
                //change border color
                $fNameInputBorderColor = "border-success border-2";
            }
        }


        // adopter email-address validation
        if(empty($_POST['adopter-email-address'])){

            $AdoptionFormErrors['emailAddress'] = "Email Address is required.";
            $emailAddInputBorderColor = "border-danger border-2";
        }else{

            $emailAddInput = htmlspecialchars($_POST['adopter-email-address']);
            // regex
            if(!preg_match("//input regex",$emailAddInput)){ //input regex
                $AdoptionFormErrors['emailAddress'] = "Invalid email address name.";
                $emailAddInputBorderColor = "border-danger border-2";
            }else{
                //change border color
                $emailAddInputBorderColor = "border-success border-2";
            }
        }

        // adopter address validation
        if(empty($_POST['adopter-address'])){

            $AdoptionFormErrors['address'] = "Address is required.";
            $addressInputBorderColor = "border-danger border-2";
        }else{

            $addressInput = htmlspecialchars($_POST['adopter-address']);
            // regex
            if(!preg_match("//input regex",$addressInput)){ //input regex
                $AdoptionFormErrors['emailAddress'] = "Invalid address.";
                $addressInputBorderColor = "border-danger border-2";
            }else{
                //change border color
                $addressInputBorderColor = "border-success border-2";
            }
        }

        // adopter contact number validation
        if(empty($_POST['adopter-contact'])){

            $AdoptionFormErrors['contactNo'] = "Contact number is required.";
            $contactNumInputBorderColor = "border-danger border-2";
        }else{

            $contactNumInput = htmlspecialchars($_POST['adopter-contact']);
            // regex
            if(!preg_match("//input regex",$contactNumInput)){ //input regex
                $AdoptionFormErrors['contactNo'] = "Invalid contact number.";
                $contactNumInputBorderColor = "border-danger border-2";
            }else{
                //change border color
                $contactNumInputBorderColor = "border-success border-2";
            }
        }

        // adopter date-of-birth validation
        if(empty($_POST['adopter-date_of_birth'])){

            $AdoptionFormErrors['date_of_birth'] = "Date of Birth is required.";
            $dateOfBirthInputBorderColor = "border-danger border-2";
        }else{

            $dateOfBirthInput = htmlspecialchars($_POST['adopter-date_of_birth']);
            // regex
            if(!preg_match("//input regex",$dateOfBirthInput)){ //input regex
                $AdoptionFormErrors['date_of_birth'] = "Invalid Date of Birth.";
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
            if(!preg_match("//input regex",$occupInput)){ //input regex
                $AdoptionFormErrors['occupation'] = "Invalid occupation format.";
                $occupInputBorderColor = "border-danger border-2";
            }else{
                //change border color
                $occupInputBorderColor = "border-success border-2";
            }
        }

        // adopter income validation
        if(!empty($_POST['adopter-income'])){

            $incomeInput = htmlspecialchars($_POST['adopter-income']);
            // regex
            if(!preg_match("//input regex",$incomeInput)){ //input regex
                $AdoptionFormErrors['income'] = "Invalid income format.";
                $incomeInputBorderColor = "border-danger border-2";
            }else{
                //change border color
                $incomeInputBorderColor = "border-success border-2";
            }
        }

        // upload photo validation
        if(empty($_POST['adopter_photo'])){
            $uploadPhotoBorderColor = "border-danger border-2";
            $AdoptionFormErrors['upload_photo'] = "Please insert an image.";
        }

    }//end
   
        // for dog or cat adoption
    // if($_POST['for-cat-adoption']){
    //     echo "<script>  alert('Cat');</script>";
    // }elseif($_POST['for-dog-adoption']){
    //     echo "<script>  alert('Dog');</script>";
    // }
?>