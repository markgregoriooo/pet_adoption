<?php 
  session_start(); // start session

  //admin username
  define("USERNAME", "admin");

  // Hash the admin password 
  define("PASSWORD_HASHED", password_hash("petadoption123", PASSWORD_BCRYPT));

  // assoc array for errors
  $adminAccErrors = array('adminUsername'=>'', 'adminPassword'=>'');

  $usernameInput = $passwordInput = "";
  $borderColorUsername = $borderColorPass ="border-dark";

  //check email
  if(isset($_POST['login'])){

    if(empty($_POST['admin-username'])){

      $adminAccErrors['adminUsername'] = "*Username is required.";
      $borderColorUsername = "border-danger border-2";

    }else{

      $usernameInput = htmlspecialchars($_POST['admin-username']);
      $usernameInput = strtolower($usernameInput);

      if($usernameInput !== USERNAME){

        $adminAccErrors['adminUsername'] = "* Wrong username.";
        $borderColorUsername = "border-danger border-2";

      }else{

        $borderColorUsername = "border-success border-2";
        $_SESSION['username'] = htmlspecialchars($usernameInput); // store username in session
        
      }
    }

    //check password
    if(empty($_POST['admin-password'])){

      $adminAccErrors['adminPassword'] = "*A Password is required";
      $borderColorPass = "border-danger border-2";
      
    }else{

      $passwordInput = htmlspecialchars($_POST['admin-password']);

      if(!password_verify($passwordInput, PASSWORD_HASHED)){

        $adminAccErrors['adminPassword'] = "* Wrong Password";
        $borderColorPass = "border-danger border-2";

      }else{

        $borderColorPass = "border-success border-2";
        $_SESSION['username'] = $usernameInput; // Store username in session
        $_SESSION['loggedin'] = true; // indication the user logged in
        //redirect to the admin page
        echo 
        "<script>
            alert('Welcome, Admin!');
            window.location.href = 'admin.php'; 
        </script>";
        exit();
      }
    }

    if(array_filter($adminAccErrors)){

        //there is/are error/s
        $usernameInput = htmlspecialchars($_POST['admin-username']);
        $passwordInput = htmlspecialchars($_POST['admin-password']);

    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>
  <section id="adopt-form" class="pb-5">
    <div class="container-fluid p-5">
      <div class="border p-4 w-50 bg-light rounded-3 shadow-sm w-sm-90 w-md-75 w-lg-50 w-xl-40 mx-auto">
        <i class="fa-solid fa-user-tie text-dark text-center d-flex justify-content-center fs-1 mt-4"></i>
        <h4 class="text-center text-dark mt-2">ADMIN LOGIN</h4>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
          <div class="m-4">
            <div class="mb-3">
              <label for="admin-username" class="form-label text-dark">Username:</label>
              <input type="text" class="form-control w-100 bg-dark bg-opacity-25 <?php echo $borderColorUsername?>" id="admin-username" name="admin-username" placeholder="Enter Username" value="<?php echo htmlspecialchars($usernameInput); ?>">
              <div class="text-danger"><?php echo htmlspecialchars($adminAccErrors['adminUsername']); ?></div>
            </div>

            <div class="mb-3">
              <label for="admin-password" class="form-label text-dark">Password:</label>
              <input type="password" class="form-control w-100 bg-dark bg-opacity-25 <?php echo $borderColorPass?>" id="admin-password" name="admin-password" placeholder="Enter Password" value="<?php echo htmlspecialchars($passwordInput); ?>">
              <div class="text-danger"><?php echo htmlspecialchars($adminAccErrors['adminPassword']); ?></div>
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary w-25 mb-5 mt-3" id="admin-login-btn" name="login">Log in</button>
          </div>
        </form>
      </div>
    </div>
  </section>
<?php include('templates/footer.php'); ?>
</html>