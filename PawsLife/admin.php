<?php
    // connect to database
    include('config/db_connect.php');

    //prepared statement for USER ACCOUNTS table
    $stmt1 = $conn->prepare("SELECT * FROM user_accounts WHERE is_deleted = FALSE ORDER BY created_at");
    //execute
    $stmt1->execute();
    //get the result
    $result1 = $stmt1->get_result();
    // fetch the resulting rows as an array
    $userAccounts = $result1->fetch_all(MYSQLI_ASSOC);


    //prepared statemnt for ADOPTER table
    $stmt2 = $conn->prepare("SELECT * FROM adopters WHERE is_deleted = FALSE ORDER BY created_at");
    //execute 
    $stmt2->execute();
    //get result
    $result2 = $stmt2->get_result();
    // fetch the resulting rows as an array
    $adopters = $result2->fetch_all(MYSQLI_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
 <?php include('templates/adminHeader.php') ?>
    <section class=" pt-5 pb-3 bg-secondary">

        <section id="adopted-pets-database">
        <div class="bg-dark container mb-5 p-3 ">
            <h2 style="color: bisque;">User Accounts</h2>        
            <div class="table-responsive">
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



        <section id="adopters-database">
        <div class="bg-dark container mt-3 mb-5 p-3 ">
            <h2 style="color: bisque;">Adopters</h2>        
            <div class="table-responsive">
            <table class="table table-striped table-hover table-success table-bordered">
            <thead class="table-warning">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Income</th>
                    <th>Address</th>
                    <th>Phone no.</th>
                    <th>Created</th>
                    <th>Deleted</th>
                    <th>is_Deleted</th>
                    <th>Deleted_at</th>
                    <th>adptr_img_url</th>
                </tr>
                </thead>
                <tbody>
                    <?php //for():?>
                        <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                        </tr>
                        <?php //endfor;?>
                </tbody>
            </table>
            </div>
        </div>
        </section>


        <section id="adopted-pets-database">
        <div class="bg-dark container mt-3 mb-5 p-3 ">
            <h2 style="color: bisque;">Adopted Pets</h2>        
            <div class="table-responsive">
            <div class="table-responsive">
            <table class="table table-striped table-hover table-success table-bordered">
            <thead class="table-warning">
                <tr>
                    <th>Adopted_pet_id</th>
                    <th>Pet_id</th>
                    <th>Adopter_id</th>
                    <th>Adoption_date</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>is_Deleted</th>
                    <th>Deleted_at</th>
                </tr>
                </thead>
                <tbody>
                    <?php //for():?>
                        <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                        </tr>
                        <?php //endfor;?>
                </tbody>
            </table>
            </div>
            </div>
        </div>
        </section>



        <section id="cats-database">
        <div class="bg-dark container mt-3 mb-5 p-3 ">
            <h2 style="color: bisque;">Cats</h2>        
            <div class="table-responsive">
            <table class="table table-striped table-hover table-success table-bordered">
            <thead class="table-warning">
                <tr>
                    <th>Cat_id</th>
                    <th>Pet_id</th>
                    <th>Color</th>
                    <th>is_indoor</th>
                    <th>litter_trained</th>
                    <th>cat_img_url</th> 
                </tr>
                </thead>
                <tbody>
                    <?php //for():?>
                        <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                        </tr>
                        <?php //endfor;?>
                </tbody>
            </table>
            </div>
        </div>
        </section>

        <section id="dogs-database">
        <div class="bg-dark container mt-3 mb-5 p-3 ">
            <h2 style="color: bisque;">Dogs</h2>        
            <div class="table-responsive">
            <table class="table table-striped table-hover table-success table-bordered">
            <thead class="table-warning">
                <tr>
                    <th>Dog_id</th>
                    <th>Pet_id</th>
                    <th>is_leash_trained</th>
                    <th>Size</th>
                    <th>dog_img_url</th> 
                </tr>
                </thead>
                <tbody>
                    <?php //for():?>
                        <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@exam</td>
                        </tr>
                        <?php //endfor;?>
                </tbody>
            </table>
            </div>
        </div>
        </section>


        <section id="donators-database">
        <div class="bg-dark container mt-3 mb-5 p-3 ">
            <h2 style="color: bisque;">Donators</h2>        
            <div class="table-responsive">
            <table class="table table-striped table-hover table-success table-bordered">
            <thead class="table-warning">
                <tr>
                    <th>Donator_id</th>
                    <th>Name</th>
                    <th>email</th>
                    <th>Phone no.</th>
                    <th>Amount</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>is_Deleted</th>
                    <th>Deleted_at</th>
                    <th>dntr_img_url</th>
                </tr>
                </thead>
                <tbody>
                    <?php //for():?>
                        <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                        </tr>
                        <?php //endfor;?>
                </tbody>
            </table>
            </div>
        </div>
        </section>
    </section>
 <?php include('templates/adminFooter.php') ?>
</html>