<?php
require_once 'crud.php';

class Registration
{


  public $response_array = [
    "login" => 'Not a valid login',
    "password" => 'Not a valid password', "email" => 'Not a valid email address',
    "name" => 'Not a valid name', "user_regist" => 'error'
  ];

  public function getResponseArray()
  {
    return $this->response_array;
  }

  public function setResponseArray($response_array)
  {
    $this->response_array = array_replace($this->response_array, $response_array);
  }

  public function check_login($login)
  {
    $crud = new Crud();

    $login = trim($login, " ");
    if ((preg_match("/ /", $login)) || (6 <= strlen($login)) == false || (0 == strlen($login)) == true) {
      $this->setResponseArray($response_array = ["login" => 'Not a valid login']);
    } elseif (($crud->Select_login($login)) != true) {
      $this->setResponseArray($response_array = ["login" => '']);
      return 1;
    } else {
      $this->setResponseArray($response_array = ["login" => 'Login exists']);
      return 0;
    }
  }

  public function check_password($password)
  {
    $password = trim($password, " ");

    if ((((preg_match("/[^\w]/", $password)) == false) && ((preg_match("/[^\d]/", $password)) != false) && ((preg_match("/[^a-zA-Z]/", $password)) != false)
      && ((preg_match("/[^\S]/", $password)) == false)) && ((5 < strlen($password)) == true)) {
      $this->setResponseArray($response_array = ["password" => '']);
      return 1;
    } else {
      $this->setResponseArray($response_array = ["password" => 'Not a valid password']);
      return 0;
    }
  }

  public function check_email($email)
  {
    $crud = new Crud();
    if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+(\.[a-z0-9-]+)*(\.[a-zA-Z.]{2,5})$/", $email) == false) {
      $this->setResponseArray($response_array = ["email" => 'Not a valid email address']);
      return 0;
    } elseif (($crud->Select_email($email)) != true) {
      $this->setResponseArray($response_array = ["email" => '']);
      return 1;
    } else {
      $this->setResponseArray($response_array = ["email" => 'Email exists']);
      return 0;
    }
  }

  public function check_name($name)
  {
    if (preg_match("/^[a-zA-Z]{2}$/", $name) == false) {
      $this->setResponseArray($response_array = ["name" => 'Not a valid name']);
    } else {
      $this->setResponseArray($response_array = ["name" => '']);
      return true;
    }
  }
}

$_POST = json_decode(file_get_contents("php://input"), true);
$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];
$name = $_POST['name'];


$user_regist = new Registration;

if ((($user_regist->check_login($login)) == true) && ($user_regist->check_password($password) == true) && ($user_regist->check_email($email) == true) && ($user_regist->check_name($name) == true)) {
  $crud = new Crud();

  $crud->Insert($login, $password, $email, $name);
  $user_regist->setResponseArray($response_array = ["user_regist" => 'completing']);
  echo json_encode($user_regist->getResponseArray());
} else {

  echo json_encode($user_regist->getResponseArray());
}
