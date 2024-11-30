
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

