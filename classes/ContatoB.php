
<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
class ContatoB{

    public $data = array();
    public $nome;
    public $email;
    public $telefone;
    public $mensagem;

    public function __construct(string $nome, string $email, string $telefone, string $mensagem){
      $this->nome = $nome;
      $this->email = $email;
      $this->telefone = $telefone;
      $this->mensagem = $mensagem;
    }

    public function __tostring():string{
        return ''. $this->nome .''. $this->email .''. $this->telefone .''. $this->mensagem;
    }

    public function criarContato(mysqli $conn):void{
        
            $sql = "INSERT INTO Contatos (nome, email, telefone, mensagem) VALUES (?, ?, ?, ?)";
    
            if ($stmt = $conn->prepare($sql)) {
                
                $stmt->bind_param("ssss", $this->nome, $this->email, $this->telefone, $this->mensagem);

                if ($stmt->execute()) {
    
                    if ($stmt->affected_rows > 0) {
                        $this->data['sucesso'] = true;
                        
                    } else {
                        $this->data['erro'] = true;
                    }
                } else {
                    $this->data['erro'] = true;
                }
            
                $stmt->close();
            } else {
               
                $this->data['erro'] = true;
            }
            
          
        } 
        
        public function chamarApi(mysqli $conn){
            $this->criarContato($conn);
            die(json_encode($this->data));
        }
   
}

   

?>