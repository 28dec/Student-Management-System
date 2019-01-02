<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<?php 
			if(!empty($_POST['student_code'])){
				$student_code = $_POST['student_code'];
				$conn = new PDO("mysql:host=localhost;dbname=qlsv", 'root', '1111');
				$conn->query("SET NAMES 'utf8'");
				$stmt = $conn->prepare("CALL LoadResults(:student_code);");
				$stmt->bindParam(':student_code', $student_code, PDO::PARAM_STR);
				$stmt->execute();
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				echo "<table>";
					echo "<tr>";
						echo "<th> MÃ MÔN HỌC </th>";
						echo "<th> TÊN MÔN HỌC </th>";
						echo "<th> STATUS </th>";
						echo "<th> CC </th>";
						echo "<th> GK </th>";
						echo "<th> BT </th>";
						echo "<th> CUỐI KỲ </th>";
						echo "<th> TỔNG KẾT </th>";
						echo "<th> ACTION </th>";
					echo "</tr>";
				foreach($result as $row){
					echo "<tr>";
						echo "<td>" .$row['sub_code']."</td>";
						echo "<td>" .$row['sub_name']."</td>";
						echo "<td>" .$row['status']."</td>";
						echo "<td>" .$row['sub_chuyencan']."</td>";
						echo "<td>" .$row['sub_giuaky']."</td>";
						echo "<td>" .$row['sub_baitap']."</td>";
						echo "<td>" .$row['sub_cuoiky']."</td>";
						echo "<td>" . "calculating..." ."</td>";
						$result_code = $row['sub_code'];
						echo "<td><button class='modify_result_btn' value='$result_code' >MODIFY</button></td>";
					echo "</tr>";
				}
				echo "</table>";
			}
		?>
	</body>
</html>