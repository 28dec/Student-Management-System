<html>
	<head></head>
	<body>
		<?php 
			if(!empty($_POST['command'])){
				$cmd = $_POST['command'];
				$conn = new PDO('mysql:host=localhost;dbname=qlsv', 'root', '1111');
				$conn->query("SET NAMES 'utf8'");
				if(cmd == '#loadallsubjects'){
					$stmt = $conn->prepare("CALL LoadAllCourses");
					$stmt->execute();
					$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
					echo "<table>";
						echo "<tr>";
							echo "<th> MÃ MÔN HỌC </th>";
							echo "<th> TÊN MÔN HỌC </th>";
							echo "<th> SỐ TÍN CHỈ </th>";
							echo "<th> KHOA </th>";
						echo "</tr>";
						echo "<tr>";
							foreach($result as $row){
								echo "<td>" . $row['code'] . "</td>";
								echo "<td>" . $row['name'] . "</td>";
								echo "<td>" . $row['num_credit'] . "</td>";
								echo "<td>" . $row['major'] . "</td>";
							}
						echo "</tr>";
					echo "</table>"
				} else if (cmd == '#searchcourses'){

				}
			}
		 ?>
	</body>
</html>