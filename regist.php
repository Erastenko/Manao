
<?php 
 $login=$_GET['login'];
 $password=$_GET['password'];
 $email=$_GET['email_data'];

check_login ($login);
check_password($password);
check_email($email);

function check_login ($login){

  $login= trim($login," ");
  
if ( (preg_match("/ / ",$login))||(6<=strlen($login))==false||(0==strlen($login))==true)
  echo "Неверный логин ";
  
}

function check_password ($password){
  $password= trim($password," ");
  
  if ( (preg_match("/^[a-zA-Z0-9]$/",$password))||(6<=strlen($password))==false||(0==strlen($password))==true)
  echo " Неверный пароль";
  
}

function check_email($email){
  if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+.[a-zA-Z.]{2,5}$/", $email)==false) {
      echo " is NOT a valid email address";
    }
}

function check_name($name){
  if (preg_match("/^[a-zA-Z]{2}$/", $name)==false) {
      echo " name";
    }
}


?>