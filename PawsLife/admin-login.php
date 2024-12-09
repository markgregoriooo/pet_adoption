<?php 
  session_start(); // start session
  //connect to db
  include('config/db_connect.php');

  // assoc array for errors
  $adminAccErrors = array('adminUsername'=>'', 'adminPassword'=>'');

  $usernameInput = $passwordInput = "";
  $borderColorUsername = $borderColorPass ="border-light";

// Check if the form is submitted
if(isset($_POST['login'])){

  // Check if username is empty
  if(empty($_POST['admin-username'])){
      $adminAccErrors['adminUsername'] = "*Username is required.";
      $borderColorUsername = "border-danger border-2";
  } else {
      $usernameInput = htmlspecialchars($_POST['admin-username']);

      // Prepare a statement to check the username in the database
      $stmt = $conn->prepare("SELECT username, password FROM admin_user WHERE username = ?");
      $stmt->bind_param("s", $usernameInput); // 's' stands for string
      $stmt->execute();
      $stmt->store_result();

      // Check if the username exists
      if ($stmt->num_rows === 0) {
          $adminAccErrors['adminUsername'] = "* Wrong username.";
          $borderColorUsername = "border-danger border-2";
      } else {
          // If the username exists, fetch the hashed password
          $stmt->bind_result($adminUsername, $adminPassword);
          $stmt->fetch();

          // Check password
          if (empty($_POST['admin-password'])) {
              $adminAccErrors['adminPassword'] = "* A password is required.";
              $borderColorPass = "border-danger border-2";
          } else {
              $passwordInput = htmlspecialchars($_POST['admin-password']);

              // Verify the password against the hashed password stored in the database
              if (!password_verify($passwordInput, $adminPassword)) {
                  $adminAccErrors['adminPassword'] = "* Wrong password.";
                  $borderColorPass = "border-danger border-2";
              } else {
                  $borderColorPass = "border-success border-2";
                  $_SESSION['username'] = $usernameInput; // Store the username in the session
                  $_SESSION['loggedin'] = true; // Set session for logged-in user

                  // Redirect to admin page
                  echo "<script>
                          alert('Welcome, Admin!');
                          window.location.href = 'admin.php'; 
                        </script>";
                  exit();
              }
          }
      }

      $stmt->close(); // Close the statement
  }

  // If there are any errors, save the user input for repopulating the form
  if (array_filter($adminAccErrors)) {
      $usernameInput = htmlspecialchars($_POST['admin-username']);
      $passwordInput = htmlspecialchars($_POST['admin-password']);
  }
}

  // Close the MySQL connection
  $conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>
  <section id="adopt-form" class="pb-5">
    <div class="container-fluid p-5">
      <div class="form-bg border p-4 w-50 bg-light rounded-3 shadow-sm w-sm-90 w-md-75 w-lg-50 w-xl-40 mx-auto">
        <i class="fa-solid fa-user-tie text-light text-center d-flex justify-content-center fs-1 mt-4"></i>
        <h4 class="text-center text-light mt-2">ADMIN LOGIN</h4>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
          <div class="m-4">
            <div class="mb-3">
              <label for="admin-username" class="form-label text-light">Username:</label>
              <input type="text" class="form-control w-100 bg-light bg-opacity-50 <?php echo $borderColorUsername?>" id="admin-username" name="admin-username" placeholder="Enter Username" value="<?php echo htmlspecialchars($usernameInput); ?>">
              <div class="text-danger"><?php echo htmlspecialchars($adminAccErrors['adminUsername']); ?></div>
            </div>

            <div class="mb-3">
              <label for="admin-password" class="form-label text-light">Password:</label>
              <input type="password" class="form-control w-100 bg-light bg-opacity-50 <?php echo $borderColorPass?>" id="admin-password" name="admin-password" placeholder="Enter Password" value="<?php echo htmlspecialchars($passwordInput); ?>">
              <div class="text-danger"><?php echo htmlspecialchars($adminAccErrors['adminPassword']); ?></div>
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-dark w-25 mb-5 mt-3" id="admin-login-btn" name="login">Log in</button>
          </div>
        </form>
      </div>
    </div>
  </section>
<?php include('templates/footer.php'); ?>
</html>