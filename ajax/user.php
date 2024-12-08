<?php

require_once '../repository/BaseRepository.php';
require_once '../repository/UserRepository.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $payload = file_get_contents('php://input');
    $payload = json_decode($payload, true);

    $user = new UserRepository();
    $action = $payload['action'];

    if ($action == 'is_exists') {
        $username = $payload['username'];
        echo $user->isUserExists($username);

        exit;
    }

    if ($action == 'create') {
        $name = $payload['name'];
        $username = $payload['username'];
        $password = $payload['password'];

        echo $user->createUser($name, $username, $password) === TRUE
            ? "success"
            : "Server error: Unable to create user";

        exit;
    }

    if ($action == 'update') {
        $id = $payload['id'];
        $name = $payload['name'];
        $username = $payload['username'];
        $password = $payload['password'];

        echo $user->updatePatient($id, $name, $username, $password) === TRUE
            ? "success"
            : "Server error: Unable to update user";

        exit;
    }
}