<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php'); ?>
    
    <section class="mt-2">
        <div class="container-fluid position-relative">
            <img src="photos/featuredPhoto.jpg" alt="photo" class="img-fluid w-100 mt-2 rounded" id="featured-photo"/>

            <div class="overlay-content position-absolute top-50 start-50 translate-middle text-center text-white p-4 p-md-5 bg-dark bg-opacity-50 rounded w-75 w-md-50 w-lg-25">
                <h2 class="mb-4 fst-normal display-5">Paws Life</h2>
                <p class="fst-normal ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci alias amet molestiae itaque non fugit quisquam consequuntur eaque nisi omnis dignissimos, nulla dolorem labore facilis ipsa iure? Tempore, modi laborum?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab quae nam dolorem non architecto natus Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio qui sint, alias quos, neque rerum explicabo modi consectetur veritatis dolore possimus eius quasi magnam odit accusamus eligendi dolores aspernatur non. Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam soluta saepe est deserunt, vitae quae ducimus tenetur quos, beatae magni dolorem? Quod est unde molestiae a suscipit magnam dolorem laboriosam. </p>
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
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse rerum, quos iure provident eius numquam! Quisquam, adipisci repudiandae, quia soluta, nostrum voluptatem at doloremque maiores corporis aliquid tenetur illo amet! Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque reiciendis accusamus libero fuga sunt, architecto adipisci. Commodi, fugiat hic magnam, quas vero excepturi deleniti, iure alias quae laborum harum sed. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptates corporis repellat in dolor, nesciunt vero id sunt aut sed saepe quam praesentium sint, expedita molestiae animi possimus ratione a laboriosam.
                    </div>
                </div>
            </div>
            <div class="col-12 position-relative ">
                <div class="bg-dark text-light p-4 rounded">
                    <div class="team-story-title">
                        <h4 class="text-dark">Our Story</h4>
                    </div>
                    <div class="team-story-desc">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse rerum, quos iure provident eius numquam! Quisquam, adipisci repudiandae, quia soluta, nostrum voluptatem at doloremque maiores corporis aliquid tenetur illo amet! Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque reiciendis accusamus libero fuga sunt, architecto adipisci. Commodi, fugiat hic magnam, quas vero excepturi deleniti, iure alias quae laborum harum sed. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptates corporis repellat in dolor, nesciunt vero id sunt aut sed saepe quam praesentium sint, expedita molestiae animi possimus ratione a laboriosam.
                    </div>
                </div>
            </div>
        </div>               
    </section>
    
    <?php include('templates/footer.php'); ?>
</html>