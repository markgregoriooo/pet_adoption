<?php
    include('../forms-validation/adopter_form_validation.php');
?>
<!DOCTYPE html>
<html lang="en">
    <?php include('../templates/classicHeader.php'); ?>
        <section>

            <div class="container mb-2 mt-3 p-2 border border-dark">
                <div class="d-flex">
                    <img src="../photos/profile.jpg" class="w-25 h-50 ms-5 mt-3 border border-dark " alt="...">
                    <div class="container border border-dark ms-5 overflow-scroll" style="max-height: 500px;">
                        <h5 class="">Name</h5>
                        <p class="">Some quick example text to build on the card title and make up the bulk of the card's content. Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita maiores excepturi magni totam consequatur deserunt, provident labore enim! Sol</p>
                        <p class="">Some quick example text to build on the card title and make up the bulk of the card's content. Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita maiores excepturi magni totam consequatur deserunt, provident labore enim! Sol</p>
                        <h5 class="">Name</h5>
                        <p class="">Some quick example text to build on the card title and make up the bulk of the card's content. Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita maiores excepturi magni totam consequatur deserunt, provident labore enim! Sol</p>
                        <p class="">Some quick example text to build on the card title and make up the bulk of the card's content. Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita maiores excepturi magni totam consequatur deserunt, provident labore enim! Sol</p>
                        
                    </div>  
                </div>
            </div>

        </section>
        <section id="adopter-form">
            <div class="container-fluid pb-2">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">

                    <div class="d-flex justify-content-center mb-2 mt-3">
                        <h4>EDIT ADOPTER'S INFO</h4>
                    </div>
                    <div class="d-flex justify-content-center">
                        <p>"<p class="text-danger">*</p>" <i>indicates required fields</i></p>
                    </div>
                
                    <div class="row mt-3 d-flex justify-content-center">

                        <div class="col-lg-5 col-12 mb-3">
                            <label for="adopter-fullname" class="form-label d-flex">Full Name<label class="text-danger">&nbsp;*</label></label>
                            <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $fNameInputBorderColor?>" id="adopter-fullname" name="adopter-fullname" placeholder="Enter new full name" value="<?php echo htmlspecialchars($fNameInput); ?>">
                            <div class="text-danger"><?php echo htmlspecialchars($editAdoptertErrors['fName']); ?></div>
                        </div>

                        <div class="col-lg-5 col-12 mb-3">
                        <label for="adopter-email" class="form-label d-flex">Email Address <label class="text-danger">&nbsp;*</label></label>
                        <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $emailAddInputBorderColor?>" id="adopter-email" name="adopter-email-address" placeholder="Enter Email" value="<?php echo htmlspecialchars($emailAddInput); ?>">
                        <div class="text-danger"><?php echo htmlspecialchars($editAdoptertErrors['emailAddress']); ?></div>
                        </div>

                        <div class="col-lg-5 col-12 mb-3">
                            <label for="adopter-address" class="form-label d-flex">Address <label class="text-danger">&nbsp;*</label></label>
                            <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $addressInputBorderColor?>" id="adopter-address" name="adopter-address" placeholder="e.g Rizal St, Barangay 1, Nabua, Camarines Sur" value="<?php echo htmlspecialchars($addressInput); ?>">
                            <div class="text-danger"><?php echo htmlspecialchars($editAdoptertErrors['address']); ?></div>
                        </div>

                        <div class="col-lg-5 col-12 mb-3">
                            <label for="adopter-contact" class="form-label d-flex">Contact no<label class="text-danger">&nbsp;*</label></label>
                            <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $contactNumInputBorderColor?>" id="adopter-contact" name="adopter-contact" placeholder="e.g 0900-000-0000" value="<?php echo htmlspecialchars($contactNumInput); ?>">
                            <div class="text-danger"><?php echo htmlspecialchars($editAdoptertErrors['contactNo']); ?></div>
                        </div>

                        <div class="col-lg-5 col-12 mb-3">
                            <label for="adopter-date_of_birth" class="form-label d-flex">Date of Birth<label class="text-danger">&nbsp;*</label></label>
                            <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $dateOfBirthInputBorderColor?>" id="adopter-date_of_birth" name="adopter-date_of_birth" placeholder="YYYY-MM-DD" value="<?php echo htmlspecialchars($dateOfBirthInput); ?>">
                            <div class="text-danger"><?php echo htmlspecialchars($editAdoptertErrors['date_of_birth']); ?></div>
                        </div>

                        <div class="col-lg-5 col-12 mb-3">
                            <label for="adopter-occupation" class="form-label">Occupation</label>
                            <input type="text" class="form-control w-100 bg-dark bg-opacity-25 <?php echo $occupInputBorderColor?>" id="adopter-occupation" name="adopter-occupation" placeholder="e.g. Teacher, Software Developer, Nurse" value="<?php echo htmlspecialchars($occupInput); ?>">
                            <div class="text-danger"><?php echo htmlspecialchars($editAdoptertErrors['occupation']); ?></div>
                        </div>

                        <div class="col-lg-5 col-12 mb-3">
                            <label for="adopter-income" class="form-label">Income</label>
                            <input type="text" class="form-control  w-100  bg-dark bg-opacity-25 <?php echo $incomeInputBorderColor?>" id="adopter-income" name="adopter-income" placeholder="Enter monthly income" min="1" value="<?php echo htmlspecialchars($incomeInput); ?>"/>
                            <div class="text-danger"><?php echo htmlspecialchars($editAdoptertErrors['income']); ?></div>
                            </div>
                            
                            <!-- photo data -->
                            <div class="col-lg-5 col-12 mb-3">
                                <label for="adopter-photo-data" class="form-label d-flex">Upload New photo<label class="text-danger">&nbsp;*</label></label>
                                <input type="file" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $uploadPhotoBorderColor?>" id="adopter-photo-data" name="adopter-photo-data" accept="image/*">
                                <div class="text-danger"><?php echo htmlspecialchars($editAdoptertErrors['upload_photo']); ?></div>
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
                                        <label  class="form-check-label" for="adopter-female">Female</label>
                                    <input class="form-check-input" type="radio" name="editAdopterGender" id="adopter-female" value="Female">
                                    </div>
                                
                                </fieldset>
                                <div class="text-danger"><?php echo htmlspecialchars($editAdoptertErrors['gender']); ?></div>
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
                                        <label  class="form-check-label" for="adopter-married">Married</label>
                                        <input class="form-check-input" type="radio" name="editAdopterStatus" id="adopter-married" value="Married">
                                    </div>
                                    <!-- others -->
                                    <div class="form-check form-check-inline me-3">
                                        <label  class="form-check-label" for="adopter-others-status">Others</label>
                                        <input class="form-check-input" type="radio" name="editAdopterStatus" id="adopter-others-status" value="Others">
                                    </div>
                                
                                </fieldset>
                                <div class="text-danger mt-1"><?php echo htmlspecialchars($editAdoptertErrors['status']); ?></div>
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