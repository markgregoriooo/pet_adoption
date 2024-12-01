<?php
    include('../forms-validation/donator_form_validation.php');
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
        <section id="edit-donator-form">
            <div class="container-fluid pb-2">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">

                    <div class="d-flex justify-content-center mb-2 mt-5">
                        <h4>EDIT DONATOR'S INFO</h4>
                    </div>
                    <div class="d-flex justify-content-center">
                        <p>"<p class="text-danger">*</p>" <i>indicates required fields</i></p>
                    </div>
                
                    <div class="row mt-3 d-flex justify-content-center">

                    <div class="col-lg-5 col-12 mb-3">
                        <label for="donator-fullname" class="form-label d-flex">Full Name<label class="text-danger">&nbsp;*</label></label>
                        <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $fNameInputBorderColor?>" id="donator-fullname" name="donator-fullname" placeholder="Enter new full name" value="<?php echo htmlspecialchars($fNameInput); ?>">
                        <div class="text-danger"><?php echo htmlspecialchars($editDonatorErrors['fName']); ?></div>
                    </div>

                    <div class="col-lg-5 col-12 mb-3">
                    <label for="donator-email" class="form-label d-flex">Email Address <label class="text-danger">&nbsp;*</label></label>
                    <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $emailAddInputBorderColor?>" id="donator-email" name="donator-email-address" placeholder="Enter Email" value="<?php echo htmlspecialchars($emailAddInput); ?>">
                    <div class="text-danger"><?php echo htmlspecialchars($editDonatorErrors['emailAddress']); ?></div>
                    </div>

                    <div class="col-lg-5 col-12 mb-3">
                        <label for="donator-contact" class="form-label d-flex">Phone no<label class="text-danger">&nbsp;*</label></label>
                        <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $contactNumInputBorderColor?>" id="donator-contact" name="donator-contact" placeholder="e.g 0900-000-0000" value="<?php echo htmlspecialchars($contactNumInput); ?>">
                        <div class="text-danger"><?php echo htmlspecialchars($editDonatorErrors['contactNo']); ?></div>
                    </div>

                    <div class="col-lg-5 col-12 mb-3">
                        <label for="donator-donation" class="form-label">Amount</label>
                        <input type="number" class="form-control  w-100  bg-dark bg-opacity-25 <?php echo $amountBorderColor?>" id="donator-donation" name="donator-donation" placeholder="Enter new donation amount" min="1" value="<?php echo htmlspecialchars($amount); ?>"/>
                        <div class="text-danger"><?php echo htmlspecialchars($editDonatorErrors['amount']); ?></div>
                    </div>

                    <div class="col-lg-5 col-12 mb-3">
                        <label for="donator-address" class="form-label d-flex">Address <label class="text-danger">&nbsp;*</label></label>
                        <input type="text" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $addressInputBorderColor?>" id="donator-address" name="donator-address" placeholder="e.g Rizal St, Barangay 1, Nabua, Camarines Sur" value="<?php echo htmlspecialchars($addressInput); ?>">
                        <div class="text-danger"><?php echo htmlspecialchars($editDonatorErrors['address']); ?></div>
                    </div>

                     <!-- photo data -->
                     <div class="col-lg-5 col-12 mb-3">
                            <label for="donator-photo-data" class="form-label d-flex">Upload New photo<label class="text-danger">&nbsp;*</label></label>
                            <input type="file" class="form-control w-100  bg-dark bg-opacity-25 <?php echo $uploadPhotoBorderColor?>" id="donator-photo-data" name="donator-photo-data" accept="image/*">
                            <div class="text-danger"><?php echo htmlspecialchars($editDonatorErrors['upload_photo']); ?></div>
                    </div>
                        
                    <!-- submit button -->
                    <div class="text-center mt-5 mb-4">
                        <button class="btn btn-success w-25" id="edit-adopter-form-btn" name="edit-adopter-form-btn">Submit</button>
                    </div>

                    </div>
                <!-- end div row -->
                </form>
            </div>           
        </section>
    <?php include('../templates/classicFooter.php'); ?>
</html>