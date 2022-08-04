<?php
include 'user.php';

function Insert($login, $password, $email,$name){


    $new_password=md5($password.$name);

    $People=new User($login, $new_password, $email,$name);
    
    $data = file_get_contents('bd.json');
    $data = json_decode($data);
    
    array_push($data, $People);
    $data=json_encode($data);
    file_put_contents('bd.json',$data);

     session_start();
     $_SESSION['user'] = $name;
     return 1;
}

function Select_login($login){

    $data = file_get_contents('bd.json');
    $data = json_decode($data);

    if(empty( $data )==false){
    foreach($data as $result) {
      
          if($result->login==$login)
          {
            return 1;
          }
        }
    }else return 0;
}

function Select_email($email){

    $data = file_get_contents('bd.json');
    $data = json_decode($data);

    if(empty( $data )==false){
    foreach($data as $result) {
      
          if($result->email==$email)
          {
            return 1;
          }
        }
    }else return 0;
}

function Select_password($login,$password){

    $data = file_get_contents('bd.json');
    $data = json_decode($data);

    if(empty( $data )==false){
    foreach($data as $result) {
      
          if($result->login==$login)
          {
            if((md5($password.$result->name))== ($result->password)){

                session_start();
                $_SESSION['user'] = $result->name;

                return 1;
            }
          }

        }
    }else return 0;

}
