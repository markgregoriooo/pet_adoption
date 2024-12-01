<?php
    include('../forms-validation/adopted_pet_form_validation.php');
    include('../forms-validation/dog_form_validation.php');
?>
<!DOCTYPE html>
<html lang="en">
    <?php include('../templates/classicHeader.php'); ?>

        <section>
            <div class="container mb-2 mt-3 p-2 border border-dark">
                <div class="d-flex">
                    <img src="../photos/dog2.jpg" class="w-25 h-50 ms-5 mt-3 border border-dark " alt="...">
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

                    <div class=" d-flex justify-content-center mb-2 mt-5">
                        <h5>EDIT DOG ADOPTER'S INFO</h5>
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
                        
                        <!-- edit adopted dog's info -->
                        <div class="d-flex justify-content-center mb-2 mt-5">
                            <h5>EDIT DOG'S INFO</h5>
                        </div>
                        <div class="d-flex required-field-text justify-content-center">
                            <p>"<p class="text-danger">*</p>" <i>indicates required fields</i></p>
                        </div>

                        <!-- dog name -->
                        <div class="col-lg-5 col-12 mb-3">
                            <label for="dog-name" class="form-label d-flex">Name<label class="text-danger">&nbsp;*</label></label>
                            <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $dogNameInputBorderColor?>" id="dog-name" name="dog-name" placeholder="Enter new name" value="<?php echo htmlspecialchars($dogNameInput); ?>">
                            <div class="text-danger"><?php echo htmlspecialchars($editAdoptedDogErrors['dogName']); ?></div>
                        </div>

                            <!-- gender -->
                        <div class="col-lg-5 col-12 mb-3">
                            <label for="dog-gender" class="form-label d-flex">Gender<label class="text-danger">&nbsp;*</label></label>
                            <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $dogGenderInputBorderColor?>" id="dog-gender" name="dog-gender" placeholder="Enter new gender" value="<?php echo htmlspecialchars($dogGenderInput); ?>">
                            <div class="text-danger"><?php echo htmlspecialchars($editAdoptedDogErrors['dogGender']); ?></div>
                        </div>

                            <!-- age -->
                        <div class="col-lg-5 col-12 mb-3">
                            <label for="dog-age" class="form-label d-flex">Age<label class="text-danger">&nbsp;*</label></label>
                            <input type="number" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $dogAgeInputBorderColor?>" id="dog-age" name="dog-age" placeholder="Enter new age" value="<?php echo htmlspecialchars($dogAgeInput); ?>">
                            <div class="text-danger"><?php echo htmlspecialchars($editAdoptedDogErrors['dogAge']); ?></div>
                        </div>

                        <!-- date of birth -->
                        <div class="col-lg-5 col-12 mb-3">
                            <label for="dog-date-of-birth" class="form-label d-flex">Date of Birth<label class="text-danger">&nbsp;*</label></label>
                            <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $dogDateFBirthBorderColor?>" id="dog-date-of-birth" name="dog-date-of-birth" placeholder="YYYY-MM-DD" value="<?php echo htmlspecialchars($dogDateFBirth); ?>">
                            <div class="text-danger"><?php echo htmlspecialchars($editAdoptedDogErrors['dog_date_of_birth']); ?></div>
                        </div>

                         <!-- size-->
                         <div class="col-lg-5 col-12 mb-3">
                            <label for="dog-size" class="form-label d-flex">Size<label class="text-danger">&nbsp;*</label></label>
                            <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $dogSizeInputBorderColor?>" id="dog-size" name="dog-size" placeholder="e.g small, medium, large, extra large" value="<?php echo htmlspecialchars($dogSizeInput); ?>">
                            <div class="text-danger"><?php echo htmlspecialchars($editAdoptedDogErrors['size']); ?></div>
                        </div>

                        <!-- photo data -->
                        <div class="col-lg-5 col-12 mb-3">
                            <label for="dog-photo-data" class="form-label d-flex">Upload New photo<label class="text-danger">&nbsp;*</label></label>
                            <input type="file" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $dogPhotoInputBorderColor?>" id="dog-photo-data" name="dog-photo-data" accept="image/*" value="<?php //echo htmlspecialchars($fNameInput); ?>">
                            <div class="text-danger"><?php //echo htmlspecialchars($AdoptionFormErrors['fName']); ?></div>
                        </div>


                        <!-- Leash trained -->
                        <div class="mb-3 col-lg-10 col-12">
                            <fieldset>
                            <legend class="d-flex">Leash trained <label class="text-danger">&nbsp;*</label></legend>

                            <!-- yes -->
                            <div class="form-check form-check-inline me-3">
                                <label class="form-check-label" for="dog-leash-trained">Yes</label>
                            <input class="form-check-input" type="radio" name="isLeashTrained" id="dog-leash-trained" value="leash-trained">
                            </div>

                            <!-- no -->
                            <div class="form-check form-check-inline me-3">
                                <label  class="form-check-label" for="dog-not-leash-trained">No</label>
                            <input class="form-check-input" type="radio" name="isLeashTrained" id="dog-not-leash-trained" value="not-leash-trained">
                            </div>

                            </fieldset>
                            <div class="text-danger"><?php echo htmlspecialchars($editAdoptedDogErrors['leash_trained']); ?></div>
                        </div>
                    
                        <!-- submit button -->
                        <div class="text-center">
                            <button class="btn btn-success w-25 mb-5" id="editAdptdPetForm-btn" name="editAdptdPetForm-btn">Submit</button>
                        </div>
                    </div>
                
                </form>
            </div>           
        </section>
    <?php include('../templates/classicFooter.php'); ?>
</html>