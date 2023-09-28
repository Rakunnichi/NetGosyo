<section id="slider-shops" class="pt-5">
    <div class="container">
        <h1 class="text-center"><b>#Shops</b></h1>
        <hr>
        <div class="slider">
            <div class="owl-carousel">

                <?php
                    $select_seller = mysqli_query($conn, "SELECT * FROM `user_form` where `shopname` != 'user'") or die('query failed!');
                    if (mysqli_num_rows($select_seller) > 0) {
                    while ($fetch_seller = mysqli_fetch_assoc($select_seller)) {
         
                ?>

                <div class="slider-card">

                    <div class="d-flex justify-content-center align-items-center mb-4">

                    </div>
                    <div class="card-footer border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                href="<?php printf('%s?id=%s', 'view-shop-details.php',  $fetch_seller['id']); ?>"><b><?php echo $fetch_seller['shopname'] ?? '0'; ?></b></a>
                        </div>
                    </div>
                    <p class="text-center p-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>

                <?php
                };
                };
                ?>

            </div>
        </div>
    </div>
</section>