<?php
$conn = new mysqli("localhost", "root", "", "blooddonation");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
$sql = " SELECT * FROM donors ";
$result = $conn->query($sql);
$conn->close();
?>
<html>
<head>
    <title>Donors</title>
    <link  rel="stylesheet" href="donors-style.css">
    <style>
        body {
            background-image: url("tableBG.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>

</body>
</html><table class="content-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Contact</th>
                <th>Location</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Purpose</th>
                <th>Medical History</th>
                <th>email</th>
            </tr>
            </thead>
            <?php
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tbody>
            <tr>
                <td><?php echo $rows['Name'];?></td>
                <td><?php echo $rows['BloodType'];?></td>
                <td><?php echo $rows['Contact'];?></td>
                <td><?php echo $rows['Location'];?></td>
                <td><?php echo $rows['Age'];?></td>
                <td><?php echo $rows['Gender'];?></td>
                <td><?php echo $rows['Purpose'];?></td>
                <td><?php echo $rows['MedicalHistory'];?></td>
                <td><?php echo $rows['email'];?></td>
            </tr>
            </tbody>
            <?php
                }
            ?>
        </table>