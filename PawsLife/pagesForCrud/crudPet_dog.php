<?php 
    // connect to db
    include('../config/db_connect.php');

    //select into cats
    //prepared statement for select dogs table
    $stmt = $conn->prepare("SELECT * FROM dogs INNER JOIN pets ON dogs.dog_id = pets.pet_id WHERE pets.is_deleted = FALSE ORDER BY created_at");

    //execute
    if(!$stmt->execute()){
         // if there is/are error, roll back the transaction
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
    <div class="container text-center mt-3 text-dark w-25 p-1 rounded ">
              <h3>DOGS</h3>
    </div>
        <div class="container">
            <div class="row">
                <?php foreach($dogs as $dog):?>

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 ">
                      <div class="card g-3 mx-auto mt-5 mb-5 border border-dark" style="width: 18rem;">
                      <img src="data:<?php echo htmlspecialchars($dog['photo_type']); ?>;base64,<?php echo base64_encode($dog['photo_data']); ?>" class="card-img-top" alt="dog photo">
                          <div class="card-body">
                            <h5 class="card-title">Name: <?php echo htmlspecialchars($dog['pet_name']);?></h5>
                            <p class="card-text"><strong>Gender: </strong><?php echo htmlspecialchars($dog['gender']);?></p>
                            <!-- DESCRIPTION, EDIT & DELETE BUTTONS -->
                            <div class="d-flex justify-content-evenly">
                                <a href="#" class="btn btn-dark">Details</a>
                                <a href="../edit/edit-dog.php?id=<?php echo htmlspecialchars($dogID['dog_id']);?>" name="editDog" class="btn btn-dark">Edit</a>
                                <a href="../mysql_queries/delete_dog_query.php?id=<?php echo htmlspecialchars($dog['pet_id']);?>" name="deleteDog" class="btn btn-danger">Delete</a>
                            </div>
                          </div>
                      </div>
                    </div>
                    <?php endforeach;?>
            </div>
        </div>
  <?php include('../templates/classicFooter.php') ?>
</html>