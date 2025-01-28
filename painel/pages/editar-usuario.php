<?php
namespace painel\pages;

use Milly\WebPagePhp\controllers\AdmController;

$AdmController = new AdmController();
if(isset($_POST['acao'])){
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $imagem =  $_FILES['imagem']['name'] != '' ? $AdmController->imageUploud($_FILES['imagem'], $_SESSION['img'] ): $_SESSION['img'] ;

    if($AdmController->Editar($_SESSION['username'],$nome, $senha, $imagem)){
        $_SESSION['img'] = $imagem;
        echo '<div class=sucess-alert>Usuário Editado com Sucesso </div>';
    }
    else{
       echo '<div class="error-alert hide">Usuario ou Senha incorretos</div>';
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo INCLUDE_PAINEL_PATH;?>css/style.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PAINEL_PATH;?>css/alerts.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PAINEL_PATH;?>css/editar-user.css">
    <title>Document</title>
</head>
<body>

<section class="main-container">

<div class="edit-user w_100 box_shadow">
    <div class="box-title">
        <i class="fa-solid fa-pencil"></i>
        <h2>Editar Usuário</h2>
    </div>
    


    <form method="POST" enctype="multipart/form-data">
        <label class="form-label">NOME</label>
        <input type="text" name="nome" required value="<?php echo $_SESSION['nome']?>">
        <label class="form-label">SENHA</label>
        <input type="password" name="senha" required value="<?php echo $_SESSION['senha']?>">
        <label class="form-label">IMAGEM</label>
        <input type="file" name="imagem" >
        <input type="hidden" name="imagem_atual" value="<?php echo $_SESSION['img']?>">
        <input type="submit" value="ENVIAR" name="acao">
    </form>

</div>
    </section>
<section>
</body>
</html>