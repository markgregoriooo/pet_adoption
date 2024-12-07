<?php

  // form validation
  include('../forms-validation/cat_form_validation.php');
  //mysql query
  include('../mysql_queries/edit_cat_query.php');

    if (isset($_GET['id'])) {

      // connect to db
     include('../config/db_connect.php');

     $cat_id = $_GET['id'];  // Get the ID from the UR

     $_SESSION['catID'] = $cat_id; //  store the cat id to the session var 

     //prepared statement for select cats table
     $stmt = $conn->prepare("SELECT * FROM cats INNER JOIN pets ON cats.pet_id = pets.pet_id WHERE pets.is_deleted = FALSE AND cats.cat_id = ? ORDER BY pets.created_at LIMIT 1");
     $stmt->bind_param("i", $cat_id);  // bind the cat_id to the prepared statement
     //execute
     if(!$stmt->execute()){
         // if there is/are error, roll back the transaction
         echo "Error preparing the parent insert statement: " . $stmt->error;
         exit;
     }
     // Get the result
     $result = $stmt->get_result();
     
     // Fetch a single row
     $cat = $result->fetch_assoc(); // Fetch the first row as an associative array
     $_SESSION['pet_id_edit'] = $cat['pet_id']; //  store the pet id to the session var  

     // Close the statement 
     $stmt->close();
      
    }
?>
<!DOCTYPE html>
<html lang="en">
  <?php include('../templates/classicHeader.php'); ?>
      <section>
        <?php if(!isset($_POST['edit-cat-form-btn'])): ?>
        <div class="container mb-2 mt-3 p-2 border border-dark">
            <div class="d-flex">
              <img src="data:<?php echo htmlspecialchars($cat['photo_type']); ?>;base64,<?php echo base64_encode($cat['photo_data']); ?>" class="w-25 h-50 ms-5 mt-3 border border-dark" alt="cat photo">
              <div class="container border border-dark ms-5 overflow-scroll" style="max-height: 500px;">
                  <h5 class="display-6">Name: <strong><?php echo htmlspecialchars($cat['pet_name']) ?></strong></h5>
                  <h6 class="">Gender: <strong><?php echo htmlspecialchars($cat['gender']) ?></strong></h6>
                  <h6 class="">Age: <strong><?php echo htmlspecialchars($cat['age']) ?></strong></h6>
                  <h6 class="">Date of Birth: <strong><?php echo htmlspecialchars($cat['date_of_birth']) ?></strong></h6>
                  <h6 class="">Color: <strong><?php echo htmlspecialchars($cat['color']) ?></strong></h6>
                  <h6 class="">Litter Trained: <strong><?php echo htmlspecialchars($cat['litter_trained']) ?></strong></h6>
                  <h6 class="">Indoor: <strong><?php echo htmlspecialchars($cat['is_indoor']) ?></strong></h6>
                  <h6 class="">Crated at: <strong><?php echo htmlspecialchars($cat['created_at']) ?></strong></h6>
                  <h6 class="">Updated at: <strong><?php echo htmlspecialchars($cat['updated_at']) ?></strong></h6>
                  <h6 class="">Deleted: <strong><?php echo htmlspecialchars($cat['is_deleted']) ?></strong></h6>
                  <h6 class="">Photo name: <strong><?php echo htmlspecialchars($cat['photo_name']) ?></strong></h6>
                  <h6 class="">Photo type: <strong><?php echo htmlspecialchars($cat['photo_type']) ?></strong></h6>
                  <h6 class="">Photo size: <strong><?php echo htmlspecialchars($cat['photo_size']) ?></strong></h6>
              </div>  
            </div>
        </div>
        <?php endif;?>

      </section>
        <section id="edit-cat-form">
        <div class="container-fluid pb-2">

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">

                <div class=" adopter-info-text d-flex justify-content-center mb-2 mt-3">
                    <h4>EDIT CAT'S INFO</h4>
                </div>
                <div class="d-flex required-field-text justify-content-center">
                    <p>"<p class="text-danger">*</p>" <i>indicates required fields</i></p>
                </div>
              
                <div class="row mt-3 d-flex justify-content-center">
                    <!-- cat name -->
                  <div class="col-lg-5 col-12 mb-3">
                    <label for="cat-name" class="form-label d-flex">Name<label class="text-danger">&nbsp;*</label></label>
                    <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $catNameInputBorderColor?>" id="cat-name" name="cat-name" placeholder="Enter new name" value="<?php echo htmlspecialchars($catNameInput); ?>">
                    <div class="text-danger"><?php echo htmlspecialchars($catErrors['catName']); ?></div>
                  </div>

                    <!-- gender -->
                  <div class="col-lg-5 col-12 mb-3">
                    <label for="cat-gender" class="form-label d-flex">Gender<label class="text-danger">&nbsp;*</label></label>
                    <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $catGenderInputBorderColor?>" id="cat-gender" name="cat-gender" placeholder="Enter new gender" value="<?php echo htmlspecialchars($catGenderInput); ?>">
                    <div class="text-danger"><?php echo htmlspecialchars($catErrors['catGender']); ?></div>
                  </div>

                    <!-- age -->
                  <div class="col-lg-5 col-12 mb-3">
                    <label for="cat-age" class="form-label d-flex">Age<label class="text-danger">&nbsp;*</label></label>
                    <input type="number" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $catAgeInputBorderColor?>" id="cat-age" name="cat-age" placeholder="Enter new age" value="<?php echo htmlspecialchars($catAgeInput); ?>">
                    <div class="text-danger"><?php echo htmlspecialchars($catErrors['catAge']); ?></div>
                  </div>

                  <!-- date of birth -->
                  <div class="col-lg-5 col-12 mb-3">
                    <label for="cat-date-of-birth" class="form-label d-flex">Date of Birth<label class="text-danger">&nbsp;*</label></label>
                    <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $catDateFBirthBorderColor?>" id="cat-date-of-birth" name="cat-date-of-birth" placeholder="YYYY-MM-DD" value="<?php echo htmlspecialchars($catDateFBirth); ?>">
                    <div class="text-danger"><?php echo htmlspecialchars($catErrors['cat_date_of_birth']); ?></div>
                  </div>

                  <!-- color -->
                  <div class="col-lg-5 col-12 mb-3">
                    <label for="cat-color" class="form-label d-flex">Color<label class="text-danger">&nbsp;*</label></label>
                    <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $catColorInputBorderColor?>" id="cat-color" name="cat-color" placeholder="e.g Yellow Green" value="<?php echo htmlspecialchars($catColorInput); ?>">
                    <div class="text-danger"><?php echo htmlspecialchars($catErrors['color']); ?></div>
                  </div>

                  <!-- photo data -->
                  <div class="col-lg-5 col-12 mb-3">
                    <label for="cat_photo" class="form-label d-flex">Upload New photo<label class="text-danger">&nbsp;*</label></label>
                    <input type="file" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $catPhotoInputBorderColor?>" id="cat_photo" name="cat_photo" accept="image/*" value="<?php echo htmlspecialchars($catNameInput); ?>">
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
                        <label  class="form-check-label" for="cat-not-litter-trained">No</label>
                      <input class="form-check-input" type="radio" name="litterTrained" id="0" value="not-litter-trained">
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
                        <label  class="form-check-label" for="not-indoor-cat">No</label>
                      <input class="form-check-input" type="radio" name="isIndoor" id="not-indoor-cat" value="0">
                      </div>

                    </fieldset>
                    <div class="text-danger"><?php echo htmlspecialchars($catErrors['indoor']); ?></div>
                  </div>

                  

                

                   <!-- submit button -->
                   <div class="text-center mt-3">
                      <button class="btn btn-success w-25 mb-5" id="edit-cat-form-btn" name="edit-cat-form-btn">Submit</button>
                   </div>

              </div>
              <!-- end div row -->
            </form>
          </div>           
    </section>
  <?php include('../templates/classicFooter.php'); ?>
</html>