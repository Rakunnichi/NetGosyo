<?php

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
  
     //generating vkey
     $vkey = md5(time().$name);
  
    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');
    if (mysqli_num_rows($select) > 0) {
      $message[] = 'user already exist!';
    } else {
      mysqli_query($conn, "INSERT INTO `user_form` (fullname, email, password, vkey) VALUES('$name', '$email', '$pass', '$vkey')") or die('query failed');
      $user_id = mysqli_insert_id($conn);
      mysqli_query($conn, "INSERT INTO notifications SET user_id='1', notification='A new user registered to NetGosyo. Congratulations!'");
      mysqli_query($conn, "INSERT INTO notifications SET user_id='$user_id', notification='Thank you for registering to NetGosyo. Have a happy shopping!'");
      
     
        //sending email
        $template_file = "Templates/_register-mail.php";
        $to = $email;
        $subject = "NetGosyo Project";
  
        if(file_exists($template_file)){
          $messages = file_get_contents($template_file);
        }else{
          die("template file missing");
        }
  
        
       
        $headers = "From: <b>noreply \r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  
        mail($to,$subject,$messages,$headers);
        
    
  
      $message[] = 'registered successfully! please check your email address!';
     
      
    }
  
    
  }


?>