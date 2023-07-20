
<!-- Special Offers -->
<!-- style="background-image: url('./assets/SOBackground.jpg');" -->
<section id="special-offers" >
    <div class="container py-5">
    <div id="message"></div>
        <h4 class="font-rubik font-size-20 padding-top-20"><b>Special Offers</b></h4>
        <div id="filters" class="button-group text-right font-baloo font-size-16">
            <button class="btn is-checked" data-filter="*">All</button>
            <button class="btn" data-filter=".Clothes">Clothes</button>
            <button class="btn" data-filter=".Banig">Banigs</button>
            <button class="btn" data-filter=".Foods">Foods</button>
        </div>

        <div class="grid">
            <?php
  			        $select_product = mysqli_query($conn, "SELECT * FROM `products` ") or die('query failed!');
                      if(mysqli_num_rows($select_product) > 0){
                          while($fetch_product = mysqli_fetch_assoc($select_product)){    
                    ?>

            <div class="grid-item <?php echo $fetch_product['item_brand'] ?? "item_brand"; ?> border">
                <div class="item py-2" style="width:200px;">
                    <div class="product font-rale">
                        <a href="#"><img src="Seller-uploads/<?php echo $fetch_product['image'] ?? "assets/products/1.png"; ?>"
                                alt="product1" class="img-fluid"></a>
                        <div class="text-center">
                            <h6><b><?php echo $fetch_product['name'] ?? "Unknown"; ?></b></h6>
           
                            <div class="price py-2">
                                <span><b>₱&nbsp;<?php echo $fetch_product['price'] ?? '0'; ?>.00</b></span>
                            </div>

                            <form action="" method="post">
                                
                                <input type="hidden" min="1" name="product_quantity" value="1">
                                <input type="hidden" name="product_id" value="<?php echo $fetch_product['id']; ?>"> 
                                <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                                <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                                
                              

                                   <button type="submit" class="btn btn-warning font-size-9 color-orange-bg" name="add_to_cart">Add to Cart</button>
                               
                            </form>
                        </div>
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
<!-- !Special Offers -->

