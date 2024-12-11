<?php
session_start(); // start session

//connect to db
include('config/db_connect.php');

// assoc array for errors
$adminAccErrors = array('adminUsername' => '', 'adminPassword' => '');

$usernameInput = $passwordInput = ""; // variable initialization
$borderColorUsername = $borderColorPass = "border-light"; // default border color

// check if the form is submitted
if (isset($_POST['login'])) {

  // check if username is empty
  if (empty($_POST['admin-username'])) {
    //store error msg in the assoc array "adminAccErrors" and change the border color to red.
    $adminAccErrors['adminUsername'] = "*Username is required.";
    $borderColorUsername = "border-danger border-2";
  } else {
    $usernameInput = htmlspecialchars($_POST['admin-username']);  //store the inputted username in var

    // prepare a statement to check the username in the database
    $stmt = $conn->prepare("SELECT username, password FROM admin_user WHERE username = ?");
    $stmt->bind_param("s", $usernameInput); //bind parameter
    $stmt->execute();
    $stmt->store_result(); // store result

    // check if the username exists
    if ($stmt->num_rows === 0) {
      // if not, store error msg in the assoc array "adminAccErrors" and change the border color to red.
      $adminAccErrors['adminUsername'] = "* Wrong username.";
      $borderColorUsername = "border-danger border-2";
    } else {
      // if username exists, fetch the hashed password
      $stmt->bind_result($adminUsername, $adminPassword);
      $stmt->fetch();

      // check password
      if (empty($_POST['admin-password'])) {
        // store error msg in the assoc array "adminAccErrors" and change the border color to red.
        $adminAccErrors['adminPassword'] = "* A password is required.";
        $borderColorPass = "border-danger border-2";
      } else {
        $passwordInput = htmlspecialchars($_POST['admin-password']); //store the inputted password in var

        // verify the password against the hashed password stored in the database
        if (!password_verify($passwordInput, $adminPassword)) {
          $adminAccErrors['adminPassword'] = "* Wrong password.";
          $borderColorPass = "border-danger border-2";
        } else {
          $borderColorPass = "border-success border-2";
          $_SESSION['username'] = $usernameInput; // Store the username in the session
          $_SESSION['loggedin'] = true; // Set session for logged-in user
          // Close the statement
          $stmt->close();

          // FOR USER SESSION
          // check if there is an existing session for this admin user
          $session_check_sql = "SELECT session_id FROM user_sessions WHERE user_name = ? AND role = 'admin' LIMIT 1";
          $session_check_stmt = $conn->prepare($session_check_sql);
          $session_check_stmt->bind_param("s", $_SESSION['username']);
          $session_check_stmt->execute();
          $session_check_stmt->store_result();

          if ($session_check_stmt->num_rows > 0) {
            // Session exists, update the login time and last activity time
            $update_session_sql = "UPDATE user_sessions SET login_time = CURRENT_TIMESTAMP, last_activity_time = CURRENT_TIMESTAMP WHERE user_name = ? AND role = 'admin'";
            $update_stmt = $conn->prepare($update_session_sql);
            $update_stmt->bind_param("s", $_SESSION['username']);
            $update_stmt->execute();
            $update_stmt->close();
          } else {
            // No session found for the admin, create a new session
            $insert_session_sql = "INSERT INTO user_sessions (user_name, role, login_time) VALUES (?, 'admin', CURRENT_TIMESTAMP)";
            $insert_stmt = $conn->prepare($insert_session_sql);
            $insert_stmt->bind_param("s", $_SESSION['username']);
            $insert_stmt->execute();
            $insert_stmt->close();
          }


          // Redirect to admin page
          echo "<script>
                          alert('Welcome, Admin!');
                          window.location.href = 'admin.php'; 
                        </script>";
          exit();
        }
      }
    }
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
  <!-- include header file -->
<?php include('templates/header.php'); ?>

<section style=" background-color: #e8d6c1;" class="pb-5">
  <div class="container-fluid p-5">
    <div class="form-bg border border-dark p-4 w-50 bg-light rounded-3 shadow-sm w-sm-90 w-md-75 w-lg-50 w-xl-40 mx-auto">
      <i class="fa-solid fa-user-tie text-light text-center d-flex justify-content-center fs-1 mt-4"></i>
      <h4 class="text-center text-light mt-2">ADMIN LOGIN</h4>
      <!-- admin login form -->
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="m-4">
          <div class="mb-3">
            <!-- username input -->
            <label for="admin-username" class="form-label text-light">Username:</label>
            <input type="text" class="form-control w-100 bg-light bg-opacity-50 <?php echo $borderColorUsername ?>" id="admin-username" name="admin-username" placeholder="Enter Username" value="<?php echo htmlspecialchars($usernameInput); ?>">
            <!-- error msg -->
            <div class="text-danger"><?php echo htmlspecialchars($adminAccErrors['adminUsername']); ?></div>
          </div>

          <div class="mb-3">
            <!-- password input -->
            <label for="admin-password" class="form-label text-light">Password:</label>
            <input type="password" class="form-control w-100 bg-light bg-opacity-50 <?php echo $borderColorPass ?>" id="admin-password" name="admin-password" placeholder="Enter Password" value="<?php echo htmlspecialchars($passwordInput); ?>">
            <!-- error msg -->
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
<!-- include footer file -->
<?php include('templates/footer.php'); ?>

</html>