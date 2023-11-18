<?php
include 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';




if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $checkoutpass = mysqli_real_escape_string($conn, md5($_POST['checkpass']));
    $concheckoutpass = mysqli_real_escape_string($conn, md5($_POST['concheckpass']));
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  
     //generating vkey
     $vkey = md5(time().$name);
    
    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' ") or die('query failed');
    if (mysqli_num_rows($select) > 0) {
      $message[] = 'User already exist!';

    }   
    else if($pass != $cpass){
      $message[] = 'Password does not match!';
    }

    else if($checkoutpass != $concheckoutpass){
        $message[] = 'Checkout Password does not match!';
      }
    
    else {
      mysqli_query($conn, "INSERT INTO `user_form` (fullname, email, username, password, checkout_pass, phonenumber, vkey) VALUES('$name', '$email', '$username', '$pass', '$checkoutpass', '$phone', '$vkey')") or die('query failed');
      $user_id = mysqli_insert_id($conn);
      mysqli_query($conn, "INSERT INTO notifications SET user_id='1', notification='A new user registered to NetGosyo. Congratulations!'");
      mysqli_query($conn, "INSERT INTO notifications SET user_id='$user_id', notification='Thank you for registering to NetGosyo. Have a happy shopping!'");
      
     
        //sending email
        $mail = new PHPMailer(true);

        try {
          //Server settings
          $mail->isSMTP();                                            //Send using SMTP
          $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
          $mail->Username   = 'netgosyo398@gmail.com';                     //SMTP username
          $mail->Password   = 'oxohqqatqijavfza';                               //SMTP password
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
          $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
      
          //Recipients
          $mail->setFrom('netgosyo398@gmail.com', 'NetGosyo Team');
          $mail->addAddress( $email, $name);     //Add a recipient
         
      
         
          //Content
          $mail->isHTML(true);                                  //Set email format to HTML
          $mail->Subject = 'Email Verfication';
          $template_file = "Templates/register_mail_template.php";
          $mail->Body    = "Click the link to Verify your Email Address <a href='http://localhost:3000/NetGosyo/cart-multiple-user(with%20message)/verify.php?vkey=$vkey'>Verify Account</a>";
          // file_get_contents($template_file);
         
          $mail->send();
          $message[] = 'registered successfully! please check your email address!';

      } catch (Exception $e) {
          $message[] =  "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }

    }
  
    
  }


?>


<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/logo.png" type="image/x-icon">
    <link href="css/user-seller.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 form-block px-4">
                <div class="col-lg-8 col-md-6 col-sm-8 col-xs-12 form-box">
                    <div class="text-center mb-3 mt-5">
                        <img src="assets/logo-text.png" width="150px">
                    </div>
                    <h4 class="text-center mb-4">
                        Create an account
                    </h4>

                    <?php
                        if (isset($message)) {
                        foreach ($message as $message) {
                        echo '
                        <div class="alert alert-warning alert-dismissible fade show" role="alert" >
                        <strong>'. $message .'</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
      
      

                            }
                            }
                        ?>

                    <form action="" method="post">
                        <div class="form-input">
                            <span><i class="fa fa-user"></i></span>
                            <input type="text" name="username" placeholder="Username" required>
                        </div>

                        <div class="form-input">
                            <span><i class="fa fa-user"></i></span>
                            <input type="text" name="name" placeholder="Full Name" required>
                        </div>

                        <div class="form-input">
                            <span><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" placeholder="Email Address" tabindex="10" required>
                        </div>

                        <div class="form-input">
                            <span><i class="fa fa-phone"></i></span>
                            <input type="number" name="phone" placeholder="Phone Number" tabindex="10" required>
                        </div>

                        <div class="form-input">
                            <span><i class="fa fa-key"></i></span>
                            <input type="password" name="password" placeholder="Password" required>
                        </div>

                        <div class="form-input">
                            <span><i class="fa fa-key"></i></span>
                            <input type="password" name="cpassword" placeholder="Confirm Password" required>
                        </div>

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Create A Checkout Password</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label"><b>Checkout
                                                    Passord:</b></label>
                                            <input type="password" name="checkpass" class="form-control" tabindex="10"
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label"><b>Confirm Checkout
                                                    Passord:</b></label>
                                            <input type="password" name="concheckpass" class="form-control"
                                                tabindex="10" required>
                                        </div>


                                        <br>
                                        <h3 class="text-center">What is A Checkout Password?</h3>

                                        <p class="text-justify">

                                            To guarantee that only the account owner can make purchases and prevent
                                            inadvertent checkouts, users will be asked to create a checkout password
                                            upon registration and each time they go through the checkout process.
                                            <br>
                                            <br>
                                            <b>What makes a good Checkout Password?</b>
                                            <br>
                                            • At least 8 characters long
                                            <br>
                                            • Random and difficult to guess
                                            <br>
                                            • Never re-used across different websites.
                                            <br>
                                            <br>
                                            Your best password is also one that is easy to remember. That might seem
                                            tricky if it has to be long and random, but in actual fact the strongest of
                                            passwords can be very easy to remember.
                                            <br>
                                            <br>

                                            <b>What should I pay attention to?</b>
                                            <br>
                                            • Remember to write down your checkout password.
                                            <br>
                                            • You can create a checkout password only once.
                                            <br>
                                            • Never divulge your checkout password to third parties.
                                            <br>
                                            <br>
                                            Since a checkout password can only be created once, we advise making a note
                                            of it so you won't forget it. In the event that it is forgotten, please
                                            message <b>NetGosyo</b>  through the website or send an email to
                                            <b>netgosyo398@gmail.com</b>. 

                                        </p>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="submit"
                                            class="btn color-checkout-bg">Register</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="mb-3">
                            <button type="submit" data-toggle="modal" data-target="#exampleModal"
                                data-whatever="@getbootstrap" class="btn btn-block">
                                Proceed
                            </button>
                        </div>

                        <div class="text-center mb-5">
                            Already have an account?
                            <a class="login-link" href="login.php">Login here!</a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-6 d-none d-lg-block image-container"></div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>