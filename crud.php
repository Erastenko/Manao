<?php
include 'user.php';

function Insert($login, $password, $email,$name){


    $new_password=md5($password.$name);

    $People=new User($login, $new_password, $email,$name);
    
    $data = file_get_contents('bd.json');
    $data = json_decode($data);
    
    array_push($data, $People);

    file_put_contents('bd.json',json_encode($data));

}

function Select($login, $password){

    $data = file_get_contents('bd.json');
    $data = json_decode($data);

    foreach($data as $result) {
      
          if($result->login==$login)
          if($result->password == md5($password.$result->name)) {
                //если всёё хорошо запускаем сесию и переходим на  HOME  страницу
              break;
          }{
              //вывод что что не верно
          }
      }


}

?>
