<?php
namespace Classes;

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
            echo 'ok';
        }else{
            echo 'not ok';
        }
    }
    protected function checkPassword() {
        if($this->data['password'] === $this->data['confirm-password']) {
            return true;
        }else{
            return false;
        }
    }
}