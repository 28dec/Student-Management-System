<!DOCTYPE html>
<?php session_start() ?>
<html>
<head>
	<title>member</title>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<?php 
	$servername = "localhost";
	$db_username = "root";
	$db_password = "1111";
	if(!empty($_POST['username']) && !empty($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$conn = new PDO("mysql:host=$servername;dbname=qlsv", $db_username, $db_password);
		$stmt = $conn->prepare("CALL CheckLogin(:username, :password)");
		$stmt->bindParam(':username', $_POST['username']);
		$stmt->bindParam(':password', $_POST['password']);
		$stmt->execute();
		$login_result = $stmt->fetch();
		if($login_result['result'] == 'SUCCESS'){
			echo "đăng nhập thành công";
			$_SESSION['username'] = $login_result['user_username'];
			$_SESSION['type'] = $login_result['user_type'];
			$type = $login_result['user_type'];
			if($type == 'STUDENT'){
				header("Location: student.php");
			} elseif($type == 'EMPLOYEE'){
				header("Location: employee.php");
			} else {
				echo "khong biet chuyen user di dau, type = " . $type;
			}
		} else {
			echo "đăng nhập thất bại";
			echo nl2br("\nresponse from server -> ".$login_result['msg']);
		}
		echo nl2br(("\ndone"));
	}
	else echo "where are you from?";
	 ?>
</body>
</html>