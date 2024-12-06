<?php
    // connect to db
    include('../config/db_connect.php');

     //begin a transaction to ensure both inserts are successful
     $conn->begin_transaction();

    //select into adopted_pets
    //prepared statement for select adopted_pets table
    $stmt = $conn->prepare("SELECT adopted_pets.*, pets.*, adopters.*,
      pets.gender AS pet_gender, 
      adopters.gender AS adopter_gender
      FROM adopted_pets
      INNER JOIN pets ON adopted_pets.pet_id = pets.pet_id
      INNER JOIN adopters ON adopted_pets.adopter_id = adopters.adopter_id
      WHERE pets.is_deleted = FALSE AND pets.is_adopted = TRUE
      ORDER BY pets.created_at");

    //execute
    if(!$stmt->execute()){
         // if there is/are error, roll back the transaction  
         echo "Error preparing the parent insert statement: " . $stmt->error;
         $conn->rollback();
         exit;
    }
    //get the result
    $result = $stmt->get_result();
    // fetch the resulting rows as an array
    $adopted_pets = $result->fetch_all(MYSQLI_ASSOC);
    // Close the statement 
    $stmt->close();

//  mysql for deletion
?>

<!DOCTYPE html>
<html lang="en">
  <?php include('../templates/classicHeader.php'); ?>
    <div class="container text-center mt-3 text-dark w-25 p-1 rounded ">
              <h3>ADOPTED PETS</h3>
    </div>

        <!-- ADOPTED CAT -->
        <div class="container">
            <div class="row">
                <?php foreach($adopted_pets as $adopted_pet):?>

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 ">
                      <div class="card g-3 mx-auto mt-3 mb-3 border border-dark" style="width: 18rem;">
                        <img src="data:<?php echo htmlspecialchars($adopted_pet['photo_type']); ?>;base64,<?php echo base64_encode($adopted_pet['photo_data']); ?>" class="card-img-top w-100 h-25" alt="adopted pet photo">
                          <div class="card-body">
                            <h5 class="card-title">Name: <?php echo htmlspecialchars($adopted_pet['pet_name']);?></h5>
                            <p class="card-text"><strong>Gender: </strong><?php echo htmlspecialchars($adopted_pet['pet_gender']);?></p>
                              
                              <!-- DESCRIPTION, EDIT & DELETE BUTTONS -->
                              <div class="d-flex justify-content-evenly">
                                <a href="#" class="btn btn-dark">Description</a>
                                <a href="../edit/edit-adopted-pet-cat.php?id=<?php echo htmlspecialchars($adopted_pet['adopted_pet_id']);?> " name="editAdoptedPet" class="btn btn-dark">Edit</a>
                                <a href="../mysql_queries/delete_adopted_pets.php?id=<?php echo htmlspecialchars($cat['adopted_pet_id']);?> " name="deleteAdoptedPet" class="btn btn-danger">Delete</a>
                              </div>
                          </div>
                      </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
  <?php include('../templates/classicFooter.php'); ?>
</html>