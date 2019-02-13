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
				<h1>History</h1>
			</div>
			<div class="nav-info">
				<span style="font-size:22px;"><?=$_SESSION['session_user'];?>&nbsp;&nbsp;</span>
				<a href="logout" style="text-decoration: none; color:#fff;"><span><img src="icons/logout.png" title="Logout" /></span></a>
			</div>
		</div>
		<div class="admin-body">
			<div class="body-info">
				<!-- <a href="Patient/request"><div class="request-appoint"><input type="submit" name="btn_add" value="Request Appointment"></div></a> -->
				<table>
					<tr>
						<th>SN</th>
				    	<th>Patient</th>
				    	<th>Service Type</th>
				    	<th>Date</th>
				    	<th>Time</th>
				    	<th>Status</th>
				    	<th>Report</th>
				  	</tr>
				  	<?php $xx=1; foreach($records as $record):?>
				  	<tr>
				  		<td><?=$xx?></td>
				  		<td><?=$record->user?></td>
				  		<td><?=$record->service_type?></td>
				  		<td><?=$record->doa?></td>
				  		<td><?=$record->tod?></td>
				  		<td><?=$record->attendance?></td>
				  		<td><?=$record->report?></td>
					</tr>
					<?php $xx++; endforeach;?>
				</table>
			</div>
		</div>
	</div>
	<?php include'includes/admin_footer.php';?>
</body>
</html>