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
          		<div class="close-button" onclick="closeForm()">x</div>
          		<div class="form-title">Sign In</div>

              <form action="assets/php/validate.php" method="post">
          		<div class="input-group">
          			<input type="text" id="name" onblur="checkInput(this)" name="username" />
          			<label for="name">Username</label>
          		</div>
          		<div class="input-group">
          			<input type="password" id="password" onblur="checkInput(this)" name="password" />
          			<label for="password">Password</label>
          		</div>
              <div class="click-group">
                <div class="col">
                  <p class="remember">Remember Me</p>
                </div>
                <div class="col">
                  <div class="show">
                    <input type="checkbox" id="chk">
                    <label id="showhide" class="label">Show Password</label>
                  </div>
                </div>
              </div>
          		<div><input class="form-button" onclick="closeForm()" type="submit" name="submit" value="Login"></div>
            </form>
            
              <div class="form-button" onclick="closeForm()">Sign Up</div>
              <div class="form-forgot">Forgot Password?</div>
          	</div>
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
