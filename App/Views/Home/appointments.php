<!DOCTYPE html>
<html>
<head runat="server">
	<base href="/SMBS/public/">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Medical Booking System</title>
	<link href="css/magic.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="../vendor/jquery-ui.css">
    <script src="../vendor/jquery.min.js"></script>
    <script src="../vendor/jquery-ui.js"></script>
</head>
<body>
	<div id="top-wrap">
		<div id="top-nav">
			<div class="title">
				<a>Medical Booking System</a>
			</div>
			<?php include'includes/nav.php';?>
		</div>
		<div class="breadcrumb">
			<h1></h1>
		</div>
	</div>
	<div id="reserve">
		<div class="intro-text">
			<h1>Appointments</h1>
			<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
			<h1>Register with us</h1>
			<h3>Click <a href="home/account">here</a> to get an account with us today!!!</h3>
		</div>
		<div class="booking-tab">
			<h2>If Registered...Sign In</h2>
			<form id="horizon" action="home/index" method="post">
				<select name="category" required>
					<option value="">Select Account</option>
					<option value="patients_tb">Personal</option>
					<option value="doctors_tb">Doctor</option>
					<option value="hospitals_tb">Hospital</option>
				</select>
				<input type="text" placeholder="Username" name="userid" required />
				<input type="password" placeholder="Password" name="userpass" required />
			    <input type="submit" class="btn-book" name="btn_login" value="Login">
			</form>
			<p><a href="Home/account">Create Account</a></p>
		</div>
	</div>
	<?php include'includes/footer.php';?>
</body>
<script>
      /* global setting */
    var datepickersOpt = {
        dateFormat: 'dd-mm-yy',
        changeMonth: true,
      	changeYear: true
    }
    $("#date").datepicker(datepickersOpt);
</script>
</html>