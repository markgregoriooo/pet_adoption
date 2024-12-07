<?php
  // connect to db
  include('../config/db_connect.php');

  //select into donations 
  //prepared statement for select donations table
  $stmt = $conn->prepare("SELECT * FROM donations WHERE is_deleted = FALSE ORDER BY created_at LIMIT 1");
  //execute
  if(!$stmt->execute()){
      // if there is/are error, roll back the transaction
      echo "Error preparing the parent insert statement: " . $stmt->error;
      exit;
  }
  //get the result
  $result = $stmt->get_result();
  // Fetch the single resulting row as an associative array
  $donation = $result->fetch_assoc();  
  // Close the statement 
  $stmt->close();
//  mysql for deletion
?>

<!DOCTYPE html>
<html lang="en">
  <?php include('../templates/classicHeader.php'); ?>
    <section>
      <div class="container-fluid text-center mt-3 mb-3 text-dark p-1 rounded bg-danger" style="height:300px;">
          <h3 class="m-5">TOTAL DONATIONS</h3>
          <?php 
            // Check if a donation record was found
            if ($donation) {
                // If a donation exists, display the total
                echo "<h4>" . $donation['total'] . "</h4>";
            } else {
                // If no donation record found
                echo "<h4>No donations found.</h4>";
            }
          ?>
      </div>
    </section>
    <section>
      <div class="container-fluid text-center mt-3 mb-3 text-dark p-1 rounded bg-danger" style="height:200px;">
          <h3>carousel</h3>
      </div>
    </section>
  <?php include('../templates/classicFooter.php'); ?>
</html>