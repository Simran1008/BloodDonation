<?php
session_start();
$name = $_POST['name'];
$type = $_POST['type'];
$con = $_POST['contact'];
$loc = $_POST['location'];
$age = $_POST['age'];
$gen = $_POST['gender'];
$pur = $_POST['purpose'];
$med = $_POST['medical'];
$em = $_SESSION['email'];
$conn = new mysqli("localhost", "root", "", "blooddonation");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
$stmt = $conn->prepare("insert into donors(Name,BloodType,Contact,Location,Age,Gender,Purpose,MedicalHistory,email)values(?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssisissss", $name, $type, $con, $loc, $age, $gen, $pur, $med, $em);
$stmt->execute();
echo "Enlisted!";
$stmt->close();
$conn->close();
header("Location:landing.php");
?>