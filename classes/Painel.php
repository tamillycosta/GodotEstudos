<?php
include '../dbConection.php';
class Painel{

    public $conn;
    public function __construct(){
        $Db = new Db(HOST, USERNAME, PASSWORD, DATABASE);
        $this->conn = $Db->connect();
    }

    public static function isLogado():bool{
        return isset($_SESSION['login']) ? true : false;
    }

    public static function loggout():void{
        session_destroy();
        header(  'Location: '.INCLUDE_PAINEL_PATH);
        
    }
    public static function carregarPagina():void{
        if(isset($_GET['url'])){
           $url = explode('/',$_GET['url']);
           if(file_exists('pages/'.$url[0].'.php')){
                include('pages/'.$url[0].'.php');
           }else{
                 header(  'Location: '.INCLUDE_PAINEL_PATH);
           }
        }else{
            include('pages/home.php');
        }
    }

    public function listarUsuariosOnline(): array {
        $this->limparUsuariosOnline();  
        $sql = "SELECT * FROM adm_online";
       
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->execute();
            $stmt->store_result();  
    
            $resultados = [];
            $stmt->bind_result($id, $ip, $token, $ultima_acao); 
    
            while ($stmt->fetch()) {
                $resultados[] = [
                    'id' => $id,
                    'ip' => $ip,
                    'token' => $token,
                    'ultima_acao' => $ultima_acao
                ];
            }
    
          return $resultados;  
        }
    
        return [];  
    }
    

    public function limparUsuariosOnline(){
        $date = date('Y-m-d H:i:s');
        $sql = "DELETE FROM adm_online WHERE ultima_acao < ? - INTERVAL 1 MINUTE"; 
        
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("s", $date);  
            $stmt->execute();    
        }else {
                echo 'Erro na execução do comando SQL.';
            }
        } 
    
}

?>