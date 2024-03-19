<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['username']) && isset($_POST['emailid'])) {
                //echo "Success1";
        } else {
                echo "ERROR";
        }
} else {
        echo "ERROR2";
}
$name = $_POST['username'];
$email = $_POST['emailid'];
$pass=$_POST['pass1'];
$_SESSION['email'] = $email;
$_SESSION['username'] = $name;
$_SESSION['pass1'] = $pass;
$error_message = "";
$conn = new mysqli("localhost", "root", "", "blooddonation");
$count = 1;
$success = 0;
// generate OTP 
$otp = rand(100000, 999999);
// Send OTP 
require_once("mail_function.php");

$mail_status = sendOTP($_SESSION['email'], $otp);

if ($mail_status == 1) {
        $result = mysqli_query($conn, "INSERT INTO otp_expiry(otp,is_expired,create_at) VALUES ('" . $otp . "', 0, '" . date("Y-m-d H:i:s") . "')");
        $current_id = mysqli_insert_id($conn);
        if (!empty($current_id)) {
                $success = 1;
        }
}
?>
<!DOCTYPE html!>

<head>
    <title>OTP Verification</title>
    <link rel="stylesheet" href="otp-style.css">

    <script>
        function validateReqFields(thisform)
        {
        var otp = thisform.otp.value;
        if (otp==null || otp==""){
          alert("Enter otp");
          thisform.otp.focus();
          return false;
        }
          return true;
        
        }
    </script>

</head>

<body>
        <section>
        <form action="conn2.php" name="frmUser" method="post" onsubmit="return validateReqFields(this)">
                <img src="otppic.jpeg">
                <h1>Authentication</h1>
                <h4>You will get an OTP via email</h4>
                <div>
                        <input type="text" id="otp" name="otp" placeholder="Enter otp">
                        <br>
                        <button type="submit">Verify</button>
                </div>
                <h4>*Do not share the otp with anyone</h4>
        </form>
        </section>
</body>
