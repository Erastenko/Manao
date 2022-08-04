<?php 
include 'crud.php';
 $login=$_GET['login'];
 $password=$_GET['password'];
 $email=$_GET['email'];
 $name=$_GET['name'];


if(((check_login($login))==true)&&(check_password($password)==true)&&(check_email($email)==true)&&(check_name($name)==true))
{
  Insert($login, $password, $email,$name);
  echo 'Regist';
}

function check_login ($login){

  $login= trim($login," ");
  if( (preg_match("/ /",$login))||(6<=strlen($login))==false||(0==strlen($login))==true){
  echo "Not a valid login";
  }elseif((Select_login($login))!=true){
    return 1;
    }
  else{
    echo "Login exists";
    return 0;
  }
}

function check_password ($password){
  $password= trim($password," ");
  
  if ((((preg_match("/[^\w]/", $password))==false)&&((preg_match("/[^\d]/", $password))!=false)&&((preg_match("/[^a-zA-Z]/", $password))!=false)
  &&((preg_match("/[^\S]/", $password))==false))||((6>=strlen($password))==true&&(0<=strlen($password))==false))
  {
    return 1;
  }else{
    echo "Not a valid password";
    return 0;
  }
  
}

function check_email($email){
  if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+.[a-zA-Z.]{2,5}$/", $email)==false) {
      echo "Not a valid email address";
      return 0;
    }
    elseif((Select_email($email))!=true){
      return 1;
      }
    else{
      echo "Email exists";
      return 0;
    }
}

function check_name($name){
  if (preg_match("/^[a-zA-Z]{2}$/", $name)==false) {
      echo "Not a valid name";
    }
    else{
      return true;
    }
}
