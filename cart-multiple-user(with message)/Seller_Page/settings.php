<?php
  include('header.php');
  $username = $_SESSION["user_id"] ?? '3';
  $findresult = mysqli_query($conn, "SELECT * FROM user_form WHERE id = '$user_id'");
  if ($res = mysqli_fetch_array($findresult)) {
      $fullname = $res['fullname'];
      $username = $res['username'];
      $oldusername = $res['username'];
      $email = $res['email'];
      $phonenumber = $res['phonenumber'];
      $address = $res['address'];
      $dateofbirth = $res['dateofbirth'];
      $gender = $res['gender'];
      $image = $res['image'];
  }
  if (isset($_POST['change_pass'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_pass'];
    $confirm_password = $_POST['confirm_pass'];
    $Message = "";

    if ($current_password && $new_password && $confirm_password) {
        if ($new_password != $confirm_password) {
            $Message = "New password and confirm password do not match";
        } else {
            $sql = "SELECT password FROM user_form WHERE id = '$user_id'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $current_password_hash = $row["password"];

                    if (md5($current_password) != $current_password_hash) {
                        $Message = "Current password is incorrect!";
                    } else {
                        $new_password_hash = md5($new_password);

                        $updateSql = "UPDATE user_form SET password = '$new_password_hash' WHERE id = '$user_id'";

                        if (mysqli_query($conn, $updateSql)) {
                            $Message = "Your Password has Been Updated!";
                        } else {
                            $Message = "Error updating password: " . mysqli_error($conn);
                        }
                    }
                } else {
                    $Message = "User not found";
                }
            } else {
                $Message = "Error retrieving data: " . mysqli_error($conn);
            }
        }
    } else {
        $Message = "Error! Incomplete form!";
    }
}
                        
?>



<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Settings</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Settings</h6>
            </nav>


            <?php
        include('navbar.php');
         ?>


        </div>
    </nav>

    <div class="container-fluid py-4">

        <div class="content-wrapper">

            <div class="row mb-2">
                <div class="col-lg-12">
                    <div class="card">

                    <form action="" method="post" >
                       

                        <div class="card-body">
                            <h5 class="card-title mb-4">Change Password</h5>
                            <?php
                            if(!empty($Message)){
                                echo"
                                <div class='alert alert-secondary alert-dismissible text-white color-orange-bg' role='alert'>
                                <span class='text-sm'>$Message</span>
                                <button type='button' class='btn-close text-lg py-3 opacity-10' data-bs-dismiss='alert'
                                    aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                                </div>
                                
                                ";
                            }
                        ?>
                            
                          
                                <input type="hidden" name="user_id" value="">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group input-group-outline my-3">
                                            <input type="password" name="current_password" placeholder="Current Password"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group input-group-outline my-3">
                                            <input type="password" name="new_pass" placeholder="New Password"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="input-group input-group-outline my-3">
                                            <input type="password" name="confirm_pass" placeholder="Confirm New Password"
                                                class="form-control">
                                        </div>
                                    </div>
        
                                </div>

                                <button class="btn btn-icon btn-3 button-update" type="submit" name="change_pass">
                                    <span class="btn-inner--icon"><i class="material-icons">lock</i></span>
                                    <span class="btn-inner--text">Change Password</span>
                                </button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
  include('footer.php');
  ?>