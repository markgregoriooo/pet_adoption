<!DOCTYPE html>
<html lang="en">
    <div class="modal fade" data-bs-backdrop="static" id="cat_details" tabindex="-1" aria-labelledby="cat_detailsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cat_detailsLabel">Cat Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Cat details displayed as text in <p> tags -->
                    <p><strong>Cat ID:</strong> <span id="modal_cat_id"></span></p>
                    <p><strong>Cat Name:</strong> <span id="modal_cat_name"></span></p>
                    <p><strong>Gender:</strong> <span id="modal_cat_gender"></span></p>
                    <p><strong>Cat Age:</strong> <span id="modal_cat_age"></span></p>
                    <p><strong>Date of Birth:</strong> <span id="modal_cat_dob"></span></p>
                    <p><strong>Adopted:</strong> <span id="modal_cat_adopted"></span></p>
                    <p><strong>Created at:</strong> <span id="modal_cat_created"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn " style="background-color: bisque;" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
          // Wait for the modal to show
        var catDetailsModal = document.getElementById('cat_details');
        catDetailsModal.addEventListener('show.bs.modal', function (event) {
            // Get the button that triggered the modal
            var button = event.relatedTarget;
            
            // Extract the cat details from the data attributes
            var catId = button.getAttribute('data-cat-id');
            var catName = button.getAttribute('data-cat-name');
            var catGender = button.getAttribute('data-cat-gender');
            var catAge = button.getAttribute('data-cat-age');
            var catDob = button.getAttribute('data-cat-dob');
            var catAdopted = button.getAttribute('data-cat-adopted');
            var catCreated = button.getAttribute('data-cat-created');


            // Set the values in the modal's <p> tags
            var cat_id = catDetailsModal.querySelector('#modal_cat_id');
            cat_id.textContent = catId;

            var cat_name = catDetailsModal.querySelector('#modal_cat_name');
            cat_name.textContent = catName;

            var cat_gender = catDetailsModal.querySelector('#modal_cat_gender');
            cat_gender.textContent = catGender;

            var cat_age = catDetailsModal.querySelector('#modal_cat_age');
            cat_age.textContent = catAge;

            var cat_date_of_birth = catDetailsModal.querySelector('#modal_cat_dob');
            cat_date_of_birth.textContent = catDob;

            var cat_adopted = catDetailsModal.querySelector('#modal_cat_adopted');
            cat_adopted.textContent = catAdopted;
            
            var cat_created = catDetailsModal.querySelector('#modal_cat_created');
            cat_created.textContent = catCreated;

        });
    </script>

</html>