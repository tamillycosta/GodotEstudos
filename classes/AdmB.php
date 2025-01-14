<?php

class AdmB{
    
    private $conn;
    public function __construct(mysqli $conn) {
        $this->conn = $conn;
    }

    public function Buscar(string $nome, string $senha):bool{
        $sql = "SELECT * FROM user_adm WHERE username = ? AND senha = ?";
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("ss", $nome, $senha);
            if($stmt->execute()){
                $stmt->store_result();
                if ($stmt->num_rows === 1) {
                    $stmt->bind_result($id, $nome, $senha, $username, $img); 
        
                    $stmt->fetch();
                    $_SESSION['nome'] = $nome;
                    $_SESSION['img']  = $img;
                    return true; // Usuário encontrado
                }
            }
            $stmt->close();
        }      
        return false;
    }
    
}


?>