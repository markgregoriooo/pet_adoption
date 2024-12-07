<?php 
?>
<!DOCTYPE html>
<html lang="en">
    <div class="modal fade" data-bs-backdrop="static" id="adopter_details" tabindex="-1" aria-labelledby="adopter_detailsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adopter_detailsLabel">Adopter Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- adopter details displayed as text in <p> tags -->
                    <p><strong>Adopter Id:</strong> <span id="modal_adopter_id"></span></p>
                    <p><strong>Name:</strong> <span id="modal_adopter_name"></span></p>
                    <p><strong>Gender:</strong> <span id="modal_adopter_gender"></span></p>
                    <p><strong>Status:</strong> <span id="modal_adopter_status"></span></p>
                    <p><strong>Email:</strong> <span id="modal_adopter_email"></span></p>
                    <p><strong>Address:</strong> <span id="modal_adopter_address"></span></p>
                    <p><strong>Contact no:</strong> <span id="modal_adopter_contact"></span></p>
                    <p><strong>Date of Birth:</strong> <span id="modal_adopter_dob"></span></p>
                    <p><strong>Occupation:</strong> <span id="modal_adopter_occup"></span></p>
                    <p><strong>Income:</strong> <span id="modal_adopter_income"></span></p>
                    <p><strong>Created:</strong> <span id="modal_adopter_created"></span></p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn " style="background-color: bisque;" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
          // Wait for the modal to show
        var adopterDetailsModal = document.getElementById('adopter_details');
        adopterDetailsModal.addEventListener('show.bs.modal', function (event) {
            // Get the button that triggered the modal
            var button = event.relatedTarget;
            
            // Extract the adopter details from the data attributes
            var adopterId = button.getAttribute('data-adopter-id');
            var adopterName = button.getAttribute('data-adopter-name');
            var adopterEmail = button.getAttribute('data-adopter-email');
            var adopterIncome = button.getAttribute('data-adopter-income');
            var adopterAddress = button.getAttribute('data-adopter-address');
            var adopterContact = button.getAttribute('data-adopter-contact');
            var adoptedDOB = button.getAttribute('data-adopter-dob');
            var adopterOccup = button.getAttribute('data-adopter-occup');
            var adopterGender = button.getAttribute('data-adopter-gender');
            var adopterStatus = button.getAttribute('data-adopter-status');
            var adopterCreated = button.getAttribute('data-adopter-created');


            // Set the values in the modal's <p> tags
            var adopter_id = adopterDetailsModal.querySelector('#modal_adopter_id');
            adopter_id.textContent = adopterId;

            var adopter_name = adopterDetailsModal.querySelector('#modal_adopter_name');
            adopter_name.textContent = adopterName;

            var adopter_email = adopterDetailsModal.querySelector('#modal_adopter_email');
            adopter_email.textContent = adopterEmail;

            var adopter_income = adopterDetailsModal.querySelector('#modal_adopter_income');
            adopter_income.textContent = adopterIncome;

            var adopter_address = adopterDetailsModal.querySelector('#modal_adopter_address');
            adopter_address.textContent = adopterAddress;

            var adopter_contact = adopterDetailsModal.querySelector('#modal_adopter_contact');
            adopter_contact.textContent = adopterContact;

            var adopter_dob = adopterDetailsModal.querySelector('#modal_adopter_dob');
            adopter_dob.textContent = adoptedDOB;
            
            var adopter_occup = adopterDetailsModal.querySelector('#modal_adopter_occup');
            adopter_occup.textContent = adopterOccup;

            var adopter_gender = adopterDetailsModal.querySelector('#modal_adopter_gender');
            adopter_gender.textContent = adopterGender;

            var adopter_status = adopterDetailsModal.querySelector('#modal_adopter_status');
            adopter_status.textContent = adopterStatus;

            var adopter_created = adopterDetailsModal.querySelector('#modal_adopter_created');
            adopter_created.textContent = adopterCreated;

        });
    </script>

</html>