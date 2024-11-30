<?php 
  include('forms-validation/donate_form_validation.php');
?>
<!DOCTYPE html>
<html lang="en">
 <?php include('templates/header.php'); ?>
    <section id="donate-form">
        <div class="container-fluid pb-2">
            <h2 class="text-center pt-5">Pet Donation Form</h2>
            
            <div class="d-flex required-field-text justify-content-center">
                <p>"<p class="text-danger">*</p>" <i>indicates required fields</i></p>
            </div>

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
              <div class="m-5">
                
                <div class="mb-3">
                  <label for="donator-fullname" class="form-label">Full Name:<label class="text-danger">&nbsp;*</label></label>
                  <input type="text" class="form-control w-100 border-dark bg-dark bg-opacity-25" id="donator-fullname" name="donator-fullname" placeholder="Enter Full Name" value="<?php echo htmlspecialchars($donatorFname); ?>">
                  <div class="text-danger"><?php echo htmlspecialchars($donateErrors['donatorFullnameError']); ?></div>
                </div>
          
                <div class="mb-3">
                  <label for="donator-email" class="form-label">Email Address:<label class="text-danger">&nbsp;*</label></label>
                  <input type="text" class="form-control w-100 border-dark bg-dark bg-opacity-25" id="donator-email" name="donator-email" placeholder="Enter Email" value="<?php echo htmlspecialchars($donatorEmail); ?>">
                  <div class="text-danger"><?php echo htmlspecialchars($donateErrors['donatorEmailError']); ?></div>
                </div>
          
                <div class="mb-3">
                    <label for="donate-amount" class="form-label">Donation Amount:<label class="text-danger">&nbsp;*</label></label>
                    <input type="text" class="form-control w-100 border-dark bg-dark bg-opacity-25" id="donate-amount" name="donate-amount" placeholder="Enter Amount" min="1" value="<?php echo htmlspecialchars($donateAmount); ?>">
                    <div class="text-danger"><?php echo htmlspecialchars($donateErrors['amountError']); ?></div>
                </div>

                <!-- photo data -->
                <div class="col-lg-5 col-12 mb-3">
                      <label for="edit-adopter-photo-data" class="form-label d-flex">Upload New photo<label class="text-danger">&nbsp;*</label></label>
                      <input type="file" class="form-control  bg-dark bg-opacity-25 border border-dark" id="edit-adopter-photo-data" name="edit-adopter-photo-data" accept="image/*" >
                      <div class="text-danger"><?php echo htmlspecialchars($donateErrors['uploadPhotoError']); ?></div>
                  </div>
          
              </div>
              <div class="text-center">
                <button class="btn btn-danger w-25 mb-5" id="donate-form-btn" name="donate-btn">Donate</button>
              </div>
            </form>
          </div>           
    </section>
 <?php include('templates/footer.php'); ?>
</html>