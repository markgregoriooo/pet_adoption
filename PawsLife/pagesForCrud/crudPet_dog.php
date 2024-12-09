<?php
// connect to db
include('../config/db_connect.php');

//prepared statement for select dogs table
$stmt = $conn->prepare("SELECT * FROM dogs INNER JOIN pets ON dogs.pet_id = pets.pet_id WHERE pets.is_deleted = FALSE ORDER BY created_at");

//execute
if (!$stmt->execute()) {
  // if there is/are error, echo the error msg
  echo "Error preparing the parent insert statement: " . $stmt->error;
  exit;
}
//get the result
$result = $stmt->get_result();
// fetch the resulting rows as an array
$dogs = $result->fetch_all(MYSQLI_ASSOC);
// Close the statement 
$stmt->close();
//  mysql for deletion
?>

<!DOCTYPE html>
<html lang="en">
<?php include('../templates/addDogHeader.php') ?>
<section class="bg-secondary">
  <div class="container text-center pt-3 text-dark w-25 p-1 rounded ">
    <h3>DOGS</h3>
  </div>
  <div class="container">
    <div class="row">
      <!-- foreach loop to display each dog -->
      <?php foreach ($dogs as $dog): ?>
        <div class="col-12 col-sm-6 col-md-3 col-lg-3 ">
          <div class="card g-3 mx-auto mt-5 mb-5 border border-dark" style="width: 18rem;">
            <img src="data:<?php echo htmlspecialchars($dog['photo_type']); ?>;base64,<?php echo base64_encode($dog['photo_data']); ?>" class="card-img-top" alt="dog photo">
            <div class="card-body">
              <h5 class="card-title">Name: <?php echo htmlspecialchars($dog['pet_name']); ?></h5>
              <p class="card-text"><strong>Gender: </strong><?php echo htmlspecialchars($dog['gender']); ?></p>
              <!-- DETAILS, EDIT & DELETE BUTTONS -->
              <div class="d-flex justify-content-evenly">
                <!-- details btn to pass the dog's info into js and show in modal -->
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#dog_details"
                  data-dog-id="<?php echo htmlspecialchars($dog['dog_id']); ?>"
                  data-dog-name="<?php echo htmlspecialchars($dog['pet_name']); ?>"
                  data-dog-gender="<?php echo htmlspecialchars($dog['gender']); ?>"
                  data-dog-age="<?php echo htmlspecialchars($dog['age']); ?>"
                  data-dog-dob="<?php echo htmlspecialchars($dog['date_of_birth']); ?>"
                  data-dog-adopted="<?php echo htmlspecialchars($dog['is_adopted']); ?>"
                  data-dog-created="<?php echo htmlspecialchars($dog['created_at']); ?>"
                  data-dog-leash-trained="<?php echo htmlspecialchars($dog['is_leash_trained']); ?>"
                  data-dog-size="<?php echo htmlspecialchars($dog['dog_size']); ?>">Details
                </button>
                <!-- include modal file -->
                <?php include('../modals/dog_details.php') ?>
                <!-- edit btn -->
                <a href="../edit/edit-dog.php?id=<?php echo htmlspecialchars($dog['dog_id']); ?>" name="editDog" class="btn btn-dark">Edit</a>
                <!-- delete btn -->
                <a href="../mysql_queries/delete_dog_query.php?id=<?php echo htmlspecialchars($dog['pet_id']); ?>" name="deleteDog" class="btn btn-danger">Delete</a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php include('../templates/classicFooter.php') ?>

</html>