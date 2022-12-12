const regex_acc = /^[a-zA-Z0-9]+$/;

const user_name = document.getElementById('user_name');
const pwd = document.getElementById('password');
const form = document.getElementById('form');

form.onsubmit = function(e){
    var bool = false;
	var message = "";
	if(!regex_acc.test(user_name.value)){
		message += "-Tên tài khoản không được bỏ trống và không chứa kí tự đặc biệt!\n";
		bool = true;
	}
	if(!regex_acc.test(pwd.value)){
		message += "-Mật khẩu không được bỏ trống và không chứa kí tự đặc biệt!\n";
		bool = true;
	}
	if(bool){
		e.preventDefault();
		window.alert(message);
        return false;
	}
    return true;
}