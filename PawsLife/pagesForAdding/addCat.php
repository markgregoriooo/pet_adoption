<?php
// form validation
include('../forms-validation/cat_form_validation.php');
//mysql query
include('../mysql_queries/add_cat_queries.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php include('../templates/classicHeader.php') ?>

<section style="background-color: #e8d6c1;">
  <div class="container-fluid pb-2">

    <!-- add cat form -->
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">

      <div class=" adopter-info-text d-flex justify-content-center mb-2 pt-3">
        <h4>ADD CAT</h4>
      </div>
      <div class="d-flex required-field-text justify-content-center">
        <p>"
        <p class="text-danger">*</p>" <i>indicates required fields</i></p>
      </div>

      <div class="row mt-3 d-flex justify-content-center">
        <!-- cat name -->
        <div class="col-lg-5 col-12 mb-3">
          <label for="cat-name" class="form-label d-flex">Name<label class="text-danger">&nbsp;*</label></label>
          <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $catNameInputBorderColor ?>" id="cat-name" name="cat-name" placeholder="Enter new name" value="<?php echo htmlspecialchars($catNameInput); ?>">
          <div class="text-danger"><?php echo htmlspecialchars($catErrors['catName']); ?></div>
        </div>

        <!-- gender -->
        <div class="col-lg-5 col-12 mb-3">
          <label for="cat-gender" class="form-label d-flex">Gender<label class="text-danger">&nbsp;*</label></label>
          <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $catGenderInputBorderColor ?>" id="cat-gender" name="cat-gender" placeholder="Enter new gender" value="<?php echo htmlspecialchars($catGenderInput); ?>">
          <div class="text-danger"><?php echo htmlspecialchars($catErrors['catGender']); ?></div>
        </div>

        <!-- age -->
        <div class="col-lg-5 col-12 mb-3">
          <label for="cat-age" class="form-label d-flex">Age<label class="text-danger">&nbsp;*</label></label>
          <input type="number" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $catAgeInputBorderColor ?>" id="cat-age" name="cat-age" placeholder="Enter new age" value="<?php echo htmlspecialchars($catAgeInput); ?>">
          <div class="text-danger"><?php echo htmlspecialchars($catErrors['catAge']); ?></div>
        </div>

        <!-- date of birth -->
        <div class="col-lg-5 col-12 mb-3">
          <label for="cat-date-of-birth" class="form-label d-flex">Date of Birth<label class="text-danger">&nbsp;*</label></label>
          <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $catDateFBirthBorderColor ?>" id="cat-date-of-birth" name="cat-date-of-birth" placeholder="YYYY-MM-DD" value="<?php echo htmlspecialchars($catDateFBirth); ?>">
          <div class="text-danger"><?php echo htmlspecialchars($catErrors['cat_date_of_birth']); ?></div>
        </div>

        <!-- color -->
        <div class="col-lg-5 col-12 mb-3">
          <label for="cat-color" class="form-label d-flex">Color<label class="text-danger">&nbsp;*</label></label>
          <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $catColorInputBorderColor ?>" id="cat-color" name="cat-color" placeholder="e.g Yellow Green" value="<?php echo htmlspecialchars($catColorInput); ?>">
          <div class="text-danger"><?php echo htmlspecialchars($catErrors['color']); ?></div>
        </div>

        <!-- upload cat photo -->
        <div class="col-lg-5 col-12 mb-3">
          <label for="cat_photo" class="form-label d-flex">Upload New photo<label class="text-danger">&nbsp;*</label></label>
          <input type="file" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $catPhotoInputBorderColor ?>" id="cat_photo" name="cat_photo" accept="image/*" />
        </div>

        <!-- Litter trained -->
        <div class="mb-3 col-lg-5 col-12">
          <fieldset>
            <legend class="d-flex">Litter trained <label class="text-danger">&nbsp;*</label></legend>

            <!-- yes -->
            <div class="form-check form-check-inline me-3">
              <label class="form-check-label" for="cat-litter-trained">Yes</label>
              <input class="form-check-input" type="radio" name="litterTrained" id="cat-litter-trained" value="1">
            </div>

            <!-- no -->
            <div class="form-check form-check-inline me-3">
              <label class="form-check-label" for="cat-not-litter-trained">No</label>
              <input class="form-check-input" type="radio" name="litterTrained" id="cat-not-litter-trained" value="0">
            </div>

          </fieldset>
          <div class="text-danger"><?php echo htmlspecialchars($catErrors['litter_trained']); ?></div>
        </div>

        <!-- Indoor-->
        <div class="mb-3 col-lg-5 col-12">
          <fieldset>
            <legend class="d-flex">Indoor <label class="text-danger">&nbsp;*</label></legend>

            <!-- yes -->
            <div class="form-check form-check-inline me-3">
              <label class="form-check-label" for="indoor-cat">Yes</label>
              <input class="form-check-input" type="radio" name="isIndoor" id="indoor-cat" value="1">
            </div>

            <!-- no -->
            <div class="form-check form-check-inline me-3">
              <label class="form-check-label" for="not-indoor-cat">No</label>
              <input class="form-check-input" type="radio" name="isIndoor" id="not-indoor-cat" value="0">
            </div>

          </fieldset>
          <div class="text-danger"><?php echo htmlspecialchars($catErrors['indoor']); ?></div>
        </div>





        <!-- submit button -->
        <div class="text-center mt-3">
          <button class="btn btn-success w-25 mb-5" id="add-cat-form-btn" name="add-cat-form-btn">Submit</button>
        </div>

      </div>
      <!-- end div row -->
    </form>
  </div>
</section>
<?php include('../templates/classicFooter.php') ?>

</html>