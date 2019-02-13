<?php
if($_SESSION['session_level'] != 'Admin'){
	header('Location:admin/index');
}
?>
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
				<h1>Rooms</h1>
			</div>
			<div class="nav-info">
				<span style="font-size:22px;"><?=$_SESSION['entry_username']?>&nbsp;&nbsp;</span>
				<a href="admin/logout" style="text-decoration: none; color:#fff;"><span><img src="icons/logout.png" title="Logout" /></span></a>
			</div>
		</div>
		<div class="admin-body">
			<div class="body-info">
				<a href="Admin/addroom"><div style="float: right; width: 25%;"><input type="submit" name="btn_add" class="book-room" value="Add new"></div></a>
				<table>
					<tr>
				    	<th>SN</th>
				    	<th>Room Name</th>
				    	<th>Branch</th>
				    	<th>Price</th>
				    	<th>Total Rooms</th>
				    	<th>Occupied Rooms</th>
				    	<th>Available Rooms</th>
				    	<th>Edit</th>
				    	<th>Delete</th>
				  	</tr>
				  		<?php $sn = 1;?>
				  	<?php foreach ($get_room as $row): ?>
				  	<tr>
				  		<td><?=$sn?></td>
				    	<td><?=$row['category']?></td>
				    	<td><?=$row['branch']?></td>
				    	<td> ₦<?=$row['price']?></td>
				    	<td><?=$row['total_rooms']?></td>
				    	<td><?=$row['occupied_rooms']?></td>
				    	<td><?=$row['total_rooms'] - $row['occupied_rooms']?></td>
				    	<td><a href="Admin/editroom?roomid=<?=$row['id']?>"><input type="submit" name="btn_edit" class="book-room" value="Update Room"></a></td>
				    	<td><a href="Admin/room?deleteroomid=<?=$row['id']?>"><input type="submit" name="del_room" class="book-room" value="Delete" /></a></td>	
					</tr><?php $sn++;?>
					<?php endforeach ;?>
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