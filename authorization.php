<?php
include 'crud.php';

class Authorization
{
  public $response_array = [
    "login" => 'Not a valid login',
    "password" => 'Not a valid password', "user_regist" => 'error'
  ];

  public function getResponseArray()
  {
    return $this->response_array;
  }

  public function setResponseArray($response_array)
  {
    $this->response_array = array_replace($this->response_array, $response_array);
  }

  public function check_login($login, $password)
  {
    $crud = new Crud();
    $login = trim($login, " ");
    if ((preg_match("/ /", $login)) || (6 <= strlen($login)) == false || (0 == strlen($login)) == true) {
      $this->setResponseArray($response_array = ["login" => 'Not a valid login']);
    } elseif (($crud->Select_login($login)) != true) {
      $this->setResponseArray($response_array = ["login" => 'Not a valid login']);
      return 0;
    } elseif (($crud->Select_password($login, $password)) != true) {
      $this->setResponseArray($response_array = ["login" => 'Not a valid login']);
      return 0;
    } else {
      $this->setResponseArray($response_array = ["login" => '']);
      return 1;
    }
  }


  public function check_password($password)
  {
    $password = trim($password, " ");

    if ((((preg_match("/[^\w]/", $password)) == false) && ((preg_match("/[^\d]/", $password)) != false) && ((preg_match("/[^a-zA-Z]/", $password)) != false)
      && ((preg_match("/[^\S]/", $password)) == false)) || ((6 >= strlen($password)) == true && (0 <= strlen($password)) == false)) {
      $this->setResponseArray($response_array = ["password" => '']);
      return 1;
    } else {
      $this->setResponseArray($response_array = ["password" => 'Not a valid password']);
      return 0;
    }
  }
}



$_POST = json_decode(file_get_contents("php://input"), true);
$login = $_POST['login'];
$password = $_POST['password'];

$user_authoriz = new Authorization();

if ((($user_authoriz->check_login($login, $password)) == true) && ($user_authoriz->check_password($password) == true)) {

  $user_authoriz->setResponseArray($response_array = ["user_regist" => 'completing']);
  echo json_encode($user_authoriz->getResponseArray());
} else {

  echo json_encode($user_authoriz->getResponseArray());
}
