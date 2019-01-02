<?php 
	$DEBUG = false;
	if(!empty($_POST['command'])){
		$conn = new PDO("mysql:host=localhost;dbname=qlsv", 'root', '1111');
		$conn->query("SET NAMES 'utf8'");
		$cmd = $_POST['command'];
		switch ($cmd) {
			case 'createstudent':
				echo "nhan duoc yeu cau CreateStudent, result = ";
				$_student_code = $_POST['student_code'];
				$_student_name = $_POST['student_name'];
				$_student_dob = $_POST['student_dob'];
				$_student_pob = $_POST['student_pob'];
				$_student_major = $_POST['student_major'];
				$_student_type = $_POST['student_type'];
				$stmt = $conn->prepare("CALL CreateUser(:name, :code, :type, :dob, :pob, :major);");
				$stmt->bindParam(':code', $_student_code, PDO::PARAM_STR);
				$stmt->bindParam(':name', $_student_name, PDO::PARAM_STR);
				$stmt->bindParam(':type', $_student_type, PDO::PARAM_STR);
				$stmt->bindParam(':dob', $_student_dob, PDO::PARAM_STR);
				$stmt->bindParam(':pob', $_student_pob, PDO::PARAM_STR);
				$stmt->bindParam(':major', $_student_major, PDO::PARAM_STR);
				$stmt->execute();
				$result = $stmt->fetch()['result'];
				if(empty($result)) print_r($stmt->errorInfo());
				else echo $result;
				break;
			case 'modifystudent':
				echo "nhan duoc yeu cau ModifyStudent, result = ";
				$_student_code = $_POST['student_code'];
				$_student_name = $_POST['student_name'];
				$_student_dob = $_POST['student_dob'];
				$_student_pob = $_POST['student_pob'];
				$_student_major = $_POST['student_major'];
				$stmt = $conn->prepare("CALL ModifyStudent(:code, :name, :dob, :pob, :major);");
				$stmt->bindParam(':code', $_student_code, PDO::PARAM_STR);
				$stmt->bindParam(':name', $_student_name, PDO::PARAM_STR);
				$stmt->bindParam(':dob', $_student_dob, PDO::PARAM_STR);
				$stmt->bindParam(':pob', $_student_pob, PDO::PARAM_STR);
				$stmt->bindParam(':major', $_student_major, PDO::PARAM_STR);
				$stmt->execute();
				$result = $stmt->fetch()['result'];
				if(empty($result)) print_r($stmt->errorInfo());
				else echo $result;
				break;
			case 'deletestudent':
				echo "nhan duoc yeu cau DeleteStudent, result = ";
				$_student_code = $_POST['student_code'];
				$stmt = $conn->prepare("CALL DeleteStudent(:code);");
				$stmt->bindParam(':code', $_student_code, PDO::PARAM_STR);
				$stmt->execute();
				$result = $stmt->fetch()['result'];
				echo $result;
				break;
			case 'modifysubject':
				echo "nhan duoc yeu cau modifysubject, result = ";
				$_code = $_POST['code'];
				$_name = $_POST['name'];
				$_num_credit = $_POST['num_credit'];
				$_major = $_POST['major'];
				$stmt = $conn->prepare("CALL ModifySubject(:code, :name, :num_credit, :major);");
				$stmt->bindParam(':code', $_code, PDO::PARAM_STR);
				$stmt->bindParam(':name', $_name, PDO::PARAM_STR);
				$stmt->bindParam(':num_credit', $_num_credit, PDO::PARAM_INT);
				$stmt->bindParam(':major', $_major, PDO::PARAM_STR);
				$stmt->execute();
				$result = $stmt->fetch()['result'];
				echo $result;
				break;
			case 'deletesubject':
				echo "nhan duoc yeu cau deletesubject, result = ";
				$_code = $_POST['code'];
				$stmt = $conn->prepare("CALL DeleteSubject(:code);");
				$stmt->bindParam(':code', $_code, PDO::PARAM_STR);
				$stmt->execute();
				$result = $stmt->fetch()['result'];
				if(empty($result)) $result = 'ERROR, kiem tra lai csdl';
				echo $result;
				break;
			case 'addsubject':
				echo "nhan duoc yeu cau addsubject, result = ";
				$_subject_code = $_POST['subject_code'];
				$_subject_name = $_POST['subject_name'];
				$_subject_num_credit = $_POST['subject_num_credit'];
				$_subject_major = $_POST['subject_major'];
				$stmt = $conn->prepare("CALL CreateSubject(:subject_code, :subject_name, :subject_num_credit, :subject_major);");
				$stmt->bindParam(':subject_code', $_subject_code, PDO::PARAM_STR);
				$stmt->bindParam(':subject_name', $_subject_name, PDO::PARAM_STR);
				$stmt->bindParam(':subject_num_credit', $_subject_num_credit, PDO::PARAM_INT);
				$stmt->bindParam(':subject_major', $_subject_major, PDO::PARAM_STR);
				$stmt->execute();
				$result = $stmt->fetch()['result'];
				if(empty($result)){
					print_r($stmt->errorInfo());
				} else {
					echo $result;
				}
				break;
			case 'loadsubjectnamebycode':{
				if($DEBUG) echo 'loadsubjectnamebycode';
				$subject_code = $_POST['subject_code'];
				$stmt = $conn->prepare("CALL LoadSubjectNameByCode(:subject_code);");
				$stmt->bindParam(':subject_code', $subject_code, PDO::PARAM_STR);
				$stmt->execute();
				$result = $stmt->fetch()['result'];
				if(empty($result)){
					print_r($stmt->errorInfo());
				} else{
					echo $result;
				}
				break;
			}
			case 'loadteacherbykeyword':{
				$keyword = $_POST['keyword'];
				$stmt = $conn->prepare("CALL LoadTeachersByKeyword(:keyword);");
				$stmt->bindParam(':keyword', $keyword, PDO::PARAM_STR);
				$stmt->execute();
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				if(empty($result)){
					print_r($stmt->errorInfo());
				} else {
					echo "<option>FOUND! Xin mời chọn</option>";
					foreach($result as $row){
						echo "<option value=".'"'.$row['result'].'"' . ">".$row['result']."</option>";
					}
				}
				break;
			}
			case 'createcourse':{
				$time = $_POST['time'];
				$room = $_POST['room'];
				$day_of_week = $_POST['day_of_week'];
				preg_match('/\(([a-zA-Z0-9]+)\)/m', $_POST['teacher_code'], $teacher_code);
				$subject_code = $_POST['subject_code'];
				$group = $_POST['group'];
				$start_time = $_POST['start_time'];
				$duration_time = $_POST['duration_time'];
				$stmt = $conn->prepare("CALL CreateCourse(?,?,?,?,?,?,?,?);");
				$stmt->bindParam(1, $time, PDO::PARAM_STR);
				$stmt->bindParam(2, $room, PDO::PARAM_STR);
				$stmt->bindParam(3, $day_of_week, PDO::PARAM_STR);
				$stmt->bindParam(4, $teacher_code[1], PDO::PARAM_STR);
				$stmt->bindParam(5, $subject_code, PDO::PARAM_STR);
				$stmt->bindParam(6, $group, PDO::PARAM_STR);
				$stmt->bindParam(7, $start_time, PDO::PARAM_STR);
				$stmt->bindParam(8, $duration_time, PDO::PARAM_STR);
				$stmt->execute();
				$result = $stmt->fetch()['result'];
				if(empty($result)){
					print_r($stmt->errorInfo()[2]);
				} else {
					echo $result;
				}
				break;
			}
			case 'loadstudentbykeyword':{
				echo 'loadstudentbykeyword';
				$keyword = $_POST['keyword'];
				$stmt = $conn->prepare("CALL LoadStudentsByKeyword(?);");
				$stmt->bindParam(1, $keyword, PDO::PARAM_STR);
				$stmt->execute();
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				if(empty($result)){
					print_r($stmt->errorInfo()[2]);
				} else {
					echo "<option>FOUND! Xin mời chọn</option>";
					foreach($result as $row){
						$_2148 = $row['result'];
						echo "<option>$_2148</option>";
					}
				}
				break;
			}
			case 'addstudenttocourse':{
				$course_code = $_POST['course_code'];
				preg_match('/\(([a-zA-Z0-9]+)\)/m', $_POST['student_code'], $student_code);
				$stmt = $conn->prepare("CALL AddStudentToCourse(?,?);");
				$stmt->bindParam(1, $course_code, PDO::PARAM_STR);
				$stmt->bindParam(2, $student_code[1], PDO::PARAM_STR);
				$stmt->execute();
				$result = $stmt->fetch()['result'];
				if(empty($result)){
					print_r($stmt->errorInfo()[2]);
				} else {
					echo $result;
				}
				break;
			}
			case 'loadresults':{
				$student_code = $_POST['student_code'];
				$stmt = $conn->prepare("CALL LoadStudentResultById(?);");
				$stmt->bindParam(1, $student_code, PDO::PARAM_STR);
				$stmt->execute();
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $row){
					
				}
				break;
			}
			case 'modifyresultsubmit':{
				$result_code = $_POST['result_code'];
				$chuyencan = $_POST['chuyen_can'];
				$giuaky = $_POST['giua_ky'];
				$baitap = $_POST['bai_tap'];
				$cuoiky = $_POST['cuoi_ky'];
				$status = $_POST['status'];
				$stmt = $conn->prepare("CALL ModifyStudentResult(?,?,?,?,?,?);");
				$stmt->bindParam(1,$result_code, PDO::PARAM_STR);
				$stmt->bindParam(2,$chuyencan, PDO::PARAM_STR);
				$stmt->bindParam(3,$giuaky, PDO::PARAM_STR);
				$stmt->bindParam(4,$baitap, PDO::PARAM_STR);
				$stmt->bindParam(5,$cuoiky, PDO::PARAM_STR);
				$stmt->bindParam(6,$status, PDO::PARAM_STR);
				$stmt->execute();
				$result = $stmt->fetch()['result'];
				if(empty($result)){
					print_r($stmt->errorInfo()[2]);
				} else {
					echo $result;
				}
				break;
			}
			default:
				echo "khong hieu command [" . $cmd . "] nghia la gi!";
				break;
		}
	} else {
		echo "khong nhan duoc command nao";
	}
 ?>