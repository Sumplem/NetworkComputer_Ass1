const regex_name = /^[a-zA-Z ]{2,30}$/;
const regex_phone_num = /^\d{10}$/;
const regex_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
const regex_acc = /^[a-zA-Z0-9]{6,20}$/;

const Name = document.getElementById('name');
const phone = document.getElementById('phone');
const email = document.getElementById('email');
const user_name = document.getElementById('user_name');
const pass = document.getElementById('pass');
const pass_again = document.getElementById('pass_again');

function validate(event){
    var bool = false;
	var message = "";
	if(!regex_name.test(Name.value)){
		message += "-Invalid name!\n";
		bool = true;
	}
	if(phone.value != ''){
		if(!regex_phone_num.test(phone.value)){
			message += "-Phone number must have 10 digits!\n";
			bool = true;
		}
	}
	if(email.value != ''){
		if(!regex_email.test(email.value)){
			message += "-Invalid email!\n";
			bool = true;
		}
	}
	if(!regex_acc.test(user_name.value)){
		message += "-Invalid username! Username must between 6 and 20 characters and not contain special characters!\n";
		bool = true;
	}
	if(!regex_acc.test(pass.value)){
		message += "-Password must be between 6 and 20 characters and not contain special characters!\n";
		bool = true;
	}
	if(pass.value != pass_again.value){
		message += "-Invalid reenter password!\n";
		bool = true;
	}

	if(bool){
		event.preventDefault();
		console.log('aaaa');
		window.alert(message);
		return false;
	}

	return true;
}