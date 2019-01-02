<!DOCTYPE html>
<?php session_start();
	if ($_SESSION['username'] == "") {
		header('location: index.php');
	}
?>
<html>
<head>
	<title>employee ^^,</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/employee.js"></script>
	<link rel="stylesheet" href="css/css_employee.css">
</head>
<body>
	<div class="container-fluid">
		<div class="jumbotron text-center">
			<h1>PHẦN MỀM QUẢN LÝ SINH VIÊN</h1>
		</div>
		<div class="container-fluid">
			<div id="user_panel" class = "row border bg-light border">
				<div class="mr-5 ml-auto my-3 py-1">
					Xin chào <?php echo $_SESSION['username'];?> <a href="logout.php" >Đăng xuất</a>
				</div>
			</div>
			<div id="quan_ly_danh_sach_sinh_vien" class="container-fluid bg-light my-5">
				<div class="row border">
					<!-- Quan ly danh sach sinh vien -->
					<div class="col-6">
						<div class="jumbotron text-center my-5 py-2">
							<h4>QUẢN LÝ DANH SÁCH SINH VIÊN</h4>
						</div>
						<div id="div_students" class="row ">
							<div class="col-4">
								<div class="row my-1 py-2 mx-1 px-3 bg-info">
									Hiển thị  <input type="text" id="input_num_of_student_to_show" value="10"> sinh viên. <input type="button" value="View" id="view_students_btn"><br>
								</div>
								<div class="row my-1 py-2 mx-1 px-3 bg-success">
									Tìm kiếm  <input type="text" id="input_search"> <input type="button" value ="search" id="search_student_btn">
								</div>
							</div>
							<div class="col-8">
								<div class="row my-1">
									<div id="control_panel" class="row my-2 py-2">
										<div id="tmp_info" class="col-12">
											<div class="row py-1">
												Mã SV: <input type="text" name="tmp_student_code" id="tmp_student_code">
												Họ và tên: <input type="text" name="tmp_student_name" id="tmp_student_name">
												Ngày sinh: <input type="text" name="tmp_student_dob" id="tmp_student_dob">
												Nơi sinh: <input type="text" name="tmp_student_pob" id="tmp_student_pob">
												Ngành: <input type="text" name="tmp_student_major" id="tmp_student_major">
												<input type="button" value="clear" id="tmp_student_reset_btn">
											</div>
											<div class="row mx-auto px-auto" style="width:450px;">
												<input type="button" id="add_student_btn" value="Thêm sinh viên">
												<input type="button" id="mod_student_btn" value="Sửa thông tin">
												<input type="button" id="del_student_btn" value="Xóa sinh viên">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row bg-light border my-5">
							<table id="table_students" class="w-100"></table>
						</div>
					</div>
					<!-- Quan ly diem sinh vien -->
					<div class="col-6">
						<div id="quan_ly_diem_sinh_vien" class="container-fluid bg-light my-5 py-2">
							<div class="jumbotron text-center my-2 py-2">
								<h5>QUẢN LÝ ĐIỂM SINH VIÊN</h5>
								<label id="student_name_lbl">mr.X</label>
							</div>
							<div class="row text-center mx-auto py-2 my-2">
								<div class="col-6">
									<input type="button" id="add_result_btn" value="Thêm điểm">
								</div>
								<div class="col-6">
									<input type="button" id="view_result_btn" value="Xem điểm">
								</div>
							</div>
							<div class="row bg-success">
								<table id="table_results" class="w-100"></table>
							</div>
						</div>	
					</div>
				</div>
				<!-- Quan ly danh sach mon hoc -->
				<div class="row border">
					<div class="col-6">
						<div id="quan_ly_danh_sach_mon_hoc" class="container-fluid bg-light my-5 py-2">
							<div class="jumbotron text-center my-2 py-2">
								<h4>QUẢN LÝ DANH SÁCH MÔN HỌC</h4>
							</div>
							<div class="row text-center mx-auto my-2 py-2">
								<div class="col-6">
									Tìm kiếm môn học: <input type="text" id="search_subject_input">
									<input type="button" id="search_subject_btn" value="SEARCH">
								</div>
								<div class="col-6">
									Xem toàn bộ môn học -> <input class="text-center mx-auto" style="width:200" type="button" value="VIEW" id="view_subjects_btn">
								</div>
							</div>
							<div class="row py-2 my-2">
								<input data-toggle="modal" data-target="#add_subject_div" id="add_subject_btn" type="button" value="THÊM MÔN HỌC" style="width:100%;">
								<table id="table_subjects" class="w-100 my-2 mx-auto border" style="width: 100%"></table>
							</div>
						</div>
					</div>
					<div class="col-6">
						<div id="quan_ly_danh_sach_lop_hoc" class="container-fluid bg-light border my-5 py-2">
							<div class="jumbotron text-center mx-auto my-2 py-2">
								<h4>QUẢN LÝ DANH SÁCH LỚP HỌC</h4>
							</div>
							<div class="row">
								<div class="col-6">
									Tìm kiếm lớp học: <input type="text" id="search_course_input">
									<button id="search_course_btn">SEARCH</button>
								</div>
								<div class="col-6">
									Xem toàn bộ lớp học -> <button id="view_courses_btn">VIEW</button>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<table id="table_courses" class="w-100 mx-auto border" style="width:100%"></table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="jumbotron text-center">
			<h3>HỌC VIỆN CÔNG NGHỆ BƯU CHÍNH VIỄN THÔNG</h4>
		</div>
	</div>
	<div id="add_subject_div" class="modal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header text-center">
					<h6> THÊM MÔN HỌC MỚI</h6>
				</div>
					<div class="modal-body">
						<div class="form-group">
							<p>Mã môn học</p>
							<input type="text" id="subject_code_input" class="mx-auto" style="width:75%"><br>
						</div>
						<div class="form-group">
							<p>Tên môn học</p>
							<input type="text" id="subject_name_input" class="mx-auto" style="width:75%"><br>
						</div>
						<div class="form-group">
							<p>Số tín chỉ</p>
							<input type="number" id="subject_num_credit_input" class="mx-auto" style="width:75%"><br>
						</div>
						<div class="form-group">
							<p>Khoa</p>
							<input type="text" id="subject_major_input" class="mx-auto" style="width:75%"><br>
						</div>
					</div>
					<div class="modal-footer">
						<button id="add_subject_submit" type="submit">SUBMIT</button>
					</div>
			</div>
		</div>
	</div>
	<div id="add_course_div" class="modal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header text-center">
					<h6>THÊM LỚP HỌC MỚI</h6>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Mã môn học -> </label>
						<label for="" id="subject_code_lbl"></label>
					</div>
					<div class="form-group">
						<label>Tên môn học -> </label>
						<label for="" id="subject_name_lbl"></label>
					</div>
					<div class="form-group">
						<p>Giảng viên -> 
						<label for="" id="teacher_name_lbl"></label></p>
						<input type="text" id="teacher_search_input" placeholder="Gõ tên hoặc mã gv">
						<select id="teacher_select"></select>
					</div>
					<div class="form-group">
						<label>Học kỳ -> </label>
						<label for="" id="course_time">Fall2018</label>
					</div>
					<div class="form-group">
						<label>Phòng -> </label>
						<input type="text" id="room_input">
					</div>
					<div class="form-group">
						<label for="">Ngày</label>
						<select id="day_select">
							<option value="MONDAY">MONDAY</option>
							<option value="TUESDAY">TUESDAY</option>
							<option value="WEDNESDAY">WEDNESDAY</option>
							<option value="THURSDAY">THURSDAY</option>
							<option value="FRIDAY">FRIDAY</option>
							<option value="SATURDAY">SATURDAY</option>
							<option value="SUNDAY">SUNDAY</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Nhóm</label>
						<input type="text" id="group_input">
					</div>
					<div class="form-group">
						<label>Kíp bắt đầu -> </label>
						<input type="text" id="start_time_input">
					</div>
					<div class="form-group">
						<label>Số tiết -> </label>
						<input type="text" id="duration_time_input">
					</div>
				</div>
				<div class="modal-footer">
					<button id="add_course_submit" type="submit">SUBMIT</button>
				</div>
			</div>
		</div>
	</div>
	<div id="add_student_to_course_div" class="modal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h6>THÊM SINH VIÊN VÀO LỚP HỌC</h6>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="">Mã lớp học -> </label>
						<label for="" id="course_code_lbl"></label>
					</div>
					<div class="form-group">
						<p>
							<label for="">Sinh viên -> </label>
							<label for="" id="student_name_lbl"></label>
						</p>
						<input type="text" id="student_search_input" placeholder="Gõ tên hoặc mã sinh viên">
						<select id="student_select"></select>
					</div>
				</div>
				<div class="modal-footer">
					<button id="add_student_to_course_btn">SUBMIT</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>