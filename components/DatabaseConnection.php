<?php

class DatabaseConnection {
    private static $instance;
    private $connection;

    private function __construct() {
        $this->connection = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DATABASE);

        // Check for connection errors
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
            var_dump("database connection created");
        } else {
            var_dump("database connection already exists");
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}

?>
