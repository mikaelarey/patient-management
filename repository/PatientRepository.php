<?php

class PatientRepository extends BaseRepository {

    private $table = 'tblpatient';

    public function createPatient($firstname, $lastname, $phoneno, $adddate, $sino, $middlename) {

        $sql = "INSERT INTO tblpatient(firstname, lastname, middlename, phoneno, adddate, sino)
                VALUES ('$firstname', '$lastname', '$middlename', '$phoneno', '$adddate', '$sino')";

        $result = $this->executeNonQuery($sql);

        if ($result === TRUE) {
            $user = $_SESSION['role'];
            $id = $this->getInsertedId();
            $new_value = $this->getPatientDetail($id);

            // TODO: Logging has an issue and not inserting record to database
            $this->logDetails("$user has created a user account for $firstname $middlename $lastname", null, $new_value, $user);
        }

        return $result;
    }

    public function updatePatient($id, $firstname, $lastname, $phoneno, $adddate, $sino, $middlename) {
        $old_value = $this->getPatientDetail($id);

        $sql = "UPDATE tblpatient
                    SET firstname = '$firstname'	
	                    , lastname	= '$lastname'
	                    , middlename = '$middlename'
	                    , phoneno = '$phoneno'
	                    , adddate = '$adddate'
	                    , sino = '$sino'
                    WHERE id = '$id'";

        $result = $this->executeNonQuery($sql);

        if ($result === TRUE) {
            $user = $_SESSION['role'];
            $new_value = $this->getPatientDetail($id);

            // TODO: Logging has an issue and not inserting record to database
            $this->logDetails("$user has updated a user account of $firstname $middlename $lastname", $old_value, $new_value, $user);
        }

        return $result;
    }

    public function deletePatient($id) {
        $old_value = $this->getPatientDetail($id);

        $sql = "DELETE FROM tblpatient WHERE id='$id'";
        $result = $this->executeNonQuery($sql);

        if ($result === TRUE) {
            $user = $_SESSION['role'];

            // TODO: Logging has an issue and not inserting record to database
            // $this->logDetails($user." has deleted a user account of ".$old_value->firstname." ".$old_value->middlename." ".$old_value->lastname, $old_value, null, $user);
        }

        return $result;
    }

    private function getPatientDetail($id) {
        $sql = "SELECT * FROM tblpatient WHERE id = $id";
        $result = $this->executeNonQuery($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data = [
                    'id'         => $row['id'],
                    'firstname'  => $row['firstname'],
                    'lastname'	 => $row['lastname'],
                    'middlename' => $row['middlename'],
                    'phoneno'    => $row['phoneno'],
                    'adddate'    => $row['adddate'],
                    'sino'       => $row['sino']
                ];

                break;
            }

            return json_encode($data);
        } else {
            return null;
        }
    }

    private function logHistoryDetails($action, $old_value, $new_value) {
        $user = $_SESSION["role"];

        $sql = "INSERT INTO tbllogs (user, logdate, action, old_value, new_value) 
        VALUES ('$user', NOW(), '$action', $old_value, $new_value)";

        return $this->executeNonQuery($sql);
    }
}

?>