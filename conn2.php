<?php
session_start();
$email = $_SESSION['email'];
$name = $_SESSION['username'];
$pass = $_SESSION['pass1'];
$conn = new mysqli("localhost", "root", "", "blooddonation");
$count = 1;
$result = mysqli_query($conn, "SELECT * FROM otp_expiry WHERE otp='" . $_POST["otp"] . "' AND is_expired!=1 AND NOW() <= DATE_ADD(create_at, INTERVAL 24 HOUR)");
$count = mysqli_num_rows($result);
if (!empty($count)) {
    $result = mysqli_query($conn, "UPDATE otp_expiry SET is_expired = 1 WHERE otp = '" . $_POST["otp"] . "'");
    $success = 2;
} else {
    $success = 1;
    $error_message = "Invalid OTP!";
    echo "empty cant find";
}
if ($success == 2) {
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    $stmt = $conn->prepare("insert into registrations(username,email,password)values(?,?,?)");
    $stmt->bind_param("sss", $name, $email, $pass);
    $stmt->execute();
    echo "User registered!";
    $stmt->close();
    $conn->close();
    header("Location:landing.php");
} else {
    echo "OTP registration failed";
}
?>