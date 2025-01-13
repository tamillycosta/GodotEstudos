<?php 

include('../config.php');


if(!Painel::isLogado()){
    include('login.php');
}else{
    include('main.php');
}
;
?>