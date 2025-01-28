<?php

namespace Milly\WebPagePhp\repositories;
use  Milly\WebPagePhp\Db;

class SiteVisitRepository{
    
    private $conn;

    public function __construct() {
        $db = new Db();
        $this->conn = $db->connect(HOST, USERNAME, PASSWORD,DATABASE);
    }

    private function addQuery(string $sql): bool|\PDOStatement{
        return $this->conn->prepare($sql);
    }


    public function insert($ip, $day){
        $sql = "CREATE adm_visitas SET ip = ?, dia = ?";
        try{
            $stmt = $this->addQuery($sql);
            $stmt->execute([$ip, $day]);
        }catch (\Exception $e){
            echo $e->getMessage();
        }
    }


  

}


?>  