<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/4367d2e41a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo INCLUDE_PAINEL_PATH;?>../login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Controle</title>
</head>
<body>


<?php
include '../dbConection.php';
try {
    $Db = new Db(HOST,USERNAME,PASSWORD,DATABASE);
    $conn = $Db->connect();
  
} catch (Exception $e) {
    echo json_encode(['erro' => 'Erro ao conectar ao banco']);
   
}

$AdmB = new AdmB($conn);
if(isset($_POST['acao'])){
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    if($AdmB->Buscar($nome, $senha)){
        $_SESSION['login'] = true;
        $_SESSION['user'] = $user;
        $_SESSION['senha'] = $senha;
        header(  'Location: '.INCLUDE_PAINEL_PATH);
        die();
    }
    else{
       echo '<div class="error-alert hide">Usuario ou Senha incorretos</div>';
    }
    
}


?>
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