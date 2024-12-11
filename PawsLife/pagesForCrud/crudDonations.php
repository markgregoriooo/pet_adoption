<?php
// connect to db
include('../config/db_connect.php');

//begin a transaction to ensure queries are successful
$conn->begin_transaction();

//calculate the total amount from the 'donators' table
$query = "SELECT SUM(amount) FROM donators WHERE is_deleted = FALSE ";
$stmt = $conn->prepare($query);
$stmt->execute();
$stmt->bind_result($total_sum); // total sum
$stmt->fetch();
//close  statement
$stmt->close();


//update total donation 
$stmt = $conn->prepare("UPDATE donations SET total = ? WHERE is_deleted = FALSE");

if ($stmt) {
  //bind param
  $stmt->bind_param("d", $total_sum);

  //execute the stmt insert
  if (!$stmt->execute()) {
    // if there is/are error, roll back the transaction
    echo "Error preparing the update statement: " . $stmt->error;
    $conn->rollback();
    exit;
  }
  //close update statement
  $stmt->close();
  // commit transaction
  $conn->commit();

} else {
  // if there is/are error, roll back the transaction
  echo "Error preparing the parent insert statement: " . $stmt->error;
  $conn->rollback();
  exit;
}

//select into donations 
//prepared statement for select donations table
$stmt = $conn->prepare("SELECT * FROM donations WHERE is_deleted = FALSE ORDER BY created_at LIMIT 1");
//execute
if (!$stmt->execute()) {
  // if there is/are error, roll back the transaction
  echo "Error preparing the parent insert statement: " . $stmt->error;
  $conn->rollback();
  exit;
}
//get the result
$result = $stmt->get_result();
// Fetch the single resulting row as an associative array
$donation = $result->fetch_assoc();
// Close the statement 
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<?php include('../templates/classicHeader.php'); ?>

<section class="p-5 bg-secondary">
  <div class="container-fluid  text-center text-dark p-1 rounded" style="height:300px; background-color: #D2B48C;">
    <h3 class="m-5">TOTAL DONATIONS</h3>
    <?php
    // check if a donation record was found
    if ($donation) {
      // if a donation exists, display the total
      echo "<h4>" . "₱" . $donation['total'] .  "</h4>";
    } else {
      // If no donation record found
      echo "<h4>No donations found.</h4>";
    }
    ?>
  </div>
</section>

<!-- carousel -->
<section class="p-3 bg-secondary">
  <div id="carouselExampleCaptions" class="carousel slide border border-dark" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../photos/donationCarousel3.png" class="d-block w-100" alt="..." style="object-fit: cover; height: 200px;">
        <div class="carousel-caption d-none d-md-block">
          <h5>We Appreciate Your Hard Work</h5>
          <p>Your dedication and commitment to overseeing the donation process truly make a difference. You ensure that everything runs smoothly and efficiently. We are grateful for all the time and effort you put in every day!</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="../photos/donationCarousel2.png" class="d-block w-100" alt="..." style="object-fit: cover; height: 200px;">
        <div class="carousel-caption d-none d-md-block">
          <h5>Thank You for Your Effort</h5>
          <p>Your daily effort and dedication are key to everything we do. You ensure that the donation process stays organized and efficient. We truly appreciate your hard work and support!</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="../photos/donationCarousel1.webp" class="d-block w-100" alt="..." style="object-fit: cover; height: 200px;">
        <div class="carousel-caption d-none d-md-block">
          <h5>You Make a Big Difference</h5>
          <p>Your leadership makes a huge impact on the donation process. Because of you, we can continue to make a positive difference. Thank you for all the hard work you put in every day!</p>
        </div>
      </div>
    </div>
  </div>


</section>
<?php include('../templates/classicFooter.php'); ?>

</html>