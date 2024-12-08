<?php

require_once '../repository/BaseRepository.php';
require_once '../repository/PatientRepository.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $payload = file_get_contents('php://input');
    $payload = json_decode($payload, true);

    $patient = new PatientRepository();
    $action = $payload['action'];

    if ($action == 'delete') {
        $id = $payload['id'];

        echo $patient->deletePatient($id) === TRUE
             ? "success"
             : "Server error: Unable to delete patient";

        exit;
    }

    if ($action == 'update') {
        $id = $payload['id'];
        $firstname = $payload['firstname'];
        $lastname = $payload['lastname'];
        $phoneno = $payload['phoneno'];
        $adddate = $payload['adddate'];
        $sino = $payload['sino'];
        $middlename = $payload['middlename'];

        echo $patient->updatePatient($id, $firstname, $lastname, $phoneno, $adddate, $sino, $middlename) === TRUE
            ? "success"
            : "Server error: Unable to update patient";

        exit;
    }

    if ($action == 'create') {
        $firstname = $payload['firstname'];
        $lastname = $payload['lastname'];
        $phoneno = $payload['phoneno'];
        $adddate = $payload['adddate'];
        $sino = $payload['sino'];
        $middlename = $payload['middlename'];

        echo $patient->createPatient($firstname, $lastname, $phoneno, $adddate, $sino, $middlename) === TRUE
            ? "success"
            : "Server error: Unable to create patient";

        exit;
    }
}

?>