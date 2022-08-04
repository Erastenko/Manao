<?php 
include 'crud.php';
 $login=$_GET['login'];
 $password=$_GET['password'];


if(((check_login($login,$password))==true)&&(check_password($password)==true))
{

echo "Enter";
}

function check_login ($login,$password){

  $login= trim($login," ");
  if( (preg_match("/ /",$login))||(6<=strlen($login))==false||(0==strlen($login))==true){
  echo "Not a valid login";
  }elseif((Select_login($login))!=true){
    echo "Not a valid login";
    return 0;
    }
  elseif((Select_password($login,$password))!=true){
    echo "Not a valid password";
    return 0;
    }else{
    return 1;}
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

?>