<!-- Product -->
<?php
include('config.php');
$id = $_GET['id'] ?? 1;
$user_id = $_SESSION['user_id']?? '3';

$sql = "SELECT * FROM user_form WHERE id=$user_id";
$user = mysqli_query($conn, $sql);

if (mysqli_num_rows($user) > 0) {
  $row = mysqli_fetch_assoc($user);
  $name = $row["fullname"];
}


$stmt = $conn->prepare('SELECT * FROM products');
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) :
  if ($row['id'] == $id) :
?>

<section id="product" class="py-3">
    <div class="container">
        
        <div class="row">
            <div class="col-sm-6">
                <img src="Seller-uploads/<?php echo $row['image'] ?? "1.png"; ?>" alt="product" class="img-fluid">
                <div class="form-row pt-4 font-size-16 font-baloo">

                    <?php if($user_id == 3){
                  ?>
                    <div class="col">
                        <a href="checkout.php"><button type="submit" class="btn btn-danger form-control"
                                disabled>Checkout</button></a>
                    </div>
                    <?php
                    }else{
                        ?>
                    <div class="col">
                        <a href="checkout.php"><button type="submit"
                                class="btn btn-danger form-control">Checkout</button></a>
                    </div>
                    <?php
                    }
                    ?>

                    <div class="col">
                        <form action="" class="form-submit" method="POST">
                            <input type="hidden" name="product_id" value="<?= $row['id'] ?>">
                            <input type="hidden" name="seller_id" value="<?= $row['user_id'] ?>">
                            <input type="hidden" name="product_name" value="<?= $row['name'] ?>">
                            <input type="hidden" name="product_price" value="<?= $row['price'] ?>">
                            <input type="hidden" name="product_image" value="<?= $row['image'] ?>">
                            <input type="hidden" name="product_quantity" value="1">
                            <button type="submit" name="add_to_cart" class="btn color-orange-bg form-control">Add
                                to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 py-5">
                <h5 class="font-baloo font-size-20 ml-0 mb-0"><?php echo $row['name'] ?? "Unknown"; ?></h5>
                <small>by <?php echo $row['item_brand'] ?? "Brand"; ?></small>
                <div class="d-flex mb-3">
                    <div class="rating text-orange font-size-12">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                    </div>
                </div>
                <hr class="m-0">

                <!-- Product price-->
                <table class="my-3">
                    <tr class="font-rale font-size-14">
                        <td>Price: </td>
                        <td>Stock Available: </td>
                    </tr>
                    <tr>
                        <td class="font-size-20 text-danger">
                            ₱<span><?php echo $row['price'] ?? 0; ?></span>
                        </td>
                        <td class="font-size-20 text-black  ">
                            <span><?php echo $row['quantity'] ?? 0; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><small class="text-dark font-size-12">Including Shipping Fee</small></td>
                    </tr>
                </table>
                <!-- !Product price-->

                <!-- #Policy-->
                <div id="policy">
                    <div class="d-flex">
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-retweet border p-3 rounded-pill" style="color:#E6873C"></span>
                            </div>
                            <p href="javascript:" class="font-rale font-size-12">30 Days <br> Return Policy</p>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-truck  border p-3 rounded-pill" style="color:#E6873C"></span>
                            </div>
                            <p href="javascript:" class="font-rale font-size-12">2-3 Days<br>Delivered</p>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-check-double border p-3 rounded-pill" style="color:#E6873C"></span>
                            </div>
                            <p href="javascript:" class="font-rale font-size-12">1 Year <br>Warranty</p>
                        </div>
                    </div>
                </div>
                <!-- !#Policy-->
                <hr>

                <!-- Order Details -->
                <div id="order-details" class="font-rale d-flex flex-column text-dark">
                    <small><i class="fas fa-calendar color-primary mr-1" style="width:16px"></i> Delivery by : Jun 23 -
                        Jun 28</small>
                    <small><i class="fas fa-check color-primary mr-1" style="width:16px; text-decoration:"></i> Sold by <a
                            href="javascript:">NetGosyo </a></small>
                    <small><i class="fas fa-map-marker-alt color-primary mr-1" style="width:16px"></i> Deliver to
                        Customer - <?= $name ?></small>
                </div>
                <!-- !Order Details -->


                <div class="row">
                    <div class="col-6">

                        <!-- <div class="color my-3">
                  <div class="d-flex justify-content-between">
                    <h6 class="font-baloo">Color:</h6>
                    <div class="p-2 color-yellow-bg rounded-circle"><button class="btn font-size-14"></button></div>
                    <div class="p-2 color-primary-bg rounded-circle"><button class="btn font-size-14"></button></div>
                    <div class="p-2 color-second-bg rounded-circle"><button class="btn font-size-14"></button></div>
                  </div>
                </div> -->

                    </div>

                    <div class="col-6">
                        <!-- product qty section -->

                        <!-- <div class="qty d-flex">
                            <h6 class="font-baloo">Qty: </h6>
                            &nbsp;<input type="number" class="form-control pqty" value="<?= $row['product_qty'] ?>"> 
                        </div> -->

                        <!-- !product qty section -->
                    </div>
                </div>

                <!-- size -->
                <!-- <div class="size my-3">
              <h6 class="font-baloo">Size :</h6>
              <div class="d-flex justify-content-between w-75">
                <div class="font-rubik border p-2">
                  <button class="btn p-0 font-size-14">4GB RAM</button>
                </div>
                <div class="font-rubik border p-2">
                  <button class="btn p-0 font-size-14">6GB RAM</button>
                </div>
                <div class="font-rubik border p-2">
                  <button class="btn p-0 font-size-14">8GB RAM</button>
                </div>
              </div>
            </div> -->
                <!-- !size -->

            </div>
            <div class="col-12 pt-4">
                <h6 class="font-rubik">Product Description</h6>
                <hr>
                <p class="font-rale font-size-14">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat
                    inventore vero numquam error est ipsa, consequuntur temporibus debitis nobis sit, delectus officia
                    ducimus dolorum sed corrupti. Sapiente optio sunt provident, accusantium eligendi eius reiciendis
                    animi? Laboriosam, optio qui? Numquam, quo fuga. Maiores minus, accusantium velit numquam a aliquam
                    vitae vel?</p>
                <p class="font-rale font-size-14">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat
                    inventore vero numquam error est ipsa, consequuntur temporibus debitis nobis sit, delectus officia
                    ducimus dolorum sed corrupti. Sapiente optio sunt provident, accusantium eligendi eius reiciendis
                    animi? Laboriosam, optio qui? Numquam, quo fuga. Maiores minus, accusantium velit numquam a aliquam
                    vitae vel?</p>
            </div>
        </div>
    </div>
</section>
<!-- !Product -->
<?php
  endif;
endwhile;
?>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>