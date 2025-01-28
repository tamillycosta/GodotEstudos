<?php
namespace Milly\WebPagePhp\controllers;
use Milly\WebPagePhp\repositories\ContatoRepository;
use Milly\WebPagePhp\models\Contato;


class ContatoController{
    private $contatoRepository;

    public function __construct(){
        $this->contatoRepository = new ContatoRepository();
    }

    public function callApi($name, $email, $phone, $mensage):void{
       $this->contatoRepository->create(new Contato($name, $email,$phone, $mensage));
    }
}


?>