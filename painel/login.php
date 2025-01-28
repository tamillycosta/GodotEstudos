<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use Milly\WebPagePhp\controllers\AdmController;

$AdmB = new AdmController();
if(isset($_POST['acao'])){
    $username = $_POST['nome'];
    $senha = $_POST['senha'];
    if($AdmB->Login($username, $senha)){
         
        header('Location: '.INCLUDE_PAINEL_PATH);
        die();
    }
    else{
       echo '<div class="error-alert hide">Usuario ou Senha incorretos</div>';
 }
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/4367d2e41a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo INCLUDE_PAINEL_PATH;?>css/login.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PAINEL_PATH;?>css/alerts.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Controle</title>
</head>
<body>


    <section>

    
    <div class="box-login">
        <div class="title-elements">
        <i class="fa-solid fa-unlock-keyhole"></i>
        <h2>Admin Painel</h2>
        </div>
        <form  method="POST" action="">
        <label class="form-control-label">NOME</label>
        <input type="text" name="nome" required>
        <label class="form-control-label">SENHA</label>
        <input type="password" name="senha" required>
        <input type="submit" value="ENVIAR" name="acao">
        </form>
    </div>
    </section>
</body>
</html>