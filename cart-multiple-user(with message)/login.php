<?php

include 'config.php';
session_start();

if (isset($_SESSION['user_id'])) {
  header('location:index.php');
}

if (isset($_POST['submit'])) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

  $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass' ") or die('query failed');
  if (mysqli_num_rows($select) > 0) {
    $row = mysqli_fetch_assoc($select);
    $_SESSION = $row;
    $verified = $row['verified'];
    $ifseller = $row['shopname'];
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['role'] = 'user';
  
    if($ifseller == 'user'){
      header('Location:index.php');
    
    }else if($verified != 1){
      $message[] = 'Please Check Your Email First To Verify your Account!';
     
    }else{
      $message[] = 'The Account your trying to login is not a User Account!';
    
    }
  } 
  else {
    $message[] = 'Incorrect Credentials!';
  }
}

if (isset($_POST['submit2'])) {
  $email = mysqli_real_escape_string($conn, $_POST['email2']);
  $pass = mysqli_real_escape_string($conn, md5($_POST['password2']));

  $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');
  if (mysqli_num_rows($select) > 0) {
    $row = mysqli_fetch_assoc($select);
    $_SESSION['user_id'] = $row['id'];
    $ifuser = $row['shopname'];
    $verified = $row['verified'];
    $_SESSION['role'] = 'seller';
   
    if($ifuser != 'user'){
     
      if($verified == 1){
        header('location:Seller_Page/index.php');
      }else{
        $message[] = 'Please Check Your Email First To Verify your Account!';
      }
    }else if($ifuser == 'user'){

      $message[] = 'The Account your trying to login is not a Seller Account!';
         
    }
   
  } else {
    $message[] = 'Incorrect Credentials!';
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/login-style.css" />
  <title>Login Account</title>
  <link rel="shortcut icon" href="assets/logo.png" type="image/x-icon">
</head>

<body>

  <?php
  if (isset($message)) {
    foreach ($message as $message) {
      echo '<div class="message" href="login.php" onclick="this.remove();" style="text-align:center;background:#333;color:white">' . $message . '</div>';
    }
  }
  ?>

  <div class="container">

    <div class="forms-container">
     
      <div class="signin-signup">
        <form action="" class="sign-in-form" method="post" id="frmUser">
          <h2 class="title">User Login</h2>

          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" required placeholder="Email Address" class="form-control" name="email" autocomplete="on">
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" class="form-control" name="password" autocomplete="on">
          </div>

          <input type="submit" value="Login" class="btn solid" name="submit" form="frmUser">

          <p class="social-text">Don't have an account? <a href="register.php">Register Here!</p>
          <div class="social-media">
            <a href="https://facebook.com" target="_blank" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://twitter.com" target="_blank" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="https://google.com" target="_blank" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="https://linkedin.com" target="_blank" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>

        <form action="" class="sign-up-form" method="post" id="frmSeller">
          <h2 class="title">Seller Login</h2>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email Address" name="email2" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" class="form-control" name="password2" autocomplete="off" required>
          </div>

          <input type="submit" class="btn" value="Login" name="submit2" form="frmSeller">

          <p class="social-text">Don`t have an account? <a href="register-seller.php">Register Here!
          </p>
          <div class="social-media">
            <a href="https://facebook.com" target="_blank" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://twitter.com" target="_blank" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="https://google.com" target="_blank" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="https://linkedin.com" target="_blank" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Switch to Seller Login</h3>
          <p>
            Got something to sell? It's time to share and earn!
            Login now to setup your shop.
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Switch
          </button>
        </div>
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>Switch to User Login</h3>
          <p>
            Looking for something without any hassle? Shop your favorite Leyte products
            online! Click the button now.
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Switch
          </button>
        </div>
      </div>
    </div>
  </div>

  <script src="js/app.js"></script>
</body>

</html>