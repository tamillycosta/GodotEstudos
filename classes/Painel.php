<?php
class Painel{

    public static function isLogado():bool{
        return isset($_SESSION['login']) ? true : false;
    }

    public static function loggout():void{
        session_destroy();
        header(  'Location: '.INCLUDE_PAINEL_PATH);
        
    }
}

?>