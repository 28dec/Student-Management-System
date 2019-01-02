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
						echo "<th> MÃ ĐIỂM </th>";
						echo "<th> TÊN MÔN HỌC </th>";
						echo "<th> STATUS </th>";
						echo "<th> CC </th>";
						echo "<th> GK </th>";
						echo "<th> BT </th>";
						echo "<th> CUỐI KỲ </th>";
						echo "<th> ĐIỂM SỐ </th>";
						echo "<th> ĐIỂM CHỮ </th>";
						echo "<th> ACTION </th>";
					echo "</tr>";
				foreach($result as $row){
					echo "<tr>";
						echo "<td>" .$row['code']."</td>";
						echo "<td>" .$row['name']."</td>";
						echo "<td>" .$row['status']."</td>";
						echo "<td>" .$row['chuyencan']."</td>";
						echo "<td>" .$row['giuaky']."</td>";
						echo "<td>" .$row['baitap']."</td>";
						echo "<td>" .$row['cuoiky']."</td>";
						$diem_so = (float)$row['chuyencan']*0.1+(float)$row['giuaky']*0.2+(float)$row['baitap']*0.1+(float)$row['cuoiky']*0.6;
						echo "<td>" . (string)($diem_so) ."</td>";
						if($diem_so < 4){
							$diem_chu = 'F';
						} elseif($diem_so < 5){
							$diem_chu = 'D';
						} elseif($diem_so < 5.5){
							$diem_chu = 'D+';
						} elseif($diem_so < 6.0){
							$diem_chu = 'C';
						} elseif($diem_so < 6.5){
							$diem_chu = 'C+';
						} elseif($diem_so < 7.0){
							$diem_chu = 'B';
						} elseif($diem_so < 8.0){
							$diem_chu = 'B+';
						} elseif($diem_so < 9.0){
							$diem_chu = 'A';
						} else {
							$diem_chu = 'A+';
						}
						echo "<td>" . $diem_chu ."</td>";
						$result_value = $row['code'].";".$row['chuyencan'].";".$row['giuaky'].";".$row['baitap'].";".$row['cuoiky'];
						echo "<td><button class=\"modify_result_btn\" value='$result_value' >MODIFY</button></td>";
					echo "</tr>";
				}
				echo "</table>";
			}
		?>
	</body>
</html>