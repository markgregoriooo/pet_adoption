<?php 
    session_start(); // Start the session at the beginning

    if(isset($_POST['login'])){

        if(!array_filter($adoptErrors)){
            // Prepare the SQL query
            $sql = "SELECT username, user_password_hash FROM user_accounts WHERE username = ? AND is_deleted = FALSE LIMIT 1";

            // Prepare the statement 
            $stmt = $conn->prepare($sql);

            // Check if the statement was prepared successfully
            if ($stmt === false) {
                die("Error preparing the statement: " . $conn->error);
            }

            // Bind the parameter
            $stmt->bind_param("s", $username);

            // Execute the statement
            $stmt->execute();

            // Bind result variables
            $stmt->bind_result($username_result, $password_hash_result);

            // Check if the username exists
            if ($stmt->fetch()) {
                $_SESSION['username'] = htmlspecialchars($username_result); // store username in session
                // Username exists, now check the password
                if (password_verify($adoptPassword, $password_hash_result)) {
                    // Password is correct, redirect to the adoption page
                    $_SESSION['username'] = htmlspecialchars($username_result); // Store username in session
                    $_SESSION['loggedin'] = true; // indication the user logged in
                    //redirect to the admin page
                    echo 
                    "<script>
                        alert('Welcome, ' + '" . htmlspecialchars($_SESSION['username']) . "');
                        window.location.href = 'adopt.php'; 
                    </script>";
                    exit();
                } else {
                    // Incorrect password, handle the error
                    $borderColorPassw = "border-danger border-2";
                    $adoptErrors['adoptPassword'] = "Incorrect password. Try again.";
                }
                
            } else {
                $adoptErrors['username'] = "Username not found.";
            }

            // Close the prepared statement
            $stmt->close();

            // Close the connection (optional, if you don't need it further in the script)
            $conn->close();
            
        }
        
    }
?>
