  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
    /* Extra styling for table */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      background: rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(10px);
      border-radius: 10px;
    }

    th, td {
      padding: 12px 15px;
      text-align: center;
      color: #000000ff;
      border-bottom: 1px solid rgba(0, 0, 0, 0.97);
    }

    th {
      background: rgba(0, 0, 0, 0.2);
    }

    tr:hover {
      background: rgba(255, 255, 255, 0.9);
    }

    .container {
      width: 90%;
      max-width: 700px;
      margin: 60px auto;
      text-align: center;
    }

    h2 {
      color: #000000ff;
      margin-bottom: 20px;
    }

    a.btn {
      display: inline-block;
      background: #fff;
      color: #000;
      padding: 10px 20px;
      border-radius: 25px;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s;
    }

    a.btn:hover {
      background: #00c3ff;
      color: #fff;
    }
  </style>
  </head>
  <body>
    <div class="container">
    <h2>Registered Users</h2>

    <table>
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
         <th>contact</th>
      </tr>
 

<?php
    // Database connection parameters
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "dynamic_project";

    // Establish database connection
    $connection = mysqli_connect($hostname, $username, $password, $database);

    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve username and password from the form
        $enteredUsername = $_POST["user"];
        $enteredPassword = $_POST["pass"];
        //include 'userdetails.php';
  
        // Perform a simple query to check if the username and password match
        $query = "SELECT * FROM users WHERE username = '$enteredUsername' AND password = '$enteredPassword'";
       
        $result = mysqli_query($connection, $query);

        if ($result) {
            // Check if a row was returned (login successful)
            if (mysqli_num_rows($result) > 0) {
                echo "<script>alert('Login successfull');</script>";
            } else {
                echo "<script>alert('Login failed. Please check your username and password.'); window.location='login_phpsql.html';</script>";
            }

            // Free result set
            mysqli_free_result($result);
        } else {
            echo "Query failed: " . mysqli_error($connection);
        }

        if($enteredUsername == "admin") {
        $sql = "SELECT id, username, email,ph FROM users";
        }
        else {
        $sql = "SELECT id, username, email,ph FROM users WHERE username = '$enteredUsername' AND password = '$enteredPassword'"; 
        }
        $result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0) {
         //$row = mysqli_fetch_assoc($result);
          while ($row = mysqli_fetch_assoc($result)) {

              echo "<tr>
                      <td>" . $row['id'] . "</td>
                      <td>" . htmlspecialchars($row['username']) . "</td>
                      <td>" . htmlspecialchars($row['email']) . "</td>
                       <td>" . htmlspecialchars($row['ph']) . "</td>
                    </tr>";
          }
      } else {
          //echo "<tr><td colspan='3'>No users found</td></tr>";
      }

    }

    // Close connection
    mysqli_close($connection);
    ?>
</table>
    <br />
    <a href="modify.php" class="btn">Update contact</a>
    <a href="login_phpsql.html" class="btn">Back to Login</a>
  </div>
  </body>
  </html>
  
    