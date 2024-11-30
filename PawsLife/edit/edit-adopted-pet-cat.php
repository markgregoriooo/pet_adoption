<?php
    include('../forms-validation/adopted_pet_form_validation.php');
    include('../forms-validation/cat_form_validation.php');
?>
<!DOCTYPE html>
<html lang="en">
    <?php include('../templates/classicHeader.php'); ?>

        <section>
            <div class="container mb-2 mt-3 p-2 border border-dark">
                <div class="d-flex">
                    <img src="../photos/cat3.jpg" class="w-25 h-50 ms-5 mt-3 border border-dark " alt="...">
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

        <section id="edit-adopted-pet-form">
            <div class="container-fluid pb-2">

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">

                    <!-- edit adopter's info -->
                    <div class=" adopter-info-text d-flex justify-content-center mb-2 mt-5">
                        <h5>EDIT CAT ADOPTER'S INFO</h5>
                    </div>
                    <div class="d-flex required-field-text justify-content-center">
                        <p>"<p class="text-danger">*</p>" <i>indicates required fields</i></p>
                    </div>

                    <div class="row mt-3 d-flex justify-content-center">

                        <div class="col-lg-5 col-12 mb-3">
                            <label for="adopter-fullname" class="form-label d-flex">Full Name<label class="text-danger">&nbsp;*</label></label>
                            <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $fNameInputBorderColor?>" id="adopter-fullname" name="adopter-fullname" placeholder="Enter Full Name" value="<?php echo htmlspecialchars($fNameInput); ?>">
                            <div class="text-danger"><?php echo htmlspecialchars($editAdoptedPetErrors['fName']); ?></div>
                        </div>

                        <div class="col-lg-5 col-12 mb-3">
                            <label for="adopter-email-address" class="form-label d-flex">Email Address <label class="text-danger">&nbsp;*</label></label>
                            <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $emailAddInputBorderColor?>" id="adopter-email" name="adopter-email-address" placeholder="Enter Email" value="<?php echo htmlspecialchars($emailAddInput); ?>">
                            <div class="text-danger"><?php echo htmlspecialchars($editAdoptedPetErrors['emailAddress']); ?></div>
                        </div>

                        <div class="col-lg-5 col-12 mb-3">
                            <label for="adopter-address" class="form-label d-flex">Address <label class="text-danger">&nbsp;*</label></label>
                            <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $addressInputBorderColor?>" id="adopter-address" name="adopter-address" placeholder="e.g Rizal St, Barangay 1, Nabua, Camarines Sur" value="<?php echo htmlspecialchars($addressInput); ?>">
                            <div class="text-danger"><?php echo htmlspecialchars($editAdoptedPetErrors['address']); ?></div>
                        </div>

                        <div class="col-lg-5 col-12 mb-3">
                            <label for="adopter-contact" class="form-label d-flex">Contact no<label class="text-danger">&nbsp;*</label></label>
                            <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $contactNumInputBorderColor?>" id="adopter-contact" name="adopter-contact" placeholder="e.g 0900-000-0000" value="<?php echo htmlspecialchars($contactNumInput); ?>">
                            <div class="text-danger"><?php echo htmlspecialchars($editAdoptedPetErrors['contactNo']); ?></div>
                        </div>

                        <div class="col-lg-5 col-12 mb-3">
                            <label for="adopter-date_of_birth" class="form-label d-flex">Date of Birth<label class="text-danger">&nbsp;*</label></label>
                            <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $dateOfBirthInputBorderColor?>" id="adopter-date_of_birth" name="adopter-date_of_birth" placeholder="YYYY-MM-DD" value="<?php echo htmlspecialchars($dateOfBirthInput); ?>">
                            <div class="text-danger"><?php echo htmlspecialchars($editAdoptedPetErrors['date_of_birth']); ?></div>
                        </div>

                        <div class="col-lg-5 col-12 mb-3">
                            <label for="adopter-occupation" class="form-label">Occupation</label>
                            <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $occupInputBorderColor?>" id="adopter-occupation" name="adopter-occupation" placeholder="e.g. Teacher, Software Developer, Nurse" value="<?php echo htmlspecialchars($occupInput); ?>">
                            <div class="text-danger"><?php echo htmlspecialchars($editAdoptedPetErrors['occupation']); ?></div>
                        </div>

                        <div class="col-lg-5 col-12 mb-3">
                            <label for="adopter-income" class="form-label">Income</label>
                            <input type="number" class="form-control  w-100  bg-dark bg-opacity-25 <?php echo $incomeInputBorderColor?>" id="adopter-income" name="adopter-income" placeholder="Enter monthly income" min="1" value="<?php echo htmlspecialchars($incomeInput); ?>">
                            <div class="text-danger"><?php echo htmlspecialchars($editAdoptedPetErrors['income']); ?></div>
                        </div>
                      
                        <!-- photo data -->
                        <div class="col-lg-5 col-12 mb-3">
                                <label for="adopter-photo-data" class="form-label d-flex">Upload New photo<label class="text-danger">&nbsp;*</label></label>
                                <input type="file" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $uploadPhotoBorderColor?>" id="adopter-photo-data" name="adopter-photo-data" accept="image/*" value="<?php echo htmlspecialchars($fNameInput); ?>">
                                <div class="text-danger"><?php echo htmlspecialchars($editAdoptedPetErrors['upload_photo']); ?></div>
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
                            <div class="text-danger"><?php echo htmlspecialchars($editAdoptedPetErrors['gender']); ?></div>
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
                            <div class="text-danger mt-1"><?php echo htmlspecialchars($editAdoptedPetErrors['status']); ?></div>
                        </div>

                        <!-- horizontal line/ divider -->
                        <hr class="bg-dark border-2 border-top border-dark w-25 mt-3"/>

                        <!-- edit cat's info -->
                        <div class=" adopter-info-text d-flex justify-content-center mb-2 mt-4">
                            <h5>EDIT ADOPTED CAT'S INFO</h5>
                        </div>
                        <div class="d-flex required-field-text justify-content-center mb-2">
                            <p>"<p class="text-danger">*</p>" <i>indicates required fields</i></p>
                        </div>

                            <!-- cat name -->
                        <div class="col-lg-5 col-12 mb-3">
                            <label for="cat-name" class="form-label d-flex">Name<label class="text-danger">&nbsp;*</label></label>
                            <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $catNameInputBorderColor?>" id="cat-name" name="cat-name" placeholder="Enter new name" value="<?php echo htmlspecialchars($catNameInput); ?>">
                            <div class="text-danger"><?php echo htmlspecialchars($editAdoptedCatErrors['catName']); ?></div>
                        </div>

                            <!-- gender -->
                        <div class="col-lg-5 col-12 mb-3">
                            <label for="cat-gender" class="form-label d-flex">Gender<label class="text-danger">&nbsp;*</label></label>
                            <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $catGenderInputBorderColor?>" id="cat-gender" name="cat-gender" placeholder="Enter new gender" value="<?php echo htmlspecialchars($catGenderInput); ?>">
                            <div class="text-danger"><?php echo htmlspecialchars($editAdoptedCatErrors['catGender']); ?></div>
                        </div>

                            <!-- age -->
                        <div class="col-lg-5 col-12 mb-3">
                            <label for="cat-age" class="form-label d-flex">Age<label class="text-danger">&nbsp;*</label></label>
                            <input type="number" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $catAgeInputBorderColor?>" id="cat-age" name="cat-age" placeholder="Enter new age" value="<?php echo htmlspecialchars($catAgeInput); ?>">
                            <div class="text-danger"><?php echo htmlspecialchars($editAdoptedCatErrors['catAge']); ?></div>
                        </div>

                        <!-- date of birth -->
                        <div class="col-lg-5 col-12 mb-3">
                            <label for="cat-date-of-birth" class="form-label d-flex">Date of Birth<label class="text-danger">&nbsp;*</label></label>
                            <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $catDateFBirthBorderColor?>" id="cat-date-of-birth" name="cat-date-of-birth" placeholder="YYYY-MM-DD" value="<?php echo htmlspecialchars($catDateFBirth); ?>">
                            <div class="text-danger"><?php echo htmlspecialchars($editAdoptedCatErrors['cat_date_of_birth']); ?></div>
                        </div>

                        <!-- color -->
                        <div class="col-lg-5 col-12 mb-3">
                            <label for="cat-color" class="form-label d-flex">Color<label class="text-danger">&nbsp;*</label></label>
                            <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $catColorInputBorderColor?>" id="cat-color" name="cat-color" placeholder="e.g Yellow Green" value="<?php echo htmlspecialchars($catColorInput); ?>">
                            <div class="text-danger"><?php echo htmlspecialchars($editAdoptedCatErrors['color']); ?></div>
                        </div>

                        <!-- photo data -->
                        <div class="col-lg-5 col-12 mb-3">
                            <label for="cat-photo-data" class="form-label d-flex">Upload New photo<label class="text-danger">&nbsp;*</label></label>
                            <input type="file" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $catPhotoInputBorderColor?>" id="cat-photo-data" name="cat-photo-data" accept="image/*" value="<?php //echo htmlspecialchars($fNameInput); ?>">
                            <div class="text-danger"><?php //echo htmlspecialchars($AdoptionFormErrors['fName']); ?></div>
                        </div>
                        <!-- Litter trained -->
                        <div class="mb-3 col-lg-5 col-12">
                            <fieldset>
                            <legend class="d-flex">Litter trained <label class="text-danger">&nbsp;*</label></legend>

                            <!-- yes -->
                            <div class="form-check form-check-inline me-3">
                                <label class="form-check-label" for="cat-litter-trained">Yes</label>
                            <input class="form-check-input" type="radio" name="litterTrained" id="cat-litter-trained" value="litter-trained">
                            </div>

                            <!-- no -->
                            <div class="form-check form-check-inline me-3">
                                <label  class="form-check-label" for="cat-not-litter-trained">No</label>
                            <input class="form-check-input" type="radio" name="litterTrained" id="cat-not-litter-trained" value="not-litter-trained">
                            </div>
                            
                            </fieldset>
                            <div class="text-danger"><?php echo htmlspecialchars($editAdoptedCatErrors['litter_trained']); ?></div>
                        </div>

                        <!-- Indoor-->
                        <div class="mb-3 col-lg-5 col-12">
                            <fieldset>
                            <legend class="d-flex">Indoor <label class="text-danger">&nbsp;*</label></legend>

                            <!-- yes -->
                            <div class="form-check form-check-inline me-3">
                                <label class="form-check-label" for="indoor-cat">Yes</label>
                            <input class="form-check-input" type="radio" name="isIndoor" id="indoor-cat" value="indoor">
                            </div>

                            <!-- no -->
                            <div class="form-check form-check-inline me-3">
                                <label  class="form-check-label" for="not-indoor-cat">No</label>
                            <input class="form-check-input" type="radio" name="isIndoor" id="not-indoor-cat" value="not-indoor">
                            </div>

                            </fieldset>
                            <div class="text-danger"><?php echo htmlspecialchars($editAdoptedCatErrors['indoor']); ?></div>
                        </div>
                    
                        <!-- submit button -->
                        <div class="text-center mt-5">
                            <button class="btn btn-success w-25 mb-5" id="editAdptdPetForm-btn" name="editAdptdPetForm-btn">Submit</button>
                        </div>
                    </div>
                
                </form>
            </div>           
        </section>
    <?php include('../templates/classicFooter.php'); ?>
</html>