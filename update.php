 <?php
$conn1 = mysqli_connect("localhost", "root", "", "dynamic_project");
$enteredUsername = $_POST["user"];
$enteredcontact = $_POST["contact"];

    // Check connection
    if (!$conn1) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if($enteredUsername == "admin") {
        
    }
    $check = "SELECT * FROM users WHERE username='$enteredUsername'";
    $result = mysqli_query($conn1, $check);

    $sql = "UPDATE users
    SET ph = '$enteredcontact'
    WHERE username = '$enteredUsername'";
    
    if (mysqli_query($conn1, $sql)) {
        echo "<script>alert('Updated Successfully!'); window.location='login_phpsql.html';</script>";
    } else {
        echo "<script>alert('Error occurred while updating!.Retry.'); window.location='modify.php';</script>";
    }
     mysqli_close($conn1);
    ?>