<?php
  // Check if session has already been started
  if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session if not already started
  }
 
  if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: adopt-login.php'); // Redirect to adopt login page if not logged in
    exit();
    }
    
    // query to display available pets for adoption
   include('mysql_queries/display_dogs&cats_query.php');
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paws Life</title>
</head>
<body>
    <!-- include header file -->
    <?php include('templates/header.php'); ?>
    
    <section style=" background-color: #D2B48C;">
        <!-- CATS -->
        <div class="container text-center pt-3 text-dark w-25 p-1 rounded ">
            <h3>CATS</h3>
        </div>
            <div class="container">
                <div class="row">
                    <!-- foreach loop to display all available cats for adoption -->
                    <?php foreach($cats as $cat):?>
                        
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3 ">
                            <div class="card g-3 mx-auto mt-5 mb-5 border border-dark" style="width: 18rem;">
                                <img src="data:<?php echo htmlspecialchars($cat['photo_type']); ?>;base64,<?php echo base64_encode($cat['photo_data']); ?>" class="card-img-top w-100 h-25" alt="cat photo">
                                <div class="card-body">
                                    <h5 class="card-title">Name: <?php echo htmlspecialchars($cat['pet_name']);?></h5>
                                    <p class="card-text"><strong>Gender: </strong><?php echo htmlspecialchars($cat['gender']);?></p>
                                    <!-- ADOPT & DETAILS BUTTON -->
                                    <div class="d-flex justify-content-evenly">
                                    <a href="#" class="btn btn-danger">Details</a>
                                    <a href="cat-adopt-form.php?id=<?php echo htmlspecialchars($cat['cat_id']); ?>" name="adoptCat" class="btn btn-dark w-50">Adopt</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>

        <!-- DOGS -->

            <div class="container text-center mt-3 text-dark w-25 p-1 rounded ">
            <h3>DOGS</h3>
            </div>
                <div class="container mt-3
                pb-3 rounded">
                    <div class="row">
                        <!-- foreach loop to display all available cats for adoption -->
                        <?php foreach($dogs as $dog):?>
                            
                            <?php $_SESSION['petID'] = $dog['pet_id']; //  store the pet id to the session var  ?>
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 ">
                                <div class="card mx-auto mt-5 mb-5 border border-dark" style="width: 18rem;">
                                <img src="data:<?php echo htmlspecialchars($dog['photo_type']); ?>;base64,<?php echo base64_encode($dog['photo_data']); ?>" class="card-img-top w-100 h-25" alt="dog photo">
                                    <div class="card-body">
                                        <h5 class="card-title">Name: <?php echo htmlspecialchars($dog['pet_name']);?></h5>
                                        <p class="card-text"><strong>Gender: </strong><?php echo htmlspecialchars($dog['gender']);?></p>
                                        <!-- ADOPT & DETAILS BUTTON -->
                                        <div class="d-flex justify-content-evenly">
                                            <a href="#" class="btn btn-danger">Details</a>
                                            <a href="dog-adopt-form.php?id= <?php echo htmlspecialchars($dog['dog_id']); ?>" class="btn btn-dark w-50" name="adopt" >Adopt</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?> 
                    </div>
                </div>
    </section>
    <!-- include footer file -->
    <?php include('templates/footer.php'); ?>
</body>
</html>