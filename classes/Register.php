<?php
namespace Classes;

use Classes\Database;
use src\Semej;

class Register {
    protected $data;
    protected $connection;
    public function __construct($data) {
        $this->data = $data;
        $this->connection = new Database();
        if($this->checkPassword()) {
            $this->registerUser();
        }
    }

    protected function registerUser() {
        $userData = [
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'password' => md5($this->data['password'])
        ];
        if($this->connection->insert('users',  $userData)) {
            Semej::set('success', 'ok', 'User registered successfully.');
            header('Location: register.php');
        }else{
            Semej::set('error', 'Error', 'registered failed.');
            header('Location: register.php');
        }
    }
    protected function checkPassword() {
        if($this->data['password'] === $this->data['confirm_password']) {
            return true;
        }else{
            return false;
        }
    }
}