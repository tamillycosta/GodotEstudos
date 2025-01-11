<?php
include 'config/config.php';

header('Content-Type: application/json');
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Adiciona verificação para garantir que o email foi enviado
if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Instanciando a classe InputHandler para verificar o email
    $inputHandler = new InputHandler();

    // Verifica se o email é válido
    if ($inputHandler->emailVerify($email)) {
        $Email = new Email();
        $Email->createEmail($email); 
        echo json_encode(['sucesso' => 'E-mail enviado com sucesso!']);
    } else {
        echo json_encode(['erro' => 'E-mail inválido']);
    }
} else {
    echo json_encode(['erro' => 'Dados não enviados']);
}
?>
