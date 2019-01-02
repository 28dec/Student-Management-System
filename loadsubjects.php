<html>
	<head></head>
	<body>
		<?php 
			if(!empty($_POST['command'])){
				$cmd = $_POST['command'];
				$conn = new PDO('mysql:host=localhost;dbname=qlsv', 'root', '1111');
				$conn->query("SET NAMES 'utf8'");
				echo "<table>";
					
					echo "<thead>";
					echo "<tr>";
						echo "<th> MÃ MÔN HỌC </th>";
						echo "<th> TÊN MÔN HỌC </th>";
						echo "<th> SỐ TÍN CHỈ </th>";
						echo "<th> KHOA </th>";
						echo '<th width=15%> ACTION </th>';
						echo '<th width=15%> C_ACTION </th>';
					echo "</tr>";
					echo "</thead>";
					echo "<tbody>"; 
				if($cmd == '#loadallsubjects'){
					$stmt = $conn->prepare("CALL LoadAllSubjects();");
					$stmt->execute();
					$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
						foreach($result as $row){
							echo "<tr>";
								echo "<td>" . $row['code'] . "</td>";
								echo "<td>" . $row['name'] . "</td>";
								echo "<td>" . $row['num_credit'] . "</td>";
								echo "<td>" . $row['major'] . "</td>";
								$code_1559 = $row['code'];
								$name_1559 = $row['name'];
								$num_credit_1559 = $row['num_credit'];
								$major_1559 = $row['major'];
								echo '<td> <input type="button" value="EDIT" name="edit" class="edit_btn">';
								echo '<input type="button" value="SUBMIT" class="submit_btn" style="display:none">';
								echo '<input type="button" value="DISCARD" class="discard_btn" style="display:none">';
								echo '<input type="button" value="DELETE" name="delete" class="delete_btn"> </td>';
								$cr_btn_value = "{'code':'$code_1559'}";
								echo '<td><button value="'.$code_1559.'" name="create_course_btn" class="create_course_btn">CREATE_COURSE</button></td>';
							echo "</tr>";
						}
				} else if ($cmd == '#searchkeyword'){
					$keyword = $_POST['keyword'];
					$stmt = $conn->prepare("CALL LoadSubjectsByKeyword(:keyword);");
					$stmt->bindParam(':keyword', $keyword, PDO::PARAM_STR);
					$stmt->execute();
					$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
				} else {
					echo "exception";
				}
					echo "</tbody>";
				echo "</table>";
			}
		 ?>
	</body>
</html>