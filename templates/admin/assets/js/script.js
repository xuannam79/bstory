/* User */
function validateAdd() {
	$(document).ready(function () {
		$('#frm').validate({
			ignore: [],
			rules: {
				"username": {
					required: true,
					minlength: 3,
					maxlength: 32,
				},
				"password": {
					required: true,
					minlength: 6,
				},
				"fullname": {
					required: true,
					minlength: 3,
					maxlength: 32,
				},
				"tendm": {
					required: true,
					minlength: 3,
					maxlength: 32,
				},
			},
			messages: {
				"username": {
					required: "Vui lòng nhập username!",
					minlength: "Username tối thiếu 3 kí tự",
					maxlength: "Username tối đa 32 kí tự",
				},
				"password": {
					required: "Vui lòng nhập password !",
					minlength: "Password tối thiểu 3 kí tự",
				},
				"fullname": {
					required: "Vui lòng nhập fullname !",
					minlength: "Fullname tối thiếu 3 kí tự",
					maxlength: "Fullname tối đa 32 kí tự",
				},	
				"tendm": {
					required: "Vui lòng nhập Tên danh mục!",
					minlength: "Tên danh mục tối thiếu 3 kí tự",
					maxlength: "Tên danh mục tối đa 32 kí tự",
				},
			},
		});
	});	
}