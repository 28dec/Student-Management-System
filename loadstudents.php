<html>
	<head>
		<title>^^,</title>
		<meta charset="utf-8">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	</head>
	<body>
		<?php 

			if(!empty($_POST['num_of_student_to_show'])){
				$num = $_POST['num_of_student_to_show'];
				$conn = new PDO("mysql:host=localhost;dbname=qlsv", 'root', '1111');
				$conn->query("SET NAMES 'utf8'");
				$stmt = $conn->prepare("CALL LoadStudents(:num_of_student_to_show)");
				$stmt->bindParam(':num_of_student_to_show', $num, PDO::PARAM_INT);
				$stmt->execute();
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				echo '<table style = "width:100%;margin:0 auto;">';
				echo "<tr>
						<th>MÃ SINH VIÊN </th>
						<th>TÊN SINH VIÊN</th>
						<th>NGÀY SINH</th>
						<th>NƠI SINH</th>
						<th>NGÀNH</th>
					</tr>";
				foreach($result as $row){
					echo "<tr>";
					echo "<td>".$row['code']."</td>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['dob']."</td>";
					echo "<td>".$row['pob']."</td>";
					echo "<td>".$row['major']."</td>";
					echo "</tr>";
				}
				echo "</table>";
				
			} else {
				
			}

			if(!empty($_POST['search_keyword'])){
				$keyword = $_POST['search_keyword'];
				$conn = new PDO("mysql:host=localhost;dbname=qlsv", 'root', '1111');
				$conn->query("SET NAMES 'utf8'");
				$stmt = $conn->prepare("CALL LoadStudentsByKeyword(:keyword)");
				$stmt->bindParam(':keyword', $keyword, PDO::PARAM_STR);
				$stmt->execute();
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				echo '<table style = "width:100%;margin:0 auto;">';
				echo "<tr>
						<th>MÃ SINH VIÊN </th>
						<th>TÊN SINH VIÊN</th>
						<th>NGÀY SINH</th>
						<th>NƠI SINH</th>
						<th>NGÀNH</th>
					</tr>";
				foreach($result as $row){
					echo "<tr>";
					echo "<td>".$row['code']."</td>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['dob']."</td>";
					echo "<td>".$row['pob']."</td>";
					echo "<td>".$row['major']."</td>";
					echo "</tr>";
				}
				echo "</table>";
				
			} else {
				
			}
		 ?>
	</body>
</html>