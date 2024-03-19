<?php
session_start();
$newp=$_POST['newp'];
$uname = $_SESSION['username'];
$conn = new mysqli("localhost", "root", "", "blooddonation");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
$sql = "UPDATE registrations set password='$newp' where username='$uname'";
if ($conn->query($sql) === TRUE) {
    echo "Password reset successfully!";
    header("Location:login.html");
  } else {
    echo "Error resetting password" . $conn->error;
  }  
?>