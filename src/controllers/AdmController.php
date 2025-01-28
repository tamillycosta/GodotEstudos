<?php

namespace Milly\WebPagePhp\controllers;
use Milly\WebPagePhp\repositories\AdmRepository;
use Milly\WebPagePhp\models\Adm;

class AdmController{
    private $admRepository ;
    public function __construct(){
        $this->admRepository =  new AdmRepository();
    }
  
    public function Login(string $username, string $password):bool{
        if($user = $this->admRepository->find($username, $password)){
            $_SESSION['login'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['senha'] = $password;
            $_SESSION['nome'] = $user['nome'];
            $_SESSION['img']  = $user['img'];
            return true; // Usuário encont
        }
        return false;
        }


    public function Editar(string $username, string $name, string $password, string $img){
           $adm = new Adm($username, $name, $password, $img);
            if($this->admRepository->update($adm)){
                return true;
            };
        return false;
    }

    
    public function imagemValida($imagem) {
        // Verificar o tipo de imagem e o tamanho máximo
        $tiposPermitidos = ['image/jpeg', 'image/jpg', 'image/png'];
    
        if (in_array($imagem['type'], $tiposPermitidos)) {
           
            if (intval($imagem['size'] / 1024) < 300) {
               
                return $imagem;
            } else{
                 echo '<div class="error-alert hide">Imagem maior que 300kb</div>';
            }
        }else{
             echo '<div class="error-alert hide">Arquivo de formato invalido</div>';
        }
       
        return null; // Retorna null caso a imagem não seja válida
    }
    
    
    public function imageUploud($file, $currentImage = null) {
        // Verifica se a imagem é válida
        if ($img = $this->imagemValida($file)) {
            if ($currentImage && file_exists(BASE_DIR_PAINEL . '/uplouds/' . $currentImage)) {
                unlink(BASE_DIR_PAINEL . '/uplouds/' . $currentImage);
            }

            move_uploaded_file($img['tmp_name'], BASE_DIR_PAINEL .'/uplouds/'.$img['name'] ) ;
            return $img['name']; 
        }
           
    return null;
       
    }
    


}
?>