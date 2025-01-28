<?php
namespace Milly\WebPagePhp\repositories;
use Milly\WebPagePhp\Db;
use Milly\WebPagePhp\models\Adm;

class AdmRepository{
    private $conn;
    
    public function __construct() {
        $db = new Db();
        $this->conn = $db->connect('localhost', 'root', '','modulo8');
    }
    
    private function addQuery(string $sql): bool|\PDOStatement{
        return $this->conn->prepare($sql);
    }
   
    public function find(String $username, String $password):array{
        $sql = "SELECT * FROM user_adm WHERE username = ? AND senha = ?";
        try{
            $stmt = $this->addQuery($sql);
            $stmt->execute([$username, $password]);
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            echo "Erro: " . $e->getMessage();
        }   
    }


    public function update(Adm $adm):bool{
        $sql = "UPDATE user_adm SET nome = ?, senha = ?, img = ? WHERE username = ?";

        try{
            $stmt = $this->addQuery($sql);
            $stmt->execute([$adm->getName(), $adm->getPassword(), $adm->getImg(), $adm->getUsername()]);
            return true;
        }
        catch (\Exception $e){
            echo $e->getMessage();
        }
    }
    

    public function create(Adm $adm): bool{
        $sql = "CREATE user_adm SET nome = ?, senha = ?, img = ?, unsername = ?";
        try {
            $stmt = $this->addQuery($sql);
            $stmt->execute([$adm->getName(), $adm->getPassword(), $adm->getImg(), $adm->getUsername()]);
            return true;
        } catch (\Exception $e){
            echo $e->getMessage();
        }
    }

   
    public function delete(string $username): bool{
        $sql = "DELETE user_adm WHERE username = ?";
        try{
            $stmt = $this->addQuery($sql);
            $stmt->execute([$username]);
            return true;
        }
        catch (\Exception $e){
            echo $e->getMessage();
        }
    }
}



?>