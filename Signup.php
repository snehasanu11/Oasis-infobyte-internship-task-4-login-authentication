<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function validateSignupForm() {
            const name = document.getElementById('Name').value.trim();
            const email = document.getElementById('Email').value.trim();
            const password = document.getElementById('Pass').value;

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (name === '') {
                alert("Name cannot be empty!");
                return false;
            }

            if (!emailRegex.test(email)) {
                alert("Please enter a valid email address!");
                return false;
            }

            if (password.length < 8) {
                alert("Password must be at least 8 characters long!");
                return false;
            }

            return true; 
        }
    </script>
</head>
<body>
    <form action="processSignup.php" method="POST" onsubmit="return validateSignupForm()">
        <h2>Signup</h2>
        <label for="Name">Name</label>
        <input type="text" id="Name" name="uname" placeholder="Enter your full name" required>
        <label for="Email">Email</label>
        <input type="email" id="Email" name="uemail" placeholder="Enter your email" required>
        <label for="Pass">Password</label>
        <input type="password" id="Pass" name="upass" placeholder="Create a password" minlength="8" required>
        <button type="submit">Signup</button>
        <p>Already have an account? <a href="Login.php">Login</a></p>
    </form>
</body>
</html>
