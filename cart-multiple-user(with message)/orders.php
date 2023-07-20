<?php
ob_start();
//include header.php file
include('header.php');
include('config.php');

function dd($data) {
	echo "<pre>";
	print_r(var_dump($data));
	die;
}

$user_id = $_SESSION["user_id"];
$result = mysqli_query($conn, "SELECT * FROM user_form WHERE id = '$user_id'");
if ($res = mysqli_fetch_array($result)) {
	$fullname = $res['fullname'] ?? '';
	$username = $res['username']  ?? '';
	$oldusername = $res['username']  ?? '';
	$email = $res['email']  ?? '';
	$phonenumber = $res['phonenumber']  ?? '';
	$address = $res['address']  ?? '';
	$dateofbirth = $res['dateofbirth']  ?? '';
	$gender = $res['gender']  ?? '';
	$image = $res['image']  ?? '';
}

$orders_query = mysqli_query($conn, "SELECT * FROM orders ORDER BY order_id DESC");
$orders = array();

while ($order_row = mysqli_fetch_assoc($orders_query)) {
	$order_id = $order_row['order_id'];

	if ($_SESSION['role'] == 'user') {
		$sql = "SELECT *
	        FROM orders
					JOIN items ON items.order_id = orders.order_id
	        JOIN products ON products.id = items.product_id
					WHERE items.order_id='$order_id' AND orders.user_id='$user_id'";
	} else {
		$sql = "SELECT *
	        FROM orders
					JOIN items ON items.order_id = orders.order_id
	        JOIN products ON products.id = items.product_id
	        WHERE items.order_id='$order_id'";
	}
	$items_query = mysqli_query($conn, $sql);

	$total = 0;
	$items = [];

	while ($item_row = mysqli_fetch_assoc($items_query)) {
		$subtotal = $item_row['price'] * $item_row['qty'];
		$total += $subtotal;
		array_push($items, $item_row);
	}
	$order_row['total'] = $total;
	$order_row['items'] = $items;
	$orders[] = $order_row;
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>User Profile</title>
	<link rel="stylesheet" type="text/css" href="user_profile/css/style1.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style>
		body {
			overflow-x: hidden;
		}
	</style>
</head>

<body>
	<div class="mt-6 mb-6">
		<div class="row">
			<div class="col-3 color_left">

				<div class="d-flex flex-column align-items-center text-center p-3 py-1 pt-5">
					<div style="max-width:256px;margin-bottom:12px">
						<?php if ($image == NULL) {
							echo '<img src="user_profile/profile.png" class="img-fluid">';
						} else {
							echo '<img src="user-profiles/' . $image . '" class="rounded-circle img-fluid">';
						}
						?>
					</div>
					<span class="font-weight-bold"><?php echo $fullname; ?></span><span class=><?php echo $email; ?></span><span> </span>
				</div>
				<nav id="navbar" class="nav-menu navbar">
					<ul style="list-style: none;">
						<?php if ($_SESSION['role'] == 'user') { ?>
							<li><a href="user.php" class="nav-link scrollto ml-3"><i class="fa-solid fa-user" style="width:42px;text-align:center"></i> <span>Profile</span></a></li>
							<li><a href="orders.php" class="nav-link scrollto ml-3"><i class="fa-solid fa-cart-shopping" style="width:42px;text-align:center"></i> <span>Purchases</span></a></li>
							<li><a href="messages.php" class="nav-link scrollto ml-3"><i class="fa-solid fa-envelope" style="width:42px;text-align:center"></i> <span>Messages</span></a></li>
							<li><a href="notifications.php" class="nav-link scrollto ml-3"><i class="fa-solid fa-bell" style="width:42px;text-align:center"></i> <span>Notifications <span class="badge badge-danger"><?= mysqli_num_rows($notifications) ?></span></span></a></li>
							<li><a href="user2ChangePassword.php" class="nav-link scrollto ml-3"><i class="fa-solid fa-cog" style="width:42px;text-align:center"></i> <span>Change Password</span></a></li>
						<?php } else { ?>
							<li><a href="user.php" class="nav-link scrollto ml-3"><i class="fa-solid fa-user" style="width:42px;text-align:center"></i> <span>Profile</span></a></li>
							<li><a href="orders.php" class="nav-link scrollto ml-3"><i class="fa-solid fa-cart-shopping" style="width:42px;text-align:center"></i> <span>Orders</span></a></li>
							<li><a href="messages.php" class="nav-link scrollto ml-3"><i class="fa-solid fa-envelope" style="width:42px;text-align:center"></i> <span>Messages</span></a></li>
							<li><a href="notifications.php" class="nav-link scrollto ml-3"><i class="fa-solid fa-bell" style="width:42px;text-align:center"></i> <span>Notifications <span class="badge badge-danger"><?= mysqli_num_rows($notifications) ?></span></span></a></li>
						<?php } ?>
					</ul>
				</nav>
			</div>

			<div class="row col-9 border-right pr-0">
				<?php if (isset($_GET['error'])) { ?>
					<div class="alert alert-warning alert-dismissible fade show center-block bg-danger text-white mb-0" role="alert" style="height: 60px">
						<strong>Error!</strong> <?php echo $_GET['error']; ?>
						<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php } ?>
				<?php if (isset($_GET['status'])) { ?>
					<div class="alert alert-warning alert-dismissible fade show center-block bg-success bg-gradient text-white mb-0" role="alert" style="height: 60px">
						<strong>Success!</strong> <?php echo $_GET['status']; ?>
						<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php } ?>
				<div class="p-5 py-5">
					<div class="d-flex justify-content-between align-items-center mt-3 mb-3">
						<h4 style="font-size: 30px;"><?= $_SESSION['role'] == 'user' ? 'My Purchases' : 'Orders' ?></h4>
					</div>
					<div class="mt-2 border-top">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Order #</th>
									<th>Name</th>
									<th>Address</th>
									<th>Total</th>
									<?php if ($_SESSION['role'] != 'user') { ?>
										<th>Action</th>
									<?php } ?>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($orders as $row) { ?>
									<tr>
										<td>
											<a href="javascript:" class="order" data-items='<?= json_encode($row["items"]); ?>'><?= $row['order_number'] ?></a><br>
											<small class="text-muted"><?= $row['status'] ?></small>
										</td>
										<td>
											<?= $row['name'] ?><br>
											<small class="text-muted"><?= $row['contact'] ?></small>
										</td>
										<td><?= $row['address'] ?>, <?= $row['city'] ?>, <?= $row['state'] ?>, <?= $row['zip'] ?></td>
										<td>
											₱<?= number_format($row['total'], 2) ?><br>
											<small class="text-muted"><?= $row['order_added'] ?></small>
										</td>
										<?php if ($_SESSION['role'] != 'user') { ?>
											<td>
												<?php if ($row['status'] == 'Pending') { ?>
													<a href="action.php?action=accept&id=<?= $row['order_id'] ?>&user_id=<?= $row['user_id'] ?>" class="btn btn-sm btn-warning" onclick="return confirm('Are you sure do you want to ACCEPT this order?')">Accept</a>
													<a href="action.php?action=reject&id=<?= $row['order_id'] ?>&user_id=<?= $row['user_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure do you want to REJECT this order?')">Reject</a>
												<?php } ?>
											</td>
										<?php } ?>
									</tr>
								<?php } ?>

								<?php if (!$orders) { ?>
									<tr>
										<td class="text-center" colspan="5">No <?= $_SESSION['role'] == 'user' ? 'purchases' : 'orders' ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalTitle">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Item Name</th>
								<th>Price</th>
								<th>Qty</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody id="tbody">
							<!-- javascript -->
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

</body>

<script>
	$('.order').click(function() {
		let items = $(this).data('items');
		let total = 0;
		$('#tbody').html('');
		$('#modalTitle').text(items[0]['order_number']);
		items.map(row => {
			total += row.qty * row.price
			const html = `
				<tr>
					<td>${row.name}</td>
					<td>₱${row.price}</td>
					<td>${row.qty}</td>
					<td>₱${row.qty * row.price}</td>
				</tr>
			`;
			$('#tbody').append(html);
		});
		const total_row = `
				<tr>
					<td>Grand Total</td>
					<td></td>					
					<td></td>
					<td>₱${total}</td>
				</tr>
			`;

		$('#tbody').append(total_row);
		$('#orderModal').modal('show');
	});

	$('[data-dismiss="modal"]').click(function() {
		$('#orderModal').modal('hide');
	});
</script>

</html>

<?php
include('footer.php');
?>