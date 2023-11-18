<?php
include 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';




if (isset($_POST['submit'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $shopname = mysqli_real_escape_string($conn, $_POST['shopname']);
    $shopdesc = mysqli_real_escape_string($conn, $_POST['shopdesc']);
   
     //generating vkey
     $vkey = md5(time().$fullname);
    
     $file_name = $_FILES['file']['name'];
     $file_tmp = $_FILES['file']['tmp_name'];
     $file_type = $_FILES['file']['type'];
     $tmp = explode('.', $_FILES['file']['name']);
     $file_ext = strtolower(end($tmp));
     $extensions = array("jpeg","jpg","png");
     
     if(in_array($file_ext,$extensions) === false){
         $message[] = 'Extension not allowed, please choose a JPEG or PNG file.';
         header('Location: seller-register.php');
         exit();
      
     }
     
     $new_file_name = time().'-'.$file_name;
    
     $destination = "user-profiles/".$new_file_name;
     move_uploaded_file($file_tmp, $destination);


    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email'") or die('query failed');
    if (mysqli_num_rows($select) > 0) {
      $message[] = 'Please Use a Different Email Address!';

    
    }   
    else if($pass != $cpass){
      $message[] = 'Password does not match!';
    }
    
    else {
      mysqli_query($conn, "INSERT INTO `user_form` (fullname, email, username, password, phonenumber, address, image, shopname, shopdesc,  vkey) VALUES('$fullname', '$email', '$username', '$pass', '$phone', '$address', '$new_file_name', '$shopname', '$shopdesc', '$vkey')") or die('query failed');
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
          $mail->addAddress( $email, $fullname);     //Add a recipient
         
      
         
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
    <link href="css/user-seller.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="assets/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 form-block px-4">
                <div class="col-lg-8 col-md-6 col-sm-8 col-xs-12 form-box">
                    <div class="text-center mb-3 mt-5">
                        <img src="assets/logo-text.png" width="150px">
                    </div>
                    <h4 class="text-center mb-4">
                        Seller Registration
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

                    <form method="post" enctype='multipart/form-data'>
                        <div class="form-input">
                            <span><i class="fa fa-user"></i></span>
                            <input type="text" name="username" placeholder="Username" required>
                        </div>

                        <div class="form-input">
                            <span><i class="fa fa-user"></i></span>
                            <input type="text" name="fullname" placeholder="Full Name" required>
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
                            <span><i class="fa fa-location-arrow" aria-hidden="true"></i></span>
                            <input type="text" name="address" placeholder="Address" required>
                        </div>

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Additional Information</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label"><b>Shop Name:</b></label>
                                            <input type="text"  name="shopname" class="form-control" tabindex="10" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label"><b>Shop
                                                Description:</b></label>
                                            <textarea class="form-control"  name="shopdesc" id="message-text" rows="6" required></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="image"><b>Shop Image</b> (Square, max 1024x1024, 2MB):</label>
                                            <input type="file" class="form-control-file" id="image" name="file" required>
                                            <small class="form-text text-muted">Max dimensions: 1024x1024 pixels, Max file size: 2MB</small>
                                        </div>

                                        <br>
                                        <h3 class="text-center">Terms and Condition:</h3>
                                        <br>
                                        <p class="text-justify">
                                            <b>1. SCOPE OF APPLICABILITY</b><br>
                                            1.1 These General Terms and Conditions of Sale (“GTCS”) apply to all sales
                                            of goods by us notwithstanding any conflicting, contrary or additional terms
                                            and conditions in any purchase order or other communication from you. No
                                            such conflicting, contrary or additional terms and conditions shall be
                                            deemed accepted by us unless and until we expressly confirm our acceptance
                                            in writing.
                                            <br>
                                            1.2 We reserve the right to change these GTCS at any time. We will give you
                                            thirty calendar days’ notice of any changes by posting notice on our
                                            website.
                                            <br>
                                            <br>
                                            <b>2. OFFERS, PURCHASE ORDERS AND ORDER CONFIRMATIONS</b><br>
                                            2.1 All offers made by us are open for acceptance within fifteen calendar
                                            days from the date of issue, unless otherwise specifically stated therein,
                                            and are subject to the availability of the goods offered.
                                            <br>
                                            2.2 All purchase orders issued by you shall specify as a minimum the type
                                            and quantity of goods requested, applicable unit prices, delivery place and
                                            requested delivery dates. No purchase order shall be binding on us unless
                                            and until confirmed by us in writing.
                                            <br>
                                            <br>
                                            <b> 3. PRICES AND TERMS OF PAYMENT</b><br>

                                            3.1 The prices for goods shall be those set forth in our order confirmation.
                                            All prices are exclusive of taxes, impositions and other charges, including,
                                            but not limited to, sales, use, excise, value added and similar taxes or
                                            charges imposed by any government authority.
                                            <br>
                                            3.2 Unless expressly stated otherwise in our order confirmation, payment for
                                            goods shall be made [insert payment terms] without offset or deduction.
                                            <br>
                                            3.3 You must submit such financial information from time to time as may be
                                            reasonably requested by us for the establishment or continuation of payment
                                            terms. We may in our sole discretion at any time change agreed payment terms
                                            without notice by requiring payment cash in advance or cash on delivery,
                                            bank guarantee, letter of credit or otherwise.
                                            <br>
                                            3.4 If you fail to pay any invoice within seven calendar days of the due
                                            date of payment, we may suspend delivery of any purchase order or any
                                            remaining balance thereof until payment is made or terminate delivery of any
                                            purchase order or any remaining balance thereof by providing written notice
                                            of termination to you within seven calendar days of the expiration of the
                                            grace period. Further, we may charge you interest from the due date to the
                                            date of payment at the rate of 1 ½ % per month. This shall be in addition
                                            to, and not in limitation of, any other rights or remedies to which we are
                                            or may be entitled at law or in equity.
                                            <br>
                                            3.5 Title to goods delivered shall remain vested in us and shall not pass to
                                            you until the goods have been paid for in full. If you fail to pay any
                                            invoice within fourteen calendar days of the due date of payment, we may
                                            retake the goods covered by the invoice. You must insure all goods delivered
                                            to their full replacement value until title to the goods has passed to you.
                                            <br>
                                            <br>
                                            <b>4. TERMS OF DELIVERY AND LATE DELIVERY</b><br>
                                            4.1 Unless expressly stated otherwise in our order confirmation, all
                                            deliveries of goods shall be [insert delivery term] in accordance with
                                            Incoterms 2010. The risk of loss of or damage to goods shall pass to you in
                                            accordance with the agreed delivery term.
                                            <br>
                                            4.2 The delivery dates of goods shall be those set forth in our order
                                            confirmation. If we fail to deliver goods within seven calendar days of the
                                            agreed delivery date, you may terminate the applicable purchase order in
                                            whole or in part (as to those goods affected by the delay) by providing
                                            written notice of termination to us within seven calendar days of the
                                            expiration of the grace period. Further, you may claim damages for any loss
                                            suffered as a result of the delay subject to the limitation of liability
                                            below. These shall be your exclusive remedies for late delivery.
                                            <br>
                                            4.3 We reserve the right to make delivery in instalments.
                                            <br>
                                            <br>

                                            <b>5. ACCEPTANCE OF GOODS</b><br>
                                            5.1 You must inspect goods delivered upon receipt. You are deemed to have
                                            accepted goods delivered unless written notice of rejection specifying the
                                            reasons for rejection is received by us within five calendar days after
                                            delivery of the goods.
                                            <br>
                                            <br>

                                            <b>6. WARRANTY</b><br>
                                            6.1 We warrant that upon delivery and for a period of twenty-four months
                                            from the date of delivery goods purchased hereunder will conform in all
                                            material respects to the applicable manufacturer’s specifications for such
                                            goods and will be free from material defects in workmanship, material and
                                            design under normal use. The warranty does not cover damage resulting from
                                            misuse, negligent handling, lack of reasonable maintenance and care,
                                            accident or abuse by anyone other than us.
                                            <br>
                                            6.2 With respect to goods which do not conform to the warranty our liability
                                            is limited, at our election, to (i) refund of the purchase price for such
                                            goods less a reasonable amount for usage, (ii) repair of such goods, or
                                            (iii) replacement of such goods; provided, however, that such goods must be
                                            returned to us, along with acceptable evidence of purchase, within fourteen
                                            calendar days after you discovered the lack of conformity or ought to have
                                            discovered it.
                                            <br>
                                            6.3 We make no other warranty, express or implied, with respect to goods
                                            delivered hereunder, and the warranty constitutes our sole obligation in
                                            respect of any lack of conformity of goods delivered hereunder (except
                                            title). In particular, we make no warranty with respect to the
                                            merchantability of goods delivered or their suitability or fitness for any
                                            particular purpose.
                                            <br>
                                            <br>
                                            <b>7. INTELLECTUAL PROPERTY RIGHTS INFRINGEMENT</b><br>
                                            7.1 If any goods delivered hereunder are held to infringe a third party’s
                                            patent, utility model, design, trademark or other intellectual property
                                            right and you are enjoined from using same, we will, at our option and
                                            expense, (i) procure for you the right to continue using the goods; (b)
                                            replace the goods with non-infringing substitutes provided that such
                                            substitutes do not entail a material diminution in performance or function;
                                            (c) modify the goods to make them non-infringing; or (d) refund the purchase
                                            price of the goods less a resonable amount for usage. The foregoing states
                                            our sole liability for intellectual property rights infringement.
                                            <br>
                                            <br>
                                            <b>8. LIMITATION OF LIABILITY</b><br>

                                            8.1 Neither of us will be entitled to, and neither of us shall be liable
                                            for, indirect, special, incidental, consequential or punitive damages of any
                                            nature, including, but not limited to, business interruption costs, loss of
                                            profit, removal and/or reinstallation costs, reprocurement costs, loss of
                                            data, injury to reputation or loss of customers. Your recovery from us for
                                            any claim shall not exceed the purchase price for the goods giving rise to
                                            such claim irrespective of the nature of the claim, whether in contract,
                                            tort, warranty or otherwise.
                                            <br>
                                            8.2 We shall not be liable for any claims based on our compliance with your
                                            designs, specifications or instructions or repair, modification or
                                            alteration of any goods by parties other than us or use in combination with
                                            other goods.
                                            <br>
                                            <br>
                                            <b>9. FORCE MAJEURE</b><br>

                                            9.1 Either party shall be excused from any delay or failure in performance
                                            if caused by reason of any occurrence or contingency beyond its reasonable
                                            control, including, but not limited to, acts of God, acts of war, fire,
                                            insurrection, strikes, lock-outs or other serious labor disputes, riots,
                                            earthquakes, floods, explosions or other acts of nature. The obligations and
                                            rights of the party so excused shall be extended on a day-to-day basis for
                                            the time period equal to the period of such excusable interruption. When
                                            such events have abated, the parties’ respective obligations shall resume.
                                            In the event the interruption of the excused party’s obligations continues
                                            for a period in excess of thirty calendar days, either party shall have the
                                            right to terminate the applicable contract(s) of sale, without liability,
                                            upon thirty calendar days’ prior written notice to the other party.
                                            <br>
                                            <br>
                                            <b>10. MISCELLANEOUS</b><br>

                                            10.1 The United Nations Convention for the International Sale of Goods shall
                                            not apply to these GTCS or to any contracts of sale entered into between us.
                                            <br>
                                            10.2 No waiver of any provision of these GTCS shall constitute a waiver of
                                            any other provision(s) or of the same provision on another occasion. Failure
                                            of either party to enforce any provision of these GTCS shall not constitute
                                            a waiver of such provision or any other provision(s) of these GTCS.
                                            <br>
                                            10.3 Should any provision of these GTCS be held by a court of competent
                                            jurisdiction to be illegal, invalid or unenforceable, such provision may be
                                            modified by such court in compliance with the law giving effect to the
                                            intent of the parties and enforced as modified. All other terms and
                                            conditions of these GTCS shall remain in full force and effect and shall be
                                            construed in accordance with the modified provision.
                                            <br>
                                            10.4 These GTCS and all contracts of sale entered into between us shall be
                                            governed by and construed in accordance with the laws of Denmark without
                                            giving effect to any choice of law or conflict of law provisions. Any suits,
                                            actions or proceedings that may be instituted by either of us against the
                                            other shall be instituted exclusively before the competent courts of
                                            Denmark, however, without prejudice to our right to bring suits, actions or
                                            proceedings in any other court which would have jurisdiction if this
                                            provision had not been incorporated into these GTCS.


                                        </p>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="submit" class="btn color-checkout-bg">Register</button>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="form-input">
                            <span><i class="fa fa-key"></i></span>
                            <input type="password" name="password" placeholder="Password" required>
                        </div>

                        <div class="form-input">
                            <span><i class="fa fa-key"></i></span>
                            <input type="password" name="cpassword" placeholder="Confirm Password" required>
                        </div>


                        <div class="mb-3">
                            <button type="submit" data-toggle="modal" data-target="#exampleModal"
                                data-whatever="@getbootstrap" class="btn btn-block">
                                Proceed
                            </button>
                        </div>

                        <div class="text-center mb-5">
                            Already have an account
                            <a class="login-link" href="login.php">Login here!</a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-6 d-none d-lg-block image-cont"></div>
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