<!DOCTYPE html>
<html>
<head runat="server">
	<base href="/SMBS/public/">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Medical Based Sysytem</title>
	<link href="css/magic.css" type="text/css" rel="stylesheet">
    <script src="../vendor/jquery.min.js"></script>
    <script src="js/menu.js"></script>
</head>
<body>
	<?php include'includes/doctor_aside.php';?>
	<div id="head-flow">
		<div class="admin-nav">
			<div class="nav-head">
				<h1>Report</h1>
			</div>
			<div class="nav-info">
				<span style="font-size:22px;"><?=$_SESSION['session_user'];?>&nbsp;&nbsp;</span>
				<a href="logout" style="text-decoration: none; color:#fff;"><span><img src="icons/logout.png" title="Logout" /></span></a>
			</div>
		</div>
		<div class="admin-body">
			<div class="body-info">
				<div class="admin-form">
					<form action="doctor/report" method="post" id="adminPanel">
					    <select name="attendance" required>
					      <option value="">Meeting Status</option>
					      <option value="Attended">Attended</option>
					      <option value="Missed">Missed appointment</option>
					    </select>
					    <textarea name="doc_report" placeholder="Doctor Report on patient" rows="10"></textarea>
					    <input type="hidden" name="report_id" value="<?=$records{0}->id?>" />
					    <input type="submit" value="Book" name="btn_report">
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php include'includes/admin_footer.php';?>
</body>
</html>