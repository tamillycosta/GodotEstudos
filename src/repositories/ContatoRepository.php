<?php 

namespace Milly\WebPagePhp\repositories;
use Milly\WebPagePhp\Db;
Use Milly\WebPagePhp\models\Contato;
header('Content-Type: application/json');

class ContatoRepository{

    public $data = array();
  

    private $conn;  

    public function __construct() {
        $db = new Db();
        $this->conn = $db->connect(HOST, USERNAME, PASSWORD,DATABASE);
    }

    private function addQuery(string $sql): bool|\PDOStatement{
        return $this->conn->prepare($sql);
    }

    public function create(Contato $contato):void{
        
            $sql = "INSERT INTO Contatos (nome, email, telefone, mensagem) VALUES (?, ?, ?, ?)";
            try{
                $stmt = $this->addQuery($sql);
                $stmt->execute([$contato->getName(), $contato->getEmail(), $contato->getPhone(), $contato->getMensage()]);
                $this->data['sucesso'] = true;
                die(json_encode($this->data));
            }
             catch (\Exception $e){
                $this->data['erro'] = true;
             }
        }
          
   
}

   

?>