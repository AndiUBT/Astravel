<?php 
  session_start();

  if (isset($_SESSION['IsAdmin'])) {
      if ($_SESSION['IsAdmin'] == 1) {
          header("location: indexAdmin.php");
          exit();
      } 
      header("location: index.php");
  }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sign up</title>
        <link rel="stylesheet" href="style2.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk&display=swap" rel="stylesheet">

    </head>
    <ul id="navbar">
        <li id="logoli"> <a href="index.php"><img src="images/Logo.png" id="logo"></a></li>
        <li><a href="#con4">Book your journey</a></li>
        <li><a href="contactUs.php">Contact us</a></li>
        <li id="rightnavel"><a href="login.php">Login</a></li>
    </ul>

    <body>  

    <div class="container">

    <form class="" action="includes/signup.included.php" method="post" autocomplete="off">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>

      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>

      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email" required>
  
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
  
      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="pswrepeat" required>
  
      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>
  
      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
  
      <button type="submit" class="signupbtn" name="submit">Sign up</button>

      </form>
      <div class="clearfix">
      </div>
    </div>

 </body>
  </html>