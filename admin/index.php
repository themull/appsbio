<?php

session_start();
if(!empty($_SESSION['username'])){
	header("Location: beranda.php");
}
?>

<html>
<head>
	<title>Admin Aplikasi Biomagg</title>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

		<div class="box-login">
			<div class="login-header">
				Login Admin
			</div>

			<div class="login-form">
				<form action="login.php" method="post">
					<label for="username" class="label">Username :</label>
					<input type="text" name="txtusername" placeholder="Username">
					<label for="password" class="label">Password :</label>
					<input type="password" name="txtpassword" placeholder="Password">
					<input type="submit" name="btnlogin" value="Login" class="button">
				</form>
				<div class="fix"></div>
			</div>
		</div>
</body>
</html>
