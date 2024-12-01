<?php 
    session_start(); // Start the session at the beginning
    $_SESSION['username'] = "";

    // default variable varlues
    $username = $adoptPassword = "";

    // default input border color
    $borderColorUsername = "border-dark";
    $borderColorPassw = "border-dark";

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
            $borderColorUsername = "border-primary border-2";
        }
    
        // Check if password is empty
        if(empty($_POST['adopt-password'])){
            $adoptErrors['adoptPassword'] = "*A Password is required";
            $borderColorPassw = "border-danger border-2";
        } else {
            $adoptPassword = $_POST['adopt-password'];  
            $borderColorPassw = "border-primary border-2";
        }

        
        

    } else if(isset($_POST["signUp"])){
        // Redirect to sign up page if 'signUp' button is clicked
        header('Location: user-signUp.php');
        exit();  
    }




    // // Login successful, start session and redirect
    // $_SESSION['username'] = $username_result;  // Store username in session

    // // Generate session ID and store it in the user_sessions table
    // $session_id = session_id();


    // // Prepare the SQL query for checking session
    // $check_session = "SELECT * FROM user_sessions WHERE username = ?";
    // $stmt_check_session = mysqli_prepare($conn, $check_session);
    // mysqli_stmt_bind_param($stmt_check_session, "s", $username);
    // mysqli_stmt_execute($stmt_check_session);
    // $session_result = mysqli_stmt_get_result($stmt_check_session);

    // // Handle session existence
    // if (mysqli_num_rows($session_result) > 0) {
    //     // Update existing session
    //     $update_session = "UPDATE user_sessions SET session_id = ?, last_activity_time = CURRENT_TIMESTAMP WHERE username = ?";
    //     $stmt_update = mysqli_prepare($conn, $update_session);
    //     mysqli_stmt_bind_param($stmt_update, "ss", $session_id, $username);
    //     mysqli_stmt_execute($stmt_update);
    // } else {
    //     // Insert new session
    //     $insert_session = "INSERT INTO user_sessions (session_id, username, role) VALUES (?, ?, 'user')";
    //     $stmt_insert = mysqli_prepare($conn, $insert_session);
    //     mysqli_stmt_bind_param($stmt_insert, "ss", $session_id, $username);
    //     mysqli_stmt_execute($stmt_insert);
    // }
?>
