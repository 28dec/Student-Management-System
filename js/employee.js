$(document).ready(function(){
	$("#mod_student_btn").prop('disabled', true);
	$("#del_student_btn").prop('disabled', true);
});

$(document).on("click", "#tmp_student_reset_btn", function(){
	console.log("clear btn clicked!");
	$("#tmp_student_code").val("");
	$("#tmp_student_name").val("");
	$("#tmp_student_dob").val("");
	$("#tmp_student_pob").val("");
	$("#tmp_student_major").val("");
})

$(document).on("mouseover", "#table_students tr",function(e){
	$(this).addClass('highlight');
});
$(document).on("mouseout", "#table_students tr",function(e){
	$(this).removeClass('highlight');
});
$(document).on("mouseover", "#table_results tr",function(e){
	$(this).addClass('highlight');
});
$(document).on("mouseout", "#table_results tr",function(e){
	$(this).removeClass('highlight');
});
$(document).on("mouseover", "#table_subjects tr",function(e){
	$(this).addClass('highlight');
});
$(document).on("mouseout", "#table_subjects tr",function(e){
	$(this).removeClass('highlight');
});
$(document).on("click", "#table_students tr",function(e){
	$("#mod_student_btn").prop('disabled', false);
	$("#del_student_btn").prop('disabled', false);
	var table_data = $(this).children("td").map(function(){
		return $(this).text();
	}).get();
	$("#tmp_student_code").val(table_data[0]);
	$("#tmp_student_name").val(table_data[1]);
	$("#tmp_student_dob").val(table_data[2]);
	$("#tmp_student_pob").val(table_data[3]);
	$("#tmp_student_major").val(table_data[4]);
	$("#student_name_lbl").html(table_data[1]+"_"+table_data[0]);
	console.log("chuan bi load results");
	$("#table_results").load("loadresults.php", {'student_code':$("#tmp_student_code").val()});
	console.log("load results done");
});

$(document).on("click", ".edit_btn", function(e){
	console.log("EDIT clicked!");
	$(this).prop('style','display:none');
	$(this).siblings('input[class="submit_btn"]').prop('style','display:inline');
	$(this).siblings('input[class="discard_btn"]').prop('style','display:inline');
	$(this).parent().siblings('td').prop('contenteditable', true);
});

$(document).on("click", ".discard_btn", function(e){
	console.log("DISCARD clicked!");
	$(this).parent().siblings('td').prop("contenteditable", false);
	$(this).siblings("input[class='edit_btn']").prop('style','display:inline');
	$(this).siblings("input[class='submit_btn']").prop('style','display:none');
	$(this).prop('style','display:none');
})
$(document).on("click", ".submit_btn", function(e){
	console.log("SUBMIT clicked!");
	$(this).parent().siblings('td').prop("contenteditable", false);
	$(this).siblings("input[class='edit_btn']").prop('style','display:inline');
	$(this).siblings("input[class='discard_btn']").prop('style','display:none');
	$(this).prop('style','display:none');
	var data1834 = $(this).parent().siblings('td').map(function(){
		return $(this).text();
	})
	$.post(
		'controller.php',
		{
			'command':'modifysubject',
			'code':data1834[0],
			'name':data1834[1],
			'num_credit':data1834[2],
			'major':data1834[3]
		},
		function(data){
			$("#table_subjects").load("loadsubjects.php", {"command":"#loadallsubjects"});
			alert("SERVER response -> " + data);
			console.log(data);
		}
	)
})

$(document).on("click", ".delete_btn", function(e){
	console.log("DELETE clicked!");
	var _1847 = $(this).parent().siblings('td').map(function(){
		return $(this).text();
	})
	$.post(
		'controller.php',
		{
			'command':'deletesubject',
			'code':_1847[0]
		},
		function(data){
			$("#table_subjects").load("loadsubjects.php", {"command":"#loadallsubjects"});
			alert("SERVER response -> " + data);
			console.log(data);
		}
	)
})

$(document).on("click", "#add_student_btn", function(){
	if($("#tmp_student_code").val() == '' || $("#tmp_student_name").val() == '' || $("#tmp_student_dob").val() == '' || $("#tmp_student_pob").val() == '' || $("#tmp_student_major").val() == ''){
		alert("Vui lòng điền đẩy đủ thông tin cho sinh viên mới!");
		return false;
	}
	$.post('controller.php',
		{
			'command':'createstudent',
			'student_code': $("#tmp_student_code").val(),
			'student_name': $("#tmp_student_name").val(),
			'student_type': 'STUDENT',
			'student_dob': $("#tmp_student_dob").val(),
			'student_pob': $("#tmp_student_pob").val(),
			'student_major': $("#tmp_student_major").val() 
		},
		function(data){
			$("#table_students").load("loadstudents.php", {"num_of_student_to_show":$('#input_num_of_student_to_show').val()});
			alert("SERVER response -> " + data);
			console.log(data);
		}
	);
})

$(document).on("click", "#mod_student_btn", function(){
	$("#mod_student_btn").prop('disabled', true);
	$("#del_student_btn").prop('disabled', true);
	$.post('controller.php',
		{
			'command':'modifystudent',
			'student_code': $("#tmp_student_code").val(),
			'student_name': $("#tmp_student_name").val(),
			'student_dob': $("#tmp_student_dob").val(),
			'student_pob': $("#tmp_student_pob").val(),
			'student_major': $("#tmp_student_major").val() 
		},
		function(data){
			$("#table_students").load("loadstudents.php", {"num_of_student_to_show":$('#input_num_of_student_to_show').val()});
			alert("SERVER response -> " + data);
			console.log(data);
		}
	);
})
$(document).on("click", "#del_student_btn", function(){
	$("#del_student_btn").prop('disabled', true);
	$("#mod_student_btn").prop('disabled', true);
	$.post('controller.php',
		{
			'command':'deletestudent',
			'student_code': $("#tmp_student_code").val()
		},
		function(data){
			$("#table_students").load("loadstudents.php", {"num_of_student_to_show":$('#input_num_of_student_to_show').val()});
			alert("SERVER response -> " + data);
			console.log(data);
		}
	);
})

$(document).on("click", "#view_students_btn", function(){
	$("#table_students").load("loadstudents.php", {"num_of_student_to_show":$('#input_num_of_student_to_show').val()});
})

$(document).on("click", "#search_student_btn", function(){
	$("#table_students").load("loadstudents.php", {"search_keyword":$("#input_search").val()});
})

$(document).on("click", "#add_subject_btn", function(){
	console.log("add_subject_btn clicked!");
})


$(document).on("click", "#add_subject_submit", function(){
	$.post(
		'controller.php',
		{
			'command':'addsubject',
			'subject_name':$("#subject_name_input").val(),
			'subject_code':$("#subject_code_input").val(),
			'subject_num_credit':$("#subject_num_credit_input").val(),
			'subject_major':$("#subject_major_input").val()
		},
		function(rps){
			$("#add_subject_div").modal('toggle');
			alert("SERVER response -> " + rps);
		}
	)
})

$(document).on("click", "#view_subjects_btn", function(){
	$("#table_subjects").load("loadsubjects.php", {"command":"#loadallsubjects"});
})


$(document).on("keyup", "#input_search", function(){
	console.log("input changed!");
	$("#table_students").load("loadstudents.php", {"search_keyword":$("#input_search").val()});
})
$(document).on("keyup", "#search_subject_input", function(){
	console.log("sending data to server");
	$("#table_subjects").load(
		"loadsubjects.php",
		{
			"keyword":$("#search_subject_input").val(),
			"command":"#searchkeyword"
		}
	);
})

$(document).on("click", "#view_courses_btn", function(){
	console.log("view_courses_btn clicked!");
	$("#table_courses").load("loadcourses.php", {"command":"#loadallsubjects"});
})

$(document).on("click", ".create_course_btn", function(){
	// alert($(this).prop('value'));
	$("#add_course_div").modal('toggle');
	$("#subject_code_lbl").html($(this).prop('value'));
	$.post(
		'controller.php',
		{
			'command':'loadsubjectnamebycode',
			'subject_code':$(this).prop('value')
		},
		function(data){
			$("#subject_name_lbl").html(data);
		}
	);
	console.log("create_course_btn clicked!");
})

$(document).on("click", ".add_student_to_course", function(){
	console.log("add_student_to_course btn clicked!");
	$("#add_student_to_course_div").modal('toggle');
	$("#course_code_lbl").html($(this).val())
})

$(document).on("change", "#teacher_select", function(){
	$("#teacher_name_lbl").html($("#teacher_select").val())
})

$(document).on("change", "#student_select", function(){
	$("#student_to_course_name_lbl").html($("#student_select").val())
})

$(document).on("keyup", "#teacher_search_input", function(){
	$("#teacher_select").load(
		'controller.php',
		{
			'command':'loadteacherbykeyword',
			'keyword':$("#teacher_search_input").val()
		}
	);
})

$(document).on("keyup", "#student_search_input", function(){
	console.log("student_search_input sending -> " + $("#student_search_input").val())
	$("#student_select").load(
		'controller.php',
		{
			'command':'loadstudentbykeyword',
			'keyword':$("#student_search_input").val()
		}
	)
})

$(document).on("click", "#add_student_to_course_btn", function(){
	$.post(
		'controller.php',
		{
			'command':'addstudenttocourse',
			'course_code':$("#course_code_lbl").html(),
			'student_code':$("#student_to_course_name_lbl").html()
		},
		function(rps){
			alert("SERVER RESPONSE -> " + rps);
			$("#add_student_to_course_div").modal('toggle');
		}
	)
})

$(document).on("click", "#view_result_btn", function(){
	console.log("view_result_btn clicked!");
	$("#table_results").load(
		'loadresults.php',
		{
			'student_code':$("#tmp_student_code").val()
		}
	)
})

$(document).on("click", ".modify_result_btn", function(){
	console.log("modify_result_btn clicked!");
})

$(document).on("click", "#add_course_submit", function(){
	$.post(
		'controller.php',
		{
			'command':'createcourse',
			'time':$("#course_time").html(),
			'room':$("#room_input").val(),
			'day_of_week':$("#day_select").val(),
			'teacher_code':$("#teacher_name_lbl").html(),
			'subject_code':$("#subject_code_lbl").html(),
			'group':$("#group_input").val(),
			'start_time':$("#start_time_input").val(),
			'duration_time':$("#duration_time_input").val()
		},
		function(rps){
			alert("SERVER RESPONSE -> " + rps);
			$("#add_course_div").modal('toggle');
		}
	);
})