<?php

namespace Milly\WebPagePhp\repositories;
use Milly\WebPagePhp\models\UserOnline;
Use Milly\WebPagePhp\Db;


class UserOnlineRepository{
    private $conn;

    public function __construct() {
        $db = new Db();
        $this->conn = $db->connect('localhost', 'root', '','modulo8');
    }

    private function addQuery(string $sql): bool|\PDOStatement{
        return $this->conn->prepare($sql);
    }

    public function list():array{
      
    $sql = "SELECT * FROM adm_online";
    try{
        $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $stmt = $this->addQuery($sql);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }catch (\Exception $e){
            echo $e->getMessage();
        }
    }

    public function delete(){
        $date = date('Y-m-d H:i:s');
        $sql = "DELETE FROM adm_online WHERE ultima_acao < ? - INTERVAL 1 MINUTE"; 
        try{
        $stmt = $this->addQuery($sql);
        $stmt->execute([$date]);
        } catch (\Exception $e){
            echo $e->getMessage();
        }
}

    public function update($curTime, $token){
        $sql = "UPDATE adm_online SET ultima_acao = ? WHERE token = ?";
        try{
            $stmt = $this->addQuery($sql);
            $stmt->execute([$curTime ,$token]);
        } catch (\Exception $e){
            echo $e->getMessage();
        }
    }

    public function insert(UserOnline $userOnline){
        $sql = "INSERT INTO adm_online (ip, ultima_acao, token) VALUES (?, ?, ?)";
        try{
            $stmt = $this->addQuery($sql);
            $stmt->execute([$userOnline->getIp(), $userOnline->getLastAction(), $userOnline->getToken()]);
        }catch (\Exception $e){
            echo $e->getMessage();
        }
    }


    public function select($token){
        $sql = "SELECT * FROM adm_online WHERE token = ?";
        try{
            $stmt = $this->addQuery( $sql);
            $stmt->execute([$token]);
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }catch (\Exception $e){
            echo $e->getMessage();
        }
    }



    public function countColums($sql): int {
        try{
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            
            return (int)$stmt->fetchColumn(); 
        }catch (\Exception $e){
            echo $e->getMessage();
        }
       
    }
   
}

?>