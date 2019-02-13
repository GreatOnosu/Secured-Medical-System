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
	<?php include'includes/admin_aside.php';?>
	<div id="head-flow">
		<div class="admin-nav">
			<div class="nav-head">
				<h1>Doctors</h1>
			</div>
			<div class="nav-info">
				<span style="font-size:22px;"><?=$_SESSION['session_name'];?>&nbsp;&nbsp;</span>
				<a href="logout" style="text-decoration: none; color:#fff;"><span><img src="icons/logout.png" title="Logout" /></span></a>
			</div>
		</div>
		<div class="admin-body">
			<div class="body-info">
				<a href="Hospital/adddoctor"><div class="request-appoint"><input type="submit" name="btn_add" value="Add Doctor"></div></a>
				<table>
					<tr>
						<th>SN</th>
				    	<th>Full Name</th>
				    	<th>Email</th>
				    	<th>Phone Number</th>
				    	<th>Hospital</th>
				    	<th>Room</th>
				    	<th>Update</th>
				    	<th>Delete</th>
				  	</tr>
				  	<?php $xx=1; foreach($records as $record):?>
				  	<tr>
				  		<td><?=$xx?></td>
				  		<td><?=$record->first_name.' '.$record->last_name?></td>
				  		<td><?=$record->email?></td>
				  		<td><?=$record->phone_no?></td>
				  		<td><?=$record->hospital?></td>
				  		<td><?=$record->room?></td>
				  		<td>
				  			<form action="hospital/updatedoctor" method="post">
				  				<input type="submit" name="upd_doc" value="Update" />
				  				<input type="hidden" name="upd_id" value="<?=$record->id?>" />
				  			</form>
				  		</td>
				  		<td>
				  			<form action="hospital/doctors" method="post">
				  				<input type="submit" name="del_doc" value="Cancel" />
				  				<input type="hidden" name="del_id" value="<?=$record->id?>" />
				  			</form>
				  		</td>
					</tr>
					<?php $xx++; endforeach;?>
				</table>
			</div>
		</div>
	</div>
	<?php include'includes/admin_footer.php';?>
</body>
</html>