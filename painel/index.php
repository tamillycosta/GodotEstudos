<?php 

use Milly\WebPagePhp\controllers\PainelController;

include('../config.php');


if(!PainelController::isLogado()){
    include('login.php');
}else{
    include('main.php');
}
;
?>