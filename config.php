<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
require __DIR__ . '/vendor/autoload.php'; // Caminho relativo ao autoloader do Composer


define('INCLUDE_PATH', 'http://localhost/Web-Page-PHP/');
define('INCLUDE_PAINEL_PATH', INCLUDE_PATH.'painel/');
define('BASE_DIR_PAINEL', __DIR__.'/painel');
    




?>
