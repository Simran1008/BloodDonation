<?php
session_start();
if(isset($_SESSION['email'])){
?>
<!DOCTYPE html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="landingStyle.css">
</head>

<body>

    <div class="video-wrapper">
        <video playsinline autoplay muted loop>
            <source src="bgVideo.mp4" type="video/mp4">
        </video>
    </div>

    <div class=content>

        <div id="contact">
            <h4>Phone: +91 9881200086</h4>
            <h4>Email: sid@gmail.com</h4>
        </div>

        <div class="navigation">
            <nav>
                <h1 style="font-size: 30px;">Haemo-Helpers <span>&#43</span></h1>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#contact" id="contactLink">Contact</a></li>
                    <li><a href="loc.php">Locate</a></li>
                    <li><a href="inbox.php">Inbox</a></li>
                    <li><a href="send.php">Outbox</a></li>
                    <li><a href="conn4.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    
        <div class="container">
            <div class="card">
                <form action="enlist.php">
                <img src="enlist_icon.jpg">
                <h2 class="heading">Enlist</h2>
                <p class="description">A few drops of your blood can help a life bloom! Enlist yourself today to give someone a second chance to live and make a difference in the world. Also, don't forget the free snacks! <span class="emoji">&#128521</span></p>
                <button type="submit" style="width: 60px;">Enlist</button>
                </form>
            </div>
        
            <div class="card">
                <img src="search_icon.jpg">
                <h2 class="heading">Search</h2>
                <p class="description">Search for the blood you need! Select by:</p>
                <div>
                    <button id="addSelect" type="button" style="margin-right: 25px;">Blood Group</button>
                    <button id="addInput" type="button" style="display: inline;">Location</button>
                </div>
    
                <form id="myForm" action="conn9.php" method="post">
                    <div id="selectContainer">
                        
                    </div>
                    <div id="inputContainer">
                        
                    </div>

                    <br><br><br>
                    <button id="searchButton" style="visibility: hidden;">Search</button>
                </form>

            </div>      
    
            <div class="card">
                <form action="donors.php">
                <img src="list_icon.jpg">
                <h2 class="heading">Donor List</h2>
                <p class="description">There is no substitute for blood. It only comes from generous donors. Have a look at the brave, caring human beings who are the reason for a smile on someone's face. Every donor is a hero! <span class="emoji">&#129505</span></p>
                <button type="submit" style="width: 60px;">Go</button>
                </form>
            </div>

            <div class="card">
                <form action="withdraw.php">
                <img src="withdraw_icon.jpg">
                <h2 class="heading">Withdraw</h2>
                <p class="description">Withdraw from your enlistment to donate blood. We're sorry to see you go. You can enlist again anytime!</p>
                <button type="submit" style="width: 60px;">Go</button>
                </form>
            </div>
        </div>
    </div>
    

    
    <script src="landingJS2.js"></script>
</body>
<?php
}
else{
    echo "Access error[linked email cant be fetched:c]";
}
?>