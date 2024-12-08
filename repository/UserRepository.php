<?php

class UserRepository extends BaseRepository {

    public function isUserExists($username) {
        $sql = "SELECT * FROM tbluser WHERE username = '$username'";
        $result = $this->executeNonQuery($sql);
        return $result->num_rows;
    }

    public function createUser($name, $username, $password) {
        $sql = "INSERT INTO tbluser(name, username, password, role, photo)
                VALUES ('$name', '$username', '$password', 'USER', 'user.png')";

        $result = $this->executeNonQuery($sql);
        return $result;
    }

    public function updatePatient($id, $name, $username, $password) {
        $sql = "UPDATE tbluser
                    SET name = '$name'	
	                    , username	= '$username'
	                    , password = '$password'
                    WHERE id = '$id'";

        $result = $this->executeNonQuery($sql);
        return $result;
    }
}

?>