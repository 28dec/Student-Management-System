<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<?php 
			if(!empty($_POST['student_code'])){
				$student_code = $_POST['student_code'];
				$conn = new PDO("mysql:host=localhost;dbname=qlsv", 'root', '1111');
				$stmt = $conn->prepare("CALL LoadResults(:student_code);");
				$stmt->bindParam(':student_code', $student_code, PDO::PARAM_STR);
				$stmt->execute();
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				echo "<table>";
					echo "<tr>";
						echo "<th> MÃ MÔN HỌC </th>";
						echo "<th> TÊN MÔN HỌC </th>";
						echo "<th> HỌC KỲ </th>";
						echo "<th> ĐIỂM CHUYÊN CẦN </th>";
						echo "<th> ĐIỂM GIỮA KỲ </th>";
						echo "<th> ĐIỂM BÀI TẬP </th>";
						echo "<th> ĐIỂM CUỐI KỲ </th>";
						echo "<th> ĐIỂM TỔNG KẾT </th>";
					echo "</tr>";
				foreach($result as $row){
					echo "<tr>";
						echo "<td>" .$row['sub_code']."</td>";
						echo "<td>" .$row['sub_name']."</td>";
						echo "<td>" .$row['sub_year']."</td>";
						echo "<td>" .$row['sub_chuyencan']."</td>";
						echo "<td>" .$row['sub_giuaky']."</td>";
						echo "<td>" .$row['sub_baitap']."</td>";
						echo "<td>" .$row['sub_cuoiky']."</td>";
						echo "<td>" .$row['sub_tongket']."</td>";
					echo "</tr>";
				}
				echo "</table>";
			}
		?>
	</body>
</html>