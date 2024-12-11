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
    <title>Paws Life</title>
    <link rel="icon" href="../photos/icon&logo.jpg"/>
</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark container-fluid " id="nav-container">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="index.php">
                    <img src="photos/icon&logo.jpg" alt="logo" id="logo" class="me-2">
                    <h1 class="text-light mb-0" id="logo-title">Paws Life</h1>
                </a>
                <!-- toggle button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        <!-- if user is not logged in, show admin button -->
                        <?php if (!isset($_SESSION['loggedin'])): ?>
                            <li class="nav-item" id="header-nav-bg">
                                <a href="admin-login.php" class="nav-link">Admin</a>
                            </li>
                        <?php endif; ?>
                        <!-- if user is logged in, show home button -->
                        <?php if (isset($_SESSION['loggedin'])): ?>
                            <li class="nav-item" id="header-nav-bg">
                                <!-- this button trigger the modal to log out -->
                                <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#userLogout">
                                    Home
                                </button>
                            </li>
                        <?php else: ?>
                            <!-- natural button -->
                            <li class="nav-item" id="header-nav-bg">
                                <a href="index.php" class="nav-link " >Home</a>
                            </li>
                        <?php endif; ?>
                        <!-- if user is not logged in, show adopt button -->
                        <?php if (!isset($_SESSION['loggedin'])): ?>
                        <li class="nav-item" id="header-nav-bg">
                            <a href="adopt-login.php" class="nav-link ">Adopt</a>
                        </li>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['loggedin'])): ?>
                        <li class="nav-item" id="header-nav-bg">
                            <a href="donate.php" class="nav-link fw-bold">Donate</a>
                        </li>
                        <?php else: ?>
                        <li class="nav-item" id="header-nav-bg">
                            <a href="donate.php" class="nav-link">Donate</a>
                        </li>
                        <?php endif; ?>
                        <!-- ff user is logged in, show log out button -->
                        <?php if (isset($_SESSION['loggedin'])): ?>
                            <li class="nav-item" id="header-nav-bg">
                                <!-- Button to trigger modal -->
                                <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#userLogout">
                                <i class="fa-solid fa-right-from-bracket"></i> Log out
                                </button>
                            </li>
                        <?php endif; ?>
                    </ul class="navbar-nav ms-auto">
                    <ul>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- Log out Modal -->
        <div class="modal fade" data-bs-backdrop="static" id="userLogout" tabindex="-1" aria-labelledby="logoutmodal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutmodal">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to log out?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-danger" id="yesButton">Yes</button>
            </div>
            </div>
        </div>
        </div>

        <script>
            // Add event listener for "Yes" button
            document.getElementById('yesButton').addEventListener('click', function() {
                // Redirect to logout.php page 
                window.location.href = 'logout.php'; // Replace with your target URL
            });
        </script>
    </header>