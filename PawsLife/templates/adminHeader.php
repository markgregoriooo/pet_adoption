<?php 
    // Check if session is already started, if not, start it
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>
    <link href="style.css" rel="stylesheet">
    <title>Paw's Life</title>
    <link rel="icon" href="../photos/icon&logo.jpg"/>
</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark container-fluid " id="nav-container">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="photos/icon&logo.jpg" alt="logo" id="logo" class="me-2">
                    <h1 class="text-light mb-0" id="logo-title">Paws Life</h1>
                </a>
                 
                <!-- dropdown menu for Options -->
                    <div class="btn-group m-2">
                        <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Options
                        </button>
                        <ul class="dropdown-menu bg-success">
                            <li><a class="dropdown-item" href="pagesForCrud/crudUserAccount.php">User Accounts</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="pagesForCrud/crudAdopters.php">Adopters</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="pagesForCrud/crudAdoptedPets.php">Adopted Pets</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="pagesForCrud/crudPet_cat.php">Pets(cat)</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="pagesForCrud/crudPet_dog.php">Pets(dog)</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="pagesForCrud/crudDonations.php">Donations</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="pagesForCrud/crudDonators.php">Donators</a></li>
                        </ul>
                    </div>
                        
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <!-- Button to trigger modal -->
                            <button type="button" class="btn btn-link text-light text-decoration-none fs-5" data-bs-toggle="modal" data-bs-target="#adminLogOut">
                            <i class="fa-solid fa-right-from-bracket"></i> Visit site
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Log out Modal -->
        <div class="modal fade" id="adminLogOut" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to log out?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-danger" id="yesButton">Yes</button>
            </div>
            </div>
        </div>
        </div>

        <script>
            // Add event listener for "Yes" button
            document.getElementById('yesButton').addEventListener('click', function() {
                // Redirect to logout.php page 
                window.location.href = 'logout.php'; 
            });
        </script>
        
</header>