<?php
include_once 'json_function.php';
include_once 'user.php';

class Crud
{

  public function Insert($login, $password, $email, $name)
  {
    $new_password = md5($password . $name);

    $People = new User($login, $new_password, $email, $name);

    $json = new JSON();
    $data = $json->read_json();

    array_push($data, $People);

    $json->write_json($data);

    session_start();
    $_SESSION['user'] = $name;
    return 1;
  }

  public function Select_login($login)
  {

    $json = new JSON();
    $data = $json->read_json();

    if (empty($data) == false) {
      foreach ($data as $result) {

        if ($result->login == $login) {
          return 1;
        }
      }
    } else return 0;
  }


  public function Select_email($email)
  {

    $json = new JSON();
    $data = $json->read_json();

    if (empty($data) == false) {
      foreach ($data as $result) {

        if ($result->email == $email) {
          return 1;
        }
      }
    } else return 0;
  }

  public function Select_password($login, $password)
  {

    $json = new JSON();
    $data = $json->read_json();

    if (empty($data) == false) {
      foreach ($data as $result) {

        if ($result->login == $login) {
          if ((md5($password . $result->name)) == ($result->password)) {

            session_start();
            $_SESSION['user'] = $result->name;

            return 1;
          }
        }
      }
    } else return 0;
  }
}
