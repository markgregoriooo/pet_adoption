<?php 
    // connect to db
    include('../config/db_connect.php');

    //select into cats
    //prepared statement for select cats table
    $stmt = $conn->prepare("SELECT * FROM cats INNER JOIN pets ON cats.pet_id = pets.pet_id WHERE pets.is_deleted = FALSE ORDER BY created_at");

    //execute
    if(!$stmt->execute()){
         // if there is/are error, roll back the transaction
         echo "Error preparing the parent insert statement: " . $stmt->error;
         exit;
    }
    //get the result
    $result = $stmt->get_result();
    // fetch the resulting rows as an array
    $cats = $result->fetch_all(MYSQLI_ASSOC);
    // Close the statement 
    $stmt->close()
//  mysql for deletion
?>

<!DOCTYPE html>
<html lang="en">
  <?php include('../templates/addCatHeader.php') ?>
    <div class="container text-center mt-3 text-dark w-25 p-1 rounded ">
              <h3>CATS</h3>
    </div>
        <div class="container">
            <div class="row ">
                <?php foreach($cats as $cat):?>
                      <div class="col-12 col-sm-6 col-md-3 col-lg-3 ">
                        <div class="card g-3 mx-auto mt-5 mb-5 border border-dark" style="width: 18rem;">
                        <img src="data:<?php echo htmlspecialchars($cat['photo_type']); ?>;base64,<?php echo base64_encode($cat['photo_data']); ?>" class="card-img-top w-100 h-25" alt="cat photo">
                          <div class="card-body">
                              <h5 class="card-title">Name: <?php echo htmlspecialchars($cat['pet_name']);?></h5>
                              <p class="card-text"><strong>Gender: </strong><?php echo htmlspecialchars($cat['gender']);?></p>
                              <!-- DESCRIPTION, EDIT & DELETE BUTTONS -->
                              <div class="d-flex justify-content-evenly">
                              <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#cat_details"
                                      data-cat-id="<?php echo htmlspecialchars($cat['cat_id']); ?>"
                                      data-cat-name="<?php echo htmlspecialchars($cat['pet_name']); ?>"
                                      data-cat-gender="<?php echo htmlspecialchars($cat['gender']); ?>"
                                      data-cat-age="<?php echo htmlspecialchars($cat['age']); ?>"
                                      data-cat-dob="<?php echo htmlspecialchars($cat['date_of_birth']); ?>"
                                      data-cat-adopted="<?php echo htmlspecialchars($cat['is_adopted']); ?>"
                                      data-cat-created="<?php echo htmlspecialchars($cat['created_at']); ?>"
                                      >Details
                              </button>
                              <!-- include modal -->
                                <?php include('../modals/cat_details.php') ?> 
                                <a href="../edit/edit-cat.php?id=<?php echo htmlspecialchars($cat['cat_id']);?>" name="editCat" class="btn btn-dark">Edit</a>
                                <a href="../mysql_queries/delete_cat_query.php?id=<?php echo htmlspecialchars($cat['pet_id']);?>" name="editCat" class="btn btn-danger">Delete</a>
                              </div>
                          </div>
                        </div>
                      </div>
                    <?php endforeach;?>
            </div>
        </div>

  
  <?php include('../templates/classicFooter.php') ?>
</html>