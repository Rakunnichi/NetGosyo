<!-- Shopping Cart  Section-->

<section id="cart" class="py-3">
  <div class="container-fluid width w-75">
    <h5 class="font-baloo font-size-20 ml-0">Cart Details</h5>

    <!-- Shopping Cart Items -->
    <div class="row">
      <div class="col-sm-9">
        <?php
        $grand_total = 0;
        $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed!');
        if (mysqli_num_rows($cart_query) > 0) {
          while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
        ?>
            <!-- Cart Items1 -->
            <div class="row border-top py-3 mt-3">
              <div class="col-sm-2">
                <img src="image/<?php echo $fetch_cart['image'] ?? "./assets/products/1.png"; ?>" style="height:120px;" alt="cart1" class="img-fluid">
              </div>
              <div class="col-sm-8">
                <h5 class="font-baloo font-size-20 ml-0 mb-0"><?php echo $fetch_cart['name'] ?? "Unknown"; ?></h5>
                <small>by <?php echo $fetch_cart['item_brand'] ?? "Brand"; ?></small>
                <!-- Product Ratings -->
                <div class="d-flex mb-3">
                  <div class="rating text-warning font-size-12">
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                  </div>
                </div>
                <!-- !Product Ratings -->

                <!-- Product Qty -->
                <div class="qty d-flex pt-2">

                  <form method="post">
                    <div class="d-flex font-rale w-30">
                      <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                      <input type="number" class="qty_input border px-2 w-100 bg-light" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                      <button type="submit" name="update_cart" class="btn font-baloo text-danger px-3 border-right">Update</button>
                    </div>
                  </form>


                  <a href="index.php?remove=<?php echo $fetch_cart['id']; ?>" class="btn font-baloo text-danger px-3 border-right" onclick="return confirm('remove item from cart?');">Remove</a>
                </div>
                <!-- Product Qty -->
              </div>

              <div class="col-sm-2 text-right">
                <div class="font-size-20 text-danger font-baloo">
                  ₱<span class="product_price" data-id=""><?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?></span>
                </div>
              </div>
            </div>
            <!-- !Cart Items1 -->
        <?php
            $grand_total += (float) $sub_total;
          };
        } else {
          echo '  <!-- Shopping Cart Items -->
          <div class="row border-top py-3 mt-3">
              <div class="col-sm-9">
                  <!-- Empty Cart -->
                      <div class="row">
                          <div class="col-sm-12 text-center py-2">
                              <img src="./assets/cart_empty.png" alt="Empty Cart" class="img-fluid" style="height:200px">
                              <p class="font-baloo font-size-16 text-black"> Your Cart is Empty! Add some Products</p>
                          </div>
                      </div>
                  <!-- !Empty Cart -->
              </div>
          </div>
          <!-- !Shopping Cart Items -->';
        }
        ?>
      </div>

      <!-- Sub Total Section -->
      <div class="col-sm-3">
        <div class="sub-total border text-center mt-2">
          <h6 class="font-size-12 font-rale text-success py-3 mb-0"><i class="fas fa-check"></i> Orders are Elgible for Free Shipping.</h6>
          <div class="border-top py-4">
            <h5 class="font-baloo font-size-20">Subtotal: &nbsp;<span class="text-danger">₱<span class="text-danger" id="deal-price"><?php echo $grand_total; ?></span></span></h5>
            <a href="checkout.php" type="submit" name="checkout-cart" class="btn btn-warning mt-3">Checkout Cart</a>
          </div>
        </div>
      </div>
      <!-- !Sub Total Section -->

    </div>
    <!-- !Shopping Cart Items -->


  </div>
</section>
<!-- !Shopping Cart Section-->