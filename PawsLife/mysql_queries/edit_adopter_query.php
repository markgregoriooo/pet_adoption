<?php 
    // Check if session has already been started
    if (session_status() == PHP_SESSION_NONE) {
        session_start(); // Start the session if not already started
    }
    // if the submit button was submitted and if there's an uploaded photo and there is no error 
    if(isset($_POST['edit-adopter-form-btn']) && isset($_FILES['adopter-photo-data']) && $_FILES['adopter-photo-data']['error'] == 0 ){

        //if there is no error in an errors array
        if(!array_filter($adoptertErrors)){

            // connect to db
            include('../config/db_connect.php');

            $adopter_id = htmlspecialchars($_SESSION['adopterID']); // get adopter id session variable
           
            //insert into ADOPTERS table
            // Get file details
            $fileTmpPath = $_FILES['adopter-photo-data']['tmp_name'];  // Temporary file path
            $fileName = $_FILES['adopter-photo-data']['name'];         // Original file name
            $fileSize = $_FILES['adopter-photo-data']['size'];         // File size in bytes
            $fileType = $_FILES['adopter-photo-data']['type'];         // MIME type of the file
            
            // Open the file and read the content
            $fileData = file_get_contents($fileTmpPath);  // Read the file data into a variable

            //prepared statemnt for inserting cats table
            $stmt = $conn->prepare("UPDATE adopters SET adopter_name = ?, adopter_email = ?, adopter_income = ?, adopter_address = ?, adopter_phone_number = ?, date_of_birth = ?, occupation = ?, gender = ?, adopter_status = ?, photo_name = ?, photo_data = ?, photo_size = ?, photo_type = ? WHERE adopter_id = ?");

            if($stmt){
                //bind param
                $stmt->bind_param("ssdssssssssiss", $fNameInput, $emailAddInput, $incomeInput, $addressInput, $contactNumInput, $dateOfBirthInput, $occupInput, $gender, $status, $fileName, $fileData, $fileSize, $fileType, $adopter_id);

                //execute the parent insert
                if(!$stmt->execute()){
                    // if there is/are error, roll back the transaction
                    echo "Error preparing the parent insert statement: " . $stmt->error;
                    exit;
                }

                //close the parent insert statement
                $stmt->close();

                //  donator updated
                echo      
                "<script>
                    alert('Adopter successfully updated!');
                    window.location.href = '../pagesForCrud/crudAdopters.php';
                </script>";
            }else{
                // if there is/are error, roll back the transaction
                echo "Error preparing the parent insert statement: " . $stmt->error;
                exit;
            }
            
            // close the db connection
            $conn->close();

        }

    }
?>