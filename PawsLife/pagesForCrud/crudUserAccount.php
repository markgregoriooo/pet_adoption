<?php 
  //connect to database
  include('../config/db_connect.php');

  // mysql for getting data from database
  // prepared statement to avoid sql injection
  $stmt = $conn->prepare("SELECT * FROM user_accounts WHERE is_deleted = FALSE ORDER BY created_at");
  // execute 
  $stmt->execute();
  
  //get the result 
  $result = $stmt->get_result();

  // fetch the resulting rows as an array
  $rows = $result->fetch_all(MYSQLI_ASSOC);

  

  //close statement and db connection
  $stmt->close();
  mysqli_close($conn);


  //  mysql for deletion
?>

<!DOCTYPE html>
<html lang="en">
  <?php include('../templates/classicHeader.php'); ?>
  <section class="bg-secondary">
      <div class="container text-center pt-3 text-light w-25 p-1 rounded ">
              <h3>USER ACCOUNTS</h3>
      </div>
        <div class="container">
            <div class="row ">
                <?php foreach($rows as $user_acc):?>

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 ">
                      <div class="card mt-5 mb-5 mx-auto border border-dark" style="width: 18rem;">
                          <div class="card-body">
                              <p class="card-title"><b>Email:</b> <?php echo htmlspecialchars($user_acc['user_email'])?></p>
                              <p class="card-text "><b>Username:</b> <?php echo htmlspecialchars($user_acc['username']) ?></p>
                              <p class="card-text"><b>Created at:</b> <?php echo htmlspecialchars($user_acc['created_at']) ?></p>
                              
                              <!-- DESCRIPTION, EDIT & DELETE BUTTONS -->
                              <div class="d-flex justify-content-evenly">
                                <a href="#" class="btn btn-dark">Details</a>
                                <a href="../mysql_queries/delete_user_acc_query.php?id=<?php echo htmlspecialchars($user_acc['user_acc_id']);?>" name="deleteAdopter" class="btn btn-danger">Delete</a>
                              </div>
                          </div>
                      </div>
                    </div>
                    <?php 
                  endforeach;?>
            </div>
        </div>
  </section>
  <?php include('../templates/classicFooter.php'); ?>
</html>