const regex_name = /^[a-zA-Z ]{2,30}$/;
const regex_phone_num = /^\d{10}$/;
const regex_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
const regex_acc = /^[a-zA-Z0-9]{6,20}$/;

const Name = document.getElementById('name');
const phone = document.getElementById('phone');
const email = document.getElementById('email');
const user_name = document.getElementById('user_name');
const pwd = document.getElementById('pwd');
const pwd_again = document.getElementById('pwd-again');
const form = document.getElementById('form');

form.onsubmit = function(e){
    var bool = false;
	var message = "";
	if(!regex_name.test(Name.value)){
		message += "-Sai tên!\n";
		bool = true;
	}
	if(!regex_phone_num.test(phone.value)){
		message += "-Số điện thoại phải có 10 số!\n";
		bool = true;
	}
	if(!regex_email.test(email.value)){
		message += "-Sai email!\n";
		bool = true;
	}
	if(!regex_acc.test(user_name.value)){
		message += "-Sai tên tài khoản!\n";
		bool = true;
	}
	if(!regex_acc.test(pwd.value)){
		message += "-Mật khẩu phải từ 6 đến 20 kí tự và không chứa kí tự đặc biệt!\n";
		bool = true;
	}
	if(pwd.value != pwd_again.value){
		message += "-Mật khẩu nhập lại sai!\n";
		bool = true;
	}
	if(bool){
		e.preventDefault();
		window.alert(message);
        return false;
	}
	window.alert("Đăng ký thành công!");
    return true;
}