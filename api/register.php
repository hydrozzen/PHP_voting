<?php
include("connect.php");

// Sanitize input data
$name = mysqli_real_escape_string($connect, $_POST['name']);
$mobilenum = mysqli_real_escape_string($connect, $_POST['mobilenum']);
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$address = mysqli_real_escape_string($connect, $_POST['address']);
$image = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$role = mysqli_real_escape_string($connect, $_POST['role']);

// Check if passwords match
if ($password === $cpassword) {
    // Define a path for the uploaded image
    $uploadPath = "../uploads/";
    $uploadFile = $uploadPath . basename($image);
    
    // Check if the file is an image
    $checkImage = getimagesize($tmp_name);
    if ($checkImage !== false) {
        // Attempt to move the uploaded file
        if (move_uploaded_file($tmp_name, $uploadFile)) {
            // Hash the password before storing it
           
            
            // Insert user into the database with the correct image filename
            $insert = mysqli_query($connect, "INSERT INTO user (name, mobile, password, address, photo, role, status, votes) 
            VALUES ('$name', '$mobilenum', '$password', '$address', '$image', '$role', '0', '0')");
            
            if ($insert) {
                echo '
                <script>
                alert("Registered successfully");
                window.location = "../";
                </script>
                '; 
            } else {
                echo '
                <script>
                alert("Database error: '.mysqli_error($connect).'");
                window.location = "../routes/registration.html";
                </script>
                '; 
            }
        } else {
            echo '
            <script>
            alert("File upload failed. Please check file permissions and try again.");
            window.location = "../routes/registration.html";
            </script>
            ';
        }
    } else {
        echo '
        <script>
        alert("The uploaded file is not a valid image. Please upload a valid image.");
        window.location = "../routes/registration.html";
        </script>
        ';
    }
} else {
    echo '
    <script>
    alert("The passwords do not match. Kindly use the same password.");
    window.location = "../routes/registration.html";
    </script>
    ';
}
?>
