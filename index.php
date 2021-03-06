<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>ARBIS</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/CSS/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="assets/CSS/signin.css" rel="stylesheet">
  
</head>

<body class="text-center">

  <div class="container">
    <div class="row justify-content-md-center marginBottom">
      <div class="col">
        <img class="img-fluid" src="assets/images/skrrt.png" alt="ARBIS logo" height="140" width="140">
      </div>
    </div>
    <div class="row justify-content-md-center">
      <div class="col-md-auto">
        
        <!--Sign In Button-->
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,500,300' rel='stylesheet' type='text/css'>
        
        
        <div id="mainButton">
         <div class="btn-text" onclick="openForm()">Sign In</div>           
         <div class="modal">
          <form action="assets/php/validate.php" method="post">
           
           
            <div class="close-button" onclick="closeForm()">x</div>
            <div class="form-title">Sign In</div>
            <div class="input-group">
              <input type="text" id="name" onblur="checkInput(this)" name="login" />
              <label for="name">Email</label>
              <span class="unit">@tdsb.on.ca</span>
            </div>
            <div class="input-group">
              <input type="password" id="password" onblur="checkInput(this)" name="password"/>
              <label for="password">Password</label>
            </div>
            <div class="click-group">
             <div class="col">
               <div class="show">
                <input type="checkbox" id="chk">
                <label id="showhide" class="label">Show Password</label>
              </div>
            </div>
          </div>
          <input class="form-button" onclick="closeForm()" type="submit" name="submit" value="Login"> 
        </form> 
      </div>
    </div>

    
    <div id="mainButton2">
      <form action="assets/php/addTeacher.php" method="post">  
       <div class="btn-text2" onclick="openForm2()">Sign Up</div>
       <div class="modal2">
        <div class="close-button" onclick="closeForm()">x</div>
        <div class="form-title">Sign Up</div>
        <div class="input-group">
         <input type="text" id="name" onblur="checkInput(this)" name="firstName" />
         <label for="name">First Name</label>
       </div>
       <div class="input-group">
         <input type="text" id="name" onblur="checkInput(this)" name="lastName" />
         <label for="name">Last Name</label>
       </div>
       <div class="input-group">
         <input type="text" id="name" onblur="checkInput(this)" name="email" />
         <label for="name">Email</label>
         <span class="unit">@tdsb.on.ca</span>
       </div>
       <div class="input-group">
         <input type="password" id="password2" onblur="checkInput(this)" name="password1" />
         <label for="password">Password</label>
       </div>
       <div class="input-group">
         <input type="password" onblur="checkInput(this)" name="password2" />
         <label for="password">Re-enter Password</label>
       </div>
       <div class="click-group">
        <div class="col">
          <div class="show">
            <input type="checkbox" id="chk2">
            <label id="showhide2" class="label">Show Password</label>
          </div>
        </div>
      </div>
      <input class="form-button" onclick="closeForm()" type="submit" name="submit" value = "Sign Up">
    </div>
  </form>
</div>

</div>
</div>
<script src="assets/javascript/javascript.js"></script>
</body>

<?php
include "assets/php/connect.php";
    // Wrap up and close connection
mysqli_close($server);
?>

</html>
