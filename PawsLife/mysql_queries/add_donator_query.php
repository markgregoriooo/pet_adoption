<?php
// if the submit button was submitted and if there's an uploaded photo and there is no error 
if (isset($_FILES['donator_photo']) && $_FILES['donator_photo']['error'] == 0) {

    //if there is no error in an errors array
    if (!array_filter($donateErrors)) {

        // connect to db
        include('config/db_connect.php');

        //begin a transaction to ensure both inserts are successful
        $conn->begin_transaction();

        //insert into donator tablea    
        // Get file details
        $fileTmpPath = $_FILES['donator_photo']['tmp_name'];  // Temporary file path
        $fileName = $_FILES['donator_photo']['name'];         // Original file name
        $fileSize = $_FILES['donator_photo']['size'];         // File size in bytes
        $fileType = $_FILES['donator_photo']['type'];         // MIME type of the file

        // Open the file and read the content
        $fileData = file_get_contents($fileTmpPath);  // Read the file data into a variable

        //insert into donators table
        $stmt = $conn->prepare("INSERT INTO donators(donator_name, donator_email, amount, photo_name, photo_data, photo_size, photo_type) VALUES(?, ?, ?, ?, ?, ?, ?)");

        if ($stmt) {
            $stmt->bind_param("ssdssis", $donatorFname, $donatorEmail, $donateAmount, $fileName, $fileData, $fileSize, $fileType);

            //execute the stmt insert
            if (!$stmt->execute()) {
                // if there is/are error, roll back the transaction
                echo "Error preparing the parent insert statement: " . $stmt->error;
                $conn->rollback();
                exit;
            }

            $donator_id = $conn->insert_id; // get last inserted donator id
            //close the donator insert statement
            $stmt->close();
        } else {
            // if there is/are error, roll back the transaction
            echo "Error preparing the parent insert statement: " . $stmt->error;
            $conn->rollback();
            exit;
        }


        //insert into donations table
        $stmt = $conn->prepare("INSERT INTO donations(donator_id, total) VALUES(?, 0 )");

        if ($stmt) {
            $stmt->bind_param("i", $donator_id);

            //execute the stmt insert
            if (!$stmt->execute()) {
                // if there is/are error, roll back the transaction
                echo "Error preparing the parent insert statement: " . $stmt->error;
                $conn->rollback();
                exit;
            }

            // commit transaction
            $conn->commit();

            //  donated and inserted new donator 
            echo
            "<script>
                    alert('Thank you for your donation.');
                    window.location.href = 'donate.php';
                </script>";
            // close the db connection
            $conn->close();
        } else {
            // if there is/are error, roll back the transaction
            echo "Error preparing the parent insert statement: " . $stmt->error;
            $conn->rollback();
            exit;
        }
    }
}
