<?php
include('../dbConection');
class Site{
    var $conn;
    public function __construct(){
        $Db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
        $this->conn = $Db->connect();
    }

   private function onUpdate($horarioAtuaal, $token):void{
        $sql = "UPDATE adm_online SET ultima_acao = ? WHERE token = ?";
        if($stmt = $this->conn->prepare($sql)){
            $stmt->bind_param("ss",$horarioAtuaal, $token);
            $stmt->execute(); 
        }
        else{
            echo 'ocorreu um erro';
        }
    }

    private function onInsert($horarioAtuaal, $token, $ip):void{
        $sql = "INSERT INTO adm_online (ip ,token, ultima_acao) VALUES (?, ?, ?)";
        if($stmt = $this->conn->prepare($sql)){
            $stmt->bind_param("sss", $ip, $token, $horarioAtuaal);
            if($stmt->execute()){
                if ($stmt->affected_rows > 0) {
                    echo 'sucesso';
            }
            else{
                echo  'houve um erro';
            }
        }else {
            echo 'Erro na execução do comando SQL.';
        }
    } else {
        echo 'Erro ao preparar o SQL.';
    }

    }


    public function onGet(){
        $sql = "SELECT * FROM adm_online WHERE token = ?";
        if($stmt = $this->conn->prepare($sql)){
            $stmt->bind_param("s", $token);
            $stmt->execute();
            $stmt->store_result();
            return $stmt->num_rows ;
    }
}

    public function updateUsuarioOnline(){
        if(isset($_SESSION['online'])){
            $token =  $_SESSION['online'];
            $horarioAtuaal = date('Y-m-d H:i:s');
                if($this->onGet() == 0){
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $this->onInsert($horarioAtuaal, $token, $ip);
                }else
                $this->onUpdate($horarioAtuaal, $token);
            }
    else{
            $_SESSION['online'] = uniqid();
            $ip = $_SERVER['REMOTE_ADDR'];
            $token =  $_SESSION['online'];
            $horarioAtuaal = date('Y-m-d H:i:s');
            $this->onInsert($horarioAtuaal, $token, $ip);
        }
    }


}

?>