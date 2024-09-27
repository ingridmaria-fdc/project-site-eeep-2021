<?php

$nome = utf8_decode($_POST['nome']);
$sobrenome = utf8_encode($_POST['sobrenome']);
$email = utf8_encode($_POST['email']);
$mensagem = utf8_encode($_POST['mensagem']);

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();

//Configuração do Servidor de e-mail
$mail->Host = "smtp.gmail.com";
$mail->Port = "587";
$mail->SMTPSecure = "tls";
$mail->SMTPAuth = "true";
$mail->Username = "ingridferreira.dccr@gmail.com";
$mail->Password = "iranilda40028922";

//Configuração de mensagem
$mail->setFrom($mail->Username,"Ingrid Ferreira");
$mail->addAddress('ingridferreira.dccr@gmail.com');
$mail->Subject = "Fale Conosco";

$conteudo_email = "Olá, você recebeu uma mensagem de $nome $sobrenome, ($email)
<br>

Com a seguinte Mensagem:<br>
$mensagem
";

$mail->IsHTML(true);
$mail->Body = $conteudo_email;

if ($mail->send()){
    
    header('Location:email-sucesso.html');

}else{
    header('Location:email-erro.html');
}


