<?php

namespace Milly\WebPagePhp\models;
class Contato
{
    private $name;
    private $email;
    private $phone;
    private $mensage;


    public function __construct($name, $email, $phone, $mensage)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->mensage = $mensage;
    }

    public function __tostring(): string
    {
        return '' . $this->name . '' . $this->email . '' . $this->phone . '' . $this->mensage;
    }


    public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getPhone(){
		return $this->phone;
	}

	public function setPhone($phone){
		$this->phone = $phone;
	}

	public function getMensage(){
		return $this->mensage;
	}

	public function setMensage($mensage){
		$this->mensage = $mensage;
	}
}


?>