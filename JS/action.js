
let login_form = document.getElementById('login_form');

let button_input = document.getElementById('button_input');

let button_registration = document.getElementById('button_registration');

if (button_input != null) { //Input
	button_input.addEventListener('click', function () {

		let login_data = document.getElementById('login_form').value;
		let password_data = document.getElementById('password_form').value;

		let login_messeng = document.getElementById('login_messeng');
		let password_messeng = document.getElementById('info_password');

		jsonData = {
			"login": login_data,
			"password": password_data
		}

		fetch('\authorization.php', {
			method: "POST",
			body: JSON.stringify(jsonData),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}

		}).then(
			response => {
				return response.json();
			}
		).then(data => {

			login_messeng.innerHTML = data.login;
			password_messeng.innerHTML = data.password;
			if (data.user_regist === "completing") {
				window.location = "\index.php";
			}
		});
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
		let email_messeng = document.getElementById('info_email');
		let name_messeng = document.getElementById('info_name');

		let password_confirm_messeng = document.getElementById('info_confirm_password');
		password_confirm_messeng.innerHTML ='';



		if (password_data == password_confirm) {

			jsonData = {
				"login": login_data,
				"password": password_data,
				"email": email_data,
				"name": name_data
			}

			fetch('\registration.php', {
				method: "POST",
				body: JSON.stringify(jsonData),
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}

			}).then(
				response => {
					return response.json();
				}
			).then(data => {
				console.log(data);
				login_messeng.innerHTML = data.login;
				password_messeng.innerHTML = data.password;
				email_messeng.innerHTML = data.email;
				name_messeng.innerHTML = data.name;

				if (data.user_regist === "completing") {
					window.location = "\index.php";
				}
			});
		} else if (password_data != password_confirm) {
			password_confirm_messeng.innerHTML = 'Password does not match';
		}
	});
}









