<?php
  $name=$_POST['username'];
  $email=$_POST['emailid'];
  $servername = "localhost";
  $username = "root";
  $password = "";
  $conn=new mysqli($servername,$username,$password,'blooddonation');
  if($conn->connect_error){
    die("Connection failed:" . $conn->connect_error);
  }
  echo "Connected Successfully";
  $stmt=$conn->prepare("insert into registrations(username,email)values(?,?)");
  $stmt->bind_param("ss",$name,$email);
  $stmt->execute();
  echo "User registered!";
  $stmt->close();
  $conn->close();
?>