
  <?php
  include('header.php');
  ?>  


  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
   
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><b>User Management</b></li>
                </ol>

            </nav>

        </div>
    </nav>
    

    <div class="container-fluid py-4">

      

      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="color-greyish-bg shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">User Management</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Id</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Fullname</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Username</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Email</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Contact#</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Gender</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Date of Birth</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Date Added</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder text-center opacity-7 ps-2">Action</th>
                      
                    </tr>
                  </thead>

                  <tbody>
                  <?php
                    
                        $select_user = mysqli_query($conn, "SELECT * FROM `user_form` where shopname = 'user' ORDER BY register_date DESC ") or die('query failed!');
                        if(mysqli_num_rows($select_user) > 0){
                        while($fetch_user = mysqli_fetch_assoc($select_user)){    
                  ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">  
                          <div class="d-flex flex-column justify-content-center">
                          <p class="text-xs font-weight-bold mb-0"><?php echo $fetch_user['id'];?></p>
                          </div>
                        </div>
                      </td>
                      
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?php echo $fetch_user['fullname'];?></p>
                      </td>

                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?php echo $fetch_user['username'];?></p>
                      </td>

                      <td>
                        <span class="text-xs font-weight-bold"><?php echo $fetch_user['email'];?></span>
                      </td>

                      <td>
                        <span class="text-xs font-weight-bold"><?php echo $fetch_user['phonenumber'];?></span>
                      </td>

                      <td>
                        <span class="text-xs font-weight-bold"><?php echo $fetch_user['gender'];?></span>
                      </td>
                      
                      <td>
                        <span class="text-xs font-weight-bold"><?php echo $fetch_user['dateofbirth'];?></span>
                      </td>

                      <td>
                        <span class="text-xs font-weight-bold"><?php echo $fetch_user['register_date']; ?></span>
                      </td>

                      <td class="align-middle text-center">
  
                        <a href="seller-action.php?id=<?= $fetch_product['id'] ?>" onclick="return confirm('Are you sure do you want to Delete this Product?')"><button type="button" class="btn button-remove btn-sm">Delete</button></a>
                                                
                      </td>
                    </tr>
                    <?php
                        };
                    }; 
                     ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="color-greyish-bg shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Seller Management</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  
                  <thead>
                    <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Id</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Fullname</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Username</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Email</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Contact#</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Gender</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Date of Birth</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Date Added</th>
                      <th class="text-uppercase text-secondary text-xs font-weight-bolder text-center opacity-7 ps-2">Action</th>
                      
                    </tr>
                  </thead>

                  <tbody>
                  <?php
                    
                        $select_user = mysqli_query($conn, "SELECT * FROM `user_form` where shopname != 'user' ORDER BY register_date DESC ") or die('query failed!');
                        if(mysqli_num_rows($select_user) > 0){
                        while($fetch_user = mysqli_fetch_assoc($select_user)){    
                  ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">  
                          <div class="d-flex flex-column justify-content-center">
                          <p class="text-xs font-weight-bold mb-0"><?php echo $fetch_user['id'];?></p>
                          </div>
                        </div>
                      </td>
                      
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?php echo $fetch_user['fullname'];?></p>
                      </td>

                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?php echo $fetch_user['username'];?></p>
                      </td>

                      <td>
                        <span class="text-xs font-weight-bold"><?php echo $fetch_user['email'];?></span>
                      </td>

                      <td>
                        <span class="text-xs font-weight-bold"><?php echo $fetch_user['phonenumber'];?></span>
                      </td>

                      <td>
                        <span class="text-xs font-weight-bold"><?php echo $fetch_user['gender'];?></span>
                      </td>
                      
                      <td>
                        <span class="text-xs font-weight-bold"><?php echo $fetch_user['dateofbirth'];?></span>
                      </td>

                      <td>
                        <span class="text-xs font-weight-bold"><?php echo $fetch_user['register_date']; ?></span>
                      </td>

                      <td class="align-middle text-center">
  
                        <a href="seller-action.php?id=<?= $fetch_product['id'] ?>" onclick="return confirm('Are you sure do you want to Delete this Product?')"><button type="button" class="btn button-remove btn-sm">Delete</button></a>
                                                
                      </td>
                    </tr>
                    <?php
                        };
                    }; 
                     ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    
  

  <?php
  include('footer.php');
  ?>  