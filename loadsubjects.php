<html>
	<head></head>
	<body>
		<?php 
			if(!empty($_POST['command'])){
				$cmd = $_POST['command'];
				$conn = new PDO('mysql:host=localhost;dbname=qlsv', 'root', '1111');
				$conn->query("SET NAMES 'utf8'");
				if($cmd == '#loadallsubjects'){
					$stmt = $conn->prepare("CALL LoadAllSubjects();");
					$stmt->execute();
					$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
					echo "<table>";
						echo "<tr>";
							echo "<th> MÃ MÔN HỌC </th>";
							echo "<th> TÊN MÔN HỌC </th>";
							echo "<th> SỐ TÍN CHỈ </th>";
							echo "<th> KHOA </th>";
							echo '<th width=15%> ACTION </th>';
						echo "</tr>";
						foreach($result as $row){
							echo "<tr>";
								echo "<td>" . $row['code'] . "</td>";
								echo "<td>" . $row['name'] . "</td>";
								echo "<td>" . $row['num_credit'] . "</td>";
								echo "<td>" . $row['major'] . "</td>";
								echo '<td> <input type="button" value="EDIT" name="edit" class="edit_btn">';
								echo '<input type="button" value="SUBMIT" class="submit_btn" style="display:none">';
								echo '<input type="button" value="DISCARD" class="discard_btn" style="display:none">';
								echo '<input type="button" value="DELETE" name="delete" class="delete_btn"> </td>';
							echo "</tr>";
						}
					echo "</table>";
				} else if ($cmd == '#searchsubject'){
					// echo "deverloping...";
				} else {
					echo "exception";
				}
			}
		 ?>
	</body>
</html>