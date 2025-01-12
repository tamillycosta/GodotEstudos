<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
include'config/config.php';


$inputHandler = new InputHandler();
try {
    $Db = new Db('localhost', 'root', '', 'modulo8');
    $conn = $Db->connect();
} catch (Exception $e) {
    echo json_encode(['erro' => 'Erro ao conectar ao banco']);
    die;
}

if (isset($_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['mensagem'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];

    if ($inputHandler->emailVerify($email) && $inputHandler->phoneVerify($telefone)) {
        $Contato = new ContatoB($nome, $email, $telefone, $mensagem);
        $Contato->chamarApi($conn); // Este método já retorna o JSON e finaliza a execução
    } else {
        echo json_encode(['erro' => 'Dados inválidos']);
    }
} else {
    echo json_encode(['erro' => 'Campos obrigatórios ausentes']);
}


 


?>