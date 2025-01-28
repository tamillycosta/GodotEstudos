<?php
namespace Milly\WebPagePhp\controllers;
use Milly\WebPagePhp\repositories\SiteVisitRepository;
use Milly\WebPagePhp\models\UserOnline;

class SiteController{
    
    public $siteVisitRepository ;
    public function __construct(){
        $this->siteVisitRepository = new  SiteVisitRepository();
    }

    public function updateUsuarioOnline(){
        $token =  $_SESSION['online'];
        $curTime = date('Y-m-d H:i:s');
        $ip = $_SERVER['REMOTE_ADDR'];
        $usuarioOnline = new UserOnline($ip, $curTime, $token);     
        UserOnlineController::updateOnUser($usuarioOnline);
        }
    

    public function SetUserCookie(): void{
        if(!isset($_COOKIE['visita'])){
            setcookie('visita', 'true',   time() + (120 * 24 * 60 * 7), "/" ,"localhost");
            echo "Cookie set: " . ($_COOKIE['visita'] ?? 'não definido ainda') . "<br>";
                $ip = $_SERVER['REMOTE_ADDR'];
                $day = date('Y-m-d');
                $this->siteVisitRepository->insert($ip, $day);     
    } 

    }


}

?>