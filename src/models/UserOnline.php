<?php
namespace Milly\WebPagePhp\models;

class UserOnline{

    private $ip;
    private $lastAction;
    private $token;
    public function __construct($ip, $lastAction, $token){
        $this->ip = $ip;
        $this->lastAction = $lastAction;
        $this->token = $token;
    }

    public function getIp(){
		return $this->ip;
	}

	public function setIp($ip){
		$this->ip = $ip;
	}

	public function getLastAction(){
		return $this->lastAction;
	}

	public function setLastAction($lastAction){
		$this->lastAction = $lastAction;
	}

	public function getToken(){
		return $this->token;
	}

	public function setToken($token){
		$this->token = $token;
	}
}


?>