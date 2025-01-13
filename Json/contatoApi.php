<?php

header('Content-Type: application/json');

include '../config.php';
include '../dbConection.php';

$inputHandler = new InputHandler();

try {
    $Db = new Db(HOST,USERNAME,PASSWORD,DATABASE);
    $conn = $Db->connect();
  
} catch (Exception $e) {
    echo json_encode(['erro' => 'Erro ao conectar ao banco']);
   
}

if (isset($_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['mensagem'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];

    if ($inputHandler->emailVerify($email) && $inputHandler->phoneVerify($telefone)) {
        $Contato = new ContatoB($nome, $email, $telefone, $mensagem);
        $Contato->chamarApi($conn);
        $mensagem = $Contato->__tostring();
        
    } else {
        echo json_encode(['erro' => 'Dados inválidos']);
    }
} else {
    echo json_encode(['erro' => 'Campos obrigatórios ausentes']);
}


 


?>