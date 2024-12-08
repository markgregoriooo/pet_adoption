<?php 

  //form validation
  include('forms-validation/adopt_login_form_validation.php');
  // mysql query
  include('mysql_queries/user_login_queries.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>
  <section id="adopt-form" class="pb-2">
    <div class="container-fluid p-5 d-flex justify-content-center">
      <div class="form-bg border p-4 w-50 bg-light rounded-3 shadow-sm w-sm-90 w-md-75 w-lg-50 w-xl-40 mx-auto">
        <h2 class="text-center text-light pt-5">Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
          <div class="m-5">
            <div class="mb-3">
              <label for="adopt-username" class="form-label text-light">Username:</label>
              <input type="text" class="form-control bg-light bg-opacity-25 <?php echo $borderColorUsername; ?>" id="adopt-username" name="adopt-username" placeholder="Enter Username" value="<?php echo htmlspecialchars($username); ?>">
              <div class="text-danger"><?php echo htmlspecialchars($adoptErrors['username']); ?></div>
            </div>

            <div class="mb-3">
              <label for="adopt-password" class="form-label text-light">Password:</label>
              <input type="password" class="form-control w-100 bg-light bg-opacity-25 <?php echo $borderColorPassw; ?>" id="adopt-password" name="adopt-password" placeholder="Enter Password" value="<?php echo htmlspecialchars($adoptPassword); ?>">
              <div class="text-danger"><?php echo htmlspecialchars($adoptErrors['adoptPassword']); ?></div>
            </div>
          </div>
          
          <!-- buttons -->
          <div class="text-center d-flex justify-content-center ">
            <button type="submit" class="btn btn-primary w-25 mb-5 me-5" id="adopt-form-btn" name="login">Login</button>
            <button type="submit" class="btn btn-primary w-25 mb-5 ms-5" id="adopt-form-btn" name="signUp">Sign Up</button>
          </div>
        
        </form>
      </div>
    </div>
  </section>
<?php include('templates/footer.php'); ?>
</html>