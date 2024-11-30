<?php 
    include('../forms-validation/dog_form_validation.php');
    include('../mysql_queries/add_dog_queries.php');
?>
<!DOCTYPE html>
<html lang="en">
  <?php include('../templates/classicHeader.php') ?>
    <section id="edit-dog-form">
        <div class="container-fluid pb-2">

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">

                      <div class=" adopter-info-text d-flex justify-content-center mb-2 mt-3">
                          <h4>ADD DOG'S INFO</h4>
                      </div>
                      <div class="d-flex required-field-text justify-content-center">
                          <p>"<p class="text-danger">*</p>" <i>indicates required fields</i></p>
                      </div>
                  
                      <div class="row mt-3 d-flex justify-content-center">
                              <!-- dog name -->
                          <div class="col-lg-5 col-12 mb-3">
                              <label for="dog-name" class="form-label d-flex">Name<label class="text-danger">&nbsp;*</label></label>
                              <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $dogNameInputBorderColor?>" id="dog-name" name="dog-name" placeholder="Enter new name" value="<?php echo htmlspecialchars($dogNameInput); ?>">
                              <div class="text-danger"><?php echo htmlspecialchars($dogErrors['dogName']); ?></div>
                          </div>

                              <!-- gender -->
                          <div class="col-lg-5 col-12 mb-3">
                              <label for="dog-gender" class="form-label d-flex">Gender<label class="text-danger">&nbsp;*</label></label>
                              <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $dogGenderInputBorderColor?>" id="dog-gender" name="dog-gender" placeholder="Enter new gender" value="<?php echo htmlspecialchars($dogGenderInput); ?>">
                              <div class="text-danger"><?php echo htmlspecialchars($dogErrors['dogGender']); ?></div>
                          </div>

                              <!-- age -->
                          <div class="col-lg-5 col-12 mb-3">
                              <label for="dog-age" class="form-label d-flex">Age<label class="text-danger">&nbsp;*</label></label>
                              <input type="number" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $dogAgeInputBorderColor?>" id="dog-age" name="dog-age" placeholder="Enter new age" value="<?php echo htmlspecialchars($dogAgeInput); ?>">
                              <div class="text-danger"><?php echo htmlspecialchars($dogErrors['dogAge']); ?></div>
                          </div>

                          <!-- date of birth -->
                          <div class="col-lg-5 col-12 mb-3">
                              <label for="dog-date-of-birth" class="form-label d-flex">Date of Birth<label class="text-danger">&nbsp;*</label></label>
                              <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $dogDateFBirthBorderColor?>" id="dog-date-of-birth" name="dog-date-of-birth" placeholder="YYYY-MM-DD" value="<?php echo htmlspecialchars($dogDateFBirth); ?>">
                              <div class="text-danger"><?php echo htmlspecialchars($dogErrors['dog_date_of_birth']); ?></div>
                          </div>

                          <!-- size-->
                          <div class="col-lg-5 col-12 mb-3">
                              <label for="dog-size" class="form-label d-flex">Size<label class="text-danger">&nbsp;*</label></label>
                              <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $dogSizeInputBorderColor?>" id="dog-size" name="dog-size" placeholder="e.g small, medium, large, extra large" value="<?php echo htmlspecialchars($dogSizeInput); ?>">
                              <div class="text-danger"><?php echo htmlspecialchars($dogErrors['size']); ?></div>
                          </div>

                          <!-- photo data -->
                          <div class="col-lg-5 col-12 mb-3">
                              <label for="dog_photo" class="form-label d-flex">Upload New photo<label class="text-danger">&nbsp;*</label></label>
                              <input type="file" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $dogPhotoInputBorderColor?>" id="dog_photo" name="dog_photo" accept="image/*" value="<?php echo htmlspecialchars($dogPhotoInput); ?>">
                              <div class="text-danger"><?php echo htmlspecialchars($dogErrors['upload_photo']); ?></div>
                          </div>


                          <!-- Leash trained -->
                          <div class="mb-3 col-lg-10 col-12">
                              <fieldset>
                              <legend class="d-flex">Leash trained <label class="text-danger">&nbsp;*</label></legend>

                              <!-- yes -->
                              <div class="form-check form-check-inline me-3">
                                  <label class="form-check-label" for="dog-leash-trained">Yes</label>
                              <input class="form-check-input" type="radio" name="isLeashTrained" id="dog-leash-trained" value="1">
                              </div>

                              <!-- no -->
                              <div class="form-check form-check-inline me-3">
                                  <label  class="form-check-label" for="dog-not-leash-trained">No</label>
                              <input class="form-check-input" type="radio" name="isLeashTrained" id="dog-not-leash-trained" value="0">
                              </div>

                              </fieldset>
                              <div class="text-danger"><?php echo htmlspecialchars($dogErrors['leash_trained']); ?></div>
                          </div>

                          

                          <!-- submit button -->
                          <div class="text-center mt-2">
                              <button class="btn btn-success w-25 mb-5" id="add-dog-form-btn" name="add-dog-form-btn">Submit</button>
                          </div>

                      </div>
                  <!-- end div row -->
            </form>
        </div>           
    </section>
  <?php include('../templates/classicFooter.php') ?>
</html>