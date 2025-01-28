<?php

namespace Milly\WebPagePhp\controllers;

class PainelController{

    public static function isLogado():bool{
        return isset($_SESSION['login']) ? true : false;
    }

    public static function loggout():void{
        session_destroy();
        header(  'Location: '.INCLUDE_PAINEL_PATH);
    }
    
    public static function carregarPagina():void{
        if(isset($_GET['url'])){
           $url = explode('/',$_GET['url']);
           if(file_exists('pages/'.$url[0].'.php')){
                include('pages/'.$url[0].'.php');
           }else{
                 header(  'Location: '.INCLUDE_PAINEL_PATH);
           }
        }else{
            include('pages/home.php');
        }
    }


}
?>