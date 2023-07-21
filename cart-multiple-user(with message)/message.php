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
$convo_id = $_GET['convo_id'];

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

$users = mysqli_query($conn, "SELECT * FROM user_form");

$convo_query = "SELECT * FROM convo 
								JOIN user_form ON user_form.id = convo.recipient
								WHERE convo_id='$convo_id'";
$convo_query = mysqli_query($conn, $convo_query);
$convo = mysqli_fetch_assoc($convo_query);

$messages_query = "SELECT * FROM messages 
WHERE convo_id='$convo_id'";
$messages = mysqli_query($conn, $messages_query);
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

		.sender {
			border: 1px solid #E6873C;
			border-radius: 12px;
			padding: 16px;
			color: #E6873C;
			align-self: flex-start;
			margin-top: 8px;
			border-top-left-radius: 0;
		}

		.receiver {
			border: 1px solid #E6873C;
			background-color: #E6873C;
			border-radius: 12px;
			padding: 16px;
			color: #fff;
			align-self: flex-end;
			margin-top: 8px;
			border-bottom-right-radius: 0;
		}

		.convo {
			display: flex;
			flex-direction: column;
			max-height: 325px;
			overflow-y: scroll;
			scrollbar-color: #E6873C #EEAF7D;
			scrollbar-width: thin;
			padding-right: 4px;
		}

		.attachment {
			width: 100%;
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
							<li><a href="user-changepass.php" class="nav-link scrollto ml-3"><i class="fa-solid fa-cog" style="width:42px;text-align:center"></i> <span>Change Password</span></a></li>
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
				<div class="p-5 pb-0">
					<div class="d-flex justify-content-between align-items-center mt-3 mb-3">
						<h4 style="font-size: 30px;">Subject: <?= $convo['subject'] ?></h4>
						<small>Conversation with <?= $convo['email'] ?></small>
					</div>
					<div class="mt-2 pt-3 border-top">
						<div class="convo" id="convo">
							<?php foreach ($messages as $row) { ?>
								<div class="<?= $row['from_id'] != $user_id ? 'sender' : 'receiver' ?>" style="max-width: 500px;">
									<span><?= $row['message'] ?></span>
									<?php if (!empty($row['attachment'])) { ?>
										<?php if (strpos($row['attachment'], '.mp4') !== false || strpos($row['attachment'], '.mpeg') !== false || strpos($row['attachment'], '.mov') !== false) { ?>
											<video src="<?= $row['attachment'] ?>" controls class="attachment"></video>
										<?php } elseif (strpos($row['attachment'], '.jpg') !== false || strpos($row['attachment'], '.jpeg') !== false || strpos($row['attachment'], '.png') !== false || strpos($row['attachment'], '.gif') !== false) { ?>
											<img src="<?= $row['attachment'] ?>" alt="Attachment" class="attachment">
										<?php } ?>
									<?php } ?>
									<br>
									<small><span><?= $row['message_added'] ?></span></small>
								</div>
							<?php } ?>
						</div>
						<div class="mt-3">
							<form action="" method="POST" enctype="multipart/form-data">
								<textarea class="form-control" rows="2" name="message" placeholder="Enter reply"></textarea>
								<input type="submit" value="Send Reply" class="btn btn-warning mt-2" name="send">
								<input type="file" name="attachment" accept="image/*,video/*">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

<script>
	$(document).ready(function() {
		var convo_div = document.getElementById("convo");
		convo_div.scrollTop = convo_div.scrollHeight;
	});
</script>

</html>

<?php
include('footer.php');
?>