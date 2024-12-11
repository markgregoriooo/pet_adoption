<?php
// Check if session has already been started
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session if not already started
}
// connect to db
include('../config/db_connect.php');

if (isset($_GET['id'])) {

    $id_to_delete = htmlspecialchars(($_GET['id']));     //get id fromn the UR

    //prepare sql stmt
    $stmt = $conn->prepare("UPDATE adopted_pets 
                        INNER JOIN pets ON adopted_pets.pet_id = pets.pet_id
                        SET adopted_pets.is_deleted = TRUE, pets.is_adopted = FALSE
                        WHERE adopted_pets.adopted_pet_id = ?");

    if ($stmt) {
        //bind param
        $stmt->bind_param("i", $id_to_delete);

        // Execute the statement
        if ($stmt->execute()) {
            // success - adopted pet deleted
            echo "<script>
                        alert('Adopted Pet Deleted!');
                        window.location.href = '../pagesForCrud/crudAdoptedpets.php';
                      </script>";
        } else {
            // Error in execution
            echo "Error executing the query: " . $stmt->error;
        }
        //close the dog table insert statement
        $stmt->close();
    } else {
        // if there is/are error, roll back the transaction
        echo "Error preparing the parent insert statement: " . $stmt->error;
        exit;
    }

    // close the db connection
    $conn->close();
}
