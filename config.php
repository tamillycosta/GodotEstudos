<?php
session_start();
require __DIR__ . '/vendor/autoload.php'; // Caminho relativo ao autoloader do Composer

$autoloud = function($class): void {
    $file = 'classes/' . $class . '.php';
    $file2 = '../classes/'. $class . '.php';
    
    if (file_exists($file)) {
        include $file;
    }
    else if(file_exists($file2)) {
        include $file2;
    } else {
        echo "Erro: O arquivo da classe {$class} não foi encontrado!";
    }
};

// Registra a função de autoload
spl_autoload_register($autoloud);

define('INCLUDE_PATH', 'http://localhost/Web-Page-PHP-/');
define('INCLUDE_PAINEL_PATH', INCLUDE_PATH.'painel/');



?>
