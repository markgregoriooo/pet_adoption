<!DOCTYPE html>
<html lang="en">
    <div class="modal fade" data-bs-backdrop="static" id="user_acc_details" tabindex="-1" aria-labelledby="user_acc_detailsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="user_acc_detailsLabel">User Account Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Donator details displayed as text in <p> tags -->
                    <p><strong>User ID:</strong> <span id="modal_user_acc_id"></span></p>
                    <p><strong>Username:</strong> <span id="modal_username"></span></p>
                    <p><strong>Hash Password:</strong> <span id="modal_hash_password"></span></p>
                    <p><strong>Email:</strong> <span id="modal_user_email"></span></p>
                    <p><strong>Created at:</strong> <span id="modal_user_created"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn " style="background-color: bisque;" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
          // Wait for the modal to show
        var userAccDetailsModal = document.getElementById('user_acc_details');
        userAccDetailsModal.addEventListener('show.bs.modal', function (event) {
            // Get the button that triggered the modal
            var button = event.relatedTarget;
            
            // Extract the donator details from the data attributes
            var userId = button.getAttribute('data-user-acc-id');
            var userName = button.getAttribute('data-user-acc-username');
            var hashPassword = button.getAttribute('data-user-acc-password');
            var userEmail = button.getAttribute('data-user-acc-email');
            var created_at = button.getAttribute('data-user-acc-created');


            // Set the values in the modal's <p> tags
            var user_acc_id = userAccDetailsModal.querySelector('#modal_user_acc_id');
            user_acc_id.textContent = userId;

            var username = userAccDetailsModal.querySelector('#modal_username');
            username.textContent = userName;

            var hash_password = userAccDetailsModal.querySelector('#modal_hash_password');
            hash_password.textContent = hashPassword;

            var user_email = userAccDetailsModal.querySelector('#modal_user_email');
            user_email.textContent = userEmail;

            var user_created = userAccDetailsModal.querySelector('#modal_user_created');
            user_created.textContent = created_at;


        });
    </script>

</html>