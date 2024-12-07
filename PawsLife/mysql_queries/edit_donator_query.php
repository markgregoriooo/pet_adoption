<?php
    // Check if session has already been started
    if (session_status() == PHP_SESSION_NONE) {
        session_start(); // Start the session if not already started
    }
    // if the submit button was submitted and if there's an uploaded photo and there is no error 
    if(isset($_POST['edit-donator-form-btn']) && isset($_FILES['donator_photo']) && $_FILES['donator_photo']['error'] == 0 ){

        //if there is no error in an errors array
        if(!array_filter($donateErrors)){

            // connect to db
            include('../config/db_connect.php');

            $donator_id = htmlspecialchars($_SESSION['donatorID']); // get donator id session variable

            
            //insert into DONATORS table
            // Get file details
            $fileTmpPath = $_FILES['donator_photo']['tmp_name'];  // Temporary file path
            $fileName = $_FILES['donator_photo']['name'];         // Original file name
            $fileSize = $_FILES['donator_photo']['size'];         // File size in bytes
            $fileType = $_FILES['donator_photo']['type'];         // MIME type of the file
            
            // Open the file and read the content
            $fileData = file_get_contents($fileTmpPath);  // Read the file data into a variable

            //prepared statemnt for inserting cats table
            $stmt = $conn->prepare("UPDATE donators SET donator_name = ?, donator_email = ?, amount = ?, photo_name = ?, photo_data = ?, photo_size = ?, photo_type = ? WHERE donator_id = ?");

            if($stmt){
                //bind param
                $stmt->bind_param("ssdssisi", $donatorFname, $donatorEmail, $donateAmount, $fileName, $fileData, $fileSize, $fileType, $donator_id);

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
                    alert('Donator successfully updated!');
                    window.location.href = '../pagesForCrud/crudDonators.php';
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