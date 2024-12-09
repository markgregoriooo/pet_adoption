<?php
// Check if session has already been started
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session if not
}
// if the submit button was submitted and if there's an uploaded photo and there is no error 
if (isset($_POST['edit-cat-form-btn']) && isset($_FILES['cat_photo']) && $_FILES['cat_photo']['error'] == 0) {

    //if there is no error in an errors array
    if (!array_filter($catErrors)) {

        // connect to db
        include('../config/db_connect.php');

        //begin a transaction to ensure both inserts are successful
        $conn->begin_transaction();

        $cat_id = htmlspecialchars($_SESSION['catID']); // get cat id session variable
        $pet_id = htmlspecialchars($_SESSION['pet_id_edit']); // get pet id session variable

        //prepare sql statement
        $stmt = $conn->prepare("UPDATE pets SET pet_name = ?, gender = ?, age = ?, date_of_birth = ? WHERE pet_id = ?");

        if ($stmt) {
            // bind parameters
            $stmt->bind_param("ssssi", $catNameInput, $catGenderInput, $catAgeInput, $catDateFBirth, $pet_id);

            // execute
            if (!$stmt->execute()) {
                // If there is an error, roll back the transaction
                echo "Error executing the update statement: " . $stmt->error;
                $conn->rollback();
                exit;
            }

            // Close the statement
            $stmt->close();
        } else {
            // If the statement couldn't be prepared, roll back the transaction
            echo "Error preparing the update statement: " . $conn->error;
            $conn->rollback();
            exit;
        }

        // Get file details
        $fileTmpPath = $_FILES['cat_photo']['tmp_name'];  // Temporary file path
        $fileName = $_FILES['cat_photo']['name'];         // Original file name
        $fileSize = $_FILES['cat_photo']['size'];         // File size in bytes
        $fileType = $_FILES['cat_photo']['type'];         // MIME type of the file

        // Open the file and read the content
        $fileData = file_get_contents($fileTmpPath);  // Read the file data into a variable

        //prepare sql stmt
        $stmt = $conn->prepare("UPDATE cats SET color = ?, litter_trained = ?, is_indoor = ?, photo_name = ?, photo_data = ?, photo_size = ?, photo_type = ? WHERE cat_id = ?");

        if ($stmt) {
            //bind param
            $stmt->bind_param("siissisi", $catColorInput, $litterTrained, $indoor, $fileName, $fileData, $fileSize, $fileType, $cat_id);

            //execute 
            if (!$stmt->execute()) {
                // if there is/are error, roll back the transaction
                echo "Error preparing statement: " . $stmt->error;
                $conn->rollback();
                exit;
            }

            //close stmt
            $stmt->close();

            // commit transaction
            $conn->commit();

            //  cat updated, redirect to other page
            echo
            "<script>
                    alert('Cat successfully updated!');
                    window.location.href = '../pagesForCrud/crudPet_cat.php';
                </script>";
        } else {
            // if there is/are error, roll back the transaction
            echo "Error preparing statement: " . $stmt->error;
            $conn->rollback();
            exit;
        }

        // close the db connection
        $conn->close();
    }
}
