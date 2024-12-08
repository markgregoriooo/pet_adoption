<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php'); ?>
    
    <section class="mt-2">
        <div class="container-fluid position-relative">
            <img src="photos/featuredPhoto.jpg" alt="photo" class="img-fluid w-100 mt-2 rounded" id="featured-photo"/>

            <div class="overlay-content position-absolute top-50 start-50 translate-middle text-center text-white p-4 p-md-5 bg-dark bg-opacity-50 rounded w-75 w-md-50 w-lg-25">
                <h2 class="mb-4 fst-normal display-5">Paws Life</h2>
                <p class="fs-normal ">
                    Focuses on rescuing, rehabilitating, and rehoming animals in need, particularly stray and abused dogs and cats. It promotes animal welfare through adoption programs, spay-neuter campaigns, and public education, encouraging responsible pet ownership. PAWS Life works to give animals a second chance at a loving and safe home. The organization also provides medical care and rehabilitation for injured animals, ensuring they recover fully before being rehomed. Volunteers and supporters play a vital role in fostering animals and spreading awareness about the importance of adoption. By partnering with communities, PAWS Life aims to create a compassionate society where every animal is valued and protected.
                </p>
                <button type="button" class="btn btn-outline-success" id="adopt-btn">Apply Now</button>
            </div>
        </div>
    </section>

    <section>
        <div class="container-fluid position-relative" id="cons-container">
            <div class="text-center" id="cons-header-container">
                <h2 class="text-dark display-4 pt-5">Considerations</h2>
                <p class="text-dark">Understand the key factors before bringing a pet into your home.</p>
            </div>
            <div class="container position-absolute" id="cons-content">
                <div class="consider container bg-dark text-center position-relative">
                    <img src="photos/financial-responsibility.webp" alt="featured photo" class="cons-image" />
                    <div class="position-absolute cons-text">
                        <h6>Financial Responsibility<br /><br />
                            <small>
                                Costs Be prepared for both initial adoption 
                                fees and ongoing expenses. This includes costs
                                for food, veterinary care, grooming, and unexpected
                                medical issues. Ensure your budget can handle these 
                                expenses comfortably, and consider setting aside
                                an emergency fund for your pet’s health.
                            </small>
                        </h6>
                    </div>
                </div>
                <div class="consider container bg-dark text-center position-relative">
                    <img src="photos/lifestyle-compatibility.avif" alt="featured photo" class="cons-image" />
                    <div class="position-absolute cons-text">
                        <h6>Lifestyle Compatibility<br /><br />
                            <small>
                                Fit Choose a pet that matches your lifestyle
                                and living space. Consider the pet’s activity level
                                and size in relation to your daily routine and home
                                environment. Make sure you can meet their needs
                                and provide a suitable living area.
                            </small>
                        </h6>
                    </div>
                </div>
                <div class="consider container bg-dark text-center position-relative">
                    <img src="photos/time-commitment" alt="featured photo" class="cons-image" />
                    <div class="position-absolute cons-text">
                        <h6>Time Commitment<br /><br />
                            <small>
                                Daily Care  Pets need regular feeding, exercise,
                                grooming, and interaction. Ensure you have the
                                time to meet these daily needs consistently.
                                Consider how a pet will fit into your routine
                                and whether you can dedicate time for their
                                care and companionship.
                            </small>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container mb-5" id="team-story-container">
            <div class="col-12 position-relative ">
                <div class="bg-dark text-light p-4 mb-3 rounded">
                    <div class="team-story-title">
                        <h4 class="text-dark">Our Team</h4>
                    </div>
                    <div class="team-story-desc">
                        We’re a group of animal lovers who believe every pet deserves a chance at happiness. From caring for animals to helping adopters find their perfect match, our team works tirelessly to make every adoption a success. Partnering with shelters and rescue groups, we’re here to create a smooth, heartfelt process for everyone involved. Each of us brings unique skills but shares the same passion: giving pets the love and care they deserve. Together, we’re committed to changing lives—both human and animal—one adoption at a time.
                    </div>
                </div>
            </div>
            <div class="col-12 position-relative ">
                <div class="bg-dark text-light p-4 rounded">
                    <div class="team-story-title">
                        <h4 class="text-dark">Our Story</h4>
                    </div>
                    <div class="team-story-desc">
                        Paw’s Life began as a dream among friends who wanted to help homeless pets find loving families. We saw the struggles of overcrowded shelters and knew we had to act. What started as a small idea has grown into a platform connecting countless pets with their forever homes. Every adoption story inspires us to keep going and make a bigger difference. This journey isn’t just about finding homes for pets; it’s about creating a world where every paw is safe and loved.
                    </div>
                </div>
            </div>
        </div>               
    </section>
    <script>
        
        const button = document.getElementById("adopt-btn");

        // intro button
        button.addEventListener("click", () =>{
            window.location.href = "adopt-login.php";
        });
        button.addEventListener("mouseover", () =>{
            button.textContent = "Apply Now";
        });
        button.addEventListener("mouseout", () => {
        button.textContent = "Adopt a Pet"; // Reset text when mouse leaves the button
        });
    </script>
    
    <?php include('templates/footer.php'); ?>
</html>