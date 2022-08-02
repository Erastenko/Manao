
console.log("pipi");


let login_form = document.getElementById('login_form');

let button_input = document.getElementById('button_input');

let button_registration = document.getElementById('button_registration');

if(button_input!=null){
button_input.addEventListener('click', function() {
	let login_data=document.getElementById('login_form').value;
	let password_data=document.getElementById('password_form').value;
	let login_messeng = document.getElementById('login_messeng');
    let password_messeng=document.getElementById('info_password');
	console.log(password_data);
		fetch('/regist.php/?login='+login_data+'&&password='+password_data)
		.then(
			response => {
				return response.text();
			}
		).then(
			text => {
			login_messeng.innerHTML = text.replace('Неверный пароль',' ');
			password_messeng.innerHTML=text.replace('Неверный логин',' ');;
			}
		);
	});}

	button_registration.addEventListener('click', function() {
		
		let login_data=document.getElementById('login_form').value;
		let password_data=document.getElementById('password_form').value;
		let password_confirm=document.getElementById('password_confirm_form').value;
		let email_data=document.getElementById('email_form').value; 


		let login_messeng = document.getElementById('login_messeng');
		let password_messeng=document.getElementById('info_password');
		let password_confirm_messeng=document.getElementById('info_confirm_password');

		let email_messeng=document.getElementById('info_email');



		password_confirm_messeng.innerHTML='';
		login_messeng.innerHTML ='';
		password_messeng.innerHTML='';
		email_messeng.innerHTML='';
		if (password_data==password_confirm){
			fetch('/regist.php/?login='+login_data+'&&password='+password_data+'&&email_data='+email_data)
			.then(
				response => {
					return response.text();
				}
			).then(
				text => {
					console.log(text);
			
					
				if(text.includes('Неверный логин')){
				login_messeng.innerHTML="Неверный логин";}

				if(text.includes('Неверный пароль')){
				password_messeng.innerHTML="Неверный пароль";}

				if(text.includes('is NOT a valid email address')){
				email_messeng.innerHTML="is NOT a valid email address";}
					

			}
			);
		}else if(password_data!=password_confirm){
			password_confirm_messeng.innerHTML='Пароль не совпадает';
		}
		});
	
	


	





