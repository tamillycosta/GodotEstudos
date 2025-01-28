<?php

namespace Milly\WebPagePhp;
class Db {
   
    private $conn;

    public function connect($host, $username, $password, $database): \PDO {
        if ($this->conn == null) {
            $dsn = "mysql:host={$host};dbname={$database};charset=utf8mb4";
            try {
                $this->conn = new \PDO($dsn, $username, $password);
                $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                throw new \Exception("Falha na conexão: " . $e->getMessage());
            }
        }
        return $this->conn;
    }
}

?>
