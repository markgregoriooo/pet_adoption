<?php 
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
                <?php //foreach($cats as $cat): 
                  $i = 1;
                  while($i < 30):?>
                      <div class="col-12 col-sm-6 col-md-3 col-lg-3 ">
                        <div class="card g-3 mx-auto mt-5 mb-5 border border-dark" style="width: 18rem;">
                          <img src="../photos/cat1.webp" class="card-img-top w-100 h-25" alt="...">
                          <div class="card-body">

                              <h5 class="card-title">Name</h5>
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                              <!-- DESCRIPTION, EDIT & DELETE BUTTONS -->
                              <div class="d-flex justify-content-evenly">
                                  <a href="#" class="btn btn-dark">Details</a>
                                  <a href="../edit/edit-cat.php?id=<?php //echo htmlspecialchars($catID['id']);?>" name="editCat" class="btn btn-dark">Edit</a>

                                  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                                    <!-- hidden input to determine what id to be deleted -->
                                    <input type="hidden" name="id_to_delete" value="<?php //echo htmlspecialchars($catID['id']); ?>">

                                    <input type="submit" name="deleteCat" value="delete" class="btn btn-danger w-100 ">
                                  </form>
                              </div>
                          </div>
                        </div>
                      </div>
                    <?php $i++; ?>
                    <?php 
                  endwhile;
                  //endforeach;?>
            </div>
        </div>
  <?php include('../templates/classicFooter.php') ?>
</html>
