<?php 
?>
<!DOCTYPE html>
<html lang="en">
    <div class="modal fade" data-bs-backdrop="static" id="dog_details" tabindex="-1" aria-labelledby="dog_detailsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dog_detailsLabel">dog Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- dog details displayed as text in <p> tags -->
                    <p><strong>dog ID:</strong> <span id="modal_dog_id"></span></p>
                    <p><strong>dog Name:</strong> <span id="modal_dog_name"></span></p>
                    <p><strong>Gender:</strong> <span id="modal_dog_gender"></span></p>
                    <p><strong>dog Age:</strong> <span id="modal_dog_age"></span></p>
                    <p><strong>Date of Birth:</strong> <span id="modal_dog_dob"></span></p>
                    <p><strong>Adopted:</strong> <span id="modal_dog_adopted"></span></p>
                    <p><strong>Created at:</strong> <span id="modal_dog_created"></span></p>
                    <p><strong>Leash Trained:</strong> <span id="modal_dog_leash_trained"></span></p>
                    <p><strong>Size:</strong> <span id="modal_dog_size"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn " style="background-color: bisque;" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
          // Wait for the modal to show
        var dogDetailsModal = document.getElementById('dog_details');
        dogDetailsModal.addEventListener('show.bs.modal', function (event) {
            // Get the button that triggered the modal
            var button = event.relatedTarget;
            
            // Extract the dog details from the data attributes
            var dogId = button.getAttribute('data-dog-id');
            var dogName = button.getAttribute('data-dog-name');
            var dogGender = button.getAttribute('data-dog-gender');
            var dogAge = button.getAttribute('data-dog-age');
            var dogDob = button.getAttribute('data-dog-dob');
            var dogAdopted = button.getAttribute('data-dog-adopted');
            var dogCreated = button.getAttribute('data-dog-created');
            var dogLeash = button.getAttribute('data-dog-leash-trained');
            var dogSize = button.getAttribute('data-dog-size');


            // Set the values in the modal's <p> tags
            var dog_id = dogDetailsModal.querySelector('#modal_dog_id');
            dog_id.textContent = dogId;

            var dog_name = dogDetailsModal.querySelector('#modal_dog_name');
            dog_name.textContent = dogName;

            var dog_gender = dogDetailsModal.querySelector('#modal_dog_gender');
            dog_gender.textContent = dogGender;

            var dog_age = dogDetailsModal.querySelector('#modal_dog_age');
            dog_age.textContent = dogAge;

            var dog_date_of_birth = dogDetailsModal.querySelector('#modal_dog_dob');
            dog_date_of_birth.textContent = dogDob;

            var dog_adopted = dogDetailsModal.querySelector('#modal_dog_adopted');
            dog_adopted.textContent = dogAdopted;
            
            var dog_created = dogDetailsModal.querySelector('#modal_dog_created');
            dog_created.textContent = dogCreated;

            var dog_leash_trained = dogDetailsModal.querySelector('#modal_dog_leash_trained');
            dog_leash_trained.textContent = dogCreated;

            var dog_size = dogDetailsModal.querySelector('#modal_dog_size');
            dog_size.textContent = dogCreated;

        });
    </script>

</html>