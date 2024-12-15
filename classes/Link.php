<?php

namespace Classes;

use src\AuthToken;
use src\Semej;

class Link {
    protected $data;
    protected $connection;

    public function __construct()
    {
        $this->connection = new Database();
    }

    public function addLink($data) {
        $this->data = $data;
        $user_id = $_SESSION['user_id'];
        $title = $this->data;
        $uuid = uniqid('bigpotato_yt'); 

        $linkData = [
            'user_id' => $user_id,
            'title' => $title,
            'uuid' => $uuid
        ];
        $this->connection->insert('links', $linkData);
        Semej::set('success', 'ok', 'link created successfully.');
        header('Location:dashboard.php');
        die;
    }

    public function showLinks()
    {
        $user_id = $_SESSION['user_id'];
        $allLinks = $this->connection->selectAllWithCondition('links', "user_id = '$user_id'");
        return $allLinks;
    }
}