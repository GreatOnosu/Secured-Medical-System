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
				<h1>Update Appointment</h1>
			</div>
			<div class="nav-info">
				<span style="font-size:22px;"><?=$_SESSION['session_user'];?>&nbsp;&nbsp;</span>
				<a href="logout" style="text-decoration: none; color:#fff;"><span><img src="icons/logout.png" title="Logout" /></span></a>
			</div>
		</div>
		<div class="admin-body">
			<div class="body-info">
				<div class="admin-form">
					<form action="Patient/updaterequest" method="post" id="adminPanel">
						<select id="hospital" name="hospital" required>
					      <option value="<?=$records{0}->hospital?>"><?=$records{0}->hospital?> (Select Hospital First)</option>
					      <?php foreach($clinics as $clinic):?>
					      <option value="<?=$clinic->name?>"><?=$clinic->name?></option>
					  	  <?php endforeach;?>
					    </select>
					    <select name="service" id="serc" required>
					      <option value="<?=$records{0}->service_type?>"><?=$records{0}->service_type?></option>
					    </select>
					    <input type="text" id="date" name="doa" placeholder="Date of Appointment" value="<?=$records{0}->doa?>" required />
					    <input type="time" name="tod" placeholder="Time of Day" value="<?=$records{0}->tod?>" required />
					    <select name="doctor" id="doc" required>
					      <option value="<?=$records{0}->requested_doctor?>|<?=$records{0}->full_name?>"><?=$records{0}->full_name?></option>
					    </select>
					    <textarea name="desc" placeholder="Brief Description"><?=$records{0}->description?></textarea>
					    <input type="hidden" name="id_appoint" value="<?=$records{0}->id?>" />
					    <input type="submit" value="Book" name="upd_appoint">
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