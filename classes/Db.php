<?php


class Db{
    
    private $host;
    private $username;
    private $password;
    private $database;
    private $conn;

    public function __construct($host, $username, $password, $database){
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function connect():mysqli{
        if($this->conn == null){
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        }
           
        if ($this->conn->connect_error) {
            throw new Exception("Falha na conexão: " . $this->conn->connect_error);
        }
        return $this->conn; 
    }
  

}



?>