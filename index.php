<?php include 'config.php';
include 'dbConection.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


?>

<!DOCTYPE html>
<html lang="en">
<head>

    <!--fontawesome-->
<script src="https://kit.fontawesome.com/4367d2e41a.js" crossorigin="anonymous"></script>

  <!-- Adicionando jQuery local -->
  <script src=" <?php echo INCLUDE_PATH; ?>js/config/jquery-3.7.1.min.js"></script>
  <script src ="<?php echo INCLUDE_PATH; ?>js/scripts.js"></script>    

  <!-- Adicionando Api-mapa-->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>


    <meta charset="UTF-8">
    <meta name="description" content="Descricao do meu web site">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="plavras-chave, do, meu ,site">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH;?>css/style.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH;?>css/contato.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH;?>css/404.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH;?>css/alert.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH;?>css/boot.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH;?>css/mediaQuery.css">

    <title>Document</title>
</head>


<?php
$url = isset($_GET['url']) ? $_GET['url'] : 'home';

switch ($url) {
    case 'Depoimento':
        echo '<div class="elemento" data-target="depoimento"></div>';
        break;
    case 'Servicos':
        echo '<div class="elemento" data-target="servicos"></div>';
}
?>


<body>
    <div class="loader">
            <img src="<?php echo INCLUDE_PATH; ?>images/gif.gif" alt="">
    </div>
    
    <div class="alert">
    <i class="fas fa-check"></i>
    <span class="alert-title">Successo</span>
    <span class="alert-subtitle">Criado com sucesso!
    </span>
</div>

    <header>
            <div class="center">
                <div class="Logo left"><a href="<?php echo INCLUDE_PATH;?>">Logo Marca</a></div>
                <nav class="desktop rigth">
                    <ul>
                        <li><a href="<?php echo INCLUDE_PATH;?>">Home</a></li>
                        <li><a href="<?php echo INCLUDE_PATH;?>Depoimento">Depoimentos</a></li>
                        <li><a href=" <?php echo INCLUDE_PATH;?>Servicos">Serviços</a></li>
                        <li><a href="<?php echo INCLUDE_PATH;?>Contato">Contato</a></li>
                    </ul>
                </nav>
            
                
                <nav class="mobile rigth">
                <div class="botao-mobile">
                    <i class="fa-solid fa-bars"></i>
                </div>
                    <ul>
                    <li><a href="<?php echo INCLUDE_PATH;?>">Home</a></li>
                        <li><a href="<?php echo INCLUDE_PATH;?>Depoimento">Depoimento</a></li>
                        <li><a href=" <?php echo INCLUDE_PATH;?> Servicos">Serviços</a></li>
                        <li><a href="<?php echo INCLUDE_PATH;?> Contato">Contato</a></li>
                    </ul>
                </nav>
                <div class="clear"></div>
        </div>
       
    </header>

    <?php 
    if(file_exists('pages/'.$url.'.php') ){
        include('pages/'.$url.'.php');
    }
    else if($url != 'Depoimento' &&  $url != 'Servicos'){
            $pagina404 = true;
            include('pages/404.php');
        }
        else{
            include('pages/home.php');
        }
    ?>  
        <footer <?php  if(isset($pagina404) && $pagina404 ) echo 'class="fixed"';?>>
            <div class="center">
            <p>Todos os direitos reservados</p>
            </div>
        </footer>

<script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>
<script src="<?php echo INCLUDE_PATH; ?>js/buffer.js"></script>
<script src="<?php echo INCLUDE_PATH; ?>js/form.js"></script> 
      
<?php 
    if($url == 'Contato'){
?>
    <script src="<?php echo INCLUDE_PATH; ?>js/map.js"></script>
<?php } ?>


</body>
</html>