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
				<h1>Services</h1>
			</div>
			<div class="nav-info">
				<span style="font-size:22px;"><?=$_SESSION['session_name'];?>&nbsp;&nbsp;</span>
				<a href="logout" style="text-decoration: none; color:#fff;"><span><img src="icons/logout.png" title="Logout" /></span></a>
			</div>
		</div>
		<div class="admin-body">
			<div class="body-info">
				<a href="Hospital/addservice"><div class="request-appoint"><input type="submit" name="btn_add" value="Add Service"></div></a>
				<table>
					<tr>
						<th>SN</th>
				    	<th>Service</th>
				    	<th>Delete</th>
				  	</tr>
				  	<?php $xx=1; foreach($records as $record):?>
				  	<tr>
				  		<td><?=$xx?></td>
				  		<td><?=$record->name?></td>
				  		<td>
				  			<form action="Hospital/services" method="post">
				  				<input type="submit" name="del_duty" value="Delete" />
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