<?php 
    if(isset($_POST['add-cat-form-btn']) && isset($_FILES['cat_photo']) && $_FILES['cat_photo']['error'] == 0 ){

        // connect to db
        include('../config/db_connect.php');

        //begin a transaction to ensure both inserts are successful
        $conn->begin_transaction();

        //insert into pets table(parent) 
        $stmt = $conn->prepare("INSERT INTO pets(pet_name, gender, age, date_of_birth) VALUES(?, ?, ?, ?)");

        if($stmt){
            $stmt->bind_param("ssis", $catNameInput, $catGenderInput, $catAgeInput, $catDateFBirth);

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


        //insert into cats table(child) 
        // Get file details
        $fileTmpPath = $_FILES['cat_photo']['tmp_name'];  // Temporary file path
        $fileName = $_FILES['cat_photo']['name'];         // Original file name
        $fileSize = $_FILES['cat_photo']['size'];         // File size in bytes
        $fileType = $_FILES['cat_photo']['type'];         // MIME type of the file
        
        // Open the file and read the content
        $fileData = file_get_contents($fileTmpPath);  // Read the file data into a variable

        //prepared statement
        $stmt = $conn->prepare("INSERT INTO cats(pet_id, color, litter_trained, is_indoor, photo_name, photo_data, photo_size, photo_type) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");

        if($stmt){
            //bind parameters
            $stmt->bind_param("isiissis", $pet_last_inserted_id, $catColorInput, $litterTrained, $indoor, $fileName, $fileData, $fileSize, $fileType);

            //execute the cat table insert
            if(!$stmt->execute()){
                //if there is an error , roll back the transsaction
                echo "Error preparing the cat insert statement" . $conn->error;
                $conn->rollback();
                exit;
            }

            //close the cat table insert statement
            $stmt->close();

            //  account created
            echo      
            "<script>
                alert('Cat successfully added!');
                window.location.href = '../pagesForCrud/crudPet_cat.php';
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
  
?>