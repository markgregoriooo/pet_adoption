<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include('templates/header.php'); ?>

<!-- CATS -->
        <div class="container text-center mt-3 text-dark w-25 p-1 rounded ">
            <h3>CATS</h3>
        </div>
            <div class="container">
                <div class="row">
                    <?php //foreach($cats as $cat): 
                    $i = 1;
                        while($i < 30):?>

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 ">
                        <div class="card mx-auto mt-5 mb-5 border border-dark" style="width: 18rem;">
                            <img src="photos/cat1.webp" class="card-img-top w-100 h-25" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Name</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <!-- ADOPT & DETAILS BUTTON -->
                                <div class="d-flex justify-content-evenly">
                                  <a href="#" class="btn btn-danger">Details</a>
                                  <a href="cat-adopt-form.php?id=<?php //echo htmlspecialchars($cat['id']); ?>" name="adoptCat" class="btn btn-dark w-50">Adopt</a>
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

<!-- DOGS -->

            <div class="container text-center mt-3 text-dark w-25 p-1 rounded ">
            <h3>DOGS</h3>
            </div>
                <div class="container mt-3
                mb-3 rounded">
                    <div class="row">
                        <?php //foreach($dogs as $dog): 
                        $i = 1;
                            while($i < 30):?>

                        <div class="col-12 col-sm-6 col-md-3 col-lg-3 ">
                            <div class="card mx-auto mt-5 mb-5 border border-dark" style="width: 18rem;">
                                <img src="photos/dog1.jpg" class="card-img-top w-100 h-25" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Name</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <!-- ADOPT & DETAILS BUTTON -->
                                    <div class="d-flex justify-content-evenly">
                                    <a href="#" class="btn btn-danger">Details</a>
                                    <a href="dog-adopt-form.php?id=<?php //echo $cat['id']; ?>" name="edit" class="btn btn-dark w-50">Adopt</a>
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
    <?php include('templates/footer.php'); ?>
</body>
</html>