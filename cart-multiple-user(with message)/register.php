<?php

include 'config.php';

if (isset($_POST['submit'])) {
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
  $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

  $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');
  if (mysqli_num_rows($select) > 0) {
    $message[] = 'user already exist!';
  } else {
    mysqli_query($conn, "INSERT INTO `user_form` (name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
    $user_id = mysqli_insert_id($conn);
    mysqli_query($conn, "INSERT INTO notifications SET user_id='1', notification='A new user registered to NetGosyo. Congratulations!'");
    mysqli_query($conn, "INSERT INTO notifications SET user_id='$user_id', notification='Thank you for registering to NetGosyo. Have a happy shopping!'");
    $message[] = 'registered successfully! please check your email address!';
   
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="css/login-style.css" />
  <link rel="stylesheet" href="css/style.css">
  
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>

<body>

  <?php
  if (isset($message)) {
    foreach ($message as $message) {
      echo '
      <div class="wrapper role="alert" onclick="this.remove();"> 
      <div class="toast success ">
      <div class="container-1">
          <i class="fas fa-bell"></i>
      </div>
      <div class="container-2">
          <p>'. $message .'</p>
          <p></p>
      </div>
     
      </div>
      </div>';
      
      

    }
  }
  ?>

  <div class="form-container">

    <form action="" method="post" style="margin-top: 64px;">
      <h2 class="title">Sign Up</h2>
      <div class="input-field">
        <i class="fas fa-user"></i>
        <input type="text" required placeholder="Name" class="form-control" name="name" autocomplete="on">
      </div>
      <div class="input-field">
        <i class="fas fa-envelope"></i>
        <input type="email" required placeholder="Email Address" class="form-control" name="email" autocomplete="on">
      </div>
      <div class="input-field">
        <i class="fas fa-asterisk"></i>
        <input type="password" required placeholder="Password" class="form-control" name="password" autocomplete="on">
      </div>
      <div class="input-field">
        <i class="fas fa-asterisk"></i>
        <input type="password" required placeholder="Confirm Password" class="form-control" name="cpassword" autocomplete="on">
      </div>
      <input type="submit" name="submit" class="btn" value="register now">
      <p>Already have an account? <a href="login.php">Login Now!</a> </p>
    </form>
  </div>

</body>

</html>