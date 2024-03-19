<?php
session_start();
$uname = $_SESSION['username'];
$conn = new mysqli("localhost", "root", "", "blooddonation");
$count = 1;
$result = mysqli_query($conn, "SELECT * FROM otp_expiry WHERE otp='" . $_POST["code"] . "' AND is_expired!=1 AND NOW() <= DATE_ADD(create_at, INTERVAL 24 HOUR)");
$count = mysqli_num_rows($result);
if (!empty($count)) {
    $result = mysqli_query($conn, "UPDATE otp_expiry SET is_expired = 1 WHERE otp = '" . $_POST["code"] . "'");
    $success = 2;
} else {
    $success = 1;
    $error_message = "Invalid code!";
}
if ($success == 2) {
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
    $sql = "SELECT * FROM registrations WHERE username='$uname'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);

        if ($row['username'] === $uname) {
            $_SESSION['username'] = $row['username'];
            header("Location: reset.php");
            exit();
        }
}
} else {
    echo "Password reset failed";
}
?>