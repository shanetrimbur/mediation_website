<?php
class DB {
    private $host = 'localhost'; // Database host
    private $user = 'root';      // Database username
    private $pass = '';          // Database password
    private $dbname = 'mediation_db'; // Database name
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function __destruct() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
?>
