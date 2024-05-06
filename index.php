<?php

require_once "Autoloader.php";

use Classes\Database;

// use Classes\TestClass;

// $obj = new TestClass();
// $obj->test('amir');

$dbs = new Database();
$data = [
    'name' => 'admin',
    'email' => 'admin@example.com',
    'password' => md5('admin!@#123456789')
];
$result = $dbs->insert('users', $data);
var_dump($result);