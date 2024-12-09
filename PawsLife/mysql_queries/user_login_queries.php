<?php
session_start(); // Start the session at the beginning

if (isset($_POST['login'])) {

    if (!array_filter($adoptErrors)) {

        // prepare the query
        $sql = "SELECT username, user_password_hash FROM user_accounts WHERE username = ? AND is_deleted = FALSE LIMIT 1";

        // prepare the statement 
        $stmt = $conn->prepare($sql);

        // check if the statement was prepared successfully
        if ($stmt === false) {
            die("Error preparing the statement: " . $conn->error);
        }

        // Bind the parameter
        $stmt->bind_param("s", $username);

        // execute the statement
        $stmt->execute();

        // bind result variables
        $stmt->bind_result($username_result, $password_hash_result);

        // check if the username exists
        if ($stmt->fetch()) {

            $_SESSION['username'] = htmlspecialchars($username_result); // store username in session

            // username exists, now check the password
            if (password_verify($adoptPassword, $password_hash_result)) {

                // Password is correct, store username to session 
                $_SESSION['username'] = htmlspecialchars($username_result); // Store username in session
                $_SESSION['loggedin'] = true; // indication the user logged in
                // close the prepared statement
                $stmt->close();

                // check if there is an existing session for this user
                $session_check_sql = "SELECT session_id FROM user_sessions WHERE user_name = ? LIMIT 1";
                $session_check_stmt = $conn->prepare($session_check_sql);
                $session_check_stmt->bind_param("s", $_SESSION['username']);
                $session_check_stmt->execute();
                $session_check_stmt->store_result();

                if ($session_check_stmt->num_rows > 0) {
                    // session exists, update the login time and last activity time
                    $update_session_sql = "UPDATE user_sessions SET login_time = CURRENT_TIMESTAMP, last_activity_time = CURRENT_TIMESTAMP WHERE user_name = ?";
                    $update_stmt = $conn->prepare($update_session_sql);
                    $update_stmt->bind_param("s", $_SESSION['username']);
                    $update_stmt->execute();
                    $update_stmt->close();
                } else {
                    // no session found, create a new session
                    $insert_session_sql = "INSERT INTO user_sessions (user_name, role, login_time) VALUES (?, 'user', CURRENT_TIMESTAMP)";
                    $insert_stmt = $conn->prepare($insert_session_sql);
                    $insert_stmt->bind_param("s", $_SESSION['username']);
                    $insert_stmt->execute();
                    $insert_stmt->close();
                }

                // successful, redirect to the adopt page
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
            //store error msg to errprs assoc array 
            $adoptErrors['username'] = "Username not found.";
            $borderColorUsername = "border-danger border-2";
        }


        // close the connection
        $conn->close();
    }
}
