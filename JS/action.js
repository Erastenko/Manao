


let login_form = document.getElementById('login_form');

let button_input = document.getElementById('button_input');

let button_registration = document.getElementById('button_registration');

if (button_input != null) { //Input
	button_input.addEventListener('click', function () {

		let login_data = document.getElementById('login_form').value;
		let password_data = document.getElementById('password_form').value;

		let login_messeng = document.getElementById('login_messeng');
		let password_messeng = document.getElementById('info_password');
		login_messeng.innerHTML = " ";
		password_messeng.innerHTML = " ";
		fetch('/authorization.php/?login=' + login_data + '&&password=' + password_data)
			.then(
				response => {
					return response.text();
				}
			).then(
				text => {
					if (text.includes('Not a valid login')) {
						login_messeng.innerHTML = "Not a valid login";
					}
					if (text.includes('Not a valid password')) {
						password_messeng.innerHTML = "Not a valid password";
					}

					if (text.includes('Enter')) {
						window.location = "/";
					}

				}
			);
	});
}



if (button_registration != null) {
	button_registration.addEventListener('click', function () {

		let login_data = document.getElementById('login_form').value;
		let password_data = document.getElementById('password_form').value;
		let password_confirm = document.getElementById('password_confirm_form').value;
		let email_data = document.getElementById('email_form').value;
		let name_data = document.getElementById('name_form').value;


		let login_messeng = document.getElementById('login_messeng');
		let password_messeng = document.getElementById('info_password');
		let password_confirm_messeng = document.getElementById('info_confirm_password');
		let email_messeng = document.getElementById('info_email');
		let name_messeng = document.getElementById('info_name');



		password_confirm_messeng.innerHTML =
			login_messeng.innerHTML =
			password_messeng.innerHTML = email_messeng.innerHTML = name_messeng.innerHTML = '';
		if (password_data == password_confirm) {
			fetch('/registration.php/?login=' + login_data + '&&password=' + password_data + '&&email=' + email_data + '&&name=' + name_data)
				.then(
					response => {
						return response.text();
					}
				).then(
					text => {

						if (text.includes('Not a valid login')) {
							login_messeng.innerHTML = "Not a valid login";
						}

						if (text.includes('Login exists')) {
							login_messeng.innerHTML = "Login exists";
						}

						if (text.includes('Not a valid password')) {
							password_messeng.innerHTML = "Not a valid password";
						}

						if (text.includes('Not a valid email address')) {
							email_messeng.innerHTML = "Not a valid email address";
						}

						if (text.includes('Email exists')) {
							email_messeng.innerHTML = "Email exists";
						}

						if (text.includes('Not a valid name')) {
							name_messeng.innerHTML = "Not a valid name";
						}

						if (text.includes('Regist')) {
							window.location = "/";
						}

					}
				);
		} else if (password_data != password_confirm) {
			password_confirm_messeng.innerHTML = 'Password does not match';
		}
	});
}









