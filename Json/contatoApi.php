<?php
header('Content-Type: application/json');
use Milly\WebPagePhp\controllers\ContatoController;
use Milly\WebPagePhp\exceptions\InputHandler;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../config.php';
include '../dbConection.php';

$inputHandler = new InputHandler();


if (isset($_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['mensagem'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];

    if ($inputHandler->emailVerify($email) && $inputHandler->phoneVerify($telefone)) {
        $Contato = new ContatoController();
        $Contato->callApi($nome, $email, $telefone, $mensagem);

        
    } else {
        echo json_encode(['erro' => 'Dados inválidos']);
    }
} else {
    echo json_encode(['erro' => 'Campos obrigatórios ausentes']);
}


 


?>