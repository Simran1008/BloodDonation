<?php
session_start();
$conn = new mysqli("localhost", "root", "", "blooddonation");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sender=$_SESSION["email"];
$receiver=$_POST['rec'];
$msg=$_POST['mess'];
$stmt = $conn->prepare("insert into inbox(sent_from,sent_to,msg) values(?,?,?)");
$stmt->bind_param("sss",$sender,$receiver,$msg);
$stmt->execute();
echo "Sent!";
$stmt->close();
$conn->close();
header("Location:landing.php");
?>