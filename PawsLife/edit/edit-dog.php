<?php
//form validation
include('../forms-validation/dog_form_validation.php');
//form validation
include('../mysql_queries/edit_dog_query.php');

if (isset($_GET['id'])) {

    // connect to db
    include('../config/db_connect.php');

    $dog_id = $_GET['id'];  // Get the ID from the UR

    $_SESSION['dogID'] = $dog_id; //  store the dog id to the session var 

    //prepared statement for select dogs table
    $stmt = $conn->prepare("SELECT * FROM dogs INNER JOIN pets ON dogs.pet_id = pets.pet_id WHERE pets.is_deleted = FALSE AND dogs.dog_id = ? ORDER BY pets.created_at LIMIT 1");
    $stmt->bind_param("i", $dog_id);  // bind the dog id to the prepared statement
    //execute
    if (!$stmt->execute()) {
        // if there is/are error, roll back the transaction
        echo "Error preparing the parent insert statement: " . $stmt->error;
        exit;
    }
    // Get the result
    $result = $stmt->get_result();

    // Fetch a single row
    $dog = $result->fetch_assoc(); // Fetch the first row as an associative array
    $_SESSION['pet_id_edit'] = $dog['pet_id']; //  store the pet id to the session var  

    // Close the statement 
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include('../templates/classicHeader.php'); ?>
<section style=" background-color: #e8d6c1; ">
    <?php if (!isset($_POST['edit-dog-form-btn'])): ?>
        <div class="container pb-2 pt-3 p-2 border border-dark">
            <div class="d-flex">
                <!-- show the dog's current details -->
                <img src="data:<?php echo htmlspecialchars($dog['photo_type']); ?>;base64,<?php echo base64_encode($dog['photo_data']); ?>" class="w-25 h-50 ms-5 mt-3 border border-dark" alt="dog photo">
                <div class="container border border-dark ms-5 overflow-scroll" style="max-height: 500px;">
                    <h5 class="display-6"><strong>Name: </strong><?php echo htmlspecialchars($dog['pet_name']) ?></h5>
                    <h6 class=""><strong>Gender: </strong><?php echo htmlspecialchars($dog['gender']) ?></h6>
                    <h6 class=""><strong>Age: </strong><?php echo htmlspecialchars($dog['age']) ?></h6>
                    <h6 class=""><strong>Date of Birth: </strong><?php echo htmlspecialchars($dog['date_of_birth']) ?></h6>
                    <h6 class=""><strong>Leash trained: </strong><?php echo htmlspecialchars($dog['is_leash_trained']) ?></h6>
                    <h6 class=""><strong>Size: </strong><?php echo htmlspecialchars($dog['dog_size']) ?></h6>
                    <h6 class=""><strong>Crated at: </strong><?php echo htmlspecialchars($dog['created_at']) ?></h6>
                    <h6 class=""><strong>Updated at: </strong><?php echo htmlspecialchars($dog['updated_at']) ?></h6>
                    <h6 class=""><strong>Deleted: </strong><?php echo htmlspecialchars($dog['is_deleted']) ?></h6>
                    <h6 class=""><strong>Photo name: </strong><?php echo htmlspecialchars($dog['photo_name']) ?></h6>
                    <h6 class=""><strong>Photo type: </strong><?php echo htmlspecialchars($dog['photo_type']) ?></h6>
                    <h6 class=""><strong>Photo size: </strong><?php echo htmlspecialchars($dog['photo_size']) ?></h6>
                </div>
            </div>
        </div>
    <?php endif; ?>

</section>
<section id="edit-dog-form" style=" background-color: #e8d6c1; ">
    <div class="container-fluid pb-2">

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">

            <div class=" adopter-info-text d-flex justify-content-center mb-2 pt-3">
                <h4>EDIT DOG'S INFO</h4>
            </div>
            <div class="d-flex required-field-text justify-content-center">
                <p>"
                <p class="text-danger">*</p>" <i>indicates required fields</i></p>
            </div>

            <div class="row mt-3 d-flex justify-content-center">
                <!-- dog name -->
                <div class="col-lg-5 col-12 mb-3">
                    <label for="dog-name" class="form-label d-flex">Name<label class="text-danger">&nbsp;*</label></label>
                    <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $dogNameInputBorderColor ?>" id="dog-name" name="dog-name" placeholder="Enter new name" value="<?php echo htmlspecialchars($dogNameInput); ?>">
                    <div class="text-danger"><?php echo htmlspecialchars($dogErrors['dogName']); ?></div>
                </div>

                <!-- gender -->
                <div class="col-lg-5 col-12 mb-3">
                    <label for="dog-gender" class="form-label d-flex">Gender<label class="text-danger">&nbsp;*</label></label>
                    <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $dogGenderInputBorderColor ?>" id="dog-gender" name="dog-gender" placeholder="Enter new gender" value="<?php echo htmlspecialchars($dogGenderInput); ?>">
                    <div class="text-danger"><?php echo htmlspecialchars($dogErrors['dogGender']); ?></div>
                </div>

                <!-- age -->
                <div class="col-lg-5 col-12 mb-3">
                    <label for="dog-age" class="form-label d-flex">Age<label class="text-danger">&nbsp;*</label></label>
                    <input type="number" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $dogAgeInputBorderColor ?>" id="dog-age" name="dog-age" placeholder="Enter new age" value="<?php echo htmlspecialchars($dogAgeInput); ?>">
                    <div class="text-danger"><?php echo htmlspecialchars($dogErrors['dogAge']); ?></div>
                </div>

                <!-- date of birth -->
                <div class="col-lg-5 col-12 mb-3">
                    <label for="dog-date-of-birth" class="form-label d-flex">Date of Birth<label class="text-danger">&nbsp;*</label></label>
                    <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $dogDateFBirthBorderColor ?>" id="dog-date-of-birth" name="dog-date-of-birth" placeholder="YYYY-MM-DD" value="<?php echo htmlspecialchars($dogDateFBirth); ?>">
                    <div class="text-danger"><?php echo htmlspecialchars($dogErrors['dog_date_of_birth']); ?></div>
                </div>

                <!-- size-->
                <div class="col-lg-5 col-12 mb-3">
                    <label for="dog-size" class="form-label d-flex">Size<label class="text-danger">&nbsp;*</label></label>
                    <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $dogSizeInputBorderColor ?>" id="dog-size" name="dog-size" placeholder="e.g small, medium, large, extra large" value="<?php echo htmlspecialchars($dogSizeInput); ?>">
                    <div class="text-danger"><?php echo htmlspecialchars($dogErrors['size']); ?></div>
                </div>

                <!-- dog photo -->
                <div class="col-lg-5 col-12 mb-3">
                    <label for="dog_photo" class="form-label d-flex">Upload New photo<label class="text-danger">&nbsp;*</label></label>
                    <input type="file" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $dogPhotoInputBorderColor ?>" id="dog_photo" name="dog_photo" accept="image/*">
                    <div class="text-danger"><?php echo htmlspecialchars($dogErrors['dog_photo']); ?></div>
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
                            <label class="form-check-label" for="dog-not-leash-trained">No</label>
                            <input class="form-check-input" type="radio" name="isLeashTrained" id="dog-not-leash-trained" value="0">
                        </div>

                    </fieldset>
                    <div class="text-danger"><?php echo htmlspecialchars($dogErrors['leash_trained']); ?></div>
                </div>



                <!-- submit button -->
                <div class="text-center mt-2">
                    <button class="btn btn-success w-25 mb-5" id="adoption-form-btn" name="edit-dog-form-btn">Submit</button>
                </div>

            </div>
            <!-- end div row -->
        </form>
    </div>
</section>
<?php include('../templates/classicFooter.php'); ?>

</html>