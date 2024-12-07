<!DOCTYPE html>
<html lang="en">
    <div class="modal fade" data-bs-backdrop="static" id="donator_details" tabindex="-1" aria-labelledby="donator_detailsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="donator_detailsLabel">Donator Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Donator details displayed as text in <p> tags -->
                    <p><strong>Donator ID:</strong> <span id="modal_donator_id"></span></p>
                    <p><strong>Name:</strong> <span id="modal_donator_name"></span></p>
                    <p><strong>Email:</strong> <span id="modal_donator_email"></span></p>
                    <p><strong>Donation amount:</strong> <span id="modal_donator_amount"></span></p>
                    <p><strong>Created at:</strong> <span id="modal_donator_created"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn " style="background-color: bisque;" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
          // Wait for the modal to show
        var donatorDetailsModal = document.getElementById('donator_details');
        donatorDetailsModal.addEventListener('show.bs.modal', function (event) {
            // Get the button that triggered the modal
            var button = event.relatedTarget;
            
            // Extract the donator details from the data attributes
            var donatorId = button.getAttribute('data-donator-id');
            var donatorName = button.getAttribute('data-donator-name');
            var donatorEmail = button.getAttribute('data-donator-email');
            var donatorAge = button.getAttribute('data-donator-amount');
            var donatorDob = button.getAttribute('data-donator-created');


            // Set the values in the modal's <p> tags
            var donator_id = donatorDetailsModal.querySelector('#modal_donator_id');
            donator_id.textContent = donatorId;

            var donator_name = donatorDetailsModal.querySelector('#modal_donator_name');
            donator_name.textContent = donatorName;

            var donator_email = donatorDetailsModal.querySelector('#modal_donator_email');
            donator_email.textContent = donatorEmail;

            var donator_amount = donatorDetailsModal.querySelector('#modal_donator_amount');
            donator_amount.textContent = donatorAge;

            var donator_created = donatorDetailsModal.querySelector('#modal_donator_created');
            donator_created.textContent = donatorDob;


        });
    </script>

</html>