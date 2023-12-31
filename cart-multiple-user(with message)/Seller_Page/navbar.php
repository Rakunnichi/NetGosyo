<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            
            </div>
  
            <ul class="navbar-nav  justify-content-end">
             
              <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                  </div>
                </a>
              </li>
              
              <li class="nav-item dropdown pe-2 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-bell cursor-pointer"></i>
                </a>
                <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                  
                <?php if (!$notifications->num_rows) { ?>
                  <li class="mb-2">
                    <a class="dropdown-item border-radius-md" href="javascript:;">
                      <div class="d-flex py-1">
                        <div class="my-auto">
                          <img src="assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="text-sm font-weight-normal mb-1">
                            <span class="font-weight-bold">No Notifications  Available!</span> 
                          </h6>
                          <p class="text-xs text-secondary mb-0">
                            <i class="fa fa-clock me-1"></i>
                            13 minutes ago
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>

                <?php } ?>
                <?php foreach ($notifications as $row) { ?>

                  <li class="mb-2">
                    <a class="dropdown-item border-radius-md" href="javascript:;">
                      <div class="d-flex py-1">
                        <div class="my-auto">
                          <img src="assets/img/logo.png" class="avatar avatar-sm  me-3 ">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="text-sm font-weight-normal mb-1">
                            <span class="font-weight-bold"><?= $row['notification'] ?></span>
                          </h6>
                          <p class="text-xs text-secondary mb-0">
                            <i class="fa fa-clock me-1"></i>
                            <?= $row['notification_added'] ?>
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>
                  <?php } ?>

                </ul>
              </li>
  
              <li class="nav-item d-flex align-items-center">
                <a href="#" class="nav-link text-body font-weight-bold px-0">
                  <i class="fa fa-user me-sm-1"></i>
                  <?php
              $select_seller = mysqli_query($conn, "SELECT * FROM `user_form` where id = '$user_id' ") or die('query failed!');
                  if(mysqli_num_rows($select_seller) > 0){
                  while($fetch_seller = mysqli_fetch_assoc($select_seller)){    
              ?>
                  <span class="d-sm-inline d-none"><b><?php echo $fetch_seller['username'] ?? ''; ?></b></span>
  
                  <?php
                      };
                  }; 
              ?>
                </a>
              </li>
            </ul>
          </div>