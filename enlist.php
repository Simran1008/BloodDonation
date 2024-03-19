<?php
session_start();
if(isset($_SESSION['email'])){
    $eme = $_SESSION['email'];
    $conn = new mysqli("localhost", "root", "", "blooddonation");
    if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
    }
    $sql = "SELECT * FROM donors WHERE email='$eme'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 0) {
?>
<!DOCTYPE html>
    <head>
        <title>Enlisting</title>
        <link rel="stylesheet" href="enlist-style.css">

        <script>
            function validateReqFields(thisform)
            {
                var name = thisform.name.value;
                var contact = thisform.contact.value;
                var location = thisform.location.value;
                var age = thisform.age.value;
                var purpose = thisform.purpose.value;
                var medical = thisform.medical.value;

                if (name==null || name==""){
                    alert("Enter name");
                    thisform.name.focus();
                    return false;
                }
                if (contact==null || contact==""){
                    alert("Enter contact");
                    thisform.contact.focus();
                    return false;
                }
                if (location==null || location==""){
                    alert("Enter location");
                    thisform.location.focus();
                    return false;
                }
                if (age==null || age==""){
                    alert("Enter age");
                    thisform.age.focus();
                    return false;
                }
                if (purpose==null || purpose==""){
                    alert("Enter purpose");
                    thisform.purpose.focus();
                    return false;
                }
                if (medical==null || medical==""){
                    alert("Enter medical history");
                    thisform.medical.focus();
                    return false;
                }

                return true;
        
            }
        </script>

    </head>
    <body>
        <div>
        <img src="en-icon.jpg">
        
        <section id="enlist">
            <form action="conn7.php" method="post" onsubmit="return validateReqFields(this)">
                Name<input type="text" name="name">
                <br>
                Blood Type
                <select name="type">
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>
                <br>
                Contact<input type="text" name="contact"><br>
                Location<input type="text" name="location"><br>
                Age<input type="text" name="age"><br>
                Gender
                <select name="gender">
                    <option value="Male" name="gender">Male</option>
                    <option value="Female" name="gender">Female</option>
                    <option value="Other" name="gender">Other</option>
                </select>
                <br>
                Purpose
                <textarea name="purpose" rows="3" cols="30"></textarea>
                <br>
                Medical History
                <textarea name="medical" rows="3" cols="30"></textarea>

                <br>
                <button type="submit">Enlist</button>
            </form>
        </section>
        </div>
    </body>
</html>
<?php
}
?>
<?php
if(mysqli_num_rows($result) !== 0){
    echo "Already enlisted!";
}
?>
<?php
}
?>