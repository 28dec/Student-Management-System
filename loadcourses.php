<html>
	<head></head>
	<body>
		<?php 
			if(!empty($_POST['command'])){
				$cmd = $_POST['command'];
				$conn = new PDO('mysql:host=localhost;dbname=qlsv', 'root', '1111');
				$conn->query("SET NAMES 'utf8'");
				if($cmd == '#loadallsubjects'){
					$stmt = $conn->prepare("CALL LoadAllCourses()");
					$stmt->execute();
					$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
					echo "<table>";
						echo "<tr>";
							echo "<th>MÃ LỚP HỌC </th>";
							echo "<th>TÊN MÔN HỌC </th>";
							echo "<th>NHÓM</th>";
							echo "<th>ĐỊA ĐIỂM</th>";
							echo "<th>NGÀY</th>";
							echo "<th>KÍP BĐ</th>";
							echo "<th>SỐ TIẾT</th>";
							echo "<th>ACTION</th>";
						echo "</tr>";
						foreach($result as $row){
							$code = $row['code'];
							echo "<tr>";
								echo "<td>" . $row['code'] . "</td>";
								echo "<td>" . $row['name'] . "</td>";
								echo "<td>" . $row['group'] . "</td>";
								echo "<td>" . $row['room'] . "</td>";
								echo "<td>" . $row['day_of_week'] . "</td>";
								echo "<td>" . $row['start_time'] . "</td>";
								echo "<td>" . $row['duration_time'] . "</td>";
								echo "<td>" . "<button value='$code' class='add_student_to_course'>THÊM SV</button>" . "</td>";
							echo "</tr>";
						}
					echo "</table>";
				} else if ($cmd == '#searchcourses'){

				}
			}
		 ?>
	</body>
</html>