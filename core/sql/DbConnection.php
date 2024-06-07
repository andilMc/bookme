<?php
namespace core\sql;

use PDO;
use PDOException;

class DbConnection {
    private $host;
    private $port; // New property for port
    private $dbname;
    private $user;
    private $password;
    private $pdo;

    public function __construct($host, $port, $dbname, $user, $password) {
        $this->host = $host;
        $this->port = $port; // Assigning the port
        $this->dbname = $dbname;
        $this->user = $user;
        $this->password = $password;

        $this->connect();
    }

    public function connect() {
        $dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->dbname;charset=utf8mb4"; // Updated DSN
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->password, $options);
            return $this->pdo;
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

}
