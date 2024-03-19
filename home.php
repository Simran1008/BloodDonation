<!DOCTYPE html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="app.css">

    <script>
      function validateReqFields(thisform)
      {
        var name = thisform.username.value;
        var emailid = thisform.emailid.value;
        var password = thisform.pass1.value;
        var pass2 = thisform.pass2.value;
        if (name==null || name==""){
          alert("Enter name");
          thisform.username.focus();
          return false;
        }
        if (emailid==null || emailid==""){
          alert("Enter email id");
          thisform.emailid.focus();
          return false;
        }
        if (password==null || password==""){
          alert("Enter password");
          thisform.pass1.focus();
          return false;
        }
        if (password != pass2){
          alert("Confirm Password not matching Password");
          thisform.pass2.focus();
          return false;
        }
        return true;
        
      }
    </script>
    
</head>

<body>
    <div class="main">
        <video playsinline autoplay muted loop class="vdeo">
          <source src="rgst2.mp4" type="video/mp4">
      </video>
      <div class="content">
        <div class="left-section">
          <div class="gif-bg"><img src="rgst.gif" class="gif"/></div>
        </div>
  
      <div class="right-section">
        <div id="register">
          <form action="checkotp.php" method="post" onsubmit="return validateReqFields(this)">
            <div style="text-align: center; color: #8e1d3d; font-size: 26px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin: 8px; font-weight: 600;">Please provide us with your:</div>
              <div class="row g-3 align-items-center">
                  <!-- <div class="col-auto">
                    <label for="name" class="col-form-label">Name</label>
                  </div> -->
                  <div class="col-auto w-full">
                    <input type="text" id="name" class="form-control" aria-describedby="passwordHelpInline" name="username" placeholder="Name">
                  </div>
              </div>
              <div class="row g-3 align-items-center">
                  <!-- <div class="col-auto">
                    <label for="email" class="col-form-label">Email</label>
                  </div> -->
                  <div class="col-auto w-full">
                  <input type="email" id="mail" class="form-control" aria-describedby="passwordHelpInline" name="emailid" placeholder="Email">
                  </div>
              </div>
              <div class="row g-3 align-items-center">
                  <!-- <div class="col-auto">
                    <label for="password" class="col-form-label">Password</label>
                  </div> -->
                  <div class="col-auto w-full">
                  <input type="password" id="password" class="form-control" aria-describedby="passwordHelpInline" name="pass1" placeholder="Password">
                  </div>
              </div>
              <div class="row g-3 align-items-center">
                  <!-- <div class="col-auto">
                    <label for="email" class="col-form-label">Email</label>
                  </div> -->
                  <div class="col-auto w-full">
                  <input type="password" id="password2" class="form-control" aria-describedby="passwordHelpInline" name="pass2" placeholder="Confirm Password">
                  </div>
              </div>
            <button class="btn btn-danger" style="font-weight: 500;" type="submit">Register</button>
          </form>
          <div id="login">
            <form action="login.html">
              <p style="font-size: 20px; color: #701616; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Already a user? <a href="login.html" style="color: black; text-decoration:underline">Login</a> </p>
            </form>
            
          </div>
          </div>
      </div>
    </div>

    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>