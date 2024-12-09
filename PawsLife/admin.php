<?php
    // Check if the session has already started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header('Location: admin-login.php'); // Redirect to admin login page if not logged in
        exit();
    }
    // connect to database
    include('config/db_connect.php');

    //prepared statemnt for USERA SESSIONS table
    $stmt = $conn->prepare("SELECT * FROM user_sessions ");
    //execute 
    $stmt->execute();
    //get result
    $result = $stmt->get_result();
    // fetch the resulting rows as an array
    $user_sessions = $result->fetch_all(MYSQLI_ASSOC);
    //close statement
    $stmt->close();

    //prepared statement for USER ACCOUNTS table
    $stmt = $conn->prepare("SELECT * FROM user_accounts WHERE is_deleted = FALSE ORDER BY created_at");
    //execute
    $stmt->execute();
    //get the result
    $result = $stmt->get_result();
    // fetch the resulting rows as an array
    $userAccounts = $result->fetch_all(MYSQLI_ASSOC);
    //close statement
    $stmt->close();


    //prepared statemnt for ADOPTER table
    $stmt = $conn->prepare("SELECT * FROM adopters WHERE is_deleted = FALSE ORDER BY created_at");
    //execute 
    $stmt->execute();
    //get result
    $result = $stmt->get_result();
    // fetch the resulting rows as an array
    $adopters = $result->fetch_all(MYSQLI_ASSOC);
    //close statement
    $stmt->close();

    //prepared statemnt for ADOPTED PETS table
    $stmt = $conn->prepare("SELECT * FROM adopted_pets WHERE is_deleted = FALSE ORDER BY created_at");
    //execute 
    $stmt->execute();
    //get result
    $result = $stmt->get_result();
    // fetch the resulting rows as an array
    $adopted_pets = $result->fetch_all(MYSQLI_ASSOC);
    //close statement
    $stmt->close();

    //prepared statemnt for CATS table
    $stmt = $conn->prepare("SELECT * FROM cats INNER JOIN pets ON cats.pet_id = pets.pet_id WHERE pets.is_deleted = FALSE ORDER BY pets.created_at");
    //execute 
    $stmt->execute();
    //get result
    $result = $stmt->get_result();
    // fetch the resulting rows as an array
    $cats = $result->fetch_all(MYSQLI_ASSOC);
    //close statement
    $stmt->close();

    //prepared statemnt for DOGS table
    $stmt = $conn->prepare("SELECT * FROM dogs INNER JOIN pets ON dogs.pet_id = pets.pet_id WHERE pets.is_deleted = FALSE ORDER BY pets.created_at");
    //execute 
    $stmt->execute();
    //get result
    $result = $stmt->get_result();
    // fetch the resulting rows as an array
    $dogs = $result->fetch_all(MYSQLI_ASSOC);
    //close statement
    $stmt->close();

    
    //prepared statemnt for DONATORS table
    $stmt = $conn->prepare("SELECT * FROM donators WHERE is_deleted = FALSE ORDER BY created_at");
    //execute 
    $stmt->execute();
    //get result
    $result = $stmt->get_result();
    // fetch the resulting rows as an array
    $donators = $result->fetch_all(MYSQLI_ASSOC);
    //close statement
    $stmt->close();

    




?>
<!DOCTYPE html>
<html lang="en">
 <?php include('templates/adminHeader.php') ?>
    <section class=" pt-5 pb-3 bg-secondary">
        <!-- user sessions table -->
        <section>
        <div class="bg-dark container mb-5 p-3 ">
            <h2 style="color: bisque;">User Sessions</h2>        
            <div style="max-height: 400px; overflow-y: auto; overflow-x: auto;">
            <table class="table table-striped table-hover table-success table-bordered">
            <thead class="table-warning">
                <tr>
                    <th>Session Id</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Login_time</th>
                    <th>Last_activity_time</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($user_sessions as $user_session):?>
                        <tr>
                            <td><?php echo htmlspecialchars($user_session['session_id']) ?></td>
                            <td><?php echo htmlspecialchars($user_session['user_name'])  ?></td>
                            <td><?php echo htmlspecialchars($user_session['role'])  ?></td>
                            <td><?php echo htmlspecialchars($user_session['login_time'])  ?></td>
                            <td><?php echo htmlspecialchars($user_session['last_activity_time'])  ?></td>
                        </tr>
                        <?php endforeach;?>
                </tbody>
            </table>
            </div>
        </div>
        </section>
        <!-- user accounts table -->
        <section>
        <div class="bg-dark container mb-5 p-3 ">
            <h2 style="color: bisque;">User Accounts</h2>        
            <div style="max-height: 400px; overflow-y: auto; overflow-x: auto;">
            <table class="table table-striped table-hover table-success table-bordered">
            <thead class="table-warning">
                <tr>
                    <th>Id</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th>Is_deleted</th>
                    <th>Deleted_at</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($userAccounts as $user_acc):?>
                        <tr>
                            <td><?php echo htmlspecialchars( $user_acc['user_acc_id']) ?></td>
                            <td><?php echo htmlspecialchars($user_acc['user_email'])  ?></td>
                            <td><?php echo htmlspecialchars($user_acc['username'])  ?></td>
                            <td><?php echo htmlspecialchars($user_acc['user_password_hash'])  ?></td>
                            <td><?php echo htmlspecialchars($user_acc['created_at'])  ?></td>
                            <td><?php echo htmlspecialchars($user_acc['updated_at'])  ?></td>
                            <td><?php echo htmlspecialchars($user_acc['is_deleted'])  ?></td>
                            <td><?php echo htmlspecialchars($user_acc['deleted_at'])  ?></td>
                        </tr>
                        <?php endforeach;?>
                </tbody>
            </table>
            </div>
        </div>
        </section>
        <!-- adopters table -->
        <section>
        <div class="bg-dark container mt-3 mb-5 p-3 ">
            <h2 style="color: bisque;">Adopters</h2>        
            <div style="max-height: 400px; overflow-y: auto; overflow-x: auto;">
            <table class="table table-striped table-hover table-success table-bordered">
            <thead class="table-warning">
                <tr>
                    <th>Id</th>
                    <th>name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Contact no</th>
                    <th>Date of Birth</th>
                    <th>occupation</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th>Income</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th>is_Deleted</th>
                    <th>Deleted_at</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($adopters as $adopter):?>
                        <tr>
                            <td><?php echo htmlspecialchars($adopter['adopter_id']) ?></td>
                            <td><?php echo htmlspecialchars($adopter['adopter_name']) ?></td>
                            <td><?php echo htmlspecialchars($adopter['adopter_email']) ?></td>
                            <td><?php echo htmlspecialchars($adopter['adopter_address']) ?></td>
                            <td><?php echo htmlspecialchars($adopter['adopter_phone_number']) ?></td>
                            <td><?php echo htmlspecialchars($adopter['date_of_birth']) ?></td>
                            <td><?php echo htmlspecialchars($adopter['occupation']) ?></td>
                            <td><?php echo htmlspecialchars($adopter['gender']) ?></td>
                            <td><?php echo htmlspecialchars($adopter['adopter_status']) ?></td>
                            <td><?php echo htmlspecialchars($adopter['adopter_income']) ?></td>
                            <td><?php echo htmlspecialchars($adopter['created_at']) ?></td>
                            <td><?php echo htmlspecialchars($adopter['updated_at']) ?></td>
                            <td><?php echo htmlspecialchars($adopter['is_deleted']) ?></td>
                            <td><?php echo htmlspecialchars($adopter['deleted_at']) ?></td>
                        </tr>
                        <?php endforeach;?>
                </tbody>
            </table>
            </div>
        </div>
        </section>
        <!-- adopted pets table -->
        <section>
        <div class="bg-dark container mt-3 mb-5 p-3 ">
            <h2 style="color: bisque;">Adopted Pets</h2>        
            <div style="max-height: 400px; overflow-y: auto; overflow-x: auto;">
            <table class="table table-striped table-hover table-success table-bordered">
            <thead class="table-warning">
                <tr>
                    <th>Id</th>
                    <th>Pet_id</th>
                    <th>Adopter_id</th>
                    <th>Adoption_date</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th>is_Deleted</th>
                    <th>Deleted_at</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($adopted_pets as $adopted_pet):?>
                        <tr>
                            <td><?php echo htmlspecialchars( $adopted_pet['adopted_pet_id']) ?></td>
                            <td><?php echo htmlspecialchars( $adopted_pet['pet_id']) ?></td>
                            <td><?php echo htmlspecialchars( $adopted_pet['adopter_id']) ?></td>
                            <td><?php echo htmlspecialchars( $adopted_pet['adoption_date']) ?></td>
                            <td><?php echo htmlspecialchars( $adopted_pet['created_at']) ?></td>
                            <td><?php echo htmlspecialchars( $adopted_pet['updated_at']) ?></td>
                            <td><?php echo htmlspecialchars( $adopted_pet['is_deleted']) ?></td>
                            <td><?php echo htmlspecialchars( $adopted_pet['deleted_at']) ?></td>
                        </tr>
                        <?php endforeach;?>
                </tbody>
            </table>
            </div>
            </div>
        </div>
        </section>
        <!-- cats table -->
        <section id="cats-database">
        <div class="bg-dark container mt-3 mb-5 p-3 ">
            <h2 style="color: bisque;">Cats</h2>        
            <div style="max-height: 400px; overflow-y: auto; overflow-x: auto;">
            <table class="table table-striped table-hover table-success table-bordered">
            <thead class="table-warning">
                <tr>
                    <th>Cat_id</th>
                    <th>Pet_id</th>
                    <th>Color</th>
                    <th>is_indoor</th>
                    <th>litter_trained</th>
                    <th>Photo type</th> 
                </tr>
                </thead>
                <tbody>
                    <?php foreach($cats as $cat):?>
                        <tr>
                            <td><?php echo htmlspecialchars( $cat['cat_id']) ?></td>
                            <td><?php echo htmlspecialchars( $cat['pet_id']) ?></td>
                            <td><?php echo htmlspecialchars( $cat['color']) ?></td>
                            <td><?php echo htmlspecialchars( $cat['is_indoor']) ?></td>
                            <td><?php echo htmlspecialchars( $cat['litter_trained']) ?></td>
                            <td><?php echo htmlspecialchars( $cat['photo_type']) ?></td>
                        </tr>
                        <?php endforeach;?>
                </tbody>
            </table>
            </div>
        </div>
        </section>

        <!-- dogs table -->
        <section id="dogs-database">
        <div class="bg-dark container mt-3 mb-5 p-3 ">
            <h2 style="color: bisque;">Dogs</h2>        
            <div style="max-height: 400px; overflow-y: auto; overflow-x: auto;">
            <table class="table table-striped table-hover table-success table-bordered">
            <thead class="table-warning">
                <tr>
                    <th>Dog_id</th>
                    <th>Pet_id</th>
                    <th>is_leash_trained</th>
                    <th>Size</th>
                    <th>Phot_type</th> 
                </tr>
                </thead>
                <tbody>
                    <?php foreach($dogs as $dog):?>
                        <tr>
                            <td><?php echo htmlspecialchars( $dog['dog_id']) ?></td>
                            <td><?php echo htmlspecialchars( $dog['pet_id']) ?></td>
                            <td><?php echo htmlspecialchars( $dog['is_leash_trained']) ?></td>
                            <td><?php echo htmlspecialchars( $dog['dog_size']) ?></td>
                            <td><?php echo htmlspecialchars( $dog['photo_type']) ?></td>
                        </tr>
                        <?php endforeach;?>
                </tbody>
            </table>
            </div>
        </div>
        </section>
        <!-- donators table -->
        <section id="donators-database">
        <div class="bg-dark container mt-3 mb-5 p-3 ">
            <h2 style="color: bisque;">Donators</h2>        
            <div style="max-height: 400px; overflow-y: auto; overflow-x: auto;">
            <table class="table table-striped table-hover table-success table-bordered">
            <thead class="table-warning">
                <tr>
                    <th>Donator_id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Amount</th>
                    <th>Photo type</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th>is_Deleted</th>
                    <th>Deleted_at</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($donators as $donator):?>
                        <tr>
                            <td><?php echo htmlspecialchars( $donator['donator_id']) ?></td>
                            <td><?php echo htmlspecialchars( $donator['donator_name']) ?></td>
                            <td><?php echo htmlspecialchars( $donator['donator_email']) ?></td>
                            <td><?php echo htmlspecialchars( $donator['amount']) ?></td>
                            <td><?php echo htmlspecialchars( $donator['photo_type']) ?></td>
                            <td><?php echo htmlspecialchars( $donator['created_at']) ?></td>
                            <td><?php echo htmlspecialchars( $donator['updated_at']) ?></td>
                            <td><?php echo htmlspecialchars( $donator['is_deleted']) ?></td>
                            <td><?php echo htmlspecialchars( $donator['deleted_at']) ?></td>
                        </tr>
                        <?php endforeach;?>
                </tbody>
            </table>
            </div>
        </div>
        </section>
    </section>
 <?php include('templates/adminFooter.php') ?>
</html>