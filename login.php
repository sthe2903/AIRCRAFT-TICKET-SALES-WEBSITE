<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="animate.css">
</head>
<body>
	<div class="container">
		<header>
			<div class="header_content">
				<h1>Aplikasi Penjualan Tiket Pesawat</h1>
			</div>
		</header>
		<main>

			<form method="post" action="aksi_login.php" id="login-form">
							<?php 
			if(isset($_GET["login_error"])){ ?>
			<h4 style="color: red; text-align: center;" class="animated shake">Maaf Password atau username salah</h4>
			<?php }	?>
				<br />
				<div class="input-group">
					<input type="text" name="username" value="" placeholder="Username or Email" style="width: 280px;">
				</div>
				<div class="input-group">
					<input type="password" name="password" value="" placeholder="Password" style="width: 280px;">
				</div>
				<div class="input-group"><input type="submit" name="commit" value="Login" class="btn">
				</div>
			</form>

		</main>


		<div class="clear"></div>
	</div>
</body>
</html>