<?php
class User
{
public  $login, $password, $email,$name;

function __construct($login, $password, $email,$name)
{
    $this->login = $login;
    $this->password = $password;
    $this->email = $email;
    $this->name = $name; 
}

}


?>