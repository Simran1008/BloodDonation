<?php
session_start();
$em2=$_SESSION['email'];
$conn = new mysqli("localhost", "root", "", "blooddonation");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
$sql = "delete from donors where email='$em2'";
if ($conn->query($sql) === TRUE) {
    header("Location:landing.php");
  } else {
    echo "Error withdrawing" . $conn->error;
  }  
?>