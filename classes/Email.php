<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class Email{
    public $mail ;
    public $data;
    public function __construct() {
        $this->mail = new PHPMailer(true);
    }

    public function enviar($para, $assunto, $mensagem):void{
       
        try {
           
            $this->mail->isSMTP();
            $this->mail->Host = 'live.smtp.mailtrap.io';
            $this->mail->SMTPAuth = true;
            $this->mail->Port = 587;
            $this->mail->Username = 'api';
            $this->mail->Password = '43a71850b65eb368e6c16e701a0aefa6';

            $this->mail->setFrom('hello@demomailtrap.com', 'api');
            $this->mail->addAddress($para);

            $this->mail->isHTML(true);
            $this->mail->Subject = $assunto;
            $this->mail->Body = $mensagem;

            $this->mail->send();
        } catch (Exception $e) {
            echo "Erro ao enviar e-mail: {$this->mail->ErrorInfo}";
        }
    }
    public function createEmail(string $email): void {
        static $Emails = [];
        // Aqui eu substituí "$username" por "$email" já que parece que você está recebendo o e-mail como parâmetro
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->mail->addAddress($email); // Verifica se o e-mail é válido
            $this->data = ['status' => 'success', 'message' => 'E-mail adicionado'];
        } else {
            $this->data = ['status' => 'error', 'message' => 'E-mail inválido'];
        }
        // Retorna a resposta em JSON
        die(json_encode($this->data));
    }
    
}


?>