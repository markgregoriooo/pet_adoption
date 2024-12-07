// Wait for the modal to show
var catDetailsModal = document.getElementById('cat_details');
catDetailsModal.addEventListener('show.bs.modal', function (event) {
    // Get the button that triggered the modal
    var button = event.relatedTarget;
    
    // Extract the cat details from the data attributes
    var catId = button.getAttribute('data-cat-id');
    var catName = button.getAttribute('data-cat-name');
    var catGender = button.getAttribute('data-cat-gender');
    var catPhotoBase64 = button.getAttribute('data-cat-photo');
    var catPhotoType = button.getAttribute('data-cat-photo-type');
    var catDescription = button.getAttribute('data-cat-description');
    
    // Set the values in the modal's <p> tags
    var modalCatIdField = catDetailsModal.querySelector('#modal_cat_id');
    modalCatIdField.textContent = catId;

    var modalCatNameField = catDetailsModal.querySelector('#modal_cat_name');
    modalCatNameField.textContent = catName;

    var modalCatGenderField = catDetailsModal.querySelector('#modal_cat_gender');
    modalCatGenderField.textContent = catGender;

    var modalCatDescriptionField = catDetailsModal.querySelector('#modal_cat_description');
    modalCatDescriptionField.textContent = catDescription;

    var modalCatPhoto = catDetailsModal.querySelector('#modal_cat_photo');
    modalCatPhoto.src = "data:" + catPhotoType + ";base64," + catPhotoBase64;
});
















    const button = document.getElementById("adopt-btn");edit-adopted-pet-btn
    const edtAdptedPetCatBtn = document.getElementById("edit-adopted-pet(cat)-btn");

    // intro button
    button.addEventListener("click", () =>{
        window.location.href = "adopt-login.php";
    });
    button.addEventListener("mouseover", () =>{
        button.textContent = "Apply Now";
    });

// edit button for adopted pet
edtAdptedPetCatBtn.addEventListener("click", () =>{
    window.location.href = "edit-adopted-pet-cat.php";
});

