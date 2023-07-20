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
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Add New Product</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Add New Product</h6>
            </nav>


            <?php
        include('navbar.php');
         ?>


        </div>
    </nav>

    
    <div class="container-fluid py-4">
    <form action="" method="post" enctype='multipart/form-data'>
            <div class="mt-2">

                <div class="row">
                    <div class="col-4 color_left">
                        <div class="p-5 py-5">
                            <div class="d-flex justify-content-between align-items-center mt-3 mb-3">
                                <h4 class="text-right"></h4>
                            </div>
                            <div class="d-flex flex-column align-items-center text-center p-1 py-6">
                                <div style="max-width:90px">

                                    <img src="assets/img/logo.png" class="img-fluid">


                                </div>

                                <div class="form-group">
                                    <br>
                                    <label>Add Image &#8595;</label>
                                    <input class="form-control border-styling" type="file" name="image" style="width:100%;">
                                    <br>
                                    <label>File size: maximum 10 MB</label>
                                    <label>File extension: .JPEG, .PNG, .JPG</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row col-6 border-right pr-0">

                        <div class="p-5 py-5">
                            <div class="d-flex justify-content-between align-items-center mt-3 mb-3">
                                <h4 class="text-right" style="font-size: 30px;">Add New Product</h4>
                            </div>
                            <div class="row mt-2 border-top">
                                <input type="hidden" name="user_id" value="">

                                <div class="mt-3 col-md-6"><label class="labels" style="font-size: 17px;">Full
                                        Name</label>
                                    <input type="text" name="fullname" placeholder="Enter your fullname"
                                        class="form-control" value="">
                                </div>

                                <div class="mt-3 col-md-6"><label class="labels"
                                        style="font-size: 17px;">Username</label>
                                    <input type="text" name="username" placeholder="Enter your username"
                                        class="form-control" value="">
                                </div>

                                <div class="mt-2 col-md-6"><label class="labels" style="font-size: 17px;">Email
                                        Address</label>
                                    <input type="text" name="emails" placeholder="Enter your email address"
                                        class="form-control" value="">
                                </div>

                                <div class="mt-2 col-md-6"><label class="labels" style="font-size: 17px;">Mobile
                                        Number</label>
                                    <input type="text" name="number" placeholder="Enter your mobile number"
                                        class="form-control" value="">
                                </div>

                                <div class="mt-2 col-md-6"><label class="labels"
                                        style="font-size: 17px;">Address</label>
                                    <input type="text" name="address" placeholder="Enter your address"
                                        class="form-control" value="">
                                </div>

                                <div class="mt-2 col-md-6"><label class="labels" style="font-size: 17px;">Date of
                                        Birth</label>
                                    <input type="date" name="datebirth" class="form-control" value="">
                                </div>

                                <div class="mt-2 mb-4 col-md-6"><label class="labels"
                                        style="font-size: 17px;">Gender</label>
                                    <select name="Gender" class="custom-select" id="gender">
                                        <option selected></option>

                                        <option value="Female">Female</option>

                                        <option value="Male">Male</option>

                                    </select>

                                </div>
                            </div>
                            <input type="submit" value="Update" name="update_user" class="btn btn-warning">
                        </div>
                    </div>
    </form>
       







  <?php
  include('footer.php');
  ?>