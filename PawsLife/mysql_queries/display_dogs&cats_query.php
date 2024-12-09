<?php

// connect to db
include('config/db_connect.php');

//begin a transaction to ensure both inserts are successful
$conn->begin_transaction();

//select into cats
//prepared statement for select cats table
$stmt = $conn->prepare("SELECT * FROM cats INNER JOIN pets ON cats.pet_id = pets.pet_id WHERE pets.is_deleted = FALSE AND pets.is_adopted = FALSE ORDER BY pets.created_at");

//execute
if (!$stmt->execute()) {
     // if there is/are error, roll back the transaction
     echo "Error preparing the parent insert statement: " . $stmt->error;
     $conn->rollback();
     exit;
}
//get the result
$result = $stmt->get_result();
// fetch the resulting rows as an array
$cats = $result->fetch_all(MYSQLI_ASSOC);
// Close the statement 
$stmt->close();

//select into dogs
//prepared statement for dogs table
$stmt = $conn->prepare("SELECT *
    FROM dogs INNER JOIN pets ON dogs.pet_id = pets.pet_id 
    WHERE pets.is_deleted = FALSE AND pets.is_adopted = FALSE
    ORDER BY pets.created_at");

//execute
if (!$stmt->execute()) {
     // if there is/are error, roll back the transaction
     echo "Error preparing the parent insert statement: " . $stmt->error;
     $conn->rollback();
     exit;
}
//get the result
$result = $stmt->get_result();
// fetch the resulting rows as an array
$dogs = $result->fetch_all(MYSQLI_ASSOC);

// Close the statement
$stmt->close();
// commit the transaction and close the db connection
$conn->commit();
$conn->close();
