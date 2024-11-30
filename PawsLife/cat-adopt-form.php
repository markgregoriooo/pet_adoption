<?php
 include('forms-validation/adoption-form-validation.php');
 //mysql
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include('templates/header.php'); ?>
    <section>

        <div class="container mb-2 mt-3 p-2 border border-dark">
            <div class="d-flex">
              <img src="photos/cat3.jpg" class="w-25 h-50 ms-5 mt-3 border border-dark " alt="...">
              <div class="container border border-dark ms-5 overflow-scroll" style="max-height: 500px;">
                  <h5 class="">Cat's Name</h5>
                  <p class="">Some quick example text to build on the card title and make up the bulk of the card's content. Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita maiores excepturi magni totam consequatur deserunt, provident labore enim! Sol</p>
                  <p class="">Some quick example text to build on the card title and make up the bulk of the card's content. Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita maiores excepturi magni totam consequatur deserunt, provident labore enim! Sol</p>
                  <h5 class="">Name</h5>
                  <p class="">Some quick example text to build on the card title and make up the bulk of the card's content. Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita maiores excepturi magni totam consequatur deserunt, provident labore enim! Sol</p>
                  <p class="">Some quick example text to build on the card title and make up the bulk of the card's content. Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita maiores excepturi magni totam consequatur deserunt, provident labore enim! Sol</p>
              </div>  
            </div>
        </div>

      </section>

    <section id="adoption-form">
        <div class="container-fluid pb-2">
            <h2 class="text-center pt-5">Adoption Form</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
              <div class="container d-flex required-field-text">
                <p>"<p class="text-danger">*</p>" <i>indicates required fields</i></p>
              </div>

              <div class="container adopter-info-text">
                <h5>ADOPTER'S INFO</h5>
              </div>
              
                <div class="row mt-3 d-flex justify-content-center">
                  <div class="col-lg-5 col-12 mb-3">
                    <label for="adoptor-fullname" class="form-label d-flex">Full Name<label class="text-danger">&nbsp;*</label></label>
                    <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $fNameInputBorderColor?>" id="adoptor-fullname" name="adoptor-fullname" placeholder="Enter Full Name" value="<?php echo htmlspecialchars($fNameInput); ?>">
                    <div class="text-danger"><?php echo htmlspecialchars($AdoptionFormErrors['fName']); ?></div>
                  </div>

                  <div class="col-lg-5 col-12 mb-3">
                  <label for="adoptor-email-address" class="form-label d-flex">Email Address <label class="text-danger">&nbsp;*</label></label>
                  <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $emailAddInputBorderColor?>" id="adoptor-email" name="adoptor-email-address" placeholder="Enter Email" value="<?php echo htmlspecialchars($emailAddInput); ?>">
                  <div class="text-danger"><?php echo htmlspecialchars($AdoptionFormErrors['emailAddress']); ?></div>
                  </div>

                  <div class="col-lg-5 col-12 mb-3">
                    <label for="adoptor-address" class="form-label d-flex">Address <label class="text-danger">&nbsp;*</label></label>
                    <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $addressInputBorderColor?>" id="adoptor-address" name="adoptor-address" placeholder="e.g Rizal St, Barangay 1, Nabua, Camarines Sur, 4434" value="<?php echo htmlspecialchars($addressInput); ?>">
                    <div class="text-danger"><?php echo htmlspecialchars($AdoptionFormErrors['address']); ?></div>
                  </div>

                  <div class="col-lg-5 col-12 mb-3">
                    <label for="adoptor-contact" class="form-label d-flex">Contact no<label class="text-danger">&nbsp;*</label></label>
                    <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $contactNumInputBorderColor?>" id="adoptor-contact" name="adoptor-contact" placeholder="e.g 0900-000-0000" value="<?php echo htmlspecialchars($contactNumInput); ?>">
                    <div class="text-danger"><?php echo htmlspecialchars($AdoptionFormErrors['contactNo']); ?></div>
                  </div>

                  <div class="col-lg-5 col-12 mb-3">
                    <label for="adoptor-date_of_birth" class="form-label d-flex">Date of Birth<label class="text-danger">&nbsp;*</label></label>
                    <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $dateOfBirthInputBorderColor?>" id="adoptor-date_of_birth" name="adoptor-date_of_birth" placeholder="YYYY-MM-DD" value="<?php echo htmlspecialchars($dateOfBirthInput); ?>">
                    <div class="text-danger"><?php echo htmlspecialchars($AdoptionFormErrors['date_of_birth']); ?></div>
                  </div>

                  <div class="col-lg-5 col-12 mb-3">
                    <label for="adoptor-occupation" class="form-label">Occupation</label>
                    <input type="text" class="form-control w-100 bg-dark bg-opacity-25 <?php echo $occupInputBorderColor?>" id="adoptor-occupation" name="adoptor-occupation" placeholder="e.g. Teacher, Software Developer, Nurse" value="<?php echo htmlspecialchars($occupInput); ?>">
                    <div class="text-danger"><?php echo htmlspecialchars($AdoptionFormErrors['occupation']); ?></div>
                  </div>

                  <div class="col-lg-5 col-12 mb-3">
                      <label for="adoptor-income" class="form-label">Income</label>
                      <input type="text" class="form-control  w-100  bg-dark bg-opacity-25 <?php echo $incomeInputBorderColor?>" id="adoptor-income" name="adoptor-income" placeholder="Enter your monthly income" min="1" value="<?php echo htmlspecialchars($incomeInput); ?>"/>
                      <div class="text-danger"><?php echo htmlspecialchars($AdoptionFormErrors['income']); ?></div>
                    </div>
                      
                    <!-- photo data -->
                    <div class="col-lg-5 col-12 mb-3">
                        <label for="adopter_photo" class="form-label d-flex">Upload New photo<label class="text-danger">&nbsp;*</label></label>
                        <input type="file" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $uploadPhotoBorderColor?>" id="adopter_photo" name="adopter_photo" accept="image/*" value="<?php echo htmlspecialchars($fNameInput); ?>">
                        <div class="text-danger"><?php echo htmlspecialchars($AdoptionFormErrors['upload_photo']); ?></div>
                    </div>

                    <!-- Gender -->
                     <div class="mb-3 col-lg-5 col-12">
                      <fieldset>
                      <legend class="d-flex">Gender <label class="text-danger">&nbsp;*</label></legend>
                      <!-- male -->
                      <div class="form-check form-check-inline me-3">
                        <label class="form-check-label" for="adoptor-male">Male</label>
                      <input class="form-check-input" type="radio" name="adoptorGender" id="adoptor-male" value="Male">
                      </div>
                      <!-- femle -->
                      <div class="form-check form-check-inline me-3">
                        <label  class="form-check-label" for="adoptor-female">Female</label>
                      <input class="form-check-input" type="radio" name="adoptorGender" id="adoptor-female" value="Female">
                      </div>
                      
                    </fieldset>
                     </div>
                    
                  <!-- Status -->
                   <div class="mb-3 col-lg-5 col-12">
                    <fieldset>
                    <legend class="d-flex">Status <label class="text-danger">&nbsp;*</label></legend>
                    <!-- single -->
                    <div class="form-check form-check-inline me-3">
                      <label class="form-check-label" for="adoptor-single">Single</label>
                    <input class="form-check-input" type="radio" name="adoptorStatus" id="adoptor-single" value="Single">
                    </div>
                    <!-- married -->
                    <div class="form-check form-check-inline me-3">
                      <label  class="form-check-label" for="adoptor-married">Married</label>
                    <input class="form-check-input" type="radio" name="adoptorStatus" id="adoptor-married" value="Married">
                    </div>
                    <!-- others -->
                    <div class="form-check form-check-inline me-3">
                      <label  class="form-check-label" for="adoptor-others-status">Others</label>
                    <input class="form-check-input" type="radio" name="adoptorStatus" id="adoptor-others-status" value="Others">
                    </div>
                    
                    </fieldset>
                   </div>
                   <!-- submit button -->
                   <div class="text-center mt-5 mb-4">
                      <!-- determine the pet -->
                      <input type="hidden" name="for-cat-adoption" value="cat"/>
                      <button class="btn btn-success w-25" id="adoption-form-btn" name="adoption-form-btn">Submit</button>
                   </div>

              </div>
              <!-- end div row -->
            </form>
          </div>           
    </section>
    <?php include('templates/footer.php'); ?>
</body>
</html>