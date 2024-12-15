<?php

namespace Classes;

use Classes\Database;
use src\AuthToken;
use src\Semej;

class Login {

    protected $data;
    protected $connection;

    public function __construct($data)
    {
        $this->data = $data;
        $this->connection = new Database();
    }

    public function loginUser() 
    {
        $email = $this->data['email'];

        $user = $this->connection->select('users', "email='$email'");

       if(!$user) {
        Semej::set('danger', 'Error', 'Username or password is incorrect.');
        header('Location: login.php');die;
       }

       if($user['password'] !== md5($this->data['password'])) {
        Semej::set('danger', 'Error', 'Username or password is incorrect.2');
        header('Location: login.php');die;
       }

       $_SESSION['username'] = $user['email'];
       AuthToken::generate();
      header('Location: dashboard.php');die;

    }
}