<?php 
  // connect to db
  include('../config/db_connect.php');

  //select into donators
  //prepared statement for select donators table
  $stmt = $conn->prepare("SELECT * FROM donators WHERE is_deleted = FALSE ORDER BY created_at");

  //execute
  if(!$stmt->execute()){
      // if there is/are error, roll back the transaction
      echo "Error preparing the parent insert statement: " . $stmt->error;
      exit;
  }
  //get the result
  $result = $stmt->get_result();
  // fetch the resulting rows as an array
  $donators = $result->fetch_all(MYSQLI_ASSOC);
  // Close the statement 
  $stmt->close();
//  mysql for deletion
?>
<!DOCTYPE html>
<html lang="en">
  <?php include('../templates/classicHeader.php'); ?>
    <div class="container text-center mt-3 text-dark w-25 p-1 rounded ">
              <h3>DONATORS</h3>
    </div>
        <div class="container">
            <div class="row ">
                <?php foreach($donators as $donator):?>

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 ">
                      <div class="card g-3 mx-auto mt-5 mb-5 border border-dark" style="width: 18rem;">
                        <img src="data:<?php echo htmlspecialchars($donator['photo_type']); ?>;base64,<?php echo base64_encode($donator['photo_data']); ?>" class="card-img-top w-100 h-25" alt="donator photo">
                          <div class="card-body">
                            <h5 class="card-title">Name: <?php echo htmlspecialchars($donator['donator_name']);?></h5>
                            <p class="card-text"><strong>Donation: </strong><?php echo htmlspecialchars($donator['amount']);?></p>
                              
                              <!-- DESCRIPTION, EDIT & DELETE BUTTONS -->
                              <div class="d-flex justify-content-evenly">
                              <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#donator_details"
                                      data-donator-id="<?php echo htmlspecialchars($donator['donator_id']); ?>"
                                      data-donator-name="<?php echo htmlspecialchars($donator['donator_name']); ?>"
                                      data-donator-email="<?php echo htmlspecialchars($donator['donator_email']); ?>"
                                      data-donator-amount="<?php echo htmlspecialchars($donator['amount']); ?>"
                                      data-donator-created="<?php echo htmlspecialchars($donator['created_at']); ?>"
                                      >Details
                              </button>
                              <!-- include modal -->
                                <?php include('../modals/donator_details.php') ?>
                                <a href="../edit/edit-donator.php?id=<?php echo htmlspecialchars($donator['donator_id']);?>" name="editDonator" class="btn btn-dark">Edit</a>
                                <a href="../mysql_queries/delete_donator_query.php?id=<?php echo htmlspecialchars($donator['donator_id']);?>" name="editDonator" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                  <?php endforeach;?>
            </div>
        </div>
  <?php include('../templates/classicFooter.php'); ?>
</html>