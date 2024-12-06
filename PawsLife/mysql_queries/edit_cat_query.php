<?php 

    // if the submit button was submitted and if there's an uploaded photo and there is no error 
    if(isset($_POST['edit-cat-form-btn']) && isset($_FILES['cat_photo']) && $_FILES['cat_photo']['error'] == 0 ){

        //if there is no error in an errors array
        if(!array_filter($catErrors)){

            // connect to db
            include('../config/db_connect.php');

            //begin a transaction to ensure both inserts are successful
            $conn->begin_transaction();

            $cat_id = htmlspecialchars($_SESSION['catID']); // get cat id session variable
            $pet_id = htmlspecialchars($_SESSION['pet_id-edit']); // get pet id session variable

            //prepared statemnt for inserting pets table
            $stmt = $conn->prepare("UPDATE pets SET pet_name = ?, gender = ?, age = ?, date_of_birth = ? WHERE pet_id = ?");

            if($stmt){
                //bind param
                $stmt->bind_param("ssssi", $catNameInput, $catGenderInput, $catAgeInput, $catDateFBirth, $pet_id);

                //execute the parent insert
                if(!$stmt->execute()){
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
            $fileTmpPath = $_FILES['cat_photo']['tmp_name'];  // Temporary file path
            $fileName = $_FILES['cat_photo']['name'];         // Original file name
            $fileSize = $_FILES['cat_photo']['size'];         // File size in bytes
            $fileType = $_FILES['cat_photo']['type'];         // MIME type of the file
            
            // Open the file and read the content
            $fileData = file_get_contents($fileTmpPath);  // Read the file data into a variable

            //prepared statemnt for inserting cats table
            $stmt = $conn->prepare("UPDATE cats SET color = ?, litter_trained = ?, is_indoor = ?, photo_name = ?, photo_data = ?, photo_size = ?, photo_type = ? WHERE cat_id = ?");

            if($stmt){
                //bind param
                $stmt->bind_param("siissisi", $catColorInput, $litterTrained, $indoor, $fileName, $fileData, $fileSize, $fileType, $cat_id);

                //execute the parent insert
                if(!$stmt->execute()){
                    // if there is/are error, roll back the transaction
                    echo "Error preparing the parent insert statement: " . $stmt->error;
                    $conn->rollback();
                    exit;
                }

                //close the parent insert statement
                $stmt->close();

                //  cat updated
                echo      
                "<script>
                    alert('Cat successfully updated!');
                    window.location.href = '../pagesForCrud/crudPet_cat.php';
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

