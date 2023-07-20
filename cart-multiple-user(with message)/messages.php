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

$users = mysqli_query($conn, "SELECT * FROM user_form");

$convo_query = "SELECT * FROM convo 
								JOIN user_form ON user_form.id = convo.recipient
								WHERE user_id='$user_id' 
								OR recipient='$user_id' 
								ORDER BY convo_id DESC";
$convo_query = mysqli_query($conn, $convo_query);
$convos = array();

while ($convo_row = mysqli_fetch_assoc($convo_query)) {
	$convo_id = $convo_row['convo_id'];
	$sql = "SELECT *
	        FROM messages
					WHERE convo_id = '$convo_id'";

	$message_query = mysqli_query($conn, $sql);

	$messages = [];

	while ($message_row = mysqli_fetch_assoc($message_query)) {
		array_push($messages, $message_row);
	}

	$convo_row['messages'] = $messages;
	$convos[] = $convo_row;
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
						<h4 style="font-size: 30px;">Messages</h4>
						<button class="btn btn-warning" data-toggle="modal" data-target="#messageModal">Compose Message</button>
					</div>
					<div class="mt-2 border-top">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Recepient</th>
									<th>Subject</th>
									<th>Message</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($convos as $row) { ?>
									<tr>
										<?php if ($row['user_id'] == $user_id) { ?>
											<td><a href="message.php?convo_id=<?= $row['convo_id'] ?>" style="color:#333;text-decoration: none;"><?= $row['email'] ?></a></td>
										<?php } else { ?>
											<td><a href="message.php?convo_id=<?= $row['convo_id'] ?>" style="color:#333;text-decoration: none;"><?= $email ?></a></td>
										<?php } ?>
										<td><a href="message.php?convo_id=<?= $row['convo_id'] ?>" style="color:#333;text-decoration: none;"><?= $row['subject'] ?></a></td>
										<td><a href="message.php?convo_id=<?= $row['convo_id'] ?>" style="color:#333;text-decoration: none;"><?= $row['messages'][count($row['messages']) - 1]['message'] ?></a></td>
										<td><a href="message.php?convo_id=<?= $row['convo_id'] ?>" style="color:#333;text-decoration: none;"><?= $row['convo_added'] ?></a></td>
									</tr>
								<?php } ?>

								<?php if (!$convos) { ?>
									<tr>
										<td class="text-center" colspan="4">No messages</td>
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
	<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="messageLabel">Compose Message</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="POST" id="frmMessage" enctype="multipart/form-data">
						<input type="hidden" value="compose" name="compose">
						<div class="form-group">
							<label>Recepient</label>
							<select class="form-control" name="recipient" required>
								<option value="">- select recipient -</option>
								<?php foreach ($users as $row) { ?>
									<?php if ($row['id'] != $user_id) { ?>
										<option value="<?= $row['id'] ?>"><?= $row['name'] ?> <?= $row['id'] == 1 ? '(Seller)' : '' ?></option>
									<?php } ?>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>Subject</label>
							<input type="text" class="form-control" name="subject" required>
						</div>
						<div class="form-group">
							<label>Message</label>
							<textarea name="message" rows="4" class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label>Attachment</label>
							<input type="file" name="attachment" accept="image/*,video/*" class="form-control">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" form="frmMessage">Send Message</button>
				</div>
			</div>
		</div>
	</div>

</body>

<script>

</script>

</html>

<?php
include('footer.php');
?>