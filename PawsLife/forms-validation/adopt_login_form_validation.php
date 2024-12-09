<?php 

    // default variable varlues
    $username = $adoptPassword = "";

    // default input border color
    $borderColorUsername = "border-light";
    $borderColorPassw = "border-light";

    // assoc array for errors
    $adoptErrors = array('username'=>'', 'adoptPassword'=>'');

    
    
    if(isset($_POST['login'])){

        // connect to database
        include('config/db_connect.php');

        // Check if username is empty
        if(empty($_POST['adopt-username'])){
            $adoptErrors['username'] = "* Username is required"; 
            $borderColorUsername = "border-danger border-2";
        } else {
            $username = mysqli_real_escape_string($conn, $_POST['adopt-username']);
            $borderColorUsername = "border-success border-2";
        }
    
        // Check if password is empty
        if(empty($_POST['adopt-password'])){
            $adoptErrors['adoptPassword'] = "*A Password is required";
            $borderColorPassw = "border-danger border-2";
        } else {
            $adoptPassword = $_POST['adopt-password'];  
            $borderColorPassw = "border-success border-2";
        }

        
        

    } else if(isset($_POST["signUp"])){
        // Redirect to sign up page if 'signUp' button is clicked
        header('Location: user-signUp.php');
        exit();  
    }

?>
