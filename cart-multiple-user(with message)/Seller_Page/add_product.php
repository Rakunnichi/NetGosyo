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

        <div class="content-wrapper">

            <div class="row mb-2">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Add New Product</h5>

                            <form action="" method="post" enctype='multipart/form-data'>
                                <input type="hidden" name="user_id" value="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-outline my-3">
                                            <input type="text" name="prodname" placeholder="Product Name"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group input-group-outline my-3">
                                            <input type="text" name="prodprice" placeholder="Product Price"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-outline my-3">
                                            <input type="number" name="prodquantity" placeholder="Product Quantity"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group input-group-outline my-3">
                                            <select class="form-control" name="category" id="category">
                                                <option selected="">Choose a Category</option>
                                                <option value="Banig">Banig</option>
                                                <option value="Clothes">Clothes</option>
                                                <option value="Food">Food</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-icon btn-3 button-update" type="button">
                                    <span class="btn-inner--icon"><i class="material-icons">add_circle</i></span>
                                    <span class="btn-inner--text">Add Product</span>
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