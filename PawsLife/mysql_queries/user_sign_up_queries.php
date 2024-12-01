<?php 
    if(isset($_POST["createAcc"])){

        // if there is no error 
        if(!array_filter($createAccErrors)){
            
            // connect to db
            include('config/db_connect.php');
            // Hash the password
            $password_hash = password_hash($createdPass, PASSWORD_BCRYPT);

            // Prepared statement to prevent sql SQL injection
            $stmt = $conn->prepare("INSERT INTO user_accounts(user_email, username, user_password_hash) VALUES(?, ?, ?)");
            $stmt->bind_param("sss", $createdEmail, $username, $password_hash);

            if($stmt->execute()){
                //  account created
                echo      
                "<script>
                    alert('Account successfully created!');
                    window.location.href = 'adopt-login.php';
                </script>";
            }else{
                echo "ERROR: Could not execute query. " . $stmt->error;
            }

            //close statement and db connection
            $stmt->close();
            mysqli_close($conn);

        }
    }
    
?>