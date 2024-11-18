<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function validateLoginForm() {
            const email = document.getElementById('Email').value.trim();
            const password = document.getElementById('Pass').value;

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(email)) {
                alert("Please enter a valid email address!");
                return false;
            }

            if (password === '') {
                alert("Password cannot be empty!");
                return false;
            }

            return true; 
        }
    </script>
</head>
<body>
    <form action="processLogin.php" method="POST" onsubmit="return validateLoginForm()">
        <h2>Login</h2>
        <?php
        session_start();
        if (isset($_SESSION['error'])) {
            echo "<p style='color: red;'>" . htmlspecialchars($_SESSION['error']) . "</p>";
            unset($_SESSION['error']);
        }
        ?>
        <label for="Email">Email</label>
        <input type="email" id="Email" name="uemail" placeholder="Enter your email" required>
        <label for="Pass">Password</label>
        <input type="password" id="Pass" name="upass" placeholder="Enter your password" required>
        <button type="submit">Login</button>
        <p>Don't have an account? <a href="Signup.php">Signup</a></p>
    </form>
</body>
</html>
