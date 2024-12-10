<?php
// Check if session is already started, if not, start it
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<footer>
    <nav class="navbar navbar-expand-lg bg-dark ">
        <a class="navbar-brand text-light" href="#" id="footer-title">Paws Life</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <!-- if user is not logged in, show admin button -->
                <?php if (!isset($_SESSION['loggedin'])): ?>
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="admin-login.php">Admin</a>
                    </li>
                <?php endif; ?>

                <!-- if user is logged in, show home button -->
                <?php if (isset($_SESSION['loggedin'])): ?>
                    <li class="nav-item ">
                        <!-- this button trigger the modal to log out -->
                        <button type="button" class="btn text-light" data-bs-toggle="modal" data-bs-target="#userLogout">
                            Home
                        </button>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="index.php" class="nav-link  text-light ">Home</a>
                    </li>
                <?php endif; ?>

                <!-- if user is not logged in, show adopt button -->
                <?php if (!isset($_SESSION['loggedin'])): ?>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="adopt-login.php">Adopt</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link text-light fw-bold" href="donate.php">Donate</a>
                </li>
            </ul>
            <span class="navbar-text text-light" id="rights-text">
                © 2024 Paws Life. All rights reserved.
            </span>
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
</footer>
<!-- Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../paws.js"></script>
</body>