
const button = document.getElementById("adopt-btn");

// intro button
button.addEventListener("click", () =>{
    window.location.href = "adopt-login.php";
});
button.addEventListener("mouseover", () =>{
    button.textContent = "Apply Now";
});
button.addEventListener("mouseout", () => {
    button.textContent = "Adopt a Pet";
});


