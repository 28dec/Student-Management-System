<?php 
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
				$stmt = $conn->prepare("CALL CreateStudent(:code, :name, :dob, :pob, :major);");
				$stmt->bindParam(':code', $_student_code, PDO::PARAM_STR);
				$stmt->bindParam(':name', $_student_name, PDO::PARAM_STR);
				$stmt->bindParam(':dob', $_student_dob, PDO::PARAM_STR);
				$stmt->bindParam(':pob', $_student_pob, PDO::PARAM_STR);
				$stmt->bindParam(':major', $_student_major, PDO::PARAM_STR);
				$stmt->execute();
				$result = $stmt->fetch()['result'];
				echo $result;
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
				echo $result;
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
			default:
				echo "khong hieu command [" . $cmd . "] nghia la gi!";
				break;
		}
	} else {
		echo "khong nhan duoc command nao";
	}
 ?>