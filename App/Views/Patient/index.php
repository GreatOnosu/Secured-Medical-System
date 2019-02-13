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
</head>
<body>
	<?php include'includes/patient_aside.php';?>
	<div id="head-flow">
		<div class="admin-nav">
			<div class="nav-head">
				<h1>Dashboard</h1>
			</div>
			<div class="nav-info">
				<span style="font-size:22px;"><?=$_SESSION['session_user'];?>&nbsp;&nbsp;</span>
				<a href="logout" style="text-decoration: none; color:#fff;"><span><img src="icons/logout.png" title="Logout" /></span></a>
			</div>
		</div>
		<div class="body-links">
			<a href="Patient/appointments" class="link-data" style="background-color: #63C2DE;"><div>
				<p>View <br /> Appointment</p>
				<p></p>
			</div></a>
			<a href="patient/history" class="link-data" style="background-color: #479129;"><div>
				<p>Medical <br /> History</p>
				<p></p>
			</div></a>
			<a href="patient/request" class="link-data" style="background-color: #F8CB00;"><div>
				<p>Book <br /> Appointment</p>
				<p></p>
			</div></a>
		</div>
		<div class="admin-body">	
			<div class="body-info">
				<h1 style="color: #381d40;">Notifications</h1>
				<table>
					<tr>
				    	<th>Hospital</th>
				    	<th>Requested Doctor</th>
				    	<th>Consultation Room</th>
				    	<th>Contact Doc</th>
				    	<th>Date</th>
				    	<th>Time</th>
				    	<th>Status</th>
				  	</tr>
				  	<?php foreach($records as $record):?>
				  	<tr>
				  		<td><?=$record->hospital?></td>
				  		<td><?=$record->full_name?></td>
				  		<td><?=$record->room?></td>
				  		<td><?=$record->requested_doctor?></td>
				  		<td><?=$record->doa?></td>
				  		<td><?=$record->tod?></td>
				  		<td><?=$record->status?></td>
					</tr>
					<?php endforeach;?>
				</table>
			</div>
		</div>
	</div>
	<?php include'includes/admin_footer.php';?>
</body>
</html>