<?php
  // form validation
  include('forms-validation/user_sign_up_validation.php');
  // mysql query
  include('mysql_queries/user_sign_up_queries.php');
?>

<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>
  <section id="adopt-form">
    <div class="container-fluid p-5">
      <div class="form-bg border p-4 w-50 bg-light rounded-3 shadow-sm w-sm-90 w-md-75 w-lg-50 w-xl-40 mx-auto">
        <h2 class="text-center text-light pt-5">Create your account</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
          <div class="m-5">
            <!-- enter email -->
            <div class="mb-3">
              <label for="create-email" class="form-label text-light">Email Address:</label>
              <input type="text" class="form-control w-100  bg-light bg-opacity-50 <?php echo $borderClrEmail ?>" id="create-email" name="create-email" value="<?php echo htmlspecialchars($createdEmail) ?>" placeholder="Enter Email Address">
              <div class="text-danger"><?php echo htmlspecialchars($createAccErrors['crtemailError']); ?></div>
            </div>
            <!-- create username -->
            <div class="mb-3">
              <label for="create-username" class="form-label text-light">Username:</label>
              <input type="text" class="form-control bg-light bg-opacity-50 <?php echo $borderColorUsername; ?>" id="create-username" name="create-username" placeholder="Enter Username" value="<?php echo htmlspecialchars($username); ?>">
              <div class="text-danger"><?php echo htmlspecialchars($createAccErrors['username']); ?></div>
            </div>

            <!-- create pass -->
            <div class="mb-3">
              <label for="create-password" class="form-label text-light">Password:</label>
              <input type="password" class="form-control w-100  bg-light bg-opacity-50 <?php echo $borderClrPassw ?>" id="create-password" name="create-password" value="<?php echo htmlspecialchars($createdPass) ?>" placeholder="Create Password">
              <div class="text-danger"><?php echo htmlspecialchars($createAccErrors['crtpassError']); ?></div>
            </div>
            <!-- confirm pass -->
            <div class="mb-2">
              <label for="confirm-password" class="form-label text-light">Confirm Password:</label>
              <input type="password" class="form-control w-100  bg-light bg-opacity-50 <?php echo $borderClrConPassw ?>" id="confirm-password" name="confirm-password" value="<?php echo htmlspecialchars($cnfrmPass) ?>"  placeholder="Confirm Password">
              <div class="text-danger"><?php echo htmlspecialchars($createAccErrors['cnfrmPassError']); ?></div>
            </div>
          </div>
          
          <!-- button -->
          <div class="text-center d-flex justify-content-center ">
            <button type="submit" class="btn btn-dark w-50 mb-2 " id="createAcc-form-btn" name="createAcc">Continue</button>
          </div>

          <div class="d-flex justify-content-center mb-2 mt-2">
            <label class="text-light">Already have an account? <a href="adopt-login.php" class="text-success text-decoration-none">Login</a></label>
          </div>

        </form>
      </div>
    </div>
  </section>
<?php include('templates/footer.php'); ?>
</html>