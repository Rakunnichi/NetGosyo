<section class="py-5" id="view_top_products">
    <div class="text-center">
        <a href="categories.php" id="back_button"><b><i class="fas fa-arrow-left"></i> Back</b></a> 
        <h4 class="font-rubik font-size-50"><b>Pottery</b></h4>
    </div>
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            <?php
                    $select_product = mysqli_query($conn, "SELECT * FROM `products` where item_brand = 'Pottery' ORDER BY RAND()") or die('query failed!');
                    if (mysqli_num_rows($select_product) > 0) {
                    while ($fetch_product = mysqli_fetch_assoc($select_product)) {
         
                ?>
            <div class="col mb-5">
                <div class="card h-100">

                    
                   
                    <a href="<?php printf('%s?id=%s', 'product.php',  $fetch_product['id']); ?>">
                    <img class="card-img-top" src="Seller-uploads/<?php echo $fetch_product['image']; ?>" alt="..." />
                    </a>

                    <div class="card-body p-4">
                        <div class="text-center">

                            <h6 class="fw-bolder"><?php echo $fetch_product['name'] ?? '0'; ?></h6>
                            
                            <div class="rating text-orange font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>

                            <b>₱&nbsp;<?php echo $fetch_product['price'] ?? '0'; ?>.00</b>
                        </div>
                    </div>
                   
                </div>
            </div>
            <?php
                };
                }else{

              
                ?>

        </div>
    </div>
     <!-- Shopping Cart Items -->
     <div class="row py-3 mt-3">
              <div class="col-sm-12">
                  <!-- Empty Cart -->
                      <div class="row">
                          <div class="col-sm-12 text-center py-2">
                              <img src="./assets/category_empty.jpg" alt="Empty Category" class="img-fluid" style="height:200px">
                              <p class="font-baloo font-size-16 text-black"><b>Products are Coming Soon!</b></p>
                          </div>
                      </div>
                  <!-- !Empty Cart -->
              </div>
          </div>
          <!-- !Shopping Cart Items -->
          <?php
            }
          ?>
</section>