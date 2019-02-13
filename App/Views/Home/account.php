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
				<h1>Select Account Type</h1>
			</dt>
			<form action="Home/account" method="post">
			<dt class="form-control">
				<select name="category" required>
					<option value="Personal">Personal</option>
					<option value="Hospital">Hospital</option>
				</select>
			</dt>
			<dt class="form-control">
				<input type="submit" value="Continue" name="btn_select" class="btn-login" />
			</dt>
			<dt>
				<a href="Home/index">Sign In</a>
			</dt>
			</form>
		</dl>
	</section>
</body>
</html>