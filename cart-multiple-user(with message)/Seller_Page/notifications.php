
  <?php
  ob_start();
  include('header.php');

  $user_id = $_SESSION["user_id"];
  $result = mysqli_query($conn, "SELECT * FROM user_form WHERE id = '$user_id'");
  if ($res = mysqli_fetch_array($result)) {
	$fullname = $res['fullname'] ?? '';
	$username = $res['username']  ?? '';
	$oldusername = $res['username']  ?? '';
	$email = $res['email']  ?? '';
	$phonenumber = $res['phonenumber']  ?? '';
	$address = $res['address']  ?? '';
	$dateofbirth = $res['dateofbirth']  ?? '';
	$gender = $res['gender']  ?? '';
	$image = $res['image']  ?? '';
}
  ?>  


  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
   
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Notifications</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Notifications</h6>
        </nav>

        <?php
        include('navbar.php');
        ?>  


      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="card mt-4">
            <div class="card-header p-3">
              <h5 class="mb-0">Notifications</h5>
            </div>
            <div class="card-body p-3 pb-0">
           
            <?php if (!$notifications->num_rows) { ?>
             
                <div class="alert alert-danger alert-dismissible text-white" role="alert">
                <span class="text-sm">No Notifications Available!</span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>
            
             
              <?php } ?>
              <?php foreach ($notifications as $row) { ?>
              <div class="alert alert-secondary alert-dismissible text-white color-orange-bg" role="alert">
                <span class="text-sm"><b><?= $row['notification'] ?></b></span>  
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <span class="text-white"><b><?= $row['notification_added'] ?></b></span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?php } ?>
             
            </div>
          </div>
         

     
 


    

  <?php
  include('footer.php');
  ?>  