<?php
session_start();
$conn = new mysqli("localhost", "root", "", "blooddonation");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
$result = mysqli_query($conn, "select * from inbox WHERE sent_to = '" . $_SESSION['email'] . "'");
$conn->close();
?>
<html>
<head>
    <title>Inbox</title>
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
</html><table class="content-table" style="margin-left:500px">
            <thead>
            <tr>
                <th>Sender</th>
                <th>Note</th>
            </tr>
            </thead>
            <?php
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tbody>
            <tr>
                <td><?php echo $rows['sent_from'];?></td>
                <td><?php echo $rows['msg'];?></td>
            </tr>
            </tbody>
            <?php
                }
            ?>
        </table>