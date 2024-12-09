<?php   
    session_start();    //start session so that i can unset and destroy the existing session
    
    // Destroy all session data
    session_unset();//unset the session, remove all session variables
    session_destroy();//destroy the session

    header('Location: index.php');  //redirect to home page
?>