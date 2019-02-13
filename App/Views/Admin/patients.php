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
	<?php include'includes/main_aside.php';?>
	<div id="head-flow">
		<div class="admin-nav">
			<div class="nav-head">
				<h1>Doctors</h1>
			</div>
			<div class="nav-info">
				<span style="font-size:22px;"><?=$_SESSION['session_user'];?>&nbsp;&nbsp;</span>
				<a href="logout" style="text-decoration: none; color:#fff;"><span><img src="icons/logout.png" title="Logout" /></span></a>
			</div>
		</div>
		<div class="admin-body">
			<div class="body-info">
				<table>
					<tr>
						<th>SN</th>
				    	<th>First name</th>
				    	<th>Last name</th>
				    	<th>Gender</th>
				    	<th>Email</th>
				    	<th>Phone Number</th>
				    	<th>Address</th>
				    	<th>Registeration Date</th>
				    	<th>Delete</th>
				  	</tr>
				  	<?php $xx=1; foreach($records as $record):?>
				  	<tr>
				  		<td><?=$xx?></td>
				  		<td><?=$record->first_name?></td>
				  		<td><?=$record->last_name?></td>
				  		<td><?=$record->gender?></td>
				  		<td><?=$record->email?></td>
				  		<td><?=$record->phone?></td>
				  		<td><?=$record->address?></td>
				  		<td><?=$record->timestamp?></td>
				  		<td>
				  			<form action="admin/patients" method="post">
				  				<input type="submit" name="del_pat" value="Delete" />
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