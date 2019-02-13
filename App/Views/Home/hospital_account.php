<!DOCTYPE html>
<html>
<head runat="server">
	<base href="/SMBS/public/">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MEDICAL BASED SYSTEM</title>
	<link rel="stylesheet" type="text/css" href="css/magic.css">
</head>
<body>
	<section id="signUp">
		<dl class="form">
			<dt>
				<h1><?//=$stat?></h1>
				<h1>Register</h1>
			</dt>
			<form action="Home/hospitalaccount" method="post" enctype="multipart/form-data">
			<dt class="form-control">
				<label>Upload Hospital Photo</label>
				<input type="file" id="image" name="image" required />
			</dt>
			<dt class="form-control">
				<input type="text" id="hname" name="hname" placeholder="Name of Hospital" required />
			</dt>
			<dt class="form-control">
				<textarea placeholder="Contact Address" name="address"></textarea>
			</dt>
			<dt class="form-control">
				<input type="text" id="phone" name="phone" placeholder="Contact Number" required />
			</dt>
			<dt class="form-control">
				<textarea placeholder="About Us" name="about_us" required></textarea>
			</dt>
			<dt class="form-control">
				<input type="email" id="email" name="email" placeholder="Email" required />
			</dt>
			<dt class="form-control">
				<input type="password" id="pin" name="pin" placeholder="Pin" required />
			</dt>
			<dt class="form-control">
				<input type="submit" value="Sign Up" name="btn_hospital" class="btn-login" />
			</dt>
			<dt>
				<a href="Home/index">Sign In</a>
			</dt>
			</form>
		</dl>
	</section>
</body>
</html>