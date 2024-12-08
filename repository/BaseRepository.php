<?php

class BaseRepository {
    private $servername = "localhost";
    private $username   = "root";
    private $password   = "";
    private $dbname     = "port_hcmsdb";

    public function __construct() { 
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    protected function executeNonQuery($sql) {
        return $this->conn->query($sql);
    }

    protected function getInsertedId() {
        return $this->conn->insert_id;
    }

    protected function logDetails($action, $old_value, $new_value, $user) {
        $sql = "INSERT INTO tbllogs (user, logdate, action, old_value, new_value) 
        VALUES ('$user', NOW(), '$action', $old_value, $new_value)";

        return $this->executeNonQuery($sql);
    }

    
}

?>