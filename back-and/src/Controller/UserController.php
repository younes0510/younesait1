<?php
require_once __DIR__ . '/../Model/User.php';

class UserController {
    public static function list() {
        $users = User::getAll();
        echo json_encode($users);
    }

    public static function create() {
        $data = json_decode(file_get_contents('php://input'), true);
        $user = User::create($data);
        echo json_encode($user);
    }
}