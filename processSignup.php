<?php
$con = mysqli_connect('127.0.0.1', 'root', '', 'newdb');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$uname = $_POST['uname'];
$uemail = $_POST['uemail'];
$upass = $_POST['upass'];

$sql = "INSERT INTO newtb (Name,Email, Password) VALUES ('$uname', '$uemail', '$upass')";

if (mysqli_query($con, $sql)) {
   echo "inserted";
} else {
    echo "not inserted";
}

mysqli_close($con);
?>
