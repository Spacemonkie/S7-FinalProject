<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Subscribe</title>
    <!-- Insert style.css file -->
    <link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>

    

    <div id="frm">
        <h1>Unsubscribe</h1>
        <h1>Login</h1>
        <form name="f2" action="unsubscribe.php"   onsubmit="return confirmUnsubscribe()" method="POST">
            <p>
                <label>UserName:</label>
                <input type="text" id="user" name="user" required/>
            </p>
            <p>
                <label>Password:</label>
                <input type="password" id="pass" name="pass" required/>
                <input type="submit" class="btn" value="Unsubscribe" />
            </p>
            
            
        </form>
    </div>
    </div>

<script>
function confirmUnsubscribe() {
    return confirm("Are you sure you want to unsubscribe? This action cannot be undone.");
}
</script>

    <!-- Validation for empty fields -->
    <script>
        function validation() {
            var id = document.f2.user.value;
            var ps = document.f2.pass.value;

            if (id.length === 0 && ps.length === 0) {
                alert("User Name and Password fields are empty");
                return false;
            } else {
                if (id.length === 0) {
                    alert("User Name is empty");
                    return false;
                }
                if (ps.length === 0) {
                    alert("Password field is empty");
                    return false;
                }
            }
        }
    </script>
</body>

</html>