<?php
namespace Milly\WebPagePhp\models;

class Adm{

    private String $name ;
    private String $username;
    private String $password;
    private String $img;


    public function __construct(string $username, string $name, string $password, string $img){
        $this->username = $username;
        $this->name = $name;
        $this->password = $password;
        $this->img = $img; 
    }

    public function getName():string{
        return $this->name;
    }

    public function getUsername():string{
        return $this->username;
    }

    public function getPassword():string{
        return $this->password;
    }

    public function getImg():string{
        return $this->img;
    }
}


?>