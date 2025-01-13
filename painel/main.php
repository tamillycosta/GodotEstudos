<?php
if(isset($_GET['loggout'])){
    Painel::loggout();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/4367d2e41a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo INCLUDE_PAINEL_PATH;?>css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Controle</title>
<body>


<div class="side-menu">
        <div class="perfil-pessoal">
        <i class="fa-solid fa-user"></i>
        <p>BEM-VINDO</p>
    </div>
        <ul>
            <li><a href="">SERVIÇOS</a></li>
            <li><a href="">DEPOIMENTO</a></li>           
        </ul>
    </div>

<header>
    <i class="fa-solid fa-bars"></i>
    <a href="<?php echo INCLUDE_PAINEL_PATH;?>?loggout=true"><i class="fa-solid fa-right-from-bracket"></i></a>
</header>



</body>
</html>
