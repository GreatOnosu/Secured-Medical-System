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
				<h1>Admin Login</h1>
				<h4 class="error"><?=$stat?></h4>
			</dt>
			<form action="Home/login" method="post">
			<dt class="form-control">
				<input type="text" name="username" placeholder="Username" />
				<input type="password" name="userpass" placeholder="Password" />
			</dt>
			<dt class="form-control">
				<input type="submit" value="Login" name="admin_login" class="btn-login" />				
			</dt>
			</form>
		</dl>
	</section>
</body>
</html>