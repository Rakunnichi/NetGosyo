<section class="py-5" id="view_special_offers">
    <div class="text-center">
        <h4 class="font-rubik font-size-50"><b>Special Offers</b></h4>
    </div>
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            <?php
                    $select_product = mysqli_query($conn, "SELECT * FROM `products` ORDER BY RAND()") or die('query failed!');
                    if (mysqli_num_rows($select_product) > 0) {
                    while ($fetch_product = mysqli_fetch_assoc($select_product)) {
         
                ?>
            <div class="col mb-5">
                <div class="card h-100">
                    
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">For You!
                    </div>

                    <img class="card-img-top" src="Seller-uploads/<?php echo $fetch_product['image']; ?>" alt="..." />

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
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-warning" href="#">Add to cart</a></div>
                    </div>
                </div>
            </div>
            <?php
                };
                };
                ?>

        </div>
    </div>
</section>