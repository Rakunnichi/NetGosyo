<?php
require 'config.php';
session_start();

$user_id = $_SESSION['user_id'] ?? '3';
// Get no.of items available in the cart table
if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {

	$stmt = $conn->prepare("SELECT * FROM cart WHERE user_id = '$user_id'");
	$stmt->execute();
	$stmt->store_result();
	$rows = $stmt->num_rows;

	echo $rows;
}

if (isset($_GET['action'])) {
	$action = $_GET['action'];
	if ($action == 'accept') {
		$id = $_GET['id'];
		$user_id = $_GET['user_id'];
		mysqli_query($conn, "UPDATE orders SET status='Accepted' WHERE order_id='$id'");
		mysqli_query($conn, "INSERT INTO notifications SET user_id='$user_id', notification='The seller accepted your order. Expected to arrive in 2-3 business days. Thank you!'");
		header("location: Seller_Page/orders.php?status=Order successfully accepted!");
	} elseif ($action == 'reject') {
		$id = $_GET['id'];
		$user_id = $_GET['user_id'];
		mysqli_query($conn, "UPDATE orders SET status='Rejected' WHERE order_id='$id'");
		mysqli_query($conn, "INSERT INTO notifications SET user_id='$user_id', notification='The seller rejected your order. You can contact the seller for more info. Thank you!'");
		header("location: orders.php?status=Order successfully rejected!");
	}
}
