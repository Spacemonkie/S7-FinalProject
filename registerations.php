<?php
$hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "dynamic_project";


// Database connection
$conn = mysqli_connect(hostname: $hostname, username: $username, password: "", database: $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Check if username or email already exists
$check = "SELECT * FROM users WHERE username='$username' OR email='$email'";
$result = mysqli_query($conn, $check);

if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('Username or Email already exists!'); window.location='login_phpsql.html';</script>";
} else {
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Registration Successful! Please Login.'); window.location='login_phpsql.html';</script>";
    } else {
        echo "<script>alert('Error occurred while registering.'); window.location='register.php';</script>";
    }
}

mysqli_close($conn);
?>