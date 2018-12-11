<!DOCTYPE html>
<?php session_start() ?>
<html>
<head>
	<title>title ^^,</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
  	<script src="/js/jquery.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>
	<style>
		body{
			background: url('img/login2.jpg') no-repeat center center fixed;
			background-size: cover;
		}
		div{
			
		}
		#login_div{
			position: absolute;
			width: 200px;
			height: 100px;
			top: 0;
			left: 0;
			bottom: 0;
			right:0;
			margin: 0 auto;
		}
	</style>
</head>
<body>
	<div>
		<div class="center" id="page_header">
			<h2>^^,</h2>
		</div>
		<div class="center" id = "login_div" style="background-color: white">
			<h3>Admin panel</h3>
			<form id="login_form" action="member.php" method = "post">
				Username: <input type="text" name="username"><br>
				Password: <input type="password" name="password"><br>
				<input type="submit" name="submit" value="Đăng nhập"><br>
			</form>
		</div>
		<div class="center" id="page_footer">
			<h4>:v</h4>
		</div>
	</div>
</body>
</html>