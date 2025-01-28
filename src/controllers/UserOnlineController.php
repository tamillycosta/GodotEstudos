<?php

namespace Milly\WebPagePhp\controllers;

use Milly\WebPagePhp\repositories\UserOnlineRepository;
use Milly\WebPagePhp\models\UserOnline;

class UserOnlineController
{
    private static $userRepository;

    // Método para inicializar o repositório, usado internamente
    private static function init()
    {
        if (self::$userRepository === null) {
            self::$userRepository = new UserOnlineRepository();
        }
    }

    public static function updateOnUser(UserOnline $userOnline): void
    {
        self::init(); // Inicializa o repositório, se necessário

        if (isset($_SESSION['online'])) {
            if (self::$userRepository->select($userOnline->getToken()) == 0) {
                self::$userRepository->insert($userOnline);
            } else {
                self::$userRepository->update($userOnline->getLastAction(), $userOnline->getToken());
            }
        } else {
            $_SESSION['online'] = uniqid();
            self::$userRepository->insert($userOnline);
        }
    }

    public static function listUserOnline(): array
    {
        self::init(); 
        self::$userRepository->delete();
        return self::$userRepository->list();
    }

    public static function countTotalUsers(): int
    {
        self::init(); 
      
        return self::$userRepository->countColums("SELECT COUNT(*) FROM adm_visitas");
    }

    public static function countUsersToday(): int
    {
        self::init(); 
        
        return self::$userRepository->countColums("SELECT COUNT(*) FROM adm_visitas WHERE dia = CURDATE()");
    }
}

?>
