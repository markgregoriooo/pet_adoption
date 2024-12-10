<footer>
    <nav class="navbar navbar-expand-lg bg-dark ">
        <a class="navbar-brand text-light" href="#" id="footer-title">Paws Life</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item ">
                <li class="nav-item">
                    <!-- Button to trigger modal for log out -->
                    <button type="button" class="btn btn-link text-light text-decoration-none fs-6" data-bs-toggle="modal" data-bs-target="#adminLogOut">
                        <i class="fa-solid fa-house"></i> Visit site
                    </button>
                </li>
                </li>
            </ul>
            <span class="navbar-text text-light" id="rights-text">
                © 2024 Paw’s Life. All rights reserved.
            </span>
        </div>
    </nav>

    <!-- Log out Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="adminLogOut" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            window.location.href = 'logout.php';
        });
    </script>
</footer>

<!-- Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../paws.js"></script>
</body>