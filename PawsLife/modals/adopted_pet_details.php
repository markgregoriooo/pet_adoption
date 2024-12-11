<?php
?>
<!DOCTYPE html>
<html lang="en">
<div class="modal fade" data-bs-backdrop="static" id="adopted_pet_details" tabindex="-1" aria-labelledby="adopted_pet_detailsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style=" background-color: #e8d6c1; ">
            <div class="modal-header">
                <h5 class="modal-title" id="adopted_pet_detailsLabel">Adopter Details</h5>
            </div>
            <div class="modal-body">
                <!-- adopted pet details displayed as text in <p> tags -->
                <p><strong>Adopted Pet Id:</strong> <span id="modal_adopter_pet_id"></span></p>
                <p><strong>Pet Name:</strong> <span id="modal_adopted_pet_name"></span></p>
                <p><strong>Pet Gender:</strong> <span id="modal_adopted_pet_gender"></span></p>
                <p><strong>Adoption Date:</strong> <span id="adopted_pet_adoption_date"></span></p>
                <p><strong>Adopter Name:</strong> <span id="modal_adopter_name"></span></p>
                <p><strong>Adopter Email:</strong> <span id="modal_adopter_email"></span></p>
                <p><strong>Adopter Address:</strong> <span id="modal_adopter_contact"></span></p>
                <p><strong>Adopter Contact no:</strong> <span id="modal_adopter_address"></span></p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark"data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Wait for the modal to show
    var adoptedPetDetailsModal = document.getElementById('adopted_pet_details');
    adoptedPetDetailsModal.addEventListener('show.bs.modal', function(event) {
        // Get the button that triggered the modal
        var button = event.relatedTarget;

        // Extract the adopter details from the data attributes
        var adoptedPetId = button.getAttribute('data-adopted-pet-id');
        var adoptedPetName = button.getAttribute('data-adopted-pet-name');
        var adoptedPetGender = button.getAttribute('data-adopted-pet-gender');
        var adoptedPetAdoptionDate = button.getAttribute('data-adopter-adoption-date');
        var adoptedPetAdopterName = button.getAttribute('data-adopter-name');
        var adoptedPetAdopterEmail = button.getAttribute('data-adopter-email');
        var adoptedPetAdopterAddress = button.getAttribute('data-adopter-address');
        var adoptedPetAdopterContact = button.getAttribute('data-adopter-contact');


        // Set the values in the modal's <p> tags
        var adopted_pet_id = adoptedPetDetailsModal.querySelector('#modal_adopter_pet_id');
        adopted_pet_id.textContent = adoptedPetId;

        var adopted_pet_name = adoptedPetDetailsModal.querySelector('#modal_adopted_pet_name');
        adopted_pet_name.textContent = adoptedPetName;

        var adopted_pet_gender = adoptedPetDetailsModal.querySelector('#modal_adopted_pet_gender');
        adopted_pet_gender.textContent = adoptedPetGender;

        var adopted_pet_adoption_date = adoptedPetDetailsModal.querySelector('#adopted_pet_adoption_date');
        adopted_pet_adoption_date.textContent = adoptedPetAdoptionDate;

        var adopter_name = adoptedPetDetailsModal.querySelector('#modal_adopter_name');
        adopter_name.textContent = adoptedPetAdopterName;

        var adopter_email = adoptedPetDetailsModal.querySelector('#modal_adopter_email');
        adopter_email.textContent = adoptedPetAdopterEmail;

        var adopter_address = adoptedPetDetailsModal.querySelector('#modal_adopter_address');
        adopter_address.textContent = adoptedPetAdopterAddress;

        var adopter_contact = adoptedPetDetailsModal.querySelector('#modal_adopter_contact');
        adopter_contact.textContent = adoptedPetAdopterContact;

    });
</script>

</html>