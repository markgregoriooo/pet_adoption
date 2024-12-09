<?php
if (isset($_POST["createAcc"])) {

    // if there is no error in error assoc array
    if (!array_filter($createAccErrors)) {

        // connect to db
        include('config/db_connect.php');
        // hash the password
        $password_hash = password_hash($createdPass, PASSWORD_BCRYPT);

        // prepare query
        $stmt = $conn->prepare("INSERT INTO user_accounts(user_email, username, user_password_hash) VALUES(?, ?, ?)");
        $stmt->bind_param("sss", $createdEmail, $username, $password_hash); // bind parameters

        if ($stmt->execute()) {
            // alert  account created, redirect to login page
            echo
            "<script>
                    alert('Account successfully created!');
                    window.location.href = 'adopt-login.php';
                </script>";
        } else {
            echo "ERROR: Could not execute query. " . $stmt->error;
        }

        //close statement and db connection
        $stmt->close();
        mysqli_close($conn);
    }
}
