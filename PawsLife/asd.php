<?php
if (isset($_POST['submit'])) {
    // FOR UPLOAD PHOTO
        // Check if file is uploaded without errors
        if (isset($_FILES['cat_photo']) && $_FILES['cat_photo']['error'] == 0) {
                
            // Get file details
            $fileTmpPath = $_FILES['cat_photo']['tmp_name'];  // Temporary file path
            $fileName = $_FILES['cat_photo']['name'];         // Original file name
            $fileSize = $_FILES['cat_photo']['size'];         // File size in bytes
            $fileType = $_FILES['cat_photo']['type'];         // MIME type of the file
            
            // Open the file and read the content
            $fileData = file_get_contents($fileTmpPath);  // Read the file data into a variable
            
            // Connect to the database (make sure to use correct credentials)
            include('../config/db_connect.php');

            //query for file
            $query = "INSERT INTO cats (photo_name, photo_data, photo_size, photo_type) VALUES (?, ?, ?, ?)";

            //prepare the sql statement
            $stmt = $conn->prepare($query);

            if($stmt){
                //bind parameter/s
                $stmt->bind_param("ssis", $fileName, $fileData, $fileSize, $fileType);
                
                if($stmt->execute()){
                    // photo uploaded
                    echo      
                    "<script>
                        alert('Photo uploaded.');
                    </script>";
                }else{
                    echo "Error uploading photo: " .$stmt->error;;
                }

            }else{
                echo "Error uploading photo: " . mysqli_error($conn);
            }
        }else{
            echo "haha";
        }

}
?>

<!-- for create table in mysql:
CREATE TABLE photos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    photo_name VARCHAR(255),
    photo_data LONGBLOB,
    photo_size INT,
    photo_type VARCHAR(50)
); -->

DISPLAY PHOTO
<?php
// Check if the image ID is passed via URL, e.g., retrieve.php?id=1
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Establish a database connection (update with your credentials)
    $conn = mysqli_connect('localhost', 'username', 'password', 'database_name');
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the query to retrieve the image data
    $query = "SELECT photo_name, photo_data, photo_type FROM photos WHERE id = ?";
    
    // Prepare and bind the statement
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "i", $id); // Bind the ID as an integer

        // Execute the statement
        mysqli_stmt_execute($stmt);

        // Bind the result to variables
        mysqli_stmt_bind_result($stmt, $photo_name, $photo_data, $photo_type);

        // Fetch the result
        if (mysqli_stmt_fetch($stmt)) {
            // Set the appropriate content-type header based on the file type
            header("Content-Type: " . $photo_type);
            
            // Output the image data
            echo $photo_data;
        } else {
            echo "No image found with this ID.";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "No ID specified.";
}
?>
<?php
// Insert the file into the database
        $query = "INSERT INTO photos (photo_name, photo_data, photo_size, photo_type) VALUES (?, ?, ?, ?)";
        
        // Prepare the SQL statement
        if ($stmt = mysqli_prepare($conn, $query)) {
            // Bind the parameters (s for string, i for integer)
            mysqli_stmt_bind_param($stmt, "ssis", $fileName, $fileData, $fileSize, $fileType);
            
            // Execute the query
            if (mysqli_stmt_execute($stmt)) {
                echo "Photo uploaded successfully!";
            } else {
                echo "Error uploading photo: " . mysqli_error($conn);
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            echo "Error preparing statement: " . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
        
        
    ?>