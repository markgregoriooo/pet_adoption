<?php
//form validation
include('../forms-validation/adopter_form_validation.php');
//mysql query
include('../mysql_queries/edit_adopter_query.php');

if (isset($_GET['id'])) {

    // connect to db
    include('../config/db_connect.php');

    $adopter_id = $_GET['id'];  // Get the ID from the UR

    $_SESSION['adopterID'] = $adopter_id; //  store the cat id to the session var 

    //prepared statement for select cats table
    $stmt = $conn->prepare("SELECT * FROM adopters WHERE is_deleted = FALSE AND adopter_id = ? ORDER BY created_at LIMIT 1");
    $stmt->bind_param("i", $adopter_id);  // bind the donator_id to the prepared statement
    //execute
    if (!$stmt->execute()) {
        // if there is/are error, roll back the transaction
        echo "Error preparing the parent insert statement: " . $stmt->error;
        exit;
    }
    // Get the result
    $result = $stmt->get_result();

    // Fetch a single row
    $adopter = $result->fetch_assoc(); // Fetch the first row as an associative array 

    // Close the statement 
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include('../templates/classicHeader.php'); ?>

<section style=" background-color: #e8d6c1; ">
    <?php if (!isset($_POST['edit-adopter-form-btn'])): ?>
        <div class="container pb-2 pt-3 p-2 border border-dark" >
            <div class="d-flex">
                <!-- show adopter's current details -->
                <img src="data:<?php echo htmlspecialchars($adopter['photo_type']); ?>;base64,<?php echo base64_encode($adopter['photo_data']); ?>" class="w-25 h-50 ms-5 mt-3 border border-dark" alt="donator photo">
                <div class="container border border-dark ms-5 overflow-scroll" style="max-height: 500px;">
                    <h5 class="display-6"><strong>Name:</strong><?php echo htmlspecialchars($adopter['adopter_name']) ?></h5>
                    <h6 class=""><strong>Email: </strong><?php echo htmlspecialchars($adopter['adopter_email']) ?></h6>
                    <h6 class=""><strong>Address: </strong><?php echo htmlspecialchars($adopter['adopter_address']) ?></h6>
                    <h6 class=""><strong>Contact no: </strong><?php echo htmlspecialchars($adopter['adopter_phone_number']) ?></h6>
                    <h6 class=""><strong>Date of Birth: </strong><?php echo htmlspecialchars($adopter['date_of_birth']) ?></h6>
                    <h6 class=""><strong>Gender: </strong><?php echo htmlspecialchars($adopter['gender']) ?></h6>
                    <h6 class=""><strong>Status: </strong><?php echo htmlspecialchars($adopter['adopter_status']) ?></h6>
                    <h6 class=""><strong>Occupation: </strong><?php echo htmlspecialchars($adopter['occupation']) ?></h6>
                    <h6 class=""><strong>Income: </strong><?php echo htmlspecialchars($adopter['adopter_income']) ?></h6>
                    <h6 class=""><strong>Photo name: </strong><?php echo htmlspecialchars($adopter['photo_name']) ?></h6>
                    <h6 class=""><strong>Photo type: </strong><?php echo htmlspecialchars($adopter['photo_type']) ?></h6>
                    <h6 class=""><strong>Photo size: </strong><?php echo htmlspecialchars($adopter['photo_size']) ?></h6>
                    <h6 class=""><strong>rated at: </strong>C<?php echo htmlspecialchars($adopter['created_at']) ?></h6>
                    <h6 class=""><strong>Updated at: </strong><?php echo htmlspecialchars($adopter['updated_at']) ?></h6>

                </div>
            </div>
        </div>
    <?php endif; ?>

</section>
<section id="adopter-form" style=" background-color: #e8d6c1; ">
    <div class="container-fluid pb-2">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">

            <div class="d-flex justify-content-center mb-2 mt-3">
                <h4>EDIT ADOPTER'S INFO</h4>
            </div>
            <div class="d-flex justify-content-center">
                <p>"
                <p class="text-danger">*</p>" <i>indicates required fields</i></p>
            </div>

            <div class="row mt-3 d-flex justify-content-center">
                <!-- full name -->
                <div class="col-lg-5 col-12 mb-3">
                    <label for="adopter-fullname" class="form-label d-flex">Full Name<label class="text-danger">&nbsp;*</label></label>
                    <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $fNameInputBorderColor ?>" id="adopter-fullname" name="adopter-fullname" placeholder="Enter new full name" value="<?php echo htmlspecialchars($fNameInput); ?>">
                    <div class="text-danger"><?php echo htmlspecialchars($adoptertErrors['fName']); ?></div>
                </div>
                <!-- email address -->
                <div class="col-lg-5 col-12 mb-3">
                    <label for="adopter-email" class="form-label d-flex">Email Address <label class="text-danger">&nbsp;*</label></label>
                    <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $emailAddInputBorderColor ?>" id="adopter-email" name="adopter-email-address" placeholder="Enter Email" value="<?php echo htmlspecialchars($emailAddInput); ?>">
                    <div class="text-danger"><?php echo htmlspecialchars($adoptertErrors['emailAddress']); ?></div>
                </div>
                <!-- address -->
                <div class="col-lg-5 col-12 mb-3">
                    <label for="adopter-address" class="form-label d-flex">Address <label class="text-danger">&nbsp;*</label></label>
                    <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $addressInputBorderColor ?>" id="adopter-address" name="adopter-address" placeholder="e.g Rizal St, Barangay 1, Nabua, Camarines Sur" value="<?php echo htmlspecialchars($addressInput); ?>">
                    <div class="text-danger"><?php echo htmlspecialchars($adoptertErrors['address']); ?></div>
                </div>
                <!-- contact no -->
                <div class="col-lg-5 col-12 mb-3">
                    <label for="adopter-contact" class="form-label d-flex">Contact no<label class="text-danger">&nbsp;*</label></label>
                    <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $contactNumInputBorderColor ?>" id="adopter-contact" name="adopter-contact" placeholder="e.g 0900-000-0000" value="<?php echo htmlspecialchars($contactNumInput); ?>">
                    <div class="text-danger"><?php echo htmlspecialchars($adoptertErrors['contactNo']); ?></div>
                </div>
                <!-- dato of birth -->
                <div class="col-lg-5 col-12 mb-3">
                    <label for="adopter-date_of_birth" class="form-label d-flex">Date of Birth<label class="text-danger">&nbsp;*</label></label>
                    <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $dateOfBirthInputBorderColor ?>" id="adopter-date_of_birth" name="adopter-date_of_birth" placeholder="YYYY-MM-DD" value="<?php echo htmlspecialchars($dateOfBirthInput); ?>">
                    <div class="text-danger"><?php echo htmlspecialchars($adoptertErrors['date_of_birth']); ?></div>
                </div>
                <!-- occupation -->
                <div class="col-lg-5 col-12 mb-3">
                    <label for="adopter-occupation" class="form-label">Occupation</label>
                    <input type="text" class="form-control w-100 bg-dark bg-opacity-25 <?php echo $occupInputBorderColor ?>" id="adopter-occupation" name="adopter-occupation" placeholder="e.g. Teacher, Software Developer, Nurse" value="<?php echo htmlspecialchars($occupInput); ?>">
                    <div class="text-danger"><?php echo htmlspecialchars($adoptertErrors['occupation']); ?></div>
                </div>
                <!-- income -->
                <div class="col-lg-5 col-12 mb-3">
                    <label for="adopter-income" class="form-label">Income</label>
                    <input type="text" class="form-control  w-100  bg-dark bg-opacity-25 <?php echo $incomeInputBorderColor ?>" id="adopter-income" name="adopter-income" placeholder="Enter monthly income" min="1" value="<?php echo htmlspecialchars($incomeInput); ?>" />
                    <div class="text-danger"><?php echo htmlspecialchars($adoptertErrors['income']); ?></div>
                </div>

                <!-- adopter photo -->
                <div class="col-lg-5 col-12 mb-3">
                    <label for="adopter-photo-data" class="form-label d-flex">Upload New photo<label class="text-danger">&nbsp;*</label></label>
                    <input type="file" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $uploadPhotoBorderColor ?>" id="adopter-photo-data" name="adopter-photo-data" accept="image/*">
                </div>

                <!-- Gender -->
                <div class="mb-3 col-lg-5 col-12">
                    <fieldset>
                        <legend class="d-flex">Gender <label class="text-danger">&nbsp;*</label></legend>
                        <!-- male -->
                        <div class="form-check form-check-inline me-3">
                            <label class="form-check-label" for="adopter-male">Male</label>
                            <input class="form-check-input" type="radio" name="editAdopterGender" id="adopter-male" value="Male">
                        </div>
                        <!-- femle -->
                        <div class="form-check form-check-inline me-3">
                            <label class="form-check-label" for="adopter-female">Female</label>
                            <input class="form-check-input" type="radio" name="editAdopterGender" id="adopter-female" value="Female">
                        </div>

                    </fieldset>
                    <div class="text-danger"><?php echo htmlspecialchars($adoptertErrors['gender']); ?></div>
                </div>

                <!-- Status -->
                <div class="mb-3 col-lg-5 col-12">
                    <fieldset>
                        <legend class="d-flex">Status <label class="text-danger">&nbsp;*</label></legend>
                        <!-- single -->
                        <div class="form-check form-check-inline me-3">
                            <label class="form-check-label" for="adopter-single">Single</label>
                            <input class="form-check-input" type="radio" name="editAdopterStatus" id="adopter-single" value="Single">
                        </div>
                        <!-- married -->
                        <div class="form-check form-check-inline me-3">
                            <label class="form-check-label" for="adopter-married">Married</label>
                            <input class="form-check-input" type="radio" name="editAdopterStatus" id="adopter-married" value="Married">
                        </div>
                        <!-- others -->
                        <div class="form-check form-check-inline me-3">
                            <label class="form-check-label" for="adopter-others-status">Others</label>
                            <input class="form-check-input" type="radio" name="editAdopterStatus" id="adopter-others-status" value="Others">
                        </div>

                    </fieldset>
                    <div class="text-danger mt-1"><?php echo htmlspecialchars($adoptertErrors['status']); ?></div>
                </div>
                <!-- submit button -->
                <div class="text-center mt-5 mb-4">
                    <button class="btn btn-success w-25" id="adopter-form-btn" name="edit-adopter-form-btn">Submit</button>
                </div>

            </div>
            <!-- end div row -->
        </form>
    </div>
</section>
<?php include('../templates/classicFooter.php'); ?>

</html>