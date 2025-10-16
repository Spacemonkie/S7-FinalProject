<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="container">
    <div class="login-box">
      <h2>Registration</h2>
      <form action="registerations.php" onsubmit="href='registerations.php'" method="POST">
        
        <div class="input-box">
            <label>Username</label>
          <input type="text" name="username" required />
          
        </div>

        <div class="input-box">
            <label>Email</label>
          <input type="email" name="email" required />
          
        </div>

        <div class="input-box">
            <label>Password</label>
          <input type="password" name="password" required />
          
        </div>

        <div class="input-box">
            <label>Confirm Password</label>
          <input type="password" name="confirm_password" required />
          
        </div>

         <input type="submit" class="btn" value="Register" />
        <div class="signup-link">
          Already a Member? <a href="login_phpsql.html">Login</a>
        </div>

      </form>
    </div>
  </div>
</body>
</html>
