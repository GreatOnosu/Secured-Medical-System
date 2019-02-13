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
	<?php include'includes/doctor_aside.php';?>
	<div id="head-flow">
		<div class="admin-nav">
			<div class="nav-head">
				<h1>Add Doctor</h1>
			</div>
			<div class="nav-info">
				<span style="font-size:22px;"><?=$_SESSION['session_user'];?>&nbsp;&nbsp;</span>
				<a href="logout" style="text-decoration: none; color:#fff;"><span><img src="icons/logout.png" title="Logout" /></span></a>
			</div>
		</div>
		<div class="admin-body">
			<div class="body-info">
				<div class="admin-form">
					<form id="myForm" action="doctor/schedule" method="post">
						<?//=$stat?>
						<h1>Please select the days of the week to accept appointments</h1>
						<dt class="form-control" style="font-size: 24px; padding: 10px; ">
							<input type="checkbox" name="day1" value="Sunday-Free"> Sunday<br>
  							<input type="checkbox" name="day2" value="Monday-Free"> Monday <br>
  							<input type="checkbox" name="day3" value="Tuesday-Free"> Tuesday<br>
  							<input type="checkbox" name="day4" value="Wednesday-Free"> Wednesday <br>
  							<input type="checkbox" name="day5" value="Thursday-Free"> Thursday<br>
  							<input type="checkbox" name="day6" value="Friday-Free"> Friday <br>
  							<input type="checkbox" name="day7" value="Saturday-Free"> Saturday<br> 
						</dt>
						<dt class="form-control">
							<input type="button" value="Schedule" name="btn_schedule" class="btn-login" id="btnCheck" />
							<input type="hidden" value="Schedule" name="btn_sch" value="Yes" />
						</dt>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php include'includes/admin_footer.php';?>
</body>
</html>