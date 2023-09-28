<?php
  ob_start();
  //include header.php file
  include ('new_navbar.php');
  include ('config.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, intial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Products</title>

	<!-- Site Icon -->
	<link rel="shortcut Icon" type="image/png" href="img/favicon.png">

	<!-- Font Awesome Icons -->
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<!-- Custom CSS -->
	<link href="css/category-page.css" rel="stylesheet">

</head>
<body id="page-top">

	<section class="page-section">

				<!-- <div class="col-lg-3 blog-form">
					
					<h2 class="blog-sidebar-title"><b>Categories</b></h2>
					<hr />

					<div id="filters" class="button-group">
						<p class="blog-sidebar-list"><b><span class="list-icon"> > </span><button class="btn is-checked" data-filter="*">All</button></b></p>
						<p class="blog-sidebar-list"><b><span class="list-icon"> > </span><button class="btn" data-filter=".Clothes">Clothes</button></b></p>
						<p class="blog-sidebar-list"><b><span class="list-icon"> > </span><button class="btn" data-filter=".Banig">Banigs</button></b></p>
						<p class="blog-sidebar-list"><b><span class="list-icon"> > </span><button class="btn" data-filter=".Foods">Foods</button></b></p>
					</div>

					<div>&nbsp;</div>
					<div>&nbsp;</div>

					

				</div> -->
				<!--END  <div class="col-lg-3 blog-form">-->

				<div class="mt-3" style="padding-left: 60px;">
						<div class="col">
							Showing all results
						</div>

					</div>
        	<div class="grid" style="padding-left: 60px;">
            	<?php
  			        $search = isset($_GET['search']) ? $_GET['search'] : '';
					$select_product = mysqli_query($conn, "SELECT * FROM `products` WHERE `name` LIKE '%{$search}%'") or die('query failed!');
					$rows = mysqli_fetch_all($select_product, MYSQLI_ASSOC);
					if (mysqli_num_rows($select_product) > 0) {
					foreach ($rows as $fetch_product) {
                ?>
					<div class="grid-item <?php echo $fetch_product['item_brand'] ?? "Brand"; ?>">
						<div class="item" style="width:200px;">
							<div class="product font-rale">
							<a href="<?php printf('%s?id=%s', 'product.php',  $fetch_product['id']); ?>"><img src="Seller-uploads/<?php echo $fetch_product['image'] ?? "assets/products/1.png"; ?>"
									alt="product1" class="img-fluid"></a>
								<div class="text-center">
									<h6><b><?php echo $fetch_product['name'] ?? "Unknown"; ?></b></h6>
				
									<form action="" class="form-submit">
										<div class="row p-2">
										</div>
										<div class="margin-left-10 price py-2  d-flex justify-content-between margin-right-10">

										<div class="price py-2">
										<span><b>₱&nbsp;<?php echo $fetch_product['price'] ?? '0'; ?></b></span>
									</div>
										

										<?php if(isset($_SESSION["user_id"])){
												echo '<button type="submit" class="btn btn-warning font-size-12 rounded-pill addItemBtn"><i class="fas fa-shopping-cart"></i></button>';
											}else{
												echo '<button type="submit" class="btn btn-warning font-size-12 rounded-pill addItemBtn" disabled><i class="fas fa-shopping-cart"></i></button>';
											}
											
											
											?>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				<?php 
						}
					} else {
						echo "There is no product found!";
					}
				?>
			</div>
		</div>
					<!-- Sorting by <div class="row"> -->

				</div>
				<!--END  <div class="col-lg-9">-->

			</div>
		</div>
	</section>



	<!-- Bootstrap JavaScript -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	

</body>
</html>
<?php
//include footer.php file
include ('footer.php');
?>