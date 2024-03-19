<?php
session_start();
$em1 = $_SESSION['email'];
$conn = new mysqli("localhost", "root", "", "blooddonation");
if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}
$sql = "SELECT * FROM donors WHERE email='$em1'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) === 1) {
    ?>
    <html>

    <head>
        <title>Withdraw</title>
        <link rel="stylesheet" href="withdraw-style.css">
    </head>

    <body>
        <section>
            <form action="conn8.php">
                <p>Are you sure you want to withdraw?</p>
                <button type="submit">Withdraw</button>
                <br>
                <a href="landing.php">Cancel</a>
            </form>
        </section>
    </body>
    </html>
    <?php
}
else{
    ?>
    <html>
    <head>
        <title>Withdraw</title>
        <link rel="stylesheet" href="withdraw-style.css">
    </head>
    
    <body>
        <section>
            <h1>Sorry, looks like you haven't enlisted yet</h1>
        </section>
    </body>
    </html>
    <?php
}
?>