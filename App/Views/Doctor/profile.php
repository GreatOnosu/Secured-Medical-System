<!DOCTYPE html>
<html>
<head runat="server">
	<base href="/SMBS/public/">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Medical Based System</title>
	<link href="css/magic.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="../vendor/jquery-ui.css">
    <script src="../vendor/jquery.min.js"></script>
    <script src="../vendor/jquery-ui.js"></script>
    <script src="js/menu.js"></script>
</head>
<body>
	<?php include'includes/admin_aside.php';?>
	<div id="head-flow">
		<div class="admin-nav">
			<div class="nav-head">
				<h1>Add Doctor</h1>
			</div>
			<div class="nav-info">
				<span style="font-size:22px;"><?=$_SESSION['session_name'];?>&nbsp;&nbsp;</span>
				<a href="logout" style="text-decoration: none; color:#fff;"><span><img src="icons/logout.png" title="Logout" /></span></a>
			</div>
		</div>
		<div class="admin-body">
			<div class="body-info">
				<div class="admin-form">
					<form action="Hospital/adddoctor" method="post">
						<?=$stat?>
						<dt class="form-control">
							<input type="text" id="fname" name="fname" placeholder="First Name" required />
						</dt>
						<dt class="form-control">
							<input type="text" id="lname" name="lname" placeholder="Last Name" required />
						</dt>
						<dt class="form-control">
							<input type="text" id="room" name="room" placeholder="Consultation Room Number" required />
						</dt>
						<dt class="form-control">
							<input type="text" id="phone" name="phone" placeholder="Phone Number" required />
						</dt>
						<dt class="form-control">
							<input type="email" id="email" name="email" placeholder="Email" required />
						</dt>
						<dt class="form-control">
							<input type="password" id="pin" name="pin" placeholder="Pin" required />
						</dt>
						<dt class="form-control">
							<input type="submit" value="Add" name="btn_doctor" class="btn-login" />
						</dt>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php include'includes/admin_footer.php';?>
</body>
<script>
      /* global setting */
    var datepickersOpt = {
        dateFormat: 'yy-mm-dd'
    }
    $("#date").datepicker(datepickersOpt);
</script>
</html>