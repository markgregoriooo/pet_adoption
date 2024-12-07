<?php
    //form validation
    include('../forms-validation/donate_form_validation.php');
    //mysql query
    include('../mysql_queries/edit_donator_query.php');

    if (isset($_GET['id'])) {

        // connect to db
       include('../config/db_connect.php');
  
       $donator_id = $_GET['id'];  // Get the ID from the UR
  
       $_SESSION['donatorID'] = $donator_id; //  store the cat id to the session var 

       //prepared statement for select cats table
       $stmt = $conn->prepare("SELECT * FROM donators WHERE is_deleted = FALSE AND donator_id = ? ORDER BY created_at LIMIT 1");
       $stmt->bind_param("i", $donator_id);  // bind the donator_id to the prepared statement
       //execute
       if(!$stmt->execute()){
           // if there is/are error, roll back the transaction
           echo "Error preparing the parent insert statement: " . $stmt->error;
           exit;
       }
       // Get the result
       $result = $stmt->get_result();
       
       // Fetch a single row
       $donator = $result->fetch_assoc(); // Fetch the first row as an associative array 
  
       // Close the statement 
       $stmt->close();
        
    }
?>
<!DOCTYPE html>
<html lang="en">
    <?php include('../templates/classicHeader.php'); ?>
        <section>
            <?php if(!isset($_POST['edit-donator-form-btn'])): ?>
            <div class="container mb-2 mt-3 p-2 border border-dark">
                <div class="d-flex">
                <img src="data:<?php echo htmlspecialchars($donator['photo_type']); ?>;base64,<?php echo base64_encode($donator['photo_data']); ?>" class="w-25 h-50 ms-5 mt-3 border border-dark" alt="donator photo">
                <div class="container border border-dark ms-5 overflow-scroll" style="max-height: 500px;">
                    <h5 class="display-6">Name: <strong><?php echo htmlspecialchars($donator['donator_name']) ?></strong></h5>
                    <h6 class="">Email: <strong><?php echo htmlspecialchars($donator['donator_email']) ?></strong></h6>
                    <h6 class="">Amount: <strong><?php echo htmlspecialchars($donator['amount']) ?></strong></h6>
                    <h6 class="">Crated at: <strong><?php echo htmlspecialchars($donator['created_at']) ?></strong></h6>
                    <h6 class="">Updated at: <strong><?php echo htmlspecialchars($donator['updated_at']) ?></strong></h6>
                    <h6 class="">Deleted: <strong><?php echo htmlspecialchars($donator['is_deleted']) ?></strong></h6>
                    <h6 class="">Photo name: <strong><?php echo htmlspecialchars($donator['photo_name']) ?></strong></h6>
                    <h6 class="">Photo type: <strong><?php echo htmlspecialchars($donator['photo_type']) ?></strong></h6>
                    <h6 class="">Photo size: <strong><?php echo htmlspecialchars($donator['photo_size']) ?></strong></h6>
                </div>  
                </div>
            </div>
            <?php endif;?>

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
                        <input type="text" class="form-control w-100  bg-dark bg-opacity-25 border-dark" id="donator-fullname" name="donator-fullname" placeholder="Enter new full name" value="<?php echo htmlspecialchars($donatorFname); ?>">
                        <div class="text-danger"><?php echo htmlspecialchars($donateErrors['donatorFullnameError']); ?></div>
                    </div>

                    <div class="col-lg-5 col-12 mb-3">
                    <label for="donator-email" class="form-label d-flex">Email Address <label class="text-danger">&nbsp;*</label></label>
                    <input type="text" class="form-control w-100  bg-dark bg-opacity-25 border-dark" id="donator-email" name="donator-email" placeholder="Enter Email" value="<?php echo htmlspecialchars($donatorEmail); ?>">
                    <div class="text-danger"><?php echo htmlspecialchars($donateErrors['donatorEmailError']); ?></div>
                    </div>

                    <div class="col-lg-5 col-12 mb-3">
                        <label for="donate-amount" class="form-label">Amount</label>
                        <input type="number" class="form-control  w-100  bg-dark bg-opacity-25 border-dark" id="donate-amount" name="donate-amount" placeholder="Enter new donation amount" min="1" value="<?php echo htmlspecialchars($donateAmount); ?>"/>
                        <div class="text-danger"><?php echo htmlspecialchars($donateErrors['amountError']); ?></div>
                    </div>

                     <!-- photo data -->
                     <div class="col-lg-5 col-12 mb-3">
                            <label for="donator_photo" class="form-label d-flex">Upload New photo<label class="text-danger">&nbsp;*</label></label>
                            <input type="file" class="form-control w-100  bg-dark bg-opacity-25 border-dark" id="donator_photo" name="donator_photo" accept="image/*">
                            <div class="text-danger"><?php echo htmlspecialchars($donateErrors['donator_photo']); ?></div>
                    </div>
                        
                    <!-- submit button -->
                    <div class="text-center mt-5 mb-4">
                        <button class="btn btn-success w-25" id="edit-donator-form-btn" name="edit-donator-form-btn">Submit</button>
                    </div>

                    </div>
                <!-- end div row -->
                </form>
            </div>           
        </section>
    <?php include('../templates/classicFooter.php'); ?>
</html>