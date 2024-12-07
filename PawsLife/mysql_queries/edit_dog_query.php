<?php 
    // Check if session has already been started
    if (session_status() == PHP_SESSION_NONE) {
        session_start(); // Start the session if not already started
    }
    // if the submit button was submitted and if there's an uploaded photo and there is no error 
    if(isset($_POST['edit-dog-form-btn']) && isset($_FILES['dog_photo']) && $_FILES['dog_photo']['error'] == 0 ){

        //if there is no error in an errors array
        if(!array_filter($dogErrors)){

            // connect to db
            include('../config/db_connect.php');

            //begin a transaction to ensure both inserts are successful
            $conn->begin_transaction();

            $dog_id = htmlspecialchars($_SESSION['dogID']); // get cat id session variable
            $pet_id = htmlspecialchars($_SESSION['pet_id_edit']); // get pet id session variable

            //prepared statemnt for inserting pets table
            $stmt = $conn->prepare("UPDATE pets SET pet_name = ?, gender = ?, age = ?, date_of_birth = ? WHERE pet_id = ?");

            if($stmt){
                // Bind parameters: assuming correct types
                $stmt->bind_param("ssssi", $dogNameInput, $dogGenderInput, $dogAgeInput, $dogDateFBirth, $pet_id);

                // Execute the update statement
                if(!$stmt->execute()){
                    // If there is an error, roll back the transaction
                    echo "Error executing the update statement: " . $stmt->error;
                    $conn->rollback();
                    exit;
                }

                // Close the statement
                $stmt->close();
            }else{
                // If the statement couldn't be prepared, roll back the transaction
                echo "Error preparing the update statement: " . $conn->error;
                $conn->rollback();
                exit;
            }

            //insert into pets table(parent) 
            // Get file details
            $fileTmpPath = $_FILES['dog_photo']['tmp_name'];  // Temporary file path
            $fileName = $_FILES['dog_photo']['name'];         // Original file name
            $fileSize = $_FILES['dog_photo']['size'];         // File size in bytes
            $fileType = $_FILES['dog_photo']['type'];         // MIME type of the file
            
            // Open the file and read the content
            $fileData = file_get_contents($fileTmpPath);  // Read the file data into a variable

            //prepared statemnt for inserting cats table
            $stmt = $conn->prepare("UPDATE dogs SET is_leash_trained = ?, dog_size = ?, photo_name = ?, photo_data = ?, photo_size = ?, photo_type = ? WHERE dog_id = ?");
            
            if($stmt){
                //bind param
                $stmt->bind_param("isssisi", $leashTrained, $dogSizeInput,  $fileName, $fileData, $fileSize, $fileType, $dog_id);

                //execute the parent insert
                if(!$stmt->execute()){
                    // if there is/are error, roll back the transaction
                    echo "Error preparing the parent insert statement: " . $stmt->error;
                    $conn->rollback();
                    exit;
                }

                //close the parent insert statement
                $stmt->close();

                // commit transaction
                $conn->commit();

                //  dog updated
                echo      
                "<script>
                    alert('Dog successfully updated!');
                    window.location.href = '../pagesForCrud/crudPet_dog.php';
                </script>";
            }else{
                // if there is/are error, roll back the transaction
                echo "Error preparing the parent insert statement: " . $stmt->error;
                $conn->rollback();
                exit;
            }

            // close the db connection
            $conn->close();

        }
    }
  
?>