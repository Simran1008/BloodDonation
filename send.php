<?php
session_start();
?>
<html>
    <head>
        <title>Outbox</title>
        <link rel="stylesheet" href="send-style.css">
    </head>
    <body>
        <img src="send-icon.jpg">

        <div>
        <section>
        <form action="msg.php" method="post">
            Send to (Email):<input type="email" name="rec">
            <br>
            Message:<textarea name="mess" rows="7" cols="70"></textarea>
            <br>
            <input type="submit" value="Send" id="send">
        </form>
        </section>
        </div>
    </body>
</html>