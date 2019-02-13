<!DOCTYPE html>
<html>
<head runat="server">
	<base href="/SMBS/public/">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MEDICAL BASED SYSTEM</title>
	<link rel="stylesheet" type="text/css" href="css/magic.css">
	<link rel="stylesheet" href="../vendor/jquery-ui.css">
    <script src="../vendor/jquery.min.js"></script>
    <script src="../vendor/jquery-ui.js"></script> 
</head>
<body>
	<section id="signUp">
		<dl class="form">
			<dt>
				<h1><?//=$stat?></h1>
				<h1>Create Account</h1>
			</dt>
			<form action="Home/personalaccount" method="post">
			<dt class="form-control">
				<input type="text" id="fname" name="fname" placeholder="First Name" required />
			</dt>
			<dt class="form-control">
				<input type="text" id="lname" name="lname" placeholder="Last Name" required />
			</dt>
			<dt class="form-control" style="text-align: left; font-size: 18px; margin: 10px 0px;">
				<input name="gender" value="male" checked="" type="radio"> Male &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input name="gender" value="female" type="radio"> Female<br>
			</dt>
			<dt class="form-control">
				<input type="text" id="dob" name="dob" placeholder="DoB" required />
			</dt>
			<dt class="form-control">
				<textarea placeholder="Contact Address" name="address"></textarea>
			</dt>
			<dt class="form-control">
				<input type="text" id="phone" name="phone" placeholder="Phone Number" required />
			</dt>
			<dt class="form-control">
				<input type="email" id="email" name="email" placeholder="Email" required />
			</dt>
			<dt class="form-control">
				<input type="password" id="pin" name="pin" placeholder="Pin" required />
			</dt>
			<dt class="form-control">
				<input type="submit" value="Sign Up" name="btn_personal" class="btn-login" />
			</dt>
			<dt>
				<a href="Home/index">Create</a>
			</dt>
			</form>
		</dl>
	</section>
</body>
<script>
      /* global setting */
    var datepickersOpt = {
        dateFormat: 'yy-mm-dd'
    }
    $("#dob").datepicker(datepickersOpt);
</script>
</html>