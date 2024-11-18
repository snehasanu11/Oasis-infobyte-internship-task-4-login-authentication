<?php
session_start();


$con = mysqli_connect('127.0.0.1', 'root', '', 'newdb');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


$uemail = $_POST['uemail'];
$upass = $_POST['upass'];


$stmt = $con->prepare("SELECT * FROM newtb WHERE Email = ?");
$stmt->bind_param("s", $uemail);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($upass === $row['Password']) { // Compare plaintext password
        // Set session variables
        $_SESSION['username'] = $row['Name']; // Assuming 'Name' column exists
        header("Location: welcome.php");
        exit();
    } else {
        $_SESSION['error'] = "Invalid password!";
        header("Location: Login.php");
        exit();
    }
} else {
    $_SESSION['error'] = "User not found!";
    header("Location: Login.php");
    exit();
}

$stmt->close();
mysqli_close($con);
?>
