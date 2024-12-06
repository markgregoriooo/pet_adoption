<?php 
    // if the submit button was submitted and if there's an uploaded photo and there is no error
    if(isset($_POST['add-dog-form-btn']) && isset($_FILES['dog_photo']) && $_FILES['dog_photo']['error'] == 0){
        
        //if there is no error in an errors array
        if(!array_filter($dogErrors)){

            // connect to db
            include('../config/db_connect.php');

            //begin a transaction to ensure both inserts are successful
            $conn->begin_transaction();

            //insert into pets table(parent) 
            $stmt = $conn->prepare("INSERT INTO pets(pet_name, gender, age, date_of_birth) VALUES(?, ?, ?, ?)");

            if($stmt){
                $stmt->bind_param("ssis", $dogNameInput, $dogGenderInput, $dogAgeInput, $dogDateFBirth);

                //execute the parent insert
                if($stmt->execute()){
                    //get the last inserted id
                    $pet_last_inserted_id = $conn->insert_id;
                }else{
                    // if there is/are error, roll back the transaction
                    echo "Error preparing the parent insert statement: " . $stmt->error;
                    $conn->rollback();
                    exit;
                }       
                //close the parent insert statement
                $stmt->close();

            }else{
                // if there is/are error, roll back the transaction
                echo "Error preparing the parent insert statement: " . $stmt->error;
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


            //prepared statement
            $stmt = $conn->prepare("INSERT INTO dogs(pet_id, is_leash_trained, dog_size, photo_name, photo_data, photo_size, photo_type) VALUES(?, ?, ?, ?, ?, ?, ?)");

            if($stmt){
                //bind parameters
                $stmt->bind_param("iisssis", $pet_last_inserted_id, $leastTrained, $dogSizeInput, $fileName, $fileData, $fileSize, $fileType);

                //execute the cat table insert
                if(!$stmt->execute()){
                    //if there is an error , roll back the transsaction
                    echo "Error preparing the cat insert statement" . $conn->error;
                    $conn->rollback();
                    exit;
                }

                //close the cat table insert statement
                $stmt->close();

                //  dog created
                echo      
                "<script>
                    alert('Dog successfully added!');
                    window.location.href = '../pagesForCrud/crudPet_dog.php';
                </script>";
            }else{
                echo "Error preparing the cat insert statement" . $conn->error;
                $conn->rollback();
                exit;
            }

            // commit the transaction and close the db connection
            $conn->commit();
            $conn->close();
        }

    }
?>