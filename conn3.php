<?php
session_start();
$conn = new mysqli("localhost", "root", "", "blooddonation");
if($conn->connect_error){
    die("Connection failed:" . $conn->connect_error);
  }
echo "Connected Successfully";
$uname=$_POST["username"];
$pass=$_POST["password"];
$sql = "SELECT * FROM registrations WHERE username='$uname' AND password='$pass'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {

    $row = mysqli_fetch_assoc($result);

    if ($row['username'] === $uname && $row['password'] === $pass) {

        echo "Logged in!";

        $_SESSION['username'] = $row['username'];

        $_SESSION['email'] = $row['email'];

        $_SESSION['password'] = $row['password'];

        header("Location: landing.php");

        exit();
    }
}
else {
    echo "User does not exist in system";
}
$conn->close();
?>