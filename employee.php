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
			<div id="quan_ly_danh_sach_sinh_vien" class="container-fluid bg-light border my-5 py-2">
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
			<div id="quan_ly_diem_sinh_vien" class="container-fluid bg-light border my-5 py-2">
				<div class="jumbotron text-center my-5 py-2">
					<h5>QUẢN LÝ ĐIỂM SINH VIÊN</h5>
				</div>
				<div class="row py-2 my-2">
					Mã môn học: <input type="text" name="tmp_sub_code" id="tmp_sub_code">
					Tên môn học: <input type="text" name="tmp_sub_name" id="tmp_sub_name">
					Học kỳ: <input type="text" name="tmp_sub_year" id="tmp_sub_year">
					Điểm cc: <input type="text" id="tmp_sub_chuyencan">
					Điểm gk: <input type="text" id="tmp_sub_giuaky">
					Điểm bt: <input type="text" id="tmp_sub_baitap">
					Điểm cuối kỳ <input type="text" id="tmp_sub_cuoiky">
					<input type="button" value="clear">
				</div>
				<div class="row mx-auto py-2 my-2" style="width: 350px">
					<input type="button" id="add_student_btn" value="Thêm điểm">
					<input type="button" id="mod_student_btn" value="Sửa điểm">
					<input type="button" id="del_student_btn" value="Xóa xóa điểm">
				</div>
				<div class="row bg-success">
					<table id="table_results" class="w-100"></table>
				</div>
			</div>
			<div id="quan_ly_danh_sach_mon_hoc" class="container-fluid bg-light border my-5 py-2">
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
				<div class="row">
					<table id="table_subjects" class="w-100 mx-auto border" style="width: 100%"></table>
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
</body>
</html>