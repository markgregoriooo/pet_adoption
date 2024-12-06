<?php
    // Check if session has already been started
    if (session_status() == PHP_SESSION_NONE) {
        session_start(); // Start the session if not already started
    }
    // if the submit button was submitted and if there's an uploaded photo and there is no error 
    if(isset($_FILES['adopter_photo']) && $_FILES['adopter_photo']['error'] == 0 ){

        //if there is no error in an errors array
        if(!array_filter($adoptertErrors)){

                // connect to db
                include('config/db_connect.php');

                // Get file details
                $fileTmpPath = $_FILES['adopter_photo']['tmp_name'];  // Temporary file path
                $fileName = $_FILES['adopter_photo']['name'];         // Original file name
                $fileSize = $_FILES['adopter_photo']['size'];         // File size in bytes
                $fileType = $_FILES['adopter_photo']['type'];         // MIME type of the file
                
                // Open the file and read the content
                $fileData = file_get_contents($fileTmpPath);  // Read the file data into a variable

                //begin a transaction to ensure both inserts are successful
                $conn->begin_transaction();

                //store pet id and cat id session var
                $dog_id = mysqli_real_escape_string($conn, $_SESSION['dogID']);
                $pet_id = mysqli_real_escape_string($conn, $_SESSION['pet_id']);


            //insert into adopter table 
            $stmt = $conn->prepare("INSERT INTO adopters(adopter_name, adopter_email, adopter_income, adopter_address, adopter_phone_number, date_of_birth, occupation, gender, adopter_status, photo_name, photo_data, photo_size, photo_type) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            if($stmt){
                $stmt->bind_param("ssdssssssssis", $fNameInput, $emailAddInput, $addressInput, $contactNumInput, $dateOfBirthInput, $occupInput, $incomeInput, $gender, $status, $fileName, $fileData, $fileSize, $fileType);

                //execute the parent insert
                if($stmt->execute()){
                    //get the last inserted id
                    $adopter_last_inserted_id = $conn->insert_id;
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


            //prepared statement for inserting adopted pets table
            $stmt = $conn->prepare("INSERT INTO adopted_pets(pet_id, adopter_id) VALUES(?, ?)");

            if($stmt){
                //bind parameters
                $stmt->bind_param("ii", $pet_id, $adopter_last_inserted_id);

                //execute the cat table insert
                if(!$stmt->execute()){
                    //if there is an error , roll back the transsaction
                    echo "Error preparing the cat insert statement" . $conn->error;
                    $conn->rollback();
                    exit;
                }

                //close the cat table insert statement
                $stmt->close();
            }else{
                echo "Error preparing the cat insert statement" . $conn->error;
                $conn->rollback();
                exit;
            }


            //prepared statement for update adopted pets table
            $stmt = $conn->prepare("UPDATE pets SET is_adopted = 1 WHERE pet_id = ?");

            if($stmt){
                //bind parameters
                $stmt->bind_param("i", $pet_id);

                //execute the cat table insert
                if(!$stmt->execute()){
                    //if there is an error , roll back the transsaction
                    echo "Error preparing the cat insert statement" . $conn->error;
                    $conn->rollback();
                    exit;
                }

                //close the cat table insert statement
                $stmt->close();

                //  cat adopted
                echo      
                "<script>
                    alert('Dog adopted!');
                    window.location.href = '../adopt.php';
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