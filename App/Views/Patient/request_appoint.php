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
	<?php include'includes/patient_aside.php';?>
	<div id="head-flow">
		<div class="admin-nav">
			<div class="nav-head">
				<h1>Request Appointment</h1>
			</div>
			<div class="nav-info">
				<span style="font-size:22px;"><?=$_SESSION['session_user'];?>&nbsp;&nbsp;</span>
				<a href="logout" style="text-decoration: none; color:#fff;"><span><img src="icons/logout.png" title="Logout" /></span></a>
			</div>
		</div>
		<div class="admin-body">
			<div class="body-info">
				<div class="admin-form">
					<form action="Patient/request" method="post" id="adminPanel">
						<?=$stat?>
						<select id="hospital" name="hospital" required>
					      <option value="">Select Hospital</option>
					      <?php foreach($hospitals as $hospital):?>
					      <option value="<?=$hospital->name?>"><?=$hospital->name?></option>
					  	  <?php endforeach;?>
					    </select>
					    <select name="service" id="serc" required>
					      <option value="">Service Type (Must select hospital first)</option>
					    </select>
					    <input type="text" id="date" name="doa" placeholder="Date of Appointment" required />
					    <input type="time" name="tod" placeholder="Time of Day" required />
					    <select name="doctor" id="doc" required>
					      <option value="">Select Doctor (Must select hospital first)</option>
					    </select>
					    <textarea name="desc" placeholder="Brief Description"></textarea>
					    <input type="submit" value="Book" name="btn_appoint">
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
        dateFormat: 'yy-mm-dd',
        minDate   : 0,
        changeMonth: true
    }
    $("#date").datepicker(datepickersOpt);
</script>
</html>