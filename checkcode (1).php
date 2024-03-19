<?php

session_start();

$conn = new mysqli("localhost", "root", "", "blooddonation");

$count = 1;

$success = 0;

$name = $_POST['username'];

$_SESSION['username'] = $name;

$sql = "SELECT * FROM registrations WHERE username='$name'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {

    $row = mysqli_fetch_assoc($result);

    if ($row['username'] === $name) {

        $_SESSION['email'] = $row['email'];

    }

}

else{

        echo "No record found";

        header("Location: home.php");

}

// generate code

$otp = rand(100000, 999999);

// Send code

require_once("mail_function.php");



$mail_status = sendpres($_SESSION['email'], $otp);



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

        <link rel="stylesheet" href="checkcode-style.css">

        <script>
                function validateReqFields(thisform)
                {
                        var code = thisform.code.value;
                        if (code==null || code==""){
                                alert("Enter otp");
                                thisform.code.focus();
                                return false;
                        }
                        return true;
                }
        </script>

</head>



<body>

    <section id="bg"></section>

    <img id="icon2" src="code-icon.jpg">

    <section id="reset">

        <img id="icon" src="checkcode-icon.jpg">

        <h2>Reset Password</h2>

        <form action="conn5.php" name="frmUser" method="post" onsubmit="return validateReqFields(this)">

                <label for="code">Enter reset code</label>

                <br>

                <input type="text" id="code" name="code">

                <br>

                <button type="submit" name="submit_code" value="Submit" class="btnSubmit">Submit</button>

        </form>

    </section>

</body>



</html>