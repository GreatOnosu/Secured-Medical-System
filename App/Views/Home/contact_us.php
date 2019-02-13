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
			<?php include 'includes/nav.php';?>
		</div>
		<div class="breadcrumb">
			<h1>Contact Us</h1>
		</div>
	</div>
	<div id="reserve">
		<div class="intro-text">
			<h1>Our Story</h1>
			<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</p>
		</div>
		<div class="booking-tab">
			<img src="images/about.png" width="100%">
		</div>
	</div>
	<div id="our-hotels" style="text-align: center;">
		<span>Get In Touch with Our Team</span>
		<div class="hotels-contain">
			<div class="hotels-box">
				<div class="hotel-pix">
					<img src="images/team_1.jpg" width="100%">
				</div>
				<div class="hotel-view">
					<a>Dr Great Onosu</a><br>
					<span style="font-size: 18px;">08063378707</span style="font-size: 18px;">
				</div>
			</div>
			<div class="hotels-box">
				<div class="hotel-pix">
					<img src="images/team_2.jpg" width="100%">
				</div>
				<div class="hotel-view">
					<a>Dr Ify Chinke</a><br>
					<span style="font-size: 18px;">08039202020</span style="font-size: 18px;">
				</div>
			</div>
			<div class="hotels-box">
				<div class="hotel-pix">
					<img src="images/team_3.jpg" width="100%">
				</div>
				<div class="hotel-view">
					<a>Dr Dharyhor Isreal</a><br>
					<span style="font-size: 18px;">08039643212</span style="font-size: 18px;">
				</div>
			</div>
		</div>
	</div>
	<?php include'includes/footer.php'?>
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