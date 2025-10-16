<?php
    // Database connection parameters
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "dynamic_project";

    // Establish database connection
    $connection1 = mysqli_connect($hostname, $username, $password, $database);

    // Check connection
    if (!$connection1) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve username and password from the form
        $enteredUsername = $_POST["user"];
        $enteredPassword = $_POST["pass"];
        //include 'userdetails.php';
  
        // Perform a simple query to check if the username and password match
       $query = "DELETE FROM users WHERE username='$enteredUsername' AND password = '$enteredPassword'";
       //$query = "SELECT * FROM users WHERE username = '$enteredUsername' AND password = '$enteredPassword'";
        $result = mysqli_query($connection1, $query);

            // Check if a row was returned (login successful)
            
                if($connection1->affected_rows >0) {
                echo "<script>alert('Unsubscribed successfully');window.location='userdetails.php';</script>";
                
            } else {
                echo "<script>alert('Action failed. Please check your username and password.'); window.location='userdetails.php';</script>";
            }

            // Free result set
           // mysqli_free_result($result);
        //} else {
            mysqli_error($connection1);
        //}
         
    }
mysqli_close($connection1);
    ?>