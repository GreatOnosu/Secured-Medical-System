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
				<h1>Update Records</h1>
			</div>
			<div class="nav-info">
				<span style="font-size:22px;"><?=$_SESSION['session_name'];?>&nbsp;&nbsp;</span>
				<a href="logout" style="text-decoration: none; color:#fff;"><span><img src="icons/logout.png" title="Logout" /></span></a>
			</div>
		</div>
		<div class="admin-body">
			<div class="body-info">
				<div class="admin-form">
					<form action="Hospital/update" method="post" id="adminPanel">
						<input type="text" name="phone" placeholder="Phone Number" value="<?=$records{0}->phone?>" required />
						<input type="email" name="email" placeholder="Email" value="<?=$records{0}->email?>" required />
						<textarea name="about_us" required><?=$records{0}->about_us?></textarea>
						<input type="hidden" name="id_hosp"  value="<?=$records{0}->id?>" />
						<input type="submit" name="upd_hospital" value="Update" />
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