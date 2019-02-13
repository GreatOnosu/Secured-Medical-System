<!DOCTYPE html>
<html>
<head runat="server">
	<base href="/SMBS/public/">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Medical Booking System</title>
	<link href="css/magic.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="../vendor/jquery-ui.css">
    <script src="../vendor/jquery.min.js"></script>
    <script src="../vendor/jquery-ui.js"></script>
</head>
<body>
	<div id="top-wrap">
		<div id="top-nav">
			<div class="title">
				<a>Medical Booking System</a>
			</div>
			<?php include'includes/nav.php';?>
		</div>
		<div class="breadcrumb">
			<h1></h1>
		</div>
	</div>
	<div id="reserve">
		<div class="intro-text">
			<h1><?=$records{0}->name?></h1>
			<p><?=$records{0}->about_us?></p>
		</div>
		<div class="booking-tab">
			<h2>Sign In</h2>
			<form id="horizon" action="home/index" method="post">
				<select name="category" required>
					<option value="patients_tb">Personal</option>
				</select>
				<input type="text" placeholder="Username" name="userid" required />
				<input type="password" placeholder="Password" name="userpass" required />
			    <input type="submit" class="btn-book" name="btn_login" value="Book">
			</form>
			<p><a href="Home/account">Create Account</a></p>
		</div>
	</div>
	<div id="our-hotels" style="text-align: center;">
		<span>Facilities</span>
		<div class="hotels-contain">
			<?php foreach($facility as $item):?>
			<div class="hotels-box">
				<div class="hotel-pix">
					<img src="<?=$item->image?>" height="250" width="100%" />
				</div>
				<div class="hotel-view">
					<a><?=$item->name?></a>
				</div>
			</div>
			<?php endforeach;?>
		</div>
	</div>
	<div id="our-hotels" style="text-align: center;">
		<span>Services</span>
		<div class="hotels-contain">
			<?php foreach($service as $duty):?>
			<div class="hotels-feat">
				<div class="feat-desc">
					<img src="icons/fdesk.png" align="left";><p><?=$duty->name?></p>
				</div>
			</div>
			<?php endforeach?>
		</div>
	</div>
	<?php include'includes/footer.php';?>
</body>
</html>