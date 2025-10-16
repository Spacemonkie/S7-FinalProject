<?php
// --- PHP logic at the top ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = mysqli_connect("localhost", "root", "", "dynamic_project");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $email = $_POST['email'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!');</script>";
    } else {
        // Check if email exists
        $check = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $check);

        if (mysqli_num_rows($result) > 0) {
            // Hash new password
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Update password
            $update = "UPDATE users SET password='$new_password' WHERE email='$email'";
            if (mysqli_query($conn, $update)) {
                echo "<script>alert('Password updated successfully! Please login.'); window.location='login_phpsql.html';</script>";
            } else {
                echo "<script>alert('Error updating password.');</script>";
            }
        } else {
            echo "<script>alert('Email not found!');</script>";
        }
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>
  <div class="container">
    <div class="login-box">
      <h2>Forgot Password</h2>
      <form action="" method="POST">
        
        <div class="input-box">
            <label>Email</label>
          <input type="email" name="email" required />
          
        </div>

        <div class="input-box">
          <label>New Password</label>
          <input type="password" name="new_password" required />
        </div>

        <div class="input-box">
            <label>Confirm Password</label>
          <input type="password" name="confirm_password" required />
        </div>

        <button type="submit" class="btn">Reset Password</button>

        <div class="signup-link">
          Remembered? <a href="login_phpsql.html">Login</a>
        </div>

      </form>
    </div>
  </div>
</body>
</html>