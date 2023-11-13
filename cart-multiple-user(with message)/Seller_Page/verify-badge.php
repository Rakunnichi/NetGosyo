
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
      $id_pic = $res['id_pic'];
      $has_verified_badge = $res['has_verified_badge'];

      if($has_verified_badge == 1 && $id_pic){
        $status = 'Verified';
      } else if($has_verified_badge == 0 && $id_pic){
        $status =  'Pending Verification';
      } else {
        $status =  'Not Verified';
      }
  }

  if (isset($_FILES['id_pic']['name']) && $_FILES['id_pic']['name'] != '') {
    $file = $_FILES['id_pic']['tmp_name'];
    $file_name = $_FILES['id_pic']['name'];
    $message = '';
    $folder = '../user-profiles/';

    if ($_FILES['id_pic']['name']) {
      if ($_FILES["id_pic"]["size"] > 10000000) {
          $message="Sorry, your image is too large. Upload less than 10 MB in size .";
      }
    }


    $file_name_array = explode(".", $file_name);
    $extension = end($file_name_array);

  if ($file != "") {
      if (
          $extension != "jpg" && $extension != "png" && $extension != "jpeg"
          && $extension != "gif" && $extension != "PNG" && $extension != "JPG" && $extension != "GIF" && $extension != "JPEG"
      ) {
        $message="Sorry, invalid format .";
      }
  }

    $new_image_name = 'id_pic_' . rand() . '.' . $extension;

    if ($file != "" && $message == '') {
      $stmt = mysqli_query($conn, "SELECT id_pic FROM  user_form WHERE id = '$user_id'");
      $row = mysqli_fetch_array($stmt);
      $deleteimage = $row['id_pic'];
      if(file_exists($folder . $deleteimage) && $deleteimage){
        unlink($folder . $deleteimage);
      }
      if($file){

        move_uploaded_file($file, $folder . $new_image_name);
        mysqli_query($conn, "UPDATE user_form SET id_pic='$new_image_name' WHERE id = '$user_id'");
        $id_pic = $new_image_name;
        $status =  'Pending Verification';
        $message="ID Updated";
      }
  }
  }
  ?>  


  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
   
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Badge Verification</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Badge Verification</h6>
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

            <form action="" method="post" enctype='multipart/form-data'>
               

                <div class="card-body">
                    <h5 class="card-title mb-4">Badge Application</h5>
                    <?php
                    if(!empty($message)){
                        echo"
                        <div class='alert alert-secondary alert-dismissible text-white color-orange-bg' role='alert'>
                        <span class='text-sm'>$message</span>
                        <button type='button' class='btn-close text-lg py-3 opacity-10' data-bs-dismiss='alert'
                            aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                        </div>
                        
                        ";
                    }
                ?>
                    <span>Status: <b><?php echo $status ?></b></span>
                    <?php if ($status != 'Verified') { ?>
                    <?php if ($id_pic != NULL) {
                      echo '<div><span>ID Submitted</span><br><img src="../user-profiles/' . $id_pic . '" style="border-radius: 5px; box-shadow: 1px 1px 5px #333333;" class="img-fluid" id="uploaded_image"></div>';
                    }
                       ?>
                   
                    <br>  <?php if ($status == 'Pending Verification') {?>
                    <h5 class="card-title mb-4">Resubmit ID</h5>
                    <?php } ?>
                        <div class="input-group input-group-outline my-3">
                            <input type="file" name="id_pic" 
                                class="form-control">
                        </div>

                        <button class="btn btn-icon btn-3 button-update" type="submit">
                            <span class="btn-inner--text">Submit</span>
                        </button>

                        <?php } ?>
                    </div>
                  </form>


                </div>
            </div>
        </div>
    </div>
</div>
    

   



   
     
  

  <?php
  include('footer.php');
  ?>  