<?php 
  // connect to db
  include('../config/db_connect.php');

  //select into donators
  //prepared statement for select donators table
  $stmt = $conn->prepare("SELECT * FROM adopters WHERE is_deleted = FALSE ORDER BY created_at");
  //execute
  if(!$stmt->execute()){
      // if there is/are error, roll back the transaction
      echo "Error preparing the parent insert statement: " . $stmt->error;
      exit;
  }
  //get the result
  $result = $stmt->get_result();
  // fetch the resulting rows as an array
  $adopters = $result->fetch_all(MYSQLI_ASSOC);
  // Close the statement 
  $stmt->close();
//  mysql for deletion
?>
<!DOCTYPE html>
<html lang="en">
  <?php include('../templates/classicHeader.php'); ?>
  <section class="bg-secondary">
      <div class="container text-center pt-3 text-light w-25 p-1 rounded ">
              <h3>ADOPTERS</h3>
      </div>
        <div class="container">
            <div class="row g-3">
                <?php foreach($adopters as $adopter):?>

                      <div class=" col-12 col-sm-6 col-md-3 col-lg-3 ">
                        <div class="card mx-auto border border-dark" style="width: 18rem;">
                          <img src="data:<?php echo htmlspecialchars($adopter['photo_type']); ?>;base64,<?php echo base64_encode($adopter['photo_data']); ?>" class="card-img-top w-100 h-25" alt="adopter photo">
                            <div class="card-body">
                              <h5 class="card-title">Name: <?php echo htmlspecialchars($adopter['adopter_name']);?></h5>
                              <p class="card-text"><strong>Email: </strong><?php echo htmlspecialchars($adopter['adopter_email']);?></p>
                              <p class="card-text"><strong>Contact no: </strong><?php echo htmlspecialchars($adopter['adopter_phone_number']);?></p>

                                <!-- EDIT & DELETE BUTTONS -->
                                <div class="d-flex justify-content-evenly">
                                  <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#adopter_details"
                                        data-adopter-id="<?php echo htmlspecialchars($adopter['adopter_id']); ?>"
                                        data-adopter-name="<?php echo htmlspecialchars($adopter['adopter_name']); ?>"
                                        data-adopter-email="<?php echo htmlspecialchars($adopter['adopter_email']); ?>"
                                        data-adopter-income="<?php echo htmlspecialchars($adopter['adopter_income']); ?>"
                                        data-adopter-address="<?php echo htmlspecialchars($adopter['adopter_address']); ?>"
                                        data-adopter-contact="<?php echo htmlspecialchars($adopter['adopter_phone_number']); ?>"
                                        data-adopter-dob="<?php echo htmlspecialchars($adopter['date_of_birth']); ?>"
                                        data-adopter-occup="<?php echo htmlspecialchars($adopter['occupation']); ?>"
                                        data-adopter-gender="<?php echo htmlspecialchars($adopter['gender']); ?>"
                                        data-adopter-status="<?php echo htmlspecialchars($adopter['adopter_status']); ?>"
                                        data-adopter-created="<?php echo htmlspecialchars($adopter['created_at']); ?>"
                                        >Details
                                  </button>
                                  <!-- include modal -->
                                  <?php include('../modals/adopter_details.php') ?>
                                  <a href="../edit/edit-adopter.php?id=<?php echo htmlspecialchars($adopter['adopter_id']);?>" name="editAdopter" class="btn btn-dark">Edit</a>
                                  <a href="../mysql_queries/delete_adopter_query.php?id=<?php echo htmlspecialchars($adopter['adopter_id']);?>" name="deleteAdopter" class="btn btn-danger">Delete</a>

                                </div>
                            </div>
                        </div>
                      </div>
                <?php endforeach;?>
            </div>
        </div>
  </section>
  <?php include('../templates/classicFooter.php'); ?>
</html>