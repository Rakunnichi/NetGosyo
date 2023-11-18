<?php
  include('header.php');


  if(isset($_POST['addprod-submit'])){

    $prodname = mysqli_real_escape_string($conn, $_POST['prodname']);
    $prodprice = mysqli_real_escape_string($conn, $_POST['prodprice']);
    $prodquantity = mysqli_real_escape_string($conn, $_POST['prodquantity']);
    $prod_desc = mysqli_real_escape_string($conn, $_POST['prod_desc']);
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
    
    mysqli_query($conn, "INSERT INTO `products` (user_id, name, price, image, item_brand, quantity, description) VALUES('$user_id', '$prodname', '$prodprice', '$new_file_name', '$prodcategory', '$prodquantity' , '$prod_desc')") or die ('query failed');
       
    $Message = "Product Added Successfully";
    
}

?>


<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

<nav class="navbar navbar-main bg-gradient-dark navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky"
        id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-3 text-dark" href="javascript:;">
                            <svg width="12px" height="12px" class="mb-1 text-white" viewBox="0 0 45 40" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>shop </title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1716.000000, -439.000000)" fill="#fff" fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(0.000000, 148.000000)">
                                                <path
                                                    d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                                </path>
                                                <path
                                                    d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item text-sm"><a class="opacity-7 text-white" href="javascript:;">Pages</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Add New Product</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">Add New Product</h6>
            </nav>

          

            <?php
        include('navbar.php');
         ?>


        </div>
    </nav>

    <div class="collapse" id="collapseExample">
        <div class="container-fluid py-1 px-3">
            <ul class="list-group">
                <li class="list-group-item">
                    <a class="nav-link" href="index.php">
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>

                <li class="list-group-item">
                    <a class="nav-link" href="add_product.php">
                    <span class="nav-link-text ms-1">Add New Product</span>
                    </a>
                </li>

                <li class="list-group-item">
                    <a class="nav-link" href="my_products.php">
                    <span class="nav-link-text ms-1">My Products</span>
                    </a>
                </li>

                <li class="list-group-item">
                    <a class="nav-link" href="orders.php">
                    <span class="nav-link-text ms-1">Orders</span>
                    </a>
                </li>

                <li class="list-group-item">
                    <a class="nav-link" href="sales-report.php">
                    <span class="nav-link-text ms-1">Sales Report</span>
                    </a>
                </li>

                <li class="list-group-item">
                    <a class="nav-link" href="verify-badge.php">
                    <span class="nav-link-text ms-1">Apply for Badge</span>
                    </a>
                </li>
                
                <li class="list-group-item">
                    <a class="nav-link" href="profile.php">
                    <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>

                <li class="list-group-item">
                    <a class="nav-link" href="messages.php">
                    <span class="nav-link-text ms-1">Messages</span>
                    </a>
                </li>

                <li class="list-group-item">
                    <a class="nav-link" href="notifications.php">
                    <span class="nav-link-text ms-1">Notifications</span>
                    </a>
                </li>
               
            </ul>
        </div>
    </div>
    

    <div class="container-fluid py-4">

        <div class="content-wrapper">

            <div class="row mb-2">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Add New Product</h5>
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
                            
                            <form action="" method="post" enctype='multipart/form-data'>
                                <input type="hidden" name="user_id" value="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-outline my-3">
                                            <input type="text" name="prodname" placeholder="Product Name"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group input-group-outline my-3">
                                            <input type="number" name="prodprice" placeholder="Product Price"
                                                class="form-control" required>
                                        </div>
                                    </div>

                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-outline my-3">
                                            <input type="number" name="prodquantity" placeholder="Product Quantity"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group input-group-outline my-3">
                                            <div class="input-group">
                                            <label>Choose A Category:</label>
                                            </div>
                                            <select class="form-control" name="category" id="category">                
                                                <option value="Gadget">Gadget</option>
                                                <option value="Women-Apparel">Women-Apparel</option>
                                                <option value="Men-Apparel">Men-Apparel</option>
                                                <option value="Women-Accesories">Women-Accesories</option>
                                                <option value="Men-Bag-Accesories">Men-Bag-Accesories</option>
                                                <option value="Makeup-Fragrance">Makeup-Fragrance</option>
                                                <option value="Women-Bag">Women-Bag</option>
                                                <option value="Home-Living">Home-Living</option>
                                                <option value="Furniture">Furniture</option>
                                                <option value="Souvenirs">Souvenirs</option>
                                                <option value="Foods">Foods</option>
                                                <option value="Men-Shoes">Men-Shoes</option>
                                                <option value="Women-Shoes">Women-Shoes</option>
                                                <option value="Sports-Travel">Sports-Travel</option>
                                                <option value="Toys">Toys</option>
                                                <option value="Lingerie-Loungewear">Lingerie-Loungewear</option>
                                                <option value="Pottery">Pottery</option>
                                                <option value="Babies-Kids">Babies-Kids</option>         
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group input-group-outline my-2">
                                        <label>Add Image &#8595;</label>
                                        <input class="form-control" type="file" name="file" style="width:100%;" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                        <div class="input-group input-group-outline my-3">
                                        <label>Description:</label>
                                        <div class="input-group input-group-dynamic">
                                        <textarea class="form-control" rows="5" name="prod_desc"placeholder="Say a few words about the Product that you are selling." spellcheck="false" required></textarea>
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