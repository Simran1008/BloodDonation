<html>
<head>
        <title>Reset Password</title>
        <link rel="stylesheet" href="reset-style.css">

        <script>
            function validateReqFields(thisform)
            {
                var newp = thisform.newp.value;
                var pass = thisform.pass.value;
                if (newp==null || newp==""){
                    alert("Enter new password");
                    thisform.newp.focus();
                    return false;
                }
                if (newp != pass){
                    alert("Confirm Password not matching Password");
                    return false;
                }
                return true;
        
            }
        </script>
</head>
    
    <body>
        <section id="reset">
            <img src="reset-icon.png">

            <form action="conn6.php" name="frmUser" method="post" onsubmit="return validateReqFields(this)">
                <label>Enter New Password</label>
                <input type="password" name="newp" placeholder="Password">
                <input type="password" name="pass" placeholder="Confirm Password">
                <br>
                <button type="submit" style="background-color:#9f334a; height:30px; border:none; color:white; width:70px; border:1px solid #8d1b34">Submit</button>
            </form>
        </section>
    </body>
    
</html>