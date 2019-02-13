<!DOCTYPE html>
<html>
<head runat="server">
	<base href="/SMBS/public/">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Renny Hotel n Suites</title>
	<link href="css/magic.less" type="text/css" rel="stylesheet/less">
	<link rel="stylesheet" href="../vendor/jquery-ui.css">
    <script src="../vendor/jquery.min.js"></script>
    <script src="../vendor/jquery-ui.js"></script> 
	<script src="../vendor/less.min.js"></script>
</head>
<body>
	<?php include'includes/side_bar.php'?>
	<div id="head-flow">
		<div class="admin-nav">
			<div class="nav-head">
				<h1>Dashboard</h1>
			</div>
			<div class="nav-info">
				<span>User</span>
				<span>Logout</span>
			</div>
		</div>
		<div class="admin-body">
			<div class="body-links">
				<a href="" class="link-data"><div>
					dd
				</div></a>
				<a href="" class="link-data"><div>
					
				</div></a>
				<a href="" class="link-data"><div>
					
				</div></a>
			</div>
			<div class="body-info">
				<h1>Last 5 Reservations</h1>
				<table>
					<tr>
				    	<th>Firstname</th>
				    	<th>Lastname</th>
				    	<th>Savings</th>
				    	<th>Firstname</th>
				    	<th>Lastname</th>
				    	<th>Savings</th>
				  	</tr>
				  	<tr>
				   		<td>Peter</td>
				    	<td>Griffin</td>
				    	<td>$100</td>
				    	<td>Peter</td>
				    	<td>Griffin</td>
				    	<td>$100</td>
				  	</tr>
				  	<tr>
				    	<td>Lois</td>
				    	<td>Griffin</td>
				    	<td>$150</td>
				    	<td>Peter</td>
				    	<td>Griffin</td>
				    	<td>$100</td>
				  	</tr>
				  	<tr>
				    	<td>Joe</td>
				    	<td>Swanson</td>
				    	<td>$300</td>
				    	<td>Peter</td>
				    	<td>Griffin</td>
				    	<td>$100</td>
				  	</tr>
				  	<tr>
				    	<td>Cleveland</td>
				    	<td>Brown</td>
				    	<td>$250</td>
				    	<td>Peter</td>
				    	<td>Griffin</td>
				    	<td>$100</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<?php include'includes/admin_footer.php'?>
</body>
<script>
      /* global setting */
    var datepickersOpt = {
        dateFormat: 'dd-mm-yy',
        minDate   : 0
    }
    $("#date").datepicker(datepickersOpt);
    $("#date1").datepicker(datepickersOpt);
</script>
</html>