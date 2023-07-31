<?php
  include('header.php');


  if(isset($_POST['addprod-submit'])){

    $prodname = mysqli_real_escape_string($conn, $_POST['prodname']);
    $prodprice = mysqli_real_escape_string($conn, $_POST['prodprice']);
    $prodquantity = mysqli_real_escape_string($conn, $_POST['prodquantity']);
    $prodcategory = mysqli_real_escape_string($conn, $_POST['category']);
   
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $tmp = explode('.', $_FILES['file']['name']);
    $file_ext = strtolower(end($tmp));
    $extensions = array("jpeg","jpg","png");
    
    if(in_array($file_ext,$extensions) === false){
        echo "Extension not allowed, please choose a JPEG or PNG file.";
        exit();
    }
    
    $new_file_name = time().'-'.$file_name;
   
    $destination = "../Seller-uploads/".$new_file_name;
    move_uploaded_file($file_tmp, $destination);
    
    mysqli_query($conn, "INSERT INTO `products` (user_id, name, price, image, item_brand, quantity) VALUES('$user_id', '$prodname', '$prodprice', '$new_file_name', '$prodcategory', '$prodquantity')") or die ('query failed');
       
    echo "Product uploaded successfully.";
    
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
                                            <input type="number" name="prodprice" placeholder="Product Price"
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
                                                <option value="Gadget">Gadgets</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group input-group-outline my-2">
                                        <label>Add Image &#8595;</label>
                                        <input class="form-control" type="file" name="file" style="width:100%;">
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-icon btn-3 button-update" type="submit" name="addprod-submit">
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