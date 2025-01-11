<?php
require __DIR__ . '/../vendor/autoload.php'; // Caminho relativo ao autoloader do Composer

$autoloud = function($class): void {
    $file = 'classes/' . $class . '.php';
    
    if (file_exists($file)) {
        include $file;
   
    } else {
        echo "Erro: O arquivo da classe {$class} não foi encontrado!";
    }
};

// Registra a função de autoload
spl_autoload_register($autoloud);

define('INCLUDE_PATH', 'http://localhost/Web-Page-PHP-/');




?>
