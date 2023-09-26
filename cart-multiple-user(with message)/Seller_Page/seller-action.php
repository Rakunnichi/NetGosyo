<?php
require '../config.php';
session_start();



if(isset($_GET['id'])){
	
    $id = $_GET['id'];
	
		mysqli_query($conn, "DELETE FROM products WHERE id='$id'");
		header("location:my_products.php");
	

}

