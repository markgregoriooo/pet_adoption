<?php 
    // connect to database
    $conn = mysqli_connect('localhost', 'IT2A', 'petadoption', 'pawslife_db');

    //check connection
    if(!$conn){ 
        die('Connection failed: ' . mysqli_connect_error());
    }
?>