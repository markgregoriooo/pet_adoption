<?php
  // Check if session has already been started
  if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session if not already started
  }
  // form validation
 include('forms-validation/adopter_form_validation.php');
 //include mysql query
 include('mysql_queries/dog_adopter_query.php');

  if (isset($_GET['id'])) {

     $dog_id = $_GET['id'];  // Get the ID from the UR

     $_SESSION['dogID'] = $dog_id; //  store the cat id to the session var 

     // connect to db
     include('config/db_connect.php');

     //prepared statement for select dogs table
     $stmt = $conn->prepare("SELECT * FROM dogs INNER JOIN pets ON dogs.pet_id = pets.pet_id WHERE pets.is_deleted = FALSE AND dogs.dog_id = ? ORDER BY pets.created_at LIMIT 1");
     $stmt->bind_param("i", $dog_id);  // bind the dog_id to the prepared statement
     //execute
     if(!$stmt->execute()){
         // if there is/are error, roll back the transaction
         echo "Error preparing the parent insert statement: " . $stmt->error;
         $conn->rollback();
         exit;
     }
     // Get the result
     $result = $stmt->get_result();
     
     // Fetch a single row
     $dog = $result->fetch_assoc(); // Fetch the first row as an associative array
     $_SESSION['pet_id'] = $dog['pet_id']; //  store the pet id to the session var

     // Close the statement 
     $stmt->close();

  }
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

      <?php if(!isset($_POST['dog-adoption-form-btn'])): ?>
          <div class="container mb-2 mt-3 p-2 border border-dark">
              <div class="d-flex">
                <img src="data:<?php echo htmlspecialchars($dog['photo_type']); ?>;base64,<?php echo base64_encode($dog['photo_data']); ?>" class="w-25 h-50 ms-5 mt-3 border border-dark" alt="dog photo">
                <div class="container border border-dark ms-5 overflow-scroll" style="max-height: 500px;">
                    <h5 class="display-6">Name: <strong><?php echo htmlspecialchars($dog['pet_name']) ?></strong></h5>
                    <h6 class="">Gender: <strong><?php echo htmlspecialchars($dog['gender']) ?></strong></h6>
                    <h6 class="">Age: <strong><?php echo htmlspecialchars($dog['age']) ?></strong></h6>
                    <h6 class="">Date of Birth: <strong><?php echo htmlspecialchars($dog['date_of_birth']) ?></strong></h6>
                </div>  
              </div>
          </div>
      <?php endif;?>

    </section>
    <section id="adoption-form">
        <div class="container-fluid pb-2">
            <h2 class="text-center pt-5">Adoption Form</h2>

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
              <div class="container d-flex required-field-text">
                <p>"<p class="text-danger">*</p>" <i>indicates required fields</i></p>
              </div>

              <div class="container adopter-info-text">
                <h5>ADOPTER'S INFO</h5>
              </div>
              
                <div class="row mt-3 d-flex justify-content-center">
                  <div class="col-lg-5 col-12 mb-3">
                    <label for="adopter-fullname" class="form-label d-flex">Full Name<label class="text-danger">&nbsp;*</label></label>
                    <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $fNameInputBorderColor?>" id="adopter-fullname" name="adopter-fullname" placeholder="Enter Full Name" value="<?php echo htmlspecialchars($fNameInput); ?>">
                    <div class="text-danger"><?php echo htmlspecialchars($adoptertErrors['fName']); ?></div>
                </div>

                <div class="col-lg-5 col-12 mb-3">
                  <label for="adopter-email-address" class="form-label d-flex">Email Address <label class="text-danger">&nbsp;*</label></label>
                  <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $emailAddInputBorderColor?>" id="adopter-email" name="adopter-email-address" placeholder="Enter Email" value="<?php echo htmlspecialchars($emailAddInput); ?>">
                  <div class="text-danger"><?php echo htmlspecialchars($adoptertErrors['emailAddress']); ?></div>
                </div>

                <div class="col-lg-5 col-12 mb-3">
                  <label for="adopter-address" class="form-label d-flex">Address <label class="text-danger">&nbsp;*</label></label>
                  <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $addressInputBorderColor?>" id="adopter-address" name="adopter-address" placeholder="e.g Rizal St, Barangay 1, Nabua, Camarines Sur, 4434" value="<?php echo htmlspecialchars($addressInput); ?>">
                  <div class="text-danger"><?php echo htmlspecialchars($adoptertErrors['address']); ?></div>
                </div>

                <div class="col-lg-5 col-12 mb-3">
                  <label for="adopter-contact" class="form-label d-flex">Contact no<label class="text-danger">&nbsp;*</label></label>
                  <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $contactNumInputBorderColor?>" id="adopter-contact" name="adopter-contact" placeholder="e.g 0900-000-0000" value="<?php echo htmlspecialchars($contactNumInput); ?>">
                  <div class="text-danger"><?php echo htmlspecialchars($adoptertErrors['contactNo']); ?></div>
                </div>

                <div class="col-lg-5 col-12 mb-3">
                  <label for="adopter-date_of_birth" class="form-label d-flex">Date of Birth<label class="text-danger">&nbsp;*</label></label>
                  <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $dateOfBirthInputBorderColor?>" id="adopter-date_of_birth" name="adopter-date_of_birth" placeholder="YYYY-MM-DD" value="<?php echo htmlspecialchars($dateOfBirthInput); ?>">
                  <div class="text-danger"><?php echo htmlspecialchars($adoptertErrors['date_of_birth']); ?></div>
                </div>

                <div class="col-lg-5 col-12 mb-3">
                  <label for="adopter-occupation" class="form-label">Occupation</label>
                  <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $occupInputBorderColor?>" id="adopter-occupation" name="adopter-occupation" placeholder="e.g. Teacher, Software Developer, Nurse" value="<?php echo htmlspecialchars($occupInput); ?>">
                  <div class="text-danger"><?php echo htmlspecialchars($adoptertErrors['occupation']); ?></div>
                </div>

                <div class="col-lg-5 col-12 mb-3">
                    <label for="adopter-income" class="form-label">Income</label>
                    <input type="text" class="form-control  w-100  bg-dark bg-opacity-25 <?php echo $incomeInputBorderColor?>" id="adopter-income" name="adopter-income" placeholder="Enter your monthly income" min="1" value="<?php echo htmlspecialchars($incomeInput); ?>">
                    <div class="text-danger"><?php echo htmlspecialchars($adoptertErrors['income']); ?></div>
                  </div>
                      
                  <!-- photo data -->
                  <div class="col-lg-5 col-12 mb-3">
                      <label for="adopter_photo" class="form-label d-flex">Upload New photo<label class="text-danger">&nbsp;*</label></label>
                      <input type="file" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $uploadPhotoBorderColor?>" id="adopter_photo" name="adopter_photo" accept="image/*">
                  </div>
                  
                  <!-- Gender -->
                  <div class="mb-3 col-lg-5 col-12">
                    <fieldset>
                      <legend class="d-flex">Gender <label class="text-danger">&nbsp;*</label></legend>

                      <!-- male -->
                      <div class="form-check form-check-inline me-3">
                        <label class="form-check-label" for="adopter-male">Male</label>
                      <input class="form-check-input" type="radio" name="adopterGender" id="adopter-male" value="Male">
                      </div>

                      <!-- femle -->
                      <div class="form-check form-check-inline me-3">
                        <label  class="form-check-label" for="adopter-female">Female</label>
                      <input class="form-check-input" type="radio" name="adopterGender" id="adopter-female" value="Female">
                      </div>

                    </fieldset>
                  </div>
                    
                  <!-- Status -->
                  <div class="mb-3 col-lg-5 col-12">
                    <fieldset>
                      <legend class="d-flex">Status <label class="text-danger">&nbsp;*</label></legend>

                      <!-- single -->
                      <div class="form-check form-check-inline me-3">
                        <label class="form-check-label" for="adopter-single">Single</label>
                      <input class="form-check-input" type="radio" name="adopterStatus" id="adopter-single" value="Single">
                      </div>

                      <!-- married -->
                      <div class="form-check form-check-inline me-3">
                        <label  class="form-check-label" for="adopter-married">Married</label>
                      <input class="form-check-input" type="radio" name="adopterStatus" id="adopter-married" value="Married">
                      </div>

                      <!-- others -->
                      <div class="form-check form-check-inline me-3">
                        <label  class="form-check-label" for="adopter-others-status">Others</label>
                      <input class="form-check-input" type="radio" name="adopterStatus" id="adopter-others-status" value="Others">
                      </div>

                    </fieldset>
                  </div>

                   <!-- submit button -->
                   <div class="text-center">

                      <!-- determine the pet -->
                      <input type="hidden" name="for-dog-adoption" value="dog"/>
                      <button class="btn btn-success w-25 mb-5" id="adoption-form-btn" name="dog-adopt-form-btn">Submit</button>

                   </div>

              </div>
              <!-- end div row -->
            </form>
          </div>           
    </section>
    <?php include('templates/footer.php'); ?>
</body>
</html>